@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Ajouter un nouveau retard pour {{ $assiduite->eleve->nom }} {{ $assiduite->eleve->prenom }}.
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Assiduité</li>
                        <li class="breadcrumb-item">{{ substr($classe->nom, 0, 6) }}</li>
                        <li class="breadcrumb-item">{{ $assiduite->eleve->nom }}
                            {{ $assiduite->eleve->prenom }}
                        </li>
                        <li class="breadcrumb-item">Retards</li>
                        <li class="breadcrumb-item">{{ substr($assiduite->trimestre->intitule, 0, 11) }}</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">Ajouter un retard</a>
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
            <form action="{{ route('absence.store', $classe->id) }}" method="post">
                @csrf
                <h3>Ajouter une absence</h3>

                <div class="col-12 py-3">

                    <div class="row mx-0 px-0 align-items-center justify-content-around">
                        <!-- Affichage du nom de l'élève -->
                        <input type="hidden" name="assiduite_id" value="{{ $assiduite->id }}">

                        <div class="form-group col-lg-3">
                            <label>Date du début de l'absence</label>


                            <!-- Champ pour le groupe -->
                            <input type="text" class="js-flatpickr form-control form-control-alt "
                                id="example-flatpickr-default" name="date" placeholder="Y-m-d" required />
                        </div>


                        <div class="form-group col-lg-3">
                            <label>Nombre d'heures d'absence</label>

                            <div class="input-group">
                                <input type="text" name="nombre_heure" class="form-control form-control-alt" />
                                <div class="input-group-append">
                                    <span class="input-group-text input-group-text-alt">h</span>
                                </div>
                            </div>

                        </div>


                        <div class="form-group col-lg-5">
                            <label>Justification</label>

                            <!-- Champ pour le groupe -->
                            <input type="text" class="form-control form-control-alt " name="justification" required />
                        </div>

                        <button class="btn btn-success" type="submit">Enregistrer</button>

                    </div>

                </div>
            </form>
        </div>

    </div>

@endsection
