<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Reset Password - {{env('APP_NAME')}}</title>
    <meta name="robots" content="noindex">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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

    
    <!-- Custom styles for this template -->
    <link href="assets/dist/styles/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form>
    <img class="mb-4" src="assets/brand/logo2.svg" name="old_password"alt="" width="120" height="auto">
    <h4 class="h4 mb-3 fw-normal">Reset Password</h4>

    <div class="form-floating">
      <input type="password" class="form-control" name="password"id="floatingPassword0" placeholder="New Password">
      <label for="floatingPassword0">New Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="confirmpassword"id="floatingPassword" placeholder="Confirm New Password">
      <label for="floatingPassword">Confirm New Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Update Password</button>

    <p class="mt-5 mb-3 text-muted">&copy; {{env('APP_NAME')}}</p>
  </form>
</main>




    
  </body>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

  <script>
  function resetPassword() {
    const apiUrl = '{{env('API_CALLURL')}}change-password'; // Replace this with your actual reset password API endpoint

    const oldPassword = document.getElementById('old_password').value;
    const newPassword = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmpassword').value;

    if (password !== confirmpassword) {
      alert('New password and confirm password do not match.');
      return;
    }

    const data = {
      old_password: oldPassword,
      password: newPassword,
      confirmpassword: confirmPassword
    };

    fetch(apiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('access_token') // Assuming you have an access token stored in localStorage after successful login
      },
      body: JSON.stringify(data)
    })


    .then(response => response.json())
    .then(data => {
      // Handle the response data here
      toastr.success("Password change successfully");
      console.log(data);
      alert(data.message);
    })
    .catch(error => {
      // Handle any errors that occurred during the fetch request
      toastr.error("Password cannot change");
      console.error('Error:', error);
    });
  }
</script>

<!-- Include other HTML elements as needed -->
</html>
