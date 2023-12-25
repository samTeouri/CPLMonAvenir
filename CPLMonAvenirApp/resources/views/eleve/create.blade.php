@extends('layouts.dashboard')

<style>
    #imagePreview {
        max-height: 300px;
    }
</style>

@section('main-content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Inscription d'un nouvel élève
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="">Inscription</a></li>
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
            <div class="block-content px-5">
                <h3>Formulaire d'inscription</h3>
                <p class="font-size-sm text-muted">
                    Inscrivez un nouvel élève dans votre établissement.
                </p>
            </div>
            <div>
                <!-- Simple Wizard 2 -->
                <div class="js-wizard-simple block block">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                        <li class="nav-item bg-light">
                            <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">Identité de
                                l'élève <i class="fa fa-user ml-2" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item bg-light">
                            <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">Responsables de l'élève <i
                                    class="fa fa-user-friends ml-2" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item bg-light">
                            <a class="nav-link" href="#wizard-simple2-step3" data-toggle="tab">Information médicales <i
                                    class="fa fa-first-aid ml-2" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form action="{{ route('eleve.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Steps Content -->
                        <div class="block-content block-content-full tab-content px-md-5" style="min-height: 303px;">
                            <!-- Step 1 -->
                            <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">

                                <div class="row mx-0 px-0">

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-firstname">Nom de l'élève</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" name="nom" required />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-lastname">Prénoms de l'élève</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="prenom" required />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="sexe">Sexe de l'élève</label>
                                        <select class="form-control form-control-alt" name="sexe" id="sexe"
                                            required>
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="example-flatpickr-default">Date de naissance de l'élève</label>
                                        <input type="text" class="js-flatpickr form-control form-control-alt"
                                            id="example-flatpickr-default" name="date_naissance" placeholder="Y-m-d"
                                            required />
                                    </div>

                                </div>

                                <div class="row mx-0 px-0">



                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-lastname">Lieu de naissance</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="lieu_naissance" required>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="wizard-simple2-lastname">Adresse de l'élève</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="adresse" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-skills">Classe</label>
                                        <select class="form-control form-control-alt" id="wizard-simple2-skills"
                                            name="classe_id" required>
                                            <option value="">Selectionnez la classe de l'élève</option>
                                            @foreach ($promotions as $promotion)
                                                @foreach ($promotion->classes as $classe)
                                                    <option value="{{ $classe->id }}">{{ substr($classe->nom, 0, 6) }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="row mx-0 px-0 justify-content-between">
                                    <div class="form-group col-lg-3">
                                        <label for="">Photo passeport de l'élève</label>
                                        <input type="file" name="profil" accept="image/*"
                                            class="form-control form-control-file form-control-alt" id=""
                                            onchange="previewImage(event)" />
                                    </div>

                                    <div class="col-lg-3" id="imagePreview">

                                    </div>
                                </div>

                            </div>

                            <!-- END Step 1 -->

                            <!-- Step 2 -->
                            <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">

                                <h5 class="text-secondary">Informations sur le père de l'élève</h5>

                                <div class="row mx-0 px-0">

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-firstname">Nom du père</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" name="nom_pere" />
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="wizard-simple2-lastname">Prénom du père</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="prenom_pere" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-lastname">Contact du père</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="contact_pere" />
                                    </div>

                                </div>

                                <div class="row mx-0 px-0">

                                    <div class="form-group col-lg-6">
                                        <label for="wizard-simple2-firstname">Adresse du père</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" name="adresse_pere" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-lastname">Profession du père</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="profession_pere" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="sexe">Situation matrimoniale du père</label>
                                        <select class="form-control form-control-alt" name="situation_matrimoniale_pere"
                                            id="sexe">
                                            <option value="Célibataire">Célibataire</option>
                                            <option value="Marié">Marié</option>
                                            <option value="Veuf">Veuf</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>

                                </div>

                                <hr />

                                <h5 class="text-secondary">Informations sur la mère de l'élève</h5>

                                <div class="row mx-0 px-0">

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-firstname">Nom de la mère</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" name="nom_mere" />
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="wizard-simple2-lastname">Prénom de la mère</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="prenom_mere" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-lastname">Contact de la mère</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="contact_mere" />
                                    </div>

                                </div>

                                <div class="row mx-0 px-0">

                                    <div class="form-group col-lg-6">
                                        <label for="wizard-simple2-firstname">Adresse de la mère</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" name="adresse_mere" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-lastname">Profession de la mère</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="profession_mere" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="sexe">Situation matrimoniale de la mère</label>
                                        <select class="form-control form-control-alt" name="situation_matrimoniale_mere"
                                            id="sexe">
                                            <option value="Célibataire">Célibataire</option>
                                            <option value="Mariée">Mariée</option>
                                            <option value="Veuve">Veuve</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>

                                </div>

                                <hr />

                                <h5 class="text-secondary">Informations du tuteur</h5>

                                <div class="row mx-0 px-0">

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-firstname">Nom du tuteur</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" name="nom_tuteur" />
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="wizard-simple2-lastname">Prénom du tuteur</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="prenom_tuteur" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-lastname">Contact du tuteur</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="contact_tuteur" />
                                    </div>

                                </div>

                                <div class="row mx-0 px-0">

                                    <div class="form-group col-lg-6">
                                        <label for="wizard-simple2-firstname">Adresse du tuteur</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" name="adresse_tuteur" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-lastname">Profession du tuteur</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-lastname" name="profession_tuteur" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="sexe">Situation matrimoniale du tuteur</label>
                                        <select class="form-control form-control-alt" name="situation_matrimoniale_tuteur"
                                            id="sexe" required>
                                            <option value="Célibataire">Célibataire</option>
                                            <option value="Mariée">Marié(e)</option>
                                            <option value="Veuf">Veuf</option>
                                            <option value="Veuve">Veuve</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>

                                </div>


                            </div>
                            <!-- END Step 2 -->

                            <!-- Step 3 -->
                            <div class="tab-pane " id="wizard-simple2-step3" role="tabpanel">
                                <div class="row mx-0 px-0">

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-skills">Groupe sanguin</label>
                                        <select class="form-control form-control-alt" id="wizard-simple2-skills"
                                            name="groupe_sanguin">
                                            <option value="">Selectionnez le groupe sanguin</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-firstname">Problèmes de santés importants</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" name="problemes"
                                            placeholder="(Diabète, problèmes cardiaques)" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-firstname">Activitées restrintes</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" placeholder="course, balayage,..."
                                            name="restrictions" />
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="wizard-simple2-firstname">Médicaments pris</label>
                                        <input class="form-control form-control-alt" type="text"
                                            id="wizard-simple2-firstname" placeholder="ventoline, insuline,..."
                                            name="medicaments" />
                                    </div>

                                </div>

                                <hr />

                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-success" type="submit">Inscrire</button>
                                </div>

                            </div>
                            <!-- END Step 3 -->

                        </div>
                        <!-- END Steps Content -->
                    </form>
                    <!-- END Form -->

                </div>
                <!-- END Simple Wizard 2 -->
            </div>
        </div>

    </div>


    <script>
        function previewImage(event) {
            var input = event.target;

            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML = '<img src="' + dataURL +
                    '" alt="Image Preview" style="width:100%; height:100%;">';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

@endsection
