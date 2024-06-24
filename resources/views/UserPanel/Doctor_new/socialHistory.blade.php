

@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">My Requests</h3>
                <small>Dashabord - My Requests</small>

                
            </div>
            {{-- <div class="col-5 d-flex justify-content-end">
                <button class="btn btn-primary my-2">🔔</button>
            </div> --}}
        </div>
        <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">

            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Medication</button> <span class="text-secondary">|</span> <button class="btn btn-primary">History</button> --}}
            <div class="h6 mt-1 mb-0">
                <button onclick="fetch_modules_name()" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Request</button> <span class="text-secondary">|</span> <button class="btn btn-primary">History</button>
                {{-- <button class="btn btn-primary" onclick="fetch_modules_name()" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Request</button> <span class="text-secondary"> --}}
            </div>
        </div>
        <div id="requestContainer"></div>
     
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
            <button type="button" onclick="send_request()" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>
  @include('UserPanel.Includes.script')


 
    <script>



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

            console.log('yesssssssss');
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

            loader(false);

        }
    });
}


        

       

  




$(document).ready(function () {

    

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