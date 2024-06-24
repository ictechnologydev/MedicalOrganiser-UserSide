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
    <title>Verify User- {{env('APP_NAME')}}</title>



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


    <link href="{{url('/')}}/assets/dist/styles/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="full_loader" ></div>
<main class="form-signin">
  <form action=""method="post">
    <img class="mb-4" src="{{url('/')}}/assets/brand/logo2.svg" alt="" width="120" height="auto">
    <h4 class="h4 mb-3 fw-normal">Verify Code Here</h4>

    <div class="form-floating">
      <input type="email" class="form-control email"  name="email"id="email" placeholder="name@example.com">
      <label for="useremail">Email address</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control code" name="code"id="code" placeholder="code">
      <label for="userPassword">Code</label>
    </div>
    <div class="form-check form-check-inline mt-3">
      <input class="form-check-input role_id" type="radio" checked name="role_id" id="inlineRadioP" value="3">
      <label class="form-check-label role_id" for="inlineRadio1">Patient</label>
    </div>
    <div class="form-check form-check-inline mb-4">
      <input class="form-check-input role_id" type="radio" name="role_id" id="inlineRadioD" value="2">
      <label class="form-check-label role_id" for="inlineRadio2">Doctor</label>
    </div>


  <button onclick="verifyUser()"class="w-100 btn btn-lg btn-primary verify" type="button">Verify</button>
  <p class="mt-2 mb-3 text-muted">Back to <a href="{{url('/')}}">SignIn</a>!</p>
    <div class="response_section">

    </div>
    <p class="mt-5 mb-3 text-muted">&copy; {{env('APP_NAME')}}</p>
  </form>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script>

$('.full_loader').addClass('d-none');

function verifyUser(){


  var selectedRoleIds = [];
    

    $('.role_id:checked').each(function () {
        selectedRoleIds.push($(this).val());
    });
    
  const token=getCookie('BearerToken');
  const formData={
    "email": $('#email').val(),
    "code": $('#code').val(),
    "role_id": selectedRoleIds,

  }

  console.log(formData);
  loader(true);
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`

        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/code-verification",
        data: formData,
        success: function(response) {
          loader(false);
          console.log(response);
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

  }




  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return atob(c.substring(name.length, c.length));
        }
    }
    return "";
}



    function loader(show)
    {
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
