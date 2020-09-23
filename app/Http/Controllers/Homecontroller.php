<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Adminlogin;
use App\Mail\Forgotpasswordmail;
use Auth;

class Homecontroller extends Controller
{

    function login(){
      return view('login');
    }

    function dashboard(){
      $role_type = session('user_session')->admin_role_type;
      if($role_type=='1'){
          return view('admin.dashboard');
        }else{
          echo "subadmin";
        }
    }

    function checklogin(Request $request)
    {
        $email=$request->post('email');
        $password=md5($request->post('password'));
        $user = Adminlogin::where('email_id', $email)
                  ->where('password',md5($request->password))
                  ->first();
        if($user){
            Auth::login($user);
            $request->session()->put('user_session', $user);
            return redirect('admin/dashboard');
        }else{
            return redirect()->back()->with(array('status'=>'danger','msg'=>"Invalid login credentials!."));

        }
    }



    function forgotpassword(){
       // echo "1";exit;
       $details=[
         'title'=>'Forgot password',
         'body'=>'Password is 123456.'
       ];
       Mail::to('kamal.happysanz@gmail.com')->send(new Forgotpasswordmail($details));
       return "Email Sent";

     }

}
