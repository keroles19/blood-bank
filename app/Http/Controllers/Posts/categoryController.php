<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //========================   validate  function
    private  function validateCategory($request){
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
        $records = Category::paginate(10);
        return view('Posts/categories.index',compact('records'));
    }


    public function create()
    {
        return view("Posts/categories.create");
    }


    public function store(Request $request)
    {
        $this->validateCategory($request);
        Category::create($request->all());
        return redirect('admin/category')->with('status' , 'category was create successfully :)');
    }





    public function edit($id)
    {
        $record = Category::findOrFail($id);
        return view('Posts/categories.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {
        $this->validateCategory($request);
        $record = Category::findOrFail($id);
        $record->update($request->all());
        return redirect('admin\category')->with('status' , 'category was updated successfully :)');
    }


    public function destroy($id)
    {
        $record = Category::findOrFail($id);
        $record->delete();
        return redirect('admin\category')->with('status' , 'category was deleted successfully :)');
    }
}
