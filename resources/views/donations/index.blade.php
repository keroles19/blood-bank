@extends('layouts.app')


@section('content')
    @inject('blood','App\BloodType')
    @inject('client','App\Client')
    @inject('city','App\City')


@section('page_title')
    Donations
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
                        <input type="search" class="form-control d-inline"  name="search" id="donationSearch" placeholder="search donation">
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
                                <th>blood_type</th>
                                <th>city</th>
                                <th>client</th>
                                <th>setting</th>


                            </tr>
                            </thead>
                            <tbody id="table-body">
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$record->name}}</td>
                                    <td>{{$blood::find($record->blood_type_id)->getAttribute('name')}}</td>
                                    <td>{{$city::find($record->city_id)->getAttribute('name')}}</td>
                                    <td>{{$client::find($record->client_id)->getAttribute('name')}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{url('admin/donation/'.$record->id)}}">
                                            <span class="fa fa-info-circle fa-1x"> Show donation</span>

                                        </a>
                                    </td>
                                    <td>
                                        <form action={{url('admin/donation/delete/'.$record->id)}} method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-left">Delete</button>
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
                    There's no Donation
                </div>
            </div>
        </div>
    @endif





</section>
<!-- /.content -->
@endsection
