<?php

namespace App\Controllers\Customer;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Message;
use App\Models\Cart;

class ContactController extends Controller
{
    public function index(): void
    {
        $this->requireCustomer();
        $cartCount = Cart::countByUser($this->getUserId());
        $this->customerView('contact', [
            'title' => 'Contact - CoreTI',
            'cartCount' => $cartCount
        ]);
    }

    public function send(): void
    {
        $this->requireCustomer();
        $messageData = [
            'user_id' => $this->getUserId(),
            'name' => trim($this->post('name', '')),
            'email' => trim($this->post('email', '')),
            'number' => $this->post('number', ''),
            'message' => trim($this->post('message', ''))
        ];

        if (empty($messageData['name']) || empty($messageData['email']) || 
            empty($messageData['number']) || empty($messageData['message'])) {
            $this->redirectWith('/contact', 'Please fill in all fields.', 'error');
        }

        if (Message::isDuplicate($messageData)) {
            $this->redirectWith('/contact', 'Message already sent!', 'error');
        }

        Message::create($messageData);
        $this->redirectWith('/contact', 'Message sent successfully!', 'success');
    }

    private function getUserId(): int
    {
        return Session::getUserId() ?? 0;
    }
}
