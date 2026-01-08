<?php

namespace App\Models;

use App\Core\Database;

class Product
{
    public static function all(): array
    {
        return Database::fetchAll("SELECT * FROM products ORDER BY id DESC");
    }

    public static function latest(int $limit = 6): array
    {
        return Database::fetchAll("SELECT * FROM products ORDER BY id DESC LIMIT ?", [$limit]);
    }

    public static function find(int $id): ?array
    {
        return Database::fetch("SELECT * FROM products WHERE id = ?", [$id]);
    }

    public static function search(string $keyword): array
    {
        return Database::fetchAll("SELECT * FROM products WHERE name LIKE ? ORDER BY id DESC", ['%' . $keyword . '%']);
    }

    public static function count(): int
    {
        $result = Database::fetch("SELECT COUNT(*) as count FROM products");
        return (int) ($result['count'] ?? 0);
    }

    public static function create(array $data): int
    {
        Database::query("INSERT INTO products (name, price, image) VALUES (?, ?, ?)", [$data['name'], $data['price'], $data['image']]);
        return (int) Database::lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        if (isset($data['image'])) {
            Database::query("UPDATE products SET name = ?, price = ?, image = ? WHERE id = ?", [$data['name'], $data['price'], $data['image'], $id]);
        } else {
            Database::query("UPDATE products SET name = ?, price = ? WHERE id = ?", [$data['name'], $data['price'], $id]);
        }
        return true;
    }

    public static function delete(int $id): bool
    {
        Database::query("DELETE FROM products WHERE id = ?", [$id]);
        return true;
    }

    public static function nameExists(string $name, ?int $exceptId = null): bool
    {
        if ($exceptId) {
            $result = Database::fetch("SELECT COUNT(*) as count FROM products WHERE name = ? AND id != ?", [$name, $exceptId]);
        } else {
            $result = Database::fetch("SELECT COUNT(*) as count FROM products WHERE name = ?", [$name]);
        }
        return ($result['count'] ?? 0) > 0;
    }
}
