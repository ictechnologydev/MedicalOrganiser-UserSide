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
    <title>Signup - {{env('APP_NAME')}}</title>

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
  <form id="signupForm">
    <img class="mb-4" src="assets/brand/logo2.svg" alt="" width="120" height="auto">
    <h4 class="h4 mb-3 fw-normal">Create a New Account</h4>
    <div id="errorMessage"></div>
    <br>
    <div class="form-floating">
        <input type="text" class="form-control rounded-0 phone_number" name="phone_number"id="floatingInput" placeholder="+61 253 1442">
        <label for="floatingInput">Phone Number</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control rounded-0 email" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control rounded-0 password" name="password"id="floatingpassword" placeholder="Min 8 characters password...">
        <label for="floatingInput">Password</label>
      </div>
    <div class="form-floating">
      <input type="password" class="form-control password_confirmation" name="password_confirmation"id="floatingConfirmPassword" placeholder="Confirm Password">
      <label for="floatingConfirmPassword">Confirm Password</label>
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

    <input type="hidden" class="created_by"name="created_by" value="0">

    <div class="checkbox mb-3">
    
        <input class="me-1 term_and_conditions" type="checkbox" name="term_and_conditions" /> <a role="button" role="button" style="text-decoration: underline;"onclick="show_terms_and_conditions();"  >I agree to the terms and conditions</a>
    
    </div>
    <div class="mb-2 mt-5 d-flex justify-content-between d-none" >
     

    </div>
    <button class="w-100 btn btn-lg btn-primary signup" type="button">Sign Up</button>
    <p class="mt-2 mb-3 text-muted">Back to <a href="{{url('/')}}">SignIn</a>!</p>
    <p class="mt-5 mb-3 text-muted">&copy; {{env('APP_NAME')}}</p>
  </form>
  
  

</main>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms And Conditions</h5>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-12 html_content ">
        
      </div>
      </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script>
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

function show_terms_and_conditions() {
    
        loader(true);
        $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "GET",
        url: `{{config('app.api_url')}}/api/pages/6`,
        contentType: "application/json",
        success: function(response) {
            $('.html_content').html(`<span>${response.data.page.description}</span>`);
            loader(false);
            $("#exampleModal").modal("show");
        },
        error: function(response) {
            loader(false);
            if (response.status == 422) {
                var errors = response.responseJSON.data;
            $.each(errors, function(field, messages) {
                error_msg = messages[0];
                toastr.error(error_msg);
            });
            } else if (response.status == 500) {
                toastr.error("Something went wrong");
            } else {
                toastr.error(response.responseJSON.message);
            }
        }
        });
}

$(document).ready(function() {
$('.full_loader').addClass('d-none');

$(".signup").on("click", function() {

if(!$('.term_and_conditions').is(":checked"))
{
    toastr.error('Please agree to the terms and conditions first.');
    return 0;
}

  loader(true);
    $.ajax({
        headers: {
          "Accept": "application/json",
        
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/register",
        data: {
          "phone_number": $('.phone_number').val(),
            "email": $('.email').val(),
            "password": $('.password').val(),
            "password_confirmation": $('.password_confirmation').val(),
            "role_id": $('input[name="role_id"]:checked').val(),
            "created_by": $('.created_by').val(),
            "term_and_conditions": $('.term_and_conditions').val(),
        },
        success: function(response) {
          loader(false);
        
   
           
    toastr.success(response.message);
    
        setTimeout(() => {
          setCookies(response);
        window.location.href = "/VerifyUser";
      },1000);
         

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
});

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + btoa(cvalue) + ";" + expires + ";path=/";
} 

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
</script>
</body>
</html>
