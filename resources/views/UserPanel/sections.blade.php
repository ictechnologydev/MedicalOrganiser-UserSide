<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashbaord - {{env('APP_NAME')}}</title>
    <meta name="robots" content="noindex">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Custom styles for this template -->
    <link href="assets/dist/styles/sidebars.css" rel="stylesheet">
    <link href="assets/dist/styles/dashboard.css" rel="stylesheet">

    <!-- Datatables-->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.css" rel="stylesheet"/>
 
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/b-2.4.1/b-print-2.4.1/fc-4.3.0/r-2.5.0/sp-2.2.0/datatables.min.js"></script>
  </head>
  <body>
    
    
    <main>

        <div class="d-flex flex-column flex-shrink-0 bg-light sidebar-dashboard" style="width: 4rem;height: 100vh;">
          <a href="/dasboard.html" class="d-block p-3 link-dark text-decoration-none logo-icon">
            <img src="assets/brand/logo.svg">
          </a>
          <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li class="nav-item">
              <a href="dasboard.html" class="nav-link py-3 border-bottom" aria-current="page" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                  <img src="assets/images/dashboard.png" width="30px">
              </a>
            </li>
            <li>
              <a href="#" class="nav-link active py-3 border-bottom" title="Medications" data-bs-toggle="tooltip" data-bs-placement="right">
                  <img src="assets/images/syringe.png" width="30px">
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom" title="Disorders" data-bs-toggle="tooltip" data-bs-placement="right">
                  <img src="assets/images/neurological.png" width="30px">
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom" title="Adverse Effects" data-bs-toggle="tooltip" data-bs-placement="right">
                  <img src="assets/images/anxiety.png" width="30px">
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom" title="Doctor's Form" data-bs-toggle="tooltip" data-bs-placement="right">
                  <img src="assets/images/medical-team.png" width="30px">
              </a>
            </li>
          </ul>
          <div class="dropdown border-top profile_view">
            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
        </div>
        <div class="bg-white w-100 main-area" style="height: 100vh; max-height: 100vh; overflow-y: scroll;">
          <div class="mobile-icon bg-white shadow"><img src="assets/brand/logo.svg" height="30px"></div>
          <div>
          <div class="container-fluid p-3 main-container-content">
              <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
                  <div class="col-7">
                      <h3 class="p-0 m-0 bread-crumb-heading">Medications</h3>
                      <small>Dashabord - Medications</small>
                  </div>
                  <div class="col-5 d-flex justify-content-end">
                      <button class="btn btn-primary my-2">🔔</button>
                  </div>
              </div>
              <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
                  <div class="h6 mt-1 mb-0">
                      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Medication</button> <span class="text-secondary">|</span> <button class="btn btn-primary">History</button>
                  </div>
              </div>
              <div class="welcome-note-container rounded-3 border border-primary border-2 p-2">
                  <table id="example" class="display" style="width:100%">
                      <thead>
                          <tr>
                              <th>Medicine</th>
                              <th>Dosage Quantity</th>
                              <th>Dosage Recurring</th>
                              <th>Prescribed By</th>
                              <th>Issue Date</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
      
                          <tr>
                              <td>Loprin - 70mg</td>
                              <td>1 Tablet</td>
                              <td>After Breakfast</td>
                              <td>Dr. Malinda Cole</td>
                              <td>14/07/2023</td>
                              <td>
                                  <button class="btn badge bg-primary" data-bs-toggle="modal" data-bs-target="#reason-model">Reason</button>
                                  <button class="btn badge bg-warning">Edit</button>
                                  <button class="btn badge bg-danger">Delete</button>
                              </td>
                          </tr>
                          <tr>
                              <td>Avasar - 160/10/12.5mg</td>
                              <td>1 Tablet</td>
                              <td>Before Sleep</td>
                              <td>Dr. Malinda Cole</td>
                              <td>14/07/2023</td>
                              <td>
                                  <button class="btn badge bg-primary" data-bs-toggle="modal" data-bs-target="#reason-model">Reason</button>
                                  <button class="btn badge bg-warning">Edit</button>
                                  <button class="btn badge bg-danger">Delete</button>
                              </td>
                          </tr>
                          <tr>
                              <td>Megadip - 5mg</td>
                              <td>1 Tablet</td>
                              <td>Once a Day</td>
                              <td>Dr. Malinda Cole</td>
                              <td>14/07/2023</td>
                              <td>
                                  <button class="btn badge bg-primary" data-bs-toggle="modal" data-bs-target="#reason-model">Reason</button>
                                  <button class="btn badge bg-warning">Edit</button>
                                  <button class="btn badge bg-danger">Delete</button>
                              </td>
                          </tr>
                          <tr>
                              <td>Gaviscon</td>
                              <td>1 Tea Spoon</td>
                              <td>After Breakfast</td>
                              <td>Dr. Malinda Cole</td>
                              <td>14/07/2023</td>
                              <td>
                                  <button class="btn badge bg-primary">Reason</button>
                                  <button class="btn badge bg-warning">Edit</button>
                                  <button class="btn badge bg-danger">Delete</button>
                              </td>
                          </tr>
                          
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>Medicine</th>
                              <th>Dosage Quantity</th>
                              <th>Dosage Recurring</th>
                              <th>Prescribed By</th>
                              <th>Issue Date</th>
                              <th>Actions</th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
        </div>
      
      </main>

