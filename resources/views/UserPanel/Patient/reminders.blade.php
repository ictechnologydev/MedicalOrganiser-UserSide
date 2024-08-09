@include('UserPanel.Includes.header')
<div>
 
<div class="container-fluid p-3 main-container-content">

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">Reminders</h3>
            
                
                
            </div>
            <div class="col-5 d-flex justify-content-end">
                <style>
                    .head{
                      display:flex;
                      justify-content: space-between;
                    }
                  </style>
                
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
        <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
            <div class="h6 mt-1 mb-0">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Reminder</button>
            </div>
        </div>
        <div id="reminderContainer">
            
        </div>
        
         <div class="row ">
            <div class="pagination-container col-lg-12 col-md-12 col-sm-9 pages_btn d-flex justify-content-center" >
            </div>
        </div>
   
    </div>
</div>
  </div>

</main>
<!-- Modal -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h4 id="offcanvasRightLabel">Add Reminder</h4>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="title" class="form-label">Procedure</label>
                    <input type="text" class="form-control title"  name="title"placeholder="Add Title...">
                  </div>
            </div>

           

              <div class="mb-3">
                <label for="title" class="form-label">Date Time</label>
                <input type="datetime-local" class="form-control date_time"  name="date_time"placeholder="select date time...">
              </div>
              <div class="mb-3">
                    <label for="title" class="form-label">By Whom</label>
                    <select class="form-control form-select  mt-1 bywhom" name="bywhom" id="bywhom" >
                        <option value="">Select By Whom Doctor / Allied Professional</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="title" class="form-label">Remind Me Before</label>
                    <select class="form-control form-select  mt-1 alert_before" name="alert_before" id="alert_before" >
                        <option value="">Select Remind Me Before</option>
                        <option value="1 Day">1 Day</option>
                        <option value="2 Days">2 Days</option>
                        <option value="3 Days">3 Days</option>
                        <option value="4 Days">4 Days</option>
                        <option value="5 Days">5 Days</option>
                        <option value="6 Days">6 Days</option>
                        <option value="7 Days">7 Days</option>
                        <option value="8 Days">8 Days</option>
                        <option value="9 Days">9 Days</option>
                        <option value="10 Days">10 Days</option>
                        <option value="11 Days">11 Days</option>
                        <option value="12 Days">12 Days</option>
                        <option value="13 Days">13 Days</option>
                        <option value="14 Days">14 Days</option>
                        <option value="15 Days">15 Days</option>
                    </select>
                  </div>
               <div class="mb-3">
                                 <label for="discription" class="form-label">Additional Notes</label>
                <textarea class="form-control des" name="des"placeholder="I want to add ..."></textarea>  
              </div>
            <button type="button" onclick="store_reminders()" class="btn btn-primary">Save</button>
          </form>
    </div>
  </div>





  <div class="modal fade" id="reminderUpdate" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="reason-modelLabel">Edit Reminder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="edit_from">
        
                <div class="mb-3">
    
                    <div class="mb-3">
                        <label for="title" class="form-label">Procedure</label>
                        <input type="text" class="form-control Etitle" id="title" value=""name="title"placeholder="Add Title...">
                      </div>
                </div>
                  <div class="mb-3">
                    <label for="title" class="form-label">Date Time</label>
                    <input type="datetime-local" class="form-control Edate_time" id="date_time" name="date_time" placeholder="select date time...">
                  </div>

                  <div class="mb-3">
                    <label for="title" class="form-label">By Whom</label>
                    <select class="form-control form-select  mt-1 bywhom" name="bywhom" id="Ebywhom" >
                        <option value="">Select by whome</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="title" class="form-label">Remind Me Before</label>
                    <select class="form-control form-select  mt-1 Ealert_before" name="alert_before" id="alert_before" >
                        <option value="">Select Remind Me Before</option>    
                        <option value="1 Day">1 Day</option>
                        <option value="2 Days">2 Days</option>
                        <option value="3 Days">3 Days</option>
                        <option value="4 Days">4 Days</option>
                        <option value="5 Days">5 Days</option>
                        <option value="6 Days">6 Days</option>
                        <option value="7 Days">7 Days</option>
                        <option value="8 Days">8 Days</option>
                        <option value="9 Days">9 Days</option>
                        <option value="10 Days">10 Days</option>
                        <option value="11 Days">11 Days</option>
                        <option value="12 Days">12 Days</option>
                        <option value="13 Days">13 Days</option>
                        <option value="14 Days">14 Days</option>
                        <option value="15 Days">15 Days</option>
                    </select>
                  </div>

                  
                   <div class="mb-3">
                    <label for="discription" class="form-label">Additional Notes</label>
                    <textarea class="form-control Edes" id="des" name="des" placeholder="I want to add ..."></textarea>
                  </div>
                <input type="hidden" class="Eid" name="id"value=""id="id">
                <button type="button" onclick="update_reminders()" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
    </div>
