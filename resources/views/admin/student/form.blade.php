@extends('admin.maintemplate.maintemplate')



@section('content')


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
                            <h4 class="card_title">{{ $title }}</h4>
                            <form id="follow_up_form"
                                action="{{ isset($student) ? route('student.update', $student->id) : route('student.store') }}"
                                method="POST" novalidate="novalidate">
                                @csrf
                                @if (isset($student))
                                    @method('PUT')
                                @endif
                                <div class="form-row mb-3">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Full Name: <span class="text-danger">*</span></label>
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
                                            placeholder="Mobile" required value="{{ old('mobile', $student->mobile ?? '') }}">
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
                                        <label for="validationCustom02">State: <span class="text-danger">*</span></label>
                                        <select id="state" name="state" class="form-select datatable-input"
                                            required>
                                            <option value="">- Select State -</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ old('state', $student->state ?? '') == $state->id ? 'selected' : '' }}>
                                                    {{ $state->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">City: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city"
                                            placeholder="City" required value="{{ old('city', $student->city ?? '') }}">
                                    </div>



                                </div>

                                <div class="form-row mb-3">
                                    @if(auth()->user()->role == 'super-admin')

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom02">Company: <span class="text-danger">*</span></label>
                                        <select id="company_id" name="company_id" class="form-select datatable-input"  {{ isset($student->company_id) ? 'disabled' : '' }}
                                            required>
                                            <option value="">- Select Company -</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ old('company_id', $student->company_id ?? '') == $company->id ? 'selected' : '' }}>
                                                    {{ ucfirst($company->company_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

                                    <div class="col-md-{{ auth()->user()->role == 'super-admin' ? 3 : 4 }} mb-3">
                                        <label for="validationCustom02">{{ ucwords($menuNames['domain_class_' . $company_id] ?? 'Domain / Class') }}: <span class="text-danger">*</span></label>
                                        <select id="domain" name="domain" class="form-select datatable-input"
                                            required>
                                            <option value="">- Select {{ucwords( $menuNames['domain_class_' . $company_id] ?? 'Domain / Class' )}} -</option>
                                            @foreach ($domains as $domain)
                                                <option value="{{ $domain->id }}"
                                                    {{ old('domain', $student->domain ?? '') == $domain->id ? 'selected' : '' }}>
                                                    {{ ucfirst($domain->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-{{ auth()->user()->role == 'super-admin' ? 3 : 4 }} mb-3">
                                        <label for="validationCustom02">{{ucwords( $menuNames['priority_' . $company_id] ?? 'Priority' )}}: <span class="text-danger">*</span></label>
                                        <select id="priority" name="priority_id" class="form-select datatable-input"
                                            required>
                                            <option value="">- Select {{ucwords( $menuNames['priority_' . $company_id] ?? 'Priority' )}} -</option>
                                            @foreach ($priorities as $priority)
                                                <option value="{{ $priority->id }}"
                                                    {{ old('priority_id', $student->priority_id ?? '') == $priority->id ? 'selected' : '' }}
>
                                                    {{ ucfirst($priority->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-{{ auth()->user()->role == 'super-admin' ? 3 : 4 }} mb-3">
                                        <label for="validationCustom02">Date: <span class="text-danger">*</span></label>
                                        <input type="date" 
                                               class="form-control" 
                                               id="follow_up_date" 
                                               name="follow_up_date"
                                               value="{{ old('follow_up_date', isset($student) ? $student->follow_up_date : date('Y-m-d')) }}"
                                               placeholder="FollowUp Date" 
                                               required>
                                    </div>
                                    





                                </div>
                                <div class="form-row mb-3">


                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Message: <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="message" name="message" placeholder="Message" required style="height: 113px;">{{ old('message', $student->message ?? '') }}</textarea>
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

document.addEventListener('DOMContentLoaded', function () {
        const companySelect = document.getElementById('company_id');
        const domainSelect = document.getElementById('domain');
        const prioritySelect = document.getElementById('priority');

        if (companySelect) {
            companySelect.addEventListener('change', function () {
                const companyId = this.value;

                // Clear existing options for domains and priorities
                domainSelect.innerHTML = '<option value="">- Select Domain -</option>';
                prioritySelect.innerHTML = '<option value="">- Select Priority -</option>';

                if (companyId) {
                    fetch(`/api/get-domains-and-priorities/${companyId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate domain options
                            data.domains.forEach(domain => {
                                const option = new Option(domain.name, domain.id);
                                domainSelect.add(option);
                            });

                            // Populate priority options
                            data.priorities.forEach(priority => {
                                const option = new Option(priority.name, priority.id);
                                prioritySelect.add(option);
                            });
                        })
                        .catch(error => console.error('Error fetching domains and priorities:', error));
                }
            });
        }
    });


        $(document).ready(function() {


    $.validator.addMethod("safeInput", function(value, element) {
        return /^[a-zA-Z\s]+$/.test(value);
    }, "Invalid characters in name");

    $.validator.addMethod("validEmailChars", function(value, element) {
        return /^[a-zA-Z0-9@.]+$/.test(value);
    }, "Email can only contain letters, numbers, '.' and '@' characters");






    $(document).ready(function () {
        // Custom validation methods
        $.validator.addMethod("safeInput", function (value, element) {
            return /^[a-zA-Z\s]+$/.test(value); // Allows only alphabets and spaces
        }, "Invalid characters in name");

        $.validator.addMethod("validEmailChars", function (value, element) {
            return /^[a-zA-Z0-9@.]+$/.test(value); // Allows only valid email characters
        }, "Email can only contain letters, numbers, '.' and '@' characters");

        $.validator.addMethod("noRepeatedDigits", function (value, element) {
            return !/^(.)\1{9}$/.test(value); // Prevents repeated digits like 0000000000
        }, "Mobile number cannot consist of repeated digits (e.g., 0000000000)");

        $.validator.addMethod("notEmpty", function(value, element) {
        return $.trim(value).length > 0;
    }, "This field cannot contain only spaces");

        // Form validation
        $("#follow_up_form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50,
                    safeInput: true,
                    notEmpty: true 
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 100,
                    validEmailChars: true
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                    noRepeatedDigits: true
                },
                gender: {
                    required: true
                },
                city: {
                    required: true,
                    notEmpty: true 
                },
                state: {
                    required: true
                },
                follow_up_date: {
                    required: true,
                    date: true
                },
                message: {
                    required: true,
                    maxlength: 500,
                    notEmpty: true  
                },
                domain: {
                    required: true
                },
                priority_id: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter a name",
                    maxlength: "Name cannot exceed 50 characters",
                    safeInput: "Invalid characters in name",
                    notEmpty: "Spaces are not allowed in the name."
                },
                email: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address",
                    maxlength: "Email cannot exceed 100 characters",
                    validEmailChars: "Email contains invalid characters"
                },
                mobile: {
                    required: "Please enter a mobile number",
                    number: "Only numeric values are allowed",
                    minlength: "Mobile number must be exactly 10 digits",
                    maxlength: "Mobile number must be exactly 10 digits",
                    noRepeatedDigits: "Mobile number cannot consist of repeated digits"
                },
                gender: {
                    required: "Please select a gender"
                },
                city: {
                    required: "Please enter a city",
                    notEmpty: "Spaces are not allowed in the city name."
                },
                state: {
                    required: "Please select a state"
                },
                follow_up_date: {
                    required: "Please select a follow-up date",
                    date: "Please enter a valid date"
                },
                message: {
                    required: "Please enter a message",
                    maxlength: "Message cannot exceed 500 characters",
                    notEmpty: "Spaces are not allowed in the message."
                },
                domain: {
                    required: "Please select a domain"
                },
                priority_id: {
                    required: "Please select a priority"
                }
            },
            errorClass: "invalid-feedback",
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("text-danger");
                error.insertAfter(element);
            },
            highlight: function (element) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            },
            submitHandler: function (form) {
                const button = $(".ladda_btn");
                const ladda = Ladda.create(button[0]);
                ladda.start();

                form.submit(); // Submit the form

                setTimeout(function () {
                    ladda.stop();
                }, 3000);
            }
        });
    });
});
    </script>

@endsection
