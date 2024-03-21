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
       'image',
        "mf_id" 
    ];
    protected $table = 'cars';

//     return $this->belongsTo('App\Models\Mf', 'foreign_key của
//     Car', 'KHÓA CHÍNH của Car');
    public function mf()
    {
        return $this->belongsTo('App\Models\Mf','mf_id','id' );
    }
    
}