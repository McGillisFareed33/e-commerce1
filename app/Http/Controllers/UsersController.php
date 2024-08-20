<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function Userlist(){
        return view('user.userList');
    }
    public function Useradd(){
        return view('user.userAdd');
    }
    public function Useradj(){
        return view('user.userAdj');
    }
    public function Userdel(){
        return view('user.userDel');
    }
}
