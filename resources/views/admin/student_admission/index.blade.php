@extends('admin.maintemplate.maintemplate')



@section('content')

<style>
    .btn.focus, .btn:focus {
    
    box-shadow:none;
}
.not-showing{
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
                                   
                                    <h4 class="page-title">{{ucwords( $menuNames['admission_' . $company_id] ?? $title )}}</h4>
                                </div>
                                @can('admission.create')
                                <div class="col-2 text-end">
                                    <a wire:navigate class="btn btn-primary" href="{{ route('admission.create') }}"><i class="fa fa-plus"></i> {{ __('Add New') }}</a>
                                </div>
                                @endcan
                            </div>
                        </div>
                        
                            <form class="mb-15" id="kt_course_delete" action="{{ route('admission.delete') }}" method="POST">
                                @csrf
                                @method('post')
                               
                                <table class="table  w-100 nowrap  no-footer">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-2">
                                                <input type="date" id="start_date" class="form-control form-control-sm datatable-input" style="padding: 8px;">
                                            </td>
                                            <td class="col-md-2">
                                                <input type="date" id="end_date" class="form-control form-control-sm datatable-input" style="padding: 8px;">
                                            </td>
                                            <td  class="col-md-3">
                                                <select id="domain_class" class="form-select datatable-input">
                                                    <option value="">- Select Domain -</option>
                                                  @foreach ($domainClasses as $domainClass )
                                                      <option value="{{$domainClass->id}}">{{$domainClass->name}}</option>
                                                  @endforeach
                                                </select>
                                            </td>
                                            @if (auth()->user()->role == 'super-admin')
                                            <td  class="col-md-3">
                                               <select id="filter_company" class="form-select datatable-input">
                                                   <option value="">- Select Company -</option>
                                                   @foreach ($companies as $company)
                                                       <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                   @endforeach
                                               </select>
                                           </td>
                                           @endif
                                            <td  class="col-md-3">
                                                <select id="filter_active" class="form-select datatable-input">
                                                    <option value="">- Select Status -</option>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="common_datatable" class="table table-striped w-100"
                                data-column="id,name,mobile,city,domain,admission_date,created_by{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }}"
                                data-column-name="id,name,mobile,city,domain,admission_date,created_by{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},actions"
                                data-extra-param="filter_active,filter_company,domain_class,start_date,end_date"
                                data-extra-param-name="followup_status,company_name,domain,start_date,end_date"
                                data-control="{{ route('admission.list') }}" data-sorting="3" data-sorting-type="DESC"
                                data-serial-number="1" data-except-sorting-columns="8"
                                role="grid" aria-describedby="common_datatable_info">
                            
                            
                                    <thead>
        
        
                                        <tr>
                                            <th>
                                                <input class="form-check-input" type="checkbox" name="checkAll" id="checkAll">
                                            </th>
                                        
                                            <th>Name</th>
                                            <th>Contact</th>
                                           
                                            <th>City</th>
                                            <th>Class</th>
                                           
                                            <th>Admission Date</th>
                                            <th>Created By</th>
                                            @if (auth()->user()->role == 'super-admin')
                                            <th>Company Name</th>
                                            @else
                                          
                                            @endif
                                           
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        
                                    </tbody>
                                </table>
        
        
                                
                                </div>
                               
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