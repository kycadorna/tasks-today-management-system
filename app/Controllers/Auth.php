<?php

namespace App\Controllers;

use Config\Database;

class Auth extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $identifier = trim($this->request->getPost('identifier'));
        $password = $this->request->getPost('password');

        if ($identifier === '' || $password === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Username, email, and password are required.');
        }

        $user = $this->db
            ->table('users')
            ->groupStart()
            ->where('username', $identifier)
            ->orWhere('email', $identifier)
            ->groupEnd()
            ->get()
            ->getRowArray();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Invalid username, email, or password.');
        }

        session()->set([
            'isLoggedIn' => true,
            'user' => $user
        ]);

        return redirect()->to('/tasks');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()
            ->to('/login')
            ->with('success', 'You have been logged out.');
    }
}