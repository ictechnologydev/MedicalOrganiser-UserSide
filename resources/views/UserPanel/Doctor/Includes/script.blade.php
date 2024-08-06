<script src="{{url('/')}}/assets//dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/assets//dist/styles/sidebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$("#medicine-select-field,#recurring-select-field,#doctor-select-field").select2({
            theme: "bootstrap-5",
            
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

$(document).ready(function() {
    
  get_all_doctor_pages();
    
})

function get_all_doctor_pages(){
loader(true);
             
    $.ajax({
    headers: {
        "Accept": "application/json",
        "Authorization": `Bearer ${getCookie('BearerToken')}`,
    },
    type: "GET",
    url: `{{config('app.api_url')}}/api/pages?role_id=${getCookie('user_role_id')}`,
    contentType: "application/json",
    success: function(response) {
            var pagesArray = response.data.pages;
            var pageElement = "";
            pagesArray.forEach(function(page) {
            var pageId = page.id;
            var pageName = page.name;
            var pageStatus = page.status;
            pageElement += `<a  class="dropdown-item" role="button" href="{{url('/')}}/doctor/pages/${pageId}" >${pageName}</a>`;
            });
            
            $(".PagesClass").after(pageElement);
            
            loader(false);
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
function get_patient_invites(){
  loader(true);
 
   $.ajax({
   headers: {
   "Accept": "application/json",
   "Authorization": `Bearer ${getCookie('BearerToken')}`,
   },
    type: "PUT", 
    url: `{{config('app.api_url')}}/api/users/show-all-requests-to-doctor?doctor_id=${getCooki('user_id')}`,
               
   success: function(response) {
    var detail = response.data.request_to_doctor;

    setCookies(response)
  console.log(detail,'d');


  var container = document.getElementById('requestDetails');


  var html = '';


detail.forEach(function(request) {
  if (request.patient_accept_or_reject == 1) {
       
        return;
    }
    if (request.patient_accept_or_reject != 2) {
      html += '<div class="invite-notification">';
        html += '<div class="inviter-section">';
       
      
        html += '<div class="patient-info">';
        html += '<div class="patient-id">' + 'Patient ID: ' + request.patient_id + '</div>';
        html += '<div class="patient-message" >' + 'Invitation Date: ' + request.date + '</div>';
        
        html += '</div>';
        html += '<div class="action-section">';
        
        if (request.patient_accept_or_reject == 0) {
            html += '<button class="accept-invite" data-patient-id="' + request.id + '" patient_id="' + request.patient_id + '" data-patient-note="' + request.patient_note + '" onclick="accept_invitation(this)"><img src="/assets/images/check.svg"></button>';
            html += '<button onclick="reject_invitation(this)" class="reject-invite" data-patient-id="' + request.id + '" data-patient-note="' + request.patient_note + '"><img src="/assets/images/x.svg"></button>';
        } 
        html += '</div>';
        html += '</div>';
        
        html += '</div>';
        
html += '</div>';
        
    }
});


container.innerHTML = html;


var container2 = document.getElementById('acceptedPatients');
var html2 = '';


detail.forEach(function(request) {
    if (request.patient_accept_or_reject == 1) {
      html2 += '<div class="invite-notification">';
        html2 += '<div class="inviter-section">';
       
      
          html2 += '<div class="patient-info">';
            html2 += '<div class="patient-id">' + 'Patient ID: ' + request.patient_id + '</div>';
            html2 += '<div class="patient-message" >' + 'Invitation Date: ' + request.date + '</div>';
        
            html2 += '</div>';
            html2 += '<div class="action-section">';
        
         if (request.patient_accept_or_reject == 1) {
          html2 += '<button onclick="show_patient_profile()" class="view-profile" data-patient-id="' + request.id + '"><img src="/assets/images/user.svg"></button>';
        }
        html2 += '</div>';
        html2 += '</div>';
        
        html2 += '</div>';
        
        html2 += '</div>';
        
    }
});




container2.innerHTML = html2;

document.querySelectorAll('.accept-invite').forEach(function(button) {
    button.addEventListener('click', function() {
        var patientId = button.getAttribute('data-patient-id');
        var patientNote = button.getAttribute('data-patient-note');
        var id = button.getAttribute('patient_id');
    });
});


document.querySelectorAll('.reject-invite').forEach(function(button) {
    button.addEventListener('click', function() {
        var patientId = button.getAttribute('data-patient-id');
        
    });
});

document.querySelectorAll('.view-profile').forEach(function(button) {
  button.addEventListener('click', function() {
    var id = button.getAttribute('data-patient-id');

    window.location.href = '/doctor/patient-profile?id='  + id;;
    
  });


});
loader(false);
   }
   });
}


function accept_invitation(button){
  loader(true);
  const id = button.getAttribute('data-patient-id');
    const patientNote = button.getAttribute('data-patient-note');
    const patientId = button.getAttribute('patient_id');
const formData ={
  notification_id:id,
patient_id:patientId,
patient_accept_or_reject: 1,
patient_note:patientNote
}
console.log(formData,'form');
$.ajax({
headers: {
"Accept": "application/json",
"Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "PUT", 

url:`{{config('app.api_url')}}/api/users/request-status-update-patient?notification_id=${id}&patient_note=${formData.patient_note}&patient_accept_or_reject=1`,
  body:formData,   
success: function(response) {
// alert(response.message);
console.log(response,'data notify');
toastr.success('Notification Accepted Successfully');
get_patient_invites();

}
});
}


function reject_invitation(button){
  loader(true);
  const id = button.getAttribute('data-patient-id');
    const patientNote = button.getAttribute('data-patient-note');
    const patientId = button.getAttribute('patient_id');
const formData ={
  notification_id:id,
patient_id:patientId,
patient_accept_or_reject: 2,
patient_note:patientNote
}
console.log(formData,'form');
$.ajax({
headers: {
"Accept": "application/json",
"Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "PUT", 

url:`{{config('app.api_url')}}/api/users/request-status-update-patient?notification_id=${id}&patient_note=${formData.patient_note}&patient_accept_or_reject=2`,
body:formData,   
success: function(response) {
// alert(response.message);
console.log(response,'data notify');
toastr.success('Notification Rejected Successfully');
get_patient_invites();

}
});
}


function get_patient_with_date_filter(){
  
  loader(true);
  const selectedDate = $('.date').val();


if (!selectedDate) {
    toastr.error('Please select a date.');
    return;
}

  const isoFormattedDate = new Date(selectedDate).toISOString().split('T')[0];

  const formData={
    doctor_id: getCooki('user_id'),
    date:  isoFormattedDate
  }
  console.log(formData,'form');
  $.ajax({
headers: {
"Accept": "application/json",
"Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "POST", 
url:"{{config('app.api_url')}}/api/doctor/my-patient-with-date-fillter",
body:JSON.stringify(formData),   
success: function(response) {
console.log(response.message,'data notify');
toastr.success(response.message);


}
});
}



$('.date').on('change', get_patient_with_date_filter);


function setCookies(response) {
setCookie('patient_id',response.data.request_to_doctor.patient_id, '1')
} 

function attachEventListeners(){


  document.querySelectorAll('.accept-invite').forEach(function(button) {
    button.addEventListener('click', function() {
        var patientId = button.getAttribute('data-patient-id');
        
    });
});

document.querySelectorAll('.reject-invite').forEach(function(button) {
    button.addEventListener('click', function() {
        var patientId = button.getAttribute('data-patient-id');
   
    });
});

document.querySelectorAll('.view-profile').forEach(function(button) {
    button.addEventListener('click', function() {
        var patientId = button.getAttribute('data-patient-id');
        
        
        window.location.href = '/doctor/patient-profile?patient_id=' + patientId;


    });
});


}
function create_field_html(field)
   {
     var  html_field = ``;

      if(field[3] == 'text')
                  {
                     html_field += `
                     <input type="text" class="form-control" id="${field[2]}" name="${field[2]}"  value="${field[6]}"   placeholder="${field[1]}">
                     `;
                  }
                  if(field[3] == 'number')
                  {
                     html_field += `
                     <input type="number" class="form-control" id="${field[2]}" name="${field[2]}"  value="${field[6]}"   placeholder="${field[1]}">
                     `;
                  }
                  if(field[3] == 'email')
                  {
                     html_field += `
                     <input type="email" class="form-control" id="${field[2]}" name="${field[2]}"  value="${field[6]}"   placeholder="${field[1]}">
                     `;
                  }
                  else
                  if(field[3] == 'image')
                  {
                     html_field += `
                     <input type="file" class="form-control" id="${field[2]}" name="${field[2]}"   value="${field[6]}"  placeholder="${field[1]}">
                     `;
                  }
                  else
                  if(field[3] == 'datepicker')
                  {
                     html_field += `
                     <input type="date" class="form-control" id="${field[2]}" name="${field[2]}"   value="${field[6] ? field[6] :  getCurrentDate()}"  placeholder="${field[1]}">
                     `;
                  }
                  else
                  if(field[3] == 'radio')
                  {
                     value_list = field[5] 
                     
                     for(var i=0; i < value_list.length; i++)
                     {

                        html_field += `
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" name="${field[2]}"   value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'checked' : i=='0' ? 'checked' : '' }  >
                                 <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i].trim()}</label>
                              </div>
                        `;
                     }
                  }
                  else 
                  if(field[3] == 'checkbox')
                  {
                     value_list = field[5] 
                     
                     for(var i=0; i < value_list.length; i++)
                     {

                     html_field += `
                                 <div class="form-check">
                                 <input class="form-check-input" type="checkbox"  name="${field[2]}[]"  value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'checked' : '' }>
                                 <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i].trim()}</label>
                                 </div>
                     `;

                     }
                  }
                  else
                  if(field[3] == 'dropdown')
                  {
                     value_list = field[5]
 
                     html_field += `<select class="form-control" style="text-transform: capitalize;" id="${field[2]}" name="${field[2]}"    >`;

                     for(var i=0; i < value_list.length; i++)
                     {
                        html_field +=`<option value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
                     }

                     html_field +=`</select>`;
                  }
                  else
                  if(field[3] == 'textarea')
                  {
                     html_field += `
                     <textarea class="form-control"  id="${field[2]}" name="${field[2]}"    placeholder="${field[1]}">${field[6]}</textarea>
                     `;
                  }

                  return html_field;
   }



        $(document).ready(function() {

         
          
        $('.full_loader').addClass('d-none');
        });



        function _profile(user_id,role_id)
   {
      
    loader(true);
    formData={
      user_id : getCooki('user_id'),
                role_id : getCooki('user_role_id')
    }
console.log(formData);
      $.ajax({
               headers: {
                     "Accept": "application/json",
                     "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
               type: "POST", 
               url: "{{config('app.api_url')}}/api/get-profile-data",
               data: formData,
               success: function(response) {

                console.log(response);
                var    user_profile =    response.data.user_profile


   
                var html = '';


                    for(var i=0;i < user_profile.length; i++ ) 
                    {
                      html +=`<div class="row" ><div class="mt-1 col-6" style = "font-weight:bold !important;text-transform:capitalize;" >${user_profile[i]['option'].replace("_", " ")} :</div> <div class="col-6">${user_profile[i]['value']}</div></div>`;
                    }


                $('#detail_table tbody').html(html);
                $('#detailsModal').modal('show');


 
                  

               
               },
               error: function(response) {
                     if (response.status == 500) {
                        toastr.error("Something went wrong")
                     } else {
                        toastr.error(response.responseJSON.message)
                     }
               }
            });

   }
   


   function _emergencyData(user_id,role_id)
   {
      
    loader(true);
    formData={
      user_id : getCooki('user_id'),
                role_id : getCooki('user_role_id')
    }
console.log(formData);
      $.ajax({
               headers: {
                     "Accept": "application/json",
                     "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
               type: "POST", 
               url: "{{config('app.api_url')}}/api/get-emergency-contacts-data",
               data: formData,
               success: function(response) {

                console.log(response);
                var    emergency_contacts =    response.data.emergency_contacts


   
                var html = '';


                    for(var i=0;i < emergency_contacts.length; i++ ) 
                    {
                      html +=`<div class="row" ><div class="mt-1 col-6" style = "font-weight:bold !important;text-transform:capitalize;" >${emergency_contacts[i]['option'].replace("_", " ")} :</div> <div class="col-6">${emergency_contacts[i]['value']}</div></div>`;
                    }


                $('#detail_table2 tbody').html(html);
                $('#detailsModal').modal('show');


 
                  

               
               },
               error: function(response) {
                     if (response.status == 500) {
                        toastr.error("Something went wrong")
                     } else {
                        toastr.error(response.responseJSON.message)
                     }
               }
            });

   }
   




function getprofile(user_id,role_id){

  loader(true);
  _profile(user_id,role_id);
  _emergencyData(user_id,role_id);
}

   
  
   function _emergencyfields(email,role_id,user_id)
   {
    loader(true);
        loader(true);

        const formData={

          email:getEmail('user_email'),
          user_id : getCooki('user_id'),
                role_id : getCooki('user_role_id')
        }

        $.ajax({
                    headers: {
                        "Accept": "application/json",
                        "Authorization": `Bearer ${getCookie('BearerToken')}`,
                    },
                    type: "POST",
                    url: "{{config('app.api_url')}}/api/get-emergency-contacts-fields",
                    data: formData,
                    success: function(response) {
                     console.log(response.data);
                       var  fields = response.data.fields;
                      
                      var html_field = ``;
                     
                      for(i=0;i< fields.length;i++)
                      {
                        html_field += `<div class="form-group mt-2 col-6" >`
                        html_field += `<label class="mb-1">${fields[i][1]}</label>`;
                        html_field +=  create_field_html(fields[i]);
                        html_field += `</div>`;
                      }
                      

                     $('.append_field').html(html_field);

                     $('#editform .roleid').val(role_id);
                     $('#editform .userid').val(user_id);

                      loader(false);
                      $('#editModal').modal('show');

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
   function _edit(email,role_id,user_id)
   {
    loader(true);
        loader(true);

        const formData={

          email:getEmail('user_email'),
          user_id : getCooki('user_id'),
                role_id : getCooki('user_role_id')
        }

        $.ajax({
                    headers: {
                        "Accept": "application/json",
                        "Authorization": `Bearer ${getCookie('BearerToken')}`,
                    },
                    type: "POST",
                    url: "{{config('app.api_url')}}/api/get-profile-fields",
                    data: formData,
                    success: function(response) {
                     console.log(response.data);
                       var  fields = response.data.fields;
                      
                      var html_field = ``;
                     
                      for(i=0;i< fields.length;i++)
                      {
                        html_field += `<div class="form-group mt-2 col-6" >`
                        html_field += `<label class="mb-1">${fields[i][1]}</label>`;
                        html_field +=  create_field_html(fields[i]);
                        html_field += `</div>`;
                      }
                      

                     $('.append_fields').html(html_field);

                     $('#edit_form .role_id').val(role_id);
                     $('#edit_form .user_id').val(user_id);

                      loader(false);
                      $('#editModal').modal('show');

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
   function callTwoAPIs() {
    var email = getEmail('email');
    var userId = getCooki('user_id');
    var roleId = getCooki('role_id');

    _edit(email, userId, roleId);
    _emergencyfields(email, userId, roleId);
}


   $("#edit_form").on("submit", function(e,user_id,role_id) {
      e.preventDefault();
      

   
      loader(true);

      const formData = new FormData(this);
formData.append('user_id', getCookie('user_id'));
formData.append('role_id', getCookie('user_role_id'));  


 $.ajax({
               headers: {
                  "Accept": "application/json",
                  "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
            url: "{{config('app.api_url')}}/api/store-profile-fields",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              console.log(response.message);
               toastr.success(response.message);
               loader(false);
               $('#editModal').modal('hide');
               getprofile();
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




   $("#editform").on("submit", function(e,user_id,role_id) {
      e.preventDefault();
      
      loader(true);
      const formData = new FormData(this);
formData.append('user_id', getCookie('user_id'));
formData.append('role_id', getCookie('user_role_id')); 


            $.ajax({
               headers: {
                  "Accept": "application/json",
                  "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
            url: "{{config('app.api_url')}}/api/store-emergency-contacts-fields",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              console.log(response.data);
               toastr.success(response.message);
               loader(false);
               $('#editModal').modal('hide');
               getprofile();
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

   function saveFormAndCallFunction(user_id,role_id) {
   
    $('#edit_form').submit(user_id,role_id);
    $('#editform').submit(user_id,role_id);
   
    
}

 function getSettings(){
  loader(true);

  $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/get-general-settings",
           
            success: function(response) {
               console.log(response.data.general_settings);
                


               var    general_settings =    response.data.general_settings;

console.log(general_settings);
   


                var html = '';


                   
                      html += `
                      <h5 style="color:#02b2b0">About : <span style="color:black">${general_settings.about}</span></h5>
                      <h5 style="color:#02b2b0">Privacy Policy :<span style="color:black"> ${general_settings.privacy_policy}</span></h5>
    
                      <h5 style="color:#02b2b0">Terms and Conditions :<span style="color:black">${general_settings.terms_and_conditions}</span></h5>
      
    `


                    


                $('#settings_table tbody').html(html);
                $('#settingsModal').modal('show');


 


            }
            });
}
function all_read()
{

    $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/all-notifications-mark-as-read",
            data: {
            id : 3
            },
            success: function(response) {
                $('.notification_menu').css('display','none');
                $('.notification_dot').css('display','none');
                
            }
            });

    
}

function all_read()

{
  loader(true);

    $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/all-notifications-mark-as-read",
            data: {
              id:getCooki('user_role_id')
            },
            success: function(response) {
                $('.notification_menu').css('display','none');
                $('.notification_dot').css('display','none');
                loader(false);  
            }
            });

    
}

$(document).ready(function() {


$('.show_notification').on('click', function () {
    get_notification(0,10);
});

$('.page-wrapper').on('click', function () {
    $('.notification_menu').css('display','none');
});
count_notification();


});


function get_notification(from)
 {

  loader(true);
    const formdata={
        id:getCooki('user_id'),
        from:from,
        to:10
    }
 console.log(formdata);
            $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/get-notifications",
            data: formdata,
            success: function(response) {

            

                var notifications = response.data.notifications;
                if(notifications.length)
                {
                  var  html = ``;
                  var _style = "";
                        for(i=0;i<notifications.length;i++)
                        {

                            if(notifications[i].receiver == "" )
                            {
                                _style =  notifications[i].seen_by_receiver == '0'  ?  'background: beige' : '';
                            }
                            else if(notifications[i].sender == "0" )
                            {
                                _style =  notifications[i].seen_by_sender == '0'  ?  'background: beige' : '';
                            }


                          html +=`<div no="${notifications[i].id}" role="button" class="list-group-item" style="${_style}" >
                            <div class="row align-items-center">
                            <div class="col text-truncate">
                                <div  class="text-body d-block">${notifications[i].id} ${notifications[i].title}</div>
                                <div class="d-block text-secondary text-truncate mt-n1">
                                ${notifications[i].short_desc}
                                </div>
                            </div>
                            </div>
                            </div>`;
                        }

                        
                        if(from == 0)
                        {
                            $('.append_notifications').html('');
                        }
                       
                        $('.append_notifications').append(html);
                        $('.load_more').attr('from',(10+parseInt(from)));
                        $('.load_more').attr('to',10);
                        $('.load_more').css('display','block');

                }
                else
                {
                    if(from == 0)
                        {
                                $('.append_notifications').html('<center style="margin-top: 210px!important;">No Notification Yet</center>');
                                $('.load_more').css('display','none');
                        }
                        else
                        {
                            $('.load_more').css('display','none');

                        }
                }

                $('.notification_menu').css('display','block');
                loader(false); 
            }
            });

 }


 function closeNotification() {
    // Find the notification menu and hide it
    var notificationMenu = document.querySelector(".notification_menu");
    if (notificationMenu) {
      notificationMenu.style.display = "none";
    }
  }

 function count_notification()
 {

  loader(true);
    const formdata={
        id:getCooki('user_role_id')
    }
   
            $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/count-notifications",
            data: formdata,
            success: function(response) {
              
                
                 
                if(response.data.count)
                {
                    $('.notification_dot').show();
                }
                else
                {
                    $('.notification_dot').hide();
                }
                  loader(false);
            }
          
            });

 }

 function move_to_url(type,id)
{
  loader(true);
    var url = ""

    if(type == "support_resolved" || type == "support_store" )
    {
        url = "{{url('/general-settings/supports/list')}}?notify_id="+id;
    }
    else if(type == "request_to_doctor" || type == "request_to_doctor_accepted" || type == "request_to_doctor_accepted_by_patient")
    {
        url = "{{url('/requests')}}?notify_id="+id;
    }

    $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/single-notifications-mark-as-read",
            data: {
            id : 3,
            "notification_id" : id
            },
            success: function(response) {
              
                window.location.href = url;
                loader(false);
            }
            });

    
}
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + btoa(cvalue) + ";" + expires + ";path=/";
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




</script>