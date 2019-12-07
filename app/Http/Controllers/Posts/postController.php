<?php

namespace App\Http\Controllers\Posts;


use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class postController extends Controller
{

    //========================   validate  function
    private  function validatePost($request){
        $rules =[
            "title"=>"required",
            "body" =>"required",
            "image"=>'image|mimes:png,jpg,jpeg|max:1999',
            "category_id"=>"required|exists:categories,id",
        ];
        $message = [
            "title.required" => "title must  have value",
            "body.required" => "description must have value",
            "required" => "category must  have value",
            "exists" => "category must  have valid  value",

        ];
        $this->validate($request,$rules,$message);
    }




    public function index()
    {


        $records = Post::paginate(10);
        return view('Posts.index',compact('records'));
    }


    public function create()
    {
        return view("Posts.create");
    }

    public function store(Request $request)
    {

       $this->validatePost($request);

       $filename = saveImage($request);
        $post = Post::create($request->all());
        $post->image = $filename;
        $post->save();
        return redirect('admin\post')->with('status' , 'post was create successfully :)');

    }
    public function show($id)
    {

        $record = Post::findOrFail($id);
        return view('Posts.show',compact('record'));


    }
    public function edit($id)
    {
        $record = Post::findOrFail($id);
        return view('Posts.edit',compact('record'));
    }


    public function update(Request $request, $id)
    {


        $this->validatePost($request);
        $record = Post::findOrFail($id);
        if($record){
            global  $filename;
            $filename= $record->image;
              if($request->hasFile('image')){
                  if($record->image && file_exists('images/'.$record->image)){
                      File::delete('images/'.$record->image);
                      $filename = saveImage($request);

                  }
                  else{
                      $filename = saveImage($request);
                  }

          }

            $record->update($request->all());
            $record->image = $filename;
            $record->save();
            return redirect('admin\post')->with('status' , 'post was updated successfully :)');

        }
        else{
            return redirect('admin\edit\\'.$id)->with('error' , 'please try again ');

        }

    }


    public function destroy($id)
    {
        $record = Post::findOrFail($id);
        $path = 'images/'.$record->image;

        if($record->delete()){
            if(file_exists($path)){
                File::delete($path);
            }
            return redirect('admin\post')->with('status' , 'post was deleted successfully :)');
        }
        else{
            return redirect('admin\post\\'.$id)->with('error' , 'Error please try again');
        }

    }
}
