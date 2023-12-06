@extends('layouts.dashboard')

@section('main-content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Liste des classes de {{ $promotion->nom }}eme
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Classes</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">{{ $promotion->nom }}eme</a>
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
                <h3 class="block-title">Liste des classe de {{ $promotion->nom }}eme</h3>
                <a class="btn btn-success" href="{{ route('classe.create', $promotion->id) }}"><i
                        class="si si-chalkboard"></i> Nouvelle classe</a>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th style="width: 50px">N°</th>
                                <th class="text-center">Classe</th>
                                <th class="text-center" style="width: 200px;">Nombre d'élèves</th>
                                <th class="text-center" style="width: 50px;">Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($promotion->classes)
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($promotion->classes as $classe)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td class="text-center">{{ $classe->nom }}</td>
                                        <td class="text-center text-primary" style="font-weight: 700;">
                                            {{ count($classe->eleves) }} éleves
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('classe.destroy', $classe->id) }}" method="post"
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
                                    <td class="text-center h4 p-3" colspan="3">Pas de classes !</td>
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
            return confirm("Voulez vous supprimer la classe ?")
        }
    </script>

@endsection
