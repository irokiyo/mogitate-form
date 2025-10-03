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
        $products = Product::paginate(6);
        $seasons = Season::paginate(6);

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
        $path = $request->file('image')->store('products', 'public');
        $publicPath = $path;

        $product = Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'image'       => $publicPath,
            'description' => $request->description,
        ]);
        $product->seasons()->sync($request->input('seasons', []));

        return redirect()->route('index');
    }
    //商品詳細の画面
    public function show(int $productId){
        $product = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();

        return view('show', compact('product', 'seasons'));
    }
    //更新
    public function update(ProductSeasonRequest $request ,$productId){
        $product = Product::findOrFail($productId);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $publicPath = $path;
            $product->image = $publicPath;
        }
            $product->name        = $request->name;
            $product->price       = $request->price;
            $product->description = $request->description;
            $product->save();

        $product->seasons()->sync($request->input('seasons', []));

        return redirect()->route('index');
    }
    //削除
    public function destroy($productId){
        $product = Product::findOrFail($productId);
        $product->seasons()->detach();
        $product->delete();

        return redirect()->route('index');
    }
    //検索
    public function search(Request $request){
        $query = Product::query();

        $query->keywordSearch($request->keyword);

        if ($request->sort === 'high') {
        $query->priceHigh();
        } elseif ($request->sort === 'low') {
        $query->priceLow();
        }

        $products = $query->paginate(6)->withQueryString();
        return view('index', compact('products'));
    }
}