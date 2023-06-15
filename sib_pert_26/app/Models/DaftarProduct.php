<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarProduct extends Model
{
    use HasFactory;
    protected $table = 'daftar_products';
    protected $fillable = ['name','category_id','qty','price','description','image'];

    public function cateoryProduct() 
    {
        return $this->belongsTo(CategoryProduct::class , 'category_id' , 'id');
    }
}
