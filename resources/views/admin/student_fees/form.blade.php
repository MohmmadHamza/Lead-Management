@extends('admin.maintemplate.maintemplate')

@section('content')

<style>
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
    .text-danger {
        font-size: 14px;
        margin-top: 5px;
    }.select2-container--default .select2-selection--single {
    height: 40px !important; /* Adjust height as needed */
    line-height: 1.5 !important;
    color: var(--bs-body-color) !important;
    padding: .375rem 2.25rem .375rem .75rem !important; /* Adjust padding for better alignment */
    font-size: 1rem !important; /* Adjust font size */
    background-color: var(--bs-form-control-bg)!important;
    font-weight: 400 !important;
   
    appearance: none !important;
    border-radius: .375rem !important;
    border: var(--bs-border-width) solid var(--bs-border-color)!important;
    background-size: 16px 12px !important;
    background-image: var(--bs-form-select-bg-img), var(--bs-form-select-bg-icon, none) !important;
    background-repeat: no-repeat !important;
    background-position: right .75rem center !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 31px !important;
    position: absolute !important;
    top: 2px !important;
    right: 11px !important;
    width: 23px !important;
}

</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<div class="vz_main_container">
    <div class="vz_main_content">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.maintemplate.form_alert')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">{{$title}} </h4>
                        <form id="fee_form" method="POST" action="{{ isset($studentFee) ? route('student-fees.update', $student->id) : route('student-fees.store') }}">
                            @csrf
                            @if(isset($studentFee)) 
                                @method('PUT')
                            @endif
                      <input type="hidden" name="student_id" value="{{ old('student_id', $student->id ?? '') }}">
                  

                            <div class="form-row mb-3">
                                <div class="col-md-4 mb-3">
                                    <label>Full Name:</label>
                                    @if(isset($student)) <!-- Edit Mode -->
                                        <input type="text" class="form-control" value="{{ $student->name }}" readonly>
                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                    @else <!-- Create Mode -->
                                        <select class="form-select select2" name="student_id" id="student_select">
                                            <option value="">Select Student</option>
                                            @foreach($students as $s)
                                                <option value="{{ $s->id }}" 
                                                    {{ (old('student_id', $firstStudent->id ?? '') == $s->id) ? 'selected' : '' }}>
                                                    {{ $s->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" id="student_email" name="email" 
                                    value="{{ old('email', $student->email ?? '') }}" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Mobile:</label>
                                    <input type="number" class="form-control" id="student_mobile" name="mobile" 
               value="{{ old('mobile', $student->mobile ?? '') }}" readonly>
                                </div>
                            </div>
                           
                            <div class="form-row mb-3">
                                <div class="col-md-4 mb-3">
                                    <label>{{ $menuNames['domain_class_' . $company_id] ?? 'Domain / Class' }}:</label>
                                    <select class="form-select" name="domain" id="domain_select">
                                      <option value="">Select {{ ucwords($menuNames['domain_class_' . $company_id] ?? 'Domain / Class') }}</option>
                                      @foreach ($domains as $domain)
                                        <option value="{{ $domain->id }}" 
                                          {{ old('domain', $student->domain ?? '') == $domain->id ? 'selected' : '' }}>
                                          {{ ucfirst($domain->name) }}
                                        </option>
                                      @endforeach
                                    </select>
                                  </div>

                               
                                  <div class="col-md-4 mb-3">
                                    <label>Total Fees:</label>
                                    <input type="text" class="form-control" id="total_fees" name="total_fees"
                                           value="{{ old('total_fees', $studentFee->total_fees ?? ($student->domainClass->fees ?? ($firstStudent->domainClass->fees ?? ''))) }}" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Discounted Fees:</label>
                                    <input type="number" class="form-control" id="discounted_fees" name="discounted_fees"
                                           value="{{ old('discounted_fees', $studentFee->discounted_fees ?? '') }}" required>
                                    <div class="text-danger" id="discounted_fees_error"></div>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col-md-4 mb-3">
                                    <label>Payment Type:</label>
                                    <select id="payment_type" name="payment_type" class="form-select">
                                        <option value="full" {{ old('payment_type', $studentFee->payment_type ?? '') == 'full' ? 'selected' : '' }}>Full Payment</option>
                                        <option value="installment" {{ old('payment_type', $studentFee->payment_type ?? '') == 'installment' ? 'selected' : '' }}>Installment</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Installment Section -->
                            <div id="installment_section" style="display: none;">
                                <h5>Installment Plan:</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Installment Amount</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="installment_rows">
                                        @if(isset($installments))
                                            @foreach($installments as $key => $installment)
                                                <tr>
                                                    <td>
                                                        <input type="number" name="installments[{{ $key }}][amount]" class="form-control installment_amount"
                                                               value="{{ $installment->installment_amount }}" required>
                                                    </td>
                                                    <td>
                                                        <input type="date" name="installments[{{ $key }}][due_date]" class="form-control"
                                                               value="{{ $installment->due_date }}" required>
                                                    </td>
                                                    <td>
                                                        <label><input type="radio" name="installments[{{ $key }}][status]" value="paid"
                                                            {{ $installment->status == 'paid' ? 'checked' : '' }} required> Paid</label>
                                                        <label><input type="radio" name="installments[{{ $key }}][status]" value="pending"
                                                            {{ $installment->status == 'pending' ? 'checked' : '' }} required> Pending</label>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm remove_installment">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-info btn-sm" id="add_installment">Add Installment</button>
                                <div class="text-danger" id="installment_error"></div>

                                <div class="form-row mt-3">
                                    <div class="col-md-4">
                                        <label>Remaining Amount:</label>
                                        <input type="text" class="form-control" id="remaining_amount" name="remaining_amount"
                                               value="{{ old('remaining_amount', $studentFee->remaining_amount ?? '0') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-area">
            <p>© Copyright 2025. All rights reserved.</p>
        </div>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    let installmentIndex = $('#installment_rows tr').length; // Keep track of added rows

    function updateRemainingAmount() {
        let discountedFees = parseFloat($('#discounted_fees').val()) || 0;
        let totalInstallments = 0;

        $('.installment_amount').each(function() {
            totalInstallments += parseFloat($(this).val()) || 0;
        });

        let remainingAmount = discountedFees - totalInstallments;
        $('#remaining_amount').val(remainingAmount.toFixed(2));

        if (remainingAmount < 0) {
            $('#installment_error').text('Total installment amount cannot exceed Discounted Fees.');
            $('button[type="submit"]').prop('disabled', true);
        } else {
            $('#installment_error').text('');
            $('button[type="submit"]').prop('disabled', false);
        }
    }

    $('#payment_type').change(function() {
        if ($(this).val() === 'installment') {
            $('#installment_section').show();
            $('#remaining_amount_section').show();
        } else {
            $('#installment_section').hide();
            $('#installment_rows').empty();
            $('#remaining_amount_section').hide();
        }
    }).trigger('change');

    $('#add_installment').click(function() {
        let remainingAmount = parseFloat($('#remaining_amount').val()) || 0;

        if (remainingAmount <= 0) {
            $('#installment_error').text('Remaining amount must be greater than zero to add an installment.');
            return;
        }

        let newRow = `
            <tr>
                <td><input type="number" name="installments[${installmentIndex}][amount]" class="form-control installment_amount" required></td>
                <td><input type="date" name="installments[${installmentIndex}][due_date]" class="form-control" required></td>
                <td>
                    <label><input type="radio" name="installments[${installmentIndex}][status]" value="paid" required> Paid</label>
                    <label><input type="radio" name="installments[${installmentIndex}][status]" value="pending" required checked> Pending</label>
                </td>
                <td><button type="button" class="btn btn-danger btn-sm remove_installment">Remove</button></td>
            </tr>
        `;
        $('#installment_rows').append(newRow);
        installmentIndex++;

        updateRemainingAmount();
    });

    $(document).on('click', '.remove_installment', function() {
        $(this).closest('tr').remove();
        updateRemainingAmount();
    });

    $(document).on('input', '.installment_amount', function() {
        updateRemainingAmount();
    });

    $('#discounted_fees').on('input', function() {
        updateRemainingAmount();
    });
});
$(document).ready(function() {
    // Initialize with first student's data in create mode
    function initializeCreateMode() {
        const initialStudentId = $('#student_select').val();
        if (initialStudentId) {
            fetchStudentDetails(initialStudentId);
        }
    }

    // Fetch and populate student details
    function fetchStudentDetails(studentId) {
        if (!studentId) {
            $('#student_email, #student_mobile').val('');
            $('#domain_select').val('');
            $('#total_fees').val('');
            return;
        }

        $.ajax({
            url: `/student-fees/${studentId}`,
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    $('#student_email').val(response.student.email);
                    $('#student_mobile').val(response.student.mobile);
                    
                    // Set domain and trigger fee update
                    $('#domain_select').val(response.student.domain_class_id).trigger('change');
                }
            },
            error: function() {
                toastr.error('Failed to fetch student details');
            }
        });
    }

    // Fetch domain fees
    function fetchDomainFees(domainId) {
        if (!domainId) {
            $('#total_fees').val('');
            return;
        }

        $.ajax({
            url: `/get-domain-fee/${domainId}`,
            type: 'GET',
            success: function(response) {
                $('#total_fees').val(response.success ? response.fees : '');
            },
            error: function() {
                toastr.error('Failed to fetch domain fees');
            }
        });
    }

    // Event Handlers
    $('#student_select').change(function() {
        fetchStudentDetails($(this).val());
    });

    $('#domain_select').change(function() {
        fetchDomainFees($(this).val());
    });

    // Initialization
    @if(!isset($student)) // Only for create mode
        initializeCreateMode();
    @else // For edit mode
        fetchDomainFees($('#domain_select').val());
    @endif
});

$(document).ready(function() {
            // Initialize Select2 on the select element
            $('#student_select').select2({
                placeholder: 'Select Student', // Placeholder text
                allowClear: true, // Allow clearing the selection
                width: '100%' // Full width of the select
            });
        });

</script>

@endsection
