<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable=['user_id','quiz_id','point','correct','wrong'];

    public function user(){
        //ilişki için user_id verilerini alabilmek için
        return $this->belongsTo('App\Models\User');
    }

}
