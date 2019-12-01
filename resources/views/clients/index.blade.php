@extends('layouts.app')


@section('content')

@section('page_title')
    Clients
@endsection()


<!-- Main content -->
<section class="content">

    @include('partials.error')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-1 pl-5 pt-1">
                    <span class="fa fa-1x fa-search d-inline" ></span>
                </div>
                <div class="col-8 mb-1">
                    <form>
                        <input type="search" class="form-control d-inline"  name="search" id="clientSearch" placeholder="search about user">
                    </form>
                </div>

            </div>
            <div class="card">
                <div class="card-header">
                </div>
            @if(count($records))
                <!-- /.card-header -->
                    <div class="table-responsive ">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>phone</th>
                                <th>name</th>
                                <th>email</th>
                                <th>setting</th>
                                <th>status</th>


                            </tr>
                            </thead>
                            <tbody id="table-body">
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$record->phone}}</td>
                                    <td>{{$record->name}}</td>
                                    <td>{{$record->email}}</td>
                                    <td>
                                        <form action={{url('admin/client/delete/'.$record->id)}} method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-left">Delete</button>
                                        </form>

                                    </td>
                                    <td>

                                        <!-- active and de-active button by ajax -->
                                        <form action="{{url('admin/client/status/'.$record->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class= "btn btn-sm {{activeStatus($record->active)[0]}} ">
                                                @if($record->active !=0)
                                                   {{ activeStatus($record->active)[1]}}
                                                @else active
                                                @endif
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

            </div>
            <div class="d-flex justify-content-center">
                {{$records->links()}}
            </div>

            <!-- /.card -->
        </div>

    </div>
    @else
        <div class="row">
            <div class="col-11 m-3 px-3">
                <div class="alert alert-info">
                    There's no client
                </div>
            </div>
        </div>
    @endif





</section>
<!-- /.content -->
@endsection
