<!DOCTYPE html>
<html class="no-js" lang="zxx">


@include('admin.layouts.head')


<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!--=========================*
       Page Content
       *===========================-->
    <div class="vz_main_sec">
       <!--=========================*
          Sidebar
          *===========================-->
          @include('admin.layouts.nav')

            <!--=========================*
            Header
            *===========================-->

          @include('admin.layouts.header')

          
    @yield('content')
    


        </div>
        <!--=========================*
           End Page Content
           *===========================-->
   
<!--=========================*
            Scripts
*===========================-->


<!-- bootstrap 4 js -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Owl Carousel Js -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Metis Menu Js -->
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<!-- SlimScroll Js -->
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<!-- Slick Nav -->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>



<!-- Ladda Button init Js -->
{{-- <script src="{{ asset('assets/js/init/ladda-button.js') }}"></script> --}}

<!-- start amchart js -->
<script src="{{ asset('assets/vendors/am-charts/am4/core.js') }}"></script>
<script src="{{ asset('assets/vendors/am-charts/am4/charts.js') }}"></script>
<script src="{{ asset('assets/vendors/am-charts/am4/animated.js') }}"></script>

<!-- flot chart -->
<script src="{{ asset('assets/vendors/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.resize.min.js') }}"></script>

<!--Morris Chart-->
<script src="{{ asset('assets/vendors/charts/morris-bundle/raphael.min.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/morris-bundle/morris.js') }}"></script>

<!--Chart Js-->
<script src="{{ asset('assets/vendors/charts/charts-bundle/Chart.bundle.js') }}"></script>

<!--Apex Chart-->
<script src="{{ asset('assets/vendors/apex/js/apexcharts.min.js') }}"></script>

<!--EChart-->
<script src="{{ asset('assets/vendors/charts/echarts/echarts-en.min.js') }}"></script>

<!--Home Script-->
<script src="{{ asset('assets/js/home.js') }}"></script>

<!--Perfect Scrollbar-->
<script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>




<script src="{{ asset('assets/vendors/data-table/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/data-table/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/data-table/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendors/data-table/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendors/data-table/js/responsive.bootstrap.min.js') }}"></script>

<!-- Toastr Js -->
<script src="{{ asset('assets/vendors/toastr/js/toastr.min.js') }}"></script>
<!-- Toastr Init -->
<script src="{{ asset('assets/js/init/toastr.js') }}"></script>

<!-- Data table Init -->
<script src="{{ asset('assets/js/init/data-table.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- Calendar Init -->
<script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/vendors/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>



<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.all.min.js"></script>


<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

<!-- Mirrored from rtsolutz.com/raven/demo-gelr/gelr-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2024 12:30:52 GMT -->
</html>
