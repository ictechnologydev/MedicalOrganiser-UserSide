



@include('UserPanel.Includes.header')

<div>

    <div class="container-fluid p-3 main-container-content">
        <div>
            <div class="container-fluid p-3 main-container-content">
                <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
                    <div class="col-7">
                        <h3 class="p-0 m-0 bread-crumb-heading">My Health Professionals</h3>
                        <small>Dashaboard - My Health Professionals</small>
                    </div>
                    <div class="col-3">
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

                <div class="welcome-note-container p-2 mb-1 d-flex justify-content-end">
                    <div class="h6 mt-1 mb-0">
                        <div class="row">
                            <!--<div class="col-4">-->
                            <!--<a class="btn btn-primary" id="showModalButton" href="{{url('/rejected-Requests')}}">Rejected List</a>-->
                            <!--</div>-->
                            <div class="col-6">
                                <a class="btn btn-primary" id="showModalButton" href="{{url('/shareProfileForm-allied-professional')}}">Share profile</a>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control doctor-search" id="doctor-search" placeholder="Search Allied Professional">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="doctor-list-container">
                    <table id="doctor-list"class="table table-bordered">
                        <thead style="background-color: #02b2b0;color:white">
                        <tr>

                            <th>Sr</th>
                            <th>Allied Professional Id</th>
                            <th>Email</th>
                            <th>Allied Id Number</th>
                            <th>Send Date</th>
                            <th>Accepted Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="doctor-list-body">
                        </tbody>
                    </table>
                </div>
                <div class="row ">
                    <div class="pagination-container col-lg-12 col-md-12 col-sm-9 d-flex justify-content-center" >
                    </div>
                </div>
            </div>
        </div>

    </div>
    </main>
    <style>
        .modal-dialog-top {
            transform: translateY(-100%);
            transition: transform 0.6s ease-in-out;
        }
        .modal.show .modal-dialog-top {
            transform: translateY(0);
        }
    </style>
    <div class="modal" id="doctorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"style="color:#02b2b0">Share Profile with doctor</h4>
                </div>
                <div class="modal-body">
                    <!-- Input field for additional information -->
                    <div class="mt-2"><small>If you choose to share your profile with your doctor, rest assured that we prioritize your privacy. We will only share the following data with your doctor, as outlined in our privacy terms and conditions:</small></div>
                    <div class="mt-1"><small class="mt-2">
                            <ul>
                                <div class="row mt-3 append_module">
                                </div>
                            </ul>
                        </small></div>
                    <select id="doctor-select" class="form-control doctor-select-input" onchange="selectDoctor(this.value)">
                        <option value="">Select Doctor...</option>
                    </select>
                    <br>
                    <label for="additionalInfo">Special Note for your Doctor</label>
                    <input name="patient_note"type="text" id="additionalInfo" class="form-control patient_note">
                    <input type="hidden"name="patient_id"value="${getCookie('user_id')}" >
                    {{-- <input type="hidden" id="selectedDoctorInput" name="doctor_id" class="doctor_id"> --}}
                    <input type="hidden"name="doctor_notification" class="doctor_notification" value="1" >
                    <input type="hidden"name="patient_accept_or_reject" class="patient_accept_or_reject" value="1" >
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button"id="submitBtn" onclick="send_profile()"class="btn btn-secondary" style="background-color:#02b2b0;outline:none;border:none"data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-secondary close" id="closeButton">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="rejectModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 id="modalTitle" class="modal-title">Rejection Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="patientNote">Patient Note:</label>
                    <textarea id="patientNote" class="form-control" rows="4"></textarea>
                </div>
                <input type="hidden"name="notification_id" class="notification_id"/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="rejectButton" onclick="rejectrequestByPatient()">Reject</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        #moduless{
            color:black
        }
    </style>
    @include('UserPanel.Includes.script')
    <script>
        var pageTitle = "Patient health Professionals - {{env('APP_NAME')}}";
        document.title = pageTitle;
        function fetch_all_modules_data(){
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
                            $html +=`<div id="moduless" class="h5 text-primary"><strong>${module_managers[i]['name']}</strong></div>`;
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
                    }
                }
            });
        }
        function send_profile(doctorId){
            const formData={
                "patient_id": getCookie('user_id'),
                "doctor_id": doctorId,
                "patient_accept_or_reject": $('.patient_accept_or_reject').val(),
                "doctor_notification": $('.doctor_notification').val(),
                "patient_note": $('.patient_note').val()
            }
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "POST",
                url: "{{config('app.api_url')}}/api/users/request-to-doctor-store",
                data:formData,
                success: function(response) {
                    toastr.success(response.message);
                    location.reload();
                },
                error: function(response) {
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
        function getProfessionalslist(from=0) {
            loader(true);
            const perPage = 10;
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{config('app.api_url')}}/api/users/show-all-requests-to-patient-AP?patient_id=${getCookie('user_id')}&from=${from}`,
                success: function (response) {
                    var request_to_allied_profess = response.data.request_to_allied_profess;
                    console.log(response);
                    console.log(request_to_allied_profess);
                    var html = ``;
                    var     userMeta = ``;
                    var declinedRequests = JSON.parse(localStorage.getItem('declinedRequests')) || [];
                    for(var i=0; i < request_to_allied_profess.length;i++)
                    {
                        if (declinedRequests.includes(request_to_allied_profess[i].id)) {
                            continue;
                        }
                        var dateObj = new Date(request_to_allied_profess[i].date);
                        var day = dateObj.getDate();
                        var month = dateObj.getMonth() + 1;
                        var year = dateObj.getFullYear();
                        //  if (request_to_allied_profess[i].patient_accept_or_reject == 1 && request_to_allied_profess[i].doctor_accept_or_reject == 0 || request_to_allied_profess[i].patient_accept_or_reject == 1 && request_to_allied_profess[i].doctor_accept_or_reject == 1) {
                        html +=`<tr>
        <td>${i+1}</td>

        <td>${request_to_allied_profess[i].allied_professional_id}</td>

        <td>${request_to_allied_profess[i].user_data.email}</td>`;

                        userMeta = request_to_allied_profess[i].user_data.userMeta ? request_to_allied_profess[i].user_data.userMeta : [];
                        var obj = {
                            "doctor_id_number" : "",
                            // "full_name" : "",
                        }
                        for(j=0; j< userMeta.length;j++)
                        {
                            if(userMeta[j]?.option == 'doctor_id_number'){

                                obj.doctor_id_number = userMeta[j]?.value

                            }
                            // if(userMeta[j]?.option == 'full_name'){
                            // obj.full_name = userMeta[j]?.value
                            // }
                        }
                        html +=`

        <td>${obj.doctor_id_number}</td>



        <td>${day < 10 ? '0' + day : day}-${month}-${year}</td>


        <td>${request_to_allied_profess[i]?.accepted_date ? request_to_allied_profess[i]?.accepted_date : ""}</td>



        if (${request_to_allied_profess[i]?.allied_professional_accept_or_reject === 0 && request_to_allied_profess[i]?.patient_accept_or_reject === 1}) {

        <td>
       ${request_to_allied_profess[i]?.allied_professional_accept_or_reject == 0 && request_to_allied_profess[i]?.patient_accept_or_reject == 1
                            ? `<span class="btn btn-warning">Pending</span>
       <a class="btn btn-danger btn-sm decline-button" onclick='$("#modalTitle").text("Rejection Note"); $("#rejectButton").text("Reject"); $("#rejectModal").modal("show")' data-id="${request_to_allied_profess[i].id}">
           <span class="action-items-status badge text-white p-1" title="Response">X</span>
       </a>`
                            : request_to_allied_profess[i]?.allied_professional_accept_or_reject == 1 && request_to_allied_profess[i]?.patient_accept_or_reject == 1
                                ? `<span class="btn btn-success">Accepted</span>
       <a class="btn btn-danger btn-sm decline-button" onclick='$("#modalTitle").text("Remove Note"); $("#rejectButton").text("Remove"); $("#rejectModal").modal("show")' data-id="${request_to_allied_profess[i].id}">
           <span class="action-items-status badge text-white p-1" title="Response">X</span>
       </a>`
                                : ""
                        }
        </td>
        </tr>`;
                        $(document).ready(function() {

                            $('.decline-button').on('click', function() {
                                var dataId = $(this).data('id');
                                $('.notification_id').val(dataId);
                                $('#rejectModal').modal('show');
                            });
                        });
                    }

                    if (html.trim() === '') {
                        var html_ = `
        <div class="welcome-note-container rounded-3 border border-primary border-2 p-1 mb-2">
            <div class="bg-light rounded-3 p-2 request-widget">
                <div class="my-1" style="font-weight: 100;text-align:center;text-weight:bold;color:black !important;">No Data yet</div>
            </div>
        </div>`;
                        $('.pagination-container').html(html_);
                        return;
                    } else {

                        $('#doctor-list-body').html(html);
                    }
                    console.log(response.count,'yes')
                    updatePaginationButton(response.count, from);
                }
            });
        }
        function updatePaginationButton(count, from) {
            loader(false);
            count = Math.ceil(count);
            var pages_btn = ``;
            const prevPage = from - 10 >= 0 ? from - 10 : 0;
            const nextPage = from + 10 < count ? from + 10 : from;
            pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" onclick="getProfessionalslist(${prevPage});">Previous</button>`;
            $('.p-btn').removeClass('active');
            for (var c = 0; c < Math.ceil(count / 10); c++) {
                const pageStart = c * 10;
                const pageEnd = Math.min((c + 1) * 10, count);
                if (from >= pageStart && from < pageEnd) {
                    pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn active" style="margin-left:10px;" onclick="getProfessionalslist(${pageStart});">${c + 1}</button>`;
                } else {
                    pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm p-btn" style="margin-left:10px;" onclick="getProfessionalslist(${pageStart});">${c + 1}</button>`;
                }
            }
            pages_btn += `<button type="button" class="btn btn-outline-primary btn-sm" style="margin-left:10px;" onclick="getProfessionalslist(${nextPage});">Next</button>`;
            $('.pagination-container').html(pages_btn);
        }
        function capitalizeFirstLetter(text) {
            text = text.replace(/_/g, ' ');
            return text.charAt(0).toUpperCase() + text.slice(1);
        }
        function rejectrequestByPatient(){
            patientNote=$("#patientNote").val();
            id=$(".notification_id").val();
            patient_accept_or_reject=2;
            console.log(patientNote,id,patient_accept_or_reject)
            $.ajax({
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${getCookie('BearerToken')}`,
                },
                type: "PUT",
                url: `{{config('app.api_url')}}/api/users/request-status-update-patient-ap?notification_id=${id}&patient_note=${patientNote}&patient_accept_or_reject=${patient_accept_or_reject}`,
                success: function (response) {
                    toastr.success(response.message);
                    $('#rejectModal').modal('hide');
                    location.reload();
                    getProfessionalslist(0,0);
                },
                error: function (response) {
                    toastr.error(response.error);
                }
            });
            function searchDoctors() {
                const selectInput = document.getElementById("doctor-select");
                while (selectInput.options.length > 1) {
                    selectInput.remove(1);
                }
                $.ajax({
                    headers: {
                        "Accept": "application/json",
                        "Authorization": `Bearer ${getCookie('BearerToken')}`,
                    },
                    type: "GET",
                    url: `{{config('app.api_url')}}/api/users/request-to-doctor?patient_id=${getCookie('user_id')}`,
                    success: function (response) {
                        console.log(response.message);
                        const doctors = response.data.user;
                        doctors.forEach(doctor => {
                            const option = document.createElement("option");
                            option.value = `${doctor.id}:${doctor.email}`;
                            option.textContent = `${doctor.id} - ${doctor.email}`;
                            selectInput.appendChild(option);
                        });
                    },
                });
            }
            function searchDoctor() {
                const selectInput = document.getElementById("doctor-select");
                const searchTerm = document.getElementById("search-input").value;
                const searchTermLowerCase = searchTerm.toLowerCase();
                for (let i = 1; i < selectInput.options.length; i++) {
                    const option = selectInput.options[i];
                    const optionValue = option.value.toLowerCase();
                    if (optionValue.includes(searchTermLowerCase)) {
                        option.style.display = "block";
                    } else {
                        option.style.display = "none";
                    }
                }
            }
        }
        function selectDoctor(doctorId) {
            if (doctorId === "") {
                return;
            }
            $('#submitBtn').on('click', function () {
                send_profile(doctorId);
            });
            const selectedDoctorIdElement = document.getElementById("selectedDoctorId");
            selectedDoctorIdElement.textContent = doctorId;
            $('#doctorModal').modal('show');

        }
        function setCookies(response) {
            setCookie('doctor_id',response.data.request_to_allied_profess.id, '1')
        }
        feather.replace();
        new DataTable('#example');
        $("#medicine-select-field,#recurring-select-field,#doctor-select-field").select2({
            theme: "bootstrap-5",
        });
        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + btoa(cvalue) + ";" + expires + ";path=/";
        }
        function getCook(doctor) {
            var name = doctor + '=';
            var decodedCookie = document.cookie;
            var cookieArray = decodedCookie.split(';');
            for (var i = 0; i < cookieArray.length; i++) {
                var cookie = cookieArray[i];
                while (cookie.charAt(0) === ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(name) === 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }
            return "";
        }
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return atob(c.substring(name.length, c.length));
                }
            }
            return "";
        }
        function getCooki(cname) {
            let name = cname + "=";
            let decodedCookie = document.cookie;
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return atob(c.substring(name.length, c.length));
                }
            }
            return "";
        }
        function getEmail(cname) {
            let name = cname + "=";
            let email = document.cookie;
            let ca = email.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return atob(c.substring(name.length, c.length));
                }
            }
            return "";
        }
        function getName(cname) {
            let name = cname + "=";
            let nameRole = document.cookie;
            let ca = nameRole.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return atob(c.substring(name.length, c.length));
                }
            }
            return "";
        }
        function getParams(name) {
            var url = new URL(window.location.href);
            return url.searchParams.get(name);
        }
        function searchDoctorBtId() {
            var doctorSearchInput = document.getElementById('doctor-search');
            doctorSearchInput.addEventListener('keyup', function () {
                var searchText = this.value.toLowerCase();
                var doctorTableBody = document.querySelector('#doctor-list tbody');
                var doctorRows = doctorTableBody.querySelectorAll('tr');
                doctorRows.forEach(function (row) {
                    var idCell = row.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();
                    var emailCell = row.querySelector('td:nth-child(3)').textContent.trim().toLowerCase();
                    var idMatches = idCell === searchText;
                    var emailMatches = emailCell.includes(searchText);
                    if (idMatches || emailMatches) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
        $(document).ready(function() {
            searchDoctorBtId();
            $('#doctorModal .modal-body').click(function(event) {
                event.stopPropagation();
            });
            $('#closeButton').click(function() {
                $('.modal').modal('hide');
                $('#myInput').val('');
            });
            fetch_all_modules_data();
            getProfessionalslist(0,0);
        });

    </script>
    <style>
        button.active {
            background-color:  #02b2b0 !important;
            color: white !important;
        }
        .pagination-class a:hover:not(.active) {background-color: #ddd;}
    </style>
@include('UserPanel.Includes.footer')
