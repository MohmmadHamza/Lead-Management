@extends('admin.maintemplate.maintemplate')



@section('content')

<style>
    .btn.focus, .btn:focus {

    box-shadow:none;
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
                                  
                                    <h4 class="page-title">{{ ucwords($menuNames['student_fees_' . $company_id] ?? $title )}}</h4>
                                </div>
                                @can('student-fees.create')
                                <div class="col-2 text-end">
                                    <a wire:navigate class="btn btn-primary" href="{{ route('student-fees.create') }}"><i class="fa fa-plus"></i> {{ __('Add New') }}</a>
                                </div>
                                @endcan
                              
                            </div>
                        </div>

                        <form class="mb-15" id="kt_course_delete" action="{{ route('admission.delete') }}" method="POST">
                            @csrf
                            @method('POST')
                        
                            <table class="table w-100 nowrap no-footer">
                                <tbody>
                                    <tr>
                                        <td class="col-md-2">
                                            <input type="date" id="start_date" name="start_date" class="form-control form-control-sm datatable-input" style="padding: 8px;">
                                        </td>
                                        <td class="col-md-2">
                                            <input type="date" id="end_date" name="end_date" class="form-control form-control-sm datatable-input" style="padding: 8px;">
                                        </td>
                        
                                        @if (auth()->user()->role == 'super-admin')
                                        <td class="col-md-3">
                                            <select id="filter_company" name="filter_company" class="form-select datatable-input">
                                                <option value="">- Select Company -</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                        
                                        <td class="col-md-3">
                                            <select id="filter_active" name="filter_active" class="form-select datatable-input">
                                                <option value="">- Select Status -</option>
                                                <option value="installment">Installment</option>
                                                <option value="full">Full</option>
                                            </select>
                                        </td>
                        
                                        <td>
                                            <button type="button" class="btn btn-dark" id="kt_reset">Reset</button>
                                            {{-- <button class="btn btn-danger" id="kt_delete" style="display: none" type="submit" name="submit" value="delete">
                                                <i class="fa fa-trash"></i>
                                            </button> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        
                            <table id="common_datatable" class="table table-striped w-100"
                                data-column="student_name,mobile,domain,total_fees,discounted_amount,discounted_fees,paid_amount,remaining_amount,payment_type{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},created_by"
                                data-column-name="student_name,mobile,domain,total_fees,discounted_amount,discounted_fees,paid_amount,remaining_amount,payment_type{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},created_by,actions"
                                data-extra-param="filter_active,filter_company,start_date,end_date"
                                data-extra-param-name="payment_type,company_name,start_date,end_date"
                                data-control="{{ route('student-fees.list') }}" data-sorting="3" data-sorting-type="DESC"
                                data-serial-number="1" data-except-sorting-columns="8" role="grid">
                        
                                <thead>
                                    <tr>
                                        {{-- <th><input class="form-check-input" type="checkbox" name="checkAll" id="checkAll"></th> --}}
                                        <th>Name</th>

                                        <th>Mobile</th>
                                        
                                      
                                        <th>Class</th>
                                       
                                        <th>Course Fees</th>
                                        <th>Discount</th>
                                        <th>Final Amount</th>
                                        <th>Paid</th>
                                        <th>Remaining</th>
                                        <th>Payment</th>
                                        @if (auth()->user()->role == 'super-admin')
                                        <th>Company Name</th>
                                    @else
                                    @endif
                                        <th>Created By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </form>


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


@endsection
