@extends('layouts.dashboard')

@section('main-content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Retards de {{ $assiduite->eleve->nom }} {{ $assiduite->eleve->prenom }} au cours du
                    {{ substr($assiduite->trimestre->intitule, 0, 11) }}.
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Assiduité</li>
                        <li class="breadcrumb-item">{{ substr($classe->nom, 0, 6) }}</li>
                        <li class="breadcrumb-item">{{ $assiduite->eleve->nom }}
                            {{ $assiduite->eleve->prenom }}
                        </li>
                        <li class="breadcrumb-item">Retards</li>
                        <li class="breadcrumb-item"><a class="link-fx"
                                href="">{{ substr($assiduite->trimestre->intitule, 0, 11) }}</a>
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
                <h3 class="block-title">Liste des retards de {{ $assiduite->eleve->nom }}
                    {{ $assiduite->eleve->prenom }}</h3>
                <a class="btn btn-success"
                    href="{{ route('retard.create', ['assiduite' => $assiduite->id, 'classe' => $classe->id]) }}">Ajouter
                    un retard</a>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Heure d'arrivée</th>
                                <th class="text-center">Justification</th>
                                <th class="text-center">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($assiduite->retards)
                                @foreach ($assiduite->retards as $retard)
                                    <tr>
                                        <td class="text-center">{{ $retard->date }}</td>
                                        <td class="text-center">{{ $retard->heure_arrive }}</td>
                                        <td class="text-center">{{ $retard->justification }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('retard.destroy', $retard->id) }}" method="post"
                                                onsubmit="return Confirm()">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Pas de retards au cours du trimestre</td>
                                </tr>
                            @endif
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
