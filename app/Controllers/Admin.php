<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Database authentication
        $user = $this->db->table('users')->where('username', $username)->where('is_active', 1)->get()->getRowArray();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'admin_logged_in' => true,
                'user_id' => $user['id'],
                'username' => $user['username']
            ]);
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function dashboard()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        return view('admin/dashboard');
    }
}