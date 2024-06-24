@include('UserPanel.Doctor.Includes.header')
<div>
<div class="container-fluid p-3 main-container-content">
@include('UserPanel.Doctor.Includes.navbar')





<div id="userDetailsContainer" style="border:2px solid #02b2b0"class="welcome-note-container rounded-3 border border-primary border-2 p-2">

<div class="h6 mt-1 mb-0">👋 Welcome Back - <span class="text-primary"><strong><span class="user_email"></span></strong></span></div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome back to your personalized dashboard! We are thrilled to have you back and to continue supporting you on your journey.
</div>
</div>
<div class="ms-4 me-2 content">

            <div class="row mt-3">
                <div class="col-md-6 mb-3 widget-card-col">
                    <div class="widget-card info-widget border border-primary border-2 p-5 rounded-3 text-white" style="background: #020202;height: 100%;">
                        <div class="h2 text-shadow">Request Administration</div>
                        <p class="text-shadow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <a href=""  class="btn btn-light px-4 py-2 text-primary shadow">Submit Request</a>

                       

                    </div>
                </div>

               
            
                <div class="col-md-5 widget-card-col">
                    <div class="border border-2 border-primary p-2 rounded-3 ">
                        <div class="h5 text-primary"><strong>New Invites</strong></div>
                        <div class="invitation-area">
                        <!-- Start Invitation-->
                        <div id="requestDetails">
                           
                               
                                
                        </div>


                        <input type="hidden" id="hiddenData" name="id"value="">

                        <!-- End Invitation-->
                        
                
                
                       
                                            
                
                </div>
            </div>
        </div>
    </div>


    <style>
        .date{

            border:2px solid #02b2b0;
            border-radius:5px;
            color:#02b2b0;
            outline:none;
        }
    </style>
    <div class="row mt-3">
    
     <div class="col-md-5 widget-card-col">
                    <div class="border border-2 border-primary p-2 rounded-3 ">
                        <div class="h5 text-primary"><strong>New Invites</strong></div>
                        <div class="invitation-area">
                        <!-- Start Invitation-->
                        <div id="requestDetails">
                           
                               
                                
                        </div>


                        <input type="hidden" id="hiddenData" name="id"value="">

                        <!-- End Invitation-->
                        
                
                
                       
                                            
                
                </div>
            </div>
        </div>
    
     <div class="col-md-5 widget-card-col">
            <div class="border border-2 border-primary p-2 rounded-3 ">
                <div class="row mb-3">
                    <div style=" display: flex;align-items: center;justify-content: space-between;"class="flex-container">
                        
                        <div class="h5 text-primary"><strong>My Patients</strong></div>
                        <div><input type="date"class="date"name="date"></div>
                    </div>
                    
                </div>
                <div class="invitation-area">
                <!-- Start Invitation-->
                <div id="acceptedPatients">
                   
                       
                        
                </div>


                <input type="hidden" id="hiddenData" name="id"value="">

                
                
        
        
               
                                    
        
        </div>
    </div>
</div>
</div>


</div>


@include('UserPanel.Doctor.Includes.script')
<script>







    
    
        
    
            function details(){
                var $html= `<div id="moduleManagersList" class="h5 text-primary"><strong>${getEmail('user_email')}</strong></div>`;
                $('.user_email').html($html);
            }
    
            
            function nameRole(){
                var $html= `<div  class="h3 class="p-0 m-0 bread-crumb-heading"><strong><small>  Dashabord -</small>${getName('nameRole')}</strong></div>`;
                $('.nameRole').html($html);
            }
    
            $(document).ready(function () {
    
                console.log(nameRole());
            nameRole();
            details();
        
       
    
            get_patient_invites();
            });
    
   
    
    </script>
    
    
    @include('UserPanel.Includes.footer')


