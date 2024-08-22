@include('UserPanel.Includes.header')

<style>
    .disabled_style {
        border-color: transparent;
        background: transparent;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    @media (max-width: 1730px) {
        #slider {
            display: block;
        }
    }

    .table-welcome-note-container {
        border: 2px solid #02b2b0;
        border-radius: 10px;
        padding: 10px;
    }

    #slider {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: none;
        padding: 10px;
        box-shadow: none;
    }

    #required_col {
        display: none;
    }

    .d-flex.mb-3 {
        width: 25% !important;
    }
    .select2.select2-container.select2-container--default{
        padding: 0px !important;
        height: auto !important;
    }
</style>
<div>
    <div class="container-fluid p-3 main-container-content">
        @include('UserPanel.Includes.nav')
        <style>
            .head {
                display: flex;
                justify-content: space-between;
            }
        </style>

        <div class="welcome-note-container p-2 d-flex justify-content-end">
            <div class="h6 mt-1 mb-0">
                <button class="btn btn-primary" type="button" class=" offcanvas" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" onclick="add_data(this);">
                    Add <small id="add_module"></small></button>
                <span class="text-secondary">|</span> <button type="button"
                    onclick="window.location.href=`{{ url('/module/hide') }}/${getParams('m_id')}?tb=${getParams('tb')}+&name=${getParams('name')}&m_id=${getParams('m_id')}`"
                    class="btn btn-primary" id="moduleSettings"> <i class="fa fa-eye" aria-hidden="true"></i> </button>
            </div>
        </div>
        <div style="overflow-x:auto"class="table-welcome-note-container append_html table_container ">

            <table id="module_table_id" class="display" style="width:100%">
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
        <style>
            @media (max-width: 768px) and (min-width:700px) {
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

            @media (max-width: 375px) and (min-width:320px) {
                #moduleSettings {
                    margin-top: 10px;
                }
            }
        </style>
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
            <img src="{{ url('/') }}/threeDotLoder.gif" class="threeDotLoder" width="100" height="100"
                style="margin-left:40%;">
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
                    <p>Heart Beat is not Normal, heavy chest pain, uncontrolled blood presure, the viscosity of the
                        blood is very high</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade edit" id="edit-model" tabindex="-1" aria-labelledby="reason-modelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="reason-modelLabel">Edit <small id="edit_module"></small></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit_modal">
                    <img src="{{ url('/') }}/threeDotLoder.gif" class="threeDotLoder-edit" width="100"
                        height="100" style="margin-left:40%;">
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
                    <p>Heart Beat is not Normal, heavy chest pain, uncontrolled blood presure, the viscosity of the
                        blood is very high</p>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="verifyByModal" tabindex="-1" aria-labelledby="verifyByModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifyByModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row ">
                        <div class="col-12  verifyBy_html">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    #csv_tbody tr td img {
        height: 30px;
        width: 30px;
    }
</style>
@include('UserPanel.Includes.script')


