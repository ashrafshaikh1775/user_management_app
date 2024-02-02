<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Managemen App</title>
         <link rel="stylesheet" href="{{ asset('css/register.css') }}" />

  </head>
    <body>
    <form action="updateUserInfo" method='post'>
        @csrf
        <div class="outer_div">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
                {{$error}}
                @break 
        @endforeach
      @endif

        @if(Session::has('fail'))
        <span>{{ Session::get('fail') }}</span>
        @endif 
        <div class="app_name_div">
            User Detail Update
        </div>
        <div class="names_div">
              <input type='text' class='first_name' name='first_name' placeholder='First Name' value="{{$data->first_name}}"> </input>
              <input type='text' class='last_name' name='last_name' placeholder='Last Name' value="{{$data->last_name}}"> </input>
        </div>
              <input type='email' class='email' name='email' placeholder='Email' value="{{$data->email}}"> </input>
              <input type='text' class='password' name='password' placeholder='Password' value="{{$data->password}}"> </input>
              <select name="gender" class="gender">
                 <option value="Male" @if($data->gender == 'Male') {{ 'selected' }} @endif >Male</option>
                 <option value="Female" @if($data->gender == 'Female') {{ 'selected' }} @endif>Female</option>
                 <option value="Other" @if($data->gender == 'Other') {{ 'selected' }} @endif>Other</option>
                </select>
              <input type='submit' value='Update'  class='submit_btn' name='submit_btn'></input>
              <a href='/logout'>Logout</a>
                 
        </div>
</form>
    </body>
</html>
