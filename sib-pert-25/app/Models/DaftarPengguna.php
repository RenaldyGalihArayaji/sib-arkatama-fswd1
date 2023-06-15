<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPengguna extends Model
{
    use HasFactory;

    protected $table = 'daftar_pengguna';
    protected $fillable = ['name','gender','address','group_id'];

    public function groupPengguna() 
    {
        return $this->belongsTo(GroupPengguna::class , 'group_id' , 'id');
    }
}
