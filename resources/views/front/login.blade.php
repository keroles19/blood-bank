
@extends('front.master')

@section('content')
         <!-- navigation -->
         <section id="navigator">
             <div class="container">
                 <div class="path">
                     <a href="{{url('/')}}" class="path-main" style="color: darkred; display:inline-block;">Home</a>
                     <div  class="path-directio" style="color: grey; display:inline-block;"> / Login</div>
                 </div>

             </div>
         </section>

         <!-- login form -->
         <section id="login">
             <div class="container">
                 <img src="{{asset('front/imgs/logo.png')}}" alt="">
                 <div class="row pt-2 justify-content-center">
                     <div class="col-9 ">
                         @include('partials.error')
                     </div>
                 </div>
                 <form action="{{url('login-system')}}" method="post">
                     @csrf
                     <input id="email" class="username" type="email"  name="email"    required autocomplete="email" autofocus>
                     <input class="password" name="password" type="Password" placeholder="Password" required >
                     <input class="check" type="checkbox">Remember me
                     <a href="{{url('forget-password')}}">Forget Password ?</a><br>
                     <div class="reg-group">
                         <button type="submit" style="background-color: darkred;">Login</button>
                         <a href="{{url('show-sign-up')}}" class="btn text-white" style="background-color: rgb(51, 58, 65);">Make new account</a>
                     </div>
                 </form>
             </div>
         </section>

    @endsection()

