@extends('front.master')

@inject('articles','App\Post')

@section('content')

    <section id="navigator">
        <div class="container">
            <div class="path">
                <a href="{{url('/')}}" class="path-main" style="color: darkred; display:inline-block;">Home</a>
                <a href="{{url('/articles')}}" class="path-main" style="color: darkred; display:inline-block;">/ Articles</a>
                <div class="path-directio" style="color: grey; display:inline-block;"> / {{$article->title}}</div>
            </div>

        </div>
    </section>





    <section id="article">
        <div class="container">
            <img class="head-img" src="{{asset('images/'.$article->image)}}" alt="">
            <div class="details-container">
                <div class="title">{{$article->title}}</div>
                <p>{{$article->body}}</p>
                <strong><a>Share this article:</a></strong>
                <div class="icons">
                    <i class="fab fa-facebook-square fa-3x"></i>
                    <i class="fab fa-google-plus-square fa-3x"></i>
                    <i class="fab fa-twitter-square fa-3x"></i>
                </div>

            </div>
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
                            @foreach($articles::all()->except(($article->id)) as $article)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-img-top" style="position: relative;">
                                            <img src="{{asset('images/'.$article->image)}}" alt="Card image">
                                            <button class="like"><i class="fas fa-heart icon-large"></i></button>
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

        </div>
    </section>






    @endsection
