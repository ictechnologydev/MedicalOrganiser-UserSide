

@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">App Supports</h3>
                <small>Dashabord - App Support</small>


            </div>
            <div class="col-5 d-flex justify-content-end">

              <style>
                .head{
                  display:flex;
                  justify-content: space-between;
                }
              </style>
            <div class="col-3">
                <div class="nav-item dropdown d-none d-md-flex me-3 flex-end justify-content-end">
                   
          <a type="button" href="javascript:void(3);" class="btn btn-primary my-2 ps-3 pe-3 nav-link px-0 show_notification btn btn-primary position-relative">
            ðŸ””
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
        </div>
        <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
            <div class="h6 mt-1 mb-0">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Support</button>
            </div>
        </div>
        <div id="supportContainer"></div>
        
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
              <label for="title" class="form-label">App Support Title</label>
              <input type="text" class="form-control title" id="title" name="title"placeholder="Add Title...">
            </div>

            <div class="mb-3">
                <label for="discription" class="form-label">App Support Description</label>
                <textarea class="form-control discription" id="discription" name="discription"placeholder="I want to add ..."></textarea>
            </div>

              <div class="mb-3">
                <label for="images" class="form-label">Add Images</label>
                <input type="file" id="imageInput" name="images[]" multiple>



              </div>

            <input type="hidden" class="user_id" name="user_id"value="${getCookie('user_id')}">

            <button type="button" onclick="store_app_supports()" class="btn btn-primary">Save</button>
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

var pageTitle = "Patient App Support - {{env('APP_NAME')}}";

// Update the title of the page dynamically
document.title = pageTitle;

