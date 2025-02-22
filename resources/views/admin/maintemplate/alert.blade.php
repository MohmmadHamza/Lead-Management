@if (session('success'))
    <div id="success-alert" class="alert alert-success" role="alert">
        <strong>Well Done!</strong> {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="error-alert" class="alert alert-danger" role="alert">
        <strong>Ohh Snap!</strong> {{ session('error') }}
    </div>
@endif

    
<script>
    $(document).ready(function() {
        
        setTimeout(function() {
            $('#success-alert').fadeOut('slow');
        }, 3000);

        
        setTimeout(function() {
            $('#error-alert').fadeOut('slow');
        }, 3000);
    });
</script>


