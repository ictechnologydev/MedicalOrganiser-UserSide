   <audio id="sound" src="{{url('/')}}/alarm-clock.mp3" class="d-none"></audio>
 <div class="modal fade" id="alarm_modal" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="reason-modelLabel">Alarm</h5>
        
        </div>
        <div class="modal-body">
            <b>Title: </b><span class="alarm_title"></span>
            <br/>
            <b>Description: </b><span class="alarm_description"></span>
        </div>
                <div class="modal-footer">
                    <button type="button" onclick="sound.pause();$('#alarm_modal').modal('hide');" class="btn btn-primary">close</button>
                    </div>
    </div>
    
    </div> 
</div>
<script src="{{url('/')}}/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/assets/dist/styles/sidebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>


$("#logout-button").click(function(){
     $.ajax({
        headers:{
            "Accept":"application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/logout",
        success: function(response) {
        loader(false);
        toastr.success(response.message);
        window.location.href="/";
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
    });


const sound = document.getElementById("sound");
sound.loop = true;

function getCurrentDateTime() {
const now = new Date();
const year = now.getFullYear();
const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based
const day = String(now.getDate()).padStart(2, '0');
const hours = String(now.getHours()).padStart(2, '0');
const minutes = String(now.getMinutes()).padStart(2, '0');

const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}`;
return formattedDateTime;
}

function alarm(alarm_list,alarm_time) {
   
    var index = alarm_time.findIndex((element) => element == getCurrentDateTime());
    
    if (index !== -1) {
    
    sound.play();
    $('#alarm_modal').modal('show');
    $('.alarm_title').html(alarm_list[index].title)
    $('.alarm_description').html(alarm_list[index].des);
  
    
    }
    
}

function reminders_for_alarm() {
var alarm_list = [];
var alarm_time = [];

$.ajax({
headers: {
"Accept": "application/json",
"Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "GET",
url: `{{config('app.api_url')}}/api/reminders?user_id=${getCookie('user_id')}`,
success: function(response) {
var reminders  =  response.data.reminders;



for(var i=0; i< reminders.length; i++)
{
if(reminders[i].status == 1){

//1
alarm_list[i] = {
"alarm_time"  : `${convertDateFormat_(reminders[i].date)} ${convertTo24Time_(reminders[i].time)}`,
"title" : reminders[i].title,
"des"   : reminders[i].des
} 

//2
alarm_time[i] = `${convertDateFormat_(reminders[i].date)} ${convertTo24Time_(reminders[i].time)}`;

}
}


// console.log(alarm_list);
// console.log(alarm_time);

setInterval(function() {
  alarm(alarm_list, alarm_time);
}, 58000);

}
});
}

function convertTo24Time_(time12) {
  var timeParts = time12.split(' ');
  var hoursMinutes = timeParts[0].split(':');
  var hours = parseInt(hoursMinutes[0]);
  var minutes = parseInt(hoursMinutes[1]);
  var period = timeParts[1].toLowerCase();
  if (period === 'pm' && hours !== 12) {
    hours += 12;
  } else if (period === 'am' && hours === 12) {
    hours = 0;
  }
  var time24 = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
  return time24;
}

function convertDateFormat_(inputDate) {
 const date= inputDate.split('/');
 return `${date[2]}-${date[1]}-${date[0]}`;
}

function convertDateFormat2(inputDate) {
 const date= inputDate.split('-');
 return `${date[2]}-${date[1]}-${date[0]}`;
}

function get_all_pages(){
loader(true);

    $.ajax({
    headers: {
        "Accept": "application/json",
        "Authorization": `Bearer ${getCookie('BearerToken')}`,
    },
    type: "GET",
    url: `{{config('app.api_url')}}/api/pages?role_id=${getCookie('user_role_id')}`,
    contentType: "application/json",
    success: function(response) {
            var pagesArray = response.data.pages;
var pageElement = "";

// Sort the pagesArray alphabetically by pageName
pagesArray.sort(function(a, b) {
  var nameA = a.name.toUpperCase();
  var nameB = b.name.toUpperCase();
  return nameA.localeCompare(nameB);
});

pagesArray.forEach(function(page) {
  var pageId = page.id;
  var pageName = page.name;
  var pageStatus = page.status;
  pageElement += `<a class="dropdown-item" role="button" href="{{url('/')}}/pages/${pageId}">${pageName}</a>`;
});

$(".PatientHealthSummaryClass").after(pageElement);


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



$(document).ready(function() {

    get_all_pages();

});


$("#medicine-select-field,#recurring-select-field,#doctor-select-field").select2({
            theme: "bootstrap-5",
        });

function loader(show) {

    if(show == true)
    {
        $('.full_loader').removeClass('d-none');
    }
    else
    {
        $('.full_loader').addClass('d-none');
    }
}

function clearAllCookies() {
  const cookies = document.cookie.split(';');

  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i];
    const eqPos = cookie.indexOf('=');
    const cookieName = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/`;
  }
}





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
                     <input type="date" class="form-control" id="${field[2]}" name="${field[2]}"   value="${ field[6] ? convertDateFormat2(field[6]) : '' }"  placeholder="${field[1]}">
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
                  if(field[3] == 'search_able_dropdown')
                  {
                     value_list = field[5];


                     html_field += `<select class="form-control" style="text-transform: capitalize;" id="${field[2]}" name="${field[2]}"    >`;

                     for(var i=0; i < value_list.length; i++)
                     {
                        html_field +=`<option value="${value_list[i]}" ${ field[6] == value_list[i] ? 'selected' : '' } >${value_list[i]}</option>`;
                     }

                     html_field +=`</select>`;
                  }
                  else
                  if(field[3] == 'multipleFieldDropdown')
                  {
                      var arr_of_saved  = field[6] ? field[6].slice(',').length : 0;

                      html_field += `<div><label class="mb-1">${field[1]}</label></div>`;

                      if(arr_of_saved == 0)
                      {
                        if(field[2] == `disorders` )
                        {

                          value_list = field[5];
                          
                          html_field += `<select class="form-control disorders_class" style="text-transform: capitalize;" >`;

                          for(var i=0; i < value_list.length; i++)
                          {
                            html_field +=`<option value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
                          }

                          html_field +=`</select>`;

                        }
                     
                        if(field[2] == `family_member`)
                        {

                          value_list = field[5];
                          
                          html_field += `<select class="form-control family_member_class" style="text-transform: capitalize;" id="${field[2]}" name="${field[2]}" >`;

                          for(var i=0; i < value_list.length; i++)
                          {
                            html_field +=`<option value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
                          }

                          html_field +=`</select>`;

                        }

                      }
                      else
                      {
                          
                        // for(k=0; k < arr_of_saved.length; k++)
                        // {
                        //   if(field[2] == `disorders` )
                        //   {
                        //     value_list = field[5];
                              
                        //     html_field += `<select class="form-control disorders_class" style="text-transform: capitalize;" id="${field[2]}" name="${field[2]}" >`;

                        //     for(var i=0; i < value_list.length; i++)
                        //     {
                        //       html_field +=`<option value="${value_list[i].trim()}" ${ arr_of_saved[k] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
                        //     }

                        //     html_field +=`</select>`;

                        //   }
                        // }

                      }
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

   function create_multi_field_dropdown_html(field,field2)
   {
          var  html_field = ``;

          var arr_of_saved  = field[6].split(',')
          var arr_of_saved2  = field2[6].split(',')
          
          
          if(arr_of_saved.length == 0)
          {
            if(field[2] == `disorders` )
            {

              value_list = field[5];
              html_field += `<div class="multi-field-box form-group mt-2 col-12 p-3 mt-1 rounded-3  border border-dark border-2" style="border-style: dotted !important;">`
              html_field += `<div><label class="mb-1">${field[1]}</label></div>`;
              html_field += `<div><select class="form-control disorders_class" style="text-transform: capitalize;" >`;

              for(var i=0; i < value_list.length; i++)
              {
                html_field +=`<option value="${value_list[i].trim()}" ${ field[6] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
              }

              html_field +=`</select></div>`;

            }
          
            if(field2[2] == `family_member`)
            {

              value_list = field2[5];
              html_field += `<div><label class="mb-1">${field2[1]}</label></div>`;
              html_field += `<div><select class="form-control family_member_class" style="text-transform: capitalize;" id="${field2[2]}" name="${field2[2]}" >`;

              for(var i=0; i < value_list.length; i++)
              {
                html_field +=`<option value="${value_list[i].trim()}" ${ field2[6] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
              }

              html_field +=`</select></div></div>`;

            }

          }
          else
          {
              
            for(k=0; k < arr_of_saved.length; k++)
            {
              if(field[2] == `disorders` )
              {

                value_list = field[5];
                html_field += `<div class="multi-field-box form-group mt-2 col-12 p-3 mt-1 rounded-3  border border-dark border-2" style="border-style: dotted !important;">`
                html_field += `<div><label class="mb-1">${field[1]}</label></div>`;
                html_field += `<div><select class="form-control disorders_class dropdown-toggle" style="text-transform: capitalize;" >`;

                for(var i=0; i < value_list.length; i++)
                {
                  html_field +=`<option value="${value_list[i].trim()}" ${ arr_of_saved[k] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
                }

                html_field +=`</select></div>`;
                

              }
          
              if(field2[2] == `family_member`)
              {

                value_list = field2[5];
                html_field += `<div><label class="mb-1">${field2[1]}</label></div>`;
                html_field += `<div><select class="form-control family_member_class dropdown-toggle" style="text-transform: capitalize;" id="${field2[2]}" name="${field2[2]}" >`;

                for(var i=0; i < value_list.length; i++)
                {
                  html_field +=`<option value="${value_list[i].trim()}" ${ arr_of_saved2[k] == value_list[i].trim() ? 'selected' : '' } >${value_list[i].trim()}</option>`;
                }

                html_field +=`</select></div></div>`;

              }

            }

          }     

      return html_field;
   }



        $(document).ready(function() {



        $('.full_loader').addClass('d-none');
        });



        function create_social_history_field_html(field)
        {
        var html_field = ``;

        if(field['type'] == 'text')
        {
        html_field += `
        <input type="text" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        if(field['type'] == 'number')
        {
        html_field += `
        <input type="number" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        if(field['type'] == 'email')
        {
        html_field += `
        <input type="email" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        else
        if(field['type'] == 'image')
        {
        html_field += `
        <input type="file" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        else
        if(field['type'] == 'datepicker')
        {
        html_field += `
        <input type="date" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        else
        if(field['type'] == 'radio')
        {
        value_list = field['comma_separated_values']

        for(var i=0; i < value_list.length; i++)
        {

        html_field += `
        <div class="form-check">
        <input class="form-check-input" type="radio" name="${field['option']}" value="${value_list[i]['value'].trim()}" ${ field['store_value'] ? field['store_value'] : '' == value_list[i]['value'].trim() ? 'checked' : i=='0' ? 'checked' : '' } >
        <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i]['label'].trim()}</label>
        </div>
        `;
        }
        }
        else
        if(field['type'] == 'checkbox')
        {
        value_list = field['comma_separated_values']

        for(var i=0; i < value_list.length; i++)
        {

        html_field += `
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="${field['option']}[]" value="${value_list[i]['value'].trim()}" ${ field['store_value'] ? field['store_value'] : '' == value_list[i]['value'].trim() ? 'checked' : '' }>
        <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i]['label'].trim()}</label>
        </div>
        `;

        }
        }
        else
        if(field['type'] == 'dropdown')
        {
        value_list = field['comma_separated_values']

        html_field += `<select class="form-control" style="text-transform: capitalize;" id="${field['option']}" name="${field['option']}" >`;

        for(var i=0; i < value_list.length; i++)
        {

        html_field +=`<option value="${value_list[i]['value'].trim()}" ${ field['store_value'] ? field['store_value'] : '' == value_list[i]['value'].trim() ? 'selected' : '' } >${value_list[i]['label'].trim()}</option>`;
        }

        html_field +=`</select>`;
        }
        else
        if(field['type'] == 'textarea')
        {
        html_field += `
        <textarea class="form-control" id="${field['option']}" name="${field['option']}" placeholder="${capitalizeFirstLetter(field['option'])}">${ field['store_value'] ? field['store_value'] : ''}</textarea>
        `;
        }

        return html_field;
        }


function open_section_data_list_page(module_id,module_name,module_table)
{
    setCookie('section_module_id', module_id, 1);
    setCookie('section_module_name', module_name, 1);
    setCookie('section_module_table', module_table, 1);
    window.location.href = '{{url('/')}}/show-section-data-list-to-doctor';
    
}

function open_section_data_list_page_allied(module_id,module_name,module_table)
{
  setCookie('section_module_id', module_id, 1);
  setCookie('section_module_name', module_name, 1);
  setCookie('section_module_table', module_table, 1);
  window.location.href = '{{url('/')}}/show-section-data-list-to-allied';
}






         



function get_all_pages_detail(button){
loader(true);

  var pageId = getParams('page_id');



$.ajax({
headers: {
    "Accept": "application/json",
    "Authorization": `Bearer ${getCookie('BearerToken')}`,
},
type: "GET",
url: `{{config('app.api_url')}}/api/pages/${pageId}`,
contentType: "application/json",
success: function(response) {

        toastr.success(response.message);

        var pagesArray = response.data.page;


        var html = '';

        html += `<h6>Name: <span>${pagesArray.name}</span></h6>`;
        html += `<h6>Description: <span>${pagesArray.description}</span></h6>`;
        html += `<h6>Status: <span>${pagesArray.status}</span></h6>`;

        document.getElementById("pagesData").innerHTML = html;

location.reload();
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


    function append_multi_field() {
      // $('.disorders_class').select2('destroy');
      // $('.family_member_class').select2('destroy');
        var lastField = $('.multi-field-box').last();
        lastField.find('.disorders_class');
        lastField.find('.family_member_class');
        var clonedField = lastField.clone();
        lastField.after(clonedField);

        // $('.disorders_class').select2('destroy');
        // $('.family_member_class').select2('destroy');

          // for(var i=0; i < $('.disorders_class').length; i++)
          // {
          //   if ($('.disorders_class').eq(i).data('select2')) {
          //     $('.disorders_class').eq(i).select2('destroy');
          //     // $('.disorders_class').eq(i).select2();
          //   }
          // }

        
          // for(var i=0; i < $('.family_member_class').length; i++)
          // {
          //   if ($('.family_member_class').eq(i).data('select2')) {
          //       $('.family_member_class').eq(i).select2('destroy');
          //       // $('.family_member_class').eq(i).select2();
          //     }
          // }
    }


    function remove_multi_field() {
   
      if($('.multi-field-box').length > 1)
      {
        $('.multi-field-box').last().remove();
      }
      else
      {
        toastr.error("Last one cannot be remove");
      }
    }





   $("#social_form").on("submit", function(e,user_id,role_id) {
      e.preventDefault();
      loader(true);

      
      var disorders = '';
      for(var i=0; i < $('.disorders_class').length; i++)
      {
        disorders +=  $('.disorders_class').eq(i).val()+',';
      }


      var family_member = '';
      for(var i=0; i < $('.family_member_class').length; i++)
      {
        family_member +=  $('.family_member_class').eq(i).val()+',';
      }

 
      const formData = new FormData(this);
      
      formData.append('user_id', getCookie('user_id'));
      formData.append('role_id', getCookie('user_role_id'));
      formData.append('disorders', disorders.replace(/,\s*$/, ""));
      formData.append('family_member', family_member.replace(/,\s*$/, ""));

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

        function _profile(user_id,role_id)
   {

    loader(true);
    formData={
      user_id : getCooki('user_id'),
                role_id : getCooki('user_role_id')
    }

      $.ajax({
               headers: {
                     "Accept": "application/json",
                     "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
               type: "POST",
               url: "{{config('app.api_url')}}/api/get-profile-data",
               data: formData,
               success: function(response) {


                var    user_profile =    response.data.user_profile



                var html = '';


                    for(var i=0;i < user_profile.length; i++ )
                    {
                      html +=`<div class="row" ><div class="mt-1 col-2"></div><div class="mt-1 col-4" style = "font-weight:bold !important;text-transform:capitalize;" >${user_profile[i]['option'].replace(/_/g, ' ')} :</div> <div class="col-6">${user_profile[i]['value']}</div></div>`;
                    }


                    if(html == '')
                    {
                      html = "<p style='color:lightgray;text-align:center;'>No data added yet.</p>"
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



   function _emergencyData(user_id,role_id)
   {

    loader(true);
    formData={
      user_id : getCooki('user_id'),
                role_id : getCooki('user_role_id')
    }

      $.ajax({
               headers: {
                     "Accept": "application/json",
                     "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
               type: "POST",
               url: "{{config('app.api_url')}}/api/get-emergency-contacts-data",
               data: formData,
               success: function(response) {
            $('#user_id_view').html('USER ID : '+ getCooki('user_id'));
                var    emergency_contacts =    response.data.emergency_contacts



                var html = '';


                    for(var i=0;i < emergency_contacts.length; i++ )
                    {
                      html +=`<div class="row" ><div class="mt-1 col-2"></div><div class="mt-1 col-4" style = "font-weight:bold !important;text-transform:capitalize;" >${emergency_contacts[i]['option'].replace(/_/g, ' ')} :</div> <div class="col-6">${emergency_contacts[i]['value']}</div></div>`;
                    }

            if(html == '')
            {
                html = "<p style='color:lightgray;text-align:center;'>No data added yet.</p>"
            }


                $('#detail_table2 tbody').html(html);
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



function getprofile(user_id,role_id){
  loader(true);

  _profile(user_id,role_id);
  _emergencyData(user_id,role_id);
 
  loader(false);
}



   function _emergencyfields(email,role_id,user_id)
   {
        loader(true);

        const formData={

          email   : getEmail('user_email'),
          user_id : getCooki('user_id'),
          role_id : getCooki('user_role_id')
        }

        $.ajax({
                    headers: {
                        "Accept": "application/json",
                        "Authorization": `Bearer ${getCookie('BearerToken')}`,
                    },
                    type: "POST",
                    url: "{{config('app.api_url')}}/api/get-emergency-contacts-fields",
                    data: formData,
                    success: function(response) {
                       var  fields = response.data.fields;

                      var html_field = ``;

                      for(i=0;i< fields.length;i++)
                      {
                        html_field += `<div class="form-group mt-2 col-6" >`
                        html_field += `<label class="mb-1">${fields[i][1]}</label>`;
                        html_field +=  create_field_html2(fields[i]);
                        html_field += `</div>`;
                      }


                     $('.append_field').html(html_field);
                     $('#editform .roleid').val(role_id);
                     $('#editform .userid').val(user_id);

                      loader(false);
                      $('#editModal').modal('show');
                        $('#editModal select').select2({
        dropdownParent: $('#editModal')
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
   function _edit(email,role_id,user_id)
   {
        loader(true);

        const formData={
          email:getEmail('user_email'),
          user_id : getCooki('user_id'),
          role_id : getCooki('user_role_id')
        }

        $.ajax({
                    headers: {
                        "Accept": "application/json",
                        "Authorization": `Bearer ${getCookie('BearerToken')}`,
                    },
                    type: "POST",
                    url: "{{config('app.api_url')}}/api/get-profile-fields",
                    data: formData,
                    success: function(response) {

                       var  fields = response.data.fields;

                      var html_field = ``;

                      for(i=0;i< fields.length;i++)
                      {
                        html_field += `<div class="form-group mt-2 col-6" >`
                        html_field += `<label class="mb-1">${fields[i][1]}</label>`;
                        html_field +=  create_field_html2(fields[i]);
                        html_field += `</div>`;
                      }


                     $('.append_fields').html(html_field);

                     $('#edit_form .role_id').val(role_id);
                     $('#edit_form .user_id').val(user_id);

                      loader(false);
                      $('#editModal').modal('show');
                        $('#editModal select').select2({
        dropdownParent: $('#editModal')
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
   function callTwoAPIs() {
       
    var email = getEmail('email');
    var userId = getCooki('user_id');
    var roleId = getCooki('role_id');

    $('#detailsModal').modal('hide');
    _edit(email, userId, roleId);
    _emergencyfields(email, userId, roleId);
   
   
}


   $("#edit_form").on("submit", function(e,user_id,role_id) {

    e.preventDefault();
    loader(true);
    

    const formData = new FormData(this);
    formData.append('user_id', getCookie('user_id'));
    formData.append('role_id', getCookie('user_role_id'));
  
   
 $.ajax({
               headers: {
                  "Accept": "application/json",
                  "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
            url: "{{config('app.api_url')}}/api/store-profile-fields",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
               toastr.success(response.message);
             
               loader(false);
               $('#editform').submit();
               getprofile();
            },
                    error: function(response) {
                      
                     console.log(response.responseJSON.data);
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





   $("#editform").on("submit", function(e,user_id,role_id) {
  
      e.preventDefault();

      loader(true);
      const formData = new FormData(this);
formData.append('user_id', getCookie('user_id'));
formData.append('role_id', getCookie('user_role_id'));


            $.ajax({
               headers: {
                  "Accept": "application/json",
                  "Authorization": `Bearer ${getCookie('BearerToken')}`,
               },
            url: "{{config('app.api_url')}}/api/store-emergency-contacts-fields",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

               toastr.success(response.message);
               loader(false);
               $('#editModal').modal('hide');
               getprofile();
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

   function saveFormAndCallFunction(user_id,role_id) {

    $('#edit_form').submit(user_id,role_id);
    $('#editform').submit(user_id,role_id);


}

 function getSettings(){
  loader(true);

  $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/get-general-settings",

            success: function(response) {




               var    general_settings =    response.data.general_settings;




                var html = '';



                      html += `
                      <h5 style="color:#02b2b0">About : <span style="color:black">${general_settings.about}</span></h5>
                      <h5 style="color:#02b2b0">Privacy Policy :<span style="color:black"> ${general_settings.privacy_policy}</span></h5>

                      <h5 style="color:#02b2b0">Terms and Conditions :<span style="color:black">${general_settings.terms_and_conditions}</span></h5>

    `
                $('#settings_table tbody').html(html);
                $('#settingsModal').modal('show');





            }
            });
}
function all_read()

{
  loader(true);

    $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/all-notifications-mark-as-read",
            data: {
              id:getCooki('user_role_id')
            },
            success: function(response) {
                $('.notification_menu').css('display','none');
                $('.notification_dot').css('display','none');
                loader(false);
            }
            });


}

$(document).ready(function() {


$('.show_notification').on('click', function () {
    get_notification(0,10);
});

$('.page-wrapper').on('click', function () {
    $('.notification_menu').css('display','none');
});
count_notification();


reminders_for_alarm();


});


function get_notification(from)
 {


    const formdata={
        id:getCooki('user_id'),
        from:from,
        to:10
    }

            $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/get-notifications",
            data: formdata,
            success: function(response) {

            

              function formatDate(dateString) {
  const options = { day: 'numeric', month: 'numeric', year: 'numeric' };
  const date = new Date(dateString);


  const formattedDate = date.toLocaleDateString(undefined, options)
    .replace(/\//g, '-');

  return formattedDate;
}

var notifications = response.data.notifications;
if (notifications.length) {
  var html = ``;
  var _style = "";
  for (i = 0; i < notifications.length; i++) {
    if (notifications[i].receiver == "") {
      _style = notifications[i].seen_by_receiver == '0' ? 'background: beige' : '';
    } else if (notifications[i].sender == "0") {
      _style = notifications[i].seen_by_sender == '0' ? 'background: beige' : '';
    }

 
    var formattedDate = formatDate(notifications[i].date);

    html += `<div no="${notifications[i].id}" role="button" class="list-group-item" style="${_style}" >
                <div class="row align-items-center">
                  <div class="col text-truncate">
                    <div  class="text-body d-block">${notifications[i].title}</div>
                    <div class="d-block text-secondary text-truncate mt-n1">
                      ${notifications[i].short_desc}<span class="ms-5">${formattedDate}</span>
                    </div>
                  </div>
                </div>
              </div>`;
  }

  if (from == 0) {
    $('.append_notifications').html('');
  }

  $('.append_notifications').append(html);
  $('.load_more').attr('from', (10 + parseInt(from)));
  $('.load_more').attr('to', 10);
  $('.load_more').css('display', 'block');
} else {
  if (from == 0) {
    $('.append_notifications').html('<center style="margin-top: 210px!important;">No Notification Yet</center>');
    $('.load_more').css('display', 'none');
  } else {
    $('.load_more').css('display', 'none');
  }
}

$('.notification_menu').css('display', 'block');
loader(false);

            }
            });

 }


 function closeNotification() {
    // Find the notification menu and hide it
    var notificationMenu = document.querySelector(".notification_menu");
    if (notificationMenu) {
      notificationMenu.style.display = "none";
    }
  }

 function count_notification()
 {

  loader(true);
    const formdata={
        id:getCooki('user_role_id')
    }

            $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/count-notifications",
            data: formdata,
            success: function(response) {



                if(response.data.count)
                {
                    $('.notification_dot').show();
                }
                else
                {
                    $('.notification_dot').hide();
                }
                  loader(false);
            }

            });

 }

 function move_to_url(type,id)
{
  loader(true);
    var url = ""

    if(type == "support_resolved" || type == "support_store" )
    {
        url = "{{url('/general-settings/supports/list')}}?notify_id="+id;
    }
    else if(type == "request_to_doctor" || type == "request_to_doctor_accepted" || type == "request_to_doctor_accepted_by_patient")
    {
        url = "{{url('/requests')}}?notify_id="+id;
    }

    $.ajax({
            headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{config('app.api_url')}}/api/single-notifications-mark-as-read",
            data: {
            id : 3,
            "notification_id" : id
            },
            success: function(response) {

                window.location.href = url;
                loader(false);
            }
            });


}
document.querySelectorAll('.get_all_requests').forEach(function(button) {
    button.addEventListener('click', function() {
        var id = button.getAttribute('data-patient-id');
        window.location.href = '/requests?user_id=' + id;
    });
});



function get_all_requests(user_id){
  loader(true);
            $.ajax({
       headers: {
       "Accept": "application/json",
       "Authorization": `Bearer ${getCookie('BearerToken')}`,
       },
       type: "GET",
       url: `{{config('app.api_url')}}/api/request-updates?user_id=${getCookie('user_id')}`,




       success: function(response) {


              toastr.success(response.message);




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
         //  toastr.error(response.responseJSON.message)
        }
                                      }
       });
             }



function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + btoa(cvalue) + ";" + expires + ";path=/";
}



function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
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


</script>

<style>
    
    .select2.select2-container.select2-container--default
    {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        height:40px;
        text-transform: capitalize;
    }

    
    .select2-selection,.select2-selection--single
    {
            border-color: transparent !important;
    }
    .select2-selection__arrow
    {
            margin-top: 4px !important;
    }
    .select2-results__options
    {
        text-transform: capitalize;
    }
</style>
