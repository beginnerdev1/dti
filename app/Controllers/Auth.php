<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminUserModel;

class Auth extends Controller
{
    protected $session;
    protected $adminModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->adminModel = new AdminUserModel();
    }

    // Display login form
    public function loginForm()
    {
        if ($this->session->get('isAdminLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/login'); // make sure this view exists
    }

    // Process login
    public function login()
    {
        if ($this->request->getMethod() !== 'POST') {
            return redirect()->to('/admin/login');
        }

        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[4]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Username and password are required.');
        }

        $username = $this->request->getPOST('username');
        $password = $this->request->getPOST('password');

        // Find user by username OR email (username field can accept email)
        $user = $this->adminModel
            ->where('username', $username)
            ->orWhere('email', $username)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }

        // Set session
        $this->session->set([
            'isAdminLoggedIn' => true,
            'admin_id'        => $user['id'],
            'admin_username'  => $user['username'],
            'admin_email'     => $user['email'],
            'admin_role'      => $user['role'],
        ]);

        // Update last login
        $this->adminModel->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);

        return redirect()->to('/admin/dashboard')->with('success', 'Welcome ' . $user['username']);
    }

    // Logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/admin/login')->with('success', 'Logged out successfully.');
    }

    // Dashboard (protected)
    public function dashboard()
    {
        if (!$this->session->get('isAdminLoggedIn')) {
            return redirect()->to('/admin/login')->with('error', 'Please login first.');
        }
        return view('admin/dashboard');
    }
}