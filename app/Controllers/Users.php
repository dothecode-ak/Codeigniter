<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function userData()
    {
        $userModel = new UserModel();
        $data = $userModel->findAll();
        print_r($data);
        return view('Home');
    }
    public function index()
    {
        return view('User/register.php');
    }
    public function register()
    {

        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $check = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'cpassword' => 'required'
        ]);

        if (!$check) {
            return view('User/register', ['validation' => $this->validator]);
        } else {
            $config         = new \Config\Encryption();
            $config->key    = 'aBigsecret_ofAtleast32Characters';
            $config->driver = 'OpenSSL';
            $encrypter = \Config\Services::encrypter($config);
            $model = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'password'=>$encrypter->encrypt($this->request->getVar('password'))            ];
            $model->insert($data);
            echo "Succesfully registered";
        }
    }
    public function login()
    {

        return view('User/login.php');
    }
}
