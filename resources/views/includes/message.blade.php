<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "4000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}", 'Success');

        let app = document.URL.indexOf( 'http://' ) === -1 && document.URL.indexOf( 'https://' ) === -1;
        if(app) {
            navigator.notification.beep();
        }
    </script>
@endif

@if (session('status'))
    <script>
        toastr.success("{{ session('status') }}", 'Success');

        let app = document.URL.indexOf( 'http://' ) === -1 && document.URL.indexOf( 'https://' ) === -1;
        if(app) {
            navigator.notification.beep();
        }
    </script>
@endif

@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}", 'Failed');
        
        let app = document.URL.indexOf( 'http://' ) === -1 && document.URL.indexOf( 'https://' ) === -1;
        if(app) {
            navigator.notification.beep();
        }
    </script>
@endif