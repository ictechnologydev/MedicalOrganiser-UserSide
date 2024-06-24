

@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">My Module Settings</h3>
                <small>Dashabord - Module Settings</small>
                
                
            </div>
            
        </div>
        <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
            <div class="h6 mt-1 mb-0">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Module Settings</button> <span class="text-secondary">|</span> <button class="btn btn-primary">History</button>
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
                <label for="images" class="form-label">Add Iamge</label>
                <input type="file" id="imageInput" name="images[]" multiple>

              </div>
            <input type="hidden" class="user_id" name="user_id"value="${getCookie('user_id')}">
         
            <button type="button" onclick="store_app_supports()" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>
  @include('UserPanel.Includes.script')



    <script>







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