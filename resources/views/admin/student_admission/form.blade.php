@extends('admin.maintemplate.maintemplate')



@section('content')


<style>
     /* Remove the spinner from number input */
     input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            /* Firefox */
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
                            <h4 class="card_title">{{ucwords( 'Add '.$menuNames['admission_' . $company_id] ?? $title )}}</h4>
                            <form id="follow_up_form"
                                action="{{ isset($student) ? route('admission.update', $student->id) : route('admission.store') }}"
                                method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                @if (isset($student))
                                    @method('PUT')
                                @endif
                                <div class="form-row mb-3">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Full Name: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" required value="{{ old('name', $student->name ?? '') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Email: <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" required value="{{ old('email', $student->email ?? '') }}">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Mobile: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="mobile" name="mobile"
                                            placeholder="Mobile" required
                                            value="{{ old('mobile', $student->mobile ?? '') }}">
                                    </div>


                                </div>

                                <div class="form-row mb-3">

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Parents / Guardian Contact No: <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="parents_mobile" name="parents_mobile"
                                            placeholder="Contact No" required
                                            value="{{ old('parents_mobile', $student->parents_mobile ?? '') }}">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Qualification: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="qualification" name="qualification"
                                            placeholder="MCA 2016 - 2019" required
                                            value="{{ old('qualification', $student->qualification ?? '') }}">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">College/Company: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="college" name="college"
                                            placeholder="College" required
                                            value="{{ old('college', $student->college ?? '') }}">
                                    </div>






                                </div>
                                <div class="form-row mb-3">

                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltipUsername">Gender: <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select id="gender" name="gender" class="form-select datatable-input"
                                                required>
                                                <option value="">- Select Gender -</option>
                                                <option value="male"
                                                    {{ old('gender', $student->gender ?? '') == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female"
                                                    {{ old('gender', $student->gender ?? '') == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="other"
                                                    {{ old('gender', $student->gender ?? '') == 'other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Address: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Address" required
                                            value="{{ old('address', $student->address ?? '') }}">
                                    </div>


                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">City: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city"
                                            placeholder="City" required value="{{ old('city', $student->city ?? '') }}">
                                    </div>



                                </div>

                                <div class="form-row mb-3">

                                    @if (auth()->user()->role == 'super-admin')
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Company: <span
                                                class="text-danger">*</span></label>
                                        <select id="company_id" name="company_id" class="form-select datatable-input"
                                            {{ isset($student->company_id) ? 'disabled' : '' }} required>
                                            <option value="">- Select Company -</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ old('company_id', $student->company_id ?? '') == $company->id ? 'selected' : '' }}>
                                                    {{ ucwords($company->company_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="col-md-4 mb-3">
                                    <label for="domain">{{ ucwords($menuNames['domain_class_' . $company_id] ?? 'Domain / Class') }}: <span class="text-danger">*</span></label>
                                    <select id="domain" name="domain" class="form-select datatable-input" required>
                                        <option value="">- Select {{ucwords( $menuNames['domain_class_' . $company_id] ?? 'Domain / Class' )}} -</option>
                                        @foreach ($domains as $domain)
                                            <option value="{{ $domain->id }}"
                                                {{ old('domain', $student->domain ?? '') == $domain->id ? 'selected' : '' }}>
                                                {{ ucwords($domain->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                               
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="admissiondate">Admission Date</label>
                                    <input type="date" class="form-control" id="admission_date" name="admission_date" required
                                           value="{{ old('admission_date', isset($student) && $student->admission_date ? $student->admission_date->format('Y-m-d') : date('Y-m-d')) }}">
                                </div>
                                

                                   

                                </div>
                                <div class="form-row mb-3">

                                    
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="student_profile">Upload Your Photograph</label>
                                        <input type="file" class="form-control" id="student_profile"
                                            name="student_profile" accept="image/*">


                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="resume">Updated Resume</label>
                                        <input type="file" class="form-control" id="resume" name="resume"
                                            accept="image/*">


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
        document.addEventListener('DOMContentLoaded', function() {
            const companySelect = document.getElementById('company_id');
            const domainSelect = document.getElementById('domain');
          

            if (companySelect) {
                companySelect.addEventListener('change', function() {
                    const companyId = this.value;

                    // Clear existing options for domains and priorities
                    domainSelect.innerHTML = '<option value="">- Select Domain -</option>';
                

                    if (companyId) {
                        fetch(`/api/get-domains-and-priorities/${companyId}`)
                            .then(response => response.json())
                            .then(data => {
                                // Populate domain options
                                data.domains.forEach(domain => {
                                    const option = new Option(domain.name, domain.id);
                                    domainSelect.add(option);
                                });

                              
                            })
                            .catch(error => console.error('Error fetching domains and priorities:', error));
                    }
                });
            }
        });

     


        $(document).ready(function () {
    // Add custom methods
    $.validator.addMethod("safeInput", function (value, element) {
        return /^[a-zA-Z\s]+$/.test(value);
    }, "Invalid characters are not allowed");

    $.validator.addMethod("validEmailChars", function (value, element) {
        return /^[a-zA-Z0-9@.]+$/.test(value);
    }, "Email can only contain letters, numbers, '.' and '@' characters");

    $.validator.addMethod("noRepeatedDigits", function (value, element) {
        return !/^(\d)\1{9}$/.test(value);
    }, "Mobile number cannot be made up of repeated digits (e.g., 0000000000, 1111111111)");

    
    $.validator.addMethod("notEmpty", function(value, element) {
        return $.trim(value).length > 0;
    }, "This field cannot contain only spaces");

    // Initialize validation
    $("#follow_up_form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 15,
                safeInput: true,
                notEmpty: true
            },
            qualification: {
                required: true,
                maxlength: 20,
                notEmpty: true
               
            },
            college: {
                required: true,
                maxlength: 30,
                notEmpty: true
            },
            email: {
                required: true,
                email: true,
                maxlength: 100,
                validEmailChars: true,
                notEmpty: true
            },
            mobile: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10,
                noRepeatedDigits: true
            },
            parents_mobile: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10,
                noRepeatedDigits: true
            },
            gender: {
                required: true
            },
            address: {
                required: true,
                maxlength: 100,
                notEmpty: true
            },
            city: {
                required: true,
                maxlength: 50,
                notEmpty: true
            },
            domain: {
                required: true
            },
            admission_date: {
                required: true,
                date: true
            }
        },
        messages: {
            name: {
                required: "Please enter a name",
                maxlength: "Name cannot be more than 15 characters long",
                safeInput: "Invalid characters in name",
                 notEmpty: "Name cannot contain only spaces"
            },
            qualification: {
                required: "Please enter a qualification",
                maxlength: "Qualification cannot be more than 15 characters long",
                 notEmpty: "Qualification cannot contain only spaces"
                
            },
            college: {
                required: "Please enter a college/company name",
                maxlength: "College/Company name cannot be more than 30 characters long",
                safeInput: "Invalid characters in college/company",
                 notEmpty: "College/Company cannot contain only spaces"
            },
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address",
                maxlength: "Email address cannot be more than 100 characters long",
                 notEmpty: "Email cannot contain only spaces"
            },
            mobile: {
                required: "Please enter a mobile number",
                number: "Please enter a valid mobile number",
                minlength: "Mobile number must be 10 digits long",
                maxlength: "Mobile number must be 10 digits long",
                noRepeatedDigits: "Mobile number cannot contain repeated digits"
            },
            parents_mobile: {
                required: "Please enter the parent's/guardian's mobile number",
                number: "Please enter a valid mobile number",
                minlength: "Mobile number must be 10 digits long",
                maxlength: "Mobile number must be 10 digits long",
                noRepeatedDigits: "Mobile number cannot contain repeated digits"
            },
            gender: {
                required: "Please select a gender"
            },
            address: {
                required: "Please enter an address",
                maxlength: "Address cannot be more than 100 characters long",
                 notEmpty: "Address cannot contain only spaces"
            },
            city: {
                required: "Please enter a city",
                maxlength: "City cannot be more than 50 characters long",
                 notEmpty: "City cannot contain only spaces"
            },
            domain: {
                required: "Please select a domain"
            },
            admission_date: {
                required: "Please select an admission date",
                date: "Please enter a valid date"
            }
        },
        errorClass: "invalid-feedback",
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function (form) {
            var button = $(".ladda_btn");
            var ladda = Ladda.create(button[0]);
            ladda.start();

            form.submit();

            setTimeout(function () {
                ladda.stop();
            }, 3000);
        },
        onkeyup: function (element) {
            $(element).valid();
        },
        oninput: function (element) {
            $(element).valid();
        },
        focusInvalid: true
    });
});

    </script>

@endsection
