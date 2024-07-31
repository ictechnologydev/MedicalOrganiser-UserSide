<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammad Salam - Senior Web Developer at ICTechnology, Australia">
    <meta name="generator" content="Hugo 0.84.0">
    <title></title>
    <meta name="robots" content="noindex">
    <script async  src="{{url('/')}}/assets/sysfile.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Custom styles for this template -->
    <link href="{{url('/')}}/assets/dist/styles/sidebars.css" rel="stylesheet">


        <!-- Datatables-->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.js"></script>

    <link href="{{url('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Datatables-->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.css" rel="stylesheet"/>

    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.js"></script>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Custom styles for this template -->
    <link href="{{url('assets/dist/styles/sidebars.css')}}" rel="stylesheet">
    <link href="{{url('assets/dist/styles/dashboard.css')}}" rel="stylesheet">
    <link href="{{url('assets/dist/styles/share-with-doctor.css')}}" rel="stylesheet">

    <!-- Datatables-->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.css" rel="stylesheet"/>

    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <style>


input[type="date"]::-webkit-datetime-edit, input[type="date"]::-webkit-inner-spin-button, input[type="date"]::-webkit-clear-button {
        position: relative;
        color:white;
        }

        input[type="date"]::-webkit-datetime-edit-year-field{
        position: absolute !important;
        border-left:1px solid #8c8c8c;
        padding-left: 6px;
        left: 74px;
        color:black;
        }

        input[type="date"]::-webkit-datetime-edit-month-field{
        position: absolute !important;
        border-left:1px solid #8c8c8c;
        padding-left: 7px;
        left: 35px;
        color:black;
        }

        input[type="date"]::-webkit-datetime-edit-day-field{
        position: absolute !important;
        left: 4px;
        color:black;
        }
      .doctors-container{
    max-height: 70vh;
    overflow-y: scroll;
}
.doctors-container::-webkit-scrollbar {
    width: 5px;
}

/* Track */
.doctors-container::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
.doctors-container::-webkit-scrollbar-thumb {
    background: #02b2b0;
}
.doctor-floats{
    display: inline-block;
    justify-content: flex-start;
}
.doctor-block{
    border: 2px solid #02b2b0;
    border-radius: 8px;
    padding: 6px;
    display: inline-flex;
    justify-content: flex-start;
    vertical-align: middle;
    position: relative;
    margin: 4px;
}
 .doctor-image{
    height: 40px;
    width: 40px;
    background-position: center !important;
    background-size: cover !important;
    background-repeat: no-repeat !important;
    border: 2px solid #02b2b0;
    border-radius: 20px;
    margin-right: 5px;
    transition: transform 0.3s ease-in-out;
}
.doctor-image:hover {
    transform: scale(2); /* Adjust the scale value as desired */
}
.doctor-image:active {
    transform: scale(2); /* Adjust the scale value as desired */
}
.doctor-name{
    font-weight: bold;
    color:#02b2b0 !important;
    line-height: 105%;
}
.doctor-id{
    margin-top: 2px;
    font-size: 12px;
    font-weight: 600;
}
.doctor-check{
    position: absolute;
    right: 4px;
    top: 4px;
}
@media(max-width: 450px){
    .doctor-floats{
        display: block !important;
    }
    .doctor-block{
        width: 100%;
    }
    .doctor-search-input{
        width: 100%;
    }
}
    .full_loader
      {
            background: url('/loader.gif');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 50px;
            z-index: 1000;
            position: absolute;
            min-width: 100vw;
            min-height: 100vh;
            overflow: hidden;
            max-width: 100vw;
            max-height: 100vh;
            background-color: white;
      }
    </style>





    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>



