<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
