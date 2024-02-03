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
    <form action="registerData" method='post'>
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
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible"> {{ Session::get('success') }} 
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger alert-dismissible"> {{ Session::get('fail') }} 
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
        @endif

        <div class="app_name_div">
            User Registration
        </div>
        <div class="names_div">
              <input type='text' class='first_name' name='first_name' placeholder='First Name' value="{{old('first_name')}}"> </input>
              <input type='text' class='last_name' name='last_name' placeholder='Last Name' value="{{old('last_name')}}"> </input>
        </div>
              <input type='email' class='email' name='email' placeholder='Email' value="{{old('email')}}"> </input>
              <input type='password' class='password' name='password' placeholder='Password' value="{{old('password')}}"> </input>
              <select name="gender" class="gender">
                 <option value="{{ old('gender') }}" selected disabled hidden> @if(old('gender') != "") {{ old('gender') }} @else {{'Gender'}} @endif </option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
                 <option value="Other">Other</option>
                </select>
              <input type='submit' value='Submit'  class='submit_btn' name='submit_btn'></input>
              <a href='/'>Login</a>
        
        </div>
        </form>
    </body>
</html>
