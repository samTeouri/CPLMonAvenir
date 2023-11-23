@extends('layouts.app')

@section('content')
<main id="main-container">
    <!-- Page Content -->
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Reminder Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Vérification de votre adresse mail</h3>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">CPL Mon Avenir</h1>
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        Un lien de vérification vient d'être envoyé à votre adresse mail
                                    </div>
                                @endif
                                Avant de continuer vérifiez si vous avez reçu le mail de vérification dans votre boite mail
                                Dans le cas contraire
                                <form class="js-validation-reminder" action="{{ route('verification.resend') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-alt-primary">
                                                <i class="fa fa-fw fa-envelope mr-1"></i> Renvoyer un nouveau lien
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
