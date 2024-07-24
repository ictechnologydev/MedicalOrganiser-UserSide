<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Muhammad Salam - Senior Web Developer at ICTechnology, Australia">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="robots" content="noindex">
    <title>Signin - {{env('APP_NAME')}}</title>
<link href="{{url('/')}}/assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <style>

      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
       .full_loader
      {
            background: url('/loader.gif');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 50px;
            z-index: 1000;
            position: absolute;
            min-width: 100vw;
            min-height: 100vh;
            overflow: hidden;
            max-width: 100vw;
            max-height: 100vh;
            background-color: white;
            color:black;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <link href="{{url('/')}}/assets/dist/styles/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="full_loader" ></div>
<main class="form-signin">
   <form action=""method="post">

    {{ csrf_field() }}
    <img class="mb-4" src="{{url('/')}}/assets/brand/logo2.svg" alt="" width="120" height="auto">
    <h4 class="h4 mb-3 fw-normal">Welcome Back - Login</h4>

    <div class="form-floating">
      <input type="email" class="form-control email" name="email"id="useremail" placeholder="name@example.com">
      <label for="useremail">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password"class="form-control password" id="userPassword" placeholder="Password">
      <label for="userPassword">Password</label>
    </div>
    <div class="form-check form-check-inline mt-3">
      <input class="form-check-input" type="radio" checked name="role_id" id="inlineRadio1" value="3">
      <label class="form-check-label" for="inlineRadio1">Patient</label>
    </div>
    <div class="form-check form-check-inline mb-4">
      <input class="form-check-input" type="radio" name="role_id" id="inlineRadio2" value="2">
      <label class="form-check-label" for="inlineRadio2">Doctor</label>
    </div>
       <div class="form-check form-check-inline mb-4">
           <input class="form-check-input" type="radio" name="role_id" id="inlineRadio2" value="17">
           <label class="form-check-label" for="inlineRadio2">Professional</label>
       </div>

    <button class="w-100 btn btn-lg btn-primary sign-in" type="button">Sign in</button>
    <div class="response_section">

    </div>

    <div class="mb-2 mt-5 d-flex justify-content-between d-none" >


    </div>



    <p class="mt-2 mb-3 text-muted"><a href="{{('/forgot')}}">Forgot Password!</a>!</p>
    <p class="mt-2 mb-3 text-muted">Don't have an account,<br><a href="{{url('/register')}}">Create a New Account</a>!</p>
    <p class="mt-2 mb-3 text-muted">See All Sponsors<br><a href="{{url('/sponsors')}}">Sponsors</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; {{env('APP_NAME')}}</p>
  </form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>


<script>

var pageTitle = "Signin - {{env('APP_NAME')}}";

// Update the title of the page dynamically
document.title = pageTitle;
$('.full_loader').addClass('d-none');

$(".sign-in").on("click", function() {

  loader(true);
    $.ajax({
        headers: {
            "Accept": "application/json"
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/login",
        data: {
            "email": $('.email').val(),
            "password": $('.password').val(),
            "role_id": $('input[name="role_id"]:checked').val(),
        },
        success: function(response) {
          loader(false);
          toastr.success(response.message);
              if(response.data.user.verified == 0)
            {
                    setTimeout(() =>
                    {
                    window.location.href = "/VerifyUser";
                    },1000);
            }else if(response.data.user.role.id == '2'){
              setTimeout(() => {
                setCookies(response)
                window.location.href = "/dashboard";//"/doctor/dashboard";
              },1000);
              }
              else if(response.data.user.role.id == '17'){
                  setTimeout(() => {
                      setCookies(response)
                      window.location.href = "/dashboard";
                  },1000);
              }else if(response.data.user.role.id == '3'){

                setTimeout(() => {
                  setCookies(response)
                  window.location.href = "/dashboard";
              },1000);
              }else
            {
              toastr.error('Invalid credentials');
            }
        },

        error: function(response) {
          loader(false);
          if (response.status == 422) {
          var errors = response.responseJSON.data;
          $.each(errors, function(field, messages) {
                error_msg = messages[0];
                toastr.error(error_msg);
          });
          }
  else  if (response.status == 500) {
      toastr.error("Something went wrong")
    }
    else
    {
      toastr.error(response.responseJSON.message)
    }
                                  }
    });

});
function setCookies(response) {
setCookie('nameRole',response.data.user.role.name, '1')
setCookie('BearerToken',response.data.token, '1')
setCookie('user_id',response.data.user.id, '1')
setCookie('user_email',response.data.user.email, '1')
setCookie('user_role_id',response.data.user.role.id, '1')
}
function loader(show) {

  if(show == true)
  {
    $('.full_loader').removeClass('d-none');
  }
  else
  {
    $('.full_loader').addClass('d-none');
  }
  }
function deleteCookie(name) {
  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
}
deleteCookie('BearerToken');
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + btoa(cvalue) + ";" + expires + ";path=/";
}
</script>
</body>
</html>
