{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('admin.maintemplate.maintemplate')



@section('content')


    <style>
        .table>:not(caption)>*>* {
            border-bottom-width: 0 !important;
        }

        .custom {
            object-fit: cover;
            height: 158px;
            width: 158px;

        }
    </style>
    <!--=========================*
                   Main Section
           *===========================-->
    <div class="vz_main_container">
        <div class="vz_main_content">
            @include('admin.maintemplate.alert')
            <div class="row">
                <div class="col-lg-12">
                    <div class="cover-profile">
                        <div class="profile-bg-img" style="background: url('assets/images/lock-bg.jpg') no-repeat;">
                            <div class="card-block user-info">
                                <div class="col-md-12">
                                    <div class="media-left">
                                        <a href="#" class="profile-image">

                                            @if ($user->role == 'admin')
                                                <img class="user-img img-radius custom"
                                                    src="{{ $company->photo ? asset('storage/' . $company->photo) : asset('assets/images/team/member2.jpg') }}"
                                                    alt="user-img">
                                            @else
                                                <img class="user-img img-radius custom"
                                                    src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/images/team/member2.jpg') }}"
                                                    alt="user-img">
                                            @endif


                                        </a>
                                    </div>
                                    <div class="media-body row">
                                        <div class="col-lg-12">
                                            <div class="user-title">
                                                <h2>{{ $user->name }}</h2>
                                                <span class="text-white">{{ ucfirst($user->role) }}</span>
                                            </div>
                                        </div>
                                        {{-- <div>
                                        <div class="pull-right cover-btn">
                                            <button type="button" class="btn btn-light m-r-10 m-b-5"><i class="icofont icofont-plus"></i> Follow</button>
                                            <button type="button" class="btn btn-light"><i class="icofont icofont-ui-messaging"></i> Message</button>
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-header card mb-4">
                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal" role="tab"
                                    aria-expanded="true">Personal Info</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#user_info" role="tab"
                                    aria-expanded="false">Edit User</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Change Password</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card_title mb-0">About Me</h5>
                                </div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="general-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="table-responsive">
                                                        <table class="table m-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Full Name</th>
                                                                    <td>{{ $user->name  ?? 'Not Provided'}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Gender</th>
                                                                    <td>{{ $user->gender  ?? 'Not Provided'}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Birth Date</th>
                                                                    <td> {{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('F d, Y') : 'Not Provided' }}
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Pin Code</th>
                                                                    <td>{{ $user->pin_code ?? 'Not Provided' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Location</th>
                                                                    <td>{{ $user->address ?? 'Not Provided' }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td><a href="#!">{{ $user->email }}</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Mobile Number</th>
                                                                    <td>{{ $user->mobile ?? 'Not Provided' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Company Name</th>
                                                                    <td>
                                                                        @if(Auth::user()->role == 'admin')
                                                                        @if($company = App\Models\Company::where('user_id', Auth::user()->id)->first())
                                      
                                                                        {{ $company->company_name }}
                                                                        @endif
                                                                        @else
                                      
                                                                        {{ Auth::user() ? Auth::user()->name : 'Guest' }}
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">State</th>
                                                                    <td>{{ $user->State->name ?? 'Not Provided'}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">City</th>
                                                                    <td>{{ $user->City->name ?? 'Not Provided'}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text mb-0">Description About Me</h5>
                                        </div>
                                        <div class="card-block user-desc">
                                            <div class="view-desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                                    nostrum placeat quis ratione similique. A alias culpa debitis deserunt
                                                    dicta earum eius excepturi, facere maiores quia quos saepe ullam ut!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="user_info" role="tabpanel" aria-expanded="false">
                            <div class="card">
                                <form id="user_form" role="form"
                                    action="{{ isset($user) ? route('user-profile.update', $user->id) : route('user-profile.store') }}"
                                    method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($user))
                                        @method('PUT')
                                    @endif
                                    @if ($user->role == 'admin')
                                        <div class="card-header">
                                            <h5 class="card-header-text mb-0">Company Detail</h5>
                                        </div>
                                        <div class="card-block">

                                            <div class="form-row mb-3">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Company Name:</label>
                                                    <input type="text" class="form-control" id="company_name"
                                                        name="company_name" placeholder="Company Name" required
                                                        value="{{ old('company_name', $company->company_name ?? '') }}">
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Company Email:</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" placeholder="Email" required
                                                        value="{{ old('email', $company->email ?? '') }}">
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Company Phone Number:</label>
                                                    <input type="number" class="form-control" id="phone"
                                                        name="phone" placeholder="Phone" required
                                                        value="{{ old('phone', $company->phone ?? '') }}">
                                                </div>

                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationTooltipUsername">Team Size: </label>
                                                    <div class="input-group">
                                                        <select id="team_size" name="team_size"
                                                            class="form-select datatable-input" required>
                                                            <option value="">- Select Gender -</option>
                                                            <option value="1-10"
                                                                {{ old('team_size', $company->team_size ?? '') == '1-10' ? 'selected' : '' }}>
                                                                1-10</option>
                                                            <option value="11-50"
                                                                {{ old('team_size', $company->team_size ?? '') == '11-50' ? 'selected' : '' }}>
                                                                11-50</option>
                                                            <option value="51-100"
                                                                {{ old('team_size', $company->team_size ?? '') == '51-100' ? 'selected' : '' }}>
                                                                51-100</option>
                                                            <option value="101-500"
                                                                {{ old('team_size', $company->team_size ?? '') == '101-500' ? 'selected' : '' }}>
                                                                101-500</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationTooltipUsername">Select Industry: </label>
                                                    <div class="input-group">
                                                        <select id="industry" name="industry"
                                                            class="form-select datatable-input" required>
                                                            <option value="">- Select Gender -</option>
                                                            <option value="IT / ITES"
                                                                {{ old('industry', $company->industry ?? '') == 'IT / ITES' ? 'selected' : '' }}>
                                                                IT / ITES</option>
                                                            <option value="Manufacturing"
                                                                {{ old('industry', $company->industry ?? '') == 'Manufacturing' ? 'selected' : '' }}>
                                                                Manufacturing</option>
                                                            <option value="Marketing Agency"
                                                                {{ old('industry', $company->industry ?? '') == 'Marketing Agency' ? 'selected' : '' }}>
                                                                Marketing Agency</option>
                                                            <option value="Real Estate"
                                                                {{ old('industry', $company->industry ?? '') == 'Real Estate' ? 'selected' : '' }}>
                                                                Real Estate</option>
                                                            <option value="Travel & Hospitality"
                                                                {{ old('industry', $company->industry ?? '') == 'Travel & Hospitality' ? 'selected' : '' }}>
                                                                Travel & Hospitality</option>
                                                            <option value="Others"
                                                                {{ old('industry', $company->industry ?? '') == 'Others' ? 'selected' : '' }}>
                                                                Others</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                @if ($user->role == 'admin')
                                                    <!-- Photo Upload -->
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" for="photo">Photo</label>
                                                        <input type="file" class="form-control" id="photo"
                                                            name="photo" accept="image/*">


                                                    </div>
                                                @else
                                                @endif


                                            </div>



                                        </div>
                                    @endif
                                    <div class="card-header">
                                        <h5 class="card-header-text mb-0">User Edit</h5>
                                    </div>
                                    <div class="card-block">

                                        <div class="form-row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Full Name: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Name" required
                                                    value="{{ old('name', $user->name ?? '') }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Email: <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email" required
                                                    value="{{ old('email', $user->email ?? '') }}">
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
                                                <label for="validationCustom02">Date of Birth: <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="dob" name="dob"
                                                    placeholder="Date of Birth" required
                                                    value="{{ old('dob', $user->dob ?? '') }}">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationTooltipUsername">Gender: <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <select id="gender" name="gender"
                                                        class="form-select datatable-input" required>
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
                                                <label for="validationCustom02">Address: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    placeholder="Address" required
                                                    value="{{ old('address', $user->address ?? '') }}">
                                            </div>


                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Landmark: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="landmark"
                                                    name="landmark" placeholder="Landmark" required
                                                    value="{{ old('landmark', $user->landmark ?? '') }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Pin Code: <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="pin_code"
                                                    name="pin_code" placeholder="Pin Code" required
                                                    value="{{ old('pin_code', $user->pin_code ?? '') }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">State: <span
                                                        class="text-danger">*</span></label>
                                                <select id="state" name="state" class="form-select datatable-input"
                                                    required>
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
                                                <label for="validationCustom02">City: <span
                                                        class="text-danger">*</span></label>
                                                <select id="city" name="city" class="form-select datatable-input"
                                                    required>
                                                    <option value="">- Select City -</option>
                                                </select>
                                            </div>

                                            @if ($user->role == 'admin')
                                            @else
                                                <!-- Photo Upload -->
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label" for="photo">Photo</label>
                                                    <input type="file" class="form-control" id="photo"
                                                        name="photo" accept="image/*">


                                                </div>
                                            @endif


                                        </div>


                                        <button class="btn btn-primary nextBtn pull-right" type="submit">Submit</button>

                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="contacts" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text mb-0">Change Password</h5>
                            </div>
                            <div class="card-block">

                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" id="passwordForm">
                                    @csrf
                                    @method('put')
                                
                                    <div class="form-row mb-3">
                                        <!-- Current Password -->
                                        <div class="col-md-4 mb-3">
                                            <label for="update_password_current_password">Current Password: <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="update_password_current_password" name="current_password" placeholder="Current Password" required minlength="6" maxlength="20">
                                        </div>
                                
                                        <!-- New Password -->
                                        <div class="col-md-4 mb-3">
                                            <label for="update_password_password">New Password: <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="update_password_password" name="password" placeholder="New Password" required minlength="6" maxlength="20">
                                        </div>
                                
                                        <!-- Confirm Password -->
                                        <div class="col-md-4 mb-3">
                                            <label for="update_password_password_confirmation">Confirm Password: <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="update_password_password_confirmation" name="password_confirmation" placeholder="Confirm Password" required minlength="6" maxlength="20">
                                        </div>
                                    </div>
                                
                                    <button class="btn btn-primary nextBtn pull-right" type="submit">Submit</button>
                                </form>
                               
                                
                            </div>
                            
                        </div>
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
            <p>© Copyright 2019. All right reserved. Template by Vizzstudio.</p>
        </div>
    </footer>
    <!--=========================*
                    End Footer
           *===========================-->
    </div>
    <!--=========================*
                End Main Section
        *===========================-->
        
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    // Check if the URL has a hash
    if (window.location.hash === "#contacts") {
        // Deactivate the "Personal Info" tab
        document.querySelector('a[href="#personal"]').classList.remove('active');
        // Deactivate the "Edit User" tab
        document.querySelector('a[href="#user_info"]').classList.remove('active');
        
        // Activate the "Change Password" tab
        document.querySelector('a[href="#contacts"]').classList.add('active');
        
        // Show the "Change Password" tab content
        document.querySelector('#personal').classList.remove('active', 'show');
        document.querySelector('#user_info').classList.remove('active', 'show');
        document.querySelector('#contacts').classList.add('active', 'show');
    }
});


  // Handle form submission with SweetAlert
  const form = document.getElementById('passwordForm');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission initially

            // Show SweetAlert warning before submission
            Swal.fire({
    title: 'Are you sure?',
    text: 'Do you want to update your password?',
    icon: 'warning',  // 'warning' is a valid icon type
    showCancelButton: true,
    confirmButtonText: 'Yes, update it!',
    cancelButtonText: 'No, cancel!'
}).then((result) => {
    if (result.isConfirmed) {
        // If confirmed, submit the form
        form.submit(); // Submit the form
    }
});

        });
    }

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

            // Handle state change
            $('#state').on('change', function() {
                var stateId = $(this).val();
                if (stateId) {
                    fetchCities(stateId);
                } else {
                    $('#city').empty().append('<option value="">- Select City -</option>');
                }
            });

            // Load cities on page load if in edit mode
            var initialStateId = $('#state').val();
            var initialCityId = "{{ old('city', $user->city ?? '') }}";
            if (initialStateId) {
                fetchCities(initialStateId, initialCityId);
            }
        });
    </script>
@endsection
