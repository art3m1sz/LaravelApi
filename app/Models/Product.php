<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    protected $fillable = ['product_name', 'stock', 'price', 'product_image', 'id_category'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    // public function getImageAttribute($value)
    // {
    //     return $value ? base64_encode($value) : null;
    // }

}

