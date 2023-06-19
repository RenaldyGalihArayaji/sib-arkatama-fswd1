<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarProduct extends Model
{
    use HasFactory;


    protected $table = 'daftar_products';
    protected $fillable = ['name','category_id','qty','price','description','image'];

    /**
     * Get all of the category for the DaftarProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
