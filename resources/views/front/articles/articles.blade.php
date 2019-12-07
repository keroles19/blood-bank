
@extends('front.master')

@section('content')


    <section id="navigator">
        <div class="container">
            <div class="path">
                <a href="{{url('/')}}" class="path-main" style="color: darkred; display:inline-block;">Home</a>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Articles</div>
            </div>

        </div>
    </section>

    <!-- all articles -->

    <section class="mb-5">
        <div class="container">
            <div class="row">
                @if(count($articles))
                @foreach($articles as $article)
                <div class="col-6 col-lg-3  mt-2">
                    <div class="card h-100">
                        <img src="{{asset('images/'.$article->image)}}" class="card-img-top" alt="...">
                        <button  id="{{$article->id}}" style="position: absolute; top: 4%;"
                                 class="like" {{$article->posts ? 'first-heart' : ''}}>
                            <i class="fas fa-heart icon-large"></i>
                        </button>
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p>{{Str::limit($article->body, 240)}}</p>
                                <button class="btn btn-info" onclick= "window.location.href = '{{url('article/'.$article->id)}}';">Details</button>
                        </div>
                    </div>
                </div>
                    @endforeach


                    @else
                        <div class="row">
                            <div class="col-11 m-3 px-3">
                                <div class="alert alert-info">
                                    There's not articles
                                </div>
                            </div>
                        </div>
                    @endif


            </div>
        </div>
    </section>











@endsection
