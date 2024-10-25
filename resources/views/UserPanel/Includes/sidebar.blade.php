
<style>
    @media(max-width:425px){
    .append_module_image a img{



        margin-left:-10px;

    }
}
.sidebar-scroll{
  height: 73vh;
  min-height: 73vh;
  overflow-y: auto;
}


</style>
<div class="sidebar-scroll">
  <ul class="nav nav-pills nav-flush flex-column mb-auto text-center append_module_image">
    </ul>
</div>
<script>
  function fetch_all_images()
        {

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
        <a style="margin-bottom:1px !important;" href="{{url('/')}}/module/${module_managers[i]['id']}?tb=${module_managers[i]['table_name']}&name=${module_managers[i]['name']}&m_id=${module_managers[i]['id']}" class="btn badge bg-primary" class="nav-link py-3 border-bottom" title="${module_managers[i]['name']}" data-bs-toggle="tooltip" data-bs-placement="right">
          <img src="${module_managers[i]['module_icon']}" class="mb-2 nav-link py-3 " height="55px"width="55px;">

    </a>


       `;
        }


        var $htmlside= '';
        if(module_managers.length > 0){

        for(var i = 0; i<module_managers.length;i++){

        $htmlside +=`

        <img src="${module_managers[i]['module_icon']}" class="mb-2 class="nav-link py-3" height="25px"width="25px;">

        </div>
        </div>
        </div>`;
        }


        }

        $('.append_module_image').html($html);

        loader(false);
    }
        },
        error: function(response) {
        loader(false);
        if (response.status == 500) {
        toastr.error("Something went wrong")
        } else {
      
        }
        }
        });

        }


        $(document).ready(function () {

          fetch_all_images();

});
</script>
