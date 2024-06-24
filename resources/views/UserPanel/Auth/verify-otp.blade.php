<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammad Salam - Senior Web Developer at ICTechnology, Australia">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="robots" content="noindex">
    <title>Verify-Otp - {{env('APP_NAME')}}</title>



    <!-- Bootstrap core CSS -->
<link href="{{url('/')}}/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
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

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{url('/')}}/assets/dist/styles/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="full_loader" ></div>
<main class="form-signin">
  <form action=""method="post">
    <img class="mb-4" src="{{url('/')}}/assets/brand/logo2.svg" alt="" width="120" height="auto">
    <h4 class="h4 mb-3 fw-normal">Verify Code Here</h4>

    <div class="form-floating">
      <input type="password" class="form-control password"  name="password"id="useremail" placeholder="name@example.com">
      <label for="useremail">Password</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control code" name="code"id="userPassword" placeholder="code">
      <label for="userPassword">Code</label>
    </div>


    <button class="w-100 btn btn-lg btn-primary verify" type="button">Verify</button>
    <div class="response_section">

    </div>
    {{-- <p class="mt-2 mb-3 text-muted"><a href="{{url('/forgot')}}">Forgot Password!</a>!</p>
    <p class="mt-2 mb-3 text-muted">Don't have an account,<br><a href="{{url('/register')}}">Create a New Account</a>!</p> --}}
    <p class="mt-5 mb-3 text-muted">&copy; {{env('APP_NAME')}}</p>
  </form>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>



<script>



$(document).ready(function() {
$('.full_loader').addClass('d-none');

$(".verify").on("click", function() {

  loader(true);
    $.ajax({
        headers: {
            "Accept": "application/json"
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/forget-password-change",
        data: {
            "password": $('.password').val(),
            "code": $('.code').val(),


        },
        success: function(response) {
          loader(false);
         
          toastr.success(response.message);


        setTimeout(() => {
            window.location.href = '/';
          }, 2000);


        },

        error: function(response) {
          loader(false);

  toastr.error(response.message)

                                  }
    });

});
});





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
</script>
  </body>
</html>
