<?php

namespace App\Http\Controllers;

use App\user_register;
use Illuminate\Http\Request;
use App\UserModel;
use App\UserOtpModel;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function otpgenerate(Request $request)
    {
        $validator=Validator::make($request->all(), [
                                                        'msisdn' => 'required',
                                                    ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            if($request->isMethod('post'))
            {
                $otp = mt_rand(1000,9999);
                $msisdn = $request['msisdn'];

                $user_check = UserModel::whereMsisdn($msisdn)->first();

                if(!empty($user_check))
                {
                    $get_user = $user_check['msisdn'];
                    $id = $user_check['id'];
                    
                    $now = time();
                    $ten_minutes = $now + (10 * 60);
                    $startDate = date('Y-m-d H:i:s', $now);
                    $endDate = date('Y-m-d H:i:s', $ten_minutes);

                    $user_dtl = UserOtpModel::whereMsisdn($msisdn)->first();

                    $user_dtl->otp = $otp;
                    $user_dtl->otp_created = $startDate;
                    $user_dtl->otp_expired = $endDate;
                    $user_dtl->save();

                    return redirect('/otpSubmit')->with('get_user',$get_user);
                }
                else
                {
                    $user = UserModel::create([
                            'first_name' => 'Test',
                            'last_name' => 'LinkIT',
                            'msisdn' => $msisdn,
                            'otp' => '',
                            'password' => '$2a$04$Zz3HsojmxD8j2iwLAkH6FuZCJWvHTsZGKv7/VXenx6A87uoV7Ip5y',
                            'status' => 'inactive',
                            'is_active' => 1,
                            'created_at' => now()->format('Y-m-d H:i:s'),
                            'updated_at' => now()->format('Y-m-d H:i:s'),
                        ]);

                    if(UserModel::latest()->first()->id)
                    {
                        $now = time();
                        $ten_minutes = $now + (10 * 60);
                        $startDate = date('Y-m-d H:i:s', $now);
                        $endDate = date('Y-m-d H:i:s', $ten_minutes);

                        $otp = UserOtpModel::create([
                                                'msisdn' => $msisdn,
                                                'otp' => $otp,
                                                'otp_created' => $startDate,
                                                'otp_expired' => $endDate
                                            ]);

                        $last_id= UserModel::latest()->first()->id;
                        $user_check = UserModel::whereId($last_id)->first();

                        $get_user = $user_check['msisdn'];
                        return redirect('/otpSubmit')->with('get_user',$get_user);
                    }
                    else
                    {
                        return view('user.register_msisdn');
                    }
                }
            }
        }
    }

    public function otpSubmit(Request $request)
    {
        return view('user.register_otp');

    }

    public function otpVerify(Request $request)
    {
        $validator=Validator::make($request->all(), [
                                                        'otp' => 'required',
                                                    ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            if($request->isMethod('post'))
            {
                $msisdn = $request['msisdn'];
                $otp = $request['otp'];

                $user_check = UserModel::whereMsisdn($msisdn)->first();
               
                if(!empty($user_check))
                {
                    $otp_check = UserOtpModel::where(array('msisdn' => $msisdn,'otp'=>$otp))->first();

                    if(!empty($otp_check))
                    {
                        $current_time = now()->format('Y-m-d H:i:s');

                        if($current_time <= $otp_check->otp_expired)
                        {
                            return redirect('/otpSubmit')->with('flash_message_success','Sign Up Successful.');
                        }
                        else
                        {
                            return redirect('/otpSubmit')->with('flash_message_error','OTP expired, Please try again.');
                        }
                    }
                    else
                    {
                        return redirect('/otpSubmit')->with('flash_message_error','OTP not matched.');
                    }
                }
                else
                {
                    return redirect('/otpSubmit')->with('flash_message_error','Please Re-try.');
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user_register  $user_register
     * @return \Illuminate\Http\Response
     */
    public function show(user_register $user_register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_register  $user_register
     * @return \Illuminate\Http\Response
     */
    public function edit(user_register $user_register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_register  $user_register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_register $user_register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_register  $user_register
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_register $user_register)
    {
        //
    }
}
