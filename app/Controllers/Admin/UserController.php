<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();
        $users = User::all();
        $this->adminView('users', [
            'title' => 'Users - Admin Panel',
            'users' => $users
        ]);
    }

    public function delete(string $id): void
    {
        $this->requireAdmin();
        User::delete((int) $id);
        $this->redirectWith('/admin/users', 'User deleted successfully!', 'success');
    }
}
