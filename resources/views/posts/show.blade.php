@extends('layouts.app')

@inject('category','App\Category')
@section('content')

@section('page_title')
   Post details
@endsection()


<!-- Main content -->
<section class="content">

    <div class="card mt-4">
        <div class="card-header bg-gradient-secondary">
            {{$record->title}}
        </div>
        <div class="card-body">
            @if($record->image)
            <img class="card-img-top" src="{{asset('images/'.$record->image)}}" >
           @endif
            <h5 class="card-title ">{{$record->title}}</h5>
            <p class="card-text">{{$record->body}}</p>
            <p class="text-muted">{{$record->created_at}}</p>
             <p class="text-muted"><span class="text-bold">Category is : </span>{{$category::find($record->category_id)->getAttribute('name')}}</p>



                <a href="{{url('admin/post/'.$record->id.'/edit')}}" class="btn btn-success float-left mr-2">Edit</a>
                    <form action={{url('admin/post/'.$record->id)}} method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-left">Delete</button>
                    </form>
                <a href="{{url('admin/post')}}" class="btn btn-primary float-left ml-2">Back
                    <span class="fa fa-1x fa-arrow-right" ></span>
                </a>


        </div>
    </div>
</section>
@endsection
