@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Choisissez la matière du devoir ou composition
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Evaluation</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">{{ $promotion->nom }}eme</a></li>
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
                <h3 class="block-title">Liste des matières de {{ $promotion->nom }}eme</h3>
            </div>
            <div class="block-content">
                <p class="font-size-sm text-muted">
                    Voici la liste des matières enseignées au niveau de la {{ $promotion->nom }}eme, choisissez la matière
                    et le trimestre
                    dans lequel créer le devoir ou la composition.
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Nom de la matière</th>
                                <th class="text-center" style="width: 100px;">Ajouter devoir/composition</th>
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
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle"
                                                    id="dropdown-default-primary" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Trimestre
                                                </button>
                                                <div class="dropdown-menu font-size-sm"
                                                    aria-labelledby="dropdown-default-primary">
                                                    @foreach ($promotion->trimestres as $trimestre)
                                                        <a class="dropdown-item"
                                                            href="{{ route('evaluation.create', ['promotion' => $promotion->id, 'matiere' => $matiere->id, 'trimestre' => $trimestre->id]) }}">{{ substr($trimestre->intitule, 0, 11) }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
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
