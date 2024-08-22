<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    // use HasFactory;

    protected $table = 'm_stok';
    protected $primaryKey = 'IdStok';
    public $timestamps = false;
    // protected $fillable = ['NamaBarang'];
}
