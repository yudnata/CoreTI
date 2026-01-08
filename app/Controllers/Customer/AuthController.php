<?php

namespace App\Controllers\Customer;

use App\Core\Controller;
use App\Core\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin(): void
    {
        if (Session::isLoggedIn()) {
            if (Session::isAdmin()) {
                $this->redirect('/admin');
            } else {
                $this->redirect('/home');
            }
        }

        $this->view('customer/login', ['title' => 'Login - CoreTI']);
    }

    public function login(): void
    {
        $email = trim($this->post('email', ''));
        $password = $this->post('password', '');

        if (empty($email) || empty($password)) {
            $this->redirectWith('/login', 'Please fill in all fields.', 'error');
        }

        $user = User::authenticate($email, $password);

        if ($user) {
            Session::regenerate();

            if ($user['user_type'] === 'admin') {
                Session::set('admin_id', $user['id']);
                Session::set('admin_name', $user['name']);
                Session::set('admin_email', $user['email']);
                $this->redirectWith('/admin', 'Welcome back, ' . $user['name'] . '!', 'success');
            } else {
                Session::set('user_id', $user['id']);
                Session::set('user_name', $user['name']);
                Session::set('user_email', $user['email']);
                $this->redirectWith('/home', 'Welcome back, ' . $user['name'] . '!', 'success');
            }
        } else {
            $this->redirectWith('/login', 'Incorrect email or password!', 'error');
        }
    }

    public function showRegister(): void
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/home');
        }

        $this->view('customer/register', ['title' => 'Register - CoreTI']);
    }

    public function register(): void
    {
        $name = trim($this->post('name', ''));
        $email = trim($this->post('email', ''));
        $password = $this->post('password', '');
        $cpassword = $this->post('cpassword', '');
        $userType = $this->post('user_type', 'user');

        if (empty($name) || empty($email) || empty($password) || empty($cpassword)) {
            $this->redirectWith('/register', 'Please fill in all fields.', 'error');
        }

        if ($password !== $cpassword) {
            $this->redirectWith('/register', 'Confirm password does not match!', 'error');
        }

        if (strlen($password) < 6) {
            $this->redirectWith('/register', 'Password must be at least 6 characters.', 'error');
        }

        if (User::emailExists($email)) {
            $this->redirectWith('/register', 'Email already registered!', 'error');
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'user_type' => $userType
        ]);

        $this->redirectWith('/login', 'Registration successful! Please login.', 'success');
    }

    public function logout(): void
    {
        Session::destroy();
        Session::start();
        $this->redirectWith('/login', 'You have been logged out.', 'success');
    }
}
