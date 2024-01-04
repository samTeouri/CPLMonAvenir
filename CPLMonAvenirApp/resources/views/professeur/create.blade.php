@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Recrutez un nouvel enseignant
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">CPL Mon Avenir</li>
                        <li class="breadcrumb-item">Enseignants</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">Recrutement</a>
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

        <div class="block block-rounded">

            <div class="block-header">
                <h3 class="block-title">Entrez les informations du nouvel enseignant</h3>
            </div>

            <div class="block-content">
                <form action="{{ route('professeur.store') }}" method="post">
                    @csrf
                    <div class="row mx-0 px-0 justify-content-between">
                        <div class="form-group col-lg-3">
                            <label for="">Nom de l'enseignant</label>
                            <input type="text" name="nom" class="form-control form-control-alt" required />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="">Prénoms de l'enseignant</label>
                            <input type="text" name="prenom" class="form-control form-control-alt" required />
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="">Sexe de l'enseignant</label>
                            <select class="form-control form-control-alt" name="sexe" id="" required>
                                <option value="">Sélectionnez le sexe</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="">Contact de l'enseignant</label>
                            <input type="telephone" name="contact" class="form-control form-control-alt" required />
                        </div>
                    </div>
                    <div class="row mx-0 px-0 py-2 justify-content-center">
                        <button class="btn btn-success col-lg-4" type="submit">
                            Recruter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
