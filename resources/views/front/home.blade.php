
@extends('front.master')
@inject('donations','App\DonationRequest')
@inject('bloodType','App\BloodType')
@inject('city','App\city')
@inject('client','App\Client')
@section('content')
    <!-- Header Start -->
    <section id="header">
        <div class="container">

            <h4>{{Str::limit($settings->about_app, 240)
                 }}</h4>
            <button class="btn more" onclick= "window.location.href = '{{url('/about')}}';">More</button>
        </div>
    </section>
    <!-- Header End -->

    <!-- Sub Header Start -->
    <section id="sub-header">
        <div class="container">
            <h3>A SINGLE PINT CAN SAVE THREE LIVES, A SINGLE GESTURE CAN CREATE A MILLION SMILES.</h3>
        </div>
    </section>
    <!-- Sub Header End -->

    <!-- Articles Start -->
    <section id="articles">
        <div class="container">
            <h2 style="display: inline-block;">Articles</h2>
            <div class="swiper-container">
            <div class="button-area" style="display: inline-block; margin-left: 850px;">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </button>
            </div>
                <div class="swiper-wrapper">
                    @foreach($articles as $article)
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img-top" style="position: relative;">
                                <img src="{{asset('images/'.$article->image)}}" alt="Card image">
                                <button  id="{{$article->id}}" class="like {{$article->posts ? 'heart' : ''}}">
                                    <i class="fas fa-heart icon-large"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{$article->title}}</h4>
                                <p class="card-text">{{$article->body}}</p>
                                <div class="btn-cont">
                                    <button class="card-btn" onclick= "window.location.href = '{{url('article/'.$article->id)}}';">Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Articles End -->

    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">


                <div class="row">
                    <div class="col-lg-5">
                        <select name="blood_type_id" id="selectBlood">
                            <option value="" disabled selected>Select Blood Type</option>
                            @foreach($bloodType::all() as $b)
                                <option value="{{$b->id}}">{{$b->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-5">
                        <select name="city_id" id="selectCity">
                            <option value="" disabled selected>Select City</option>
                            @foreach($city::all() as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search">
                        <button type="submit" id="frontSearch"><i class=" fas fa-search"></i></button>
                    </div>
                </div>
            <div id="dataDonation">
                @foreach($donations::latest()->take(3)->get() as $donation)
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


            <div class="more-req">
                <button onclick= "window.location.href = '{{url('donations')}}';">More</button>
            </div>
        </div>
    </section>
    <!-- Requests End -->

    <!-- Call us Start -->
    <section id="call-us">
        <div class="layer">
            <div class="container">
                <h1>Call Us</h1>
                <h4>You can call us for your inquiries about any information.</h4>
                <div class="whats">
                    <img src="{{asset('front/imgs/whats.png')}}" alt="">
                    <h3>+2 {{$settings->phone}}</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Call us End -->

    <!-- App Start -->
    <section id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        <h1>Blood Bank Application</h1>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae earum officiis et eligendi nam
                            harum corporis saepe deserunt.</h3>
                        <h4>Available On</h4>
                        <img src="{{asset('front/imgs/ios.png')}}" alt="">
                        <img src="{{asset('front/imgs/google.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="app-screen" src="{{asset('front/imgs/App.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- App End -->
    @endsection()

@push('script')
    <script>
        $(".like").on('click',function () {
            let post_id = $(this).attr('id') ;
            $.ajax({
                url : '{{route('toggle-favourite')}}',
                type: 'post',
                data : { _token:"{{csrf_token()}}",post_id:post_id},
                success : function (data) {
                   console.log(data);
                }
            })

        });

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