<!-- HTML template for the form container -->
<div id="dynamic-form-container">
    <!-- Modal -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h4 id="offcanvasRightLabel">Add Medications</h4>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Select Medicine</label>
                <select class="form-select" id="medicine-select-field" data-placeholder="Choose Medicine">
                    <option></option>
                    <option>Panadol Forte</option>
                    <option>Panadol Plan</option>
                    <option>Xiga - 20mg</option>
                    <option>Xiga - 40mg</option>
                    <option>ITP - 100mg</option>
                    <option>Cardinite - 2.6</option>
                </select>
                <div id="emailHelp" class="form-text">If the required option is not available in the list, you can post request - <a href="request.html">Submit Request</a></div>
            </div>
            <div class="mb-3">
              <label for="dosageQuantity" class="form-label">Dosage Quantity</label>
              <input type="text" class="form-control" id="dosageQuantity" placeholder="Dosage Quantity">
            </div>
            <div class="mb-3">
                <label for="recurring-select-field" class="form-label">Dosage Recurring</label>
                <select class="form-select" id="recurring-select-field" data-placeholder="Choose Recurring">
                    <option></option>
                    <option>Once a Day</option>
                    <option>After Breakfast</option>
                    <option>After Lunch</option>
                    <option>After Dinner</option>
                    <option>Before Breakfast</option>
                    <option>Before Lunch</option>
                    <option>Before Dinner</option>
                    <option>Before Breakfast and Dinner</option>
                    <option>Before Breakfast, Luch and Dinner</option>
                </select>
            </div>
            <hr>
            <div class="mb-3">
                <label for="medication-date" class="form-label">Issue Date</label>
                <input type="date" class="form-control" id="medication-date" placeholder="Issue Date">
            </div>
            <div class="mb-3">
                <label for="doctor-select-field" class="form-label">Prescribed By</label>
                <select class="form-select" id="doctor-select-field" data-placeholder="Choose Prescriber">
                    <option></option>
                    <option>Dr. Alex John</option>
                    <option>Dr. Malinda Cole</option>
                    <option>Sr. Lindsey Cole</option>
                    <option>Dr. Tommy Fav</option>
                    <option>Dr. Cecelia Mark</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="medication-reason" class="form-label">Reason</label>
                <textarea class="form-control" id="medication-reason" placeholder="Reason..."></textarea>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Are you sure?</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        
    </div>
  </div>
  <!-- Modal -->
    <div class="modal fade" id="reason-model" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="reason-modelLabel">Medication Reason</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Heart Beat is not Normal, heavy chest pain, uncontrolled blood presure, the viscosity of the blood is very high</p>
            </div>
        </div>
        </div>
    </div>
  </div>
  





  <script>

   function create_field_html(field)
   {
    fetchModuleData();

  async function fetchModuleData() {
    try {
      const response = await fetch('{{config('app.api_url')}}/api/module-managers/35');
      if (!response.ok) {
        throw new Error('Failed to fetch module data.');
      }
      const data = await response.json();

      // Extract the module ID from the API response
      const moduleId = data.data.module_id; // Assuming the API response contains the module_id

      // Generate dynamic form using fetched module data and module ID
      const modules = data.data; // Assuming the API response contains modules and their fields
      generateDynamicForm(modules, moduleId);
    } catch (error) {
      console.error(error);
      // Handle error, display a message, or show an error toast
    }
  }

     var  html_field = ``;

    //   if(field[3] == 'text')
    //               {
    //                  html_field += `
    //                  <input type="text" class="form-control" id="${field[2]}" name="${field[2]}"  value="${field[6]}"   placeholder="${field[1]}">
    //                  `;
    //               }
                  if(field['option'] == 'text')
                  {
                     html_field += `
                     <input type="text" class="form-control" id="${field['id']}" name="${field['medication','disorders','adverse effects']}"  required value="${field[""]}"   placeholder="${field["Choose module"]}">
                     `;
                  }

                  html_field += `
  <input type="text" class="form-control" id="${field['id']}" name="${field['module_id']}[]" required value="${field['value']}" placeholder="${field['Choose module']}">
`;



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

   function _edit(email,role_id,user_id)
   {
        loader(true);

        $.ajax({
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer @if(session()->has('token')){{session('token')}}@endif"
                    },
                    type: "POST",
                    url: "{{config('app.api_url')}}/api/get-profile-fields",
                    data: {email: email , role_id: role_id},
                    success: function(response) {
                     console.log(response);
                       var  fields = response.data.fields;
                      
                      var html_field = ``;
                     
                      for(i=0;i< fields.length;i++)
                      {
                        html_field += `<div class="form-group mt-2 col-6" >`
                        html_field += `<label class="mb-1">${fields[i][1]}</label>`;
                        html_field +=  create_field_html(fields[i]);
                        html_field += `</div>`;
                      }
                      

                     $('.append_fields').html(html_field);

                     $('#edit_form .role_id').val(role_id);
                     $('#edit_form .user_id').val(user_id);

                      loader(false);
                      $('#editModal').modal('show');

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

   $("#edit_form").on("submit", function(e) {
      e.preventDefault();
      loader(true);
            $.ajax({
               headers: {
                  "Accept": "application/json",
                  "Authorization": "Bearer @if(session()->has('token')){{session('token')}}@endif"
               },
            url: "{{config('app.api_url')}}/api/store-profile-fields",
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
        
               toastr.success(response.message);
               loader(false);
               $('#editModal').modal('hide');

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

   function store()
   {
        loader(true);

        $.ajax({
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer @if(session()->has('token')){{session('token')}}@endif"
                    },
                    type: "POST",
                    url: "{{config('app.api_url')}}/api/register",
                    data: $("#create_form").serialize(),
                    success: function(response) {
                      toastr.success(response.message);
                      // fetch_all_data();
                      loader(false);
                      $('#createModal').modal('hide');

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

   function create()
   {
      
      
    loader(true);

      $.ajax({
               headers: {
                     "Accept": "application/json",
                     "Authorization": "Bearer @if(session()->has('token')){{session('token')}}@endif"
               },
               type: "GET", 
               url: "{{config('app.api_url')}}/api"+"/roles",
               success: function(response) { 
                  console.log(response)
                  var roles = response.data.role;
                  
                  var html = `<option value="">Select Role</option>`;
                  for(var i = 0; i<roles.length;i++){

                  html += `<option value="${roles[i]['id']}">${roles[i]['name']}</option>`; 

                  }

                  $('#create_form .role_id').html(html);
                  $('#createModal').modal('show');


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

  //  function fetch_all_data()
  //  {


  //        let _DataTable = new DataTable('#table_id');
  //        _DataTable.clear().draw();

  //           $.ajax({
  //              headers: {
  //                    "Accept": "application/json",
  //                    "Authorization": "Bearer @if(session()->has('token')){{session('token')}}@endif"
  //              },
  //              type: "GET",
  //              url: "{{config('app.api_url')}}/api/users')}}",
  //              success: function(response) {
  //                 var  users = response.data.user;
  //                 var  created_by = '';
  //                 var active = '';
  //                    if(users.length > 0){

  //                          for(var i = 0; i<users.length;i++){

  //                           var  created_by  =   users[i]['created_by'] == '1' ? 'Admin': 'User';

  //                             active =  `<select class="form-control" id="" user_id="${users[i]['id']}" onchange="change_status(this);" >
  //                                   <option value="0"  ${ users[i]['active'] == '0' ? 'selected' : ''}  >Inactive</option>
  //                                   <option value="1"  ${ users[i]['active'] == '1' ? 'selected' : ''}  >Active</option>
  //                                   </select>`;

                                 
  //                             _DataTable.row.add([
  //                                   i+1,
  //                                   users[i]['email'],
  //                                   users[i]['phone_number'], 
  //                                   active,
  //                                   users[i]['role']['name'],
  //                                   created_by,
  //                                   ` <div class=" text-dark dropdown">
  //                 <a class="text-dark" href="#navbar-users" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
  //                   <span class="d-inline-block">
  //                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  //                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
  //                    </svg>                 
  //                 </span>
  //                 </a>
  //                 <div class="dropdown-menu">
  //                   <a class="dropdown-item" role="button" onclick="_profile('${users[i]['id']}','${users[i]['role']['id']}');" >Profile View</a>
  //                   <a class="dropdown-item" role="button" onclick="_edit('${users[i]['email']}','${users[i]['role']['id']}','${users[i]['id']}');"    >Edit Profile</a>
  //                   <a class="dropdown-item" role="button" onclick="_delete('${users[i]['id']}');"  >Delete</a>
  //                 </div>
  //               </div>`     
  //                                   ] ).draw();
  //                          }
  //                 }

               
  //              },
  //              error: function(response) {
  //                    if (response.status == 500) {
  //                       toastr.error("Something went wrong")
  //                    } else {
  //                       toastr.error(response.responseJSON.message)
  //                    }
  //              }
  //           });

  //  }

   function _profile(user_id,role_id)
   {
      
      
    loader(true);
      $.ajax({
               headers: {
                     "Accept": "application/json",
                     "Authorization": "Bearer @if(session()->has('token')){{session('token')}}@endif"
               },
               type: "POST", 
               url: "{{config('app.api_url')}}/api/get-profile-data",
               data: {role_id : role_id, user_id : user_id},
               success: function(response) {

                  console.log(response);

                   var    user_profile =    response.data.user_profile


   
                 var html = '';
               
                 
                     for(var i=0;i < user_profile.length; i++ ) 
                     {
                        html +=`<div class="row" ><div class="mt-1 col-6" style = "font-weight:bold !important;text-transform:capitalize;" >${user_profile[i]['option'].replace("_", " ")} :</div> <div class="col-6">${user_profile[i]['value']}</div></div>`;
                     }


                  $('#detail_table tbody').html(html);
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

   function change_status(_this)
   {
    loader(true);
        var value = $(_this).val();
        var user_id =  $(_this).attr('user_id');

            $.ajax({
               headers: {
                     "Accept": "application/json",
                     "Authorization": "Bearer @if(session()->has('token')){{session('token')}}@endif"
               },
               type: "PUT", 
               url: "{{url('/')}}"+"/api/users/"+user_id+"/update-status?active="+value,
               success: function(response) {
                 
                  
                 toastr.success(response.message)

               
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

   function  _delete(id)
   {
    loader(true);
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
                                        "Authorization": "Bearer @if(session()->has('token')){{session('token')}}@endif"
                                    },
                                    type: "DELETE",
                                    url: "{{url('/api/users')}}/"+id,
                                    data: {id : id},
                                    success: function(response) {
                                    toastr.success(response.message);
                                    // fetch_all_data();
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

        });


   }

   $(document).ready(function () {


      // fetch_all_data();

   });






   </script>


@include('Admin.Includes.footer')

  </body>
</html>
