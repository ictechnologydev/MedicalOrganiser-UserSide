

@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">


    <div>
    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between bordsender border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">Patient health Professionals</h3>
                <small>Dashabord - Patient health Professionals </small>
            </div>

            <div class="col-3">
                <div class="nav-item dropdown d-flex me-3 flex-end justify-content-end">

                <a type="button" href="javascript:void(3);" class="btn btn-primary my-2 ps-3 pe-3 nav-link px-0 show_notification btn btn-primary position-relative">
                  🔔
                  <span class="position-absolute top-10 end-20  translate-middle p-1 bg-danger border border-light rounded-circle">

                  </span>
                </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card notification_menu " style="top: 64px; right: 0px;padding:0px;">
                      <div class="card">
                        <div class="card-header" style="background-color:#02b2b0;color:white">
                       <div class="header">
                       <div class="head">
                        <h3 class="card-title">Notification</h3>
                        <button onclick="closeNotification()" class="btn btn-close"></button>
                       </div>
                       </div>
                          <span class="all_read"  onclick="all_read();" style="font-size: 14px;margin-left: auto;" role="button">Mark all as read</span>
                        </div>
                        <div class="list-group list-group-flush list-group-hoverable ">
                        <div class="append_notifications" style="max-height:420px;min-height:420px;max-width:420px;min-width:420px;overflow-y: auto;">
                        </div>
                          <button class="btn btn-light load_more"  from="" to="" onclick="get_notification($('.load_more').attr('from'),$('.load_more').attr('to'))">Load More</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

        </div>
        <div class="welcome-note-container p-2 mb-1">

   <div class="row justify-content-between">
          <div class="col-2 ">
       <label><p style="font-size:15px" class="mt-1 mb-0">Search Doctors By Id/Email</h1></label>
    </div>
    
    <div class="col-4">
        <input type="text" class="form-control" style="width:100%" id="search-query" placeholder="Search doctor">
    
    </div>
    
      <div class="col-3">
       <button class="btn btn-primary" id="search-button">Search</button>
    </div>
    
    
     <div class="col-3">
       <a class="btn btn-primary"href="{{url('/shareProfile')}}">Manage Doctors</a>
    </div>
</div>

            <div class="h6 mt-1 mb-0">

           

            </div>
        </div>
        <div id="doctor-list-container2">

            <table id="doctor-list2"class="table table-bordered">

              <thead style="background-color: #02b2b0;color:white">

                  <tr>

                      <th>Sr</th>

                      <th>Doctor Id</th>

                      <th>Email</th>

                      <th>Doctor Id Number</th>

                      <!--<th>Full Name</th>-->




                      <th>Action</th>

                  </tr>

              </thead>

              <tbody id="doctor-list-body2">

              </tbody>

            </table>

            </div>

            <div  class="ml-auto mr-auto d-flex justify-content-center pages_btn mt-2" style="margin-left:auto !important;margin-right:auto !important;">

          </div>





</div>
  </div>

</main>

<style>

.modal-dialog-top {
    transform: translateY(-100%);
    transition: transform 0.6s ease-in-out;
}

.modal.show .modal-dialog-top {
    transform: translateY(0);
}

</style>


<div class="modal" id="shareModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="d-flex justify-content-start modal-header bg-primary text-white">
      
         <h5 class="me-2">Share profile to</h5><h5 id="doctor_email"></h5>
        </div>
        <div class="modal-body">
            <input type="hidden"name="doctor_id"class="doctor_id"/>
            <label for="additionalInfo">Special Note for your Doctor</label>
            <input name="patient_note"type="text"  class="form-control patientNote"placeholder="Enter Note Here...">

        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary"onclick="send_profile()">Share</button>
        </div>
        <input type="hidden"name="notification_id" class="notification_id"/>

      </div>
    </div>
  </div>

<style>
    #moduless{
        color:black
    }
</style>
    @include('UserPanel.Includes.script')
    <script>


var pageTitle = "Patient health Professionals - {{env('APP_NAME')}}";


document.title = pageTitle;

