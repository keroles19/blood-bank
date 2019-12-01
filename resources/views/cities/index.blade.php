@extends('layouts.app')

@inject('governorate','App\Governorate')
@section('content')


@section('page_title')
    Cities
@endsection()


<!-- Main content -->
<section class="content">

    @include('partials.error')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{url("/admin/city/create")}}" class="btn btn-block btn-primary">
                                <span class="fa fa-1x fa-plus">Add city</span>
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
                                <th>name</th>
                                <th>governorate</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$record->name}}</td>
                                <td>{{$governorate::find($record->governorate_id)->getAttribute('name')}}</td>
                                <td>
                                    <a href="{{url('admin/city/'.$record->id.'/edit')}}" class="btn btn-success float-left mr-2">
                                        <span class="fa fa-info-circle fa-1x"> Edit</span>
                                    </a>

                                    </a>
                                </td>
                                <td>
                                    <form action={{url('admin/city/'.$record->id)}} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-left">
                                            <span class="fa fa-info-circle fa-1x"> Delete</span></button>
                                    </form>
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
                        There's no governorate
                    </div>
                </div>
            </div>
        @endif





</section>
<!-- /.content -->
@endsection