function store_app_supports() {
    loader(true);

    const formData = new FormData();
    formData.append("discription", $('.discription').val());
    formData.append("title", $('.title').val());
    formData.append("user_id", getCookie('user_id'));

   
    const imageInput = document.getElementById('imageInput');
    
   
    for (let i = 0; i < imageInput.files.length; i++) {
        formData.append("images[]", imageInput.files[i]);
    }

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
            toastr.success(response.message);
            $('.offcanvas').offcanvas('hide');
            location.reload();
            get_all_app_supports(0);
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


function storeModuleId() {
    var selectedModuleId = $('#moduleSelect').val();
    $('#module_id').val(selectedModuleId);
}



function get_all_app_supports(from) {

loader(true);
const perPage = 10;
const container = document.getElementById('supportContainer');
container.innerHTML = '';
$.ajax({
headers: {
"Accept": "application/json",
"Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "GET",
url: `{{config('app.api_url')}}/api/supports?user_id=${getCookie('user_id')}&from=${from}`,
success: function(response) {
    loader(false);
const requestUpdates = response.data.supports;


if (requestUpdates.length === 0) {
       
        var html_ = `
                <div class="welcome-note-container rounded-3 border border-primary border-2 p-1 mb-2">
                    <div class="bg-light rounded-3 p-2 request-widget">
                        <div class="my-1" style="font-weight: 100;text-align:center;text-weight:bold;color:black !important;">No Supports yet</div>
                    </div>
                </div>`;
             container.innerHTML = html_;
               
                return;
      }

    
requestUpdates.forEach(update => {
if(update.id !== 1){
           
id=update.id;


// $.ajax({
// headers: {
// "Accept": "application/json",
// "Authorization": `Bearer ${getCookie('BearerToken')}`,
// },
// type: "GET",
// url: `{{config('app.api_url')}}/api/supports/`+ id,
// success: function(response) {









// },
// error: function(response) {
// if (response.status == 500) {
// toastr.error("Something went wrong")
// } else {
// toastr.error(response.responseJSON.message)
// }
// }

// });


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
responseElement.className = 'bg-light rounded-3 p-2 request-actions';

  
const pendingSpan = document.createElement('span');
pendingSpan.className = 'action-items-status badge p-1 me-2';
pendingSpan.style.position = 'relative';
pendingSpan.style.right = '0px';
pendingSpan.style.fontSize = '14px';

if (update.resolved === 'Pending') {
pendingSpan.classList.add('bg-warning', 'text-white');
} else if (update.resolved === 'Unapproved') {
pendingSpan.classList.add('bg-danger', 'text-white');
} else if (update.resolved === 'Approve') {
pendingSpan.classList.add('bg-success', 'text-white');
}
pendingSpan.title = 'Response';
pendingSpan.textContent = update.resolved;


id=update.id;

responseElement.appendChild(pendingSpan);

 const deleteButton = document.createElement('button');
  deleteButton.className = 'btn pe-2 ps-2 pt-0 pb-0 btn-danger me-2';
  deleteButton.textContent = 'Delete';
  deleteButton.setAttribute('data-update-id', id);

  deleteButton.addEventListener('click', function() {
        const updateId = this.getAttribute('data-update-id');
        _delete_app_support(updateId);
    });
responseElement.appendChild(deleteButton);

innerDiv.appendChild(responseElement);

requestDiv.appendChild(innerDiv);
container.appendChild(requestDiv);

const imageContainer = document.createElement('div');
imageContainer.className = 'image-container';

update.arr_images.forEach(imageUrl => {
    const imageElement = document.createElement('img');
    imageElement.src = `{{config('app.api_url')}}/images/`+imageUrl;
    imageElement.setAttribute('width', '100');
    imageElement.setAttribute('height', '100');
    imageElement.style.marginRight = '10px';
    imageContainer.appendChild(imageElement);
});

 descriptionElement.parentNode.insertBefore(imageContainer, descriptionElement.nextSibling);

}
});



  updatePaginationButton(response.recordsFiltered, from);

},
error: function(error) {
      loader(false);

}
});
} 

function updatePaginationButton(count, from) {
    
    loader(false);
    count = Math.ceil(count);
    var pages_btn = ``;
    const prevPage = from - 10 >= 0 ? from - 10 : 0;
    const nextPage = from + 10 < count ? from + 10 : from;

    pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" onclick="get_all_app_supports(${prevPage});">Previous</button>`;

    $('.p-btn').removeClass('active');

    for (var c = 0; c < Math.ceil(count / 10); c++) {
        const pageStart = c * 10;
        const pageEnd = Math.min((c + 1) * 10, count);

        if (from >= pageStart && from < pageEnd) {
            pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn active" style="margin-left:10px;" onclick="get_all_app_supports(${pageStart});">${c + 1}</button>`;
        } else {
            pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn" style="margin-left:10px;" onclick="get_all_app_supports(${pageStart});">${c + 1}</button>`;
        }
    }

    
    if (nextPage < count) {
        pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" style="margin-left:10px;" onclick="get_all_app_supports(${nextPage});">Next</button>`;
    } else {
        pages_btn += `<button type="button" style="cursor: not-allowed;opacity: 0.5;" class="btn btn-outline-primary btn-sm" style="margin-left:10px;" disabled>Next</button>`;
    }

    $('.pagination-container').html(pages_btn);
}








function  _delete_app_support(id)
   {

        swal({
                title: "Delete",
                text: "Are you sure you want to delete this?",
                icon: "error",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    loader(true);
                    
                    $.ajax({
                                    headers: {
                                        "Accept": "application/json",
                                        "Authorization": `Bearer ${getCookie('BearerToken')}`,
                                    },
                                    type: "DELETE",
                                    url: `{{config('app.api_url')}}/api/supports/${id}')}}`,
                                    data: {id : id},
                                    success: function(response) {
                                    toastr.success(response.message);
                                    location.reload();
                                    get_all_app_supports
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
                                toastr.error(response.message)
                                }
                                }
                    });

                        
                }

        });


   }

function _discription(id)
   {
      
      $.ajax({
               headers: {
                     "Accept": "application/json",
                     "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
               type: "GET", 
               url: `{{config('app.api_url')}}/api/supports?id=${id}`,
               success: function(response) {
                  $('.append_discription').html(response.data.discription);
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

// document.getElementById('imageInput').addEventListener('change', function() {
//         var files = this.files;
        
//         if (files.length > 2) {
//             toastr.error('You can only select a maximum of 2 images.');
//             this.value = ''; 
//         } else if (files.length === 2) {
            
//             this.disabled = true;
//         }
//     });


$(document).ready(function () {



    get_all_app_supports(0);

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
