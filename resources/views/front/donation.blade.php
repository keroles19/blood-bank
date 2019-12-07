
@extends('front.master')
@inject('bloodType','App\BloodType')
@inject('city','App\city')
@section('content')
         <!-- navigation -->
         <section id="navigator">
             <div class="container">
                 <div class="path">
                     <a href="{{url('/')}}" class="path-main" style="color: darkred; display:inline-block;">Home</a>
                     <div  class="path-directio" style="color: grey; display:inline-block;"> / Create Donation</div>
                 </div>

             </div>
         </section>

         <!-- register form -->
         <section id="sign-up">
             <div class="container">
                 <img src="{{asset('front/imgs/logo.png')}}" alt="">
                 <div class="col-9 justify-content-center ">
                     @include('partials.error')
                 </div>
                 <form method="post" action="{{url('register-system') }}">
                     @csrf
                     <input type="text" name="name" placeholder="Name" required="">
                     <input type="number" name="age" placeholder="age" required="">
                     <input type="password" name="password" placeholder="password" required="">
                     <input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
                     <input type="text" name="hospital_name" placeholder="Birth date">
                     <select name="blood_type_id" id="type" required="">
                         <option value="Blood Type" selected disabled="">choose Blood Type</option>
                         @foreach($bloodType::all() as $blood)
                             <option value="{{$blood->id}}">{{$blood->name}}</option>
                         @endforeach
                     </select>
                     <select name="city_id" id="City" required="">
                         <option value="City" selected disabled="">City</option>
                         @foreach($city::all() as $c)
                             <option value="{{$c->id}}">{{$c->name}}</option>
                         @endforeach
                     </select>
                     <input type="Phone" name="phone" placeholder="Phone Number" required="">
                     <input type="date" placeholder="last donate date " name="last_donation_date">
                     <div class="reg-group">
                         <input class="check" type="checkbox" required="" style="height: auto; display:inline; margin: 0 auto;">Agree on terms and conditions<br>
                         <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
                     </div>
                 </form>
             </div>
         </section>

    @endsection()

