<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Managemen App</title>
         <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <form action="loginData" method='post'>
        @csrf
        <div class="outer_div">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
             <div class="alert alert-danger alert-dismissible"> {{$error}} 
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
                @break 
        @endforeach
      @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger alert-dismissible"> {{Session::get('fail')}} 
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
        @endif
        <div class="app_name_div">
            User Login
        </div>
              <input type='email' class='email' name='email' placeholder='Email' value="{{old('email')}}"> </input>
              <input type='password' class='password' name='password' placeholder='Password' value="{{old('password')}}"> </input>
              <input type='submit' value='Login'  class='submit_btn' name='submit_btn'></input>
              <a href='/register'>Register</a>
        </div>
</form>
    </body>
</html>