</div>


  @include('UserPanel.Includes.script')



<script>
var pageTitle = "Patient Reminders";
document.title = pageTitle;


function convertTo24Time(time12) {
  var timeParts = time12.split(' ');
  var hoursMinutes = timeParts[0].split(':');
  var hours = parseInt(hoursMinutes[0]);
  var minutes = parseInt(hoursMinutes[1]);
  var period = timeParts[1].toLowerCase();
  if (period === 'pm' && hours !== 12) {
    hours += 12;
  } else if (period === 'am' && hours === 12) {
    hours = 0;
  }
  var time24 = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
  return time24;
}

 function store_reminders() {
  
    if($('.des').val()  == '' ||  $('.title').val()  == '' ||  $('.date_time').val() == '' ||  $('.alert_before').val()  == '' ||  $('#bywhom').val()  == '')
    {
        toastr.error("All fields are required");
        return 0;
    }
    
    loader(true);
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: `{{config('app.api_url')}}/api/reminders`,
        data: {

            "des": $('.des').val(),
            "title": $('.title').val(),
            "date_time": $('.date_time').val(),
            "bywhom": $('#bywhom').val(),
            "alert_before": $('.alert_before').val(),
            "status": 1,
            "web": 1,
            "user_id": getCookie('user_id'),
            "unique_id": unique_number(),

        },
        success: function(response) {

            location.reload();


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

function convertToAMPM(time24) {
    // Split the time string into hours and minutes
    var timeParts = time24.split(':');
    var hours = parseInt(timeParts[0]);
    var minutes = timeParts[1];

    // Determine if it's AM or PM
    var period = hours < 12 ? 'AM' : 'PM';

    // Convert hours to 12-hour format
    hours = hours % 12;
    if (hours === 0) {
        hours = 12; // 12:00 should be 12:00 PM
    }

    // Format the time in AM/PM format
    var time12 = hours + ':' + minutes + ' ' + period;

    return time12;

}





function unique_number() {
   return  Math.floor(1000 + Math.random() * 9000);
}









function send_request() {
    loader(true);


    const formData = {
        "discription": $('.discription').val(),
        "title": $('.title').val(),
        "module_id": $('.module_id').val(),
        user_id: getCookie('user_id')
    }

    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/request-updates",
        data: formData,
        success: function(response) {
            loader(false);

            toastr.success(response.message);

        }
    });
}

function checkAndTriggerAlarms(requestUpdates) {
    const currentTime = new Date();
    let alarmTriggered = false;
    requestUpdates.forEach(update => {
        const reminderTime = new Date(update.date + ' ' + update.time);
        if (currentTime.getTime() >= reminderTime.getTime() && update.status === 1) {
            alarmTriggered = true;
            console.log('Alarm triggered for:', update.title);
        }
    });

    if (alarmTriggered) {
        alert('alarm');
    }
}

