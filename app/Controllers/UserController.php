<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{

    public function index()
    {
        return view('workster');
    }

    public function insert()
    {
        $fullName = $this->request->getPost('full_name');
        $role = $this->request->getPost('role');
        $email = $this->request->getPost('email');
        $company = $this->request->getPost('company');
        $password = $this->request->getPost('password');

        if (empty($fullName) || empty($role) || empty($email) || empty($company) || empty($password)) {
            $data = ['status' => 'error', 'message' => 'All fields are required'];
            return $this->response->setJSON($data);
        }

        $model = new UserModel();
        $data = [
            'full_name' => $fullName,
            'role' => $role,
            'email' => $email,
            'company' => $company,
            'password' => $password
        ];

        $model->save($data);
        $message = ['status', 'data inserted susccessfully'];
        return $this->response->setJSON($data);
    }

    public function fetch()
    {
        $model = new UserModel();
        $data['model'] = $model->findAll();
        return $this->response->setJSON($data);
    }

    public function edit()
    {
        $model = new UserModel();
        $id = $this->request->getPost('id');
        $data['model'] = $model->find($id);
        return  $this->response->setJSON($data);
    }

    public function update()
    {
        $model = new UserModel();
        $request = $this->request->getJSON();
        $id = $request->id;
        $user = $model->find($id);
        $data = [
            'full_name' => $request->full_name ?? $user['full_name'],
            'role' => $request->role ?? $user['role'],
            'email' => $request->email ?? $user['email'],
            'company' => $request->company ?? $user['company'],
            'password' => $request->password ?? $user['password']
        ];
    
        $model->update($id, $data);
        $message = ['status' => 'success', 'message' => 'Data updated successfully'];
        return $this->response->setJSON($message);
    }
    



    public function delete()
    {
        $model = new UserModel();
        $model->delete($this->request->getPost('id'));
        $new = ['status' => 'success', 'message' => 'Data updated successfully'];
        return $this->response->setJSON($new);
    }
}
