@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Équipe enseignante du CPL Mon Avenir
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">CPL Mon Avenir</li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">Enseignants</a>
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
                <h3 class="block-title">Équipe enseignante du CPL Mon Avenir</h3>
                <a href="{{ route('professeur.create') }}" class="btn btn-success">Recruter</a>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th style="width: 50px;">N°</th>
                                <th class="text-center">Nom Prénom</th>
                                <th class="text-center">Sexe</th>
                                <th class="text-center" style="width: 200px;">Contact</th>
                                <th class="text-center" style="width: 200px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($professeurs)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($professeurs as $professeur)
                                    <tr>
                                        <td class="text-center text-primary" style="font-weight: 700;">{{ $i++ }}
                                        </td>
                                        <td class="text-center">
                                            {{ $professeur->nom }} {{ $professeur->prenom }}
                                        </td>
                                        <td class="text-center text-primary fw-bolder" style="font-weight: 700">
                                            {{ $professeur->contact }}</td>
                                        <td class="text-center">{{ $professeur->sexe }}</td>


                                        <td class="text-center">
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('professeur.edit', $professeur->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>

                                                <form id="delete-form"
                                                    action="{{ route('professeur.destroy', $professeur->id) }}"
                                                    method="post" onsubmit="return Confirm()">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center h4 p-3" colspan="4">Pas d'enseignants</td>
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
            return confirm("Voulez vous supprimer le professeur ?")
        }
    </script>
@endsection
