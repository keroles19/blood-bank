
@extends('front.master')

@inject('bloodType','App\BloodType')
@inject('city','App\city')
@inject('client','App\Client')

@section('content')
    <!-- navigation -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <a href="{{url('/')}}" class="path-main" style="color: darkred; display:inline-block;">Home</a>
                <div  class="path-directio" style="color: grey; display:inline-block;"> / Donations</div>
            </div>

        </div>
    </section>


    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">


            <div class="row">
                <div class="col-lg-5">
                    <select name="blood_type_id" id="selectBlood">
                        <option  disabled selected>Select Blood Type</option>
                        @foreach($bloodType::all() as $blood)
                            <option value="{{$blood->id}}">{{$blood->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5">
                    <select name="city_id" id="selectCity">
                        <option disabled selected>Select City</option>
                        @foreach($city::all() as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search">
                    <button type="submit" id="frontSearch"><i class="col-lg-2 fas fa-search"></i></button>
                </div>
            </div>

            <div id="dataDonation">
                @foreach($donations as $donation)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="type">
                                        <h2>{{$bloodType::find($donation->blood_type_id)->getAttribute('name')}}</h2>
                                    </div>
                                </div>
                                <div class="data col-lg-6">
                                    <h4>Name: {{$client::find($donation->client_id)->getAttribute('name')}}</h4>
                                    <h4>Hospital:{{$donation->hospital_name}} </h4>
                                    <h4>City: {{$city::find($donation->city_id)->getAttribute('name')}}</h4>
                                </div>
                                <div class="col-lg-3">
                                    <button onclick="window.location.href = '{{url('donation/'.$donation->id)}}';">Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="page-num">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{$donations->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </section>

@endsection()

@push('script')
    <script>
        // ajax search
        // ajax search
        $("#frontSearch").on('click',function () {
            let blood = $('#selectBlood').val(),
                city  = $('#selectCity').val();
            if(blood && city){
                $.ajax({
                    url : '{{url('donation-search')}}',
                    type: 'post',
                    data : { _token:"{{csrf_token()}}",bloodType:blood,city:city},
                    success : function (data) {
                        $('#dataDonation').html(
                            data
                        );
                    }
                })
            }


        });


    </script>
@endpush


