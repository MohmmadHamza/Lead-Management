@extends('admin.maintemplate.maintemplate')



@section('content')

    <style>
        .btn.focus,
        .btn:focus {

            box-shadow: none;
        }

        .not-showing {
            display: none !important;
        }

        .badge.badge-success {
            border-radius: 20px;
        }

        .badge.badge-info {
            border-radius: 20px;
        }
    </style>


    <!--=========================*
                   Main Section
           *===========================-->
    <div class="vz_main_container">
        <div class="vz_main_content">
            <div class="row">
                <!-- data table -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            @include('admin.maintemplate.alert')

                            <div class="card-header">
                                <div class="row">
                                    <div class="col-10">
                                       
                                        <h4 class="page-title">{{ ucwords($menuNames['student_' . $company_id] ?? $title) }}</h4>
                                    </div>

                                    @if(Auth::user()->role != 'admin')
                                    @can('student.create')
                                        <div class="col-2 text-end">
                                            <a wire:navigate class="btn btn-primary" href="{{ route('follow_up.create') }}"><i
                                                    class="fa fa-plus"></i> {{ __('Add New') }}</a>
                                        </div>
                                    @endcan
                                    @endif
                                </div>
                            </div>

                            <form class="mb-15" id="kt_course_delete" action="{{ route('student.delete') }}"
                                method="POST">
                                @csrf
                                @method('post')

                                <table class="table  w-100 nowrap  no-footer">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-2">
                                                <input type="date" id="start_date"
                                                    class="form-control form-control-sm datatable-input"
                                                    style="padding: 8px;">
                                            </td>
                                            <td class="col-md-2">
                                                <input type="date" id="end_date"
                                                    class="form-control form-control-sm datatable-input"
                                                    style="padding: 8px;">
                                            </td>
                                            <td class="col-md-2">
                                                <select id="domain_class" class="form-select datatable-input">
                                                    <option value="">- Domain -</option>
                                                    @foreach ($domainClasses as $domainClass)
                                                        <option value="{{ $domainClass->id }}">{{ $domainClass->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            @if (auth()->user()->role == 'super-admin')
                                                <td class="col-md-2">
                                                    <select id="filter_company" class="form-select datatable-input">
                                                        <option value="">- Company -</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{ $company->id }}">{{ $company->company_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @endif
                                            <td class="col-md-2">
                                                <select id="filter_active" class="form-select datatable-input">
                                                    <option value="">- Status -</option>
                                                    <option value="Follow-up">Followup</option>
                                                    <option value="Admission">Admission</option>
                                                </select>
                                            </td>



                                            <td>

                                                <button type="button" class="btn btn-dark" id="kt_reset">Reset</button>
                                                <button class="btn btn-danger" id="kt_delete" style="display: none"
                                                    type="submit" name="submit" value="delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                @if (Auth::user() && Auth::user()->role !== 'user')
                                                    <button type="button" class="btn btn-info" id="kt_transfer"
                                                        style="display: none;">
                                                        <i class="fa fa-exchange-alt"></i> Transfer
                                                    </button>
                                                @endif


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="common_datatable" class="table table-striped w-100"
                                    data-column="id,name,mobile,city,domain,message,follow_up_date{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},followup_status"
                                    data-column-name="id,name,mobile,city,domain,message,follow_up_date{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},followup_status,actions"
                                    data-extra-param="filter_active,filter_company,domain_class,start_date,end_date"
                                    data-extra-param-name="followup_status,company_name,domain,start_date,end_date"
                                    data-control="{{ route('student.list') }}" data-sorting="6" data-sorting-type="DESC"
                                    data-serial-number="1" data-except-sorting-columns="8" role="grid"
                                    aria-describedby="common_datatable_info">


                                    <thead>


                                        <tr>
                                            <th>
                                                <input class="form-check-input" type="checkbox" name="checkAll"
                                                    id="checkAll">

                                            </th>

                                            <th>Name</th>
                                            <th>Contact</th>

                                            <th>City</th>
                                            <th>Class</th>
                                            <th>Notes</th>
                                            <th>Date</th>
                                            @if (auth()->user()->role == 'super-admin')
                                                <th>Company Name</th>
                                            @else
                                            @endif
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>



                        </div>

                        </form>

                        <!-- Transfer Modal -->
                        <div class="modal fade" id="transferModal" tabindex="-1" aria-labelledby="transferModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" style="margin-top: 72px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="transferModalLabel">Transfer Records</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="transferForm" method="POST" action="{{ route('student.store') }}">
                                            @csrf
                                            <input type="hidden" name="student_ids" id="selectedStudentIds">

                                            <div class="form-row mb-3">
                                                @if (Auth::user() && Auth::user()->role == 'super-admin')
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationTooltipUsername">Comanys:</label>
                                                        <div class="input-group">
                                                            <select id="company" name="company"
                                                                class="form-select datatable-input">
                                                                <option value="">- Select Comanys -</option>
                                                                @foreach ($companies as $company)
                                                                    <option value="{{ $company->id }}"
                                                                        {{ old('company_name', $company->company_name ?? '') == $company->id ? 'selected' : '' }}>
                                                                        {{ $company->company_name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-md-12 mb-3">
                                                    <label for="validationTooltipUsername">Users:</label>
                                                    <div class="input-group">
                                                        <select id="user" name="user"
                                                            class="form-select datatable-input">
                                                            <option value="">- Select Users -</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ old('name', $user->name ?? '') == $user->id ? 'selected' : '' }}>
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirm Transfer</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- data table -->
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
        function collectSelectedIds() {
            const selectedIds = [];
            $("#common_datatable .kt-check:checked").each(function() {
                console.log("Selected checkbox value:", $(this).val());
                selectedIds.push($(this).val());
            });
            console.log("Collected IDs:", selectedIds); 
            return selectedIds;
        }

        $(document).ready(function() {
            function collectSelectedIds() {
                const selectedIds = [];
                $("#common_datatable .kt-check:checked").each(function() {
                    selectedIds.push($(this).val());
                });
                return selectedIds;
            }

            // Show or hide the transfer button based on selected checkboxes
            function toggleTransferButton() {
                if ($("#common_datatable").find(".kt-check:checked").length > 0) {
                    $("#kt_transfer").show();
                } else {
                    $("#kt_transfer").hide();
                }
            }

            toggleTransferButton();

            // Checkbox change event to toggle buttons
            $("#common_datatable").on("change", ".kt-check", function() {
                toggleTransferButton();
            });

            // "Select All" checkbox handling
            $("#checkAll").click(function() {
                $("input:checkbox").not(this).prop("checked", this.checked);
                toggleTransferButton();
            });

            // Handle the transfer button click
            $("#kt_transfer").click(function() {
                const selectedIds = collectSelectedIds();

                if (selectedIds.length === 0) {
                    alert("Please select at least one student.");
                    return;
                }

                // Set the selected IDs in the hidden input field
                $("#selectedStudentIds").val(selectedIds.join(","));

                console.log("Modal opening with selected IDs:", selectedIds); // Debug line

                // Open the modal
                $("#transferModal").modal("show");
            });

            // Handle form submission
            $("#transferForm").submit(function(e) {
                const selectedIds = $("#selectedStudentIds").val();

                if (!selectedIds) {
                    e.preventDefault();
                    alert("Please select at least one student.");
                    console.log("Submission blocked: No IDs found"); // Debug line
                } else {
                    console.log("Form submitted with IDs:", selectedIds); // Debug line
                }
            });

        });


        document.addEventListener('DOMContentLoaded', function() {
            const companySelect = document.getElementById('company');
            const userSelect = document.getElementById('user');

            if (companySelect) {
                companySelect.addEventListener('change', function() {
                    const companyId = this.value;

                    // Clear existing options for users
                    userSelect.innerHTML = '<option value="">- Select Users -</option>';

                    if (companyId) {
                        fetch(`/api/get-user/${companyId}`)
                            .then(response => response.json())
                            .then(data => {
                                // Populate user options based on the response
                                data.users.forEach(user => {
                                    const option = new Option(user.name, user.id);
                                    userSelect.add(option);
                                });
                            })
                            .catch(error => console.error('Error fetching users:', error));
                    }
                });
            }
        });
        

        function confirmAdmission(URL) {
    var conf = confirm("Are you sure you want to make an admission?");
    if (conf) {
        window.location.href = URL; // Redirect to the provided URL
    }
}

        
    </script>



@endsection
