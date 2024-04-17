<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Hash;
use App\Libraries\CIAuth;

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function loginForm()
    {
        $data = [
            'pageTitle' => 'Login',
            'validation' => null
        ];
        return view('auth/login', $data);
    }

    public function loginHandler()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $rules = [
            'username' => 'required|is_not_unique[users.username]',
            'password' => 'required|min_length[3]|max_length[20]'
        ];

        $isValid = $this->validateData($data, $rules);

        if (!$isValid) {
            return view('auth/login', ['pageTitle' => 'Login']);
        } else {
            $user = new User();
            $userInfo = $user->where('username', $this->request->getVar('username'))->first();
            $check_password = Hash::comparePassword($this->request->getVar('password'), $userInfo['password']);

            if (!$check_password) {
                return redirect()->route('login.form')->with('fail', 'Wrong Password!')->withInput();
            } else {
                CIAuth::setCIAuth($userInfo);
                return redirect()->route('users.index')->with('success', 'You have successfully logged in!');
            }
        }
    }

    public function logoutHandler()
    {
        CIAuth::destroySession();
        return redirect()->route('login.form')->with('fail', 'You are logged out!');
    }
}
