@include('UserPanel.Includes.header')
<div>
    <div class="container-fluid p-3 main-container-content">
        @include('UserPanel.Includes.navbar')
        <div id="userDetailsContainer" class="welcome-note-container rounded-3 border border-primary border-2 p-2">
            <div class="h6 mt-1 mb-0"><span><strong><span class="user_email"></span></strong></span></div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome back to your personalized dashboard! We are
            thrilled to have you back and to continue supporting you on your journey.
        </div>
        <div class="content">

            <style>
                .invitation-area {
                    min-height: 35vh;
                }

                @media (min-width: 425px) {
                    .append_module {

                        margin-bottom: 20px;
                    }
                }

                @media (min-width: 375px) {
                    .append_module {
                        margin-bottom: 20px;
                    }
                }


                @media (min-width: 320px) {
                    .append_module {

                        margin-bottom: 20px;
                    }
                }
            </style>
            <div class="row mt-3 append_module">


            </div>
            <div class="row mt-3 d-none patient__box">
                <div class="col-md-8 widget-card-col mb-3">
                    <div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white"
                        style="background: url('<?php echo url('/'); ?>/assets/images/widgetbackground.png'); background-position: center; background-size: cover; height: 100%;">
                        <div class="h2 text-shadow">Share Your Profile with Doctor</div>
                        <p class="text-shadow">This feature allows users to connect directly with licensed medical doctors for personalized healthcare services. Users can browse through a curated list of doctors, each with a unique ID, and search by specialty, location, or experience. Detailed profiles provide insights into the doctor`s qualifications, areas of expertise, and patient reviews, helping users make informed decisions. Once the right doctor is selected, users can easily request a consultation or medical service by selecting the doctor`s ID and providing a brief description of their health concern.</p>
                        <a href="/shareProfile"
                            onclick="getDoctorslist(event)" class="btn btn-light px-4 py-2 text-primary shadow">Share
                            Now</a>



                    </div>
                </div>

                <div class="col-md-4 widget-card-col mb-3 submit-col">

                    <div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white"
                        style="background: linear-gradient(to left, #02b2b0,#02c574); height: 100%;">
                        <div class="h2 text-shadow">Submit a Medical Request</div>
                        <p class="text-shadow">Submit a medical request to the admin. We are here to help you.</p>
                        <a onclick="Request()" class="btn btn-light px-4 py-2 text-primary shadow"
                            data-bs-toggle="modal" data-bs-target="#submitRequest">Submit Request</a>
                    </div>
                </div>

                <div class="col-md-8 widget-card-col mb-3">

                    <div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white"
                        style="background: linear-gradient(to left, #02b2b0,#02c574); height: 100%;">
                        <div class="h2 text-shadow">Share Your Profile with Allied Professional</div>
                        <p class="text-shadow">Designed for users seeking specialized care from allied health professionals, this feature simplifies the process of finding and requesting services from experts like physiotherapists, dietitians, and occupational therapists. Users can explore profiles of allied health professionals, each identified by a unique ID, with information on their qualifications and areas of expertise. After selecting a professional based on their specific health needs, users can submit a service request by choosing the professional`s ID and providing relevant details about their health requirements.</p>
                        <a href="/shareProfile-allied-professional"
                            onclick="getDoctorslist(event)"class="btn btn-light px-4 py-2 text-primary shadow">Share
                            Now</a>
                    </div>
                </div>






                <div class="modal fade" id="submitRequest" tabindex="-1" aria-labelledby="reason-modelLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="reason-modelLabel">Add Request</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Requesting For</label>
                                        <select class="form-select" id="moduleSelect" onchange="storeModuleId()"
                                            data-placeholder="Select an option...">
                                            <option value="">Select a module</option>
                                        </select>


                                        <input class="module_id" class="module_id" type="hidden" id="module_id"
                                            name="module_id">

                                        <div id="emailHelp" class="form-text">If the required option is not available in
                                            the list, General Request</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="RequestTitle" class="form-label">Request Title</label>
                                        <input type="text" class="form-control title" id="RequestTitle"
                                            placeholder="Missing Medicine...">
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
                                    <button type="button" onclick="submitRequest()"
                                        class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <div class="row mt-3 d-none doctor__box">
                <div class="col-md-12 widget-card-col mb-3 submit-col">
                    <div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white"
                        style="background: linear-gradient(to left, #02b2b0,#02c574); height: 100%;">
                        <div class="h2 text-shadow">Request to Support</div>
                        <p class="text-shadow">We value your feedback and are committed to providing exceptional support for our solution. If you encounter any issues or need assistance, please reach out to our dedicated support team. Your satisfaction is our priority, and we are here to help you every step of the way.</p>
                        <a href="{{ url('/AppSupport') }}" class="btn btn-light px-4 py-2 text-primary shadow">App Support</a>
                    </div>
            </div>









                    <div class="modal fade" id="invitation_detail_modal" tabindex="-1"
                        aria-labelledby="reason-modelLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reason-modelLabel">Invitation Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>

                                        <div class="mb-3">

                                            <div class="PatientNoteDiv">Patient Note: </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Want to say something (optional)</label>
                                            <textarea class="form-control DoctorNoteText"placeholder="Want to say something (optional)"></textarea>
                                        </div>

                                        <button class="btn btn-light me-2 accept_invitation_btn"
                                            style="border-color: #02b2b0;border-width: 2px;" data-id=""
                                            onclick="accept_invitation_fun(this)"><img
                                                src="/assets/images/check.svg"></button>
                                        <button class="btn btn-light ml-1 reject_invitation_btn"
                                            style="border-color: #02b2b0;border-width: 2px;" data-id=""
                                            onclick="reject_invitation(this)"><img
                                                src="/assets/images/x.svg"></button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                  

                  

                    



                </div>


                <div class="modal fade" id="invitation_detail_modal_allied" tabindex="-1"
                        aria-labelledby="reason-modelLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reason-modelLabel">Invitation Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>

                                        <div class="mb-3">

                                            <div class="PatientNoteDiv_allied">Patient Note: </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Want to say something (optional)</label>
                                            <textarea class="form-control DoctorNoteText_allied"placeholder="Want to say something (optional)"></textarea>
                                        </div>

                                        <button class="btn btn-light me-2 accept_invitation_btn_allied"
                                            style="border-color: #02b2b0;border-width: 2px;" data-id=""
                                            onclick="accept_invitation_fun_allied(this)"><img
                                                src="/assets/images/check.svg"></button>
                                        <button class="btn btn-light ml-1 reject_invitation_btn_allied"
                                            style="border-color: #02b2b0;border-width: 2px;" data-id=""
                                            onclick="reject_invitation_allied(this)"><img
                                                src="/assets/images/x.svg"></button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <style>
                    .date {

                        border: 2px solid #02b2b0;
                        border-radius: 5px;
                        color: #02b2b0;
                        outline: none;
                    }
                </style>

                <div class="row mt-3 acceptedPatients_upper_container doctor__box d-none">

                    <div class="col-md-6 widget-card-col">
                        <div class="border border-2 border-primary p-2 rounded-3 ">
                            <div class="h5 text-primary d-flex "><strong>New Invites</strong>
                                <div class="ml-5  d-flex justify-content-around" style="margin-left: 20px;">

                                    <button type="button" class="btn btn-primary btn-sm ml-1 fw-btn btn1 btn-active"
                                        style="margin-left: 10px;" onclick="get_patient_invites(0,0)">New</button>
                                    <button type="button" class="btn btn-primary btn-sm ml-1 fw-btn btn2 "
                                        style="margin-left: 10px;"
                                        onclick="get_patient_invites_reject_by_doctor(0,0)">Reject by doctor</button>
                                    <button type="button" class="btn btn-primary btn-sm ml-1 fw-btn btn3 "
                                        style="margin-left: 10px;"
                                        onclick="get_patient_invites_reject_by_patient(0,0)">Reject by patient</button>
                                </div>


                            </div>
                            <div class="invitation-area">
                                <div id="requestDetails">



                                </div>


                                <input type="hidden" id="hiddenData" name="id" value="">

                                <!-- End Invitation-->






                            </div>
                            <div class="ml-auto mr-auto d-flex justify-content-center pages_btn mt-2"
                                style="margin-left:auto !important;margin-right:auto !important;">


                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 widget-card-col  ">
                        <div class="border border-2 border-primary p-2 rounded-3 ">
                            <div class="row">
                                <div
                                    style=" display: flex;align-items: center;justify-content: space-between;" class="flex-container">
                                    <div class="h5 text-primary"><strong>My Patients</strong></div>
                                </div>

                            </div>
                            <div class="invitation-area">
                                <!-- Start Invitation-->
                                <div id="acceptedPatients">

                                </div>


                                <input type="hidden" id="hiddenData" name="id"value="">

                            </div>

                            <div class="ml-auto mr-auto d-flex justify-content-center pages_btn2 mt-2"
                                style="margin-left:auto !important;margin-right:auto !important;">


                            </div>
                        </div>
                    </div>
                </div>




            </div>

        </div>
    </div>

<div class="row mt-3 d-none allied__box">
    <div class="col-md-12 widget-card-col mb-3 submit-col">
        <div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white"
             style="background: linear-gradient(to left, #02b2b0,#02c574); height: 100%;">
            <div class="h2 text-shadow">Request to Support</div>
            <p class="text-shadow">We value your feedback and are committed to providing exceptional support for our solution. If you encounter any issues or need assistance, please reach out to our dedicated support team. Your satisfaction is our priority, and we are here to help you every step of the way.</p>
            <a href="{{ url('/AppSupport') }}" class="btn btn-light px-4 py-2 text-primary shadow">App
                Support</a>
        </div>
    </div>
</div>
<div class="row mt-3 acceptedPatients_upper_container allied__box d-none">

    <div class="col-md-6 widget-card-col">
        <div class="border border-2 border-primary p-2 rounded-3 ">
            <div class="h5 text-primary d-flex "><strong>New Invites</strong>
                <div class="ml-5  d-flex justify-content-around" style="margin-left: 20px;">

                    <button type="button" class="btn btn-primary btn-sm ml-1 fw-btn btn1 btn-active"
                            style="margin-left: 10px;" onclick="get_patient_invites_allied(0,0)">New</button>
                    <button type="button" class="btn btn-primary btn-sm ml-1 fw-btn btn2 "
                            style="margin-left: 10px;"
                            onclick="get_patient_invites_reject_by_allied(0,0)">Reject by Allied</button>
                    <button type="button" class="btn btn-primary btn-sm ml-1 fw-btn btn3 "
                            style="margin-left: 10px;"
                            onclick="get_patient_invites_reject_by_patient_allied(0,0)">Reject by patient</button>
                </div>


            </div>
            <div class="invitation-area">
                <div id="requestDetails-allied">
                </div>
                <input type="hidden" id="hiddenData" name="id" value="">
                <!-- End Invitation-->
            </div>
            <div class="ml-auto mr-auto d-flex justify-content-center pages_btn mt-2"
                 style="margin-left:auto !important;margin-right:auto !important;">
            </div>
        </div>
    </div>
    <div class="col-md-6 widget-card-col  ">
        <div class="border border-2 border-primary p-2 rounded-3 ">
            <div class="row">
                <div
                    style=" display: flex;align-items: center;justify-content: space-between;"class="flex-container">
                    <div class="h5 text-primary"><strong>My Patients</strong></div>
                </div>

            </div>
            <div class="invitation-area">
                <!-- Start Invitation-->
                <div id="acceptedPatients_allied">

                </div>
                <input type="hidden" id="hiddenData" name="id"value="">

            </div>
            <div class="ml-auto mr-auto d-flex justify-content-center pages_btn2 mt-2"
                 style="margin-left:auto !important;margin-right:auto !important;">
            </div>
        </div>
    </div>

</div>


    <div class="modal fade" id="submitRequest" tabindex="-1" aria-labelledby="reason-modelLabel"
        aria-hidden="true">
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
                            <select class="form-select" id="moduleSelect" onchange="storeModuleId()"
                                data-placeholder="Select an option...">
                                <option value="">Select a module</option>
                            </select>


                            <input class="module_id" class="module_id" type="hidden" id="module_id"
                                name="module_id">

                            <div id="emailHelp" class="form-text">If the required option is not available in the list,
                                General Request</div>
                        </div>

                        <div class="mb-3">
                            <label for="RequestTitle" class="form-label">Request Title</label>
                            <input type="text" class="form-control title" id="RequestTitle"
                                placeholder="Missing Medicine...">
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

    @include('UserPanel.Includes.script')

    <script>
        var pageTitle = "Patient Dashboard - {{ env('APP_NAME') }}";
        document.title = pageTitle;

        function Request() {
            loader(true);

            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "GET",
                url: "{{ config('app.api_url') }}/api/module-managers",
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

        function submitRequest() {
            loader(true);


            const formData = {
                "discription": $('.discription').val(),
                "title": $('.title').val(),
                "module_id": $('#moduleSelect').val(),
                user_id: getCookie('user_id')
            }
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "POST",
                url: "{{ config('app.api_url') }}/api/request-updates",
                data: formData,
                success: function(response) {
                    loader(false);

                    toastr.success(response.message);
                    $('.modal').modal('hide');
                    location.reload();
                }
            });
        }

        function fetch_all_modules_data() {
            loader(true);
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "GET",
                url: "{{ config('app.api_url') }}/api/module-managers",
                success: function(response) {
                    var module_managers = response.data.module_manager;
                    var $html = '';
                    if (module_managers.length > 0) {

                        for (var i = 0; i < module_managers.length; i++) {

                            $html += `
        <div class="col-md-3 widget-card-col">
        <div class="widget-card border border-primary border-2 p-2 rounded-3 text-white">
        <img src="${module_managers[i]['module_icon']}" width="50px"height="50px"class="mb-2 p-2" style="border-radius:50px;background-color:rgb(7, 173, 173)"height="54px">
        <div id="moduleManagersList" class="h5 text-primary"><strong>${module_managers[i]['name']}</strong></div>
        <div class="widget-actions">
        <a  href="{{ url('/') }}/module/${module_managers[i]['id']}?tb=${module_managers[i]['table_name']}&name=${module_managers[i]['name']}&m_id=${module_managers[i]['id']}" class="btn badge bg-primary">View</a>

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

        function details() {
            var $html =
                `<div id="moduleManagersList" class="h5"><strong>👋 Welcome Back - <small class="text-primary">${getEmail('user_email')}<small></small></strong></div>`;
            $('.user_email').html($html);
        }


        function nameRole() {
            var $html =
                `<div  class="h3 class="p-0 m-0 bread-crumb-heading"><strong><small>  Dashboard -</small>${getName('nameRole')}</strong></div>`;
            $('.nameRole').html($html);
        }

        function Title() {
            var nameRole = getName('nameRole');
            document.title = nameRole + " Dashboard - {{ env('APP_NAME') }}";
            var $html =
                `<div class="h3 p-0 m-0 bread-crumb-heading"><strong>${nameRole}<small>  Dashboard -</small></strong></div>`;
            $('.title').html($html);
        }

        $(document).ready(function() {

            Title();
            nameRole();
            details();
            fetch_all_modules_data();
        });
    </script>


    <!-----dcotor code ---->


    <script>
        function invitation_detail(_this) {
            $('.reject_invitation_btn').attr('data-id', $(_this).attr('data-id'));
            $('.accept_invitation_btn').attr('data-id', $(_this).attr('data-id'));
            $('.PatientNoteDiv').html($(_this).attr('data-patient-note') != null && $(_this).attr('data-patient-note') !=
                '' ? 'Patient Note:<br/> ' + $(_this).attr('data-patient-note') : '');
            $('.DoctorNoteText').val('');
            console.log('invitation_detail_modal');
            $('#invitation_detail_modal').modal('show');

            if ($(_this).attr('data-hide-reject-btn') == 0) {
                $('.reject_invitation_btn').show();
            } else {
                $('.reject_invitation_btn').hide();
            }


            if ($(_this).attr('data-hide-accept-btn') == 0) {
                $('.accept_invitation_btn').show();
            } else {
                $('.accept_invitation_btn').hide();
            }
        }


        function invitation_detail_allied(_this) {
            $('.reject_invitation_btn_allied').attr('data-id', $(_this).attr('data-id'));
            $('.accept_invitation_btn_allied').attr('data-id', $(_this).attr('data-id'));
            $('.PatientNoteDiv_allied').html($(_this).attr('data-patient-note') != null && $(_this).attr('data-patient-note') !=
                '' ? 'Patient Note:<br/> ' + $(_this).attr('data-patient-note') : '');
            $('.DoctorNoteText_allied').val('');
           
            $('#invitation_detail_modal_allied').modal('show');

            if ($(_this).attr('data-hide-reject-btn') == 0) {
                $('.reject_invitation_btn_allied').show();
            } else {
                $('.reject_invitation_btn_allied').hide();
            }


            if ($(_this).attr('data-hide-accept-btn') == 0) {
                $('.accept_invitation_btn_allied').show();
            } else {
                $('.accept_invitation_btn_allied').hide();
            }
        }


        

        

       

        $(document).ready(function() {

            // doctor
            if (getCookie('user_role_id') == '2') {
                get_patient_invites(0, 0)
                get_my_patients(0, '', 0);
                $('.doctor__box').removeClass('d-none');
            }

            if (getCookie('user_role_id') == '3') {
                $('.patient__box').removeClass('d-none');
            }

            if (getCookie('user_role_id') == '17') {
                get_patient_invites_allied(0, 0);
                get_my_patients_allied(0, '', 0);
                $('.allied__box').removeClass('d-none');
            }




        });

        function expire_data(send_date) {
            var _today_date = new Date()
            var _send_date = new Date(send_date);
            var daysDifference = Math.abs((_today_date - _send_date) / (24 * 60 * 60 * 1000));
            return 15 - Math.floor(daysDifference);
        }

        function _formatDate(dateString) {

            const inputDate = new Date(dateString);
            const day = String(inputDate.getDate()).padStart(2, '0');
            const month = String(inputDate.getMonth() + 1).padStart(2, '0');
            const year = inputDate.getFullYear();
            const formattedDate = `${day}-${month}-${year}`;
            return formattedDate;

        }

        function get_patient_invites(from, pagination) {

            if (pagination == 0) {
                loader(true);
            }
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{ config('app.api_url') }}/api/users/show-all-requests-to-doctor?doctor_id=${getCooki('user_id')}&&from=${from}`,
                success: function(response) {
                    console.log(response);
                    var detail = response.data.request_to_doctor;
                    var container = document.getElementById('requestDetails');
                    $('.fw-btn').css('font-weight', '400');
                    $('.btn1').css('font-weight', '800');
                    $('.fw-btn').removeClass('btn-active');
                    $('.btn1').addClass('btn-active');
                    var html = '';
                    var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count) / 10;
                    count = count.toFixed(0);
                    var pages_btn = ``;
                    for (var c = 0; c < count; c++) {
                        pages_btn +=
                            `<button type="button" class="btn btn-primary btn-sm ml-1  ${response.data.count == 0 ? 'invisible' : '' }" style="margin-left:10px;" onclick="get_patient_invites(${c*10},1);" >${c+1}</button>`;
                    }
                    $('.pages_btn').html(pages_btn);
                    detail.forEach(function(request) {
                        html += '<div class="invite-notification">';
                        html += '<div class="inviter-section">';
                        html += '<div class="patient-info">';
                        html += '<div class="patient-id" style="font-weight: 500;" >' +
                            '<b>Patient ID:</b> ' + request.patient_id + ' </div>';
                        html += '<div class="patient-message" >' + '<b>Sent on:</b> ' + _formatDate(
                            request.date) + '</div>';
                        html += '<div class="patient-message" >' + '<b>Expires in:</b>  ' + expire_data(
                            request.date) + 'd</div>';
                        html += '</div>';
                        html += '<div class="action-section">';
                        html += '<button class="me-2" data-id="' + request.id + '" data-patient-id="' +
                            request.patient_id + '" data-patient-note="' + request.patient_note +
                            '" data-hide-reject-btn="0" data-hide-accept-btn="0" onclick="invitation_detail(this);"><i class="fas fa-tasks" style="font-size: 20px;padding: 5px;color:#02b2b0 !important;" ></i></button>';

                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    });
                    if (html == '') {
                        html = '<div class="text-center text-muted mt-auto "> No Invites Available </div>';
                    }
                    container.innerHTML = html;
                    document.querySelectorAll('.accept-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');
                            var patientNote = button.getAttribute('data-patient-note');
                            var id = button.getAttribute('patient_id');
                        });
                    });
                    document.querySelectorAll('.reject-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');

                        });
                    });
                    loader(false);


                },
                error: function(response) {

                    loader(false);

                }
            });
        }


        function get_patient_invites_allied(from, pagination) {

            if (pagination == 0) {
                loader(true);
            }
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{ config('app.api_url') }}/api/users/show-all-requests-to-allied?allied_professional_id=${getCooki('user_id')}&&from=${from}`,
                success: function(response) {
                    console.log(response);
                    var detail = response.data.request_to_allied;
                    var container = document.getElementById('requestDetails-allied');
                    $('.fw-btn').css('font-weight', '400');
                    $('.btn1').css('font-weight', '800');
                    $('.fw-btn').removeClass('btn-active');
                    $('.btn1').addClass('btn-active');
                    var html = '';
                    var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count) / 10;
                    count = count.toFixed(0);
                    var pages_btn = ``;
                    for (var c = 0; c < count; c++) {
                        pages_btn +=
                            `<button type="button" class="btn btn-primary btn-sm ml-1  ${response.data.count == 0 ? 'invisible' : '' }" style="margin-left:10px;" onclick="get_patient_invites_allied(${c*10},1);" >${c+1}</button>`;
                    }
                    $('.pages_btn').html(pages_btn);
                    console.log(detail);
                    detail.forEach(function(request) {
                        html += '<div class="invite-notification">';
                        html += '<div class="inviter-section">';
                        html += '<div class="patient-info">';
                        html += '<div class="patient-id" style="font-weight: 500;"><b>Patient ID:</b> ' + request.patient_id + ' </div>';
                        html += '<div class="patient-message"><b>Sent on:</b> ' + _formatDate(request.date) + '</div>';
                        html += '<div class="patient-message"><b>Expires in:</b> ' + expire_data(request.date) + 'd</div>';
                        html += '</div>';
                        html += '<div class="action-section">';
                        html += '<button class="me-2" data-id="' + request.id + '" data-patient-id="' +
                            request.patient_id + '" data-patient-note="' + request.patient_note +
                            '" data-hide-reject-btn="0" data-hide-accept-btn="0" onclick="invitation_detail_allied(this);"><i class="fas fa-tasks" style="font-size: 20px;padding: 5px;color:#02b2b0 !important;" ></i></button>';

                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    });
                    if (html == '') {
                        html = '<div class="text-center text-muted mt-auto "> No Invites Available </div>';
                    }
                    container.innerHTML = html;
                    document.querySelectorAll('.accept-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');
                            var patientNote = button.getAttribute('data-patient-note');
                            var id = button.getAttribute('patient_id');
                        });
                    });
                    document.querySelectorAll('.reject-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');

                        });
                    });
                    loader(false);


                },
                error: function(response) {

                    loader(false);

                }
            });
        }

        function get_patient_invites_reject_by_patient(from, pagination) {

            if (pagination == 0) {
                loader(true);
            }
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{ config('app.api_url') }}/api/users/show-all-requests-to-doctor-reject-by-patient?doctor_id=${getCooki('user_id')}&from=${from}`,

                success: function(response) {
                    var detail = response.data.request_to_doctor;
                    var container = document.getElementById('requestDetails');
                    $('.fw-btn').css('font-weight', '400');
                    $('.btn3').css('font-weight', '800');


                    var html = '';


                    var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count) / 10;

                    count = count.toFixed(0);

                    var pages_btn = ``;

                    for (var c = 0; c < count; c++) {
                        pages_btn +=
                            `<button type="button" class="btn btn-primary btn-sm ml-1  ${response.data.count == 0 ? 'invisible' : '' }" style="margin-left:10px;" onclick="get_patient_invites_reject_by_patient(${c*10},1);" >${c+1}</button>`;
                    }

                    $('.pages_btn').html(pages_btn);


                    detail.forEach(function(request) {



                        html += '<div class="invite-notification">';
                        html += '<div class="inviter-section">';


                        html += '<div class="patient-info">';
                        html += '<div class="patient-id" style="font-weight: 500;" >' +
                            '<b>Patient ID:</b> ' + request.patient_id + '</div>';
                        html += '<div class="patient-message" >' + '<b>Sent on:</b> ' + _formatDate(
                            request.date) + '</div>';
                        //   html += '<div class="patient-message" >' + '<b>Expires in:</b>  ' + expire_data(request.date) + 'd</div>';

                        html += '</div>';
                        html += '<div class="action-section">';


                        //html += '<button class="me-2" data-id="' + request.id + '" data-patient-id="' + request.patient_id + '" data-patient-note="' + request.patient_note + '" onclick="invitation_detail(this);"><i class="fas fa-tasks" style="font-size: 20px;padding: 5px;color:#02b2b0 !important;" ></i></button>';

                        html += '</div>';
                        html += '</div>';

                        html += '</div>';

                        html += '</div>';


                    });


                    if (html == '') {
                        html = '<div class="text-center text-muted mt-auto "> No Invites Available </div>';
                    }


                    container.innerHTML = html;

                    document.querySelectorAll('.accept-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');
                            var patientNote = button.getAttribute('data-patient-note');
                            var id = button.getAttribute('patient_id');
                        });
                    });
                    document.querySelectorAll('.reject-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');

                        });
                    });
                    loader(false);


                },
                error: function(response) {

                    loader(false);

                }
            });
        }

        function get_patient_invites_reject_by_patient_allied(from, pagination) {

if (pagination == 0) {
    loader(true);
}
$.ajax({
    headers: {
        "Accept": "application/json",
        "Authorization": `Bearer ${getCookie('BearerToken')}`,
    },
    type: "PUT",
    url: `{{ config('app.api_url') }}/api/users/show-all-requests-to-allied-reject-by-patient?allied_professional_id=${getCooki('user_id')}&from=${from}`,

    success: function(response) {
        var detail = response.data.request_to_allied
        ;
        var container = document.getElementById('requestDetails-allied');
        $('.fw-btn').css('font-weight', '400');
        $('.btn3').css('font-weight', '800');


        var html = '';


        var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count) / 10;

        count = count.toFixed(0);

        var pages_btn = ``;

        for (var c = 0; c < count; c++) {
            pages_btn +=
                `<button type="button" class="btn btn-primary btn-sm ml-1  ${response.data.count == 0 ? 'invisible' : '' }" style="margin-left:10px;" onclick="get_patient_invites_reject_by_patient(${c*10},1);" >${c+1}</button>`;
        }

        $('.pages_btn').html(pages_btn);


        detail.forEach(function(request) {



            html += '<div class="invite-notification">';
            html += '<div class="inviter-section">';


            html += '<div class="patient-info">';
            html += '<div class="patient-id" style="font-weight: 500;" >' +
                '<b>Patient ID:</b> ' + request.patient_id + '</div>';
            html += '<div class="patient-message" >' + '<b>Sent on:</b> ' + _formatDate(
                request.date) + '</div>';
            //   html += '<div class="patient-message" >' + '<b>Expires in:</b>  ' + expire_data(request.date) + 'd</div>';

            html += '</div>';
            html += '<div class="action-section">';


            //html += '<button class="me-2" data-id="' + request.id + '" data-patient-id="' + request.patient_id + '" data-patient-note="' + request.patient_note + '" onclick="invitation_detail(this);"><i class="fas fa-tasks" style="font-size: 20px;padding: 5px;color:#02b2b0 !important;" ></i></button>';

            html += '</div>';
            html += '</div>';

            html += '</div>';

            html += '</div>';


        });


        if (html == '') {
            html = '<div class="text-center text-muted mt-auto "> No Invites Available </div>';
        }


        container.innerHTML = html;

        document.querySelectorAll('.accept-invite').forEach(function(button) {
            button.addEventListener('click', function() {
                var patientId = button.getAttribute('data-patient-id');
                var patientNote = button.getAttribute('data-patient-note');
                var id = button.getAttribute('patient_id');
            });
        });
        document.querySelectorAll('.reject-invite').forEach(function(button) {
            button.addEventListener('click', function() {
                var patientId = button.getAttribute('data-patient-id');

            });
        });
        loader(false);


    },
    error: function(response) {

        loader(false);

    }
});
}


        function get_patient_invites_reject_by_doctor(from, pagination) {

            if (pagination == 0) {
                loader(true);
            }
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{ config('app.api_url') }}/api/users/show-all-requests-to-doctor-reject-by-doctor?doctor_id=${getCooki('user_id')}&from=${from}`,

                success: function(response) {
                    var detail = response.data.request_to_doctor;
                    var container = document.getElementById('requestDetails');
                    $('.fw-btn').css('font-weight', '400');
                    $('.btn2').css('font-weight', '800');


                    var html = '';

                    var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count) / 10;

                    count = count.toFixed(0);

                    var pages_btn = ``;

                    for (var c = 0; c < count; c++) {
                        pages_btn +=
                            `<button type="button" class="btn btn-primary btn-sm ml-1  ${response.data.count == 0 ? 'invisible' : '' }" style="margin-left:10px;" onclick="get_patient_invites_reject_by_doctor(${c*10},1);" >${c+1}</button>`;
                    }

                    $('.pages_btn').html(pages_btn);


                    detail.forEach(function(request) {



                        html += '<div class="invite-notification">';
                        html += '<div class="inviter-section">';


                        html += '<div class="patient-info">';
                        html += '<div class="patient-id" style="font-weight: 500;" >' +
                            '<b>Patient ID:</b> ' + request.patient_id + '</div>';
                        html += '<div class="patient-message" >' + '<b>Sent on:</b> ' + _formatDate(
                            request.date) + '</div>';
                        //   html += '<div class="patient-message" >' + '<b>Expires in:</b>  ' + expire_data(request.date) + 'd</div>';

                        html += '</div>';
                        html += '<div class="action-section">';


                        // html += '<button class="me-2" data-id="' + request.id + '" data-patient-id="' + request.patient_id + '"   data-patient-note="' + request.patient_note + '" data-hide-reject-btn="1" data-hide-accept-btn="0"  onclick="invitation_detail(this);"><i class="fas fa-tasks" style="font-size: 20px;padding: 5px;color:#02b2b0 !important;" ></i></button>';

                        html += '</div>';
                        html += '</div>';

                        html += '</div>';

                        html += '</div>';


                    });


                    if (html == '') {
                        html = '<div class="text-center text-muted mt-auto "> No Invites Available </div>';
                    }


                    container.innerHTML = html;

                    document.querySelectorAll('.accept-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');
                            var patientNote = button.getAttribute('data-patient-note');
                            var id = button.getAttribute('patient_id');
                        });
                    });
                    document.querySelectorAll('.reject-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');

                        });
                    });
                    loader(false);


                },
                error: function(response) {

                    loader(false);

                }
            });
        }


        function get_patient_invites_reject_by_allied(from, pagination) {

            if (pagination == 0) {
                loader(true);
            }

            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{ config('app.api_url') }}/api/users/show-all-requests-to-allied-reject-by-allied?allied_professional_id=${getCooki('user_id')}&from=${from}`,

                success: function(response) {

                  var detail = response.data.request_to_allied;
                    var container = document.getElementById('requestDetails-allied');
                    $('.fw-btn').css('font-weight', '400');
                    $('.btn2').css('font-weight', '800');


                    var html = '';

                    var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count) / 10;

                    count = count.toFixed(0);

                    var pages_btn = ``;

                    for (var c = 0; c < count; c++) {
                        pages_btn +=
                            `<button type="button" class="btn btn-primary btn-sm ml-1  ${response.data.count == 0 ? 'invisible' : '' }" style="margin-left:10px;" onclick="get_patient_invites_reject_by_allied(${c*10},1);" >${c+1}</button>`;
                    }

                    $('.pages_btn').html(pages_btn);


                    detail.forEach(function(request) {



                        html += '<div class="invite-notification">';
                        html += '<div class="inviter-section">';


                        html += '<div class="patient-info">';
                        html += '<div class="patient-id" style="font-weight: 500;" >' +
                            '<b>Patient ID:</b> ' + request.patient_id + '</div>';
                        html += '<div class="patient-message" >' + '<b>Sent on:</b> ' + _formatDate(
                            request.date) + '</div>';
                        //   html += '<div class="patient-message" >' + '<b>Expires in:</b>  ' + expire_data(request.date) + 'd</div>';

                        html += '</div>';
                        html += '<div class="action-section">';


                        // html += '<button class="me-2" data-id="' + request.id + '" data-patient-id="' + request.patient_id + '"   data-patient-note="' + request.patient_note + '" data-hide-reject-btn="1" data-hide-accept-btn="0"  onclick="invitation_detail(this);"><i class="fas fa-tasks" style="font-size: 20px;padding: 5px;color:#02b2b0 !important;" ></i></button>';

                        html += '</div>';
                        html += '</div>';

                        html += '</div>';

                        html += '</div>';


                    });


                    if (html == '') {
                        html = '<div class="text-center text-muted mt-auto "> No Invites Available </div>';
                    }


                    container.innerHTML = html;

                    document.querySelectorAll('.accept-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');
                            var patientNote = button.getAttribute('data-patient-note');
                            var id = button.getAttribute('patient_id');
                        });
                    });
                    document.querySelectorAll('.reject-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');

                        });
                    });
                    loader(false);


                },
                error: function(response) {

                    loader(false);

                }
            });
        }

        function get_my_patients(from, search_id, pagination) {

            if (pagination == 0) {
                loader(true);
            }

            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "POST",
                url: `{{ config('app.api_url') }}/api/doctor/my-patient`,
                data: {
                    "from": from,
                    "search_id": search_id,
                    "doctor_id": getCookie('user_id')
                },


                success: function(response) {
                    var detail = response.data.my_patient;




                    var container2 = document.getElementById('acceptedPatients');

                    var html2 = '';


                    var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count) / 10;

                    count = count.toFixed(0);

                    var pages_btn = ``;

                    for (var c = 0; c < count; c++) {
                        pages_btn +=
                            `<button type="button" class="btn btn-primary btn-sm ml-1  ${response.data.count == 0 ? 'invisible' : '' }" style="margin-left:10px;" onclick="get_my_patients(${c*10},'',1);" >${c+1}</button>`;
                    }

                    $('.pages_btn2').html(pages_btn);


                    detail.forEach(function(request) {

                        html2 += '<div class="invite-notification">';
                        html2 += '<div class="inviter-section">';
                        html2 += '<div class="patient-info">';
                        html2 += '<div class="patient-id" style="font-weight: 400;" >' +
                            '<b>Patient ID:</b> ' + request.patient_id + '</div>';
                        html2 += '<div class="patient-message"  >' + '<b>Accepted Date:</b> ' + request
                            .accepted_date + '</div>';
                        html2 += '</div>';
                        html2 += '<div class="action-section">';
                        html2 += '<button class="me-2" data-id="' + request.id + '" data-patient-id="' +
                            request.patient_id + '"   data-patient-note="' + request.patient_note +
                            '" data-hide-reject-btn="0" data-hide-accept-btn="1"  onclick="invitation_detail(this);"><i class="fas fa-tasks" style="font-size: 20px;padding: 5px;color:#02b2b0 !important;" ></i></button>';
                        html2 += '<button class="view-profile" data-patient-id="' + request.patient_id +
                            '" style="padding-top: 11px;" ><img src="/assets/images/user.svg"></button>';
                        html2 += '</div>';
                        html2 += '</div>';
                        html2 += '</div>';
                        html2 += '</div>';


                    });


                    if (html2 == '') {
                        html2 = '<div class="text-center text-muted mt-auto "> No Patients Available </div>';
                    }


                    container2.innerHTML = html2;

                    document.querySelectorAll('.reject-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');

                        });
                    });

                    document.querySelectorAll('.view-profile').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var id = button.getAttribute('data-patient-id');
                            setCookie('section_patient', id, 1);
                            window.location.href = '/show-patient-health-summary-to-doctor';

                        });


                    });


                    loader(false);


                },
                error: function(response) {

                    loader(false);

                }
            });
        }

        function get_my_patients_allied(from, search_id, pagination) {

            if (pagination == 0) {
                loader(true);
            }

            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "POST",
                url: `{{ config('app.api_url') }}/api/allied/my-patient`,
                data: {
                    "from": from,
                    "search_id": search_id,
                    "allied_professional_id": getCookie('user_id')
                },


                success: function(response) {
                    var detail = response.data.my_patient;
                    var container2 = document.getElementById('acceptedPatients_allied');

                    var html2 = '';


                    var count = parseInt(response.data.count) < 10 ? 1 : parseInt(response.data.count) / 10;

                    count = count.toFixed(0);

                    var pages_btn = ``;

                    for (var c = 0; c < count; c++) {
                        pages_btn +=
                            `<button type="button" class="btn btn-primary btn-sm ml-1  ${response.data.count == 0 ? 'invisible' : '' }" style="margin-left:10px;" onclick="get_my_patients_allied(${c*10},'',1);" >${c+1}</button>`;
                    }

                    $('.pages_btn2').html(pages_btn);


                    detail.forEach(function(request) {

                        html2 += '<div class="invite-notification">';
                        html2 += '<div class="inviter-section">';
                        html2 += '<div class="patient-info">';
                        html2 += '<div class="patient-id" style="font-weight: 400;" >' +
                            '<b>Patient ID:</b> ' + request.patient_id + '</div>';
                        html2 += '<div class="patient-message"  >' + '<b>Accepted Date:</b> ' + request
                            .accepted_date + '</div>';
                        html2 += '</div>';
                        html2 += '<div class="action-section">';
                        html2 += '<button class="me-2" data-id="' + request.id + '" data-patient-id="' +
                            request.patient_id + '"   data-patient-note="' + request.patient_note +
                            '" data-hide-reject-btn="0" data-hide-accept-btn="1"  onclick="invitation_detail_allied(this);"><i class="fas fa-tasks" style="font-size: 20px;padding: 5px;color:#02b2b0 !important;" ></i></button>';
                        html2 += '<button class="view-profile-allied" data-patient-id="' + request.patient_id +
                            '" style="padding-top: 11px;" ><img src="/assets/images/user.svg"></button>';
                        html2 += '</div>';
                        html2 += '</div>';
                        html2 += '</div>';
                        html2 += '</div>';


                    });


                    if (html2 == '') {
                        html2 = '<div class="text-center text-muted mt-auto "> No Patients Available </div>';
                    }


                    container2.innerHTML = html2;

                    document.querySelectorAll('.reject-invite').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var patientId = button.getAttribute('data-patient-id');

                        });
                    });

                    document.querySelectorAll('.view-profile').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var id = button.getAttribute('data-patient-id');
                            setCookie('section_patient', id, 1);
                            window.location.href = '/show-patient-health-summary-to-doctor';

                        });
                    });


                    document.querySelectorAll('.view-profile-allied').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var id = button.getAttribute('data-patient-id');
                            setCookie('section_patient', id, 1);
                            window.location.href = '/show-patient-health-summary-to-allied';

                        });
                    });


                    loader(false);


                },
                error: function(response) {

                    loader(false);

                }
            });
        }



        function accept_invitation_fun(_this) {
            loader(true);
            const id = _this.getAttribute('data-id');
            const doctor_note = $('.DoctorNoteText').val();
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",

                url: `{{ config('app.api_url') }}/api/users/request-status-update-doctor?notification_id=${id}&doctor_note=${doctor_note}&doctor_accept_or_reject=1`,
                success: function(response) {
                    console.log(response, '2');
                    toastr.success('Notification Accepted Successfully');
                    $('#invitation_detail_modal').modal('hide');
                    get_patient_invites(0, 0);
                    get_my_patients(0, '', 0);

                }
            });
        }

        function accept_invitation_fun_allied(_this) {
            loader(true);
            const id = _this.getAttribute('data-id');
            const doctor_note = $('.DoctorNoteText').val();
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",

                url: `{{ config('app.api_url') }}/api/users/request-status-update-patient-ap?notification_id=${id}&allied_professional_note=${doctor_note}&allied_professional_accept_or_reject=1`,
                success: function(response) {
                    console.log(response, '2');
                    toastr.success('Notification Accepted Successfully');
                    window.location.href = "/dashboard";

                }
            });
        }

        function reject_invitation(_this) {
            loader(true);
            const id = _this.getAttribute('data-id');
            const doctor_note = $('.DoctorNoteText').val();
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{ config('app.api_url') }}/api/users/request-status-update-doctor?notification_id=${id}&doctor_note=${doctor_note}&doctor_accept_or_reject=2`,
                success: function(response) {
                    toastr.success('Notification Rejected Successfully');
                    $('#invitation_detail_modal').modal('hide');
                    get_patient_invites(0, 0);
                    get_my_patients(0, '', 0);

                }
            });
        }

        function reject_invitation_allied(_this) {
            loader(true);
            const id = _this.getAttribute('data-id');
            const doctor_note = $('.DoctorNoteText').val();
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{ config('app.api_url') }}/api/users/request-status-update-patient-ap?notification_id=${id}&allied_professional_note=${doctor_note}&allied_professional_accept_or_reject=2`,
                success: function(response) {
                    toastr.success('Notification Rejected Successfully');
                    $('#invitation_detail_modal').modal('hide');
                    get_patient_invites(0, 0);
                    get_my_patients(0, '', 0);

                }
            });
        }
    </script>







    @include('UserPanel.Includes.footer')
