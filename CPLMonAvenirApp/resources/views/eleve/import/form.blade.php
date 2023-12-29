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





        <div class="block block-rounded col-lg-7 p-3">

            <div class="block-header">
                <h3 class="block-title">Importer les élèves de la classe de {{ $classe->nom }}</h3>
                {{-- <a href="{{ route('eleves.template', $classe->id) }}">Template</a> --}}
            </div>

            <div class="block-content">
                <p class="font-size-sm text-muted">Pour importer les élèves de la classe de {{ $classe->nom }}, veuillez
                    télécharger le template et le remplir. Ensuite vous pourrez le charger dans le formulaire ci-dessous.
                </p>

                <form action="{{ route('eleves.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mx-0 px-0 align-items-center">
                        <div class="form-group col-7">
                            <label for="">Chargez le fichier excel</label>
                            <input type="file" name="excel" accept=".xlsx" id=""
                                class="form-control form-control-alt form-control-file" />
                        </div>
                        <button class="btn btn-success col-2">Importer</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
