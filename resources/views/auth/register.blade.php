

<!doctype html>
<html lang="zxx">

<!-- Mirrored from rtsolutz.com/raven/demo-gelr/gelr-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2024 12:35:03 GMT -->
<head>
    <!--=========================*
                Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gelr Bootstrap 4 Admin Template">

    <!--=========================*
              Page Title
    *===========================-->
    <title>Register | Gelr Bootstrap 4 Admin Template</title>

    <!--=========================*
                Favicon
    *===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

    <!--=========================*
            Bootstrap Css
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--=========================*
              Custom CSS
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--=========================*
               Owl CSS
    *===========================-->
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">

    <!--=========================*
            Font Awesome
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!--=========================*
             Themify Icons
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">

    <!--=========================*
               Ionicons
    *===========================-->
    <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet"/>

    <!--=========================*
              EtLine Icons
    *===========================-->
    <link href="{{ asset('assets/css/et-line.css') }}" rel="stylesheet"/>

    <!--=========================*
              Feather Icons
    *===========================-->
    <link href="{{ asset('assets/css/feather.css') }}" rel="stylesheet"/>

    <!--=========================*
              Modernizer
    *===========================-->
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>

    <!--=========================*
               Metis Menu
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">

    <!--=========================*
               Perfect SB
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/perfect-scrollbar.min.css') }}    ">

    <!--=========================*
              Flag Icons
    *===========================-->
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet"/>

    <!--=========================*
               Slick Menu
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }} ">

    <!--=========================*
            Google Fonts
    *===========================-->

    <!-- Montserrat USE: font-family: 'Montserrat', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <style>
        select.form-control:not([size]):not([multiple]) {
    width: 100%;
    height: 30px;
    border: none;
    border-bottom: 1px solid #e6e6e6;
    font-size: 12px;
    height: calc(2.25rem + 2px);
}

/* ... existing styles ... */
.error-tooltip {
        position: absolute;
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        z-index: 1000;
        white-space: nowrap;
        /* New positioning styles */
        right: 100%; /* Position to the left of the input */
        top: 50%; /* Align with middle of input */
        transform: translateY(-50%); /* Center vertically */
        margin-right: 10px; /* Space between error and input */
    }

    /* Add arrow to tooltip */
    .error-tooltip:after {
        content: '';
        position: absolute;
        right: -5px;
        top: 50%;
        transform: translateY(-50%);
        border-left: 5px solid #dc3545;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
    }

    .form-gp {
        position: relative;
        margin-bottom: 25px;
    }
    </style>

<div class="limiter">
    
    <div class="container-login100">
        @include('admin.maintemplate.form_alert')
        <div class="wrap-login100">
            <form id="register_form" class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="login-form-body text-center p-4">
                    <img src="{{ asset('assets/images/logo-login.svg') }}" class="mb-5" alt="Logo">
                    <div class="form-gp">
                        <label>Full Name</label>
                        <input type="text" id="exampleInputName1" name="name" value="{{ old('name') }}" required>
                        <i class="ti-user"></i>
                    </div>
                    <!-- company name -->
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text"  name="company_name" value="{{ old('company_name') }}" required>
                        <i class="ti-id-badge"></i>


                    </div>
                    <!-- email -->
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email"  name="email" value="{{ old('email') }}" required>
                        <i class="ti-email"></i>
                    </div>

                    <!-- contact number -->
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="text" name="contact_number" value="{{ old('contact_number') }}" required>
                        <i class="ti-mobile"></i>
                    </div>

                    <!-- teamsize dropdown -->
                    <div class="form-gp">
                       
                        <select name="team_size" id="team_size" class="form-control">
                           <option value="">Select Team Size</option>
                            <option value="1-10">1-10</option>
                            <option value="11-50">11-50</option>
                            <option value="51-100">51-100</option>
                            <option value="101-500">101-500</option>
                        </select>
                    </div>

                    <!-- select industry -->
                    <div class="form-gp">
                        
                        <select name="industry" id="industry" class="form-control">
                            <option value="">Select Industry</option>
                            <option value="IT / ITES">IT / ITES</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Marketing Agency">Marketing Agency</option>
                            <option value="Real Estate">Real Estate</option>
                            <option value="Travel & Hospitality">Travel & Hospitality</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>  
                    
                  
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" class="btn btn-primary">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="{{route('login')}}" class="text-primary">Sign in</a></p>
                    </div>
                </div>

            </form>

            

            <div class="login100-more" style="background-image: url('{{ asset('assets/images/bg-reg.jpg') }}');">
            </div>
        </div>
    </div>
</div>


<!--=========================*
            Scripts
*===========================-->

<!-- Jquery Js -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
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
<!-- Fancy Box Js -->
<script src="{{ asset('assets/js/jquery.fancybox.pack.js') }}"></script>

<!-- This Page Js -->
<script>
    jQuery(document).ready(function ($) {
        $('.form-gp input').on('focus', function() {
            $(this).parent('.form-gp').addClass('focused');
        });
        $('.form-gp input').on('focusout', function() {
            if ($(this).val().length === 0) {
                $(this).parent('.form-gp').removeClass('focused');
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script> 
<script>
   

   $(document).ready(function() {
    // Add custom validation methods
    $.validator.addMethod("safeInput", function(value, element) {
        return /^[a-zA-Z\s]+$/.test(value);
    }, "Invalid characters in name");

    $.validator.addMethod("validEmailChars", function(value, element) {
        return /^[a-zA-Z0-9@.]+$/.test(value);
    }, "Email can only contain letters, numbers, '.' and '@' characters");

    $("#register_form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50, // Changed from 5 to more reasonable length
                safeInput: true
            },
            email: {
                required: true,
                email: true,
                maxlength: 100,
                validEmailChars: true
            },
            company_name: {
                required: true,
                maxlength: 100,
                safeInput: true
            },
            contact_number: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10
            },
            team_size: {
                required: true
            },
            industry: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                maxlength: "Name cannot be more than 50 characters",
                safeInput: "Name can only contain letters and spaces"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
                maxlength: "Email cannot be more than 100 characters"
            },
            company_name: {
                required: "Please enter company name",
                maxlength: "Company name cannot be more than 100 characters",
                safeInput: "Company name can only contain letters and spaces"
            },
            contact_number: {
                required: "Please enter contact number",
                number: "Please enter valid number",
                minlength: "Contact number must be 10 digits",
                maxlength: "Contact number must be 10 digits"
            },
            team_size: {
                required: "Please select team size"
            },
            industry: {
                required: "Please select industry"
            }
        },
        errorClass: "error-tooltip",
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
            var pos = element.position();
            error.css({
                'display': 'block',
                'position': 'absolute',
                'top': '50%',
                'right': '100%',
                'transform': 'translateY(-50%)',
                'margin-right': '10px'
            });
        },
        highlight: function(element, errorClass) {
            $(element).addClass('is-invalid');
            $(element).parent('.form-gp').addClass('has-error');
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass('is-invalid');
            $(element).parent('.form-gp').removeClass('has-error');
        },
        // Validate on keyup
        onkeyup: function(element) {
            $(element).valid();
        }
    });

    // Update error positions on window resize
    $(window).on('resize', function() {
        $('.error-tooltip').each(function() {
            var element = $(this).prev();
            var pos = element.position();
            $(this).css({
                'top': '50%',
                'right': '100%',
                'transform': 'translateY(-50%)',
                'margin-right': '10px'
            });
        });
    });
});
</script>
</body>

<!-- Mirrored from rtsolutz.com/raven/demo-gelr/gelr-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2024 12:35:04 GMT -->
</html>

