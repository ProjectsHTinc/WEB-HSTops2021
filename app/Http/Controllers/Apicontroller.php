<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userlogin;

class Apicontroller extends Controller
{
  public function generateOTP(Request $request){
    echo $mobile_number = $request->input('mobile_number');
	exit;
	
 
  }

  public function login(Request $request){
    echo $mobile_number = $request->input('mobile_number');
	echo $OTP = $request->input('OTP');
	exit;

  }

}
