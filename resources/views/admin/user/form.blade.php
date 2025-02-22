@extends('admin.maintemplate.maintemplate')



@section('content')
    <style>
        .form-switch {
            padding-left: 2.5em;
        }

        .form-select:focus {
            color: #495057;
            background-color: #fff;
            border-color: #5e2572;
            outline: 0;
            box-shadow: none;
        }

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




        .btn-default:hover,
        .btn-default:focus,
        .btn-default.focus,
        .btn-default:active,
        .btn-default.active,
        .open>.dropdown-toggle.btn-default {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .stepwizard-step p {
            margin-top: 0px;
            color: #666;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        /* .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
                    opacity:1 !important;
                    color:#bbb;
                } */
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .btn.btn-success {
            color: white;
            background-color: #5e2572;
            border-color: #5e2572;
        }

        .btn.btn-success:hover {
            background-color: #5e2572;
            border-color: #5e2572;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
            width: 33.333%;
            /* Make each step exactly one-third */
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
                            <h4 class="card_title">{{ ucwords('Add ' . ($menuNames['user_' . $company_id] ?? $title)) }}
                            </h4>

                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                        <p><small>Personal Details</small></p>
                                    </div>
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle"
                                            disabled="disabled">2</a>
                                        <p><small>Permissions</small></p>
                                    </div>
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle"
                                            disabled="disabled">3</a>
                                        <p><small>Summary</small></p>
                                    </div>

                                </div>
                            </div>
                            <form id="user_form" role="form"
                                action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}"
                                method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @if (isset($user))
                                    @method('PUT')
                                @endif
                                <div id="step-1" class="setup-content">

                                    <div class="form-row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Full Name: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name" required value="{{ old('name', $user->name ?? '') }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Email: <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email" required value="{{ old('email', $user->email ?? '') }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Mobile: <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="mobile" name="mobile"
                                                placeholder="Mobile" required
                                                value="{{ old('mobile', $user->mobile ?? '') }}">
                                        </div>


                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Date of Birth: </label>
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                placeholder="Date of Birth" value="{{ old('dob', $user->dob ?? '') }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltipUsername">Gender:</label>
                                            <div class="input-group">
                                                <select id="gender" name="gender" class="form-select datatable-input">
                                                    <option value="">- Select Gender -</option>
                                                    <option value="male"
                                                        {{ old('gender', $user->gender ?? '') == 'male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="female"
                                                        {{ old('gender', $user->gender ?? '') == 'female' ? 'selected' : '' }}>
                                                        Female</option>
                                                    <option value="other"
                                                        {{ old('gender', $user->gender ?? '') == 'other' ? 'selected' : '' }}>
                                                        Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Address: </label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Address" value="{{ old('address', $user->address ?? '') }}">
                                        </div>


                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Landmark: </label>
                                            <input type="text" class="form-control" id="landmark" name="landmark"
                                                placeholder="Landmark"
                                                value="{{ old('landmark', $user->landmark ?? '') }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Pin Code: </label>
                                            <input type="number" class="form-control" id="pin_code" name="pin_code"
                                                placeholder="Pin Code"
                                                value="{{ old('pin_code', $user->pin_code ?? '') }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">State:</label>
                                            <select id="state" name="state" class="form-select datatable-input">
                                                <option value="">- Select State -</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ old('state', $user->state ?? '') == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">City: </label>
                                            <select id="city" name="city" class="form-select datatable-input">
                                                <option value="">- Select City -</option>
                                            </select>
                                        </div>


                                        <!-- Photo Upload -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="photo">Photo</label>
                                            <input type="file" class="form-control" id="photo" name="photo"
                                                accept="image/*">


                                        </div>

                                        <div class="col-md-4 mb-3">
                                            @if (isset($user) && $user->photo)
                                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Current Photo"
                                                    style="max-width: 200px; margin-top: 10px;">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">Password: <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" {{ !isset($user) ? 'required' : '' }}
                                                minlength="6" maxlength="20">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom04">Confirm Password: <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="confirm_password"
                                                name="confirm_password" placeholder="Confirm Password"
                                                {{ !isset($user) ? 'required' : '' }} minlength="6" maxlength="20">
                                        </div>

                                        @if(auth()->user()->role == 'super-admin')

                                        <div class="col-md-2">
                                            <label for="validationCustom02">Company: </label>
                                            <select id="company_id" name="company_id" class="form-select datatable-input"  {{ isset($user->company_id) ? 'disabled' : '' }}
                                                >
                                                <option value="">- Select Company -</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"
                                                        {{ old('company_id', $user->company_id ?? '') == $company->id ? 'selected' : '' }}>
                                                        {{ ucfirst($company->company_name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <div class="col-md-2" 
                                        @if(auth()->user()->role === 'super-admin') 
                                           style="" 
                                        @else 
                                           style="margin-left: 25px;" 
                                        @endif>
                                            <label class="form-label" for="status">Status: </label>
                                            <div class="form-check form-switch">
                                                <!-- Hidden field to handle unchecked status -->
                                                <input type="hidden" name="status" value="0">
                                                <input type="checkbox" class="form-check-input" id="customSwitch1"
                                                    name="status" value="1"
                                                    {{ old('status', $user->status ?? 1) == 1 ? 'checked' : '' }}>
                                            </div>
                                        </div>

                                    </div>

                                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                </div>

                                <div id="step-2" class="setup-content">
                                    @php
                                        // Group permissions by module_name
                                        $groupedPermissions = $permissions->groupBy('module_name');
                                    @endphp
                                
                                    @foreach ($groupedPermissions as $moduleName => $modulePermissions)
                                        <h4 class="mt-3">{{ ucfirst($moduleName) }}</h4> {{-- Module Name as a Section Header --}}
                                
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" style="width:40%">Feature</th>
                                                    <th scope="col">Can Manage<br>
                                                        <p style="margin-bottom:0px;">Add / Edit / Delete</p>
                                                    </th>
                                                    <th scope="col">Can View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($modulePermissions->unique('group_name') as $permission)
                                                    <tr>
                                                        <td>{{ ucfirst($permission->group_name) }}</td>
                                                        <td>
                                                            <div class="form-check form-switch">
                                                                <input type="checkbox" class="form-check-input manage-switch"
                                                                    id="manage_{{ $permission->group_name }}"
                                                                    name="permissions[{{ $permission->group_name }}][manage]"
                                                                    value="1" data-group="{{ $permission->group_name }}"
                                                                    @if (in_array($permission->group_name . '.create', $userPermissions) ||
                                                                         in_array($permission->group_name . '.edit', $userPermissions) ||
                                                                         in_array($permission->group_name . '.delete', $userPermissions)) checked @endif>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-switch">
                                                                <input type="checkbox" class="form-check-input view-switch"
                                                                    id="view_{{ $permission->group_name }}"
                                                                    name="permissions[{{ $permission->group_name }}][view]"
                                                                    value="1" data-group="{{ $permission->group_name }}"
                                                                    @if (in_array($permission->group_name . '.view', $userPermissions)) checked @endif>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                
                                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                    <button class="btn btn-primary pull-left prevBtn" type="button">Previous</button>
                                </div>
                                



                                <div id="step-3" class="setup-content">
                                    <div class="card-header mb-3">
                                        <h5 class="mb-0">Basic Information <a><i id="basic-info-pencil" style="float: inline-end;" class="ti ti-pencil" title="Edit Basic Information"></i></a></h5>
                                    </div>
                                    <div class="card-body">


                                        <div class="form-row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Full Name:</label>
                                                <span id="review-name"></span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Email:</label>
                                                <span id="review-email"></span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Mobile:</label>
                                                <span id="review-mobile"></span>
                                            </div>

                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Date of Birth:</label>
                                                <span id="review-dob"></span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Gender:</label>
                                                <span id="review-gender"></span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Address:</label>
                                                <span id="review-address"></span>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Landmark:</label>
                                                <span id="review-landmark"></span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Pin Code:</label>
                                                <span id="review-pin-code"></span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">State:</label>
                                                <span id="review-state"></span>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">City:</label>
                                                <span id="review-city"></span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Photo:</label>
                                                <span id="review-photo"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-header mb-3">
                                        <h5 class="mb-0">Set Permission <a> <i id="set-permission-pencil" style="float: inline-end;" class="ti ti-pencil" title="Edit Permissions"></i></a></h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" style="width:40%">Feature</th>
                                                    <th scope="col">Can Manage</th>
                                                    <th scope="col">Can View</th>
                                                </tr>
                                            </thead>
                                            <tbody id="permissions-summary">
                                                @foreach ($permissions->unique('group_name') as $permission)
                                                    <tr id="summary_{{ $permission->group_name }}">
                                                        <td>{{ ucfirst($permission->group_name) }}</td>
                                                        <td class="manage-status">No</td>
                                                        <td class="view-status">No</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <button class="btn btn-primary pull-left prevBtn" type="button">Previous</button>
                                    <button class="btn btn-success pull-right" type="submit">Submit</button>
                                </div>

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
      $(document).ready(function () {
    // Handle permission toggles for both "Can Manage" and "Can View"
    $('.manage-switch, .view-switch').on('change', function () {
        const group = $(this).data('group');
        const isManage = $(this).hasClass('manage-switch');
        const isChecked = $(this).is(':checked');

        const status = isChecked ? 'Yes' : 'No';

        if (isManage) {
            // Update summary for "Can Manage"
            $(`#summary_${group} .manage-status`).text(status);

            // Automatically toggle "Can View" based on "Can Manage"
            const viewCheckbox = $(`#view_${group}`);
            if (isChecked) {
                viewCheckbox.prop('checked', true);
                $(`#summary_${group} .view-status`).text('Yes');
            } else {
                viewCheckbox.prop('checked', false);
                $(`#summary_${group} .view-status`).text('No'); 
            }
        } else {
            // Update summary for "Can View"
            $(`#summary_${group} .view-status`).text(status);
        }
    });

    // Initialize status text for all checkboxes
    $('.manage-switch, .view-switch').each(function () {
        const group = $(this).data('group');
        const isManage = $(this).hasClass('manage-switch');
        const isChecked = $(this).is(':checked');

        const status = isChecked ? 'Yes' : 'No';

        if (isManage) {
            $(`#summary_${group} .manage-status`).text(status);
        } else {
            $(`#summary_${group} .view-status`).text(status);
        }
    });
});



$(document).ready(function () {
    // Navigate to Basic Information (Step 1) when the pencil icon is clicked
    $('#basic-info-pencil').click(function () {
        $('div.setup-panel div a[href="#step-1"]').trigger('click');
    });

    // Navigate to Set Permission (Step 2) when the pencil icon is clicked
    $('#set-permission-pencil').click(function () {
        $('div.setup-panel div a[href="#step-2"]').trigger('click');
    });
});


        document.querySelector('.nextBtn').addEventListener('click', function() {

            document.getElementById('review-name').textContent = document.getElementById('name').value;
            document.getElementById('review-email').textContent = document.getElementById('email').value;
            document.getElementById('review-mobile').textContent = document.getElementById('mobile').value;
            document.getElementById('review-dob').textContent = document.getElementById('dob').value;
            document.getElementById('review-gender').textContent = document.getElementById('gender').value;
            document.getElementById('review-address').textContent = document.getElementById('address').value;
            document.getElementById('review-landmark').textContent = document.getElementById('landmark').value;
            document.getElementById('review-pin-code').textContent = document.getElementById('pin_code').value;


            const stateSelect = document.getElementById('state');
            document.getElementById('review-state').textContent = stateSelect.options[stateSelect.selectedIndex]
                .text;

            const citySelect = document.getElementById('city');
            document.getElementById('review-city').textContent = citySelect.options[citySelect.selectedIndex].text;


            const photoInput = document.getElementById('photo');
            if (photoInput.files.length > 0) {
                document.getElementById('review-photo').textContent = photoInput.files[0].name;
            } else {
                document.getElementById('review-photo').textContent = 'No photo uploaded';
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
            const user = @json(isset($user) ? $user : null);
            const states = @json(isset($states) ? $states : []);
            const cities = @json(isset($cities) ? $cities : []);

            if (user) {

                document.getElementById('name').value = user.name || '';
                document.getElementById('email').value = user.email || '';
                document.getElementById('mobile').value = user.mobile || '';
                document.getElementById('dob').value = user.dob || '';
                document.getElementById('gender').value = user.gender || '';
                document.getElementById('address').value = user.address || '';
                document.getElementById('landmark').value = user.landmark || '';
                document.getElementById('pin_code').value = user.pin_code || '';
                document.getElementById('state').value = user.state || '';
                document.getElementById('city').value = user.city || '';

                if (user.photo) {
                    document.getElementById('review-photo').textContent = user.photo;
                } else {
                    document.getElementById('review-photo').textContent = 'No photo uploaded';
                }


                document.getElementById('review-name').textContent = user.name || 'N/A';
                document.getElementById('review-email').textContent = user.email || 'N/A';
                document.getElementById('review-mobile').textContent = user.mobile || 'N/A';
                document.getElementById('review-dob').textContent = user.dob || 'N/A';
                document.getElementById('review-gender').textContent = user.gender || 'N/A';
                document.getElementById('review-address').textContent = user.address || 'N/A';
                document.getElementById('review-landmark').textContent = user.landmark || 'N/A';
                document.getElementById('review-pin-code').textContent = user.pin_code || 'N/A';


                const stateName = states.length > 0 && user.state ? states.find(state => state.id === user.state)
                    ?.name : 'Unknown';
                const cityName = cities.length > 0 && user.city ? cities.find(city => city.id === user.city)?.name :
                    'Unknown';

                document.getElementById('review-state').textContent = stateName;
                document.getElementById('review-city').textContent = cityName;

            } else {

                document.getElementById('review-photo').textContent = 'No photo uploaded';
                document.getElementById('review-name').textContent = 'N/A';
                document.getElementById('review-email').textContent = 'N/A';
                document.getElementById('review-mobile').textContent = 'N/A';
                document.getElementById('review-dob').textContent = 'N/A';
                document.getElementById('review-gender').textContent = 'N/A';
                document.getElementById('review-address').textContent = 'N/A';
                document.getElementById('review-landmark').textContent = 'N/A';
                document.getElementById('review-pin-code').textContent = 'N/A';
                document.getElementById('review-state').textContent = 'Unknown';
                document.getElementById('review-city').textContent = 'Unknown';
            }
        });





        $(document).ready(function () {
        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPrevBtn = $('.prevBtn');

        allWells.hide(); // Hide all steps initially

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            // Validate all required fields in the current step before moving to the next step
            var curStep = $(".setup-content:visible");
            var curInputs = curStep.find("input, select, textarea");
            var isValid = true;

            curInputs.each(function () {
                if (!$(this).valid()) {
                    isValid = false;
                }
            });

            if ($item.hasClass('disabled') || !isValid) {
                curInputs.filter(function () {
                    return !$(this).valid();
                }).first().focus();
                return; // Prevent navigation if validation fails
            }

            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();

            // Update the summary when navigating steps
            updateSummary();
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input,select,textarea"),
                isValid = true;

            curInputs.each(function () {
                if (!$(this).valid()) {
                    isValid = false;
                }
            });

            if (isValid) {
                nextStepWizard.removeAttr('disabled').trigger('click');
            } else {
                curInputs.filter(function () {
                    return !$(this).valid();
                }).first().focus();
            }
        });

        allPrevBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            allWells.hide();
            $('#' + curStepBtn).prev().show();

            navListItems.removeClass('btn-success').addClass('btn-default');
            prevStepWizard.removeClass('btn-default').addClass('btn-success');
        });

        $('div.setup-panel div a.btn-success').trigger('click');

        function updateSummary() {
            // Populate summary with data from the form fields
            $('#review-name').text($('#name').val() || 'N/A');
            $('#review-email').text($('#email').val() || 'N/A');
            $('#review-mobile').text($('#mobile').val() || 'N/A');
            $('#review-dob').text($('#dob').val() || 'N/A');
            $('#review-gender').text($('#gender').val() || 'N/A');
            $('#review-address').text($('#address').val() || 'N/A');
            $('#review-landmark').text($('#landmark').val() || 'N/A');
            $('#review-pin-code').text($('#pin_code').val() || 'N/A');

            var stateText = $('#state option:selected').text();
            $('#review-state').text(stateText !== '- Select State -' ? stateText : 'N/A');

            var cityText = $('#city option:selected').text();
            $('#review-city').text(cityText !== '- Select City -' ? cityText : 'N/A');

            var photoInput = $('#photo')[0];
            if (photoInput.files.length > 0) {
                $('#review-photo').text(photoInput.files[0].name);
            } else {
                $('#review-photo').text('No photo uploaded');
            }

            // Update permissions summary
            $('.manage-switch, .view-switch').each(function () {
                const group = $(this).data('group');
                const isManage = $(this).hasClass('manage-switch');
                const isChecked = $(this).is(':checked');

                const status = isChecked ? 'Yes' : 'No';

                if (isManage) {
                    $(`#summary_${group} .manage-status`).text(status);
                } else {
                    $(`#summary_${group} .view-status`).text(status);
                }
            });
        }
    });



        $(document).ready(function() {

            function fetchCities(stateId, selectedCity = '') {
                if (!stateId) return;

                $.ajax({
                    url: `/get-cities/${stateId}`,
                    type: 'GET',
                    success: function(response) {
                        var citySelect = $('#city');
                        citySelect.empty();
                        citySelect.append('<option value="">- Select City -</option>');

                        $.each(response, function(key, value) {
                            citySelect.append($('<option>', {
                                value: value.id,
                                text: value.name,
                                selected: value.id == selectedCity
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities:', error);
                    }
                });
            }


            $('#state').on('change', function() {
                var stateId = $(this).val();
                if (stateId) {
                    fetchCities(stateId);
                } else {
                    $('#city').empty().append('<option value="">- Select City -</option>');
                }
            });


            var initialStateId = $('#state').val();
            var initialCityId = "{{ old('city', $user->city ?? '') }}";
            if (initialStateId) {
                fetchCities(initialStateId, initialCityId);
            }
        });




        $(document).ready(function() {
            const isEditMode = "{{ isset($user) ? 'true' : 'false' }}" === "true";

            $.validator.addMethod("safeInput", function(value, element) {
                if (value === "") return true; // Allow blank values
                return /^[a-zA-Z\s]+$/.test(value);
            }, "Invalid characters in name");


            $.validator.addMethod(
                "validEmail",
                function(value, element) {
                    return this.optional(element) || /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(
                        value);
                },
                "Please enter a valid email address"
            );

            $.validator.addMethod("pastDate", function(value, element) {
                if (value === "") return true; // Allow empty values
                return new Date(value) < new Date();
            }, "Birthdate cannot be today or in the future");

            $.validator.addMethod("under100", function(value, element) {
                if (value === "") return true; // Allow empty values
                const today = new Date();
                const birthDate = new Date(value);
                let age = today.getFullYear() - birthDate.getFullYear();
                let month = today.getMonth() - birthDate.getMonth();
                if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age < 100;
            }, "Birthdate must be for someone under 100 years old");



            $.validator.addMethod("noRepeatedDigits", function(value, element) {
                return !/^(\d)\1{9}$/.test(value);
            }, "Mobile number cannot be made up of repeated digits (e.g., 0000000000, 1111111111)");


            $.validator.addMethod("validImageSize", function(value, element) {
                var file = element.files[0];
                if (file) {
                    var fileSize = file.size;
                    var validImage = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                    return fileSize <= 307200 && validImage.test(file.name);
                }
                return true;
            }, "Please upload an image larger than 300KB and in a valid format (JPG, JPEG, PNG, GIF)");

            $("#user_form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 20,
                        safeInput: true
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 100,
                        validEmail: true,
                    },

                    password: {
                        required: !isEditMode,
                        minlength: function() {
                            return !isEditMode ? 8 : undefined;
                        },
                        maxlength: 20
                    },
                    confirm_password: {
                        required: !isEditMode,
                        minlength: function() {
                            return !isEditMode ? 6 : undefined;
                        },
                        maxlength: 20,
                        equalTo: "#password"
                    },
                    dob: {
                        required: false,
                        pastDate: true,
                        under100: true
                    },

                    mobile: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10,
                        noRepeatedDigits: true
                    },
                    photo: {
                        validImageSize: true
                    },


                    landmark: {
                        required: false,
                        safeInput: true
                    },
                    pin_code: {
                        required: false,
                        number: true,
                        minlength: 6,
                        maxlength: 6
                    },
                    city: {
                        required: false
                    },
                    state: {
                        required: false
                    }
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                        maxlength: "Name cannot be more than 20 characters long",
                        safeInput: "Invalid characters in name"
                    },
                    email: {
                        required: "Please enter an email address",
                        email: "Please enter a valid email address",
                        maxlength: "Email address cannot be more than 100 characters long",
                        validEmail: "Email address must be in the format 'example@domain.com'"
                    },

                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password cannot be more than 20 characters long"
                    },
                    confirm_password: {
                        required: "Please confirm your password",
                        minlength: "Password confirmation must be at least 6 characters long",
                        equalTo: "Password and confirmation must match"
                    },
                    dob: {
                        // required: "Please enter a date of birth",
                        pastDate: "Birthdate cannot be today or in the future",
                        under100: "Birthdate must be for someone under 100 years old"
                    },
                    mobile: {
                        required: "Please enter a mobile number",
                        number: "Please enter a valid mobile number",
                        minlength: "Mobile number must be 10 digits long",
                        maxlength: "Mobile number must be 10 digits long",
                        noRepeatedDigits: "Mobile number cannot be made up of repeated digits (e.g., 0000000000, 1111111111)"
                    },
                    photo: {
                        validImageSize: "Please upload an image larger than 300KB and in a valid format (JPG, JPEG, PNG, GIF)"
                    },


                    landmark: {
                        safeInput: "Invalid characters in landmark"
                    },
                    pin_code: {

                        number: "Please enter a valid pin code",
                        minlength: "Pin code must be 6 digits long",
                        maxlength: "Pin code must be 6 digits long"
                    },


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
                // Trigger validation on keyup and input events
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
