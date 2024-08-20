<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('login');
    }
    public function templatecheck(){
        return view('template');
    }
    public function Userlist(){
        return view('user.userList');
    }
    public function Useradd(){
        return view('user.userAdd');
    }
    public function Productlist(){
        return view('product.productList');
    }
    public function Productadd(){
        return view('product.productAdd');
    }
    public function Categorylist(){
        return view('category.categoryList');
    }
    public function Categoryadd(){
        return view('category.categoryAdd');
    }
}
