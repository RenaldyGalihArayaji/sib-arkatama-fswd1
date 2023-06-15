<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPengguna extends Model
{
    use HasFactory;

    protected $table = 'group_pengguna';
    protected $fillable = ['name'];

    public function daftarPengguna() 
    {
        return $this->hasMany(DaftarPengguna::class , 'group_id' , 'id');
    }
   
  
}
