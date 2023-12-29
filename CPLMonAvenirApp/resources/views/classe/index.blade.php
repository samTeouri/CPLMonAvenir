@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Liste des elèves de la classe de {{ substr($classe->nom, 0, 6) }}
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Classes</li>
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
                <h3 class="block-title">Liste des élèves de la classe de {{ $classe->nom }}</h3>



                <form action="{{ route('eleve.passage', $classe->id) }}" method="post">
                    @csrf
                    <input type="text" id="listeEleves" name="eleves" hidden />
                    <button id="passage-button" class="btn btn-secondary mr-1" disabled>
                        Valider le passage
                    </button>
                </form>


                <div class="dropdown mr-1">
                    <button type="button" class="btn btn-success dropdown-toggle" id="dropdown-default-primary"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-file-excel"></i> Excel
                    </button>
                    <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-primary">

                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <span class="nav-main-link-name"> <i class="fa fa-file-pdf mr-2"></i>Import/Excel</span>
                            </a>
                            <ul class="nav-main-submenu">

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('eleves.export', $classe->id) }}"><span
                                            class="nav-main-link-name"><i class="fa fa-file-export mr-1"></i>Exporter
                                            élèves</span></a>
                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('eleves.importPage', $classe->id) }}"><span
                                            class="nav-main-link-name"><i class="fa fa-file-import mr-1"></i>Importer
                                            élèves</span></a>
                                </li>

                            </ul>
                        </li>
                    </div>
                </div>


                <div class="dropdown">
                    <button type="button" class="btn btn-success dropdown-toggle" id="dropdown-default-primary"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="si si-printer"></i> Imprimer
                    </button>
                    <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-primary">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('listeDesEleves', $classe->id) }}">
                                <span class="nav-main-link-name"><i class="fa fa-list mr-2"></i> Liste des élèves</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('eleve.classe.info', $classe->id) }}">
                                <span class="nav-main-link-name"><i class="fa fa-info-circle mr-2"></i>Fiches
                                    d'information</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <span class="nav-main-link-name"> <i class="fa fa-file-pdf mr-2"></i> Bulletins</span>
                            </a>
                            <ul class="nav-main-submenu">

                                <!----- Génération des bulletins ------>

                                @foreach ($classe->promotion->trimestres as $trimestre)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"
                                            href="{{ route('classe.bulletins', ['classe' => $classe->id, 'trimestre' => $trimestre->id]) }}">
                                            <span
                                                class="nav-main-link-name">{{ substr($trimestre->intitule, 0, 11) }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                    </div>
                </div>

            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table id="classe-list"
                        class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th style="width: 50px;">N°</th>
                                <th></th>
                                <th class="text-center" style="width: 200px;">Photo</th>
                                <th class="text-center">Nom Prénom</th>
                                <th class="text-center" style="width: 200px;">Date Naissance</th>
                                <th class="text-center" style="width: 200px;" class="text-center">Actions</th>
                                <th class="text-center" style="width: 50px;">Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($eleves)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($eleves as $eleve)
                                    @php
                                        $profil = public_path('/storage/' . $eleve->profil);
                                    @endphp
                                    <tr>
                                        <td class="text-center text-primary" style="font-weight: 700;">
                                            {{ $i++ }}
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" class="form-control form-control-alt form-control-sm"
                                                name="" id="passage" value="{{ $eleve->id }}">
                                        </td>
                                        <td class="text-center d-flex justify-content-center">
                                            <div
                                                style="height: 70px; width: 70px; border-radius: 100px; overflow: hidden;">
                                                <img style="width: 100%;"
                                                    @if (file_exists($profil)) src="{{ asset('storage/' . $eleve->profil) }}" @else src="{{ asset('assets/media/avatars/avatar1.jpg') }}" @endif
                                                    alt="" />
                                            </div>
                                        </td>
                                        <td class="text-center text-primary fw-bolder" style="font-weight: 700">
                                            {{ $eleve->nom }}
                                            {{ $eleve->prenom }}</td>
                                        <td class="text-center">{{ $eleve->date_naissance }}</td>


                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    id="dropdown-default-primary" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu font-size-sm"
                                                    aria-labelledby="dropdown-default-primary">

                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link"
                                                            href="{{ route('eleve.edit', ['eleve' => $eleve->id, 'classe' => $classe->id]) }}">
                                                            <span class="nav-main-link-name"><i
                                                                    class="fa fa-user-edit mr-2"></i>Modifier</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link"
                                                            href="{{ route('eleve.info', $eleve->id) }}">
                                                            <span class="nav-main-link-name"><i
                                                                    class="fa fa-info-circle mr-2"></i>Informations</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link"
                                                            href="{{ route('assiduite.index', ['eleve' => $eleve->id, 'classe' => $classe->id]) }}">
                                                            <span class="nav-main-link-name"><i
                                                                    class="fa fa-clock mr-2"></i>Assiduité</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link nav-main-link-submenu"
                                                            data-toggle="submenu" aria-haspopup="true"
                                                            aria-expanded="false" href="#">
                                                            <span class="nav-main-link-name"> <i
                                                                    class="fa fa-file-pdf mr-2"></i> Bulletins</span>
                                                        </a>
                                                        <ul class="nav-main-submenu">

                                                            <!----- Gestion des groupes ------>

                                                            @foreach ($classe->promotion->trimestres as $trimestre)
                                                                <li class="nav-main-item">
                                                                    <a class="nav-main-link"
                                                                        href="{{ route('eleve.bulletin', ['eleve' => $eleve->id, 'classe' => $classe->id, 'trimestre' => $trimestre->id]) }}">
                                                                        <span
                                                                            class="nav-main-link-name">{{ substr($trimestre->intitule, 0, 11) }}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </li>

                                                </div>
                                            </div>
                                        </td>



                                        <td class="text-center">
                                            <form action="{{ route('eleve.destroy', $eleve->id) }}" method="post"
                                                onsubmit="return Confirm()">
                                                @csrf
                                                @method('delete')

                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center h4 p-3" colspan="6">Pas d'évaluations existantes !</td>
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
            return confirm("Voulez vous supprimer l'élève ?")
        }
    </script>


@endsection