function get_all_reminders(user_id, calendarTime, page = 1) {
    // loader(true);
    
    const perPage = 10;
    const container = $('#reminderContainer');
    container.empty();
    const from = (page - 1) * perPage;
    
    console.log(from,'test');
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "GET",
        url: `{{config('app.api_url')}}/api/reminders?user_id=${getCookie('user_id')}&from=${from}`,
        success: function(response) {
            console.log(response);
            const requestUpdates = response.data.reminders;
            
            
            requestUpdates.forEach(update => {
                const requestDiv = document.createElement('div');
                requestDiv.className = 'welcome-note-container rounded-3 border border-primary border-2 p-1 mb-2';

                const innerDiv = document.createElement('div');
                innerDiv.className = 'bg-light rounded-3 p-2 request-widget';


                const title = document.createElement('div');
                title.className = 'text-secondary my-1';
                title.style.color = '#B9B4C7';
                title.style.fontStyle = 'none';
                title.style.fontWeight = '100';
                title.innerHTML = `<strong><small style="color:black;font-weight:bold">Title :</small>${update.title}</strong>`;
                innerDiv.appendChild(title);


                const descriptionElement = document.createElement('div');
                descriptionElement.className = 'text-secondary my-1';
                descriptionElement.style.color = '#B9B4C7';
                descriptionElement.style.fontStyle = 'none';
                descriptionElement.style.fontWeight = '100';
                descriptionElement.innerHTML = `<strong><small style="color:black;font-weight:bold">Additional Notes :</small>${update.des}</strong>`;
                innerDiv.appendChild(descriptionElement);

                const ByWhomElement = document.createElement('div');
                ByWhomElement.className = 'text-secondary my-1';
                ByWhomElement.style.color = '#B9B4C7';
                ByWhomElement.style.fontStyle = 'none';
                ByWhomElement.style.fontWeight = '100';
                ByWhomElement.innerHTML = `<strong><small style="color:black;font-weight:bold">By Whom :</small>${update.bywhom}</strong>`;
                innerDiv.appendChild(ByWhomElement);


                const AdditionalNotesElement = document.createElement('div');
                AdditionalNotesElement.className = 'text-secondary my-1';
                AdditionalNotesElement.style.color = '#B9B4C7';
                AdditionalNotesElement.style.fontStyle = 'none';
                AdditionalNotesElement.style.fontWeight = '100';
                AdditionalNotesElement.innerHTML = `<strong><small style="color:black;font-weight:bold">Remind Me Before :</small>${update.alert_before ? update.alert_before :  "-" }</strong>`;
                innerDiv.appendChild(AdditionalNotesElement);



                const date = document.createElement('div');
                date.className = 'text-secondary my-1';
                date.style.color = '#B9B4C7';
                date.style.fontStyle = 'none';
                date.style.fontWeight = '100';
                date.innerHTML = `<strong><small style="color:black;font-weight:bold">Date Time:</small>${update.date_time}</strong>`;
                innerDiv.appendChild(date);

                const responseElement = document.createElement('div');
                responseElement.className = '<div class="request-actions">';
                responseElement.className = 'action-items-status badge p-1';

                if (update.status == 0) {
                    responseElement.className += ' bg-danger text-white';
                    responseElement.textContent = 'Off';
                } else if (update.status == 1) {
                    responseElement.className += ' bg-success text-white';
                    responseElement.textContent = 'On';
                }

                innerDiv.appendChild(responseElement);
                const buttonsContainer = document.createElement('div');
                buttonsContainer.style.display = 'flex';
                buttonsContainer.style.justifyContent = 'flex-end';
                const editReminder = document.createElement('div');
                editReminder.innerHTML = `<button onclick="editReminder(${update.id})"  class="me-2 bg-warning" style="border:none;outline:none;color:white;border-radius:5px;padding:5px 10px 5px 10px">
                <small style="color:black;font-weight:bold"></small>Edit</button>`;

                const deleteReminder = document.createElement('div');
                deleteReminder.innerHTML = `<button onclick="delete_reminders(this)" class=" me-2  bg-danger mb-2" data-delete-id="${update.id}" style="border:none;outline:none;color:white;border-radius:5px;padding:5px 10px 5px 10px">
                <small style="color:black;font-weight:bold"></small>Delete</button>`;

                const statusUpdate = document.createElement('div');
                statusUpdate.innerHTML = `<button onclick="update_status(this)" class="me-2  bg-success" data-delete-id="${update.id}" data-status="${update.status}" style="border:none;outline:none;color:white;border-radius:5px;padding:5px 10px 5px 10px">
                <small style="color:black;font-weight:bold"></small>Update Status</button>`;

                buttonsContainer.appendChild(editReminder);
                buttonsContainer.appendChild(deleteReminder);
                buttonsContainer.appendChild(statusUpdate);
                innerDiv.appendChild(buttonsContainer);
                requestDiv.appendChild(innerDiv);
               container.append(requestDiv);
            });
            
              if (requestUpdates.length == 0) {
                var html_ = `
                <div class="welcome-note-container rounded-3 border border-primary border-2 p-1 mb-2">
                    <div class="bg-light rounded-3 p-2 request-widget">
                        <div class="my-1" style="font-weight: 100;text-align:center;text-weight:bold;color:black !important;">No reminders yet</div>
                    </div>
                </div>`;

                container.append(html_);
                return;
            }

console.log(response.recordsFiltered, page,'test')
            updatePaginationButton(response.recordsFiltered, page);
            loader(false);
        },
        error: function(error) {
            
        }
    });
}

