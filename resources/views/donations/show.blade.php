@extends('layouts.app')

@inject('blood','App\BloodType')
@inject('client','App\Client')
@inject('city','App\City')
@section('content')

@section('page_title')
    Donation details
@endsection()


<!-- Main content -->
<section class="content">

    <div class="card mt-4">
        <div class="card-header bg-primary">
            {{$record->name}}
        </div>
        <div class="card-body">
            <label>Age</label>
            <p class="card-text form-control">{{$record->age}}</p>
            <label>blood type</label>
            <p class="form-control">{{$blood::find($record->blood_type_id)->getAttribute('name')}}</p>
            <label>City</label>
            <p class="form-control">{{$city::find($record->city_id)->getAttribute('name')}}</p>
            <label>bugs number</label>
            <p class="form-control">{{$record->bags_num}}</p>
            <label>Hospital name</label>
            <p class="form-control">{{$record->hospital_name}}</p>
            <label>Hospital Address</label>
            <p class="form-control">{{$record->hospital_address}}</p>
            <label>Notes</label>
            <p class="form-control">{{$record->notes}}</p>
            <label>User Name</label>
            <p class="form-control">{{$client::find($record->client_id)->getAttribute('name')}}</p>
            <p class="text-muted">{{$record->created_at}}</p>



            <a href="{{url('admin/donation')}}" class="btn btn-success float-left mr-2">Back
                <span class="fa fa-1x fa-arrow-right" ></span>
            </a>

        </div>
    </div>
</section>
@endsection
