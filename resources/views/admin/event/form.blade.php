@extends('admin.maintemplate.maintemplate')



@section('content')

<style>
     .form-switch {
            padding-left: 2.5em;
        }
</style>

 <!--=========================*
               Main Section
       *===========================-->
       <div class="vz_main_container">
        <div class="vz_main_content">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.maintemplate.form_alert')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card_title">{{ ucwords('Add '.$menuNames['event_' . $company_id] ??  $title )}}</h4>
                            <form id="event_form"
                                action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}"
                                method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @if (isset($event))
                                    @method('PUT')
                                @endif
                                <div class="form-row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom01">Name: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" required value="{{ old('name', $event->name ?? '') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom01">Description: </label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            placeholder="Description" required value="{{ old('description', $event->description ?? '') }}">
                                    </div>


                                    @if(auth()->user()->role == 'super-admin')

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom02">Company: <span class="text-danger">*</span></label>
                                        <select id="company_id" name="company_id" class="form-select datatable-input"  {{ isset($event->company_id) ? 'disabled' : '' }}
                                            required>
                                            <option value="">- Select Company -</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ old('company_id', $event->company_id ?? '') == $company->id ? 'selected' : '' }}>
                                                    {{ ucwords($company->company_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom01">Sequence No: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="sequence_number" name="sequence_number"
                                            placeholder="Sequence Number" required value="{{ old('sequence_number', $event->sequence_number ?? '') }}">
                                    </div>

                                   


                                    <div class="col-md-2">
                                        <label class="form-label" for="status">Status: </label>
                                        <div class="form-check form-switch">
                                            <!-- Hidden field to handle unchecked status -->
                                            <input type="hidden" name="status" value="0">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" value="1"
                                                {{ old('status', $event->status ?? 1) == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    


                                </div>

                                <div class="form-row mb-3">
                                    <div class="col-md-12 mb-3">
                                        <label for="color">Select a Color: <span class="text-danger">*</span></label>
                                        <div class="d-flex flex-wrap">
                                            <div class="form-check me-2">
                                                <input type="radio" class="form-check-input" id="colorPrimary" name="color" value="bg-success"
                                                    {{ old('color', $event->color ?? '') == 'bg-success' ? 'checked' : '' }}>
                                                <label class="external-event bg-success ui-draggable ui-draggable-handle" for="colorPrimary">Success</label>
                                            </div>
                                            <div class="form-check me-2">
                                                <input type="radio" class="form-check-input" id="colorSecondary" name="color" value="bg-warning"
                                                    {{ old('color', $event->color ?? '') == 'bg-warning' ? 'checked' : '' }}>
                                                <label class="external-event bg-warning ui-draggable ui-draggable-handle" for="colorSecondary">Warning</label>
                                            </div>
                                            <div class="form-check me-2">
                                                <input type="radio" class="form-check-input" id="colorSuccess" name="color" value="bg-info"
                                                    {{ old('color', $event->color ?? '') == 'bg-info' ? 'checked' : '' }}>
                                                <label class="external-event bg-info ui-draggable ui-draggable-handle" for="colorSuccess">Info</label>
                                            </div>
                                            <div class="form-check me-2">
                                                <input type="radio" class="form-check-input" id="colorDanger" name="color" value="bg-primary"
                                                    {{ old('color', $event->color ?? '') == 'bg-primary' ? 'checked' : '' }}>
                                                <label class="external-event bg-primary ui-draggable ui-draggable-handle" for="colorDanger">Primary</label>
                                            </div>
                                            <div class="form-check me-2">
                                                <input type="radio" class="form-check-input" id="colorInfo" name="color" value="bg-danger"
                                                    {{ old('color', $event->color ?? '') == 'bg-danger' ? 'checked' : '' }}>
                                                <label class="external-event bg-danger ui-draggable ui-draggable-handle" for="colorInfo">Danger</label>
                                            </div>
                                           
                                        </div>
                                    </div>


                                    </div>
                               





                                <button class="btn btn-primary ladda-button ladda_btn" data-style="zoom-out"
                                    type="submit">
                                    <span class="ladda-label">Submit form</span>
                                </button>
                            </form>



                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--=========================*
                    Footer
       *===========================-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2025. All right reserved. Followup.</p>
            </div>
        </footer>
        <!--=========================*
                End Footer
       *===========================-->
    </div>
    <!--=========================*
            End Main Section
    *===========================-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
          $(document).ready(function() {


    $.validator.addMethod("safeInput", function(value, element) {
        return /^[a-zA-Z\s]+$/.test(value);
    }, "Invalid characters in name");

    $.validator.addMethod("notEmpty", function(value, element) {
        return $.trim(value).length > 0;
    }, "This field cannot contain only spaces");

    $("#event_form").validate({
        rules: {
            name: {
                required: true,
                safeInput: true,
                maxlength: 15,
                notEmpty: true 
            },
            description:{
                required: true,
                safeInput: true,
                maxlength: 15,
                notEmpty: true 
            },
            sequence_number:{
                required: true,
            }

        },
        messages: {
            name: {
                required: "Please enter a name",
                maxlength: "Name cannot be more than 15 characters long",
                safeInput: "Invalid characters in name",
                notEmpty: "Name cannot contain only spaces"
            },
            description:{
                required: "Please enter a description",
                maxlength: "description cannot be more than 15 characters long",
                safeInput: "Invalid characters in description",
                notEmpty: "description cannot contain only spaces"
            },
            sequence_number:{
                required: "Please enter a sequence number",
                maxlength: "sequence number cannot be more than 15 characters long",
            }


        },
        errorClass: "invalid-feedback",
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function(form) {
            var button = $(".ladda_btn");
            var ladda = Ladda.create(button[0]);
            ladda.start();

            form.submit();

            setTimeout(function() {
                ladda.stop();
            }, 3000);
        },

        onkeyup: function(element) {
            $(element).valid();
        },
        oninput: function(element) {
            $(element).valid();
        },
        focusInvalid: true
    });
});
    </script>

@endsection
