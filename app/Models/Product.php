<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function image(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags(){
        return $this
            ->belongsToMany(Tag::class, 'product_tags',
                'product_id', 'tag_id')
            ->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    use HasFactory;
}