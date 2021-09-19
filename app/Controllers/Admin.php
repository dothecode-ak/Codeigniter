<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
class Admin extends BaseController
{
    public function index()
    {
        return view('auth/register.php');
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
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            $config         = new \Config\Encryption();
            $config->key    = 'aBigsecret_ofAtleast32Characters';
            $config->driver = 'OpenSSL';
            $encrypter = \Config\Services::encrypter($config);
            $model = new AdminModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'password' => $encrypter->encrypt($this->request->getVar('password'))
            ];
            $model->insert($data);
            echo "Succesfully registered";
        }
    }
    public function login()
    {
        return view('auth/login.php');
    }
    public function login_action()
    {
        $userModel = new AdminModel();
        $result =  $userModel
        ->where('email', $this->request->getVar(('email')))
        ->where('password', $this->request->getVar(('password')))
        ->first();
        $session=session();
        // $userName=$result['name'];
        if ($result) {
            $session->set('user',$result['name']);
            if($session->has('user'))
            {
                return view('listUser.php');
            }
         
        } 
        
        else {
            return view('auth/login.php');
        }
    }


    public function logout()
    {
        $session=session();
        $session->destroy();
        return view('auth/login.php');
    }
}