<script>
    function name() {
        $('.name').on('click')
    }

    function moveToTrash(id) {

        var trashedData = fetchTrashedData();


        populateTrashedTable(trashedData);
    }



    function fetch_all_data(module_id, table_name, from, filter, user_id) {
        $('#module_id_field').val(module_id);
        $('#table_name_field').val(table_name);

        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{ config('app.api_url') }}/api/section-data/fatch-for-web",
            data: {
                user_id: user_id,
                module_id: module_id,
                table_name: table_name,
                from: from,
                filter: filter,
                hide_or_show: '1'
            },
            success: function(html) {
                $('.table_container').html(html);
                loader(false);
            },
            error: function(response) {
                if (response.status == 500) {
                    toastr.error("Something went wrong")
                }
                loader(false);
            }
        });

    }

    $(document).ready(function() {
        document.title = getParams('name') + " - {{ env('APP_NAME') }}";
        fetch_all_data(getParams('m_id'), getParams('tb'), '0', '', getCookie('user_id'))
    });

    function create_field_html(field, login_user) {
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
        <input type="date" class="form-control" id="${field['option']}" name="${field['option']}" value="${ field['store_value'] ? convertDateFormat(field['store_value']) : getCurrentDate()}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        } else
        if (field['type'] == 'radio') {
            value_list = field['comma_separated_values']

            for (var i = 0; i < value_list.length; i++) {

                html_field += `
        <div class="form-check">
        <input class="form-check-input" type="radio" name="${field['option']}" value="${String(value_list[i]['value']).trim()}" ${ field['store_value'] ? field['store_value'] : '' == value_list[i]['label'].trim() ? 'checked' : i=='0' ? 'checked' : '' } >
        <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i]['label'] ? String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</label>
        </div>
        `;
            }
        } else
        if (field['type'] == 'checkbox') {
            value_list = field['comma_separated_values']

            for (var i = 0; i < value_list.length; i++) {

                html_field += `
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="${field['option']}[]" value="${String(value_list[i]['value']).trim()}" ${ field['store_value'] ? field['store_value'] : '' == value_list[i]['label'].trim() ? 'checked' : '' }>
        <label class="form-check-label" style="text-transform: capitalize;" >${value_list[i]['label'] ? String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</label>
        </div>
        `;

            }
        } else
        if (field['type'] == 'dropdown') {
            value_list = field['comma_separated_values'];

            html_field += `<select class="form-control"  id="${field['option']}"  ${field['option'] === 'medication' ? 'onchange="medicationOnChange()"' : ''} name="${field['option']}">`;
            
            if(field['option'] == "by_whom" & login_user.role.name != "Patient")
            {
                html_field += `<option value=""  style="text-transform:capitalize;" > Selelct ${field['option'].replace(/_/g, ' ')}</option>`;
            }
            for (var i = 0; i < value_list.length; i++) {
                var str = value_list[i]['label'];
                var match = str.match(/\(([^)]+)\)/);  // Declare and initialize 'match' variable

                if (match && match[1]) {  // Check if 'match' is not null and 'match[1]' exists
                    var valueInsideParentheses = match[1];  // Safely extract the value inside the parentheses
                }
                
                if((login_user.role.name == "Patient") && (valueInsideParentheses == "patient@medicalorganiser.com") && (field['store_value'] === undefined)){
                    var isSelected = true;
                }else{
                    var isSelected = field['store_value'] && field['store_value'].trim() === value_list[i]['label'].trim();
                }
                html_field += `<option value="${String(value_list[i]['value']).trim()}" ${isSelected ? 'selected' : ''}>${value_list[i]['label'] ?  String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</option>`;
            }

            html_field += `</select>`;
        } 
        else
        if (field['type'] == 'multi_layer_inline_dropdown') {
            value_list = field['comma_separated_values'];



            html_field +=
                `<select class="form-control" style="text-transform: capitalize;" id="${field['option']}" name="${field['option']}">`;

            for (var i = 0; i < value_list.length; i++) {

                var isSelected = field['store_value'] && field['store_value'].trim() === value_list[i]['label'].trim();

                html_field +=
                    `<option value="${String(value_list[i]['value']).trim()}" ${isSelected ? 'selected' : ''}>${value_list[i]['label'] ? String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</option>`;
            }

            html_field += `</select>`;
        }
        
        else if (field['type'] == 'multiselect') {
            value_list = field['comma_separated_values'];

            // html_field += `<div class="form-group">`;
            html_field += `<select class="form-control" id="${field['option']}" name="${field['option']}" data-placeholder="Please  select values"  multiple>`;

            for (var i = 0; i < value_list.length; i++) {
                var isChecked = field['store_value'] && field['store_value'].includes(value_list[i]['label'].trim());

                html_field += `
        <option value="${String(value_list[i]['value']).trim()}" ${isChecked ? 'selected' : ''}>
            ${value_list[i]['label'].trim()}
        </option>`;
            }

            html_field += `</select>`;
            // html_field += `</div>`;
        } else
        if (field['type'] == 'multi_label_dropdown') {
            value_list = field['comma_separated_values'];



            html_field +=
                `<select class="form-control" style="text-transform: capitalize;" id="${field['option']}" name="${field['option']}">`;

            for (var i = 0; i < value_list.length; i++) {

                var isSelected = field['store_value'] && field['store_value'].trim() === value_list[i]['label'].trim();

                html_field +=
                    `<option value="${String(value_list[i]['value']).trim()}" ${isSelected ? 'selected' : ''}>${value_list[i]['label'].trim()}</option>`;
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
            url: "{{ config('app.api_url') }}/api/section-data/hide-or-show",
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

    function hide_or_show(id, table_name, hide_or_show) {

        loader(true);
        const formData = {
            id: id,
            table_name: table_name,
            hide__or__show: hide_or_show
        };

        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{ config('app.api_url') }}/api/section-data/hide-or-show",
            data: JSON.stringify(formData),

            contentType: "application/json",
            success: function(response) {

                toastr.success(response.message);

                fetch_all_data(getParams('m_id'), getParams('tb'), '0', '', getCookie('user_id'))

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

    function isDateField(fieldName) {
        return fieldName.toLowerCase().includes('date');
    }

    function formatDate(dateString) {
        const date = new Date(dateString);

        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();

        return `${day}-${month}-${year}`;
    }


    function updateNavWithMId(name) {

        document.getElementById('navMId').textContent = name;
    }

    updateNavWithMId(getParams('name'));

    function module_name(name) {

        document.getElementById('add_name').textContent = name;
        document.getElementById('add_module').textContent = name;
        document.getElementById('edit_module').textContent = name;
    }

    module_name(getParams('name'));

    function submitData(event) {

        event.preventDefault();

        loader(true);

        var formData = {};


        $('.append_fields input, .append_fields select, .append_fields textarea').each(function() {
            var fieldName = $(this).attr('name');
            var fieldValue = $(this).val();

            if ($(this).attr('type') == 'date') {
                formData[fieldName] = formatDate(fieldValue);
            } else {
                formData[fieldName] = fieldValue;
            }


        });


        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{ config('app.api_url') }}/api/section-data/insert",
            data: JSON.stringify(formData),

            contentType: "application/json",
            success: function(response) {

                toastr.success("Data inserted successfully");
                $('.offcanvas').offcanvas('hide');
                location.reload();
                fetch_all_data(getParams('m_id'), getParams('tb'), '0', '', getCookie('user_id'))

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


        //add_data(id);
        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{ config('app.api_url') }}/api/section-data/edit",
            data: {
                id: id,
                table_name: table_name,
                module_manager_id: module_manager_id
            },
            success: function(response) {

                //id = id;

                data = response.data.module_manager.module_manager_meta;
                
                add_data(data, id);

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

            if ($(this).attr('type') == 'date') {
                formData[fieldName] = formatDate(fieldValue);
            } else {
                formData[fieldName] = fieldValue;
            }
        });


        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{ config('app.api_url') }}/api/section-data/update",
            data: JSON.stringify(formData),
            contentType: "application/json",
            success: function(response) {
                loader(false);


                toastr.success(response.message);
                $('.modal').modal('hide');
                var rowIdToUpdate = formData.row_id;



                fetch_all_data(getParams('m_id'), getParams('tb'), '0', '', getCookie('user_id'))

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


    function medicationOnChange()
    {
        
        $(".showAtChange").removeClass("d-none")
    }

    function _delete_csv_data(id, table_name) {

        swal({
                title: "Delete",
                text: "Are you sure you want to delete this?",
                icon: "error",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    loader(true);

                    $.ajax({
                        headers: {
                            "Accept": "application/json",
                            "Authorization": `Bearer ${getCookie('BearerToken')}`,
                        },
                        type: "POST",
                        url: "{{ config('app.api_url') }}/api/section-data/delete",
                        data: {
                            id: id,
                            table_name: table_name
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            fetch_all_data(getParams('m_id'), getParams('tb'), '0', '', getCookie(
                                'user_id'));
                        },
                        error: function(response) {
                            toastr.error("something want wrong");
                        }
                    });


                }

            });




    }


    function capitalizeFirstLetter(text) {
        text = text.replace(/_/g, ' ');
        return text.charAt(0).toUpperCase() + text.slice(1);
    }

    function add_data(_this, id) {

        $('.threeDotLoder-edit').show();
        $('.threeDotLoder').show();
        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "GET",
            url: `{{ config('app.api_url') }}/api/module-managers/${getParams('m_id')}`,
            success: function(response) { 


                var fields = response.data.module_manager.module_manager_meta;
                var login_user = response.data.login_user;

                var html_field = ``;

                var __check = 0;
                var __div = 0;

                for (i = 0; i < fields.length; i++) {
                    
                if(fields[i]['type'] == 'multi_layer_inline_dropdown' && __check == 0)
                {
                    html_field += `<div class="d-flex" >`;
                    __check = 1;
                    __div = 1;
                }

                if(fields[i]['type'] != 'multi_layer_inline_dropdown' && __div == 1)
                    {
                        html_field += `</div>`;
                        __check = 0;
                        __div = 0;
                    }
                    html_field += `<div class="mb-3 ${fields[i]['type'] == 'multi_layer_inline_dropdown' ? 'col-md-4 col-sm-4 me-1 d-none showAtChange' : ''}  " >`;
                    html_field += `<label class="mb-1" style="text-transform:capitalize;">${fields[i]['option'].replace(/_/g, ' ')}</label>`;

                    if (fields[i]['option'] === 'schedule' && fields[i]['comma_separated_values']) {
                        let commaSeparatedValues = fields[i]['comma_separated_values'];
                        for (let j = 0; j < commaSeparatedValues.length; j++) {
                            // Construct the custom label
                            let customLabel =
                                `Schedule  :   ${commaSeparatedValues[j]['label'].replace(/_/g, ' ')}`;
                            // Update the label in the comma_separated_values object
                            commaSeparatedValues[j]['label'] = customLabel;
                        }
                    }

                    html_field += create_field_html(fields[i], login_user);
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

                var editfields = _this;


                var html_fields = ``;
                var __check = 0;
                var __div = 0;
                for (i = 0; i < editfields.length; i++) {
                    if(editfields[i]['type'] == 'multi_layer_inline_dropdown' && __check == 0)
                {
                    html_fields += `<div class="d-flex" >`;
                    __check = 1;
                    __div = 1;
                }

                if(editfields[i]['type'] != 'multi_layer_inline_dropdown' && __div == 1)
                    {
                        html_fields += `</div>`;
                        __check = 0;
                        __div = 0;
                    }
                    html_fields += `<div class="mb-3 ${editfields[i]['type'] == 'multi_layer_inline_dropdown' ? 'col-md-4 col-sm-4 me-1' : ''}" >`;
                    html_fields +=
                        `<label class="mb-1" style="text-transform:capitalize;">${editfields[i]['option'].replace(/_/g, ' ')}</label>`;
                    html_fields += create_field_html(editfields[i], login_user);
                    html_fields += `</div>`;
                }


                html_fields += `

        <input type="hidden" name="table_name" value="${getParams('tb')}" />
        <input type="hidden" name="id" class="edit_id" value="${id}" />
        <input type="hidden" name="show__to" value="" />
        <input type="hidden" name="module__id" value="${getParams('m_id')}" />
        <input type="hidden" name="del" value="0" />
        <input type="hidden" name="_Verify_" value="0" />
        <input type="hidden" name="hide__or__show" value="1" />
        <button type="submit" class="btn btn-primary" onclick="editData(event)">Update</button>`;
                $('.append_field').html(html_fields);
                if (!id) {
                    $('.offcanvas select').select2({
                        dropdownParent: $('.offcanvas')
                    });
                } else {
                    $('.edit select').select2({
                        dropdownParent: $('.edit')
                    });
                }


                loader(false);

                $('.threeDotLoder-edit').hide();
                $('.threeDotLoder').hide();





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


    function verify_by(user_id) {
        loader(true);

        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "GET",
            url: "{{ config('app.api_url') }}/api/users/" + user_id,
            success: function(response) {


                var html = `<h4 class="text-center">Verify By </h4>
              <br/>
                <p><b>email: </b> ${response.data.user.email}</p>
                <p><b>id: </b> ${response.data.user.id}</p>
                `;
                $('.verifyBy_html').html(html);
                loader(false);
            },
            error: function(response) {
                loader(false);
                toastr.error("something want wrong");
            }
        });
    }


    function convertDateFormat(inputDate) {
        const date = inputDate.split('-');
        return `${date[2]}-${date[1]}-${date[0]}`;
    }

    function convertTo24Time(time12) {
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
</script>

<style>
    thead th,
    tfoot th {
        text-transform: capitalize !important;
    }
    .select2.select2-container.select2-container--default {
        text-transform: lowercase !important;
    }
</style>
@include('UserPanel.Includes.footer')