function updatePaginationButton(count, currentPage) {
    loader(false);
    count = Math.ceil(count);
    console.log(count, currentPage);
    var pages_btn = ``;

    const prevPage = currentPage - 1 >= 1 ? currentPage - 1 : 1;
    const nextPage = currentPage + 1 <= Math.ceil(count / 10) ? currentPage + 1 : Math.ceil(count / 10);

    console.log("Current page value:", currentPage);
    console.log("Next page value:", nextPage);

    pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" onclick="get_all_reminders(getCookie('user_id'), ${prevPage});">Previous</button>`;

    $('.p-btn').removeClass('active');

    for (var c = 1; c <= Math.ceil(count / 10); c++) {
      if (currentPage === c) {
    pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn active" style="margin-left:10px;" onclick="get_all_reminders(getCookie('user_id'), '', ${c});">${c}</button>`;
} else {
    pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn" style="margin-left:10px;" onclick="get_all_reminders(getCookie('user_id'), '', ${c});">${c}</button>`;
}

    }

    if (nextPage <= Math.ceil(count / 10)) {
        pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" style="margin-left:10px;" onclick="get_all_reminders(getCookie('user_id'), '', ${nextPage});">Next</button>`;
    } else {
        pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" style="margin-left:10px;" onclick="get_all_reminders(getCookie('user_id'), '', ${nextPage});" disabled>Next</button>`;
    }

    $('.pagination-container').html(pages_btn);
}





function checkReminders(requestUpdates) {
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "GET",
        url: `{{config('app.api_url')}}/api/reminders?user_id=${getCookie('user_id')}`,
        success: function(response) {
            console.log(response.data, 'support');
            const requestUpdates = response.data.reminders;
            const currentTime = new Date();
            const currentHours = currentTime.getHours();
            const currentMinutes = currentTime.getMinutes();


            requestUpdates.forEach(update => {

                const [reminderHours, reminderMinutes] = update.time.split(':').map(Number);


                if (reminderHours === currentHours && reminderMinutes === currentMinutes) {

                    console.log(`Reminder match found for ${update.title}`);
                }
            });
        }
    });
}

function convertDateFormat(inputDate) {
 const date= inputDate.split('/');
 return `${date[2]}-${date[1]}-${date[0]}`;
}

function convertDateFormat__(inputDate) {
 const date= inputDate.split('/');
 return `${date[0]}-${date[1]}-${date[2]}`;
}

