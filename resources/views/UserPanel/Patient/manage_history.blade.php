@include('UserPanel.Includes.header')
   <style>
   .select2.select2-container{
       margin-left: auto;
       margin-right:auto;
   }
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

thead tr th, tbody tr td {
    
    text-align:center;
}

   
       
   </style>
      <div class="container-fluid p-3 main-container-content">
         <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
               <h3 class="p-0 m-0 bread-crumb-heading">Chronicle</h3>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <div class="nav-item dropdown d-flex me-3 flex-end justify-content-end">
                   
          <a type="button" href="javascript:void(3);" class="btn btn-primary my-2 ps-3 pe-3 nav-link px-0 show_notification btn btn-primary position-relative">
            🔔
            <span class="position-absolute top-10 end-20  translate-middle p-1 bg-danger border border-light rounded-circle">
             
            </span>
          </a>
           <style>
                .head{
                  display:flex;
                  justify-content: space-between;
                }
              </style>
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
                
                <div class="h1 patient_id_at_top text-center"  style="color:#02b2b0;"></div>
                
            </div> 
            
            <div class="row d-flex justify-content-center mb-3 ">
                <div class="col-6">
                    <div style="text-align: center;"><b>Select Module</b></div>
                    <select class="form-control form-select  mt-1 current_module" onchange="setCookie('current_module',this.value, 1); window.location.href='/manage-history'; " style="width:175px;margin: auto;" >
                    </select>
                </div>
            </div>
         
        
            <div class="row d-flex justify-content-end mb-2">
                <div class="col-lg-2 col-md-1 col-sm-6" >
                    <input type="text" class="form-control form-control-sm" id="search_field" name="" value="" placeholder="Search by entry id"> 
                </div>
                <div class="col-lg-2 col-md-1 col-sm-6" >
                    <button type="submit" class="btn btn-primary btn-sm" onclick="setCookie('search_field',$('#search_field').val(),1); getManageHistory(getCookie('search_field'),0);">Search</button>
                    <button type="submit" class="ml-1 btn btn-primary btn-sm ms-3" onclick="$('#search_field').val(''); setCookie('search_field','',1); getManageHistory(getCookie('search_field'),0);">X</button>
                </div>
            </div>  
       <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-9" >
                 <div id="doctor-list-container">
                <table id=""class="table table-bordered">
                  <thead style="background-color: #02b2b0;color:white">
                      <tr>
                            <th>Date</th>
                            <th >Action By</th>
                            <th >Entity Name</th>
                            <th>Action Performed</th>
                            <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="history-list-body">
                  </tbody>
                </table>
                </div>
               
           </div>
       </div>
       
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-9 pages_btn d-flex justify-content-center" >
            </div>
        </div>
       
       
       
       
       
       
  <div class="modal fade" id="detail_json" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" style="font-weight:bold"id="reason-modelLabel">Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
             <table class="table table-bordered">
                  <thead style="background-color: #02b2b0;color:white">
                      <tr>
                        <th>Column</th>
                        <th>Value</th>
                      </tr>
                  </thead>
                  <tbody class="json_value_body">
                  </tbody>
                </table>
             <table class="table  table_old table-bordered">
                  <thead style="background-color: #02b2b0;color:white">
                      <tr>
                        <th>Column</th>
                        <th>Value (before update)</th>
                      </tr>
                  </thead>
                  <tbody class="json_value_body_old">
                  </tbody>
                </table>
            
        </div>
    </div>
    </div>
</div>
         
         
         
      </div>
</main>
@include('UserPanel.Includes.script')
<script>

var json_values = [];
var json_values_old = [];

$(document).ready(function() {

setCookie('search_field',"",1);
getModuleManager();


});

function getManageHistory(_entryId,from) {

    loader(true);
    
      $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/get-manage-history",
            data: {
                _moduleId : getCookie('current_module'),
                _userId   :   getCooki('user_id'),
                _entryId  : _entryId,
                from      :      from
            },
            success: function(response) {
                json_values = [];
                json_values_old = [];
                var historyData = response.data.historyData;
                var html = ``;
                var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count)/10;
                count = Math.ceil(count);
                var pages_btn = ``;
                
                pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" onclick="$('.active').prev('.p-btn').trigger('onclick');"   >Previous</button>`;
                
                $('.p-btn').removeClass('active');
                
                for(var c = 0; c < count; c++)
                {
                    if( 
                       (from >= (c-3)*10 && c>=0)
                        || 
                       (from == (c*10))
                        || 
                       (from >= (c+3)*10 && from <=((count-1)*10))
                      )
                { 
                  pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn ${from == c*10 ? 'active' : '' } ${response.data.count == 0 ? 'invisible' : '' } " style="margin-left:10px;" onclick="getManageHistory(getCookie('search_field'),${c*10});" >${c+1}</button>`;
                }
                 
                }
                
                pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" style="margin-left:10px;" onclick="$('.active').next('.p-btn').trigger('onclick');"  >Next</button>`;
                
                $('.pages_btn').html(pages_btn);
              for(var i=0; i < historyData.length;i++)
              {
                    html +=`<tr>
                        <td>${historyData[i]._date}</td>
                        <td>${historyData[i]._actionId}</td>
                        <td>${historyData[i]._moduleName}</td>
                        <td>${historyData[i]._action}</td>
                        <td><a class="btn btn-primary btn-sm"  href="javascript:void(0)" onclick="showJsonDetail(${historyData[i].id},${historyData[i]._entryId},'${historyData[i]._action}',${historyData[i]._actionId})" >Detail</a></td>
                        </tr>`;
                         json_values[historyData[i].id] = JSON.stringify(historyData[i]._json);
                         json_values_old[historyData[i].id] = JSON.stringify(historyData[i]?._json_old);
              }
               loader(false);
  
 
  
  if (html.trim() === '') {
    var html_ = `
        <div class="welcome-note-container rounded-3 border border-primary border-2 p-1 mb-2">
            <div class="bg-light rounded-3 p-2 request-widget">
                <div class="my-1" style="font-weight: 100;text-align:center;text-weight:bold;color:black !important;">No Data yet</div>
            </div>
        </div>`;

    $('.pages_btn').html(html_);
    return;
} 


              $('#history-list-body').html(html);

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
                toastr.error("Something went wrong")
            } else {
                toastr.error(response.responseJSON.message)
            }
        }

    });
        
}

     

