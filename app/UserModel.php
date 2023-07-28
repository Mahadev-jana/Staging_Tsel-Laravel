<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
	protected $guard = 'appuser';

    protected $table = 'user';

    protected $fillable = ['first_name','last_name','password','gender','dial_code','phone_no', 'msisdn',  'otp','status','subscription_status','subscription_type','freemium','ip_address','subscribe_date','subscribe_expired_date','country','img','coins','identity_key','zone','last_login','is_active','created_at','updated_at'];

    public $timestamps = false;

   public function scopeUserDetails($query,$phone_no)
    {
        return $query->where('msisdn', $phone_no)->first();
    }
}
