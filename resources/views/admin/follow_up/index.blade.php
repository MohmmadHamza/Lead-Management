@extends('admin.maintemplate.maintemplate')



@section('content')
    <style>
        .newcard {
            padding-bottom: 30px;
            border: none;
            height: 100%;
            background-color: initial;
        }

        .newcard {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {

            background-color: #ffffff;
            border-radius: 4px;

            box-shadow: 0px 10px 20px 0px #5e25724a;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 0.25rem 1.25rem 1.25rem 1.25rem;
        }

        .heading-layout1 {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            background-color: transparent;
            border: none;
            /* margin-bottom: 12px; */
        }

      

        hr {
    margin-top: 0rem; 
        }
        .heading-layout1 .item-title h3 {
            color: #111111;
            font-weight: 500;
            margin-bottom: 0;
        }

        h3 {
            font-size: 22px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            margin: 0 0 20px 0;
            color: #5e2572;
        }

        h3,
        h4,
        h5,
        h6 {
            line-height: 1.4;
        }

        .heading-layout1 .dropdown .dropdown-toggle {
            color: #5e2572;
            font-size: 36px;
            display: inline-block;
            line-height: 1;
            padding-bottom: 15px;
            position: relative;
            right: 23px;
        }

        a {
            text-decoration: none;
        }

        .heading-layout1 .dropdown .dropdown-toggle:after {
            border: none;
        }

        .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
        }

        .heading-layout1 .dropdown .dropdown-menu {
            border: none;
            padding: 15px 0 18px;
        }

        .dropdown .dropdown-menu {
            top: 58px;
            min-width: 140px;
            padding: 0;
            border-radius: 4px;
            -webkit-box-shadow: 0px 0px 10px 0px rgba(33, 30, 30, 0.15);
            box-shadow: 0px 0px 10px 0px rgba(33, 30, 30, 0.15);
        }

        .heading-layout1 .dropdown .dropdown-menu .dropdown-item {
            font-size: 15px;
            padding: 7px 20px;
        }

        .heading-layout1 .dropdown .dropdown-menu .dropdown-item i {
            margin-right: 14px;
            width: 22px;
        }

        .text-orange-red {
            color: #ff0000;
        }

        .dashboard-card-six .card-body .notice-box-wrap {
            max-height: 400px;
            overflow-y: clip;
            padding-right: 20px;

        }

        .dashboard-card-six .card-body .notice-box-wrap .notice-list {

            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1), 0px 1px 3px rgba(0, 0, 0, 0.06);
            border-radius: 20px 0px 20px 0px;
            border-bottom: 1px solid #ededed;
            padding-bottom: 14px;
            margin-bottom: 18px;

        }

        .dashboard-card-six .card-body .notice-box-wrap .notice-list:hover {

            transform: translateY(-5px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2), 0px 3px 6px rgba(0, 0, 0, 0.15);
        }

        .dashboard-card-six .card-body .notice-box-wrap .notice-list .post-date {
            font-weight: bold;
            background-color: #5e2572;
            display: inline-block;
            font-size: 12px;
            color: #ffffff;
            padding: 5px 14px;
            border-radius: 20px 0px 20px 0px;
            margin-bottom: 14px;
        }

        .bg-skyblue {
            background-color: #40dfcd;
        }

        .dashboard-card-six .card-body .notice-box-wrap .notice-list .notice-title {
            margin-left: 10px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        h6 {
            font-size: 16px;
        }

        h3,
        h4,
        h5,
        h6 {
            line-height: 1.4;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            margin: 0 0 20px 0;
            color: #5e2572;
        }

        .dashboard-card-six .card-body .notice-box-wrap .notice-list .notice-title a {
            color: #111111;
        }

        a {
            text-decoration: none;
        }

        .dashboard-card-six .card-body .notice-box-wrap .notice-list .entry-meta {
            margin-right: 15px;
            font-size: 15px;
            color: #646464;
        }

        .dashboard-card-six .card-body .notice-box-wrap .notice-list .entry-meta span {
            font-weight: 500;
            color: #5e2572;
        }

        .bg-yellow {
            background-color: #fbd540;
        }

        .bg-pink {
            background-color: #f939a1;
        }

        .btn.focus,
        .btn:focus {

            box-shadow: none;
        }

        .text-dark-pastel-green {
            color: #00c853;
        }

        .text-orange-peel {
            color: #ffa000;
        }

        .notice-title {
            flex: 1;
            /* Allow title to take available space */
            margin-right: 10px;
            /* Add spacing between title and date */
        }

        .entry-meta {
            white-space: nowrap;
            /* Prevent text wrapping */
            text-align: right;
            /* Align text to the right */
            font-weight: bold;
            font-size: 14px;
            color: #5e2572;
        }

        .img-fluid {

            float: right;
            margin-right: -2px;
            width: 90px !important;
            height: 90px !important;
            border-radius: 44px;

        }

        .accordion1 .card-header {
            cursor: pointer;
            padding: 1rem;
        }

        .accordion1 .btn-link {
            text-decoration: none;
            color: inherit;
        }

        .accordion1 .btn-link:hover {
            text-decoration: none;
        }

        .accordion1 .ti-angle-down {
            transition: transform 0.3s ease;
        }

        .accordion1 .collapsed .ti-angle-down {
            transform: rotate(-90deg);
        }


        .rt_icon_card {
            padding: 0px !important;
        }

        .nav-pills .nav-link.active {
            border: thick double #5e2572;
            background-color: #ffff !important;
            padding: 0px !important;
        }

        .alert-warning {
            border-left: 4px solid #bd00ff;
            background-color: #5e2572;
        }

        .badge.badge-light {
            float: right;
            background-color: #d1d1d1;
            border-color: #d1d1d1;
        }

         #search {
                    display: grid;
                    grid-area: search;
                    grid-template: "search" 32px / 258px;
                    justify-content: end;
                    align-content: center;
                    justify-items: end;
                    align-items: stretch;
                    background: hsl(0, 0%, 99%);
                }

                #search input {
                    display: block;
                    grid-area: search;
                    -webkit-appearance: none;
                    appearance: none;
                    width: 100%;
                    height: 100%;
                    background: none;
                    padding: 0 20px 0 60px;
                    border: none;
                    border-radius: 100px;
                    font: 14px/1 system-ui, sans-serif;
                    outline-offset: -8px;
                }


                #search svg {
                    grid-area: search;
                    overflow: visible;
                    color: #5e2572;
                    fill: none;
                    stroke: currentColor;
                }

                .spark {
                    fill: currentColor;
                    stroke: none;
                    r: 15;
                }

                .spark:nth-child(1) {
                    animation:
                        spark-radius 2.03s 1s both,
                        spark-one-motion 2s 1s both;
                }

                @keyframes spark-radius {
                    0% {
                        r: 0;
                        animation-timing-function: cubic-bezier(0, 0.3, 0, 1.57)
                    }

                    30% {
                        r: 15;
                        animation-timing-function: cubic-bezier(1, -0.39, 0.68, 1.04)
                    }

                    95% {
                        r: 8
                    }

                    99% {
                        r: 10
                    }

                    99.99% {
                        r: 7
                    }

                    100% {
                        r: 0
                    }
                }

                @keyframes spark-one-motion {
                    0% {
                        transform: translate(-20%, 50%);
                        animation-timing-function: cubic-bezier(0.63, 0.88, 0, 1.25)
                    }

                    20% {
                        transform: rotate(-0deg) translate(0%, -50%);
                        animation-timing-function: ease-in
                    }

                    80% {
                        transform: rotate(-230deg) translateX(-20%) rotate(-100deg) translateX(15%);
                        animation-timing-function: linear
                    }

                    100% {
                        transform: rotate(-360deg) translate(30px, 100%);
                        animation-timing-function: cubic-bezier(.64, .66, 0, .51)
                    }
                }

                .spark:nth-child(2) {
                    animation:
                        spark-radius 2.03s 1s both,
                        spark-two-motion 2.03s 1s both;
                }

                @keyframes spark-two-motion {
                    0% {
                        transform: translate(120%, 50%) rotate(-70deg) translateY(0%);
                        animation-timing-function: cubic-bezier(0.36, 0.18, 0.94, 0.55)
                    }

                    20% {
                        transform: translate(90%, -80%) rotate(60deg) translateY(-80%);
                        animation-timing-function: cubic-bezier(0.16, 0.77, 1, 0.4)
                    }

                    40% {
                        transform: translate(110%, -50%) rotate(-30deg) translateY(-120%);
                        animation-timing-function: linear
                    }

                    70% {
                        transform: translate(100%, -50%) rotate(120deg) translateY(-100%);
                        animation-timing-function: linear
                    }

                    80% {
                        transform: translate(95%, 50%) rotate(80deg) translateY(-150%);
                        animation-timing-function: cubic-bezier(.64, .66, 0, .51)
                    }

                    100% {
                        transform: translate(100%, 50%) rotate(120deg) translateY(0%)
                    }
                }

                .spark:nth-child(3) {
                    animation:
                        spark-radius 2.05s 1s both,
                        spark-three-motion 2.03s 1s both;
                }

                @keyframes spark-three-motion {
                    0% {
                        transform: translate(50%, 100%) rotate(-40deg) translateX(0%);
                        animation-timing-function: cubic-bezier(0.62, 0.56, 1, 0.54)
                    }

                    30% {
                        transform: translate(40%, 70%) rotate(20deg) translateX(20%);
                        animation-timing-function: cubic-bezier(0, 0.21, 0.88, 0.46)
                    }

                    40% {
                        transform: translate(65%, 20%) rotate(-50deg) translateX(15%);
                        animation-timing-function: cubic-bezier(0, 0.24, 1, 0.62)
                    }

                    60% {
                        transform: translate(60%, -40%) rotate(-50deg) translateX(20%);
                        animation-timing-function: cubic-bezier(0, 0.24, 1, 0.62)
                    }

                    70% {
                        transform: translate(70%, -0%) rotate(-180deg) translateX(20%);
                        animation-timing-function: cubic-bezier(0.15, 0.48, 0.76, 0.26)
                    }

                    100% {
                        transform: translate(70%, -0%) rotate(-360deg) translateX(0%) rotate(180deg) translateX(20%);
                    }
                }




                .burst {
                    stroke-width: 3;
                }

                .burst :nth-child(2n) {
                    color: #ff783e
                }

                .burst :nth-child(3n) {
                    color: #ffab00
                }

                .burst :nth-child(4n) {
                    color: #55e214
                }

                .burst :nth-child(5n) {
                    color: #82d9f5
                }

                .circle {
                    r: 6;
                }

                .rect {
                    width: 10px;
                    height: 10px;
                }

                .triangle {
                    d: path("M0,-6 L7,6 L-7,6 Z");
                    stroke-linejoin: round;
                }

                .plus {
                    d: path("M0,-5 L0,5 M-5,0L 5,0");
                    stroke-linecap: round;
                }




                .burst:nth-child(4) {
                    transform: translate(30px, 100%) rotate(150deg);
                }

                .burst:nth-child(5) {
                    transform: translate(50%, 0%) rotate(-20deg);
                }

                .burst:nth-child(6) {
                    transform: translate(100%, 50%) rotate(75deg);
                }

                .burst * {}

                @keyframes particle-fade {

                    0%,
                    100% {
                        opacity: 0
                    }

                    5%,
                    80% {
                        opacity: 1
                    }
                }

                .burst :nth-child(1) {
                    animation: particle-fade 600ms 2.95s both, particle-one-move 600ms 2.95s both;
                }

                .burst :nth-child(2) {
                    animation: particle-fade 600ms 2.95s both, particle-two-move 600ms 2.95s both;
                }

                .burst :nth-child(3) {
                    animation: particle-fade 600ms 2.95s both, particle-three-move 600ms 2.95s both;
                }

                .burst :nth-child(4) {
                    animation: particle-fade 600ms 2.95s both, particle-four-move 600ms 2.95s both;
                }

                .burst :nth-child(5) {
                    animation: particle-fade 600ms 2.95s both, particle-five-move 600ms 2.95s both;
                }

                .burst :nth-child(6) {
                    animation: particle-fade 600ms 2.95s both, particle-six-move 600ms 2.95s both;
                }

                @keyframes particle-one-move {
                    0% {
                        transform: rotate(0deg) translate(-5%) scale(0.0001, 0.0001)
                    }

                    100% {
                        transform: rotate(-20deg) translateX(8%) scale(0.5, 0.5)
                    }
                }

                @keyframes particle-two-move {
                    0% {
                        transform: rotate(0deg) translate(-5%) scale(0.0001, 0.0001)
                    }

                    100% {
                        transform: rotate(0deg) translateX(8%) scale(0.5, 0.5)
                    }
                }

                @keyframes particle-three-move {
                    0% {
                        transform: rotate(0deg) translate(-5%) scale(0.0001, 0.0001)
                    }

                    100% {
                        transform: rotate(20deg) translateX(8%) scale(0.5, 0.5)
                    }
                }

                @keyframes particle-four-move {
                    0% {
                        transform: rotate(0deg) translate(-5%) scale(0.0001, 0.0001)
                    }

                    100% {
                        transform: rotate(-35deg) translateX(12%)
                    }
                }

                @keyframes particle-five-move {
                    0% {
                        transform: rotate(0deg) translate(-5%) scale(0.0001, 0.0001)
                    }

                    100% {
                        transform: rotate(0deg) translateX(12%)
                    }
                }

                @keyframes particle-six-move {
                    0% {
                        transform: rotate(0deg) translate(-5%) scale(0.0001, 0.0001)
                    }

                    100% {
                        transform: rotate(35deg) translateX(12%)
                    }
                }



                .bar {
                    width: 100%;
                    height: 100%;
                    ry: 50%;
                    stroke-width: 10;
                    animation: bar-in 900ms 3s both;
                }

                @keyframes bar-in {
                    0% {
                        stroke-dasharray: 0 180 0 226 0 405 0 0
                    }

                    100% {
                        stroke-dasharray: 0 0 181 0 227 0 405 0
                    }
                }

                .magnifier {
                    animation: magnifier-in 600ms 3.6s both;
                    transform-box: fill-box;
                }

                @keyframes magnifier-in {
                    0% {
                        transform: translate(20px, 8px) rotate(-45deg) scale(0.01, 0.01);
                    }

                    50% {
                        transform: translate(-4px, 8px) rotate(-45deg);
                    }

                    100% {
                        transform: translate(0px, 0px) rotate(0deg);
                    }
                }

                .magnifier .glass {
                    cx: 27;
                    cy: 27;
                    r: 8;
                    stroke-width: 3;
                }

                .magnifier .handle {
                    x1: 32;
                    y1: 32;
                    x2: 44;
                    y2: 44;
                    stroke-width: 3;
                }



                #results {
                    grid-area: results;
                    background: hsl(0, 0%, 95%);
                }

                
