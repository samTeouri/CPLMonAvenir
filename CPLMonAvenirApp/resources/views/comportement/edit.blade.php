@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Comportement de l'élève {{ $assiduite->eleve->nom }} {{ $assiduite->eleve->prenom }} au cours du
                    trimestre {{ substr($assiduite->trimestre->intitule, 0, 11) }}.
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Assiduité</li>
                        <li class="breadcrumb-item">{{ substr($classe->nom, 0, 6) }}</li>
                        <li class="breadcrumb-item">{{ $assiduite->eleve->nom }}
                            {{ $assiduite->eleve->prenom }}
                        </li>
                        <li class="breadcrumb-item">{{ substr($assiduite->trimestre->intitule, 0, 11) }}</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">Comportement</a>
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
            <form action="{{ route('comportement.update', $assiduite->id) }}" method="post">
                @csrf
                <div class="d-flex mx-0 px-0 mb-5 justify-content-between align-items-center">
                    <h3 class="m-0">Remarques sur le comportement de {{ $assiduite->eleve->nom }}
                        {{ $assiduite->eleve->prenom }}</h3>

                    <a href="{{ route('assiduite.index', ['eleve' => $assiduite->eleve->id, 'classe' => $classe->id]) }}"
                        class="btn btn-secondary mr-1">
                        <i class="fa fa-angle-left mr-1" aria-hidden="true"></i>Retour</a>
                </div>

                <div class="col-12 py-3">

                    <div class="row mx-0 px-0 align-items-center justify-content-around">

                        @php
                            $comportement = json_decode($assiduite->comportement);
                            $avertissement = json_decode($comportement->avertissement);
                            $blame = json_decode($comportement->blame);
                        @endphp

                        <div class="form-group">
                            <label>Avertissement</label>
                            <!-- Champ pour le groupe -->
                            <div class="d-flex">
                                <div>
                                    <label class="mr-2" for="avertissement_travail">
                                        Travail
                                        <input type="checkbox" name="avertissement[Travail]" id="avertissement_travail"
                                            value="true" @if ($avertissement->Travail === true) checked @endif />
                                    </label>
                                    <label for="avertissement_discipline">
                                        Discipline
                                        <input type="checkbox" name="avertissement[Discipline]"
                                            id="avertissement_discipline" value="true"
                                            @if ($avertissement->Discipline === true) checked @endif />
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label>Blâme</label>
                            <!-- Champ pour le groupe -->
                            <div class="d-flex">
                                <div>
                                    <label class="mr-2" for="blame_travail">
                                        Travail
                                        <input type="checkbox" name="blame[Travail]" value="travail" id="blame_travail"
                                            @if ($blame->Travail === true) checked @endif />
                                    </label>
                                    <label for="blame_discipline">
                                        Discipline
                                        <input type="checkbox" name="blame[Discipline]" value="discipline"
                                            id="blame_discipline" @if ($blame->Discipline === true) checked @endif />
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success mx-1" type="submit">Enregistrer</button>

                    </div>

                </div>
            </form>
        </div>

    </div>
@endsection
