<?php

namespace App\Http\Controllers\Governorate;

use App\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class governorateController extends Controller
{
    //========================   validate  function
    private  function validatePost($request){
        $rules =[
            "name"=>"required",
        ];
        $message = [
            "name.required" => "name must  have value",
        ];
        $this->validate($request,$rules,$message);
    }



    public function index()
    {
        $records = Governorate::paginate(10);
        return view('governorates.index',compact('records'));
    }


    public function create()
    {
        return view("Governorates.create");
    }


    public function store(Request $request)
    {
        $this->validatePost($request);
        Governorate::create($request->all());
        return redirect('admin/governorate')->with('status' , 'governorate was create successfully :)');
    }





    public function edit($id)
    {
        $record = Governorate::findOrFail($id);
        return view('governorates.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {
        $this->validatePost($request);
        $record = Governorate::findOrFail($id);
        $record->update($request->all());
        return redirect('admin\governorate')->with('status' , 'governorate was updated successfully :)');
    }


    public function destroy($id)
    {
        $record = Governorate::findOrFail($id);
        $record->delete();
        return redirect('admin\governorate')->with('status' , 'governorate was deleted successfully :)');
    }
}
