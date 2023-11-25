<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('assets/css/oneui.min.css') }}">

    <title>CPL Mon Avenir</title>
</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark sidebar-mini enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        @include('layouts.sidebar')

        @include('layouts.navbar')

        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill h3 my-2">
                            Sidebar <small class="font-size-base font-w400 text-muted">Mini</small>
                        </h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">Layout</li>
                                <li class="breadcrumb-item">Sidebar</li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a class="link-fx" href="">Mini</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <div class="block block-rounded">
                    <div class="block-content text-center">
                        <p>
                            You can have a mini Sidebar.
                        </p>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        @include('layouts.footer')
    </div>

    <script src="{{ asset('assets/js/core/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/js.cookie.min.js') }}"></script>

    <script src="{{ asset('assets/js/oneui.core.min.js') }}"></script>
    <script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>

    @yield('dashboard-scripts')
</body>

</html>
