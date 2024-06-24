
@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">

  
    <div>
    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">Share with Doctor</h3>
                <small>Dashabord - Share with Doctor</small>
            </div>
       
        </div>
        <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
            <div class="h6 mt-1 mb-0">
                <input type="text" class="form-control doctor-search-input" placeholder="Search Doctor...">
            </div>
        </div>
       
        <div class="welcome-note-container doctors-container rounded-3 border border-primary border-2 p-2">
            <div class="doctor-floats">
                
                
               
               
        <div id="doctor-list" class="doctor-list">
        
            
</div>

            </div>

        <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
            <div class="h6 mt-1 mb-0">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Share Profile</button> <span class="text-secondary">
            </div>
        </div>
    </div>
</div>
  </div>

</main>


<!-- Modal -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h4 id="offcanvasRightLabel">Share Profile</h4>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="selected-doctor">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Your selected Doctor</label>
                <br>
                <div class="doctor-image"></div>
                <div  id="selected-doctor"class="doctor-block" style="width: 100%;margin: 0;">
                    
                    
                    <div class="doctor-info">
                       
                        <div id="doctor-id">ID : </div>
                        <div id="doctor-email">Email : </div>
                        {{-- <div class="doctor-name">Dr. Malinda Cole</div> --}}
                    </div>
                </div>
                <div class="mt-2"><small>If you choose to share your profile with your doctor, rest assured that we prioritize your privacy. We will only share the following data with your doctor, as outlined in our privacy terms and conditions:</small></div>
                <div class="mt-1"><small class="mt-2">
                    <ul>
                        <li>Medications</li>
                        <li>Dis-Orders</li>
                        <li>Adverse Effects</li>
                        <li>Medication History</li>
                    </ul>
                </small></div>
            </div>
            
            
            <div class="mb-3">
                <label for="medication-reason" class="form-label">Special Note for your Doctor</label>
                <textarea class="form-control" name="patient_note"  class="patient_note" placeholder="I am feeling..."></textarea>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Are you sure?</label>
            </div>
            <input type="hidden"name="patient_id"value="${getCookie('user_id')}" >
            <input type="hidden" class="doctor_id"name="doctor_id" value="">

            <input type="hidden"name="doctor_notification" class="doctor_notification" value="1" >
            <input type="hidden"name="patient_accept_or_reject" class="patient_accept_or_reject" value="0" >

            <a class="dropdown-item" role="button"  onclick="send_profile()">Share Now</a>
          </form>
        
    </div>

    
  </div>
  <!-- Modal -->
    <div class="modal fade" id="reason-model" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="reason-modelLabel">Medication Reason</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Heart Beat is not Normal, heavy chest pain, uncontrolled blood presure, the viscosity of the blood is very high</p>
            </div>
        </div>
        </div>
    </div>
    @include('UserPanel.Includes.script');
    <script>

function get_patient_health_summary(){

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
          // console.log(response);
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
              
                window.location.href = "/doctor/dashboard";
              },1000);
              }else if(response.data.user.role.id == '3'){
               
                setTimeout(() => {
                  setCookies(response)
                  window.location.href = "/patient/dashboard";
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
    }else
    {
      toastr.error(response.responseJSON.message)
    }
                                  }
    });
}
function setCookies(response) {
setCookie('doctor_id',response.data.user.id, '1')

} 

        feather.replace();
        new DataTable('#example');
        $("#medicine-select-field,#recurring-select-field,#doctor-select-field").select2({
            theme: "bootstrap-5",
        });

        function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + btoa(cvalue) + ";" + expires + ";path=/";
}


function getCook(doctor) {
  var name = doctor + '=';
  var decodedCookie = document.cookie;
  var cookieArray = decodedCookie.split(';');
  for (var i = 0; i < cookieArray.length; i++) {
    var cookie = cookieArray[i];
    while (cookie.charAt(0) === ' ') {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(name) === 0) {
      return cookie.substring(name.length, cookie.length);
    }
  }
  return "";
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

function getCooki(cname) {
    let name = cname + "=";
    let decodedCookie = document.cookie;
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

function getEmail(cname) {
let name = cname + "=";
let email = document.cookie;
let ca = email.split(';');
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

function getName(cname) {
let name = cname + "=";
let nameRole = document.cookie;
let ca = nameRole.split(';');
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

function getParams(name) {
        var url = new URL(window.location.href);
        return url.searchParams.get(name);
}


        $(document).ready(function() {

            

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

@include('UserPanel.Includes.footer') 

