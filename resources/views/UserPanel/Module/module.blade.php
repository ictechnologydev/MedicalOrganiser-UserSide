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

    .select2.select2-container.select2-container--default {
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

    function edit_field_html(field, login_user, parentFieldName = null) {
        var html_field = ``;
        var value = '';

        // Determine the value to be used for pre-selecting options
        if (field['child_store_value'] && field['child_store_value']['value']) {
            value = String(field['child_store_value']['value']).trim();
        } else if (field['value']) {
            value = String(field['value']).trim();
        } else if (field['store_value']) {
            value = String(field['store_value']).trim();
        }
        console.log(value);
        if (field['store_value']) {
            selected_value = String(field['store_value']).trim();
        } else if (field['child_store_value'] && field['child_store_value']['value']) {
            selected_value = String(field['child_store_value']['value']).trim();
        }

        // Construct the field name, considering parent field if applicable
        var fieldName = parentFieldName ? `${parentFieldName}-${field['option']}` : field['option'];

        if (field['type'] === 'text') {
            html_field += `
            <input type="text" class="form-control" id="${fieldName}" name="${fieldName}" value="${value}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        if (field['type'] === 'number') {
            html_field += `
            <input type="number" class="form-control" id="${fieldName}" name="${fieldName}" value="${value}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        if (field['type'] === 'email') {
            html_field += `
            <input type="email" class="form-control" id="${fieldName}" name="${fieldName}" value="${value}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        if (field['type'] === 'image') {
            html_field += `
            <input type="file" class="form-control" id="${fieldName}" name="${fieldName}" value="${value}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        if (field['type'] === 'datepicker') {
            html_field += `
            <input type="date" class="form-control" id="${fieldName}" name="${fieldName}" value="${value ? convertDateFormat(value) : getCurrentDate()}" placeholder="${capitalizeFirstLetter(field['option'])}">
        `;
        }
        if (field['type'] === 'radio') {
            field['comma_separated_values'].forEach((item, i) => {
                var optionValue = String(item['value']).trim();
                var optionLabel = item['label'] ? String(item['label']).trim().replace(/_/g, ' ') : '';

                // Determine if this radio button should be checked
                var isChecked = (selected_value === optionValue) || (i === 0 && !selected_value);

                html_field += `
            <div class="form-check">
                <input class="form-check-input" type="radio" id="${fieldName}-${item['value']}" name="${fieldName}" value="${optionValue}" ${isChecked ? 'checked' : ''}>
                <label class="form-check-label" for="${fieldName}-${item['value']}" style="text-transform: capitalize;">${optionLabel}</label>
            </div>
        `;
            });
        }

        if (field['type'] === 'checkbox') {
            var selectedValues = [];

            // Determine the value to be used for pre-selecting options
            if (field['child_store_value'] && field['child_store_value']['value']) {
                selectedValues = field['child_store_value']['value'].split(',').map(v => v.trim());
            } else if (field['store_value']) {
                selectedValues = field['store_value'].split(',').map(v => v.trim());
            }
            var value_list = field['comma_separated_values'];
            value_list.forEach(item => {
                var optionValue = String(item['value']).trim();
                var optionLabel = item['label'] ? String(item['label']).trim().replace(/_/g, ' ') : '';
                var isChecked = selectedValues.includes(optionValue); // Check against the selected values

                html_field += `
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="${fieldName}[]" value="${optionValue}" ${isChecked ? 'checked' : ''}>
                <label class="form-check-label" style="text-transform: capitalize;">${optionLabel}</label>
            </div>
            `;
            });
        }

        if (field['type'] === 'dropdown') {
            var value_list = field['comma_separated_values'];

            html_field += `
            <select class="form-control" id="${fieldName}" name="${fieldName}" ${field['option'] === 'medication' ? 'onchange="medicationOnChange()"' : ''}>
                <option value="">Select value</option>
        `;

            value_list.forEach(item => {
                var optionValue = String(item['value']).trim();
                var optionLabel = item['label'] ? String(item['label']).trim().replace(/_/g, ' ') : '';

                // Determine if this option should be selected
                var isSelected = false;
                if (field['child_store_value'] && field['child_store_value']['value']) {
                    // For child dropdowns, compare with 'value'
                    isSelected = value === optionValue;
                } else {
                    // For main dropdowns, compare with 'label'
                    isSelected = value === optionLabel;
                }

                html_field += `
                <option value="${optionValue}" ${isSelected ? 'selected' : ''}>${optionLabel}</option>
            `;
            });

            html_field += `</select>`;
        }

        if (field['type'] === 'multi_layer_inline_dropdown') {
            var value_list = field['comma_separated_values'];

            html_field += `
            <select class="form-control" style="text-transform: capitalize;" id="${fieldName}" name="${fieldName}">
                <option value="">Select value</option>
        `;

            value_list.forEach(item => {
                var optionValue = String(item['value']).trim();
                var optionLabel = item['label'] ? String(item['label']).trim().replace(/_/g, ' ') : '';

                var isSelected = value === optionLabel;

                html_field += `
                <option value="${optionValue}" ${isSelected ? 'selected' : ''}>${optionLabel}</option>
            `;
            });

            html_field += `</select>`;
        }

        if (field['type'] === 'multiselect') {
            var value_list = field['comma_separated_values'];
            var selectedValues = field['child_store_value'] && field['child_store_value']['value'] ?
                field['child_store_value']['value'].split(',').map(v => v.trim()) // Handle child selected values
                :
                field['store_value'] ? field['store_value'].split(',').map(v => v.trim()) : [];

            html_field += `
    <select class="form-control" id="${fieldName}" name="${fieldName}[]" data-placeholder="Please select values" multiple>
        <option value="">Select value</option>
    `;

            value_list.forEach(item => {
                var optionValue = String(item['value']).trim();
                var optionLabel = item['label'] ? String(item['label']).trim() : '';

                // Check if this option is part of the selected values
                var isSelected = selectedValues.includes(optionValue);

                html_field += `
        <option value="${optionValue}" ${isSelected ? 'selected' : ''}>${optionLabel}</option>
    `;
            });

            html_field += `</select>`;
        }


        if (field['type'] === 'multi_label_dropdown') {
            var value_list = field['comma_separated_values'];

            html_field += `
        <select class="form-control" style="text-transform: capitalize;" id="${fieldName}" name="${fieldName}">
            <option value="">Select value</option>
    `;

            value_list.forEach(item => {
                var optionValue = String(item['value']).trim(); // Correct value to be used
                var optionLabel = item['label'] ? String(item['label']).trim().replace(/_/g, ' ') : '';

                // Determine if this option should be selected
                var isSelected = value === optionValue; // Compare value with optionValue for main dropdown

                html_field += `
            <option value="${optionValue}" ${isSelected ? 'selected' : ''}>${optionLabel}</option>
        `;
            });

            html_field += `</select>`;
        }

        if (field['type'] === 'textarea') {
            html_field += `
            <textarea class="form-control" id="${fieldName}" name="${fieldName}" placeholder="${capitalizeFirstLetter(field['option'])}">${value}</textarea>
        `;
        }

        return html_field;
    }


    function create_field_html(field, login_user, parentFieldName = null) {
        var html_field = ``;
        var value = '';
        if (field['value']) {
            value = field['value'];
        } else if (field['store_value']) {
            value = field['store_value'];
        } else if (field['store_values'] && field['store_values'].length > 0) {
            value = field['store_values'][0]['value'];
        }
        // Ensure we concatenate parent field name and current field's option only if parentFieldName is provided
        var fieldName = parentFieldName ? `${parentFieldName}-${field['option']}` : field['option'];

        if (field['type'] == 'text') {
            html_field += `
            <input type="text" class="form-control" id="${fieldName}" name="${fieldName}" value="${ value }" placeholder="${capitalizeFirstLetter(field['option'])}">
            `;
        }
        if (field['type'] == 'number') {
            html_field += `
            <input type="number" class="form-control" id="${fieldName}" name="${fieldName}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
            `;
        }
        if (field['type'] == 'email') {
            html_field += `
            <input type="email" class="form-control" id="${fieldName}" name="${fieldName}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
            `;
        }
        if (field['type'] == 'image') {
            html_field += `
            <input type="file" class="form-control" id="${fieldName}" name="${fieldName}" value="${ field['store_value'] ? field['store_value'] : ''}" placeholder="${capitalizeFirstLetter(field['option'])}">
            `;
        }
        if (field['type'] == 'datepicker') {
            html_field += `
            <input type="date" class="form-control" id="${fieldName}" name="${fieldName}" value="${ field['store_value'] ? convertDateFormat(field['store_value']) : getCurrentDate()}" placeholder="${capitalizeFirstLetter(field['option'])}">
            `;
        }
        if (field['type'] == 'radio') {
            var value_list = field['comma_separated_values'];

            for (var i = 0; i < value_list.length; i++) {
                html_field += `
        <div class="form-check">
            <input class="form-check-input" type="radio" name="${fieldName}" value="${String(value_list[i]['value']).trim()}" ${ field['store_value'] == value_list[i]['label'].trim() ? 'checked' : i == 0 ? 'checked' : '' }>
            <label class="form-check-label" style="text-transform: capitalize;">${value_list[i]['label'] ? String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</label>
        </div>
        `;
            }
        }

        if (field['type'] == 'checkbox') {
            var value_list = field['comma_separated_values'];

            for (var i = 0; i < value_list.length; i++) {
                html_field += `
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="${fieldName}" value="${String(value_list[i]['value']).trim()}" ${ field['store_value'] && field['store_value'].includes(value_list[i]['label'].trim()) ? 'checked' : '' }>
            <label class="form-check-label" style="text-transform: capitalize;">${value_list[i]['label'] ? String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</label>
        </div>
        `;
            }
        }

        if (field['type'] == 'checkbox') {
            var value_list = field['comma_separated_values'];
            var selected_values = field['store_value'] ? field['store_value'].split(',') : [];

            for (var i = 0; i < value_list.length; i++) {
                var isChecked = selected_values.includes(String(value_list[i]['value']).trim());
                html_field += `
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="${fieldName}" value="${String(value_list[i]['value']).trim()}" ${isChecked ? 'checked' : ''}>
                <label class="form-check-label" style="text-transform: capitalize;">${value_list[i]['label'] ? String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</label>
            </div>
        `;
            }
        }


        if (field['type'] == 'dropdown') {
            var value_list = field['comma_separated_values'];

            html_field +=
                `<select class="form-control" id="${fieldName}" ${field['option'] === 'medication' ? 'onchange="medicationOnChange()"' : ''} name="${fieldName}">`;

            // Add default "Select value" option
            html_field +=
                `<option value="">Select value</option>`;

            for (var i = 0; i < value_list.length; i++) {
                var isSelected = field['store_value'] && field['store_value'].trim() === value_list[i]['label'].trim();
                html_field +=
                    `<option value="${String(value_list[i]['value']).trim()}" ${isSelected ? 'selected' : ''}>${value_list[i]['label'] ? String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</option>`;
            }

            html_field += `</select>`;
        }
        if (field['type'] == 'multi_layer_inline_dropdown') {
            var value_list = field['comma_separated_values'];

            html_field +=
                `<select class="form-control" style="text-transform: capitalize;" id="${fieldName}" name="${fieldName}">`;

            // Add default "Select value" option
            html_field +=
                `<option value="">Select value</option>`;

            for (var i = 0; i < value_list.length; i++) {
                var isSelected = field['store_value'] && field['store_value'].trim() === value_list[i]['label'].trim();
                html_field +=
                    `<option value="${String(value_list[i]['value']).trim()}" ${isSelected ? 'selected' : ''}>${value_list[i]['label'] ? String(value_list[i]['label']).trim().replace(/_/g, ' ') : value_list[i]['label']}</option>`;
            }

            html_field += `</select>`;
        }
        if (field['type'] == 'multiselect') {
            var value_list = field['comma_separated_values'];

            html_field +=
                `<select class="form-control" id="${fieldName}" name="${fieldName}" data-placeholder="Please select values" multiple>`;

            // Add default "Select value" option
            html_field += `<option value="">Select value</option>`;

            for (var i = 0; i < value_list.length; i++) {
                var isChecked = field['store_value'] && field['store_value'].includes(value_list[i]['label'].trim());
                html_field +=
                    `<option value="${String(value_list[i]['value']).trim()}" ${isChecked ? 'selected' : ''}>${value_list[i]['label'].trim()}</option>`;
            }

            html_field += `</select>`;
        }
        if (field['type'] == 'multi_label_dropdown') {
            var value_list = field['comma_separated_values'];

            html_field +=
                `<select class="form-control" style="text-transform: capitalize;" id="${fieldName}" name="${fieldName}">`;

            // Add default "Select value" option
            html_field +=
                `<option value="">Select value</option>`;

            for (var i = 0; i < value_list.length; i++) {
                var isSelected = field['store_value'] && field['store_value'].trim() === value_list[i]['label'].trim();
                html_field +=
                    `<option value="${String(value_list[i]['value']).trim()}" ${isSelected ? 'selected' : ''}>${value_list[i]['label'].trim()}</option>`;
            }

            html_field += `</select>`;
        }
        if (field['type'] == 'textarea') {
            html_field += `
            <textarea class="form-control" id="${fieldName}" name="${fieldName}" placeholder="${capitalizeFirstLetter(field['option'])}">${ field['store_value'] ? field['store_value'] : ''}</textarea>
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
        console.log('submit');
        event.preventDefault();

        loader(true);

        var formData = {};

        // Collect data from Add form (off-canvas) if present
        $('.append_fields input, .append_fields select, .append_fields textarea').each(function() {
            var fieldName = $(this).attr('name');
            var fieldValue = $(this).val();

            if ($(this).attr('type') == 'checkbox') {
                // Initialize an array for checkbox values if it doesn't exist
                if (!formData[fieldName]) {
                    formData[fieldName] = [];
                }
                if ($(this).is(':checked')) {
                    formData[fieldName].push($(this).val()); // Push checked value to the array
                }
            } else
            if ($(this).attr('type') == 'radio') {
                if ($(this).is(':checked')) {
                    formData[fieldName] = fieldValue;
                }
            } else if ($(this).attr('type') == 'date') {
                formData[fieldName] = formatDate(fieldValue);
            } else {
                formData[fieldName] = fieldValue;
            }
        });

        // Collect data from Edit form (modal) if present
        $('.append_field input, .append_field select, .append_field textarea').each(function() {
            var fieldName = $(this).attr('name');
            var fieldValue = $(this).val();

            if ($(this).attr('type') == 'checkbox') {
                // Initialize an array for checkbox values if it doesn't exist
                if (!formData[fieldName]) {
                    formData[fieldName] = [];
                }
                if ($(this).is(':checked')) {
                    formData[fieldName].push($(this).val()); // Push checked value to the array
                }
            } else if ($(this).attr('type') == 'date') {
                formData.set(fieldName, formatDate(fieldValue));
            } else {
                formData.set(fieldName, fieldValue);
            }
        });

        var apiUrl = "{{ config('app.api_url') }}/api/section-data/insert"; // Default for insert
        var editId = formData['id']; // Capture the id from the form

        // Check if `id` is explicitly "undefined" or missing (insert mode)
        if (editId && editId !== "undefined") {
            apiUrl = "{{ config('app.api_url') }}/api/section-data/update"; // Use update API if id is valid
        } else {
            delete formData['id']; // Remove the undefined id from formData for insert
        }

        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: apiUrl,
            data: JSON.stringify(formData),
            contentType: "application/json",
            success: function(response) {
                if ($('.edit_id').val()) {
                    toastr.success("Data updated successfully");
                } else {
                    toastr.success("Data inserted successfully");
                }

                // Close the modal or off-canvas
                if ($('.offcanvas').length) {
                    $('.offcanvas').offcanvas('hide');
                }
                if ($('.edit').length) {
                    $('#edit-model').modal('hide');
                }

                location.reload();
                fetch_all_data(getParams('m_id'), getParams('tb'), '0', '', getCookie('user_id'));
            },
            error: function(response) {
                loader(false);
                if (response.status == 422) {
                    var errors = response.responseJSON.data;
                    $.each(errors, function(field, messages) {
                        toastr.error(messages[0]);
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

        // alart('fsda');
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

        // Use FormData to handle both files and regular inputs
        var formData = new FormData();

        // Collect data from Edit form (modal)
        $('.append_field input, .append_field select, .append_field textarea').each(function() {
            var fieldName = $(this).attr('name');
            var fieldValue = $(this).val();
            if (fieldName) {
                if ($(this).attr('type') == 'checkbox') {
                    // Initialize an array for checkbox values if it doesn't exist
                    if (!formData.has(fieldName)) {
                        formData.append(fieldName, []); // Initialize as an array
                    }
                    if ($(this).is(':checked')) {
                        formData.append(fieldName, $(this).val()); // Append checked value to the array
                    }
                } else if ($(this).attr('type') == 'radio') {
                    if ($(this).is(':checked')) {
                        formData.set(fieldName, fieldValue);
                    }
                } else if ($(this).attr('type') == 'date') {
                    formData.set(fieldName, formatDate(fieldValue));
                } else if ($(this).attr('type') == 'file') {
                    // Handle file inputs
                    if ($(this)[0].files.length > 0) {
                        console.log('File being added in edit form:', $(this)[0].files[0]);
                        formData.append(fieldName, $(this)[0].files[0]); // Append the actual file to FormData
                    }
                } else {
                    formData.set(fieldName, fieldValue);
                }
            } else {
                console.warn('A form element is missing the name attribute and was skipped:', this);
            }
        });

        console.log('Edit Form Data:', formData); // Debugging

        $.ajax({
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${getCookie('BearerToken')}`,
            },
            type: "POST",
            url: "{{ config('app.api_url') }}/api/section-data/update",
            data: formData,
            processData: false, // Important to prevent jQuery from automatically processing the data
            contentType: false, // Important to prevent jQuery from automatically setting the content type
            success: function(response) {
                loader(false);
                toastr.success(response.message);
                $('.modal').modal('hide');

                fetch_all_data(getParams('m_id'), getParams('tb'), '0', '', getCookie('user_id'));
            },
            error: function(response) {
                loader(false);
                if (response.status == 422) {
                    var errors = response.responseJSON.data;
                    $.each(errors, function(field, messages) {
                        var error_msg = messages[0];
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


    function medicationOnChange() {

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
        // Show loaders
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

                // Loop through the fields
                for (let i = 0; i < fields.length; i++) {
                    if (fields[i]['type'] == 'multi_layer_inline_dropdown' && __check == 0) {
                        html_field += `<div class="d-flex">`;
                        __check = 1;
                        __div = 1;
                    }

                    if (fields[i]['type'] != 'multi_layer_inline_dropdown' && __div == 1) {
                        html_field += `</div>`;
                        __check = 0;
                        __div = 0;
                    }

                    // Main field creation
                    html_field +=
                        `<div class="mb-3 ${fields[i]['type'] == 'multi_layer_inline_dropdown' ? 'col-md-4 col-sm-4 me-1 d-none showAtChange' : ''}">`;
                    html_field +=
                        `<label class="mb-1" style="text-transform:capitalize;">${fields[i]['option'].replace(/_/g, ' ')}</label>`;

                    // Main field HTML
                    html_field += create_field_html(fields[i], login_user);

                    // Handle dependent fields (module_meta_dependencies)
                    if (fields[i].module_meta_dependencies && fields[i].module_meta_dependencies.length >
                        0) {
                        for (let dep = 0; dep < fields[i].module_meta_dependencies.length; dep++) {
                            let dependencyField = fields[i].module_meta_dependencies[dep];
                            let dependencyFieldNameWithTable =
                                `${fields[i].option}_${dependencyField.option}`;

                            // Initially hide dependent fields with selected_values
                            let hideClass = dependencyField.selected_values && dependencyField
                                .selected_values.length > 0 ? 'd-none' : '';

                            html_field +=
                                `<div class="mb-3 dependent-field ${hideClass}" data-parent="${fields[i]['option']}" data-selected-values='${JSON.stringify(dependencyField.selected_values)}'>`;
                            html_field +=
                                `<label class="mb-1" style="text-transform:capitalize;">${dependencyField.option.replace(/_/g, ' ')}</label>`;

                            // Add the dependent field HTML
                            html_field += create_field_html(dependencyField, login_user, fields[i].option);

                            html_field += `</div>`;
                        }
                    }

                    html_field += `</div>`;
                }
                var editfields = _this;


                var html_fields = '';
                var __check = 0;
                var __div = 0;
                for (var i = 0; i < editfields.length; i++) {
                    if (editfields[i]['type'] == 'multi_layer_inline_dropdown' && __check == 0) {
                        html_fields += `<div class="d-flex">`;
                        __check = 1;
                        __div = 1;
                    }
                    if (editfields[i]['type'] != 'multi_layer_inline_dropdown' && __div == 1) {
                        html_fields += `</div>`;
                        __check = 0;
                        __div = 0;
                    }
                    html_fields +=
                        `<div class="mb-3 ${editfields[i]['type'] == 'multi_layer_inline_dropdown' ? 'col-md-4 col-sm-4 me-1' : ''}">`;
                    html_fields +=
                        `<label class="mb-1" style="text-transform:capitalize;">${editfields[i]['option'].replace(/_/g, ' ')}</label>`;
                    html_fields += edit_field_html(editfields[i], login_user);

                    // Handle child fields
                    if (editfields[i]['module_meta_dependencies'] && editfields[i][
                            'module_meta_dependencies'
                        ].length > 0) {
                        for (var j = 0; j < editfields[i]['module_meta_dependencies'].length; j++) {
                            var childField = editfields[i]['module_meta_dependencies'][j];
                            html_fields += `<div class="mb-3">`;
                            html_fields +=
                                `<label class="mb-1" style="text-transform:capitalize;">${childField['option'].replace(/_/g, ' ')}</label>`;
                            html_fields += edit_field_html(childField, login_user, editfields[i].option);
                            html_fields += `</div>`;
                        }
                    }

                    html_fields += `</div>`;
                }
                console.log(html_fields);


                // Add hidden fields for the form
                html_field += `
                <input type="hidden" name="table_name" value="${getParams('tb')}" />
                <input type="hidden" name="id" class="edit_id" value="${id}" />
                <input type="hidden" name="user__id" value="${getCookie('user_id')}" />
                <input type="hidden" name="module__id" value="${getParams('m_id')}" />
                <input type="hidden" name="del" value="0" />
                <input type="hidden" name="_Verify_" value="0" />
                <input type="hidden" name="hide__or__show" value="1" />
                <button type="submit" class="btn btn-primary" onclick="submitData(event)">Save</button>`;
                html_fields += `
                <input type="hidden" name="table_name" value="${getParams('tb')}" />
                <input type="hidden" name="id" class="edit_id" value="${id}" />
                <input type="hidden" name="user__id" value="${getCookie('user_id')}" />
                <input type="hidden" name="module__id" value="${getParams('m_id')}" />
                <input type="hidden" name="del" value="0" />
                <input type="hidden" name="_Verify_" value="0" />
                <input type="hidden" name="hide__or__show" value="1" />
                <button type="submit" class="btn btn-primary" onclick="submitData(event)">Save</button>`;

                // Handle Add or Edit case
                if (id) {
                    // Edit mode
                    $('.append_field').html(html_fields);
                    $('.append_field button').text('Update');
                    $('.append_field button').attr('onclick', 'editData(event)');
                } else {
                    // Add mode
                    $('.append_fields').html(html_field);
                }

                // Initialize select2 dropdowns after rendering
                if (!id) {
                    $('.offcanvas select').select2({
                        dropdownParent: $('.offcanvas')
                    });
                } else {
                    $('.edit select').select2({
                        dropdownParent: $('.edit')
                    });
                }

                // Hide loaders after appending fields
                $('.threeDotLoder-edit').hide();
                $('.threeDotLoder').hide();

                // Handle the visibility of dependent fields based on the selection
                handleFieldVisibility();
            },
            error: function(response) {
                loader(false);
                if (response.status == 422) {
                    var errors = response.responseJSON.data;
                    $.each(errors, function(field, messages) {
                        toastr.error(messages[0]);
                    });
                } else if (response.status == 500) {
                    toastr.error("Something went wrong");
                } else {
                    toastr.error(response.responseJSON.message);
                }
            }
        });
    }

    function getCurrentDate() {
        let today = new Date();
        let day = String(today.getDate()).padStart(2, '0');
        let month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        let year = today.getFullYear();

        return `${year}-${month}-${day}`;
    }

    // Function to handle showing/hiding of dependent fields
    function handleFieldVisibility() {
        // Listen for changes on both select and checkbox inputs
        $('select, input[type="checkbox"]').on('change', function() {
            var selectedValues = [];

            if ($(this).is('select')) {
                selectedValues = $(this).val(); // Get selected values (for multi-select, it's an array)
            } else if ($(this).is('input[type="checkbox"]')) {
                // Collect checked values if it's a checkbox
                $('input[name="' + $(this).attr('name') + '"]:checked').each(function() {
                    selectedValues.push($(this).val());
                });
            }

            var parentField = $(this).attr('name');
            console.log(selectedValues, 'selectedValues');
            console.log(parentField, 'parentField');

            if (!Array.isArray(selectedValues)) {
                // Convert single select value to an array for consistency
                selectedValues = [selectedValues];
            }

            // Loop through dependent fields and show/hide based on selected values
            $('.dependent-field').each(function() {
                var parent = $(this).data('parent');
                var selectedValuesForChild = $(this).data(
                    'selected-values'); // selected_values for the child
                console.log(selectedValuesForChild, 'child');
                console.log(parent, 'parent');

                if (parent === parentField) {
                    if (selectedValuesForChild && selectedValuesForChild.length > 0) {
                        // Iterate through selected values and compare them with child values
                        var shouldShow = selectedValues.some(function(val) {
                            return selectedValuesForChild.some(function(childVal) {
                                // Compare by string conversion to handle alphanumeric values
                                return String(childVal.value).trim().toLowerCase() ===
                                    String(val).trim().toLowerCase();
                            });
                        });

                        if (shouldShow) {
                            $(this).removeClass('d-none'); // Show child field if match found
                        } else {
                            $(this).addClass('d-none'); // Hide if no match found
                        }
                    } else {
                        // If no selected values for child, show the field by default
                        $(this).removeClass('d-none');
                    }
                }
            });
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