function fetch_all_modules_data(){
            loader(true);
        $.ajax({
        headers: {
        "Accept": "application/json",
        "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "GET",
        url: "{{config('app.api_url')}}/api/module-managers",
        success: function(response) {
        var module_managers = response.data.module_manager;
        var $html= '';
        if(module_managers.length > 0){

        for(var i = 0; i<module_managers.length;i++){

        $html +=`



        <div id="moduless" class="h5 text-primary"><strong>${module_managers[i]['name']}</strong></div>`;

        $(window).on('resize', function() {
    var width = $(window).width();

    if (width >= 425) {
        $('.widget-card-col').css('margin-top', '20px');
    } else if (width >= 375) {
        $('.widget-card-col').css('margin-top', '20px');
    } else if (width >= 320) {
        $('.widget-card-col').css('margin-top', '20px');
    }
});
        }
        $('.append_module').html($html);





        loader(false);
    }
        },
        error: function(response) {
        loader(false);
        if (response.status == 500) {
        toastr.error("Something went wrong")
        } else {
        // toastr.error(response.responseJSON.message)
        }
        }
        });

        }


function getDoctorslist(from, pagination) {
  loader(true);
  $.ajax({
    headers: {
      "Accept": "application/json",
      "Authorization": `Bearer ${getCookie('BearerToken')}`,
    },
    type: "PUT",
    url: `{{config('app.api_url')}}/api/users/show-all-requests-to-patient?patient_id=${getCookie('user_id')}&&from=${from}`,
    success: function (response) {
      var request_to_doctor1 = response.data.request_to_doctor;
      console.log(request_to_doctor1);

      $("#search-button").on("click", function searchDoctors() {
        var searchQuery = $("#search-query").val().trim().toLowerCase();

        if (searchQuery === "") {
          $('#doctor-list-body2').html('<tr><td colspan="6">No records found</td></tr>');
          return;
        }

        $.ajax({
          headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
          },
          type: "GET",
          url: `{{config('app.api_url')}}/api/users/request-to-doctor?patient_id=${getCookie('user_id')}`,
          success: function (response) {
            var request_to_doctor = response.data;

            var searchQuery = $("#search-query").val();

            var filteredDoctors = request_to_doctor.filter(function (doctor) {
              return doctor.id.toString() === searchQuery || doctor.email == searchQuery;
            });

            var html = '';
            var userMeta = '';

            if (filteredDoctors.length === 0) {
              $('#doctor-list-body2').html('<tr><td colspan="6">No records found</td></tr>');
              return;
            }

            for (var i = 0; i < filteredDoctors.length; i++) {
              var matchingRequest = request_to_doctor1.find(reqDoc => reqDoc.doctor_id == filteredDoctors[i].id);
              

              if (matchingRequest) {
                if (matchingRequest.patient_accept_or_reject == 1 && matchingRequest.doctor_accept_or_reject  == 2) {
                  buttonLabel = 'Share';doctor_accept_or_reject
                  buttonClass = 'btn btn-primary btn-sm share-button';
                }else if(matchingRequest.patient_accept_or_reject == 0 || matchingRequest.patient_accept_or_reject == 2){
                  var buttonLabel = 'Share';
                  var buttonClass = 'btn btn-primary btn-sm share-button';
                }
                else if(matchingRequest.patient_accept_or_reject == 1 && matchingRequest.doctor_accept_or_reject == 0){
                  var buttonLabel = 'Pending';
                  var buttonClass = 'btn btn-warning btn-sm';
                }
                   else if(matchingRequest.patient_accept_or_reject == 1 && matchingRequest.doctor_accept_or_reject == 1){
                  var buttonLabel = 'Accepted';
                  var buttonClass = 'btn btn-success btn-sm ';
                }
                 else if(matchingRequest.patient_accept_or_reject == 2 && matchingRequest.doctor_accept_or_reject == 1){
                  var buttonLabel = 'Share';
                  var buttonClass = 'btn btn-primary btn-sm share-button';
                }
              }else{
                    var buttonLabel = 'Share';
                  var buttonClass = 'btn btn-primary btn-sm share-button';
                }

              html += `<tr>
                <td>${i + 1}</td>
                <td>${filteredDoctors[i].id}</td>
                <td>${filteredDoctors[i].email}</td>`;

              profile = filteredDoctors[i].profile ? filteredDoctors[i].profile : [];

              var obj = {
                "doctor_id_number": "",
                // "full_name": "",
              };

              for (var j = 0; j < profile.length; j++) {
                if (profile[j]?.option == 'doctor_id_number') {
                  obj.doctor_id_number = profile[j]?.value;
                }
                // if (profile[j]?.option == 'full_name') {
                //   obj.full_name = profile[j]?.value;
                // }
              }

              html += `
                <td>${obj.doctor_id_number}</td>
              
                <td><a class="${buttonClass}" data-id="${filteredDoctors[i].id}" data-email="${filteredDoctors[i].email}">${buttonLabel}</a></td>
              </tr>`;

              if (matchingRequest) {
                console.log("Matching Request Data:", matchingRequest);
              }
            }

            $('#doctor-list-body2').html(html);
          },
        });
      });
    },
  });
}






