<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    
    use HasFactory;
    use Sluggable;
    protected $fillable=['title','description','status','finished_at','slug'];
  
    protected $dates=['finished_at'];

    protected $appends = ['details','my_rank'];
//ilişki için
    public function my_result(){
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);
    }


    public function getDetailsAttribute(){
        if($this->results()->count()>0){
        return [
                'average'=>round($this->results()->avg('point')),
                'join_count'=>$this->results()->count(),
        ];
    }
        return null;
        
    }
        //sql tablo alanıymış gibi 
    public function getMyRankAttribute(){
        // return $this->results()->where('user_id',auth()->user()->id);
        $rank = 0;  
        foreach ($this->results()->orderByDesc('point')->get() as $result){
               $rank+=1;
               if(auth()->user()->id == $result->user_id) 
               {
                return $rank;
               }
        }
    }
    

    //ilişki için
    public function results(){
        return $this->hasMany('App\Models\Result');
    }
    //ilişki içinde ilişki için
    public function topTen(){
        return $this->results()->orderByDesc('point')->take(10);
    }
  //carbon kullanabilmek için yazdık diffforhuman için
    public function getFinished($date){
        return $date ? Carbon::parse($date):null;
    }
    //ilişki için
    public function questions(){
        return $this->hasMany('App\Models\Question');
    }

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