.dashboard-card-six .card-body .notice-box-wrap .notice-list .post-date.bg-first-followup {
    background-color: #25725e;
   
}

                #pagination-container {
    text-align: end;
    margin-top: 20px;
}
.page-link {
    border: 1px solid #dee2e6 !important;
    display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    background: transparent;
    color: #5e2572 !important;
    border: 1px solid transparent;
    cursor: default;
   
}
.page-link.active {
    color: #fff !important;
    background: #5e2572;
    border-color: #5e2572;
}
.ellipsis {
    display: inline-block;
    margin: 0 5px;
    color: #5e2572;
    font-weight: bold;
}

.page-link:hover{
    color: #5e2572;
}

.dropdown-item:active{
    background-color: #5e2572cc;
}

.card .card-body{
    padding: 10px;
}

.form-select:focus {
    border-color: #9357c2;
    outline: 0;
    box-shadow: 0 0 0 .25rem rgb(119 56 170 / 25%);
}
    </style>





    <div class="vz_main_container">
        <div class="vz_main_content">
            @include('admin.maintemplate.alert')

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <!-- Card for Today -->
                <li class="col-lg-4 nav-item">
                    <a class="nav-link active" id="today-tab" data-toggle="pill" href="#today" role="tab"
                        aria-controls="today" aria-selected="true">
                        <div class="card card-icon rt_icon_card text-center">

                            <div class="card-body">
                                <span class="heading_icon">
                                    <img src="{{ asset('assets/images/icon-bg.png') }}" alt="Icon">
                                    <i class="ti-calendar"></i>
                                </span>
                                <div class="icon_specs">
                                    <p>Today</p>
                                    <span>{{ count($organizedFollowUps['today']) }}</span>
                                </div>
                            </div>

                        </div>
                    </a>
                </li>

                <!-- Card for Pending -->
                <li class="col-lg-4 nav-item">
                    <a class="nav-link" id="pending-tab" data-toggle="pill" href="#pending" role="tab"
                        aria-controls="pending" aria-selected="false">
                        <div class="card card-icon rt_icon_card text-center">

                            <div class="card-body">
                                <span class="heading_icon">
                                    <img src="{{ asset('assets/images/icon-bg.png') }}" alt="Icon">
                                    <i class="ti-arrow-circle-left"></i>
                                </span>
                                <div class="icon_specs">
                                    <p>Pending</p>
                                    <span>{{ count($organizedFollowUps['pending']) }}</span>
                                </div>
                            </div>

                        </div>
                    </a>
                </li>

                <!-- Card for Upcoming -->
                <li class="col-lg-4 nav-item">
                    <a class="nav-link" id="upcoming-tab" data-toggle="pill" href="#upcoming" role="tab"
                        aria-controls="upcoming" aria-selected="false">
                        <div class="card card-icon rt_icon_card text-center">

                            <div class="card-body">
                                <span class="heading_icon">
                                    <img src="{{ asset('assets/images/icon-bg.png') }}" alt="Icon">
                                    <i class="ti-reload"></i>
                                </span>
                                <div class="icon_specs">
                                    <p>Upcoming</p>
                                    <span>{{ count($organizedFollowUps['upcoming']) }}</span>
                                </div>
                            </div>

                        </div>
                    </a>
                </li>
            </ul>
           

            <div class="row">
                <div class="col-12-xxxl col-12">
                    <table class="table  w-100 nowrap  no-footer">
                        <tbody>
                            <tr>
                                <td class="col-md-2">
                                    <input type="date" id="start_date"
                                        class="form-control form-control-sm datatable-input" style="padding: 8px;">
                                </td>
                                <td class="col-md-2">
                                    <input type="date" id="end_date"
                                        class="form-control form-control-sm datatable-input" style="padding: 8px;">
                                </td>
                                <td class="col-md-4">
                                    <select id="priorityDropdown" class="form-select datatable-input">
                                        <option value="">- Select {{ ucwords($menuNames['priority_' . $company_id] ?? 'Priority') }} -</option>
                                        @foreach ($prioritys as $priority)
                                            <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="col-md-4">
                                    <select id="domainClassDropdown" class="form-select datatable-input">
                                        <option value="">- Select {{ ucwords($menuNames['domain_class_' . $company_id] ?? 'Domain') }} -</option>
                                        @foreach ($domains as $domain)
                                            <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                                        @endforeach
                                    </select>
                                </td>



                                <td>

                                    <button type="button" class="btn btn-dark" id="kt_reset">Reset</button>
                                    
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="itemsPerPageDropdown">Show &nbsp;&nbsp;
                            <select id="itemsPerPageDropdown">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                            </select>
                            &nbsp;&nbsp;Entry
                        </label>
                    </div>
                    <div class="col-md-4 mb-3">
                    </div>

                    <div class="col-md-4 mb-3">
                        <div id="search">
                            <svg viewBox="0 0 420 60" xmlns="http://www.w3.org/2000/svg">
                                <rect class="bar" />

                                <g class="magnifier">
                                    <circle class="glass" />
                                    <line class="handle" x1="32" y1="32" x2="44" y2="44"></line>
                                </g>

                                <g class="sparks">
                                    <circle class="spark" />
                                    <circle class="spark" />
                                    <circle class="spark" />
                                </g>

                                <g class="burst pattern-one">
                                    <circle class="particle circle" />
                                    <path class="particle triangle" />
                                    <circle class="particle circle" />
                                    <path class="particle plus" />
                                    <rect class="particle rect" />
                                    <path class="particle triangle" />
                                </g>
                                <g class="burst pattern-two">
                                    <path class="particle plus" />
                                    <circle class="particle circle" />
                                    <path class="particle triangle" />
                                    <rect class="particle rect" />
                                    <circle class="particle circle" />
                                    <path class="particle plus" />
                                </g>
                                <g class="burst pattern-three">
                                    <circle class="particle circle" />
                                    <rect class="particle rect" />
                                    <path class="particle plus" />
                                    <path class="particle triangle" />
                                    <rect class="particle rect" />
                                    <path class="particle plus" />
                                </g>
                            </svg>
                            <input type=search id="searchInput" name=q aria-label="Search for inspiration" />
                        </div>
                    </div>
                </div>


                {{-- <div class="col-2 mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search follow-ups...">
                    </div> --}}



                <!-- Tab with Pill -->
                {{-- <div class="card_title">Follow Up</div> --}}

              
                <div class="tab-content" id="pills-tabContent">
                    @foreach (['today', 'pending', 'upcoming'] as $tab)
                        <div class="tab-pane fade {{ $tab == 'today' ? 'show active' : '' }}" id="{{ $tab }}"
                            role="tabpanel" aria-labelledby="{{ $tab }}-tab">
                            @if (isset($organizedFollowUps[$tab]) && count($organizedFollowUps[$tab]) > 0)
                                <!-- Sort students by the most recent follow-up update -->
                               

                                @foreach ($organizedFollowUps[$tab]  as $studentFollowUps)
                                    <div class="dashboard-card-six" data-priority="{{ $studentFollowUps['student']->priority_id }}"
                                        data-domain="{{ $studentFollowUps['student']->domain }}" data-last-follow-up-date="{{ \Carbon\Carbon::parse($studentFollowUps['lastFollowUpDate'])->toDateString() }}">
                                        <div class="card-body" style="margin-bottom: 20px;">
                                            <div class="heading-layout1">

                                                <div class="item-title">
                                                    <div class="col text-center">
                                                        <p class="mb-1">Name</p>
                                                        <h5>{{ Str::ucfirst($studentFollowUps['student']->name) }}</h5>
                                                    </div>

                                                </div>
                                                <div class="item-title">
                                                    <div class="col text-center">
                                                        <p class="mb-1">Contact No</p>
                                                        <h5>{{ $studentFollowUps['student']->mobile }}</h5>
                                                    </div>

                                                </div>
                                                <div class="item-title">
                                                    <div class="col text-center">
                                                        <p class="mb-1">City</p>
                                                        <h5>{{ Str::ucfirst($studentFollowUps['student']->city) }}</h5>
                                                    </div>

                                                </div>
                                                <div class="item-title">
                                                    <div class="col text-center">
                                                        <p class="mb-1">Made By</p>
                                                        <h5>{{ Str::ucfirst($studentFollowUps['student']->createdby->name) }}
                                                        </h5>
                                                    </div>


                                                </div>
                                                <div class="item-title">
                                                    <div class="col text-center">
                                                        <p class="mb-1">{{ $menuNames['domain_class_' . $company_id] ?? 'Domain/Class' }} Name</p>
                                                        <span
                                                            class="badge badge-pill mb-3 {{ $studentFollowUps['student']->domainClass->color ?? 'badge-secondary' }}">{{ Str::ucfirst($studentFollowUps['student']->domainClass->name) ?? 'No Domain' }}</span>
                                                    </div>

                                                </div>
                                                <div class="item-title">
                                                    <div class="col text-center">
                                                        <p class="mb-1">{{ $menuNames['priority_' . $company_id] ?? 'Priority' }}</p>
                                                        <span
                                                            class="badge badge-pill mb-3 {{ $studentFollowUps['student']->priority->color ?? 'badge-secondary' }}">{{ Str::ucfirst($studentFollowUps['student']->priority->name) ?? 'No Domain' }}</span>
                                                    </div>

                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        data-toggle="dropdown" aria-expanded="false">...</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @can('follow_up.edit')
                                                            <a class="dropdown-item"
                                                                href="{{ route('follow_up.edit', $studentFollowUps['student']->id) }}"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        @endcan

                                                        @can('admission.edit')
                                                        <a class="dropdown-item" href="#"
                                                        onclick="event.preventDefault(); admissionConfirmation('{{ route('admission.edit', $studentFollowUps['student']->id) }}');">
                                                         <i class="fa fa-check-circle text-orange-peel"></i>Admission
                                                     </a>
                                                     @endcan
                                                     

                                                            @can('follow_up.delete')
                                                            <a class="dropdown-item" href="#"
                                                                onclick="event.preventDefault(); 
                                                                    deleteConfirmation('{{ $studentFollowUps['student']->id }}', '{{ route('follow_up.destroy', $studentFollowUps['student']->id) }}');">
                                                                <i class="fas fa-times text-orange-red"></i> Delete
                                                            </a>
                                                        
                                                            <form id="delete-form-{{ $studentFollowUps['student']->id }}" 
                                                                  action="{{ route('follow_up.destroy', $studentFollowUps['student']->id) }}" 
                                                                  method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notice-box-wrap">
                                                <hr style="border-top: 1px solid rgb(94 37 114);">

                                                <!-- Sort the follow-ups by created_at, with the most recent follow-up shown first -->
                                                @php
                                                    // Sort follow-ups by created_at in descending order
                                                    $sortedFollowUps = $studentFollowUps['followUps']->sortByDesc(
                                                        'created_at',
                                                    );
                                                @endphp

                                                @foreach ($sortedFollowUps as $index => $followUp)
                                                    <div class="notice-list">
                                                        @if ($index == 0)
                                                            <!-- Add image for the first follow-up -->
                                                            <div class="follow-up-image">
                                                                <span class="badge badge-pill mb-3 badge-light"><i
                                                                        class="ion-star"> </i>First Followup</span>
                                                            </div>
                                                        @endif
                                                        <div class="post-date {{ $index == 0 ? 'bg-first-followup' : 'bg-default' }}">
                                                            {{ \Carbon\Carbon::parse($followUp['original_date'])->format('d F, Y') }}
                                                        </div>
                                                        <h6 class="notice-title">
                                                            <p style="color: black;font-size: 15px;">
                                                                {{ $followUp['message'] }}</p>
                                                        </h6>

                                                        @if ($index > 0)
                                                            <div class="entry-meta"> Edited Date:
                                                                <span>{{ \Carbon\Carbon::parse($followUp['created_at'])->format('d F, Y') }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <center><button class="read-more-btn"><i
                                                        class="fas fa-arrow-down"></i></button></center>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col-12-xxxl col-12">
                                        <div class="card newcard dashboard-card-six">
                                            <div class="card-body">
                                                <div class="alert alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <strong>Opps!</strong> No Followups Available.
                                                    <i class="ion-ios-information"
                                                        style="position: absolute; right: 10px; top: 2px; font-size: 25px; color: #ffff;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <div id="pagination-container"></div>

                </div>
                <!-- Tab With Pill -->
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
        function deleteConfirmation(id, url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form programmatically
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
    function admissionConfirmation(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to proceed to the Admission form. Do you want to continue?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, proceed',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to the admission form
            window.location.href = url;
        }
    });
}

        $(document).ready(function() {
            // Set initial state
            let isExpanded = false;

            $(".dashboard-card-six").each(function() {
                const noticeBox = $(this).find(".notice-box-wrap");
                const followUps = noticeBox.find(".notice-list");

                // Check if follow-ups exceed threshold (e.g., 2)
                if (followUps.length > 2) {
                    noticeBox.css({
                        "max-height": "420px", // Adjust as needed
                        "overflow-y": "hidden",
                    });
                    $(this).find(".read-more-btn").show(); // Show arrow button
                } else {
                    noticeBox.css({
                        "max-height": "none",
                        "overflow-y": "visible",
                    });
                    $(this).find(".read-more-btn").hide(); // Hide arrow button
                }
            });

            // Toggle expand/collapse
            $(".read-more-btn").click(function() {
                const noticeBox = $(this).closest(".dashboard-card-six").find(".notice-box-wrap");

                if (isExpanded) {
                    noticeBox.css({
                        "max-height": "420px", // Collapse to fixed height
                        "overflow-y": "hidden",
                    });
                    $(this).html('<i class="fas fa-arrow-down"></i>');
                } else {
                    noticeBox.css({
                        "max-height": "none", // Expand fully
                        "overflow-y": "visible",
                    });
                    $(this).html('<i class="fas fa-arrow-up"></i>');
                }

                isExpanded = !isExpanded;
            });
        });



    document.addEventListener('DOMContentLoaded', function () {
   
    const itemsPerPageDropdown = document.getElementById('itemsPerPageDropdown');
    const paginationContainer = document.getElementById('pagination-container');
    let itemsPerPage = parseInt(itemsPerPageDropdown.value, 10); // Use radix 10 for decimal parsing
    const tabPaginationStates = {}; // Store pagination state per tab
    const filters = {
        startDate: '',
        endDate: '',
        priority: '',
        domain: '',
        searchText: '',
    };

    // Default Active Tab Detection on Page Load
    let activeTab = document.querySelector('.tab-pane.show.active').id;
    

    // Initialize Pagination States for All Tabs
    document.querySelectorAll('.tab-pane').forEach(tabPane => {
        const tabId = tabPane.id;
        tabPaginationStates[tabId] = { currentPage: 1 };
    });

    // Handle Items Per Page Dropdown
    itemsPerPageDropdown.addEventListener('change', function () {
        itemsPerPage = parseInt(this.value, 10); // Correct radix
       
        applyFiltersAndPaginate();
    });

    // Handle Tab Switching
    document.querySelectorAll('.nav-link[role="tab"]').forEach(tabLink => {
        tabLink.addEventListener('click', function () {
            // Detect Active Tab Dynamically
            activeTab = this.getAttribute('aria-controls');
         

            // Reapply Filters and Pagination for the Active Tab
            applyFiltersAndPaginate();
        });
    });

    // Apply Filters and Paginate
    function applyFiltersAndPaginate() {
        const followUpCards = Array.from(document.querySelectorAll(`#${activeTab} .dashboard-card-six`));
      

        // Filter Logic
        const filteredCards = followUpCards.filter(card => filterCard(card));

        // Paginate Filtered Items
        paginateFollowUps(activeTab, filteredCards);
    }

    // Card Filtering Logic
    function filterCard(card) {
        const cardPriority = card.getAttribute('data-priority');
        const cardDomain = card.getAttribute('data-domain');
        const lastFollowUpDate = card.getAttribute('data-last-follow-up-date');
        const cardText = card.innerText.toLowerCase();

        const matchesDate =
            (!filters.startDate || new Date(lastFollowUpDate) >= new Date(filters.startDate)) &&
            (!filters.endDate || new Date(lastFollowUpDate) <= new Date(filters.endDate));
        const matchesPriority = !filters.priority || filters.priority === cardPriority;
        const matchesDomain = !filters.domain || filters.domain === cardDomain;
        const matchesSearch = !filters.searchText || cardText.includes(filters.searchText);

        return matchesDate && matchesPriority && matchesDomain && matchesSearch;
    }

    // Pagination Logic
    function paginateFollowUps(tabId, filteredCards) {
        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage); // Fixed radix issue
        const paginationState = tabPaginationStates[tabId];
        let currentPage = paginationState.currentPage;

       

        paginationContainer.innerHTML = '';

        if (totalItems === 0) {
            filteredCards.forEach(card => (card.style.display = 'none'));
         
            return; 
        }

        // Ensure Current Page is Valid
        currentPage = Math.min(currentPage, totalPages);
        paginationState.currentPage = currentPage;

        // Show the Items for the Current Page
        showPage(filteredCards, currentPage);

        if (totalPages > 1) {
            renderPaginationControls(tabId, totalPages, filteredCards);
        }
    }

    function showPage(cards, pageNumber) {
        const startIndex = (pageNumber - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

      

        cards.forEach((card, index) => {
            const isVisible = index >= startIndex && index < endIndex;
          
            card.style.display = isVisible ? 'block' : 'none';
        });
    }

    function renderPaginationControls(tabId, totalPages, filteredCards) {
    const currentPage = tabPaginationStates[tabId].currentPage;
    const maxVisibleLinks = 5; // Maximum number of page links to display at a time

    console.log(`Rendering pagination for Tab "${tabId}" with Total Pages: ${totalPages}`);

    paginationContainer.innerHTML = ''; // Clear existing pagination controls

    // Previous Button
    const prevButton = createPaginationButton('Previous', currentPage > 1, () => {
        tabPaginationStates[tabId].currentPage--;
        paginateFollowUps(tabId, filteredCards);
    });
    paginationContainer.appendChild(prevButton);

    // Calculate start and end page for visible range
    let startPage = Math.max(1, currentPage - Math.floor(maxVisibleLinks / 2));
    let endPage = Math.min(totalPages, startPage + maxVisibleLinks - 1);

    // Adjust startPage if there aren't enough pages at the end
    if (endPage - startPage + 1 < maxVisibleLinks) {
        startPage = Math.max(1, endPage - maxVisibleLinks + 1);
    }

    // Add "..." if startPage > 1
    if (startPage > 1) {
        paginationContainer.appendChild(createPaginationButton(1, true, () => {
            tabPaginationStates[tabId].currentPage = 1;
            paginateFollowUps(tabId, filteredCards);
        }));
        if (startPage > 2) {
            paginationContainer.appendChild(createEllipsis());
        }
    }

    // Render page links within the visible range
    for (let i = startPage; i <= endPage; i++) {
        const pageButton = createPaginationButton(i, i !== currentPage, () => {
            tabPaginationStates[tabId].currentPage = i;
            paginateFollowUps(tabId, filteredCards);
        });
        if (i === currentPage) {
            pageButton.classList.add('active');
        }
        paginationContainer.appendChild(pageButton);
    }

    // Add "..." if endPage < totalPages
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            paginationContainer.appendChild(createEllipsis());
        }
        paginationContainer.appendChild(createPaginationButton(totalPages, true, () => {
            tabPaginationStates[tabId].currentPage = totalPages;
            paginateFollowUps(tabId, filteredCards);
        }));
    }

    // Next Button
    const nextButton = createPaginationButton('Next', currentPage < totalPages, () => {
        tabPaginationStates[tabId].currentPage++;
        paginateFollowUps(tabId, filteredCards);
    });
    paginationContainer.appendChild(nextButton);
}

