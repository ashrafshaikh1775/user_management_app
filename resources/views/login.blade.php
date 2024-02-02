<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Managemen App</title>
         <link rel="stylesheet" href="{{ asset('css/register.css') }}" />

  </head>
    <body>
    <form action="loginData" method='post'>
        @csrf
        <div class="outer_div">
        <span>
            <!-- @if(true) -->
              <!-- @error('email') {{$message}} @enderror -->
            <!-- @elseif(true) -->
              <!-- @error('upass') {{$message}} @enderror -->
            <!-- @endif  -->
      @if ($errors->any())
        @foreach ($errors->all() as $error)
                {{$error}}
                @break 
        @endforeach
      @endif
        </span>
        @if(Session::has('fail'))
        <span>{{ Session::get('fail') }}</span>
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
