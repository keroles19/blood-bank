<?php

namespace App\Http\Controllers\City;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cityController extends Controller
{
    //========================   validate  function
    private  function validatePost($request){
        $rules =[
            "name"=>"required",
            "governorate_id" => "required|exists:governorates,id"
        ];
        $message = [
            "name.required" => "name must  have value",
        ];
        $this->validate($request,$rules,$message);
    }



    public function index()
    {
        $records = City::paginate(10);
        return view('cities.index',compact('records'));
    }


    public function create()
    {
        return view("cities.create");
    }


    public function store(Request $request)
    {
        $this->validatePost($request);
        City::create($request->all());
        return redirect('admin\city')->with('status' , 'governorate was create successfully :)');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $record = City::findOrFail($id);
        return view('cities.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {
        $this->validatePost($request);
        $record = City::findOrFail($id);
        $record->update($request->all());
        return redirect('admin\city')->with('status' , 'governorate was updated successfully :)');
    }


    public function destroy($id)
    {
        $record = City::findOrFail($id);
        $record->delete();
        return redirect('admin\city')->with('status' , 'governorate was deleted successfully :)');
    }
}