function create_field_html2(field)
   {
     var  html_field = ``;

      if(field[3] == 'text')
                  {
                     html_field += `
                     <input type="text" class="form-control" id="${field[2]}" name="${field[2]}"  value="${field[6]}"   placeholder="${field[1]}">
                     `;
                  }
                  if(field[3] == 'number')
                  {
                     html_field += `
                     <input type="number" class="form-control" id="${field[2]}" name="${field[2]}"  value="${field[6]}"   placeholder="${field[1]}">
                     `;
                  }
                  if(field[3] == 'email')
                  {
                     html_field += `
                     <input type="email" class="form-control" id="${field[2]}" name="${field[2]}"  value="${field[6]}"   placeholder="${field[1]}">
                     `;
                  }
                  else
                  if(field[3] == 'image')
                  {
                     html_field += `
                     <input type="file" class="form-control" id="${field[2]}" name="${field[2]}"   value="${field[6]}"  placeholder="${field[1]}">
                     `;
                  }
                  else
                  if(field[3] == 'datepicker')
                  {
                     html_field += `
                     <input type="date" class="form-control" id="${field[2]}" name="${field[2]}"   value="${field[6]}"  placeholder="${field[1]}">
                     `;
                  }
                  else
                  if(field[3] == 'radio')
                  {
                     value_list = field[5]

                     for(var i=0; i < value_list.length; i++)
                     {

                        html_field += `
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" name="${field[2]}"   value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'checked' : i=='0' ? 'checked' : '' }  >
                                 <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i].trim()}</label>
                              </div>
                        `;
                     }
                  }
                  else
                  if(field[3] == 'checkbox')
                  {
                     value_list = field[5]

                     for(var i=0; i < value_list.length; i++)
                     {

                     html_field += `
                                 <div class="form-check">
                                 <input class="form-check-input" type="checkbox"  name="${field[2]}[]"  value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'checked' : '' }>
                                 <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i].trim()}</label>
                                 </div>
                     `;

                     }
                  }
                  else
                  if(field[3] == 'dropdown')
                  {
                     value_list = field[5]

                     html_field += `<select class="form-control" style="text-transform: capitalize;" id="${field[2]}" name="${field[2]}"    >`;

                     for(var i=0; i < value_list.length; i++)
                     {
                        html_field +=`<option value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
                     }

                     html_field +=`</select>`;
                  }
                  else
                  if(field[3] == 'textarea')
                  {
                     html_field += `
                     <textarea class="form-control"  id="${field[2]}" name="${field[2]}"    placeholder="${field[1]}">${field[6]}</textarea>
                     `;
                  }

                  return html_field;
   }
   


   function getSocialHistoryForm(user_id,role_id)
   {


    loader(true);

const formData={


  user_id : getCooki('user_id'),
  role_id : getCooki('user_role_id')
}

$.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/social-history/get-fields",
            data: formData,
            success: function(response) {

            
               var  fields = response.data.fields;

              var html_field = ``;

              for(i=0;i< fields.length;i++)
              {
           html_field += `<div class="form-group mt-2 col-12">`;
            html_field += `<div><label class="mb-1">${fields[i][1]}</label></div>`;
            html_field += `<div>${create_field_html2(fields[i])}</div>`;
            html_field += `</div>`;



              }


             $('.append_fields_social').html(html_field);

             $('#social_form .role_id').val(role_id);
             $('#social_form .user_id').val(user_id);

              loader(false);
              $('#socialHistoryModal').modal('show');
              $('#socialHistoryModal select').select2({
        dropdownParent: $('#socialHistoryModal')
    });
              

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

   $("#social_form").on("submit", function(e,user_id,role_id) {




loader(true);

const formData = new FormData(this);
formData.append('user_id', getCookie('user_id'));
formData.append('role_id', getCookie('user_role_id'));


$.ajax({
         headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
         },
      url: "{{config('app.api_url')}}/api/social-history/store-or-update-fields",
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {

      

         toastr.success(response.message);
         loader(false);
         $('#socialHistoryModal').modal('hide');

         location.reload();
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

});
   

    $(document).ready(function () {


var role_id= getCookie('user_role_id');


$("a.dropdown-item").hide();

        
        if (role_id == 2) {
            $("#profileid,#appSupportid").show();
        } else if (role_id == 3) {
            $("#profileid, #socialHistoryFormid, #HealthSummaryid,#myRequestsid, #remindersid, #appSupportid,#ManageHistoryid").show();
        }

});


    </script>
  </head>
  <body>
  <div class="full_loader" ></div>




<main>



  <div class="d-flex flex-column flex-shrink-0 bg-light sidebar-dashboard" style="width: 4rem;height: 100vh;">
    <a href="{{url('/dashboard')}}" class="d-block p-3 link-dark text-decoration-none logo-icon">
      <img src="{{url('/')}}/weblogo.png" height="37">
    </a>
    @include('UserPanel.Includes.sidebar')
    <div class="dropdown border-top profile_view">
      <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{url('/')}}/assets/brand/user.svg" alt="mdo" width="50" height="50" class="rounded-circle">
      </a>

      
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
          <li><a id="appSupportid" class="dropdown-item" role="button" href="{{url('/AppSupport')}}">App Support</a></li>
          <a class="dropdown-item" id="ManageHistoryid" role="button" href="/manage-history" >Chronicle</a>
        <li><a id="myRequestsid" class="dropdown-item" href="{{url('/requests')}}">Medical Request</a></li>
        <a class="dropdown-item" id="HealthSummaryid" role="button" href="/patient-health-summary" >Health Summary</a>
        <a class="dropdown-item" id="socialHistoryFormid" role="button"  onclick="getSocialHistoryForm('${getCooki(\'user_id\')}', '${getCooki(\'role_id\')}');">Personal History</a>
        
            <a class="dropdown-item" id="profileid" role="button"  onclick="getprofile('${getCooki(\'user_id\')}', '${getCooki(\'role_id\')}');">Profile</a>
        <li><a  id="remindersid" class="dropdown-item" role="button" href="{{url('/reminders')}}">Reminders</a></li>
        
        </li>
    
        
        
        <li class="PatientHealthSummaryClass" ><hr class="dropdown-divider"></li>
        <li><hr class="dropdown-divider"></li>
        <li><button class="dropdown-item logout" type="button" id="logout-button" >Logout</button></li>
      </ul>
    </div>


    <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="reason-modelLabel">General Settings</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="settings_table" class="" style="width:100%;">

          <tbody>
          </tbody>
      </table>




      </div>


      </div>
      </div>
      </div>



      <style>
        .category-row {


          color:white;
        }
        .category-row th{


         color:#02b2b0;
       }
        .category-cell {
          padding: 10px;

        }
        .category-name {
          padding: 10px;
          background-color: #02b2b0;
          border-radius: 20px;

        }
        .data-row td {
          display: flex;
          float: left;

        }

      </style>


      <div class="modal fade" id="patient_health_Modal" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
        <div style="padding:30px"class="modal-dialog">
        <div class="modal-content">
        <div style="background-color:#02b2b0;color:white"class="modal-header">
        <h3 class="modal-title" id="reason-modelLabel">Patient Health Summary</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table id="patient_health_table" class="" style="width:100%;">

<thead><h3 style="color:#02b2b0" class="text-center">Health Summary</h3></thead>
            <tbody>

            </tbody>
        </table>
  <br>
  <table id="patient_history_table" class="" style="width:100%;">
    <thead>
      <h3 style="color:#02b2b0" class="text-center">Patient History</h3>
    </thead>
    <tbody>
      <div class="accordion" id="accordionExample">


      </div>
    </tbody>
  </table>



        </div>


        </div>
        </div>
        </div>


    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="bg-primary text-white modal-header">
      <h5 class="modal-title" id="reason-modelLabel">User profile Details</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <h3 style="text-align: center;color: rgb(64, 182, 176);" id="user_id_view">User ID : -</h3>
        <table id="detail_table" class="" style="width:100%;">
          <thead><h4 style="text-align: center;color: rgb(64, 182, 176)">Profile Data</h4></thead>
          <tbody>
          </tbody>
      </table>


<br>
      <table id="detail_table2" class="" style="width:100%;">
        <thead><h4 style="text-align: center;color: rgb(64, 182, 176)">Emergency Contacts</h4></thead>
        <tbody>
        </tbody>
    </table>
    <br>
      <button style="background-color: rgb(64, 182, 176);outline:none;border:none;border-radius:5px;color:white"><a role="button" onclick="callTwoAPIs()">Edit Profile</a></button>

      </div>


      </div>
      </div>
      </div>


      <style>
        .pages-detail{

          font-weight:bold;
          font-size:20px;
        }
        #pagesData{
          color:white;
          background-color: #02b2b0;
          padding:10px;
          border-radius:20px;

        }
      </style>



      </div>

      <style>
        .page{
          color:white;
          font-weight:bold;
          font-size:20px;
        }
        #pagesContainer{

          padding:10px;
          border-radius:20px;

        }
        #pages-link{
          background-color: #02b2b0;
          padding:5px 5px 5px 5px;
          width:100%;
          margin-bottom:10px;
        }
      </style>


      <!--editModal-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="bg-primary text-white modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
         <div class="col-12">
            <form id="edit_form">
               <div class="card-body">
                <h4 style="text-align: center;color: rgb(64, 182, 176)">Edit Profile Data</h4>
                  <div class="row append_fields">


                  </div>
               </div>
               <input type="hidden"  name="role_id"  class="role_id" value="">
               <input type="hidden"  name="user_id"  class="user_id" value="">

            </form>
         </div>


         <div class="col-12">
          <form id="editform">
             <div class="card-body">
              <h4 style="text-align: center;color: rgb(64, 182, 176)">Edit Emergency Contacts</h4>
                <div class="row append_field">


                </div>
             </div>
             <input type="hidden"  name="role_id"  class="roleid" value="">
             <input type="hidden"  name="user_id"  class="userid" value="">

          </form>
       </div>
      </div>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary btn-sm" onclick="$('#editModal').modal('hide');" >Close</button>
        <button type="submit" class="btn btn-primary btn-sm text-white"  onclick="$('#edit_form').submit();">Update</button>

      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="socialHistoryModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div style="background-color:#02b2b0;color:white"class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Personal History</h5>
      </div>
      <div class="modal-body">
      <div class="row">
         <div class="col-12">
            <form id="social_form">
               <div class="card-body">

                  <div class="row append_fields_social">
                  </div>
               </div>
               <input type="hidden"  name="role_id"  class="role_id" value="">
               <input type="hidden"  name="user_id"  class="user_id" value="">

            </form>
         </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary btn-sm" onclick="$('#socialHistoryModal').modal('hide');" >Close</button>
        <button type="submit" class="btn btn-primary btn-sm"  onclick=" $('#social_form').submit()">Save</button>

      </div>
    </div>
  </div>
</div>


  </div>
  <div class="bg-white w-100 main-area" style="height: 100vh; max-height: 100vh; overflow-y: scroll;">


