<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function listUserData()
    {
        $userModel = new UserModel();
        $user_list= $userModel->findAll();
        return view('listUser.php',$user_list);
    }
    
}
