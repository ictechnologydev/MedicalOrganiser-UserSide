

@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">Add Data Request</h3>
                <small>Dashabord - Add Data Request</small>


            </div>
            <div class="col-5 d-flex justify-content-end">
                {{-- <button class="btn btn-primary my-2">🔔</button> --}}
          
          
          <style>
          .head{
            display:flex;
            justify-content: space-between;
          }
          </style>
          
                <div class="nav-item dropdown d-flex me-3">
                  <a type="button" href="javascript:void(3);" class="btn btn-primary my-2 ps-3 pe-3 nav-link px-0 show_notification btn btn-primary position-relative">
                    🔔
                    <span class="position-absolute top-10 end-20  translate-middle p-1 bg-danger border border-light rounded-circle">
                     
                    </span>
                  </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card notification_menu " style="top: 60px; right: 0px;padding:0px;">
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

            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Medication</button> <span class="text-secondary">|</span> <button class="btn btn-primary">History</button> --}}
            <div class="h6 mt-1 mb-0">
                <button onclick="fetch_modules_name()" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Request</button>

            </div>
        </div>
        <div id="requestContainer"></div>
        
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
      <h4 id="offcanvasRightLabel">Add Request</h4>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Requesting For</label>
                <select class="form-select" id="moduleSelect" onchange="storeModuleId()" data-placeholder="Select an option...">
                    <option value="">Select a module</option>
                </select>


                <input class="module_id" class="module_id" type="hidden" id="module_id" name="module_id">

                <div id="emailHelp" class="form-text">If the required option is not available in the list, General Request</div>
            </div>

            <div class="mb-3">
              <label for="RequestTitle" class="form-label">Request Title</label>
              <input type="text" class="form-control title" id="RequestTitle" placeholder="Missing Medicine...">
            </div>

            <div class="mb-3">
                <label for="medication-reason" class="form-label">Description</label>
                <textarea class="form-control discription" id="medication-reason" placeholder="I want to add ..."></textarea>
            </div>
            <input type="hidden" class="user_id" name="user_id"value="${getCookie('user_id')}">

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Are you sure?</label>
            </div>
            <button type="button" onclick="send_request()" class="btn btn-primary">Save</button>
          </form>
    </div>
  </div>
  <style>
    .request-actions{
     display:flex;
     justify-content: flex-end;
    }
  </style>

  @include('UserPanel.Includes.script')



    <script>

var pageTitle = "Patient Requests - {{env('APP_NAME')}}";

// Update the title of the page dynamically
document.title = pageTitle;

