<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
        protected $fillable =[
            'name',
            'price',
            'image',
            'description'
        ];
        public function seasons() {
            return $this->belongsToMany(Season::class, 'product_season')->withTimestamps();
        }
        public function scopeCategorySearch($query, $product_id)
        {
            if (!empty($product_id)) {
            $query->where('product_id', $product_id);
        }
        }
        public function scopeKeywordSearch($query, $keyword)
        {
            if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
            }
        }
        public function scopePriceHigh($query){
        return $query->orderBy('price', 'desc');
        }

        public function scopePriceLow($query){
        return $query->orderBy('price', 'asc');
        }
        public function getImageUrlAttribute(): string
        {
            $img = $this->image ?? '';

            if ($img === '') {
                return asset('images/noimage.png');
            }

            // 既に URL or /storage/ はそのまま
            if (\Illuminate\Support\Str::startsWith($img, ['http://', 'https://', '/storage/'])) {
                return $img;
            }

            // Storage (public) 直下にあるパス（例: products/xxxxx.png）
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($img)) {
                return \Illuminate\Support\Facades\Storage::url($img);
            }

            // images/… で始まるダミー（public/images 配下を指す） → そのまま asset 化
            if (\Illuminate\Support\Str::startsWith($img, 'images/')) {
                return asset($img);  // ← /images/fruits-img/banana.png など
            }

            // ファイル名だけのダミー（kiwi.jpg など）は products/ を補完して探す
            $basename = basename($img);
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists('products/'.$basename)) {
            return \Illuminate\Support\Facades\Storage::url('products/'.$basename);
            }

        // 最後のフォールバック：public/images/ ファイル名
            return asset('images/'.$basename);
        }

}
