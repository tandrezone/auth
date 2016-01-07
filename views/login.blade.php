
@extends('main')
@section('title', 'Login')
@section('extfiles')
  <link href="/public/css/style.css" rel='stylesheet'>
@stop
@include('danger')
@include('warning')
@include('success')
@include('info')
@section('content')
<div class="container">
 <form class="form-signin" method="POST">
   <h2 class="form-signin-heading">Please sign in</h2>
   <label for="inputEmail" class="sr-only">Email address</label>
   <input type="email" id="inputEmail" name="username" class="form-control" placeholder="Email address" required autofocus>
   <label for="inputPassword" class="sr-only">Password</label>
   <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
   <div class="checkbox">
     <label>
       <input type="checkbox" value="remember-me"> Remember me
     </label>
   </div>
   <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
 </form>
  @yield('danger')
  @yield('warning')
  @yield('success')
  @yield('info')
</div>
@stop
