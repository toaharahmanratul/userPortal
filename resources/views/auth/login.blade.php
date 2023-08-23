<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

  </head>
  <body>

  <div class="container" style="padding: 25px;">
    <div class="row" style="display: flex; justify-content: center; align-items: center; margin: 0;">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
            <h4>Login Panel</h4>
            <hr>
            <form action="{{route('login-user')}}" method="post">
              @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
              @endif
              @if(Session::has('fail'))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif
              @csrf

              <div class="form-group" style="margin-top: 10px;">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter Email"
                name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
              </div>

              <div class="form-group" style="margin-top: 10px;">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password"
                name="password" value="">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
              </div>

              <div class="form-group" style="margin-top: 20px;">
                <button class="btn btn-block btn-primary" type="submit">Login</button>
              </div>
              <br>
              Are you new here? <a href="registration">Register Now</a>
            </form>
        </div>
    </div>
  </div>

    
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
  crossorigin="anonymous"></script>

</html>