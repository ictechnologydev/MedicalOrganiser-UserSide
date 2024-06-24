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
    <title>Sponsors - {{env('APP_NAME')}}</title>

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
      
    </style>
  </head>



  <body style="background-color:#02b2b0;" class="container-fluid" >

   
   
 

<div class="container">
    
    <div class="row">
        <div  class="col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
           <img class="mb-5 mt-5" src="{{url('/')}}/weblogo.png" alt="" width="120" height="auto" >
        </div>
    </div>
    
    <div class="mt-5 row">
        <div class="col-md-9 col-lg-12 col-xl-12 sponsorsContainer_ d-flex justify-content-around flex-wrap" style="margin-left: auto !important;margin-right: auto !important;">
            
        </div>
        <br>
        <br>
        <br>
         <div class="mt-5 mb-5 d-flex justify-content-around flex-wrap">
        <a style="width:20%" href="{{url('/')}}" class="btn btn-light">Signin</a>
    </div>

    </div>
    
   
</div>

        
        <style>
    .sponsor-container {
        position: relative;
    }
    
    .sponsor-tooltip {
    background-color: black;
    position: absolute;
    top: 76px;
    left: 50%; 
    transform: translateX(-50%); 
    color: #02b2b0;
    width: 168px;
    height: 80px; 
    font-size: 23px;
    padding: 10px 0px;
    text-align: center;
    opacity: 0;
    transition: 0.6s;
    border-radius: 0 0 80px 80px;
    overflow: hidden; 
}


          
            .sponsor-container:hover .sponsor-tooltip {
              opacity: 1;
            }
          </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>


<script>



function add_sponsors(){

}

function get_sponsors(){
    loader(true);

  
    $.ajax({
        headers: {
            "Accept": "application/json",
            
        },
        type: "GET",
        url: "{{config('app.api_url')}}/api/sponsers",
       
        success: function(response) {
            
       var sponsors = response.data.sponsers;
            sponsors.forEach(function(sponsor) {
     html = `
        <div style="background-color:white;border: 2px solid #02b2b0;
        border-radius: 100px;
        padding: 6px;
        display: inline-flex;
        justify-content: flex-start;
        vertical-align: middle;
        position: relative;
        " class="doctor-block">
            <a href="${sponsor.link}" target="_blank" >
                <div class="sponsor-container" style="position: relative;">
                <img src="${sponsor.logo}" class="card-img-top"
                    style="height: 150px;
                    width: 150px;
                    background-position: center !important;
                    background-size: cover !important;
                    background-repeat: no-repeat !important;
                    background-color:white;
                    border-radius: 100px;
                    margin-right: 5px;"
                    alt="${sponsor.name} Logo">
                <h6 class="sponsor-tooltip" >
                    ${sponsor.name}
                </h6>
            </div></a>
        </div>
    `;

    
    $('.sponsorsContainer_').append(html);
    
    loader(false);
});

           
             
         

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



$(document).ready(function () {

      get_sponsors();

});
</script>

</body>
</html>
