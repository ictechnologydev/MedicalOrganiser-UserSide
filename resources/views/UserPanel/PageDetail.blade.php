@include('UserPanel.Includes.header')
<div class="container-fluid p-3 main-container-content">
    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
          
            <div class="col-7">
             <h3 class="p-0 m-0 bread-crumb-heading nameRole"></h3>
            </div>
    <div class="col-5 d-flex justify-content-end">
       
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
        <style>
            #patientpagesData{
                color:white;
                background-color:#02b2b0;
                border-radius:20px;
                padding:10px;
            }
        </style>

        <div id="patientpagesData">

        </div>
    </div>
</div>
</main>
  @include('UserPanel.Includes.script')


<script>




function get_all_pages_detail(button){
    loader(true);

var pageId = "{{request()->route('pageId')}}";


$.ajax({
headers: {
  "Accept": "application/json",
  "Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "GET",
url: `{{config('app.api_url')}}/api/pages/${pageId}`,
contentType: "application/json",
success: function(response) {



      var pagesArray = response.data.page;
      var html = '';

      html += `<h1 style="font-weight:500;text-align:center;">${pagesArray.name}</h1>`;
      html += `<span>${pagesArray.description}</span>`;

 var $html= `<div  class="h3 class="text-primary p-0 m-0 bread-crumb-heading"><strong>${pagesArray.name}</strong></div>`;
                $('.nameRole').html($html);

      document.getElementById("patientpagesData").innerHTML = html;


      var pageTitle = `${pagesArray.name} - {{env('APP_NAME')}}`;

// Update the title of the page dynamically
document.title = pageTitle;

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



       $(document).ready(function () {
        loader(true);
        get_all_pages_detail();

        });
</script>

@include('UserPanel.Includes.footer')
