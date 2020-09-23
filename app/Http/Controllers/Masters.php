<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Masters extends Controller
{
    function app_intro_video(){
      if(session()->has('user_session')){
      $role_type = session('user_session')->admin_role_type;
      if($role_type=='1'){
          return view('admin.masters.app_intro_video');
        }else{
          echo "subadmin";
        }
      }else{
        return redirect('/admin/login');
      }
    }



    function save_intro_video(Request $request){
      $role_type = session('user_session')->admin_role_type;
      if($role_type=='1'){
        $validate_data=$request->validate([
        'video_title'=>'required',
        'video_details'=>'required',
        'video_link'=>'required',
      ],[
        'video_title.required'=>'Video title  is required',
        'video_details.required'=>'Video details  is required',
        'video_link.required'=>'Video link  is required',
      ]);

      }else{
        return redirect('/admin/login');
      }





    }
}
