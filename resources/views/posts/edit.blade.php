@extends('layouts.app')

@inject('category','App\Category')
@inject('model','App\Post')
@section('content')

@section('page_title')
    Edit Post
@endsection()


<!-- Main content -->
<section class="content">

    <div class="row justify-content-center">
        <div class="col-9 ">
            @include('partials.error')
            <div class="card card-primary">
                <div class="card-header bg-info">
                    <h3 class="card-title">Create Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('admin/post/'.$record->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="titleForPost">Title</label>
                            <input type="text"value="{{$record->title}}" name="title" class="form-control" id="title" placeholder="Enter title for post">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Picture</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" value="{{$record->image}}" class="custom-file-input" id="Image" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titleForPost">Descripe post</label>
                            <textarea class="form-control"  name="body">{{$record->body}}"</textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select  id="inputState" name="category_id" class="form-control">
                                @foreach($category::all() as $c)
                                    <option  @if($c->id === $record->category_id) selected @endif  value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-1x fa-save"> save</span>
                        </button>
                    </div>
                </form>




            <!--  form end       -->
                {{--            @include('partials.form')--}}

            </div>
        </div>

    </div>
</section>
<!-- /.content -->
@endsection
