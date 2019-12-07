
@extends('front.master')
@inject('setting','App\Setting')
@section('content')
         <!-- navigation -->
         <section id="navigator">
             <div class="container">
                 <div class="path">
                     <a href="{{url('/')}}" class="path-main" style="color: darkred; display:inline-block;">Home</a>
                     <div  class="path-directio" style="color: grey; display:inline-block;"> / Contact Us</div>
                 </div>

             </div>
         </section>

         <!-- Contact Us -->
         <section id="contact">
             <div class="container">
                 <div class="row">
                     <div class="col-md-6 call">
                         <div class="title">Head</div>
                         <img src="{{asset('front/imgs/logo.png')}}" alt="">
                         <hr>
                         <h4>Mobile: +2  {{$setting::first()->getAttribute('phone')}}</h4>
                         <h4>Fac: {{$setting::first()->getAttribute('fb_link')}}</h4>
                         <h4>Email: {{$setting::first()->getAttribute('phone_email')}}</h4>
                         <hr>
                         <h3>Find Us On</h3>
                         <div class="icons">
                             <i class="fab fa-facebook-square fa-3x"></i>
                             <i class="fab fa-google-plus-square fa-3x"></i>
                             <i class="fab fa-twitter-square fa-3x"></i>
                             <i class="fab fa-whatsapp-square fa-3x"></i>
                             <i class="fab fa-youtube-square fa-3x"></i>
                         </div>
                     </div>
                     <div class="col-md-6 info">
                         <div class="title">Head</div>
                         <div class="mt-4 pt-5">
                             @include('partials.error')
                         </div>

                         <form action="{{url('send-message')}}" method="Post">
                             @csrf
                             <input type="text" name="name" placeholder="Name" required="">
                             <input type="email" name="email"  placeholder="Email" required="">
                             <input type="number" name="phone"  placeholder="Phone" required="">
                             <input type="text" name="subject"  placeholder="Title" required="">
                             <textarea name="message" id="" cols="10" rows="5" required  placeholder="Message"></textarea>
                             <div class="reg-group">
                                 <button type="submit">Send</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </section>

    @endsection()

