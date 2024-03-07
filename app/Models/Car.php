<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
       'model',
       'description',
       'brand',
       'produced_on',
       'image'
    ];
    protected $table = 'cars';
    
}