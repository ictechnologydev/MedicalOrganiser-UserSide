

@include('UserPanel.Includes.header')
<div class="container-fluid p-3 main-container-content">
    <div class="container-fluid p-3 main-container-content">
        <div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
            <!-- Add your content here -->
        </div>
       
        <div id="pagesData">
           
        </div>
    </div>
</div>
</main>
  @include('UserPanel.Includes.script')


<script>




function get_all_pages_detail(button){

    loader(true);
var pageId = getParams('page_id');
  
console.log(pageId);

$.ajax({
headers: {
  "Accept": "application/json",
  "Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "GET",
url: `{{config('app.api_url')}}/api/pages/${pageId}`,
contentType: "application/json",
success: function(response) {
console.log(response.data);
      toastr.success(response.message);

      var pagesArray = response.data.page;

      console.log(pagesArray,'pages');
      var html = '';

      html += `<h1 style="font-weight:500">${pagesArray.name}</h1>`;
      html += `<span>${pagesArray.description}</span>`;
      

      document.getElementById("pagesData").innerHTML = html;
    

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
  } else if (response.status == 500) {
      toastr.error("Something went wrong");
  } else {
      toastr.error(response.responseJSON.message);
  }
}
});

}



       $(document).ready(function () {
        loader(true);
        get_all_pages_detail();

        });
</script>

@include('UserPanel.Includes.footer') 