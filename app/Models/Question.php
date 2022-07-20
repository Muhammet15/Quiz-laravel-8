<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{  
    protected $fillable=['question','image','answer1','answer2','answer3','answer4','correct_answer'];

    protected $appends = ['true_percent'];

    use HasFactory;

    public function getTruePercentAttribute(){
        $answer_count = $this->answer()->count();
        $true_answer = $this->answer()->where('answer',$this->correct_answer)->count();
        return  round((100/$answer_count) *$true_answer);
    }
    public function answer(){
        return $this->hasMany('App\Models\Answer');
    }
    //bizim o soruya verdiğimiz cevap ilişki ile getirdik
    public function my_answer(){
        return $this->hasOne('App\Models\Answer')->where('user_id',auth()->user()->id);
    }
}
