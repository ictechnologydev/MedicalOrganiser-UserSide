@include('UserPanel.Includes.header')
   <style>
    .tab-class
    {
        border: 2px solid lightgray;
        width: 200px !important;
        font-size: 20px;
        text-align: center;
    }
    .tab-class-active
    {
        background : #02b2b0;
        color: white;
    }
    .ml-class
    {
        margin-left: 20px;
    }
    .box_head 
    {
            background: #02b2b0;
    color: white;
    font-size: 24px;
    text-align: center;
    text-transform: capitalize;
        
    }
    .box 
    {
        border: 2px solid lightgray;
        
    }
    .box_body
    {
        font-size: 18px;
    }
    
    
    table{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}


@media(max-width: 425px) {
  .tab-class {
        font-size: 15px;
  }
  
  .box_head {
       font-size: 20px;
  }
}

   
       
   </style>
      <div class="container-fluid p-3 main-container-content">
         <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
               <h3 class="p-0 m-0 bread-crumb-heading">Health Summary</h3>
            </div>
            <div class="col-5 d-flex justify-content-end">
              <style>
                .head{
                  display:flex;
                  justify-content: space-between;
                }
              </style>
                <div class="nav-item dropdown d-flex me-3 flex-end justify-content-end">
                   
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
         
         <div class="d-flex  justify-content-center">
              <div class="d-none tab-class tab-class-1 tab-class-active" role="button" onclick="$('.tab-box').addClass('d-none');$('.tab-box-1').removeClass('d-none');  $('.tab-class').removeClass('tab-class-active');$('.tab-class-1').addClass('tab-class-active');">HEALTH SUMMARY</div>
               <div class="d-none tab-class tab-class-2 ml-class" role="button" onclick="$('.tab-box').addClass('d-none');$('.tab-box-2').removeClass('d-none');  $('.tab-class').removeClass('tab-class-active');$('.tab-class-2').addClass('tab-class-active');">GENERAL HISTROY</div>
         </div>
         
         
        <div class="d-flex justify-content-center tab-box tab-box-1 d-none">
            <div class="col-lg-9 col-sm-10 col-10 mt-3 html_box_content">
            </div>
        </div>
        
        <div class="d-flex justify-content-center tab-box tab-box-2 d-none">
            <div class="col-lg-9 col-sm-10 col-10 mt-3 general_history_table">
            </div>
        </div>
         
         
         
      </div>
</main>
@include('UserPanel.Includes.script')
<script>
$(document).ready(function() {

getPatientHealthSummary(getCooki('user_id'),getCooki('user_role_id'));

$('.tab-box').addClass('d-none');
$('.tab-box-1').removeClass('d-none');
$('.tab-class').removeClass('tab-class-active');
$('.tab-class-1').addClass('tab-class-active');

});


function getPatientHealthSummary(user_id,role_id){
    
    loader(true);
    
    $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/get-patient-health-summary",
            data: { user__id : user_id, role_id : role_id },

            success: function(response) {

              console.log(response);
             var health_summary =   response.data.health_summary;

             var _meta =  response.data.health_summary_meta_data;
            


             var html = ``;
             for(let key in health_summary)
             {
                 html += `
                        <div class="row box">
                            <div class="box_head">
                               ${key.replace(/_/g, ' ')}
                            </div>
                            <div class="box_body">
                                ${health_summary[key] !="" ? health_summary[key] : "<div class='text-center'>no data yet</div>" }
                            </div>
                        </div>`;
             }

            if(html == '' )
            {
               html = `<h5 class='text-center mt-5 '>No data available</h5>`;
            }

             $('.html_box_content').html(html);

             //--

             var fields =   response.data.social_history_form.fields;



             var _html = `
                        <div class="row box">
                            <div class="box_head">
                                General History
                            </div>
                            <table class="" >`;


             for(var i=0; i < fields.length; i++)
             {
                    _html +=`
                        <tr>
                            <td>${fields[i][1].replace('*', ' ')}</td>
                            <td>${fields[i][6] ? fields[i][6] : "-" }</td>
                        </tr>
                    `;
                    
             }


             _html += `</table>
                        </div>
                    `;

               $('.general_history_table').html(_html);












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
    
</script>

@include('UserPanel.Includes.footer') 