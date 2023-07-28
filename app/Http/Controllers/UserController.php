<?php

namespace App\Http\Controllers;

//namespace App\Http\Requests\;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\user_register;
use App\UserModel;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function login()
    {
        return view('user.login');
    }

    public function userSubmit(Request $request)
    {
        if($request->isMethod('post')){
            
            $data = $request->input();
            // if(Auth::guard('appuser')->attempt(['msisdn'=>$data['login'],'password'=>$data['password']]))

            if ($data['login'] !== null) 
             {
                $UserData = UserModel::UserDetails($data['login']);

                if ($UserData['is_active']) {

                    Session::put('UserId', $UserData['id']);

                    return redirect('/profile');

                }else {
                    Auth::guard('appuser')->logout();
                    return redirect('/login')->with('flash_message_error','Something went wrong , Please try again.');
                }
                
            }else{ 
               return redirect('/login')->with('flash_message_error','Invalid Phone number or Password');
            }
        }
        
        return redirect('/login');
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('appuser')->logout();
        return redirect('/');
    }

    public function register()
    {
        return view('user.register_msisdn');
    }

    /**
     * Store a new blog post.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return Illuminate\Http\Response
    */
    public function store(UserRequest $request)
    {
         //return $request;
        //  $request->validate(['file' => 'required|mimes:png,jpeg,jpg,|max:20480']);
        //  $image_name = $request->file->getClientOriginalName();
        //  $image_path = $request->imageUpload . "_" . md5(time()) . "_" . $request->file->getClientOriginalName();
        //  $image = $request->file('imageUpload');
        //  dd($image);
        //  $image->move(public_path('/user_images'),$image_path);
         //$abc = $request->file->store('user_registers', $image_path);
        $admin = user_register::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'countrycode' => $request->countrycode,
            'region' => $request->region,
            'phone' => $request->phone,
            // 'image_name' => $image_name,
            // 'image_path' => $image_path,

        ]);
        $last_id = $admin['id'];
        if ($last_id) {
            return redirect(route('logined'));
        }

    }
}
