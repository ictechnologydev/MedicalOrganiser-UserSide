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
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/dist/styles/sidebars.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        feather.replace();
        new DataTable('#example');
        $("#medicine-select-field,#recurring-select-field,#doctor-select-field").select2({
            theme: "bootstrap-5",
        });
    </script>
  </body>
</html>
