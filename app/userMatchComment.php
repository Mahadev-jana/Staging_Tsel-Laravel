<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userMatchComment extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['comment','match_id','user_id','created_at'];
    public function scopefindCommentById($query, $user_id)
    {
        return $query->where('user_id',$user_id);
    }

}
