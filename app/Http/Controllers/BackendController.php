<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail ;
use Illuminate\Support\Facades\DB ;
class BackendController extends Controller
{
    public function index()
    {
        
        return view("Login.login");
    }
    public function sendotp(Request $request)
    {
        $check = DB::table("tbl_user")->where("email",$request->email)->first();
        if(empty($check))
            return redirect()->back()->with("error","Email is Not correct");


        $otp = $FiveDigitRandomNumber = rand(10000,99999); 
        $update = DB::table("tbl_user")->where("email",$request->email)->update(["otp"=>$otp]);

        $details = [
            'name' => 'Balaji Bhise',
            'OTP' => $otp
        ];

   
       
        Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));

        setcookie("email",$request->email,time() + (60*10));
        $path = "/?flag=1";
        return redirect($path)->with("email",$request->email);
       
    }
    
    function verifylogin(Request $request)
    {
        
        $check = DB::table("tbl_user")->where("email",$request->emailid)->where("otp",$request->OTP)->first();
        if(!empty($check))
        {
            session()->put("user",$check);
            setcookie("email", "", time() - 3600);
            return view("Login.Dash");
        }
        $path = "/?flag=1";
        return redirect($path)->with("email",$request->emailid);
    }
}
