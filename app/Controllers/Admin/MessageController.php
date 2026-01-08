<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();
        $messages = Message::all();
        $this->adminView('messages', [
            'title' => 'Messages - Admin Panel',
            'messages' => $messages
        ]);
    }

    public function delete(string $id): void
    {
        $this->requireAdmin();
        Message::delete((int) $id);
        $this->redirectWith('/admin/messages', 'Message deleted successfully!', 'success');
    }
}
