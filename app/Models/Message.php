<?php

namespace App\Models;

use App\Core\Database;

class Message
{
    public static function all(): array
    {
        return Database::fetchAll("SELECT * FROM message ORDER BY id DESC");
    }

    public static function find(int $id): ?array
    {
        return Database::fetch("SELECT * FROM message WHERE id = ?", [$id]);
    }

    public static function count(): int
    {
        $result = Database::fetch("SELECT COUNT(*) as count FROM message");
        return (int) ($result['count'] ?? 0);
    }

    public static function create(array $data): int
    {
        Database::query(
            "INSERT INTO message (user_id, name, email, number, message) VALUES (?, ?, ?, ?, ?)",
            [$data['user_id'], $data['name'], $data['email'], $data['number'], $data['message']]
        );
        return (int) Database::lastInsertId();
    }

    public static function delete(int $id): bool
    {
        Database::query("DELETE FROM message WHERE id = ?", [$id]);
        return true;
    }

    public static function isDuplicate(array $data): bool
    {
        $result = Database::fetch(
            "SELECT COUNT(*) as count FROM message WHERE name = ? AND email = ? AND number = ? AND message = ?",
            [$data['name'], $data['email'], $data['number'], $data['message']]
        );
        return ($result['count'] ?? 0) > 0;
    }
}
