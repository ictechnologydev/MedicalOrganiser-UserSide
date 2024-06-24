

@include('UserPanel.Doctor.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">My App Supports</h3>
                <small>Dashabord - App Supports</small>
                
                
            </div>
            <div class="col-5 d-flex justify-content-end">
     

                <style>
                  .head{
                    display:flex;
                    justify-content: space-between;
                  }
                </style>
          
                  <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="javascript:void(3);" class="btn btn-primary my-2 ps-3 nav-link px-0 show_notification">
                      🔔
                      <span class="badge bg-red notification_dot" style="display:none;"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card notification_menu " style="top: 64px; right: 0px;">
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
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Support</button>
            </div>
        </div>
        <div id="supportContainer"></div>
   
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
              <label for="title" class="form-label">App Support Title</label>
              <input type="text" class="form-control title" id="title" name="title"placeholder="Add Title...">
            </div>

            <div class="mb-3">
                <label for="discription" class="form-label">App Support Description</label>
                <textarea class="form-control discription" id="discription" name="discription"placeholder="I want to add ..."></textarea>
            </div>
            
            <div class="mb-3">
                <label for="imageInput" class="form-label">Add Images (up to 2)</label>
                <input type="file" id="imageInput" name="images[]" with="100%" multiple class="form-control-file">
              </div>
              
            <input type="hidden" class="user_id" name="user_id"value="${getCookie('user_id')}">
         
            <button type="button" onclick="store_app_supports()" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>
  <style>
    .request-actions{
     display:flex;
     justify-content: flex-end;
    }
  </style>
  @include('UserPanel.Doctor.Includes.script')



    <script>



function store_app_supports() {
    loader(true);


    const formData = new FormData();

    formData.append("discription", $('.discription').val());
    formData.append("title", $('.title').val());
    formData.append("user_id", getCookie('user_id'));

    const imageInput = document.getElementById('imageInput');
    const imageFiles = imageInput.files;

    for (let i = 0; i < imageFiles.length; i++) {
        formData.append(`images[${i}]`, imageFiles[i]);
    }

   

    console.log(formData);
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/supports",
        data: formData, 
        processData: false, 
        contentType: false,
        
        success: function(response) {

            console.log(response.data);
        
            $('.offcanvas').offcanvas('hide');
            location.reload();
            toastr.success(response.message)

            loader(false);

        }
    });
}

function storeModuleId() {
    var selectedModuleId = $('#moduleSelect').val();
    $('#module_id').val(selectedModuleId);
}

        


function get_all_app_supports(user_id) {

loader(true);
$.ajax({
headers: {
"Accept": "application/json",
"Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "GET",
url: `{{config('app.api_url')}}/api/supports?user_id=${getCookie('user_id')}`,
success: function(response) {
console.log(response.data,'support');
const requestUpdates = response.data.supports;

const container = document.getElementById('supportContainer');

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


    

            const responseElement = document.createElement('div');
responseElement.className = 'bg-light rounded-3 p-2  request-actions';

const pendingSpan = document.createElement('span');
pendingSpan.className = 'action-items-status badge p-1 me-2';
pendingSpan.style.position = 'relative';
pendingSpan.style.right = '0px';
pendingSpan.style.top = '-60px';
pendingSpan.style.fontSize = '14px';

if (update.resolved === 'Pending') {
pendingSpan.classList.add('bg-warning', 'text-dark');
} else if (update.resolved === 'Unapproved') {
pendingSpan.classList.add('bg-danger', 'text-white');
} else if (update.resolved === 'Approve') {
pendingSpan.classList.add('bg-success', 'text-white');
}
pendingSpan.title = 'Response';
pendingSpan.textContent = update.resolved;

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

},
error: function(error) {

}
});
}

  




$(document).ready(function () {

    get_all_app_supports();

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

@include('UserPanel.Doctor.Includes.footer') 