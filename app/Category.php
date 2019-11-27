<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "parent_id"];
    protected $hidden = ['created_at', 'updated_at'];
    public function subCategory()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
