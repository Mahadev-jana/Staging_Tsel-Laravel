<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    //

    protected $fillable = ['order','id','competition_name','competition_id','old_logo', 'white_logo',  'pos','sportsmonks_id',];

    // public function findSportsmonksId($quary,$id)
    // {
    //     return $quary->where('competition_id',$id);
    // }
    public function scopefindSportsmonksId($query, $deleted_at)
    {
        return $query->where('competition_id',$deleted_at);
    }

    public function scopeGetleagueRecord($query)
    {
        return $query->get();
    }

    public function scopeGetLeagueDetails($query,$league_id)
    {
        $records = $query->where('id','=',$league_id)->first();

        return $records;
    }

    public function scopeGetLeagueDetailsBySportsmonkId($query,$league_id)
    {
        $records = $query->where('sportsmonks_id','=',$league_id)->first();

        return $records;
    }


}
