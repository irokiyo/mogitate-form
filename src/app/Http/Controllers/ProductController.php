<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //商品一覧
    public function index(){
        return view('index');
    }
}
