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
                        <!-- Sign In Block -->
                        <div class="block block-rounded block-themed mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Créer un compte</h3>
                                <div class="block-options">
                                    @if (Route::has('password.request'))
                                        <a class="btn-block-option font-size-sm" href="{{ route('password.request') }}">Mot de passe oublié?</a>
                                    @endif
                                    <a class="btn-block-option" href="{{ route('login') }}" data-toggle="tooltip" data-placement="left" title="Connexion">
                                        <i class="fa fa-key"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 py-lg-5">
                                    <h1 class="h2 mb-1">CPL Mon Avenir</h1>
                                    <p class="text-muted">
                                        Bienvenue, créez votre compte !
                                    </p>
                                    <form class="js-validation-signin" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-alt form-control-lg @error('nom') is-invalid @enderror" value="{{ old('nom') }}" id="nom" name="nom" placeholder="Nom" required autocomplete="nom" autofocus>
                                                @error('nom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-alt form-control-lg @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" id="prenom" name="prenom" placeholder="Prénom" required autocomplete="prenom" autofocus>
                                                @error('prenom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control form-control-alt form-control-lg @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" id="telephone" name="telephone" placeholder="Numéro de téléphone" required autocomplete="telephone" autofocus>
                                                @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Email" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control form-control-alt form-control-lg @error('profil') is-invalid @enderror" value="{{ old('profil') }}" id="profil" name="profil" placeholder="Ajouter une photo de profil" required autocomplete="profil" autofocus>
                                                @error('profil')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" name="password" placeholder="Mot de passe" required autocomplete="password" autofocus>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-alt form-control-lg" id="password-confirm" name="password_confirmtion" placeholder="Confirmez le mot de passe" required autocomplete="new-password" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-xl-12">
                                                <button type="submit" class="btn btn-block btn-alt-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Créer un compte
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
@endsection
