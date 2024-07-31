<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Forgot Password - {{env('APP_NAME')}}</title>
    <meta name="robots" content="noindex">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
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

    
    <link href="assets/dist/styles/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="full_loader" ></div>
<main class="form-signin">
  <form  action=""method="post">
    <img class="mb-4" src="assets/brand/logo2.svg" alt="" width="120" height="auto">
    <h4 class="h4 mb-3 fw-normal">Forgot Password</h4>

    <div class="form-floating">
      <input type="email" name="email"class="form-control email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-check form-check-inline mt-3">
      <input class="form-check-input role_id" type="radio" checked name="role_id" id="inlineRadio1" value="3">
      <label class="form-check-label" for="inlineRadio1">Patient</label>
    </div>
    <div class="form-check form-check-inline mb-4">
      <input class="form-check-input role_id" type="radio" name="role_id" id="inlineRadio2" value="2">
      <label class="form-check-label" for="inlineRadio2">Doctor</label>
    </div>
    <div class="form-check form-check-inline mb-4">
      <input class="form-check-input role_id" type="radio" name="role_id" id="inlineRadio17" value="17">
      <label class="form-check-label" for="inlineRadio17">Allied Professional</label>
    </div>
    <br>
      <div class="mb-2 mt-5 d-flex justify-content-between d-none" >
     

      </div>
    <button class="w-100 btn btn-lg btn-primary forgot" type="button">Submit</button>
    
    <p class="mt-2 mb-3 text-muted">Back to <a href="{{url('/')}}">SignIn</a>!</p>
    <p class="mt-5 mb-3 text-muted">&copy; {{env('APP_NAME')}}</p>
  </form>
</main>


    
  </body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>

  <script>
 
  $(document).ready(function() {
$('.full_loader').addClass('d-none');

$(".forgot").on("click", function() {

  loader(true);
    $.ajax({
        headers: {
            "Accept": "application/json"
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/forget-password-send-otp",
        data: {
            "email": $('.email').val(), 
            "role_id": $('input[name="role_id"]:checked').val(),
        },
        success: function(response) {
          loader(false);
          toastr.success(response.message);
        setTimeout(() => {
           window.location.href = '/forgot-password-otp';
          }, 2000);
          
             
        },
    
        error: function(response) {
            loader(false);
        //     if (response.status == 422) {
        //         var errors = response.responseJSON.data;
        //         $.each(errors, function(field, messages) {
        //             error_msg = messages[0];
        //             toastr.error(error_msg);
        //         });
        //     }
        //     else  if (response.status == 500) {
        //         toastr.error("Something went wrong")
        //     }
        //     else
        //     {
        //         toastr.error(response.responseJSON.message)
        //     }
        
        toastr.error(response.responseJSON.message);
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
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</html>