function fetch_modules_name() {
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
            var $moduleSelect = $('#moduleSelect');
            $moduleSelect.empty();

            if (module_managers.length > 0) {
                for (var i = 0; i < module_managers.length; i++) {
                    $moduleSelect.append($('<option>', {
                        value: module_managers[i]['id'],
                        text: module_managers[i]['name']
                    }));
                }
            }

        $('.offcanvas select').select2({
            dropdownParent: $('.offcanvas')
        });
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
         $('.offcanvas').offcanvas('hide');
            location.reload();
         get_all_requests();
            }
            });
        }

        function get_all_requests(user_id,from = 0) {
            loader(true);
            const perPage = 10;
            
                   const container = document.getElementById('requestContainer');
                   
             container.innerHTML = '';
            
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "GET",
        url: `{{config('app.api_url')}}/api/request-updates?user_id=${getCookie('user_id')}&from=${from}`,
        success: function(response) {
         
            console.log(response)
            const requestUpdates = response.data.request_updates;

     if (requestUpdates.length === 0) {
       
        var html_ = `
                <div class="welcome-note-container rounded-3 border border-primary border-2 p-1 mb-2">
                    <div class="bg-light rounded-3 p-2 request-widget">
                        <div class="my-1" style="font-weight: 100;text-align:center;text-weight:bold;color:black !important;">No Requests yet</div>
                    </div>
                </div>`;

             container.innerHTML = html_;
             
                return;
      }

            requestUpdates.forEach(update => {
    const requestDiv = document.createElement('div');
    requestDiv.className = 'welcome-note-container rounded-3 border border-primary border-2 p-1 mb-2';

    const innerDiv = document.createElement('div');
    innerDiv.className = 'bg-light rounded-3 p-2 request-widget';


    const titleElement = document.createElement('div');
    titleElement.className = 'text-primary h5 mb-0';
    titleElement.innerHTML = `<strong>${update.title}</strong>`;
    innerDiv.appendChild(titleElement);

    const descriptionElement = document.createElement('div');
    descriptionElement.className = 'text-secondary my-1';
    descriptionElement.style.color = '#B9B4C7';
    descriptionElement.style.fontStyle = 'none';
    descriptionElement.style.fontWeight = '100';
    descriptionElement.innerHTML = `<strong>${update.discription}</strong>`;
    innerDiv.appendChild(descriptionElement);

    const module_name = document.createElement('span');
    module_name.innerHTML = `<span class="badge bg-primary mt-1">${update.module.name}</span><br>`;
    innerDiv.appendChild(module_name);




    const responseElement = document.createElement('div');
        responseElement.className = 'bg-light rounded-3 p-2 request-actions';

        const pendingSpan = document.createElement('span');
        pendingSpan.className = 'action-items-status badge p-1 me-2';
        pendingSpan.style.position = 'relative';
        pendingSpan.style.right = '0px';
        pendingSpan.style.top = '-90px';
        pendingSpan.style.fontSize = '14px';

        if (update.status === 'Pending') {
            pendingSpan.classList.add('bg-warning', 'text-dark');
        } else if (update.status === 'Unapproved') {
            pendingSpan.classList.add('bg-danger', 'text-white');
        } else if (update.status === 'Approve') {
            pendingSpan.classList.add('bg-success', 'text-white');
        }
        pendingSpan.title = 'Response';
        pendingSpan.textContent = update.status;

        // const unapprovedSpan = document.createElement('span');
        // unapprovedSpan.className = 'action-items-status badge bg-danger text-white p-1';
        // unapprovedSpan.title = 'Response';
        // unapprovedSpan.textContent = 'X';

        responseElement.appendChild(pendingSpan);
        // responseElement.appendChild(unapprovedSpan);

        innerDiv.appendChild(responseElement);

    requestDiv.appendChild(innerDiv);
    container.appendChild(requestDiv);
});

updatePaginationButtons(response.recordsFiltered, from);


        },
        error: function(error) {

        }
    });
}


function updatePaginationButtons(count, from) {
    loader(false);
    count = Math.ceil(count);
    console.log(count);
    var pages_btn = ``;

    const prevPage = from - 10 >= 0 ? from - 10 : 0;
    const nextPage = from + 10 < count ? from + 10 : from;

    pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" onclick="get_all_requests(getCookie('user_id'), ${prevPage});">Previous</button>`;

    $('.p-btn').removeClass('active');

    for (var c = 0; c < Math.ceil(count / 10); c++) {
        const pageStart = c * 10;
        const pageEnd = Math.min((c + 1) * 10, count);

        if (from >= pageStart && from < pageEnd) {
            pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn active" style="margin-left:10px;" onclick="get_all_requests(getCookie('user_id'), ${pageStart});">${c + 1}</button>`;
        } else {
            pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn" style="margin-left:10px;" onclick="get_all_requests(getCookie('user_id'), ${pageStart});">${c + 1}</button>`;
        }
    }

    // Corrected comparison here
    pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" style="margin-left:10px;" onclick="get_all_requests(getCookie('user_id'), ${nextPage});">Next</button>`;

    $('.pagination-container').html(pages_btn);
}





function get_requests(){

    loader(true);
       $.ajax({
  headers: {
  "Accept": "application/json",
  "Authorization": `Bearer ${getCookie('BearerToken')}`,
  },
  type: "PUT",
  url: `{{config('app.api_url')}}/api/users/show-all-requests-to-patient?patient_id=${getCookie('user_id')}`,




  success: function(response) {
         toastr.success(response.message);

            alert('yes');


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
    //  toastr.error(response.responseJSON.message)
   }
                                 }
  });
}

$(document).ready(function () {

    get_all_requests();

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

<style>

button.active {
background-color:  #02b2b0 !important;
color: white !important;
}

.pagination-class a:hover:not(.active) {background-color: #ddd;}
</style>

@include('UserPanel.Includes.footer')
