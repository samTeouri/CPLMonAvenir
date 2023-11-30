@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Liste des interrogations en {{ $cours->matiere->intitule }} de la classe
                    {{ substr($classe->nom, 0, 6) }}
                    du
                    {{ substr($trimestre->intitule, 0, 11) }}.
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Interrogation</li>
                        <li class="breadcrumb-item">{{ substr($classe->nom, 0, 6) }}</li>
                        <li class="breadcrumb-item">{{ $cours->matiere->intitule }}</li>
                        <li class="breadcrumb-item"><a class="link-fx"
                                href="">{{ substr($trimestre->intitule, 0, 11) }}</a></li>
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
            @if ($notification['type'] === 'success')
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
                <h3 class="block-title">Liste des evaluations de la classe de {{ substr($classe->nom, 0, 6) }} en
                    {{ $cours->matiere->intitule }}</h3>
            </div>
            <div class="block-content">
                <p class="font-size-sm text-muted">
                    Voici la liste des interrogations de {{ $cours->matiere->intitule }} au niveau de la classe de
                    {{ $classe->nom }}.
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th>Examen</th>
                                <th class="text-center" style="width: 200px;">Type d'examen</th>
                                <th class="text-center" style="width: 200px;">Date de l'examen</th>
                                <th class="text-center" style="width: 200px;">Classe</th>
                                <th class="text-center" class="text-center">Voir détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($evaluations)
                                @foreach ($evaluations as $evaluation)
                                    <tr>
                                        <td>{{ $evaluation->intitule }}</td>
                                        <td class="text-center text-primary fw-bolder">{{ $evaluation->type }}</td>
                                        <td class="text-center">{{ $evaluation->date }}</td>
                                        <td class="text-center">{{ substr($evaluation->cours->classe->nom, 0, 6) }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="{{ route('evaluation.show', ['evaluation' => $evaluation->id, 'trimestre' => $trimestre->id, 'promotion' => $classe->promotion->id]) }}"><i
                                                    class="si si-eye"></i> Détails</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center h4 p-3" colspan="5">Pas d'évaluations existantes !</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection
