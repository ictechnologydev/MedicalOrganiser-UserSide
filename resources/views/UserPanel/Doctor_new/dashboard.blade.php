
@include('UserPanel.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">
@include('UserPanel.Includes.navbar')
<div id="userDetailsContainer" class="welcome-note-container rounded-3 border border-primary border-2 p-2">

    <div class="h6 mt-1 mb-0">👋 Welcome Back - <span class="text-primary"><strong><span class="user_email"></span></strong></span></div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome back to your personalized dashboard! We are thrilled to have you back and to continue supporting you on your journey.
    </div>
<div class="content">

    <style>
        @media (min-width: 425px) {
            .append_module{

                margin-bottom:20px;
    }
      }

      @media (min-width: 375px) {
            .append_module{
                margin-bottom:20px;
    }
      }


      @media (min-width: 320px) {
            .append_module{

                margin-bottom:20px;
    }
      }

    </style>
<div class="row mt-3 append_module">


</div>
<div class="row mt-3">
<div class="col-md-8 widget-card-col mb-3">
<div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white" style="background: url('<?php echo url('/'); ?>/assets/images/widgetbackground.png'); background-position: center; background-size: cover; height: 100%;">
<div class="h2 text-shadow">Share Your Porfile with Doctor</div>
<p class="text-shadow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<a href="/patient/shareProfile" onclick="getDoctorslist(event)"class="btn btn-light px-4 py-2 text-primary shadow">Share Now</a>



</div>
</div>
<style>


</style>
<div class="col-md-4 widget-card-col mb-3 submit-col">
<div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white" style="background: linear-gradient(to left, #02b2b0,#02c574); height: 100%;">
<div class="h2 text-shadow">Submit a Requst</div>
<p class="text-shadow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
{{-- <a href="/patient/submitRequest" onclick="getDoctorslist(event)"class="btn btn-light px-4 py-2 text-primary shadow">Submit Request</a> --}}

<a onclick="Request()" class="btn btn-light px-4 py-2 text-primary shadow" data-bs-toggle="modal" data-bs-target="#submitRequest"role="button" onclick="submitRequest('${getCooki(\'user_id\')}', '${getCooki(\'role_id\')}');">Submit Request</a>
{{-- <button class="w-100 btn btn-lg btn-primary logout" type="button">lOGOUT</button> --}}
</div>
</div>




<div class="modal fade" id="submitRequest" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="reason-modelLabel">Add Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
            <button type="button" onclick="submitRequest()" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    </div>
</div>




</div>
</div>
</div>
</div>
@include('UserPanel.Includes.script')

<script>

var pageTitle = "Patient Dashboard - {{env('APP_NAME')}}"
document.title = pageTitle;

function Request() {
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

            loader(false);

        }
    });
}

function storeModuleId() {
    var selectedModuleId = $('#moduleSelect').val();
    $('#module_id').val(selectedModuleId);
}

function submitRequest(){
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
$('.modal').modal('hide');
            location.reload();
}
});
}


        function fetch_all_modules_data()
        {
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
        var $html= '';
        if(module_managers.length > 0){

        for(var i = 0; i<module_managers.length;i++){

        $html +=`
        <div class="col-md-3 widget-card-col">
        <div class="widget-card border border-primary border-2 p-2 rounded-3 text-white">
        <img src="${module_managers[i]['module_icon']}" width="50px"height="50px"class="mb-2 p-2" style="border-radius:50px;background-color:rgb(7, 173, 173)"height="54px">
        <div id="moduleManagersList" class="h5 text-primary"><strong>${module_managers[i]['name']}</strong></div>
        <div class="widget-actions">
        <a  href="{{url('/')}}/patient/module/${module_managers[i]['id']}?tb=${module_managers[i]['table_name']}&name=${module_managers[i]['name']}&m_id=${module_managers[i]['id']}" class="btn badge bg-primary">View</a>

        </div>
        </div>
        </div>`;

        $(window).on('resize', function() {
    var width = $(window).width();

    if (width >= 425) {
        $('.widget-card-col').css('margin-top', '20px');
    } else if (width >= 375) {
        $('.widget-card-col').css('margin-top', '20px');
    } else if (width >= 320) {
        $('.widget-card-col').css('margin-top', '20px');
    }
});
        }
        $('.append_module').html($html);





        loader(false);
    }
        },
        error: function(response) {
        loader(false);
        if (response.status == 500) {
        toastr.error("Something went wrong")
        } else {
        toastr.error(response.responseJSON.message)
        }
        }
        });

        }

        function details(){
            var $html= `<div id="moduleManagersList" class="h5 text-primary"><strong>${getEmail('user_email')}</strong></div>`;
            $('.user_email').html($html);
        }


        function nameRole(){
                var $html= `<div  class="h3 class="p-0 m-0 bread-crumb-heading"><strong><small>  Dashabord -</small>${getName('nameRole')}</strong></div>`;
                $('.nameRole').html($html);
            }

        $(document).ready(function () {


        nameRole();
        details();
        fetch_all_modules_data();

     


        });



</script>


@include('UserPanel.Includes.footer')
