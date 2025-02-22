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
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card d-flex mb-mob-4 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <img src="assets/images/icon-bg.png" alt="Icon">
                                <i class="feather ft-users"></i>
                            </span>
                            <div class="icon_specs">
                                <p>All Students</p>
                                <span>{{$students->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card mb-mob-4 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <img src="assets/images/icon-bg.png" alt="Icon">
                                <i class="feather ft-shopping-cart"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Total Pending</p>
                                <span>{{$totalPending}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-icon rt_icon_card mb-0 text-center">
                        <div class="card-body">
                            <span class="heading_icon">
                                <img src="assets/images/icon-bg.png" alt="Icon">
                                <i class="feather ft-briefcase"></i>
                            </span>
                            <div class="icon_specs">
                                <p>Total Collected</p>
                                <span>{{$totalCollected}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 stretched_card mt-4">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                <div>
                                    <h4 class="card_title mb-0">Sales Statistics</h4>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-2 d-none d-md-block tab_links">
                                            {{-- <a href="#" class="active">Weekly</a>
                                            <a href="#">Yearly</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mb-4">
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">All Sales</p>
                                    <h3>+47%</h3>
                                </div>
                                <div class="mr-5 ml-3 mt-3">
                                    <p class="text-muted">Orders</p>
                                    <h3>957</h3>
                                </div>
                                <div class="ml-3 mt-3">
                                    <p class="text-muted">Purchases</p>
                                    <h3>$30K</h3>
                                </div>
                            </div>
                            <div class="stretched_card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card_title">Bar Chart</h4>
                                        <div class="chart_container">
                                            <canvas id="bar_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                        <div>
                                            <h4 class="card_title mb-0">Payment Types</h4>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center">
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div id="referral_chart" class="echart"></div>
                                    <div class="referral_chart_labels">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div>
                                                <span class="badge badge-dot badge-primary1"></span>
                                                <span class="ml-3">Full Payment</span>
                                            </div>
                                            <span class="text-right">{{ $fullPaymentPercentage }}%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div>
                                                <span class="badge badge-dot badge-primary2"></span>
                                                <span class="ml-3">Instalment</span>
                                            </div>
                                            <span class="text-right">{{ $installmentPercentage }}%</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 mt-4 stretched_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="ion-ios-more-outline"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                </div>
                            </div>
                            <h4 class="card_title mb-3">Todays Collected Amount</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-hover mb-0">
                                    <tbody>
                                        @forelse($todaysCollectedData as $installment)
                                    <tr>

                                        <td>
                                            <div class="media recent_activity mt-2">
                                                
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-1">{{ ucfirst($installment->studentFee->student->name ?? 'N/A') }}
                                                        <small class="font-weight-normal d-block mt-1">{{ \Carbon\Carbon::parse($installment->due_date)->format('d-m-Y') }}
                                                        </small>
                                                    </h6>
                                                    <span class="mt-2 d-block">{{ $installment->studentFee->student->mobile ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-action text-center">
                                            ₹{{ number_format($installment->installment_amount, 2) }}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No collections for today</td>
                                    </tr>
                                @endforelse
                                  
                                    
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                            <div class="mt-3">
                                <h5 class="text-primary text-left">
                                    Total Collected Today: <span style="float: inline-end;">₹{{ number_format($todaysCollectedData->sum('installment_amount'), 2) }}</span>
                                </h5>
                                
                            </div>
                        </div> <!-- end card body-->
                        
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 mt-4 stretched_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                <div>
                                    <h4 class="card_title mb-0">Daily Traffic Statistics</h4>
                                </div>
                                <div>
                                   
                                </div>
                            </div>
                            <div class=" mt-10">
                                <form class="mb-15" id="kt_course_delete" action="{{ route('student-fees-dashboard.delete') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                
                                    <table class="table w-100 nowrap no-footer">
                                        <tbody>
                                            <tr>

                                                <td class="col-md-3">
                                                    <select id="filter_days" name="filter_days" class="form-select datatable-input">
                                                        <option value="Today">Today</option>
                                                        <option value="Yesterday">Yesterday</option>
                                                        <option value="Month">Month</option>
                                                </select>
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
                                
                                               
                                
                                                <td>
                                                    {{-- <button type="button" class="btn btn-dark" id="kt_reset">Reset</button>
                                                    <button class="btn btn-danger" id="kt_delete" style="display: none" type="submit" name="submit" value="delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button> --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                
                                    <table id="common_datatable" class="table table-striped w-100"
                                        data-column="student_name,mobile,due_date,pending_payment{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},created_by"
                                        data-column-name="student_name,mobile,due_date,pending_payment{{ auth()->user()->role == 'super-admin' ? ',company_name' : '' }},created_by"
                                        data-extra-param="filter_days"
                                        data-extra-param-name="due_date"
                                        data-control="{{ route('student-fees-dashboard.dashboardList') }}" data-sorting="3" data-sorting-type="DESC"
                                        data-serial-number="1" data-except-sorting-columns="8" role="grid">
                                
                                        <thead>
                                            <tr>
                                              
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Due Date</th>
                                                <th>Due Amount</th>
                                                @if (auth()->user()->role == 'super-admin')
                                                    <th>Company Name</th>
                                                @else
                                                @endif
                                                <th>Created By</th>
                                             
                                              
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-7 mt-4 stretched_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <h4 class="card_title">Support Tickets</h4>
                                <div>
                                    <i class="feather ft-more-vertical text-muted"></i>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Ticket ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Ticket Created</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Progress</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">
                                            RBT4UB
                                        </th>
                                        <td>
                                            System Not Working
                                        </td>
                                        <td>
                                            14-06-2019
                                        </td>
                                        <td>
                                            Justin R. Woods
                                        </td>
                                        <td>
                                            <div>
                                                <span class="mb-2">60%</span>
                                                <div>
                                                    <div class="progress h-2p">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            UGR78BH
                                        </th>
                                        <td>
                                            Login Issue
                                        </td>
                                        <td>
                                            12-09-2019
                                        </td>
                                        <td>
                                            George A. Paul
                                        </td>
                                        <td>
                                            <div>
                                                <span class="mb-2">80%</span>
                                                <div>
                                                    <div class="progress h-2p">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            BHS35MJ
                                        </th>
                                        <td>
                                            Records Not Showing
                                        </td>
                                        <td>
                                            11-10-2019
                                        </td>
                                        <td>
                                            Bee M. Conner
                                        </td>
                                        <td>
                                            <div>
                                                <span class="mb-2">30%</span>
                                                <div>
                                                    <div class="progress h-2p">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            NK89BY
                                        </th>
                                        <td>
                                            Layout Issue
                                        </td>
                                        <td>
                                            14-06-2019
                                        </td>
                                        <td>
                                            Jose E. Blaney
                                        </td>
                                        <td>
                                            <div>
                                                <span class="mb-2">40%</span>
                                                <div>
                                                    <div class="progress h-2p">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            NYS96NU
                                        </th>
                                        <td>
                                            System Not Working
                                        </td>
                                        <td>
                                            14-06-2019
                                        </td>
                                        <td>
                                            Roy B. Alcala
                                        </td>
                                        <td>
                                            <div>
                                                <span class="mb-2">70%</span>
                                                <div>
                                                    <div class="progress h-2p">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 stretched_card mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <h4 class="card_title">Users Activity</h4>
                                <div>
                                    <i class="feather ft-more-vertical text-muted"></i>
                                </div>
                            </div>
                            <ul class="bullet-line-list">
                                <li>
                                    <p class="text-muted mb-2">24 Jan 2019</p>
                                    <p class="mb-2">User Logged in Successfully</p>
                                </li>
                                <li>
                                    <p class="text-muted mb-2">25 Mar 2019</p>
                                    <p class="mb-2">Architecto atque cupiditate</p>
                                </li>
                                <li>
                                    <p class="text-muted mb-2">26 Aug 2019</p>
                                    <p class="mb-2">Fugit illum laborum minima</p>
                                </li>
                                <li>
                                    <p class="text-muted mb-2">27 Nov 2019</p>
                                    <p class="mb-0">Consectetur adipisicing elit</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
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
    var monthlyData = @json($monthlyData);
</script>

<script>
  "use strict";

jQuery(document).ready(function () {
    if ($('#bar_chart').length) {
        var ctx = document.getElementById("bar_chart").getContext('2d');

        // Extract data from Laravel
        var labels = monthlyData.map(item => item.month);
        var pendingData = monthlyData.map(item => item.pending);
        var collectedData = monthlyData.map(item => item.collected);

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Collected Installments',
                        data: collectedData,
                        backgroundColor: "#8C2641", 
                        borderColor: "#8C2641",
                        borderWidth: 2,
                        barPercentage: 0.4,
                        categoryPercentage: 0.6
                    },
                    {
                        label: 'Pending Installments',
                        data: pendingData,
                        backgroundColor: "#F2836B", 
                        borderColor: "#F2836B",
                        borderWidth: 2,
                        barPercentage: 0.4,
                        categoryPercentage: 0.6
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: false, 
                        ticks: {
                            fontSize: 14,
                            fontColor: '#71748d',
                        },
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        stacked: false,
                        ticks: {
                            fontSize: 14,
                            fontColor: '#71748d',
                            beginAtZero: true
                        },
                        gridLines: {
                            display: true
                        }
                    }]
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14
                    }
                },
                tooltips: {
                    mode: 'nearest',  
                    intersect: true, 
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var value = dataset.data[tooltipItem.index];
                            return dataset.label + ": " + value;
                        }
                    }
                }
            }
        });
    }


    if ($('#referral_chart').length > 0) {
    var eChart_10 = echarts.init(document.getElementById('referral_chart'));

    var option9 = {
        tooltip: {
            show: true,
            backgroundColor: '#fff',
            borderRadius: 6,
            padding: 6,
            textStyle: {
                color: '#324148',
                fontFamily: '"Roboto", sans-serif',
                fontSize: 12
            }
        },
        series: [
            {
                name: 'Payment Types',
                type: 'pie',
                radius: ['40%', '60%'],
                color: ['#731943', '#F2836B'],
                data: [
                    { value: {{ $fullPaymentPercentage }}, name: 'Full Payment' },
                    { value: {{ $installmentPercentage }}, name: 'Installment' }
                ],
                label: {
                    normal: {
                        formatter: '{b}: {d}%'
                    }
                }
            }
        ]
    };
    
    eChart_10.setOption(option9);
    eChart_10.resize();
}

});




</script>


@endsection