


@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">Reminders</h3>
                {{-- <small>Dashabord - History</small> --}}
                
                
            </div>
            <div class="col-5 d-flex justify-content-end">
                <button class="btn btn-primary my-2">🔔</button>
            </div>
        </div>
        <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
            <div class="h6 mt-1 mb-0">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Reminder</button>
            </div>
        </div>
        <div id="reminderContainer">
            
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
                    <label for="title" class="form-label">Reminder Title</label>
                    <input type="text" class="form-control title"  name="title"placeholder="Add Title...">
                  </div>
                <label for="discription" class="form-label">Reminer Description</label>
                <textarea class="form-control des" name="des"placeholder="I want to add ..."></textarea>
            </div>

           

              <div class="mb-3">
                <label for="title" class="form-label">Reminder Date</label>
                <input type="date" class="form-control date"  name="date"placeholder="select date...">
              </div>
              <div class="mb-3">
                <label for="images" class="form-label">Reminder Time</label>
                <input type="time" class="form-control time"  name="time"placeholder="select Time...">
              </div>
              <div class="mb-3">
                <label for="images" class="form-label">Add Unique Id</label>
                <input type="text" class="form-control unique_id"  name="unique_id"placeholder="Add Image...">
              </div>

              <div class="mb-3">
                <label for="images" class="form-label">Add Recursion</label>
                <input type="text" class="form-control recursion"  name="recursion"placeholder="Add Recursion...">
              </div>
               <input type="hidden"name="status"class="status"value="1">
            {{-- <div class="mb-3">
                <label for="images" class="form-label">Add Date</label>
                <input type="date" class="form-control date_time" id="date_time" name="date_time"placeholder="Add Image...">
              </div> --}}
             
            <input type="hidden" class="user_id" name="user_id"value="${getCookie('user_id')}">
            <input type="hidden" class="whom" name="whom"value="2">
         
            <button type="button" onclick="store_reminders()" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>





  <div class="modal fade" id="reminderUpdate" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="reason-modelLabel">Edit Reminder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
        
                <div class="mb-3">
    
                    <div class="mb-3">
                        <label for="title" class="form-label">Reminder Title</label>
                        <input type="text" class="form-control Etitle" id="title" value=""name="title"placeholder="Add Title...">
                      </div>
                    <label for="discription" class="form-label">Reminer Description</label>
                    <textarea class="form-control Edes" id="des" name="des"placeholder="I want to add ..."></textarea>
                </div>
                  <div class="mb-3">
                    <label for="title" class="form-label">Reminder Date</label>
                    <input type="date" class="form-control Edate" id="date" name="date"placeholder="select date...">
                  </div>
                  <div class="mb-3">
                    <label for="images" class="form-label">Reminder Time</label>
                    <input type="time" class="form-control Etime" id="time" name="time"placeholder="select Time...">
                  </div>
                  <div class="mb-3">
                    <label for="images" class="form-label">Add Unique Id</label>
                    <input type="text" class="form-control Eunique_id" id="unique_id" name="unique_id"placeholder="Add Image...">
                  </div>
    
                  <div class="mb-3">
                    <label for="images" class="form-label">Add Recursion</label>
                    <input type="text" class="form-control Erecursion" id="recursion" name="recursion"placeholder="Add Recursion...">
                  </div>

                  <div class="mb-3">
                    <label for="images" class="form-label">Add Recursion</label>
                    <input type="time" class="form-control Ealert" id="recursion" name="alert_before"placeholder="Add alert before...">
                  </div>

                   <input type="hidden"name="status"class="Estatus"id="status">
                
                 
                <input type="hidden" class="user_id" name="user_id"value="${getCookie('user_id')}">
             
                <input type="hidden" class="Eid" name="id"value=""id="id">
             
                <button type="button" onclick="update_reminders()" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
    </div>
</div>


  @include('UserPanel.Includes.script')



    <script>



function store_reminders() {
    loader(true);


    const formData={
     
            "des": $('.des').val(),
            "title":  $('.title').val(),
            "date":  $('.date').val(),
            "status":  $('.status').val(),
            "user_id": getCookie('user_id'),
            "unique_id":  $('.unique_id').val(),
            "time":  $('.time').val(),
            "recursion":  $('.recursion').val(),

    }
    console.log(formData);
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/reminders",
        data:formData,
        success: function(response) {

            console.log(response.message);

            location.reload();
          

            loader(false);

        }
    });
}

