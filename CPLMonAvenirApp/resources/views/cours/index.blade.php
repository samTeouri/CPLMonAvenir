@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Cours de {{ $classe->nom }}
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Cours</li>
                        <li class="breadcrumb-item">{{ $classe->promotion->nom }}eme</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">{{ $classe->nom }}</a></li>
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
                <h3 class="block-title">Liste des cours</h3>
            </div>
            <div class="block-content">
                <p class="font-size-sm text-muted">
                    {{-- Voici la liste des devoirs et compositions en {{ $matiere->intitule }} au niveau de la
                    {{ $promotion->nom }}eme. --}}
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th style="width: 200px;">Libellé</th>
                                <th class="text-center" style="width: 200px;">Professeur</th>
                                <th class="text-center" style="width: 200px;">Coefficient</th>
                                <th class="text-center" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cours)
                                @foreach ($cours as $cour)
                                    <tr @if(!$cour->professeur)class="table-warning"@endif>
                                        <td>{{ Str::substr($cour->nom, 0, -17) }}</td>
                                        <td class="text-center text-primary" style="font-weight: 500;">@if($cour->professeur){{ $cour->professeur->nom }} {{ $cour->professeur->prenom }}@else Pas de professeur @endif</td>
                                        <td class="text-center">{{ $cour->coefficient }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="{{ route('cours.show', $cour->id) }}"><i
                                                    class="si si-eye"></i> Détails</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center h4 p-3" colspan="5">Pas de cours dans cette classe !</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
