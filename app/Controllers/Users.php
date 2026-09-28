<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        return view('users/index', [
            'users' => $userModel->findAll(),
        ]);
    }

    public function new()
    {
        return view('users/new', [
            'errors' => session('errors') ?? [],
        ]);
    }

    public function create()
    {
        $rules = [
            'username'   => 'required|is_unique[users.username]',
            'password'   => 'required|min_length[6]',
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|valid_email|is_unique[users.email]',
            'role'       => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'   => $this->request->getPost('username'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $this->request->getPost('email'),
            'role'       => $this->request->getPost('role'),
        ]);

        return redirect()->to('/users')
            ->with('success', 'User added successfully.');
    }

    public function edit(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('users/edit', [
            'user'   => $user,
            'errors' => session('errors') ?? [],
        ]);
    }

    public function update(int $id)
    {
        $rules = [
            'user_id'    => 'required|integer',
            'username'   => 'required|is_unique[users.username,user_id,{user_id}]',
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|valid_email|is_unique[users.email,user_id,{user_id}]',
            'role'       => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $data = [
            'username'   => $this->request->getPost('username'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $this->request->getPost('email'),
            'role'       => $this->request->getPost('role'),
        ];

        $newPassword = $this->request->getPost('password');

        if ($newPassword !== '') {
            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $avatar = $this->request->getFile('avatar');

        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $avatarRules = [
                'avatar' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
            ];

            if (! $this->validate($avatarRules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $avatarName = $avatar->getRandomName();
            $avatar->move(FCPATH . 'uploads', $avatarName);
            $data['avatar'] = $avatarName;
        }

        $userModel->update($id, $data);

        return redirect()->to('/users')
            ->with('success', 'User updated successfully.');
    }
}