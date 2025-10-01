<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductSeasonRequest;
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
    //商品登録
    public function create(){
        $products = Product::all();
        $seasons = Season::all();

        return view('create',compact('products', 'seasons'));
    }
    //商品情報の登録
    public function store(ProductSeasonRequest $request){
        $product = $request->only(['name','price', 'image','description']);
        $season = $request->only(['name']);
        Product::create($product);
        Season::create($season);
        return view('index');
    }
}