function update_status(button) {
    const updateId = button.getAttribute('data-delete-id');
    const status = button.getAttribute('data-status');

    loader(true);

    const currentStatus = status;


    const newStatus = currentStatus == 0 ? 1 : 0;
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "PUT",
        url: `{{config('app.api_url')}}/api/reminders/${updateId}/update-status?status=${newStatus}`,

        success: function(response) {
            console.log(response.message);

            location.reload();
            loader(false);
        },
        error: function(response) {
            console.log(response.error)
            loader(false);

        }
    });
}

function delete_reminders(button) {


    const updateId = button.getAttribute('data-delete-id');
    loader(true);

    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "DELETE",
        url: `{{config('app.api_url')}}/api/reminders/${updateId}`,

        success: function(response) {
            console.log(response.message);

            location.reload();
            loader(false);
        },
        error: function(response) {
            console.log(response.error)
            loader(false);

        }
    });
}

function editReminder(updateId) {

    loader(true);
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "GET",

        url: `{{config('app.api_url')}}/api/reminders/${updateId}/edit`,

        success: function(response) {
            var  reminder = response.data.reminder;
            $('.Eid').val(reminder.id);
            $('.Etitle').val(reminder.title);
            $('.Edes').val(reminder.des);
            $('#Ebywhom').val(reminder.bywhom);
            $('.Ealert_before').val(reminder.alert_before);
            $('.Edate_time').val(reminder.date_time);
            $('#reminderUpdate').modal('show');
            loader(false);
        },error: function(response) {
            loader(false);
            if (response.status == 500) {
                toastr.error("Something went wrong")
            } else {
                toastr.error(response.responseJSON.message)
            }
        }
    });
}

function getCurrentDateTime() {
  const now = new Date();
  const year = now.getFullYear();
  const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  const day = String(now.getDate()).padStart(2, '0');
  const hours = String(now.getHours()).padStart(2, '0');
  const minutes = String(now.getMinutes()).padStart(2, '0');
  
  const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}`;
  return formattedDateTime;
}




    
        
    
  
function update_reminders() {
var formData = {
        "id": $('.Eid').val(),
        "des": $('.Edes').val(),
        "title": $('.Etitle').val(),
        "date_time": $('.Edate_time').val(),
        "alert_before": $('.Ealert_before').val(),
        "bywhom": $('#Ebywhom').val(),
    };
    loader(true);
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "PUT",
        url: `{{config('app.api_url')}}/api/reminders/${formData.id}?des=${formData.des}&date=${formData.date}&title=${formData.title}&time=${formData.time}`,
        data: formData,
        success: function(response) {
            $('#reminderUpdate').modal('hide');
            
            get_all_reminders();
        },
        error: function(response) {
            console.log(response.error)
            loader(false);

        }
    });
}

$(document).ready(function() {
    get_all_reminders();
    fetchAcceptedDoctorAndAllied();
  

});

function fetchAcceptedDoctorAndAllied() {
    $.ajax({
        headers: {
            // "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: `{{config('app.api_url')}}/api/users/fetch-accepted-doctor-and-allied`,
        data: { 'patient_id' : getCookie('user_id')},
        success: function(response) {
            var my_doctor_and_allied = response.data.my_doctor_and_allied;
            

            var html =`<option value="">Select By Whom Doctor / Allied Professional</option>`;
            for(var i = 0; i< my_doctor_and_allied.length; i++)
            {
              html +=`<option value="${my_doctor_and_allied[i].email}" >${my_doctor_and_allied[i]?.role?.name} : ${my_doctor_and_allied[i].user_name}</option>`;
            }

            $('.bywhom').html(html);
            
            
       
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


function loader(show) {

    if (show == true) {
        $('.full_loader').removeClass('d-none');
    } else {
        $('.full_loader').addClass('d-none');
    }
}

feather.replace();
new DataTable('#example');
$("#medicine-select-field,#recurring-select-field,#doctor-select-field").select2({
    theme: "bootstrap-5",
});


</script>

@include('UserPanel.Includes.footer') 