function createEllipsis() {
    const ellipsis = document.createElement('span');
    ellipsis.textContent = '...';
    ellipsis.classList.add('ellipsis');
    return ellipsis;
}


    function createPaginationButton(label, enabled, onClick) {
        const button = document.createElement('button');
        button.textContent = label;
        button.classList.add('page-link');
        button.disabled = !enabled;
        if (enabled) button.addEventListener('click', onClick);
        return button;
    }

    // Update Filters
    function updateFilters() {
        filters.startDate = document.getElementById('start_date').value;
        filters.endDate = document.getElementById('end_date').value;
        filters.priority = document.getElementById('priorityDropdown').value;
        filters.domain = document.getElementById('domainClassDropdown').value;
        filters.searchText = document.getElementById('searchInput').value.toLowerCase();

        applyFiltersAndPaginate();
    }

    // Add Filter Event Listeners
    document.getElementById('start_date').addEventListener('change', updateFilters);
    document.getElementById('end_date').addEventListener('change', updateFilters);
    document.getElementById('priorityDropdown').addEventListener('change', updateFilters);
    document.getElementById('domainClassDropdown').addEventListener('change', updateFilters);
    document.getElementById('searchInput').addEventListener('input', updateFilters);

    // Reset Filters
    document.getElementById('kt_reset').addEventListener('click', function () {
        Object.keys(filters).forEach(key => (filters[key] = ''));
        document.getElementById('start_date').value = '';
        document.getElementById('end_date').value = '';
        document.getElementById('priorityDropdown').value = '';
        document.getElementById('domainClassDropdown').value = '';
        document.getElementById('searchInput').value = '';
        applyFiltersAndPaginate();
    });

    // Apply Filters and Pagination on Page Load
    applyFiltersAndPaginate();
});


        document.getElementById('searchInput').addEventListener('input', filterData);
