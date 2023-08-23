<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registration</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>


  </head>
  <body>

  <div class="container" style="padding: 25px;">
    <div class="row" style="display: flex; justify-content: center; align-items: center; margin: 0;">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
            <h4>Registration Panel</h4>
            <hr>
            <form action="{{route('register-user')}}" method="post">

              @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
              @endif
              @if(Session::has('fail'))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif

              @csrf
              
              <div class="form-group" style="margin-top: 10px;">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter Full Name"
                name="name" value="{{old('name')}}">
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
              </div>

              <div class="form-group" style="margin-top: 10px;">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" placeholder="Enter Email"
                name="email" value="{{old('email')}}">
                <span id="emailStatus"></span>
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                
              </div>

              <div class="form-group" style="margin-top: 10px;">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password"
                name="password" value="">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
              </div>

              <div class="form-group" style="margin-top: 20px;">
                <button class="btn btn-block btn-primary" type="submit">Register</button>
              </div>
              <br>
              Already registered? <a href="login">Login Here</a>
            </form>
        </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    // CSRF Token setup for Axios
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

    // Assuming you have an input with id 'email'
    const emailInput = document.getElementById('email');

    emailInput.addEventListener('blur', function() {
        axios.post('/check-email', {
            email: emailInput.value
        })
        .then(function(response) {
            if(response.data.exists) {
                alert('Email already exists!');
            } else {
                alert('Email is available!');
            }
        })
        .catch(function(error) {
            console.error("There was an error!", error);
        });
    });
</script>



    
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
  crossorigin="anonymous"></script>



</html>