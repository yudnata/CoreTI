<?php

namespace App\Models;

use App\Core\Database;

class Cart
{
    public static function getByUser(int $userId): array
    {
        return Database::fetchAll("SELECT * FROM cart WHERE user_id = ?", [$userId]);
    }

    public static function countByUser(int $userId): int
    {
        $result = Database::fetch("SELECT COUNT(*) as count FROM cart WHERE user_id = ?", [$userId]);
        return (int) ($result['count'] ?? 0);
    }

    public static function find(int $id): ?array
    {
        return Database::fetch("SELECT * FROM cart WHERE id = ?", [$id]);
    }

    public static function exists(int $userId, string $productName): bool
    {
        $result = Database::fetch("SELECT COUNT(*) as count FROM cart WHERE user_id = ? AND name = ?", [$userId, $productName]);
        return ($result['count'] ?? 0) > 0;
    }

    public static function add(int $userId, array $data): bool
    {
        Database::query(
            "INSERT INTO cart (user_id, name, price, quantity, image) VALUES (?, ?, ?, ?, ?)",
            [$userId, $data['name'], $data['price'], $data['quantity'], $data['image']]
        );
        return true;
    }

    public static function updateQuantity(int $id, int $quantity): bool
    {
        Database::query("UPDATE cart SET quantity = ? WHERE id = ?", [$quantity, $id]);
        return true;
    }

    public static function delete(int $id): bool
    {
        Database::query("DELETE FROM cart WHERE id = ?", [$id]);
        return true;
    }

    public static function clearByUser(int $userId): bool
    {
        Database::query("DELETE FROM cart WHERE user_id = ?", [$userId]);
        return true;
    }

    public static function getTotal(int $userId): int
    {
        $items = self::getByUser($userId);
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public static function getSummary(int $userId): array
    {
        $items = self::getByUser($userId);
        $products = [];
        $total = 0;

        foreach ($items as $item) {
            $products[] = $item['name'] . ' (' . $item['quantity'] . ')';
            $total += $item['price'] * $item['quantity'];
        }

        return [
            'items' => $items,
            'products_string' => implode(', ', $products),
            'total' => $total
        ];
    }
}
