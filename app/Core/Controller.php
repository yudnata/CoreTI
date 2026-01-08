<?php

namespace App\Core;

abstract class Controller
{
    protected array $data = [];

    protected function view(string $view, array $data = []): void
    {
        $this->data = array_merge($this->data, $data);
        extract($this->data);

        $viewFile = APP_PATH . 'Views/' . str_replace('.', '/', $view) . '.php';

        if (!file_exists($viewFile)) {
            throw new \Exception("View not found: {$view}");
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        if (isset($this->data['layout'])) {
            $layoutFile = APP_PATH . 'Views/' . str_replace('.', '/', $this->data['layout']) . '.php';
            if (file_exists($layoutFile)) {
                require $layoutFile;
                return;
            }
        }

        echo $content;
    }

    protected function customerView(string $view, array $data = []): void
    {
        $data['layout'] = 'customer/layouts/main';
        $this->view('customer/' . $view, $data);
    }

    protected function adminView(string $view, array $data = []): void
    {
        $data['layout'] = 'admin/layouts/main';
        $this->view('admin/' . $view, $data);
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . url($path));
        exit;
    }

    protected function redirectWith(string $path, string $message, string $type = 'success'): void
    {
        Session::flash($message, $type);
        $this->redirect($path);
    }

    protected function requireAuth(): void
    {
        if (!Session::isLoggedIn()) {
            Session::flash('Please login to continue.', 'error');
            $this->redirect('/login');
        }
    }

    protected function requireCustomer(): void
    {
        if (!Session::has('user_id')) {
            Session::flash('Please login to continue.', 'error');
            $this->redirect('/login');
        }
    }

    protected function requireAdmin(): void
    {
        if (!Session::isAdmin()) {
            Session::flash('Admin access required.', 'error');
            $this->redirect('/login');
        }
    }

    protected function post(?string $key = null, $default = null)
    {
        if ($key === null) {
            return $_POST;
        }
        return $_POST[$key] ?? $default;
    }

    protected function get(?string $key = null, $default = null)
    {
        if ($key === null) {
            return $_GET;
        }
        return $_GET[$key] ?? $default;
    }

    protected function validateCsrf(): bool
    {
        $token = $this->post('csrf_token');
        if (!$token || !Session::verifyCsrfToken($token)) {
            Session::flash('Invalid request. Please try again.', 'error');
            return false;
        }
        return true;
    }

    protected function uploadFile(string $fieldName, string $uploadDir = 'assets/uploads/'): ?string
    {
        if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $file = $_FILES[$fieldName];
        $appConfig = require CONFIG_PATH . 'app.php';

        if ($file['size'] > $appConfig['max_upload_size']) {
            Session::flash('File size is too large.', 'error');
            return null;
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $appConfig['allowed_extensions'])) {
            Session::flash('Invalid file type.', 'error');
            return null;
        }

        $filename = uniqid() . '_' . basename($file['name']);
        $targetPath = PUBLIC_PATH . $uploadDir . $filename;

        $dir = dirname($targetPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $filename;
        }

        return null;
    }

    protected function deleteFile(string $filename, string $uploadDir = 'assets/uploads/'): bool
    {
        $filePath = PUBLIC_PATH . $uploadDir . $filename;
        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }
}
