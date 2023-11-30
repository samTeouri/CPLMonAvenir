@extends('layouts.app')

{{-- @section('content')
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="hero-static">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <!-- Sign In Block -->
                            <div class="block block-rounded block-themed mb-0">
                                <div class="block-header bg-primary-dark">
                                    <h3 class="block-title">Connexion</h3>
                                    <div class="block-options">
                                        @if (Route::has('password.request'))
                                            <a class="btn-block-option font-size-sm"
                                                href="{{ route('password.request') }}">Mot de passe oublié?</a>
                                        @endif
                                        <a class="btn-block-option" href="{{ route('register') }}" data-toggle="tooltip"
                                            data-placement="left" title="New Account">
                                            <i class="fa fa-user-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 py-lg-5">
                                        <h1 class="h2 mb-1">CPL Mon Avenir</h1>
                                        <p class="text-muted">
                                            Bienvenue, connectez vous à votre compte
                                        </p>
                                        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-alt form-control-lg @error('username') is-invalid @enderror"
                                                        value="{{ old('username') }}" id="username" name="username"
                                                        placeholder="Nom d'utilisateur" required autocomplete="username"
                                                        autofocus>
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror"
                                                        value="{{ old('password') }}" id="password" name="password"
                                                        placeholder="Mot de passe" required autocomplete="password"
                                                        autofocus>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}">
                                                        <label class="custom-control-label font-w400" for="remember">Se
                                                            rappeler de moi ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12 col-xl-12">
                                                    <button type="submit" class="btn btn-block btn-alt-primary">
                                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Connexion
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END Sign In Form -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Sign In Block -->
                        </div>
                    </div>
                </div>
                <div class="content content-full font-size-sm text-muted text-center">
                    <strong>CPL Mon Avenir</strong> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </main>
    </div>
@endsection --}}

@section('content')
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('{{ asset('assets/images/primaire.jpg') }}');">
                <div class="hero-static d-flex align-items-center">
                    <div class="w-100">
                        <!-- Unlock Section -->
                        <div class="bg-white">
                            <div class="content content-full">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-6 col-xl-4 py-4">

                                        <!---- Header ---->
                                        <div class="text-center">
                                            <p class="mb-2">
                                                <i class="fa fa-2x fa-circle-notch text-success"></i>
                                            </p>
                                            <h1 class="h4 mb-1">
                                                Connexion
                                            </h1>
                                            <h2 class="h6 font-w400 text-muted mb-3">
                                                CPL Mon Avenir
                                            </h2>
                                        </div>
                                        <!-- END Header -->


                                        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-alt form-control-lg @error('username') is-invalid @enderror"
                                                        value="{{ old('username') }}" id="username" name="username"
                                                        placeholder="Nom d'utilisateur" required autocomplete="username"
                                                        autofocus>
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror"
                                                        value="{{ old('password') }}" id="password" name="password"
                                                        placeholder="Mot de passe" required autocomplete="password"
                                                        autofocus>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}">
                                                        <label class="custom-control-label font-w400" for="remember">Se
                                                            rappeler de moi ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center mb-0">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" class="btn btn-block btn-success">
                                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Connexion
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Unlock Section -->

                        <!-- Footer -->
                        <div class="font-size-sm text-center text-white py-3">
                            <strong>Soukouli v1.0</strong> &copy; <span data-toggle="year-copy"></span>
                        </div>
                        <!-- END Footer -->
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
@endsection
