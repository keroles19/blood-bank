<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    //========================   validate  function
    private  function validateSetting($request){
        $rules =[
            "phone"=>"required|Numeric",
            "phone_email"=>"required|E-Mail",

        ];
        $message = [
            "phone_email.required" => "App email is required"
        ];

        $this->validate($request,$rules,$message);
    }



    public function index()
    {
        $record = Setting::first();
        return view('Settings.setting',compact('record'));
    }

    public function update(Request $request, $id)
    {

        $this->validateSetting($request);
        $record = Setting::findOrFail($id);
        $record->update($request->all());
        return redirect('admin\setting')->with('status' , 'Setting was updated successfully :)');
    }


}
