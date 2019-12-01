@extends('layouts.app')

@inject('client','App\Client')

@section('content')

@section('page_title')
    Dashboard
@endsection()



<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">{{$client->count()}}</span>
                </div>


                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>

</section>
<!-- /.content -->
@endsection