document.getElementById('priorityDropdown').addEventListener('change', filterData);
document.getElementById('domainClassDropdown').addEventListener('change', filterData);
document.getElementById('start_date').addEventListener('change', filterData);
document.getElementById('end_date').addEventListener('change', filterData);

document.getElementById('kt_reset').addEventListener('click', resetFilters);

function resetFilters() {
    // Reset the input fields and dropdowns to their default state
    document.getElementById('searchInput').value = '';
    document.getElementById('priorityDropdown').value = '';
    document.getElementById('domainClassDropdown').value = '';
    document.getElementById('start_date').value = '';
    document.getElementById('end_date').value = '';

    // Trigger the filter function to show all data
    filterData();
}

function filterData() {
    const searchQuery = document.getElementById('searchInput').value.toLowerCase();
    const selectedPriority = document.getElementById('priorityDropdown').value;
    const selectedDomainClass = document.getElementById('domainClassDropdown').value;
    
    // Get the selected start and end dates
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;

    // Convert start and end dates to Date objects for comparison
    const start = startDate ? new Date(startDate) : null;
    const end = endDate ? new Date(endDate) : null;

    const rows = document.querySelectorAll('.tab-pane .dashboard-card-six');

    rows.forEach(row => {
        const studentName = row.querySelector('.item-title h5')?.textContent.toLowerCase();
        const contactNo = row.querySelectorAll('.item-title h5')[1]?.textContent.toLowerCase();
        const city = row.querySelectorAll('.item-title h5')[2]?.textContent.toLowerCase();
        const createdBy = row.querySelectorAll('.item-title h5')[3]?.textContent.toLowerCase();
        
        // Get the last follow-up date from the data attribute
        const lastFollowUpDateStr = row.getAttribute('data-last-follow-up-date');
        const lastFollowUpDate = new Date(lastFollowUpDateStr);

        const domainClass = row.dataset.domain;
        const priority = row.dataset.priority;

        // Check if the search query matches any of the fields
        const matchesSearchQuery = (
            (studentName && studentName.includes(searchQuery)) ||
            (contactNo && contactNo.includes(searchQuery)) ||
            (city && city.includes(searchQuery)) ||
            (createdBy && createdBy.includes(searchQuery))
        );

        // Check if the priority and domain match the selected filters
        const matchesPriority = !selectedPriority || priority === selectedPriority;
        const matchesDomainClass = !selectedDomainClass || domainClass === selectedDomainClass;

        // Check if the last follow-up date is within the selected date range
        let matchesDateRange = true;
        if (start && lastFollowUpDate < start) {
            matchesDateRange = false; // Last follow-up date is before the start date
        }
        if (end && lastFollowUpDate > end) {
            matchesDateRange = false; // Last follow-up date is after the end date
        }

        // Show or hide the row based on all filter conditions
        if (matchesSearchQuery && matchesPriority && matchesDomainClass && matchesDateRange) {
            row.style.display = ''; // Show the card
        } else {
            row.style.display = 'none'; // Hide the card
        }
    });
}



    </script>
@endsection
