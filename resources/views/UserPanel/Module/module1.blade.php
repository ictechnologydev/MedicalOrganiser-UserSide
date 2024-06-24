@include('UserPanel.Includes.header')

<style>
   .disabled_style{
   border-color: transparent;background: transparent;
   }
   table {
   border-collapse: collapse;
   border-spacing: 0;
   width: 100%;
   border: 1px solid #ddd;
   }
   th, td {
   text-align: left;
   padding: 8px;
   }
   @media (max-width: 1730px) {
   #slider {
   display: block;
   }
   }
   .table-welcome-note-container{
   border:2px solid #02b2b0;
   border-radius:10px;
   padding:10px;
   }
   #slider {
   position: fixed;
   bottom: 0;
   left: 0;
   width: 100%;
   background-color:none;
   padding: 10px;
   box-shadow:none;
   }
</style>
<div>
   <div class="container-fluid p-3 main-container-content">
      @include('UserPanel.Includes.nav')
      <div class="welcome-note-container p-2 d-flex justify-content-end">
         <div class="h6 mt-1 mb-0">
            <button class="btn btn-primary" type="button" class=" offcanvas"data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" onclick="add_data(this);">
            Add <small id="add_module"></small></button>
            <span class="text-secondary">|</span> <button class="btn btn-primary" onclick=" fetch_trashed_data()" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" id="moduleSettings"aria-controls="offcanvasRight">Module Settings</button>
         </div>
      </div>
      <div style="overflow-x:auto"class="table-welcome-note-container append_html">
         <style>
            @media (max-width: 768px) and (min-width:700px){
            #slider {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: none;
            padding: 10px;
            box-shadow: none;
            }
            }
            @media (max-width: 375px) and (min-width:320px){
            #moduleSettings {
            margin-top:10px;
            }
            }
         </style>
         <table id="table_id" class="display" style="width:100%">
            <thead>
               <tr class="table_column_list">
               </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
               <tr class="table_column_list">
               </tr>
            </tfoot>
         </table>
         <div id="slider">
         </div>
      </div>
   </div>
</div>
<div id="dynamic-form-container">
<!-- Modal -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
   <div class="offcanvas-header">
      <h4 id="offcanvasRightLabel"><small id="add_name"></small></h4>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body">
      <form class="append_fields">
      </form>
   </div>
</div>
<!-- Modal end -->
<div class="modal fade" id="reason-model" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="reason-modelLabel">Add Medication</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p>Heart Beat is not Normal, heavy chest pain, uncontrolled blood presure, the viscosity of the blood is very high</p>
         </div>
      </div>
   </div>
</div>
<div class="modal fade edit" id="edit-model" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="reason-modelLabel">Edit Medication</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body edit_modal">
            <form action="" class="append_field">
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal for displaying the image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <img id="modalImage" src="" alt="Image">
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="reason-model" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="reason-modelLabel">Add Medication</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p>Heart Beat is not Normal, heavy chest pain, uncontrolled blood presure, the viscosity of the blood is very high</p>
         </div>
      </div>
   </div>
</div>
<div class="offcanvas offcanvas-top" tabindex="-2" id="offcanvas" aria-labelledby="offcanvasRightLabel">
   <div class="offcanvas-header">
      <h4 id="offcanvasRightLabel">All Hide Data</h4>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body">
      <table id="trashed_table_id" class="display" style="width:100%">
         <thead>
            <tr class="table_column">
            </tr>
         </thead>
         <tbody>
         </tbody>
         <tfoot>
            <tr class="table_column">
            </tr>
         </tfoot>
      </table>
   </div>
</div>

@include('UserPanel.Includes.script')

<script>

 var pageTitle = "Patient Modules - {{env('APP_NAME')}}";

// Update the title of the page dynamically
document.title = pageTitle;

$("#medicine-select-field,#recurring-select-field,#doctor-select-field").select2({
    theme: "bootstrap-5",
});

function name() {
    $('.name').on('click')
}

function moveToTrash(id) {

    var trashedData = fetchTrashedData();


    populateTrashedTable(trashedData);
}