function showJsonDetail(id,_entryId,updated,_actionId) {
    var json_vals = JSON.parse(json_values[id]);
     var json_vals_old = JSON.parse(json_values_old[id]);
    var html = ``;
     $("td").css('background', 'white');
     
    for (var key in json_vals) {
            
            if (json_vals.hasOwnProperty(key))
            {
                html += `<tr>`;
                if(key == 'del' ||  key == 'id' || key == 'module__id' || key == 'show__to' ||  key == 'user__id')
                { 
                    html += ``;
                    
                } else if(key == 'hide__or__show')
                {
                    html += `<td style="text-transform: capitalize;">Hide Or Show</td><td>${json_vals[key] == 0 ? 'Hide': 'Show'}</td>`;
                    
                }  else if(key == '_Verify_')
                {
                    html += `<td style="text-transform: capitalize;">Verify</td><td>${json_vals[key] == 0 ?  'Not Verified' : 'Verified' }</td>`;
                    
                }  else if(key.includes('date'))
                { 
                    html += `<td style="text-transform: capitalize;">${key.replace(/_/g, ' ')}</td><td>${json_vals[key]}</td>`; 
                }
                else if(key.includes('by_whom'))
                { 
                    html += ``; 
                } 
                 else
                {
                    html += `<td style="text-transform: capitalize;">${key.replace(/_/g, ' ')}</td><td>${json_vals[key] ? json_vals[key].replace(/_/g, ' ') : json_vals[key]}</td>`;
                }

                
                
                html += `</tr>`;
                 
            }

            
        }

        html +=`<tr><td style="text-transform: capitalize;">Chagnes By</td><td>${_actionId}</td></tr>`;

    $('.json_value_body').html(html);
    
    html = ``;
   
  if(updated == 'updated')
  {
      $('.table_old').show();
      
      if(json_vals_old){
          
    for (var key in json_vals_old) {
            
            if (json_vals.hasOwnProperty(key))
            {
                html += `<tr>`;
                if(key == 'del' ||  key == 'id' || key == 'module__id' || key == 'show__to' ||  key == 'user__id')
                { 
                    html += ``;
                    
                } else if(key == 'hide__or__show')
                {
                    if(json_vals[key] != json_vals_old[key])
                    { 
                       $("td:contains('Hide Or Show'):first").css('background', '#ccffcc');
                     html += `<td style="text-transform: capitalize;">Hide Or Show</td><td>${json_vals_old[key] == 0 ? 'Hide': 'Show'}</td>`;
                    }
                    
                }  else if(key == '_Verify_')
                {
                     if(json_vals[key] != json_vals_old[key])
                    {
                          $("td:contains('Verify'):first").css('background', '#ccffcc');
                     html += `<td style="text-transform: capitalize;">Verify</td><td>${json_vals_old[key] == 0 ?  'Not Verified' : 'Verified' }</td>`;
                    }
                    
                }  else if(key.includes('date'))
                { 
                     if(json_vals[key] != json_vals_old[key])
                    {
                          $(`td:contains('${key.replace(/_/g, ' ')}'):first`).css('background', '#ccffcc');
                     html += `<td style="text-transform: capitalize;">${key.replace(/_/g, ' ')}</td><td>${json_vals_old[key]}</td>`;
                    }
                }  else
                {
                     if(json_vals[key] != json_vals_old[key])
                    {
                     $(`td:contains('${key.replace(/_/g, ' ')}'):first`).css('background', '#ccffcc');
                     html += `<td style="text-transform: capitalize;">${key.replace(/_/g, ' ')}</td><td>${json_vals_old[key] ? json_vals[key].replace(/_/g, ' ') : json_vals[key]}</td>`;
                    }
                }
                
                html += `</tr>`;
                 
            }
        }
        
    }

    $('.json_value_body_old').html(html);   
  }
  else
  {
      $('.table_old').hide();
  }
   
   $('#detail_json').modal('show');

}


function getModuleManager(){
  $.ajax({
  headers: {
  "Accept": "application/json",
  "Authorization": `Bearer ${getCookie('BearerToken')}`,
  },
    type: "GET", 
    url: `{{config('app.api_url')}}/api/module-managers`,
  success: function(response) {
    var  module_manager = response.data.module_manager;
    var html = ``;
    for(var i=0 ; i < module_manager.length ; i++)
    {
        if(!getCookie('current_module'))
        {
            setCookie('current_module',module_manager[i].id, 1)
        }
        html += `<option value="${module_manager[i].id}" ${ module_manager[i].id == getCookie('current_module') ? 'selected' : '' } > ${module_manager[i].name}</option>`
    }
    $('.current_module').html(html);
    
    getManageHistory(getCookie('search_field'),0);
     loader(false);

  },
  error: function(response) {
      
      loader(false);
      
  }
  });
}


</script>

<style>

button.active {
background-color:  #02b2b0 !important;
color: white !important;
}

.pagination-class a:hover:not(.active) {background-color: #ddd;}
</style>

@include('UserPanel.Includes.footer')