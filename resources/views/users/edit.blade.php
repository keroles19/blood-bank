@extends('layouts.app')

@section('content')
    @inject('role','Spatie\Permission\Models\Role')

@section('page_title')
    Edit User
@endsection()


<!-- Main content -->
<section class="content">

    <div class="row justify-content-center">
        <div class="col-9 ">
            @include('partials.error')
            <div class="card card-primary">
                <div class="card-header bg-info">
                    <h3 class="card-title">Edit role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="{{url('admin/user/'.$record->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label >name</label>
                            <input type="text" name="name" value="{{$record->name}}" class="form-control"  placeholder="Enter user name">
                        </div>
                        <div class="form-group">
                            <label for="titleForPost">Email</label>
                            <input type="email" name="email" value="{{$record->email}}" class="form-control"  placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Role </label>
                            <select  id="inputState" name="roles_list" class="form-control" >
                                <option selected disabled >Choose role</option>
                                @foreach($role::all() as $r)
                                    <option value="{{$r->id}}"
                                         @foreach($record->roles as $rRoles)
                                             @if($rRoles->id === $r->id)
                                                 selected
                                                 @endif
                                             @endforeach
                                            @if($r ==  $record->roles)
                                            selected
                                            @endif
                                    >{{$r->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>



            </div>
        </div>

    </div>









</section>
<!-- /.content -->
@endsection
