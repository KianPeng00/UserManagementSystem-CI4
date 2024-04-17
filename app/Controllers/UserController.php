<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Hash;

class UserController extends BaseController
{
    public function index()
    {
        if (CIAuth::checkAuth() == false) {
            return redirect()->route('login.form')->with('fail', 'Not authorised! Please log in to continue!');
            exit();
        } else {
            $user = new User();
            $allUsers = $user->findAll();
            $data = [
                'pageTitle' => 'Users',
                'allUsers' => $allUsers
            ];
            return view('users/index', $data);
        }
    }

    public function create()
    {
        if (CIAuth::checkAuth() == false) {
            return redirect()->route('login.form')->with('fail', 'Not authorised! Please log in to continue!');
            exit();
        } else {
            $data = [
                'pageTitle' => 'Create New User',
            ];
            return view('users/create', $data);
        }
    }

    public function store()
    {
        if (CIAuth::checkAuth() == false) {
            return redirect()->route('login.form')->with('fail', 'Not authorised! Please log in to continue!');
            exit();
        } else {
            $data = [
                'name' => $this->request->getPost('name'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ];

            $rules = [
                'name' => 'required',
                'username' => 'required|is_unique[users.username]',
                'email' => 'required',
                'password' => 'required|min_length[3]'
            ];

            $isValid = $this->validateData($data, $rules);

            $hashedPassword = Hash::createHashedPassword($data['password']);
            $data['password'] = $hashedPassword;

            if (!$isValid) {
                return view('users/create', ['pageTitle' => 'Create New User', 'prevData' => $data]);
            } else {
                $user = new User();
                $user->insert($data);

                return redirect()->route('users.index')->with('success', 'New user has been created!');
            }
        }
    }

    public function edit($id)
    {
        if (CIAuth::checkAuth() == false) {
            return redirect()->route('login.form')->with('fail', 'Not authorised! Please log in to continue!');
            exit();
        } else {
            $user = new User();
            $userToEdit = $user->find($id);

            $data = [
                'pageTitle' => 'Edit User',
                'userToEdit' => $userToEdit
            ];
            return view('users/edit', $data);
        }
    }

    public function update($id)
    {
        if (CIAuth::checkAuth() == false) {
            return redirect()->route('login.form')->with('fail', 'Not authorised! Please log in to continue!');
            exit();
        } else {
            $user = new User();
            $userToEdit = $user->find($id);

            $data = [
                'name' => $this->request->getPost('name'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ];

            $rules = [
                'name' => 'required',
                'username' => ($data['username'] == $userToEdit['username']) ? 'required' : 'required|is_unique[users.username]',
                'email' => 'required',
                'password' => 'required|min_length[3]'
            ];
            $isValid = $this->validateData($data, $rules);

            $hashedPassword = Hash::createHashedPassword($data['password']);
            $data['password'] = $hashedPassword;

            if (!$isValid) {
                return view('users/edit', ['pageTitle' => 'Edit User', 'userToEdit' => $userToEdit]);
            } else {
                $user = new User();
                $user->update($id, $data);

                return redirect()->route('users.index')->with('success', 'User has been succcessfully edited!');
            }
        }
    }

    public function delete($id)
    {
        if (CIAuth::checkAuth() == false) {
            return redirect()->route('login.form')->with('fail', 'Not authorised! Please log in to continue!');
            exit();
        } else {
            $user = new User();
            $userToDelete = $user->find($id);
            if ($userToDelete) {
                $user->delete($id);
                return redirect()->route('users.index')->with('success', 'User has been deleted!');
            }
        }
    }
}
