@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Liste des matières
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{ $annee }}</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">Matières</a></li>
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
                <h3 class="block-title">Liste des matières</h3> <a class="btn btn-success"
                    href="{{ route('matiere.create') }}">Nouvelle matière</a>
            </div>
            <div class="block-content">
                <p class="font-size-sm text-muted">
                    Voici la liste des matières enseignées dans les différents niveaux de l'établissement.
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th>Nom de la matière</th>
                                <th class="text-center">Niveaux d'enseignement</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($matieres)
                                @foreach ($matieres as $matiere)
                                    <tr>
                                        <td class="font-w600 font-size-sm">
                                            {{ $matiere->intitule }}
                                        </td>
                                        <td class="text-center">
                                            @foreach ($matiere->promotions as $promotion)
                                                <span class="badge badge-primary">{{ $promotion->nom }}eme</span>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('matiere.delete', $matiere->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">Pas de matières disponibles</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
