@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Liste des notes: {{ $evaluation->intitule }}
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Evaluation</li>
                        <li class="breadcrumb-item">{{ substr($evaluation->cours->classe->nom, 0, 6) }}</li>
                        <li class="breadcrumb-item">{{ $evaluation->cours->matiere->intitule }}</li>
                        <li class="breadcrumb-item"><a class="link-fx"
                                href="">{{ substr($trimestre->intitule, 0, 11) }}</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="content">

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

        <div class="block block-rounded p-lg-5 p-3 mt-5">

            <form
                action="{{ route('evaluation.update', ['evaluation' => $evaluation->id, 'trimestre' => $trimestre->id]) }}"
                method="post">
                @csrf
                <div class="d-flex mx-0 mb-5 px-0 justify-content-between align-items-center">
                    <h3>Notes de la classe de {{ substr($evaluation->cours->classe->nom, 0, 6) }}</h3>
                    @if ($evaluation->type === 'devoir' || $evaluation->type === 'composition')
                        <a href="{{ route('evaluation.index', ['promotion' => $promotion->id, 'matiere' => $evaluation->cours->matiere->id, 'trimestre' => $trimestre->id]) }}"
                            class="btn btn-secondary"><i class="fa fa-angle-left mr-1" aria-hidden="true"></i>Retour</a>
                    @else
                        <a href="{{ route('interrogation.index', ['classe' => $evaluation->cours->classe->id, 'cours' => $evaluation->cours->id, 'trimestre' => $trimestre->id]) }}"
                            class="btn btn-secondary"><i class="fa fa-angle-left mr-1" aria-hidden="true"></i>Retour</a>
                    @endif
                </div>

                <div class="col-12 py-3">
                    <div class="row justify-content-around mx-0 px-0">
                        <div class="form-group col-12 col-lg-5">
                            <label for="intitule">Intitulé de l'évaluation</label>
                            <input type="text" class="form-control form-control-alt" id="intitule" name="intitule"
                                value="{{ $evaluation->intitule }}" />
                        </div>
                        <div class="form-group col-12 col-lg-3">
                            <label for="intitule">Type d'évaluation</label>
                            <select class="form-control form-control-alt" id="type" name="type" style="width: 100%;"
                                data-placeholder="Choisissez un type" value="{{ $evaluation->type }}">
                                @if ($evaluation->type === 'devoir')
                                    <option value="devoir">Devoir</option>
                                    <option value="composition">Composition</option>
                                @endif
                                @if ($evaluation->type === 'composition')
                                    <option value="composition">Composition</option>
                                    <option value="devoir">Devoir</option>
                                @endif
                                @if ($evaluation->type === 'interrogation')
                                    <option value="interrogation">Interrogation</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-2">
                            <label for="bareme">Note maximale</label>
                            <input type="number" class="form-control form-control-alt" id="bareme" name="note_maximale"
                                placeholder="Bareme..." value="{{ $evaluation->note_maximale }}" />
                        </div>
                        <div class="form-group col-12 col-lg-2">
                            <label for="example-flatpickr-default">Date évaluation</label>
                            <input type="text" class="js-flatpickr form-control form-control-alt"
                                id="example-flatpickr-default" name="date" value="{{ $evaluation->date }}"
                                placeholder="Y-m-d" />
                        </div>
                    </div>
                </div>


                <div class="block-content tab-content">
                    @foreach ($evaluation->notes->sortBy('created_at', SORT_NATURAL) as $note)
                        <div class="row mx-0 px-0">

                            <div class="d-flex col-12 my-2 align-items-center">

                                <input class="col-2 col-lg-2" type="hidden" name="trimestre_id"
                                    value="{{ $trimestre->id }}">

                                <input type="number" hidden class="form-control form-control-alt col-2 col-lg-1"
                                    name="notes[{{ $note->id }}][note_id]" value="{{ $note->id }}" />

                                <!-- Affichage du nom de l'élève -->
                                <label class="col-10 col-lg-4">{{ $note->eleve->nom }}
                                    {{ $note->eleve->prenom }}</label>

                                <!-- Champ pour la note -->
                                <input type="number" class="form-control form-control-alt col-2 col-lg-1"
                                    name="notes[{{ $note->id }}][valeur]" value="{{ $note->valeur }}"
                                    min="0" step="0.25" max="20">
                            </div>
                        </div>

                        <hr />
                    @endforeach
                </div>

                <div class="d-flex mt-5">
                    <button class="btn btn-success" type="submit">Enregistrer modifications</button>
                </div>

            </form>
        </div>

    </div>

@endsection
