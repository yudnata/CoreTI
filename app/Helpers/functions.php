<?php

function url(string $path = ''): string
{
    $appConfig = require CONFIG_PATH . 'app.php';
    $baseUrl = rtrim($appConfig['url'], '/');
    return $baseUrl . '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    return url('assets/' . ltrim($path, '/'));
}

function e(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function formatPrice(int $price): string
{
    return 'Rp. ' . number_format($price, 0, ',', '.');
}

function old(string $key, string $default = ''): string
{
    return $_POST[$key] ?? $default;
}

function csrf_field(): string
{
    $token = App\Core\Session::generateCsrfToken();
    return '<input type="hidden" name="csrf_token" value="' . e($token) . '">';
}

function csrf_token(): string
{
    return App\Core\Session::generateCsrfToken();
}

function isActive(string $path): bool
{
    $currentPath = $_SERVER['REQUEST_URI'] ?? '/';
    return strpos($currentPath, $path) !== false;
}

function flashMessages(): string
{
    $messages = App\Core\Session::getFlash();
    $html = '';

    foreach ($messages as $flash) {
        $type = $flash['type'] === 'error' ? 'error' : 'success';
        $html .= '<div class="message ' . $type . '">';
        $html .= '<span>' . e($flash['message']) . '</span>';
        $html .= '<i class="fas fa-times" onclick="this.parentElement.remove();"></i>';
        $html .= '</div>';
    }

    return $html;
}

function dd(...$vars): void
{
    echo '<pre>';
    foreach ($vars as $var) {
        var_dump($var);
    }
    echo '</pre>';
    die();
}

function currentUser(): ?array
{
    if (App\Core\Session::has('user_id')) {
        return [
            'id' => App\Core\Session::get('user_id'),
            'name' => App\Core\Session::get('user_name'),
            'email' => App\Core\Session::get('user_email'),
            'type' => 'user'
        ];
    }

    if (App\Core\Session::has('admin_id')) {
        return [
            'id' => App\Core\Session::get('admin_id'),
            'name' => App\Core\Session::get('admin_name'),
            'email' => App\Core\Session::get('admin_email'),
            'type' => 'admin'
        ];
    }

    return null;
}

function isLoggedIn(): bool
{
    return App\Core\Session::isLoggedIn();
}

function isAdmin(): bool
{
    return App\Core\Session::isAdmin();
}
