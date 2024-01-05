@extends('layouts.dashboard')

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Ajouter un nouveau devoir ou nouvelle composition de {{ $matiere->intitule }} du
                    {{ substr($trimestre->intitule, 0, 11) }}
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Evaluation</li>
                        <li class="breadcrumb-item">{{ $promotion->nom }}eme</li>
                        <li class="breadcrumb-item">{{ $matiere->intitule }}</li>
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


        <div class="block block-rounded p-lg-5 p-3">

            <form action="{{ route('evaluation.store') }}" method="post">
                @csrf
                <div class="d-flex mx-0 px-0 mb-5 justify-content-between align-items-center">
                    <h3 class="m-0">Nouvelle évaluation de {{ $matiere->intitule }}</h3>
                    <a href="{{ route('evaluation_matieres', $promotion->id) }}" class="btn btn-secondary"><i
                            class="fa fa-angle-left" aria-hidden="true"></i> Retour</a>
                </div>

                <div class="col-12 py-3">
                    <div class="row justify-content-around mx-0 px-0">
                        <div class="form-group col-12 col-lg-5">
                            <label for="intitule">Intitulé de l'évaluation</label>
                            <input type="text" class="form-control form-control-alt" id="intitule" name="intitule"
                                placeholder="Intitulé du devoir..." value="{{ old('intitule') }}" required />
                        </div>
                        <div class="form-group col-12 col-lg-3">
                            <label for="intitule">Type d'évaluation</label>
                            <select class="form-control form-control-alt" id="type" name="type" style="width: 100%;"
                                data-placeholder="Choisissez un type" required>
                                <option value="">Type d'évaluation</option>
                                <option value="devoir">Devoir</option>
                                <option value="composition">Composition</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-2">
                            <label for="bareme">Note maximale</label>
                            <input type="number" class="form-control form-control-alt" id="bareme" name="note_maximale"
                                placeholder="Bareme..." value="0.0" min="0" step="0.25" max="20"
                                required />
                            @error('note_maximale')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-lg-2">
                            <label for="example-flatpickr-default">Date évaluation</label>
                            <input type="text" class="js-flatpickr form-control form-control-alt"
                                id="example-flatpickr-default" name="date" placeholder="Y-m-d" required />
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>


                <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                    @foreach ($classes as $classe)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="#classe{{ $classe['classe']->id }}">{{ substr($classe['classe']->nom, 0, 6) }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="block-content tab-content">
                    @foreach ($classes as $classe)
                        <div class="tab-panel" id="classe{{ $classe['classe']->id }}" role="tabpanel">
                            <h4 class="font-w400">Classe de {{ substr($classe['classe']->nom, 0, 6) }}</h4>
                            @foreach ($classe['eleves'] as $eleve)
                                <div class="row mx-0 px-0">

                                    <div class="d-flex col-12 my-2 align-items-center">
                                        <!-- Affichage du nom de l'élève -->
                                        <label class="col-10 col-lg-4">{{ $eleve->nom }} {{ $eleve->prenom }}</label>

                                        <input class="col-2 col-lg-2" type="hidden" name="trimestre_id"
                                            value="{{ $trimestre->id }}">

                                        <input class="col-2 col-lg-2" type="hidden"
                                            name="eleves[{{ $eleve->id }}][classe_id]"
                                            value="{{ $classe['classe']->id }}">

                                        <input class="col-2 col-lg-2" type="hidden"
                                            name="eleves[{{ $eleve->id }}][cours_id]"
                                            value="{{ $classe['cours']->id }}">

                                        <!-- Champ caché pour l'identification de l'élève -->
                                        <input class="col-2 col-lg-2" type="hidden"
                                            name="eleves[{{ $eleve->id }}][eleve_id]" value="{{ $eleve->id }}">

                                        <!-- Champ pour la note -->
                                        <input id="eleve_{{ $eleve->id }}" type="number"
                                            class="note-input form-control form-control-alt col-2 col-lg-1"
                                            name="eleves[{{ $eleve->id }}][note]" value="0.0" min="0"
                                            step="0.25" max="20" required>
                                        <span id="{{ $eleve->id }}" class="note-error-text text-danger ml-2">Note
                                            invalide</span>
                                    </div>

                                </div>

                                <hr />
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <div class="d-flex mt-5">
                    <button class="btn btn-success" type="submit">Enregistrer</button>
                </div>

            </form>
        </div>





    </div>

    <script>
        note_errors_spans = document.querySelectorAll('.note-error-text')
        notes_fields = document.querySelectorAll('.note-input')
        bareme = document.querySelector('#bareme')

        note_errors_spans.forEach(span => {
            span.style.display = 'none'
        })

        notes_fields.forEach(field => {
            field.oninput = () => {
                console.log(field.value)
                if (parseInt(bareme.value) < parseInt(field.value)) {
                    console.log(bareme.value)
                    field.nextElementSibling.style.display = 'block'
                } else {
                    field.nextElementSibling.style.display = 'none'
                }
            }
        });
    </script>
@endsection
