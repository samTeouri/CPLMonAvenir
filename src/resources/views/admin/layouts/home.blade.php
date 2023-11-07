@extends('layouts.app')

@section('content')
<div id="page-container" class="sidebar-o sidebar-dark sidebar-mini enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    @include('admin.layouts.sidebar')

    @include('admin.layouts.navbar')

    <main id="main-container">
        @yield('main-content')
    </main>

    @include('admin.layouts.footer')
</div>

@endsection
