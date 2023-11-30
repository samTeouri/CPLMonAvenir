@extends('layouts.dashboard')

@section('main-content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Choisissez le cours de l'interrogation à voir
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Interrogation</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">{{ substr($classe->nom, 0, 6) }}</a>
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
                <h3 class="block-title">Liste des cours de la classe de {{ substr($classe->nom, 0, 6) }}</h3>
            </div>
            <div class="block-content">
                <p class="font-size-sm text-muted">
                    Voici la liste des cours de la classe de {{ substr($classe->nom, 0, 6) }}, choisissez la cours
                    et le trimestre
                    dans lequel créer l'interrogation.
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Nom du cours</th>
                                <th class="text-center" style="width: 100px;">Voir les interrogations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cours as $cour)
                                <tr>
                                    <td class="font-w600 font-size-sm">
                                        {{ $cour->nom }}
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Trimestre
                                            </button>
                                            <div class="dropdown-menu font-size-sm"
                                                aria-labelledby="dropdown-default-primary">
                                                @foreach ($trimestres as $trimestre)
                                                    <a class="dropdown-item"
                                                        href="{{ route('interrogation.index', ['classe' => $classe, 'cours' => $cour->id, 'trimestre' => $trimestre->id]) }}">{{ substr($trimestre->intitule, 0, 11) }}</a>
                                                @endforeach
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

@endsection
