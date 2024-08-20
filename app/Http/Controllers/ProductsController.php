<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function Productlist(){
        return view('product.productList');
    }
    public function Productadd(){
        return view('product.productAdd');
    }
    public function Productdel(){
        return view('product.productDel');
    }
}
