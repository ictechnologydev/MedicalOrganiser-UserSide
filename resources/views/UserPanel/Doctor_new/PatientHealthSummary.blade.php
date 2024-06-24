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
               <h3 class="p-0 m-0 bread-crumb-heading">Patient Health Summary</h3>
            </div>
            <div class="col-5 d-flex justify-content-end">
               <button class="btn btn-primary my-2">🔔</button>
            </div>
         </div>
         
         <div class="d-flex  justify-content-center">
              <div class="tab-class tab-class-1 tab-class-active" role="button" onclick="$('.tab-box').addClass('d-none');$('.tab-box-1').removeClass('d-none');  $('.tab-class').removeClass('tab-class-active');$('.tab-class-1').addClass('tab-class-active');">HEALTH SUMMARY</div>
               <div class="tab-class tab-class-2 ml-class" role="button" onclick="$('.tab-box').addClass('d-none');$('.tab-box-2').removeClass('d-none');  $('.tab-class').removeClass('tab-class-active');$('.tab-class-2').addClass('tab-class-active');">GERNAL HISTROY</div>
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
    
</script>

@include('UserPanel.Includes.footer') 