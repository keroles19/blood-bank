@extends('layouts.app')

@inject('category','App\Category')
@inject('model','App\Post')
@section('content')

@section('page_title')
    Create Post
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

                <form action="{{url('admin/post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="titleForPost">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title for post">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Picture</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="Image" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titleForPost">Descripe post</label>
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select id="inputState" name="category_id" class="form-control">
                                <option selected>Choose Category</option>
                                @foreach($category::all() as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                <!--  form end       -->
                {{--                @include('partials.form')--}}

            </div>
        </div>

    </div>









</section>
<!-- /.content -->
@endsection
