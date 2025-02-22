@extends('admin.maintemplate.maintemplate')



@section('content')

    <style>
        .btn.focus,
        .btn:focus {

            box-shadow: none;
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
                                        
                                        <h4 class="page-title">{{ ucwords($menuNames['user_' . $company_id] ??  $title) }}</h4>
                                    </div>

                                    <div class="col-2 text-end">
                                        <a wire:navigate class="btn btn-primary" href="{{ route('user.create') }}"><i
                                                class="fa fa-plus"></i> {{ __('Add New') }}</a>
                                    </div>

                                </div>
                            </div>

                            <form class="mb-15" id="kt_course_delete" action="{{ route('user.delete') }}" method="POST">
                                @csrf
                                @method('post')

                                <table class="table  w-100 nowrap  no-footer">
                                    <tbody>
                                        <tr>
                                            @if (auth()->user()->role == 'super-admin')
                                                <td class="col-md-4">
                                                    <select id="filter_role" class="form-select datatable-input">
                                                        <option value="">- Select Role -</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </td>
                                            @endif
                                            @if (auth()->user()->role == 'super-admin')
                                                <td class="col-md-4">
                                                    <select id="filter_company" class="form-select datatable-input">
                                                        <option value="">- Select Company -</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{ $company->id }}">{{ $company->company_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </td>
                                            @endif

                                            <td class="col-md-4">
                                                <select id="filter_active" class="form-select datatable-input">
                                                    <option value="">- Select Status -</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
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
                                    data-column="id,name{{ auth()->user()->role == 'super-admin' ? ',role' : '' }},email,created_at{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},created_by,status"
                                    data-column-name="id,name{{ auth()->user()->role == 'super-admin' ? ',role' : '' }},email,created_at{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},created_by,status,actions"
                                    data-extra-param="filter_role,filter_active,filter_company"
                                    data-extra-param-name="role,status,company_id" data-control="{{ route('user.list') }}"
                                    data-sorting="{{ auth()->user()->role == 'super-admin' ? '4' : '3' }}"
                                    data-sorting-type="DESC" data-serial-number="1" data-except-sorting-columns="8"
                                    role="grid" aria-describedby="common_datatable_info">
                                    <thead>


                                        <tr>
                                            <th>
                                                <input class="form-check-input" type="checkbox" name="checkAll"
                                                    id="checkAll">
                                            </th>
                                            <th>User Name</th>
                                            @if (auth()->user()->role == 'super-admin')
                                                <th>Role</th>
                                            @endif
                                            <th>Email</th>
                                            <th>Created On</th>
                                            @if (auth()->user()->role == 'super-admin')
                                                <th>Company Name</th>
                                            @endif
                                            <th>Created By</th>
                                            <th>Status</th>
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
