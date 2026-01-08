<?php

namespace App\Core;

class Session
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            ini_set('session.use_strict_mode', 1);
            ini_set('session.use_only_cookies', 1);
            ini_set('session.cookie_httponly', 1);
            session_start();
        }
    }

    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function flash(string $message, string $type = 'info'): void
    {
        $_SESSION['flash_messages'][] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function getFlash(): array
    {
        $messages = $_SESSION['flash_messages'] ?? [];
        unset($_SESSION['flash_messages']);
        return $messages;
    }

    public static function isLoggedIn(): bool
    {
        return self::has('user_id') || self::has('admin_id');
    }

    public static function isAdmin(): bool
    {
        return self::has('admin_id');
    }

    public static function isCustomer(): bool
    {
        return self::has('user_id') && !self::has('admin_id');
    }

    public static function getUserId(): ?int
    {
        return self::get('user_id');
    }

    public static function getAdminId(): ?int
    {
        return self::get('admin_id');
    }

    public static function regenerate(): void
    {
        session_regenerate_id(true);
    }

    public static function destroy(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();
    }

    public static function generateCsrfToken(): string
    {
        if (!self::has('csrf_token')) {
            self::set('csrf_token', bin2hex(random_bytes(32)));
        }
        return self::get('csrf_token');
    }

    public static function verifyCsrfToken(string $token): bool
    {
        return hash_equals(self::get('csrf_token', ''), $token);
    }
}
