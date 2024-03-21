<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mf extends Model
{
    use HasFactory;
    protected $table = 'mfs';
    protected $fillable = [
        'mf_name'
    ];
    //1 nhà MF-có nhiều Xe
   //$this->hasMany('App\Models\Car', 'foreign_key
   // của Car', ‘local_key của MF');
    public function cars(){
        return $this->hasMany('App\Models\Car', 'mf_id', 'id');
    }
     
}