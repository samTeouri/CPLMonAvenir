<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CPL Mon Avenir') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/js/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzone/dist/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">

    <!-- Scripts -->

</head>

<body>
    @yield('content')
    <script src="{{ asset('assets/js/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/js.cookie.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/oneui.core.min.js') }}"></script>
    <script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_pages_dashboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <script>
        jQuery(function() {
            One.helpers('notify');
        });
    </script>
    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
    <script>
        jQuery(function() {
            One.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs',
                'rangeslider'
            ]);
        });
    </script>

    <script>
        // changement de l'année dans l'application
        $("#change-year").on("change", function(e) {
            let annee_id = e.target.value
            $.ajax({
                type: 'GET',
                url: `/changeYear/${annee_id}`,
                success: function(response) {
                    // Vérifiez si la requête a réussi du côté serveur
                    if (response.success) {
                        alert(response.message);
                        window.location.href = response.url;
                    } else {

                    }
                },
                error: function(xhr, status, error) {
                    // Gérer les erreurs de requête Ajax
                    console.log(`status ${status}`)
                    console.log(`error: ${error}`)
                }
            })
        })
    </script>



</body>

</html>
