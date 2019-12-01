@extends('layouts.app')


@section('content')

@section('page_title')
    Posts
@endsection()


<!-- Main content -->
<section class="content">


    @include('partials.error')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{url("admin/post/create")}}" class="btn btn-block btn-primary">
                                <span class="fa fa-1x fa-plus">Add Post</span>
                            </a>
                        </h3>
                    </div>
                @if(count($records))
                    <!-- /.card-header -->
                    <div class="table-responsive ">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>body</th>
                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$record->title}}</td>
                                <td>{{$record->body}}</td>
                                <td>
                                    <a href="{{url("admin/post/".$record->id)}}" class="btn btn-sm btn-success btn-block">
                                        <span class="fa fa-info-circle fa-1x"> Show details</span>
                                    </a>
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
                        There's not Posts
                    </div>
                </div>
            </div>
        @endif





</section>
<!-- /.content -->
@endsection
