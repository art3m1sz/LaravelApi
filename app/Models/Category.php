<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id_category';
    protected $fillable = ['category_name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_category');
    }
}

