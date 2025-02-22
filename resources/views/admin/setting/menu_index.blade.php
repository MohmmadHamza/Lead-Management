@extends('admin.maintemplate.maintemplate')

@section('content')

    <style>
       

      

        .settings-sidebar ul li i {
            margin-right: 10px;
        }

        .settings-sidebar ul li.active {
            background: #5e2572;
            color: #fff;
            border-radius: 5px;
        }

        /* Content Area */
        .settings-content {
            padding: 20px;
            flex: 1;
        }

      

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            height: 40px;
        }

     

        .btn.btn-light {
            background-color: #1577b0;
            border-color: #1577b0;
        }

        .sub-date-content {
            border-right: 1px solid #A4A4A4;
        }

        .subscription-date-filter .sub-date-content p {
            font-weight: 700;
            font-size: 14px;
            line-height: 16px;
            text-transform: capitalize;
            color: #2f2f39;
            margin-bottom: 4px;

        }

        .subscription-date-filter .sub-date-content span {
            font-style: normal;

            font-size: 14px;
            line-height: 16px;
        }

        .subscription-date-filter {
            gap: 0px;
            display: flex;
        }

        .subscription-date-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }
       
    </style>

    <!-- Main Section -->
    <div class="vz_main_container">
        <div class="vz_main_content d-flex">
            <!-- Sidebar -->
           

            <!-- Content -->
            <div class="settings-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="page-title" id="tab-title">Subscriptions Details</h4>
                    </div>
                    <div class="card-body">
                        <!-- General Tab -->
                        <div id="general" class="tab-content active">



                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true"> My Subscription</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false"> History</a>
                                </li>

                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="alert alert-info" role="alert"
                                        style="margin-top: 30px;align-items: center;justify-content: space-between;background-color: #ddeef4;color: #1577b0;border-left: 4px solid #1577b0;display: flex;">
                                        Your  <strong>Trial Subscription</strong> will be expired in 3 day(s) <div
                                            class="progress" style="height: 6px;top: auto;width: 30%;margin: auto;">
                                            <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 50%"></div>
                                        </div>
                                        <button type="button" class="btn btn-rounded btn-light" style="color: white;">
                                            Purchase Subscription </button>
                                    </div>
                                    <div class="subscription-date-filter row mx-0 ng-star-inserted">
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-auto sub-date-content pr-3">
                                            <p>Start date</p><span><i class="fa fa-calendar-minus-o"></i> 05 Feb 2025</span>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-auto sub-date-content px-3">
                                            <p>End date</p><span><i class="fa fa-calendar-minus-o"></i> 19 Feb 2025</span>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-auto sub-date-content px-3">
                                            <p>Subscription Period</p><span> 15
                                                days</span>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-auto sub-date-content px-3">
                                            <p>No. of Employees</p><span>5</span>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-auto sub-date-content pl-3 br-0"
                                            style="border-right: none;">
                                            <p>Status</p><span class="status-active-col ng-star-inserted" style="color: green;"><i class="fa fa-check"></i> Active</span>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-lg-6">
                                            <div class="card card-icon rt_icon_card d-flex mb-mob-4 text-center">
                                                <div class="card-body">
                                                    <span class="heading_icon">
                                                        <img src="assets/images/icon-bg.png" alt="Icon">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    <div class="icon_specs">
                                                        <p class="paragraph">Followup</p>
                                                        
                                                    </div>
                                                    <p>This feature is active for 0 out of 5 employee(s).</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card card-icon rt_icon_card mb-mob-4 text-center">
                                                <div class="card-body">
                                                    <span class="heading_icon">
                                                        <img src="assets/images/icon-bg.png" alt="Icon">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    <div class="icon_specs">
                                                        <p>Fees Managment</p>
                                                       
                                                    </div>
                                                    <p>This feature is active for 0 out of 5 employee(s).</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <form class="mb-15" id="kt_course_delete" action="#" method="POST">
                                        @csrf
                                        @method('post')
        
                                        <table class="table  w-100 nowrap  no-footer">
                                            <tbody>
                                                <tr>
                                                    <td class="col-md-2">
                                                        <input type="date" id="start_date" name="start_date" class="form-control form-control-sm datatable-input" style="padding: 8px;">
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input type="date" id="end_date" name="end_date" class="form-control form-control-sm datatable-input" style="padding: 8px;">
                                                    </td>
                                                    <td  class="col-md-4">
                                                        <select id="filter_active" class="form-select datatable-input">
                                                            <option value="">- Select Status -</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </td>
        
        
                                                    <td>
        
                                                        <button type="button" class="btn btn-dark" id="kt_reset">Reset</button>
                                                        {{-- <button class="btn btn-danger" id="kt_delete" style="display: none"
                                                            type="submit" name="submit" value="delete">
                                                            <i class="fa fa-trash"></i> --}}
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="common_datatable" class="table table-striped w-100"
                                            data-column="module_name,user_limit,start_date,end_date,subscription_period,status,created_at"
                                            data-column-name="module_name,user_limit,start_date,end_date,subscription_period,status,created_at"
        
                                            data-extra-param="filter_active,start_date,end_date"
                                            data-extra-param-name="status,start_date,end_date"
        
                                            data-control="{{route('menu.list')}}" data-sorting="6" data-sorting-type="DESC"
                                             data-serial-number="1" data-except-sorting-columns="8"
                                            role="grid"
                                            aria-describedby="common_datatable_info">
                                            <thead>
        
        
                                                <tr>
                                                    
        
                                                    <th>Module Name</th>
                                                    <th>User Limit</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Subscription Period</th>
                                                    
                                                    <th>Status</th>
                                                    <th>Created On</th>
                                                   
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

                       
                        {{-- <button class="btn btn-primary">Save Changes</button>
                    <button class="btn btn-danger">Cancel</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-area">
            <p>© Copyright 2025. All rights reserved.</p>
        </div>
    </footer>

    

@endsection
