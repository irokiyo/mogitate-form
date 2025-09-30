<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;


class ProductController extends Controller
{
    //商品一覧
    public function index(){
        $products = Product::all();
        $seasons = Season::all();

        return view('index',compact('products', 'seasons'));
    }
}
