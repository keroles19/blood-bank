@extends('layouts.app')

@inject('perm','Spatie\Permission\Models\Permission');

@section('content')

@section('page_title')
    Create Role
@endsection()


<!-- Main content -->
<section class="content">

    <div class="row justify-content-center">
        <div class="col-9 ">
            @include('partials.error')
            <div class="card card-primary">
                <div class="card-header bg-info">
                    <h3 class="card-title">Create role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="{{url('admin\role')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="titleForPost">name</label>
                            <input type="text" name="name" class="form-control" id="title" placeholder="Enter name for role">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="titleForPost">display name</label>--}}
{{--                            <input type="text" name="guard_name" class="form-control" id="display-name" placeholder="Enter display name for role">--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="description">description </label>
                            <textarea name="description"  class="form-control" rows="10" ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="checkbox">Permissions</label>
                            <div class="row">
                                @foreach($perm::all() as $permission)
                                    <div class="col-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="{{$permission->id}}" name="permissions_list[]">
                                                {{$permission->name}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
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
