<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function Categorylist(){
        return view('category.categoryList');
    }
    public function Categoryadd(){
        return view('category.categoryAdd');
    }
    public function Categoryadj(){
        return view('category.categoryAdj');
    }
    public function Categorydel(){
        return view('category.categoryDel');
    }
}