$(document).on('click', '.share-button', function() {
    
    var doctorId = $(this).data('id');
     var doctorEmail = $(this).data('email');
    
    $('#shareModal .doctor_id').val(doctorId);
    $('#shareModal .modal-header #doctor_email').text(doctorEmail);
  

    $("#shareModal").modal("show");
})

function send_profile(){


        
      patientNote=$(".patientNote").val();
      const formData={

        "patient_id": getCookie('user_id'),
        "doctor_id": $('.doctor_id').val(),
        "patient_accept_or_reject": 1,
        "doctor_notification": 1,
        "patient_note": patientNote
      }

        $.ajax({
   headers: {
   "Accept": "application/json",
   "Authorization": `Bearer ${getCookie('BearerToken')}`,
   },
   type: "POST",
   url: "{{config('app.api_url')}}/api/users/request-to-doctor-store",
   data:formData,



   success: function(response) {



console.log('response');

          toastr.success(response.message);
          $('#shareModal').modal('hide');
          location.reload();
 console.log(response);

        },

        error: function(error) {


          if (error.status == 400) {
          toastr.error("Already send request to this health professional");
          location.reload();
          }
  else  if (response.status == 500) {
      toastr.error("Something went wrong")
    }
    else
    {

    }
                                  }
   });

}


$(document).on('click', '.decline-button', function() {
    
    var doctorId = $(this).data('id');
    $('#shareModal .doctor_id').val(doctorId);

  
    $("#shareModal").modal("show");
});


// function getDoctorslist() {
//   loader(true);
//   $.ajax({
//     headers: {
//       "Accept": "application/json",
//       "Authorization": `Bearer ${getCookie('BearerToken')}`,
//     },
//     type: "GET",
//     url: `{{config('app.api_url')}}/api/users/request-to-doctor?patient_id=${getCookie('user_id')}`,
//     success: function (response) {

//         var request_to_doctor = response.data.user;
// console.log(request_to_doctor);


//   var html = ``;

//   var     userMeta = ``;

//   var declinedRequests = JSON.parse(localStorage.getItem('declinedRequests')) || [];

//   for(var i=0; i < request_to_doctor.length;i++)

//   {
// if (declinedRequests.includes(request_to_doctor[i].id)) {
//             continue;
//         }

//         html +=`<tr>

//             <td>${i+1}</td>

//             <td>${request_to_doctor[i].id}</td>

//             <td>${request_to_doctor[i].email}</td>`;

//         profile = request_to_doctor[i].profile ? request_to_doctor[i].profile : [];


//         console.log(profile);

//         var obj = {

//             "doctor_id_number" : "",

//             "full_name" : "",

            
//         }




//     for(j=0; j< profile.length;j++)

//     {



//         if(profile[j]?.option == 'doctor_id_number'){

//             obj.doctor_id_number = profile[j]?.value

//         }

//         if(profile[j]?.option == 'full_name'){

//             obj.full_name = profile[j]?.value

//         }

       
//     }


//             html +=`

//             <td>${obj.doctor_id_number}</td>

//             <td>${obj.full_name}</td>

           
//             <td> <a class="btn btn-primary btn-sm decline-button" data-id="${request_to_doctor[i].id}">Share</a> </td>`


//         html +=`</tr>`;


 

