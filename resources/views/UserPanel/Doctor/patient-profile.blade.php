@include('UserPanel.Doctor.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">
{{-- @include('UserPanel.Doctor.Includes.navbar') --}}

    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <div class="col-7">
                <h3 style="font-weight:bold"class="p-0 m-0 bread-crumb-heading">Doctor-Dashboard</h3>
                
            </div>
            <div class="col-5 d-flex justify-content-end">
                <button class="btn btn-primary my-2">🔔</button>
            </div>
        </div>
        <div class="patient-profile">

            {{-- <div class="welcome-note-container profile-information-section rounded-3 border border-primary border-2 p-2 mb-2">
                <div class="h4 text-primary">Patient Info</div>
                <hr class="m-0 p-0 mb-3">
                <div class="patient-info-section">
                    <div class="patient-image-sec" style="background: url(assets/images/doctor.png);"></div>
                   
                </div>
                <div class="patient_id"></div>
                
                <div class="">
                    <div class="action-section" style="display: block !important; opacity: 1; visibility: visible; top:0" >
                        <button title="Accept Invitation">Accept <img src="/assets/images/check.svg"></button>
                        <button title="Reject Invitation">Reject <img src="/assets/images/x.svg"></button>
                    </div>
                </div>
            </div> --}}



            
          
                <div class="patient-profile">
                    <div class="welcome-note-container profile-information-section rounded-3 border border-primary border-2 p-2 mb-2">
                        <div class="h4 text-primary">Patient Info</div>
                        <hr class="m-0 p-0 mb-3">
                        <div class="patient-info-section">
                            <div class="patient-image-sec" style="background: url(/assets/images/doctor.png);"></div>
                            <div class="patient-details-sec">
                                <div id="patient-profile-data"></div>
                                {{-- <div class="patient-message">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                            --}}


                            {{-- <div class="">
                                <div class="action-section" style="display: block !important; opacity: 1; visibility: visible; top:0">
                                    <button id="acceptButton"  title="Accept Invitation">Accept <img src="/assets/images/check.svg"></button>
                                    <button id="rejectButton"  title="Reject Invitation">Reject <img src="/assets/images/x.svg"></button>
                                </div>
                            </div> --}}
                            </div>

                            
                        </div>
                      
                    </div>
               
                    {{-- <div  class="patient-details-sec" style="color:black"id="patient-profile-data">
                    </div> --}}
                    {{-- <div class="patient-details-sec">
                        <div class="patient-image-sec" style="background: url(/assets/images/doctor.png);"></div>
                       
                        <div class="patient-message">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    </div>
                
                <div class="">
                    <div class="action-section" style="display: block !important; opacity: 1; visibility: visible; top:0" >
                        <button title="Accept Invitation">Accept <img src="/assets/images/check.svg"></button>
                        <button title="Reject Invitation">Reject <img src="/assets/images/x.svg"></button>
                    </div>
                </div> --}}

               


                
                
               
            </div>


            </div>
            <div id="dataContainer"></div>
          
           
           
        </div>

    </div>
</div>
  </div>

</main>

@include('UserPanel.Doctor.Includes.script')
<script>
 function getCookie(cname) {
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

function patientDetails(){
            var $html= `<div id="moduleManagersList" class="h5 text-primary"><strong>${getCookie('patient_id')}</strong></div>`;
            $('.patient_id').html($html);
        }




function show_patient_profile(id){

    loader(true);
const formData ={
id:getParams('id')
}
console.log(formData,'ID');
$.ajax({
headers: {
"Accept": "application/json",
"Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "POST", 
url: "{{config('app.api_url')}}/api/users/show-requests-to-doctor-by-id",
data: formData,      
success: function(response) {

console.log(response.data.request_to_doctor_detail.patient_note,'data2');
const info=response.data.request_to_doctor_detail;

console.log(info,'info');

$('#acceptButton').on('click', function () {
        accept_invitation(info);
      });

      $('#rejectButton').on('click', function () {
        reject_invitation(info);
      });

const encodedData = response.data;

    




    var html =``;


    // <p><strong>Doctor Accept/Reject:</strong> ${patientProfile.doctor_accept_or_reject === "1" ? "Accepted" : "Pending"}</p>



    const patientProfileHtml = `

                  
                    <h1 style="font-weight:800;font-size:20px"><strong >Patient ID:</strong class="patient-info-id"> ${response.data.request_to_doctor_detail.patient_id}</h1>
                        <div class="patient-message"><strong >Patient Message:</strong class="patient-info-id">${response.data.request_to_doctor_detail.patient_note}</div>

                          
                            
                        
                          
                        
`;

console.log(patientProfileHtml);



document.getElementById("patient-profile-data").innerHTML = patientProfileHtml;




const data = response.data.request_to_doctor_detail.module_manager;
console.log(data,'module');


data.forEach(module => {
  const containerDiv = document.createElement('div');
  containerDiv.className = 'welcome-note-container profile-information-section rounded-3 border border-primary border-2 p-2 mb-3';

  const headingDiv = document.createElement('div');
  headingDiv.className = 'h4 text-primary';
  headingDiv.textContent = module.module_name;

  const hr = document.createElement('hr');
  hr.className = 'm-0 p-0 mb-3';

  const table = document.createElement('table');
  table.id = 'example';
  table.className = 'display';
  table.style.width = '100%';

  const thead = document.createElement('thead');
  const headerRow = document.createElement('tr');

  const headerLabels = ['Medicine', 'Dosage Quantity', 'Dosage Recurring', 'Prescribed By', 'Issue Date'];
  headerLabels.forEach(labelText => {
    const th = document.createElement('th');
    th.textContent = labelText;
    headerRow.appendChild(th);
  });

  thead.appendChild(headerRow);
  table.appendChild(thead);

  const tbody = document.createElement('tbody');

  module.module_data.forEach(item => {
    const row = document.createElement('tr');
    const medicineCell = document.createElement('td');
    const dosageQuantityCell = document.createElement('td');
    const dosageRecurringCell = document.createElement('td');
    const prescribedByCell = document.createElement('td');
    const issueDateCell = document.createElement('td');

    medicineCell.textContent = item.medication || '-';
    dosageQuantityCell.textContent = item.dosage || '-';
    dosageRecurringCell.textContent = item.condition || '-';
    prescribedByCell.textContent = item.whom || '-';
    issueDateCell.textContent = item.date || '-';

    row.appendChild(medicineCell);
    row.appendChild(dosageQuantityCell);
    row.appendChild(dosageRecurringCell);
    row.appendChild(prescribedByCell);
    row.appendChild(issueDateCell);

    tbody.appendChild(row);
  });

  table.appendChild(tbody);

  const actionDivOuter = document.createElement('div');
  actionDivOuter.className = 'action-section'; // Corrected class name assignment

  const actionDivInner = document.createElement('div');
  actionDivInner.style.display = 'block';
  actionDivInner.style.opacity = '1';
  actionDivInner.style.visibility = 'visible';
  actionDivInner.style.top = '0';

  const updateButton = document.createElement('button');
  updateButton.title = 'Accept Invitation';
  updateButton.innerHTML = 'Update &nbsp;<img src="/assets/images/edit.svg">';

  actionDivInner.appendChild(updateButton);
  actionDivOuter.appendChild(actionDivInner);

  containerDiv.appendChild(headingDiv);
  containerDiv.appendChild(hr);
  containerDiv.appendChild(table);
  containerDiv.appendChild(actionDivOuter);

  dataContainer.appendChild(containerDiv);
});
}
});
}



function accept_invitation(info){

    loader(true);
  const formData ={
  id:getParams('id'),
  patient_accept_or_reject: 1,
  patient_note:info
}
console.log(formData,'form');
$.ajax({
 headers: {
 "Accept": "application/json",
 "Authorization": `Bearer ${getCookie('BearerToken')}`,
 },
  type: "PUT", 

  url:`{{config('app.api_url')}}/api/users/request-status-update-patient?notification_id=${getParams('id')}&patient_note=${formData.patient_note}&patient_accept_or_reject=1`,
    body:formData,   
 success: function(response) {

  console.log(response,'data notify');
 toastr.success('Notification Accepted Successfully');
 

 }
 });
}


function reject_invitation(_this){

    loader(true);
const formData ={
id:getParams('id'),
patient_accept_or_reject: 2,
patient_note:_this
}
console.log(formData,'form');
$.ajax({
headers: {
"Accept": "application/json",
"Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "PUT", 

url:`{{config('app.api_url')}}/api/users/request-status-update-patient?notification_id=${getParams('id')}&patient_note=${formData.patient_note}&patient_accept_or_reject=2`,
  body:formData,   
success: function(response) {

console.log(response,'data notify');
toastr.success('Notification Rejected Successfully');


}
});
}


var storedDetailString = getCookie("invitationDetails");

if (storedDetailString) {
  var storedDetail = JSON.parse(decodeURIComponent(storedDetailString));
  
 
  var profileContainer = document.getElementById("profile-container");

  var profileHtml = '';
  storedDetail.forEach(function(request) {

    profileHtml += '<div class="inviter-section">';
 
    profileHtml += '</div>';
  });

  profileContainer.innerHTML = profileHtml;
}



$(document).ready(function () {

    show_patient_profile();
  
});

</script>
@include('UserPanel.Includes.footer')
   
