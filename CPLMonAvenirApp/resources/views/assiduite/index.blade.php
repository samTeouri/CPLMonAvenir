@extends('layouts.dashboard')

@section('main-content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Comportement de {{ $eleve->nom }} {{ $eleve->prenom }} au cours de l'année.
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Assiduité</li>
                        <li class="breadcrumb-item">{{ substr($classe->nom, 0, 6) }}</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">{{ $eleve->nom }}
                                {{ $eleve->prenom }}</a>
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
                <h3 class="block-title">Retards et absences de {{ $eleve->nom }} {{ $eleve->prenom }}</h3>

                <a href="{{ route('classe.index', $classe->id) }}" class="btn btn-secondary"><i
                        class="fa fa-angle-left mr-1" aria-hidden="true"></i>Retour</a>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Nombre de retards</th>
                                <th class="text-center">Nombre d'absences</th>
                                <th class="text-center">Ajouter retard/absence</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assiduites as $assiduite)
                                <tr>
                                    <td>Comportement de l'étudiant au cours du
                                        {{ substr($assiduite->trimestre->intitule, 0, 11) }}
                                    </td>
                                    <td class="text-center text-secondary" style="font-weight: 800;">
                                        {{ count($assiduite->retards) }} retards</td>
                                    <td class="text-center text-primary fw-bolder" style="font-weight: 800;">
                                        {{ count($assiduite->absences) }}
                                        absences
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                            <div class="dropdown-menu font-size-sm"
                                                aria-labelledby="dropdown-default-primary">

                                                <li class="nav-main-item">
                                                    <a class="nav-main-link"
                                                        href="{{ route('retard.index', ['assiduite' => $assiduite->id, 'classe' => $classe->id]) }}">
                                                        <span class="nav-main-link-name"><i
                                                                class="fa fa-clock mr-2"></i>Retards</span>
                                                    </a>
                                                </li>

                                                <li class="nav-main-item">
                                                    <a class="nav-main-link"
                                                        href="{{ route('absence.index', ['assiduite' => $assiduite->id, 'classe' => $classe->id]) }}">
                                                        <span class="nav-main-link-name"><i
                                                                class="fa fa-clipboard-list mr-2"></i>Absences</span>
                                                    </a>
                                                </li>

                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{ route('comportement.edit', ['assiduite' => $assiduite->id, 'classe' => $classe->id]) }}">
                                                        <span class="nav-main-link-name"><i
                                                                class="fa fa-exclamation-triangle mr-2"></i>Comportement</span>
                                                    </a>
                                                </li>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>

    <script>
        function Confirm() {
            return confirm("Voulez vous supprimer le retard ?")
        }
    </script>

@endsection
