@extends('layouts.app')

@section('content')
<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Reminder Block -->
                        <div class="block block-rounded block-themed mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Réinitialisation du mot de passe</h3>
                                <div class="block-options">
                                    <a class="btn-block-option" href="{{ route('login') }}" data-toggle="tooltip" data-placement="left" title="Connexion">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                </div>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 py-lg-5">
                                    <h1 class="h2 mb-1">CPL Mon Avenir</h1>
                                    <p class="text-muted">
                                        Entrez votre adresse mail et nous vous enverrons un mail de réinitialisation de votre mot de passe
                                    </p>

                                    <!-- Reminder Form -->
                                    <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js) -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <form class="js-validation-reminder" action="{{ route('password.email') }}" method="POST">
                                        @csrf
                                        <div class="form-group py-3">
                                            <input type="text" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn btn-block btn-alt-primary">
                                                    <i class="fa fa-fw fa-envelope mr-1"></i> Envoyer le mail
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Reminder Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Reminder Block -->
                    </div>
                </div>
            </div>
            <div class="content content-full font-size-sm text-muted text-center">
                <strong>CPL Mon Avenir</strong> &copy; <span data-toggle="year-copy"></span>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
@endsection
