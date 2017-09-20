<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    //protected $table = 'the_name_of_the_table;

    protected $fillable = [
      'user_id' , 'content', 'live', 'post_on' , 'title'
    ];

    protected  $dates = ['post_on','deleted_at'];
    //protected $guarded = ['id'];

    public function setLiveAttribute($value){
        $this->attributes['live']=(boolean)($value);
    }

    public function getShortContentAttribute(){
        return substr($this->content, 0 , random_int(150,250)).'...';
    }

    public function setPostOnAttribute($value)
    {
        $this->attributes['post_on'] = Carbon::parse($value);
    }

    public function user(){
       return $this->belongsTo(User::class);
    }
}
