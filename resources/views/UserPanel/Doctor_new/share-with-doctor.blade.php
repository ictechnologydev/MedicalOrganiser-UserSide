

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


var pageTitle = "Patient Share Profile - {{env('APP_NAME')}}";

// Update the title of the page dynamically
document.title = pageTitle;

function send_profile(){



      const formData={

        "patient_id": getCookie('user_id'),
        "doctor_id": $('.doctor_id').val(),
        "patient_accept_or_reject": $('.patient_accept_or_reject').val(),
        "doctor_notification": $('.doctor_notification').val(),
        "patient_note": $('.patient_note').val()
      }
      console.log(formData);

        $.ajax({
   headers: {
   "Accept": "application/json",
   "Authorization": `Bearer ${getCookie('BearerToken')}`,
   },
   type: "POST",
   url: "{{config('app.api_url')}}/api/users/request-to-doctor-store",
   data:formData,



   success: function(response) {

          console.log(response.data);
          toastr.success(response.message);
          $('.offcanvas').offcanvas('hide');
          location.reload();


        },

        error: function(response) {

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
function getDoctorslist(){

    loader(true);
   $.ajax({
   headers: {
   "Accept": "application/json",
   "Authorization": `Bearer ${getCookie('BearerToken')}`,
   },
   type: "GET",
   url: "{{config('app.api_url')}}/api/users/request-to-doctor?patient_id=${getCookie('user_id')}",

   success: function(response) {

       console.log(response.data.user);
       setCookies(response);
       var doctors = response.data.user;

var doctorListDiv = document.getElementById('doctor-list');
var selectedDoctorDiv = document.getElementById('selected-doctor');






doctors.forEach(function(doctor) {
    var doctorBlock = document.createElement('div');
    doctorBlock.classList.add('doctor-block');

    var doctorInfoDiv = document.createElement('div');
    doctorInfoDiv.classList.add('doctor-info');

    var doctorImageDiv = document.createElement('div');
    doctorImageDiv.classList.add('doctor-image');
    doctorImageDiv.style.background = 'url(/assets/images/doctor.png)';


    var doctorId = document.createElement('p');
    doctorId.textContent = '# ' + doctor.id;
    doctorId.style.marginRight='25px';
    doctorId.appendChild(document.createElement('br'));



    // var doctorEmail = document.createElement('p');
    // doctorEmail.textContent = 'Email:' + doctor.email;
    // doctorEmail.style.marginRight='25px';

    var doctorCheckInput = document.createElement('input');
    doctorCheckInput.type = 'checkbox';
    doctorCheckInput.classList.add('doctor-check');
    doctorCheckInput.style.paddingLeft = '20px';

    doctorCheckInput.addEventListener('change', function() {
        if (this.checked) {
            displaySelectedDoctor(doctor);
        } else {
            clearSelectedDoctor();
        }
    });

    doctorBlock.appendChild(doctorInfoDiv);
    doctorBlock.appendChild(doctorImageDiv);
    doctorBlock.appendChild(doctorCheckInput);

    // Uncomment the following lines to display the doctor's ID
    doctorBlock.appendChild(doctorId);

    // doctorBlock.appendChild(doctorEmail);
    doctorBlock.appendChild(document.createElement('br'));

    doctorListDiv.appendChild(doctorBlock);
});



function displaySelectedDoctor(doctor) {




    selectedDoctorDiv.querySelector('#doctor-email').textContent = 'Dr.' + doctor.email ;
    selectedDoctorDiv.querySelector('#doctor-id').textContent = doctor.id ;






const hiddenInput = document.querySelector('.doctor_id[name="doctor_id"]');
hiddenInput.value = doctor.id;
console.log(hiddenInput.value,'tttt');

const formSelectedDoctorDiv = form.querySelector('#selected-doctor');
    formSelectedDoctorDiv.innerHTML = '';
    formSelectedDoctorDiv.appendChild(selectedDoctorDiv.cloneNode(true));
}

function clearSelectedDoctor() {
    selectedDoctorDiv.querySelector('.doctor-id').textContent = '';
    selectedDoctorDiv.querySelector('.doctor-name').textContent = '';
    // ... clear other details
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


getDoctorslist();
console.log(getDoctorslist());


});

// function loader(show) {

// if(show == true)
// {
//   $('.full_loader').removeClass('d-none');
// }
// else
// {
//   $('.full_loader').addClass('d-none');
// }
// }
</script>

@include('UserPanel.Includes.footer')

