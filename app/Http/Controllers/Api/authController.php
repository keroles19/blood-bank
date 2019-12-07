<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use App\client;




class authController extends Controller
{
    //============================== register service
    public function register(Request $request){

        $validate = validator()->make($request->all(),[

            "phone"=>"required",
            "name" =>"required",
            "email"=>"required|unique:clients",
            "date_of_birth"=>"required",
            "password"=>"required|confirmed",
            "blood_type_id"=>"required|exists:blood_types,id",
            "city_id"=>"required|exists:cities,id",

        ]);

        if($validate->fails()){
            return responseJson(0,$validate->errors()->first(),$validate->errors());
        }

        $request->merge(["password" => bcrypt($request->password)]); // hash password
        $client = Client::create($request->all());
        $client->api_token = str_random(60);                 // added random token
        $client->save();
       return responseJson(1,[
           "client" => $client,
           "api_token"=>$client->api_token
       ],"تم الاضافه بنجاح");

    }


    //============================== login service
    public function login(Request $request)
    {
        $validate = validator()->make($request->all(),[

            "phone"=>"required",
            "password"=>"required"

        ]);
        if($validate->fails()){
            return responseJson(0,$validate->errors()->first(),$validate->errors());
        }

        //return auth()->guard('api')->validate($request->all());

        $client = Client::where('phone',$request->phone)->first();
        if($client){

            if(\Hash::check($request->password,$client->password)){
                return responseJson("1",[
                    "api_token"=>$client->api_token,
                    "client"=>$client
                ],"تم تسجيل الدخول");
            }
            else{
                return responseJson(0,'بيانات الدخول  غير صحيحه');
            }

        }
        else{
            return responseJson(0,'بيانات الدخول  غير صحيحه');
        }

    }


    //============================== resetPassword  service
    public function resetPassword(Request $request)
    {
        $validate = validator()->make($request->all(), [

            "phone" => "required",
        ]);

        if ($validate->fails()) {
            return responseJson(0, $validate->errors()->first(), $validate->errors());
        }

        $user = client::where("phone", $request->phone)->first();
        if ($user) {
            $pincode = rand(1111, 9999);
            $update = $user->update(['pin_code' => $pincode]);
            if ($update) {
                Mail::to($user->email)
                    ->bcc("kerolesatef200@gmail.com")
                    ->send(new ResetPassword($pincode));

                return responseJson(1, "برجاء فحص الهاتف ", [
                    "pin code for your account is :" => $user->pin_code,
                    "mail_fails" => Mail::failures()
                ]);
            } else {
                return responseJson(0, "حدث خطاء حاول  مره اخري ");
            }
        } else {
            return responseJson(0, "لا يوجد حساب مرتبط بهذا الهاتف ");
        }
    }
    //=======================save new password
    public function password(Request $request){
        $validate = validator()->make($request->all(), [
            "pin_code"=>"required",
            "phone" => "required",
            "password" =>"required|confirmed"
        ]);
       if ($validate->fails()) {
            return responseJson(0, $validate->errors()->first(), $validate->errors());
        }
       $user = Client::where("pin_code",$request->pin_code)->where("pin_code","!=",0)
           ->where("phone",$request->phone)->first();
       if($user){

           $user->password = bcrypt($request->password);
           $user->pin_code = null;

           if($user->save()){
              return responseJson(1 , "تم تغير الرقم السري بنجاح  ");

           }
           else{
                  return responseJson(0 , "حدث خطاء حاول مره اخري");

           }
       }
       else{

           return responseJson(0 , "هذا الكود غير صحيح ");
       }

    }

    //==================================================================================
    //============================= get profile  service
    public  function  profile(Request $request){
        $id = auth()->user()->id;
        $user = Client::find($id);
        return responseJson(1,'معلومات الحساب ',$user);

    }

    //========================================   register  token
    public function registerToken(Request $request){

        $validate = validator()->make($request->all(),[

            "token"=>"required",
            "type" =>"required|in:andriod,ios"
        ]);
        if($validate->fails()){
            return responseJson(0,$validate->errors()->first(),$validate->errors());
        }

       Token::where("token",$request->token)->delete();
       $request->user()->tokens()->create($request->all());
       return responseJson(1,"تم التسجيل بنجاح");
    }

    //==========================================   remove   token
    public function removeToken(Request $request){

            $validate = validator()->make($request->all(),[
                "token"=>"required",
            ]);
            if($validate->fails()){
                return responseJson(0,$validate->errors()->first(),$validate->errors());
            }
            Token::where("token",$request->token)->delete();
            return responseJson(1,"تم الحذف  بنجاح");
        }


}
