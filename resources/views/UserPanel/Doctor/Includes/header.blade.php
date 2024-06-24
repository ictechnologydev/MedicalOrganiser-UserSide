<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammad Salam - Senior Web Developer at ICTechnology, Australia">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashbaord - {{env('APP_NAME')}}</title>
    <meta name="robots" content="noindex">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{url('/')}}/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
 
    <!-- Custom styles for this template -->
    <link href="{{url('/')}}/assets/dist/styles/sidebars.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/dist/styles/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <!-- Datatables-->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.js"></script>

    
   
    
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/assets/dist/styles/sidebars.css" rel="stylesheet">
        <link href="/assets/dist/styles/dashboard.css" rel="stylesheet">
        <link href="/assets/dist/styles/patient-profile.css" rel="stylesheet">

    <style>
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
      }
    </style>
  </head>
  <body>
  <div class="full_loader" ></div>

  
   
    
<main>



  <div class="d-flex flex-column flex-shrink-0 bg-light sidebar-dashboard" style="width: 4rem;height: 100vh;">
    <a href="{{url('/doctor/dashboard')}}" class="d-block p-3 link-dark text-decoration-none logo-icon">
      <img src="{{url('/')}}/assets/brand/logo.svg">
    </a>
    @include('UserPanel.Doctor.Includes.sidebar')
    <div class="dropdown border-top profile_view">
      <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
      </a>

      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
        {{-- <li><a class="dropdown-item" href="{{url('/requests')}}">My Requests</a></li> --}}
        
        <li><a class="dropdown-item" role="button" href="{{url('/doctor/AppSupport')}}">App Support</a>
          {{-- <li><a class="dropdown-item" role="button" href="{{url('/patient/reminders')}}">Reminders</a></li> --}}
        <li><a class="dropdown-item" role="button"  onclick="getSettings('${getCooki(\'user_id\')}', '${getCooki(\'role_id\')}');">Settings</a>

          
        </li>
       
        <a class="dropdown-item" role="button"  onclick="getprofile('${getCooki(\'user_id\')}', '${getCooki(\'role_id\')}');">Profile</a>
        <li class="PagesClass" ><hr class="dropdown-divider"></li>
        
        <li><hr class="dropdown-divider"></li>
        <li><button  class="dropdown-item logout" type="button">Logout</button></li>
      </ul>



      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
        {{-- <li><a class="dropdown-item" href="{{url('/requests')}}">My Requests</a></li> --}}
        
        <li><a class="dropdown-item" role="button" href="{{url('/doctor/AppSupport')}}">App Support</a>
          {{-- <li><a class="dropdown-item" role="button" href="{{url('/patient/reminders')}}">Reminders</a></li> --}}
        <li><a class="dropdown-item" role="button"  onclick="getSettings('${getCooki(\'user_id\')}', '${getCooki(\'role_id\')}');">Settings</a>

          
        </li>
       
        <a class="dropdown-item" role="button"  onclick="getprofile('${getCooki(\'user_id\')}', '${getCooki(\'role_id\')}');">Profile</a>
   
      
        <li><hr class="dropdown-divider"></li>
        <li><button class="dropdown-item logout" type="button">Logout</button></li>
        
      </ul>
    </div>


    <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="reason-modelLabel">General Settings</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="settings_table" class="" style="width:100%;">
         
          <tbody>        
          </tbody>
      </table>



      
      </div>

      
      </div>
      </div>
      </div>
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="reason-modelLabel">Doctor profile Details</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="detail_table" class="" style="width:100%;">
          <thead><h4 style="text-align: center;color: rgb(64, 182, 176)">Profile Data</h4></thead>
          <tbody>        
          </tbody>
      </table>


<br>
      <table id="detail_table2" class="" style="width:100%;">
        <thead><h4 style="text-align: center;color: rgb(64, 182, 176)">Emergency Contacts</h4></thead>
        <tbody>        
        </tbody>
    </table>
    <br>
      <button style="background-color: rgb(64, 182, 176);outline:none;border:none;border-radius:5px;color:white"><a role="button" onclick="callTwoAPIs()">Edit Profile</a></button>

      </div>

      
      </div>
      </div>
      </div>


      <!--editModal-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
      </div>
      <div class="modal-body">
      <div class="row">
         <div class="col-12">
            <form id="edit_form">
               <div class="card-body">
                <h4 style="text-align: center;color: rgb(64, 182, 176)">Edit Profile Data</h4>
                  <div class="row append_fields">

                     
                  </div>
               </div>
               <input type="hidden"  name="role_id"  class="role_id" value="">
               <input type="hidden"  name="user_id"  class="user_id" value="">

            </form>
         </div>


         <div class="col-12">
          <form id="editform">
             <div class="card-body">
              <h4 style="text-align: center;color: rgb(64, 182, 176)">Edit Emergency Contacts</h4>
                <div class="row append_field">

                   
                </div>
             </div>
             <input type="hidden"  name="role_id"  class="roleid" value="">
             <input type="hidden"  name="user_id"  class="userid" value="">

          </form>
       </div>
      </div>

        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary btn-sm" onclick="$('#editModal').modal('hide');" >Close</button>
        <button type="submit" class="btn btn-secondary btn-sm"  onclick=" $('#edit_form').submit();$('#editform').submit();">Save</button>
       
      </div>
    </div>
  </div>
</div>
<!--end editModal-->
  </div>
  <div class="bg-white w-100 main-area" style="height: 100vh; max-height: 100vh; overflow-y: scroll;">
    {{-- <div class="mobile-icon bg-white shadow"><img src="{{url('/')}}/assets/brand/logo.svg" height="30px"></div> --}}
