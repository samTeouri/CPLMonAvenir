@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Ajout d'une classe {{ $promotion->nom }}eme
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Classes</li>
                        <li class="breadcrumb-item">{{ $promotion->nom }}eme
                        </li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">Ajout d'une classe de
                                {{ $promotion->nom }}eme</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">

        <!---- Copiez collez (il s'agit des alertes pour le retour d'actions)----->

        @if ($notification = Session::get('notification'))
            @if ($notification['type'] === 'success')
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="mb-0">{{ $notification['message'] }}</p>
                </div>
            @endif
            @if ($notification['type'] === 'warning')
                <div class="alert alert-warning alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="mb-0">{{ $notification['message'] }}</p>
                </div>
            @endif
            @if ($notification['type'] === 'error')
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="mb-0">{{ $notification['message'] }}</p>
                </div>
            @endif
        @endif

        <!---- Copiez collez ----->

        <div class="block block-rounded p-5">
            <form action="{{ route('classe.store') }}" method="post">
                @csrf
                <h3>Nouvelle classe de {{ $promotion->nom }}eme</h3>

                <div class="col-12 py-3">
                    <div class="row justify-content-center align-items-center mx-0 px-0">
                        <!-- Affichage du nom de l'élève -->
                        <label class="col-8 col-lg-2">Classe de {{ $promotion->nom }}eme</label>

                        <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">


                        <!-- Champ pour le groupe -->
                        <input type="text" class="form-control form-control-alt col-4 col-lg-1" name="nom"
                            required />

                        <label for="" class="col-lg-2">Enseignant titulaire</label>

                        <select name="professeur_id" id="" class="form-control form-control-alt col-lg-3" required>
                            <option value="">Sélectionnez un titulaire</option>
                            @foreach ($professeurs as $professeur)
                                <option value="{{ $professeur->id }}">{{ $professeur->nom }} {{ $professeur->prenom }}
                                </option>
                            @endforeach
                        </select>

                        <button class="btn btn-success mx-4" type="submit">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>

    @endsection