function fetch_trashed_data() {
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/section-data/fatch",
        data: {
            table_name: getParams('tb'),
            user__id: getCookie('user_id'),
            module_id: getParams('m_id'),
            from: 0
        },
        success: function(response) {
            var table_data = response.data;

            var table_columns = [];
            $i = 0;

            if (table_data.length > 0) {

                for (const index in table_data[0]) {
                    if (!['module__id', 'user__id', 'show__to', 'del', 'id'].includes(index)) {
                        table_columns[$i] = index;
                        $i++;
                    }
                }
            }

            var html_table_columns = '<th class="text-transform:capitalize !important;">Sr.</th>';
            for (var i = 0; i < table_columns.length; i++) {
                html_table_columns += `<th class="text-transform:capitalize !important;">${table_columns[i].replace(/_/g, ' ')}</th>`;
            }
            html_table_columns += '<th class="text-transform:capitalize !important;">Actions</th>';
            $('.table_column').html(html_table_columns);

            var _DataTable = new DataTable('#trashed_table_id');
            _DataTable.clear().draw();
            var add_array = [];


            for (var i = 0; i < table_data.length; i++) {
                if (table_data[i]['hide__or__show'] == 0) {
                    var add_array = [];

                    $edit_id_field = `
        ${i + 1}
        <span class="edit_box d-none">
        <i
        class="fa-solid fa-check update_btn_check"
        data_id="${table_data[i]['id']}"
        data_table="${getParams('tb')}"
        onclick="add_data('${table_data[i]['id']}','${getParams('tb')}','${getParams('m_id')}');"
        style="margin-left:10px;color: green; font-size: 18px;"
        role="button"
        >
        </i>
        </span>
        `;
                    add_array.push($edit_id_field);

                    for (var j = 0; j < table_columns.length; j++) {
                        if (table_columns[j] === '_Verify_') {
                            if (table_data[i][table_columns[j]] == 1) {
                                $edit_field = `<img src="/verify.png" alt="Image">`;
                            } else {
                                $edit_field = `<img src="/hidden.png" alt="Image">`;
                            }
                        } else if (isDateField(table_columns[j])) {
                            const dateValue = formatDate(table_data[i][table_columns[j]]);
                            $edit_field = `<span>${dateValue}</span>`;
                        } else if (table_data[i]['hide__or__show'] === 1) {

                            moveRowToTrash(table_data[i]['id']);

                            continue;

                        } else if (table_columns[j] === 'hide__or__show') {

                            $edit_field = `
                    <button class="bg-white" style="color:#02b2b0;outline:none;border:none;" onclick="show_data('${table_data[i]['id']}','${getParams('tb')}');"><i style="font-size:20px;"class="ms-3 text-center justify-content-center fa-sharp fa-solid fa-eye"></i></button>
                    `;
                        } else {
                            $edit_field = `<input
                type="text"
                value="${table_data[i][table_columns[j]]}"
                name="${table_columns[j]}"
                disabled
                class="edit_field disabled_style"
            >
            `;
                        }
                        add_array.push($edit_field);
                    }

                    add_array.push(`

            <button class="btn badge bg-warning" type="submit" data-bs-toggle="modal" data-bs-target="#edit-model" onclick="fetchAndEditSection(parseInt('${table_data[i]['id']}'), '${getParams('tb')}', '${getParams('m_id')}');">Edit</button>
            <button class="btn badge bg-danger" onclick="_delete_csv_data('${table_data[i]['id']}','${getParams('tb')}');">Delete</button>
        `);

                    _DataTable.row.add(add_array).draw();
                }
            }

            loader(false);
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

var _DataTable;

function fetch_all_data() {

    $.ajax({
        headers: {

            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/section-data/fatch",
        data: {
            table_name: getParams('tb'),
            user__id: getCookie('user_id'),
            module_id: getParams('m_id'),
            from: 0
        },
        success: function(response) {



            var table_data = response.data;
            var filter_data = response.data.fillter_dropdown;

            var table_columns = [];
            $i = 0;
            if (table_data.length > 0) {




                for (const index in table_data[0]) {
                    if (!['module__id', 'user__id', 'show__to', 'del', 'id'].includes(index)) {
                        table_columns[$i] = index;
                        $i++;

                    }
                }

            }
            var html_table_columns = '<th class="text-transform:capitalize !important;">Sr.</th>';
            for (var i = 0; i < table_columns.length; i++) {
                html_table_columns += `<th class="text-transform:capitalize !important;">${table_columns[i].replace(/_/g, ' ')}</th>`;
            }
            html_table_columns += '<th class="text-transform:capitalize !important;">Actions</th>';
            $('.table_column_list').html(html_table_columns);

            var _DataTable = new DataTable('#table_id');




            data = _DataTable.clear().draw();


            var add_array = [];



            for (var i = 0; i < table_data.length; i++) {
                if (table_data[i]['hide__or__show'] == 1) {
                    var add_array = [];

                    $edit_id_field = `
                                    ${i + 1}
                                    <span class="edit_box d-none">
                                    <i
                                    class="fa-solid fa-check update_btn_check"
                                    data_id="${table_data[i]['id']}"
                                    data_table="${getParams('tb')}"
                                    onclick="add_data('${table_data[i]['id']}','${getParams('tb')}','${getParams('m_id')}');"
                                    style="margin-left:10px;color: green; font-size: 18px;"
                                    role="button"
                                    >
                                    </i>
                                    </span>
                                    `;
                    add_array.push($edit_id_field);

                    for (var j = 0; j < table_columns.length; j++) {
                        if (table_columns[j] === '_Verify_') {
                            if (table_data[i][table_columns[j]] == 1) {
                                $edit_field = `<img src="/verify.png" alt="Image">`;
                            } else {
                                $edit_field = `<img src="/hidden.png" alt="Image">`;
                            }
                        } else if (isDateField(table_columns[j])) {
                            const dateValue = formatDate(table_data[i][table_columns[j]]);
                            $edit_field = `<span>${dateValue}</span>`;
                        } else if (table_data[i]['hide__or__show'] === 0) {

                            moveRowToTrash(table_data[i]['id']);

                            continue;
                        } else if (table_data[i]['hide__or__show'] === 0) {

                            moveRowToTrash(table_data[i]['id']);

                            continue;
                        } else if (table_columns[j] === 'choose_document') {

                            $edit_field = `
                        <button class="btn badge bg-primary" onclick="showImageModal('${table_data[i][table_columns[j]]}');">Show Image</button>
                    `;
                        } else if (table_columns[j] === 'hide__or__show') {

                            $edit_field = `
                    <button class="bg-white" style="color:#02b2b0;outline:none;border:none"onclick="hide_or_show('${table_data[i]['id']}','${getParams('tb')}');"><i style="font-size:20px"class="ms-3 text-center justify-content-center  fa-sharp fa-solid fa-eye-slash"></i>

</button>
                    `;
                        } else {
                            $edit_field = `<input
                type="text"
                value="${table_data[i][table_columns[j]]}"
                name="${table_columns[j]}"
                disabled
                class="edit_field disabled_style"
            >
            `;
                        }
                        add_array.push($edit_field);
                    }

                    add_array.push(`

            <button class="btn badge bg-warning" type="submit" data-bs-toggle="modal" data-bs-target="#edit-model" onclick="fetchAndEditSection(parseInt('${table_data[i]['id']}'), '${getParams('tb')}', '${getParams('m_id')}');">Edit</button>
            <button class="btn badge bg-danger" onclick="_delete_csv_data('${table_data[i]['id']}','${getParams('tb')}');">Delete</button>
        `);


                    _DataTable.row.add(add_array).draw();
                }

            }

            loader(false);
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

$(document).ready(function() {
    fetch_all_data();
});

function create_field_html(field) {
    var html_field = ``;


    if (field['type'] == 'text') {
        html_field += `
        <input type="text" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
    }
    if (field['type'] == 'number') {
        html_field += `
        <input type="number" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
    }
    if (field['type'] == 'email') {
        html_field += `
        <input type="email" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
    } else
    if (field['type'] == 'image') {
        html_field += `
        <input type="file" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
    } else
    if (field['type'] == 'datepicker') {
        html_field += `
        <input type="date" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
    } else
    if (field['type'] == 'radio') {
        value_list = field['comma_separated_values']

        for (var i = 0; i < value_list.length; i++) {

            html_field += `
        <div class="form-check">
        <input class="form-check-input" type="radio" name="${field['option']}" value="${value_list[i]['value'].trim()}" ${ field['store_value'] ? field['store_value'] : '' == value_list[i]['value'].trim() ? 'checked' : i=='0' ? 'checked' : '' } >
        <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i]['label'].trim()}</label>
        </div>
        `;
        }
    } else
    if (field['type'] == 'checkbox') {
        value_list = field['comma_separated_values']

        for (var i = 0; i < value_list.length; i++) {

            html_field += `
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="${field['option']}[]" value="${value_list[i]['value'].trim()}" ${ field['store_value'] ? field['store_value'] : '' == value_list[i]['value'].trim() ? 'checked' : '' }>
        <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i]['label'].trim()}</label>
        </div>
        `;

        }
    } else
    if (field['type'] == 'dropdown') {
        value_list = field['comma_separated_values']

        html_field += `<select class="form-control" style="text-transform: capitalize;" id="${field['option']}" name="${field['option']}" >`;

        for (var i = 0; i < value_list.length; i++) {

            html_field += `<option value="${value_list[i]['value'].trim()}" ${ field['store_value'] ? field['store_value'] : '' == value_list[i]['value'].trim() ? 'selected' : '' } >${value_list[i]['label'].trim()}</option>`;
        }

        html_field += `</select>`;
    } else
    if (field['type'] == 'textarea') {
        html_field += `
        <textarea class="form-control" id="${field['option']}" name="${field['option']}" placeholder="${capitalizeFirstLetter(field['option'])}">${ field['store_value'] ? field['store_value'] : ''}</textarea>
        `;
    }

    return html_field;
}

function showImageModal(imageUrl) {
    const modalImage = document.getElementById('modalImage');
    modalImage.src = imageUrl;

    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    imageModal.show();
}

function show_data(id, table_name) {

    const formData = {
        id: id,
        table_name: table_name,
        hide__or__show: 1

    };



    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/section-data/hide-or-show",
        data: JSON.stringify(formData),

        contentType: "application/json",
        success: function(response) {

            toastr.success(response.message);
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

function hide_or_show(id, table_name) {

    const formData = {
        id: id,
        table_name: table_name,
        hide__or__show: 0

    };



    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/section-data/hide-or-show",
        data: JSON.stringify(formData),

        contentType: "application/json",
        success: function(response) {

            toastr.success(response.message);

            fetch_all_data();
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

function displayImage(documentUrl) {

    $(document).on("click", ".view-image-button", function() {
        var imageUrl = $(this).data("image-url");
        var imageHtml = `<img src="${imageUrl}" alt="Image">`;


        $("#image-popup .modal-body").html(imageHtml);
        $("#image-popup").modal("show");

    });
}

function isDateField(fieldName) {
    return fieldName.toLowerCase().includes('date');
}

function formatDate(dateString) {
    const options = {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    };
    const date = new Date(dateString);
    const formattedDate = date.toLocaleDateString(undefined, options);

    const parts = formattedDate.split(' ');
    const day = parts[0];
    const month = parts[1];
    const year = parts[2];

    return `${day} ${month} ${year}`;
}

function updateNavWithMId(name) {

    document.getElementById('navMId').textContent = name;
}

updateNavWithMId(getParams('name'));

function module_name(name) {

    document.getElementById('add_name').textContent = name;
    document.getElementById('add_module').textContent = name;
}

module_name(getParams('name'));

function submitData(event) {
    event.preventDefault();

    loader(true);

    var formData = {};


    $('.append_fields input, .append_fields select, .append_fields textarea').each(function() {
        var fieldName = $(this).attr('name');
        var fieldValue = $(this).val();




        formData[fieldName] = fieldValue;
    });


    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/section-data/insert",
        data: JSON.stringify(formData),

        contentType: "application/json",
        success: function(response) {

            toastr.success("Data inserted successfully");
            $('.offcanvas').offcanvas('hide');
            location.reload();
            fetch_all_data();
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

function fetchAndEditSection(id, table_name, module_manager_id) {


    loader(true);

    var ids = id;

    const formData = {
        id: ids,
        table_name: getParams('tb'),
        module_manager_id: getParams('m_id'),
    }




    add_data(ids);


    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",

        url: "{{config('app.api_url')}}/api/section-data/edit",
        data: formData,
        success: function(response) {

            data=response.data.module_manager.module_manager_meta;
            add_data(data);

            loader(false);
        },
        error: function(response) {

            loader(false);

        }
    });
}



function editData(event) {
    event.preventDefault();

    loader(true);

    var formData = {};


    $('.append_field input, .append_field select, .append_field textarea').each(function() {
        var fieldName = $(this).attr('name');
        var fieldValue = $(this).val();
        formData[fieldName] = fieldValue;
    });




    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/section-data/update",
        data: JSON.stringify(formData),
        contentType: "application/json",
        success: function(response) {
            loader(false);


            toastr.success("Data Updated successfully");
            $('.modal').modal('hide');
            fetch_all_data();

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

function _delete_csv_data(id, table_name) {
    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "POST",
        url: "{{config('app.api_url')}}/api/section-data/delete", // Adjust the URL as needed
        data: {
            id: id,
            table_name: table_name
        },
        success: function(response) {

            toastr.success(response.message);
            fetch_all_data();
        },
        error: function(response) {
            toastr.error("Error deleting row");
        }
    });
}

function capitalizeFirstLetter(text) {
    text = text.replace(/_/g, ' ');
    return text.charAt(0).toUpperCase() + text.slice(1);
}

function add_data(_this, ids) {
    loader(true);


    $.ajax({
        headers: {
            "Accept": "application/json",
            "Authorization": `Bearer ${getCookie('BearerToken')}`,
        },
        type: "GET",
        url: `{{config('app.api_url')}}/api/module-managers/${getParams('m_id')}`,
        success: function(response) {


            console.log(_this,';;,')
            var fields = response.data.module_manager.module_manager_meta;

            var html_field = ``;


            for (i = 0; i < fields.length; i++) {
                html_field += `<div class="mb-3" >`
                html_field += `<label class="mb-1" style="text-transform:capitalize;">${fields[i]['option'].replace(/_/g, ' ')}</label>`;
                html_field += create_field_html(fields[i]);
                html_field += `</div>`;
            }
            html_field += `
        <input type="hidden" name="table_name" value="${getParams('tb')}" />
        <input type="hidden" name="user__id" value="${getCookie('user_id')}" />
        <input type="hidden" name="show__to" value="" />
        <input type="hidden" name="module__id" value="${getParams('m_id')}" />
        <input type="hidden" name="del" value="0" />
        <input type="hidden" name="_Verify_" value="0" />
        <input type="hidden" name="hide__or__show" value="1" />
        <button type="submit" class="btn btn-primary" onclick="submitData(event)">Save</button>`;

            $('.append_fields').html(html_field);

            var html_fields = ``;
            for (i = 0; i < fields.length; i++) {
                html_fields += `<div class="mb-3" >`
                html_fields += `<label class="mb-1" style="text-transform:capitalize;">${fields[i]['option'].replace(/_/g, ' ')}</label>`;
                html_fields += create_field_html(fields[i],fields[i]['store_value']);
                html_fields += `</div>`;
            }





            html_fields += `

        <input type="hidden" name="table_name" value="${getParams('tb')}" />
        <input type="hidden" name="id" class="edit_id" value="${_this}" />
        <input type="hidden" name="show__to" value="" />
        <input type="hidden" name="module__id" value="${getParams('m_id')}" />
        <input type="hidden" name="del" value="0" />
        <input type="hidden" name="_Verify_" value="0" />
        <input type="hidden" name="hide__or__show" value="1" />
        <button type="submit" class="btn btn-primary" onclick="editData(event)">Send</button>`;



            $('.append_field').html(html_fields);




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
                toastr.error("Something went wrong")
            } else {
                toastr.error(response.responseJSON.message)
            }
        }
    });

}

</script>

<style>
thead th , tfoot th {
    text-transform: capitalize !important;
}
</style>
@include('UserPanel.Includes.footer')
