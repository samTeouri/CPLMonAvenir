@extends('layouts.app')

@section('content')
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        @include('components.sidebar')

        @include('components.navbar')

        <main id="main-container">
            @yield('main-content')
        </main>

        @include('components.footer')
    </div>
@endsection
