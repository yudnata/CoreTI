<?php

namespace App\Models;

use App\Core\Database;

class Order
{
    public static function all(): array
    {
        return Database::fetchAll("SELECT * FROM orders ORDER BY id DESC");
    }

    public static function getByUser(int $userId): array
    {
        return Database::fetchAll("SELECT * FROM orders WHERE user_id = ? ORDER BY id DESC", [$userId]);
    }

    public static function find(int $id): ?array
    {
        return Database::fetch("SELECT * FROM orders WHERE id = ?", [$id]);
    }

    public static function count(): int
    {
        $result = Database::fetch("SELECT COUNT(*) as count FROM orders");
        return (int) ($result['count'] ?? 0);
    }

    public static function getTotalByStatus(string $status): int
    {
        $result = Database::fetch("SELECT SUM(total_price) as total FROM orders WHERE payment_status = ?", [$status]);
        return (int) ($result['total'] ?? 0);
    }

    public static function create(array $data): int
    {
        Database::query(
            "INSERT INTO orders (user_id, name, number, email, method, address, total_products, total_price, placed_on, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $data['user_id'],
                $data['name'],
                $data['number'],
                $data['email'],
                $data['method'],
                $data['address'],
                $data['total_products'],
                $data['total_price'],
                $data['placed_on'],
                $data['payment_status'] ?? 'pending'
            ]
        );
        return (int) Database::lastInsertId();
    }

    public static function updateStatus(int $id, string $status): bool
    {
        Database::query("UPDATE orders SET payment_status = ? WHERE id = ?", [$status, $id]);
        return true;
    }

    public static function delete(int $id): bool
    {
        Database::query("DELETE FROM orders WHERE id = ?", [$id]);
        return true;
    }

    public static function isDuplicate(array $data): bool
    {
        $result = Database::fetch(
            "SELECT COUNT(*) as count FROM orders WHERE name = ? AND number = ? AND email = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?",
            [$data['name'], $data['number'], $data['email'], $data['method'], $data['address'], $data['total_products'], $data['total_price']]
        );
        return ($result['count'] ?? 0) > 0;
    }
}
