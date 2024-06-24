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
    <!-- Custom styles for this template -->
    <link href="assets/dist/styles/sidebars.css" rel="stylesheet">
    <link href="assets/dist/styles/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<main>

  <div class="d-flex flex-column flex-shrink-0 bg-light sidebar-dashboard" style="width: 4rem;height: 100vh;">
    <a href="/dasboard.html" class="d-block p-3 link-dark text-decoration-none logo-icon">
      <img src="assets/brand/logo.svg">
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item">
        <a href="#" class="nav-link active py-3 border-bottom" aria-current="page" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
            <img src="assets/images/dashboard.png" width="30px">
        </a>
      </li>
      <li>
        <a href="section.html" class="nav-link py-3 border-bottom" title="My Patients" data-bs-toggle="tooltip" data-bs-placement="right">
            <img src="assets/images/syringe.png" width="30px">
        </a>
      </li>
      <li>
        <a href="section.html" class="nav-link py-3 border-bottom" title="Invitations" data-bs-toggle="tooltip" data-bs-placement="right">
            <img src="assets/images/neurological.png" width="30px">
        </a>
      </li>
    </ul>
    <div class="dropdown border-top profile_view">
      <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
        <li><a class="dropdown-item" href="{{url('/requests')}}">My Requests</a></li>
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
                <h3 class="p-0 m-0 bread-crumb-heading">Dashboard</h3>
                <small>Dashabord</small>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <button class="btn btn-primary my-2">🔔</button>
            </div>
        </div>

        <div class="welcome-note-container rounded-3 border border-primary border-2 p-2">
            <div class="h4 m-0 p-0">👋 Welcome Back - <span class="text-primary"><strong>Dr. Muhammad Salam</strong></span></div>
            <div class="h6 mt-1 mb-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome back to your personalized dashboard! We are thrilled to have you back and to continue supporting you on your journey.</div>
        </div>
        <div class="content">
            <div class="row mt-3">
                <div class="col-md-3 widget-card-col">
                    <div class="widget-card border border-primary border-2  p-2 rounded-3 text-white">
                        <img src="assets/images/syringe.png" class="mb-2" height="54px">
                        <div class="h5 text-primary"><strong>My Patients</strong></div>
                        <div class="widget-actions">
                            <a href="section.html" class="btn badge bg-primary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget-card-col">
                    <div class="widget-card border border-primary border-2 p-2 rounded-3 text-white">
                        <img src="assets/images/neurological.png" class="mb-2" height="54px">
                        <div class="h5 text-primary"><strong>Patient Inivtes</strong></div>
                        <div class="widget-actions">
                            <a href="section.html" class="btn badge bg-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-8 widget-card-col">
                    <div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white" style="background: #020202;height: 100%;">
                        <div class="h2 text-shadow">Request Administration</div>
                        <p class="text-shadow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <a href="request.html" class="btn btn-light px-4 py-2 text-primary shadow">Submit Request</a>
                    </div>
                </div>
                <div class="col-md-4 widget-card-col">
                    <div class="border border-2 border-primary p-2 rounded-3 ">
                        <div class="h5 text-primary"><strong>New Invites</strong></div>
                        <div class="invitation-area">
                        <!-- Start Invitation-->
                        <div class="invite-notification">
                            <div class="inviter-section">
                                <div class="patient-img" style="background: url(<path-to-image>), lightgray 50% / cover no-repeat;background: url(assets/images/doctor.png);"></div>
                                <div class="patient-info">
                                    <div class="patient-id">#1232</div>
                                    <div class="patient-message">Invited on 12-May-2023</div>
                                    <div class="patient-expirey">Invitation will Expire in 14 Days</div>
                                </div>
                                <div class="action-section">
                                    <button><img src="assets/images/check.svg"></button>
                                    <button><img src="assets/images/x.svg"></button>
                                    <button><img src="assets/images/user.svg"></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Invitation-->
                        <!-- Start Invitation-->
                        <div class="invite-notification">
                            <div class="inviter-section">
                                <div class="patient-img" style="background: url(<path-to-image>), lightgray 50% / cover no-repeat;background: url(assets/images/doctor.png);"></div>
                                <div class="patient-info">
                                    <div class="patient-id">#1232</div>
                                    <div class="patient-message">Invited on 12-May-2023</div>
                                    <div class="patient-expirey">Invitation will Expire in 14 Days</div>
                                </div>
                                <div class="action-section">
                                    <button><img src="assets/images/check.svg"></button>
                                    <button><img src="assets/images/x.svg"></button>
                                    <button><img src="assets/images/user.svg"></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Invitation-->
                        <!-- Start Invitation-->
                        <div class="invite-notification">
                            <div class="inviter-section">
                                <div class="patient-img" style="background: url(<path-to-image>), lightgray 50% / cover no-repeat;background: url(assets/images/doctor.png);"></div>
                                <div class="patient-info">
                                    <div class="patient-id">#1232</div>
                                    <div class="patient-message">Invited on 12-May-2023</div>
                                    <div class="patient-expirey">Invitation will Expire in 14 Days</div>
                                </div>
                                <div class="action-section">
                                    <button><img src="assets/images/check.svg"></button>
                                    <button><img src="assets/images/x.svg"></button>
                                    <button><img src="assets/images/user.svg"></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Invitation-->
                        <!-- Start Invitation-->
                        <div class="invite-notification">
                            <div class="inviter-section">
                                <div class="patient-img" style="background: url(<path-to-image>), lightgray 50% / cover no-repeat;background: url(assets/images/doctor.png);"></div>
                                <div class="patient-info">
                                    <div class="patient-id">#1232</div>
                                    <div class="patient-message">Invited on 12-May-2023</div>
                                    <div class="patient-expirey">Invitation will Expire in 14 Days</div>
                                </div>
                                <div class="action-section">
                                    <button><img src="assets/images/check.svg"></button>
                                    <button><img src="assets/images/x.svg"></button>
                                    <button><img src="assets/images/user.svg"></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Invitation-->
                                                                        <!-- Start Invitation-->
                        <div class="invite-notification">
                            <div class="inviter-section">
                                <div class="patient-img" style="background: url(<path-to-image>), lightgray 50% / cover no-repeat;background: url(assets/images/doctor.png);"></div>
                                <div class="patient-info">
                                    <div class="patient-id">#1232</div>
                                    <div class="patient-message">Invited on 12-May-2023</div>
                                    <div class="patient-expirey">Invitation will Expire in 14 Days</div>
                                </div>
                                <div class="action-section">
                                    <button><img src="assets/images/check.svg"></button>
                                    <button><img src="assets/images/x.svg"></button>
                                    <button><img src="assets/images/user.svg"></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Invitation-->
                                                                                                <!-- Start Invitation-->
                        <div class="invite-notification">
                            <div class="inviter-section">
                                <div class="patient-img" style="background: url(<path-to-image>), lightgray 50% / cover no-repeat;background: url(assets/images/doctor.png);"></div>
                                <div class="patient-info">
                                    <div class="patient-id">#1232</div>
                                    <div class="patient-message">Invited on 12-May-2023</div>
                                    <div class="patient-expirey">Invitation will Expire in 14 Days</div>
                                </div>
                                <div class="action-section">
                                    <button><img src="assets/images/check.svg"></button>
                                    <button><img src="assets/images/x.svg"></button>
                                    <button><img src="assets/images/user.svg"></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Invitation-->
                        <!-- Start Invitation-->
                        <div class="invite-notification">
                            <div class="inviter-section">
                                <div class="patient-img" style="background: url(<path-to-image>), lightgray 50% / cover no-repeat;background: url(assets/images/doctor.png);"></div>
                                <div class="patient-info">
                                    <div class="patient-id">#1232</div>
                                    <div class="patient-message">Invited on 12-May-2023</div>
                                    <div class="patient-expirey">Invitation will Expire in 14 Days</div>
                                </div>
                                <div class="action-section">
                                    <button><img src="assets/images/check.svg"></button>
                                    <button><img src="assets/images/x.svg"></button>
                                    <button><img src="assets/images/user.svg"></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Invitation-->                         <!-- Start Invitation-->
                        <div class="invite-notification">
                            <div class="inviter-section">
                                <div class="patient-img" style="background: url(<path-to-image>), lightgray 50% / cover no-repeat;background: url(assets/images/doctor.png);"></div>
                                <div class="patient-info">
                                    <div class="patient-id">#1232</div>
                                    <div class="patient-message">Invited on 12-May-2023</div>
                                    <div class="patient-expirey">Invitation will Expire in 14 Days</div>
                                </div>
                                <div class="action-section">
                                    <button><img src="assets/images/check.svg"></button>
                                    <button><img src="assets/images/x.svg"></button>
                                    <button><img src="assets/images/user.svg"></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Invitation-->                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>

</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        feather.replace();
    </script>
    <script src="assets/dist/styles/sidebars.js"></script>
  </body>
</html>
