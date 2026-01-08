<?php

namespace App\Models;

use App\Core\Database;

class User
{
    public static function find(int $id): ?array
    {
        return Database::fetch("SELECT * FROM users WHERE id = ?", [$id]);
    }

    public static function findByEmail(string $email): ?array
    {
        return Database::fetch("SELECT * FROM users WHERE email = ?", [$email]);
    }

    public static function all(): array
    {
        return Database::fetchAll("SELECT * FROM users ORDER BY id DESC");
    }

    public static function getByType(string $type): array
    {
        return Database::fetchAll("SELECT * FROM users WHERE user_type = ? ORDER BY id DESC", [$type]);
    }

    public static function countByType(string $type): int
    {
        $result = Database::fetch("SELECT COUNT(*) as count FROM users WHERE user_type = ?", [$type]);
        return (int) ($result['count'] ?? 0);
    }

    public static function count(): int
    {
        $result = Database::fetch("SELECT COUNT(*) as count FROM users");
        return (int) ($result['count'] ?? 0);
    }

    public static function create(array $data): bool
    {
        $hashedPassword = self::hashPassword($data['password']);
        Database::query(
            "INSERT INTO users (name, email, password, user_type) VALUES (?, ?, ?, ?)",
            [$data['name'], $data['email'], $hashedPassword, $data['user_type'] ?? 'user']
        );
        return true;
    }

    public static function delete(int $id): bool
    {
        Database::query("DELETE FROM users WHERE id = ?", [$id]);
        return true;
    }

    public static function verifyPassword(string $password, string $hash): bool
    {
        if (password_get_info($hash)['algo'] !== null) {
            return password_verify($password, $hash);
        }
        return md5($password) === $hash;
    }

    public static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function emailExists(string $email): bool
    {
        $result = Database::fetch("SELECT COUNT(*) as count FROM users WHERE email = ?", [$email]);
        return ($result['count'] ?? 0) > 0;
    }

    public static function authenticate(string $email, string $password): ?array
    {
        $user = self::findByEmail($email);

        if ($user && self::verifyPassword($password, $user['password'])) {
            if (password_get_info($user['password'])['algo'] === null) {
                self::upgradePassword($user['id'], $password);
            }
            return $user;
        }

        return null;
    }

    private static function upgradePassword(int $id, string $password): void
    {
        $hashedPassword = self::hashPassword($password);
        Database::query("UPDATE users SET password = ? WHERE id = ?", [$hashedPassword, $id]);
    }
}
