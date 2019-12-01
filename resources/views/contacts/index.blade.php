@extends('layouts.app')


@section('content')

@section('page_title')
    Contacts
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
                        <input type="search" class="form-control d-inline"  name="search" id="contactSearch" placeholder="search about message">
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
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>subject</th>
                                <th>message</th>
                                <th>delete</th>


                            </tr>
                            </thead>
                            <tbody id="table-body">
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$record->name}}</td>
                                    <td>{{$record->email}}</td>
                                    <td>{{$record->phone}}</td>
                                    <td>{{$record->subject}}</td>
                                    <td>{{$record->message}}</td>
                                    <td>
                                    <td>
                                        <form action={{url('admin/contact/delete/'.$record->id)}} method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-left">Delete</button>
                                        </form>

                                    </td>
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
                    There's no message
                </div>
            </div>
        </div>
    @endif





</section>
<!-- /.content -->
@endsection
