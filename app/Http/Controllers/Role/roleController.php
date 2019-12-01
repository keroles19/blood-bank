<?php

namespace App\Http\Controllers\Posts;

use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class roleController extends Controller
{
    //========================   validate  function
    private  function validateRole($request){
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
        $records = Role::paginate(10);
        return view('Posts/categories.index',compact('records'));
    }


    public function create()
    {
        return view("Posts/categories.create");
    }


    public function store(Request $request)
    {
        $this->validateCategory($request);
        Role::create($request->all());
        return redirect('admin/role')->with('status' , 'Role was create successfully :)');
    }





    public function edit($id)
    {
        $record = Role::findOrFail($id);
        return view('role.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {
        $this->validateCategory($request);
        $record = Role::findOrFail($id);
        $record->update($request->all());
        return redirect('admin\role')->with('status' , 'Role was updated successfully :)');
    }


    public function destroy($id)
    {
        $record = Role::findOrFail($id);
        $record->delete();
        return redirect('admin\role')->with('status' , 'Role was deleted successfully :)');
    }
}
