@component('mail::message')
# Introduction

blood bank reset password 

@component('mail::button', ['url' => '#'])

Reset Password
@endcomponent


<p> your code is : {{$code}} </p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
