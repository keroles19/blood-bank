<?php

namespace App\Http\Controllers\Posts;


use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        if($request->hasfile('image'))
        {
            $file =$request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'post_image'.time().'.'.$ext;
//            $file->storeAs('public/postsImages',$filename);
            Image::make($file)->save(public_path('images/'.$filename,20));
        }
        else{
            $filename = 'noImage.png';
        }
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
        $record->update($request->all());
        return redirect('admin\post')->with('status' , 'post was updated successfully :)');
    }


    public function destroy($id)
    {
        $record = Post::findOrFail($id);
        $record->delete();
        return redirect('admin\post')->with('status' , 'post was deleted successfully :)');
    }
}