function storeModuleId() {
    var selectedModuleId = $('#moduleSelect').val();
    $('#module_id').val(selectedModuleId);
}

        function send_request(){
            loader(true);


            const formData={
                "discription": $('.discription').val(),
            "title": $('.title').val(),
            "module_id":  $('.module_id').val(),
            user_id: getCookie('user_id')
            }
            console.log(formData);
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

        function checkAndTriggerAlarms(reminders) {
    const currentTime = new Date();
    reminders.forEach(update => {
        const reminderTime = new Date(update.date + ' ' + update.time);
        if (currentTime.getTime() >= reminderTime.getTime() && update.status === 1) {
            alert('alarm');
            
            console.log('Alarm triggered for:', update.title);
        }
    });
}
       
        function get_all_reminders(user_id) {
            loader(true);
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "GET",
        url: `{{config('app.api_url')}}/api/reminders?user_id=${getCookie('user_id')}`,
        success: function(response) {
            console.log(response.data,'support');
            const requestUpdates = response.data.reminders;

            

            checkAndTriggerAlarms(requestUpdates);
            const container = document.getElementById('reminderContainer');

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
                descriptionElement.innerHTML = `<strong><small style="color:black;font-weight:bold">Description :</small>${update.des}</strong>`;
                innerDiv.appendChild(descriptionElement);



                const time = document.createElement('div');
                time.className = 'text-secondary my-1';
                time.style.color = '#B9B4C7';
                time.style.fontStyle = 'none';
                time.style.fontWeight = '100';
                time.innerHTML = `<strong><small style="color:black;font-weight:bold">Time :</small>${update.time}</strong>`;
                innerDiv.appendChild(time);


                const date = document.createElement('div');
                date.className = 'text-secondary my-1';
                date.style.color = '#B9B4C7';
                date.style.fontStyle = 'none';
                date.style.fontWeight = '100';
                date.innerHTML = `<strong><small style="color:black;font-weight:bold">Date :</small>${update.date}</strong>`;
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



// Create a container for buttons
const buttonsContainer = document.createElement('div');
buttonsContainer.style.display = 'flex';
buttonsContainer.style.justifyContent = 'flex-end';

const editReminder = document.createElement('div');
editReminder.innerHTML = `<button onclick="editReminder(this)" data-edit-id="${update.id}" class="me-2 bg-warning" style="border:none;outline:none;color:white;border-radius:5px;padding:5px 10px 5px 10px">
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
                container.appendChild(requestDiv);
            });
loader(false);
        },
        error: function(error) {
        
        }
    });
}

  function update_status(button){
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
url:`{{config('app.api_url')}}/api/reminders/${updateId}/update-status?status=${newStatus}`,

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
url:`{{config('app.api_url')}}/api/reminders/${updateId}`,

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

function editReminder(button) {


    const updateId = button.getAttribute('data-edit-id');
loader(true);  

$.ajax({
    headers: {
        "Accept": "application/json",
        "Authorization": `Bearer ${getCookie('BearerToken')}`,
    },
    type: "GET",
    
    url:`{{config('app.api_url')}}/api/reminders/${updateId}/edit`,
    
    success: function(response) {
        console.log(response.data.reminder.date,'data');

        id=response.data.reminder.id;
        title=response.data.reminder.title;
        des=response.data.reminder.des;
        date=response.data.reminder.date;
        time=response.data.reminder.time;
        status=response.data.reminder.status;
        recursion=response.data.reminder.recursion;
        unique_id=response.data.reminder.unique_id;

       
        const Id = document.getElementById('id');
        const titleInput = document.getElementById('title');
    const descriptionTextarea = document.getElementById('des');
    const dateInput = document.getElementById('date');
    const timeInput = document.getElementById('time');
    const statusInput = document.getElementById('status');
    const recursionInput = document.getElementById('recursion');
    const unique_idInput = document.getElementById('unique_id');
   

    Id.value = id;
    titleInput.value = title;
    descriptionTextarea.value = des;
    dateInput.value = date;
    timeInput.value = time;
    statusInput.value=status;
    recursionInput.value = recursion;
    unique_idInput.value = unique_id;


    $('#reminderUpdate').modal('show');
        loader(false);
    },
    error: function(response) {
        console.log(response.error)
        loader(false);
        
    }
});
}


function update_reminders(){
    
loader(true);  


const formData={
     "id": $('.Eid').val(),
     "des": $('.Edes').val(),
     "title":  $('.Etitle').val(),
     "date":  $('.Edate').val(),
     "status":  $('.Estatus').val(),
     "user_id": getCookie('user_id'),
     "unique_id":  $('.Eunique_id').val(),
     "time":  $('.Etime').val(),
     "recursion":  $('.Erecursion').val(),
     "alert_before":$('.Ealert').val(),

}

console.log(formData,'test');
$.ajax({
    headers: {
        "Accept": "application/json",
        "Authorization": `Bearer ${getCookie('BearerToken')}`,
    },
    type:"PUT",
    url:`{{config('app.api_url')}}/api/reminders/${formData.id}?des=${formData.des}&date=${formData.date}&title=${formData.title}&status=${formData.status}&unique_id=${formData.unique_id}&time=${formData.time}&recursion&alert_before`,
    data:formData,
    success: function(response) {
        console.log(response.message,'data');


        console.log(response.message, 'data');

       
        const reminderDiv = document.querySelector(`.reminder-${formData.id}`);

        if (reminderDiv) {
            reminderDiv.querySelector('.reminder-title').innerText = `Title: ${formData.title}`;
            reminderDiv.querySelector('.reminder-description').innerText = `Description: ${formData.des}`;
            reminderDiv.querySelector('.reminder-time').innerText = `Time: ${formData.time}`;

          
            const statusBadge = reminderDiv.querySelector('.action-items-status');
            statusBadge.className = 'action-items-status badge p-1';
            if (formData.status == 0) {
                statusBadge.classList.add('bg-danger', 'text-white');
            } else if (formData.status == 1) {
                statusBadge.classList.add('bg-success', 'text-white');
            }
        }

        $('#reminderUpdate').modal('hide');
      
        get_all_reminders();
        setInterval(function() {
    get_all_reminders();
}, 60000);
        
        loader(false);
        location.reload();
    },
    error: function(response) {
        console.log(response.error)
        loader(false);
        
    }
});  
}

$(document).ready(function () {

    
    get_all_reminders();
//         setInterval(function() {
//     get_all_reminders();
// }, 60000);

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

        feather.replace();
        new DataTable('#example');
        $("#medicine-select-field,#recurring-select-field,#doctor-select-field").select2({
            theme: "bootstrap-5",
        });
    </script>

@include('UserPanel.Includes.footer') 