//   }

//   $('#doctor-list-body2').html(html);

//     },

//   });
// }

// function searchDoctors(request_to_doctor1) {
    
//     console.log(request_to_doctor1,'23232323');
//     var searchQuery = $("#search-query").val().trim().toLowerCase();

//   if (searchQuery === "") {
//     $('#doctor-list-body2').html('<tr><td colspan="5">No records found</td></tr>');
//     return; 
//   }
  
//   $.ajax({
//     headers: {
//       "Accept": "application/json",
//       "Authorization": `Bearer ${getCookie('BearerToken')}`,
//     },
//     type: "GET",
//     url: `{{config('app.api_url')}}/api/users/request-to-doctor?patient_id=${getCookie('user_id')}`,
//     success: function (response) {
//       var request_to_doctor = response.data.user;
//       console.log(request_to_doctor);
//       var searchQuery = $("#search-query").val().toLowerCase();

//       var filteredDoctors = request_to_doctor.filter(function (doctor) {
     
//         return doctor.id.toString() === searchQuery || doctor.email.includes(searchQuery);
//       });

//       var html = '';
//       var userMeta = '';

//       if (filteredDoctors.length === 0) {
//         $('#doctor-list-body2').html('<tr><td colspan="5">No records found</td></tr>');
//         return;
//       }

//       for (var i = 0; i < filteredDoctors.length; i++) {
//         html += `<tr>
//             <td>${i + 1}</td>
//             <td>${filteredDoctors[i].id}</td>
//             <td>${filteredDoctors[i].email}</td>`;

//         profile = filteredDoctors[i].profile ? filteredDoctors[i].profile : [];

//         var obj = {
//           "doctor_id_number": "",
//           "full_name": "",
//         };

//         for (var j = 0; j < profile.length; j++) {
//           if (profile[j]?.option == 'doctor_id_number') {
//             obj.doctor_id_number = profile[j]?.value;
//           }
//           if (profile[j]?.option == 'full_name') {
//             obj.full_name = profile[j]?.value;
//           }
//         }

//         html += `
//             <td>${obj.doctor_id_number}</td>
//             <td>${obj.full_name}</td>
//             <td><a class="btn btn-primary btn-sm decline-button" data-id="${filteredDoctors[i].id}">Share</a></td>
//           </tr>`;
//       }

//       $('#doctor-list-body2').html(html);
//     },
//   });
// }




function selectDoctor(doctorId) {
    if (doctorId === "") {
        return;
    }



    $('#submitBtn').on('click', function () {
        send_profile(doctorId);

    });


    const selectedDoctorIdElement = document.getElementById("selectedDoctorId");
    selectedDoctorIdElement.textContent = doctorId;

    $('#doctorModal').modal('show');
}


function capitalizeFirstLetter(text) {
    text = text.replace(/_/g, ' ');
    return text.charAt(0).toUpperCase() + text.slice(1);
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


function searchDoctorBtId() {
  var doctorSearchInput = document.getElementById('doctor-search2');

  doctorSearchInput.addEventListener('keyup', function () {
    var searchText = this.value.toLowerCase();

    var doctorTableBody = document.querySelector('#doctor-list2 tbody');

    var doctorRows = doctorTableBody.querySelectorAll('tr');

    doctorRows.forEach(function (row) {
        var idCell = row.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();
      var emailCell = row.querySelector('td:nth-child(3)').textContent.trim().toLowerCase();

      var idMatches = idCell === searchText;
      var emailMatches = emailCell.includes(searchText);

      if (idMatches || emailMatches) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
}


        $(document).ready(function() {



// $("#doctor-search2").on("input", function() {
//   // Get the search query from the input field
//   var searchQuery = $(this).val();

//   // Call the searchDoctors function with the search query
//   searchDoctors(doctors, searchQuery);
// });

        //   searchDoctorBtId();

            $('#doctorModal .modal-body').click(function(event) {
        event.stopPropagation();
    });
            $('#closeButton').click(function() {
        $('.modal').modal('hide');
        $('#myInput').val('');

    });
            fetch_all_modules_data();
            
            getDoctorslist();



});


</script>

@include('UserPanel.Includes.footer')

