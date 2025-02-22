{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<html lang="zxx" style="" class="js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"><head>
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
    <title>Sign In | Gelr Bootstrap 4 Admin Template</title>

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

<style type="text/css">
.fancybox-margin{margin-right:0px;}
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
</style></head>
<body cz-shortcut-listen="true">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" id="login_form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-form-body text-center p-4">
                    <img src="assets/images/logo-login.svg" class="mb-5" alt="Logo">
                    
                    <!-- Email Field -->
                    <div class="form-gp">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        <i class="ti-email"></i>
                        @if ($errors->has('email'))
                            <p class="text-danger mt-2">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
            
                    <!-- Password Field -->
                    <div class="form-gp">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <i class="ti-lock"></i>
                        @if ($errors->has('password'))
                            <p class="text-danger mt-2">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
            
                    <!-- Remember Me -->
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox primary-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                            @endif
                        </div>
                    </div>
            
                    <!-- Submit Button -->
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" class="btn btn-primary">
                            Submit <i class="ti-arrow-right"></i>
                        </button>
                    </div>
            
                    <!-- Signup Link -->
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? 
                            <a href="{{ route('register') }}" class="text-primary">Sign up</a>
                        </p>
                    </div>
                </div>
            </form>
            

            <div class="login100-more" style="background-image: url('assets/images/bg-01.jpg');">
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script> 
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


    $(document).ready(function() {
    // Add custom validation methods
    $.validator.addMethod("safeInput", function(value, element) {
        return /^[a-zA-Z\s]+$/.test(value);
    }, "Invalid characters in name");

    $.validator.addMethod("validEmailChars", function(value, element) {
        return /^[a-zA-Z0-9@.]+$/.test(value);
    }, "Email can only contain letters, numbers, '.' and '@' characters");

    $("#login_form").validate({
        rules: {
            
            email: {
                required: true,
                email: true,
                maxlength: 100,
                validEmailChars: true
            },
            
        },
        messages: {
           
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
                maxlength: "Email cannot be more than 100 characters"
            },
            
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

</body></html>