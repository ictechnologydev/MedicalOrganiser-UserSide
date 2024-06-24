

@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 class="p-0 m-0 bread-crumb-heading">My App Supports</h3>
                <small>Dashabord - App Supports</small>
                
                
            </div>
            {{-- <div class="col-5 d-flex justify-content-end">
                <button class="btn btn-primary my-2">🔔</button>
            </div> --}}
        </div>
        <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
            <div class="h6 mt-1 mb-0">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Support</button> <span class="text-secondary">|</span> <button class="btn btn-primary">History</button>
            </div>
        </div>
        <div id="supportContainer"></div>
   
    </div>
</div>
  </div>

</main>


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