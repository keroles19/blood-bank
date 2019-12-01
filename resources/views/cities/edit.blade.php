@extends('layouts.app')

@section('content')
@inject('governorate','App\Governorate')
@section('page_title')
    Edit city
@endsection()


<!-- Main content -->
<section class="content">

    <div class="row justify-content-center">
        <div class="col-9 ">
            @include('partials.error')
            <div class="card card-primary">
                <div class="card-header bg-info">
                    <h3 class="card-title">Edit city</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="{{url('admin/city/'.$record->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="titleForPost">name</label>
                            <input type="text" value="{{$record->name}}" name="name" class="form-control" id="name" placeholder="Enter name for governorate">
                        </div>
                        <div class="form-group">
                            <label>Governorate</label>
                            <select id="inputState" name="governorate_id" class="form-control">
                                @foreach($governorate::all() as $g)
                                    <option @if($g->id == $record->category_id) selected @endif value="{{$g->id}}">{{$g->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
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
