@extends('home')

@section('main-content')

@if (Session::get('success'))
<script type="text/javascript">
    One.helpers("notify", {type: "success", icon: "fa fa-check mr-1", message: "{{ Session::get('success') }}"});
</script>
@endif

@if (Session::get('error'))
<script type="text/javascript">
$(document).ready(function () {
    toastr.success("{{ Session::get('success') }}");
});
</script>
@endif

<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Inscription d'un élève
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Élèves</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="#">Inscriptions</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Informations de l'élève</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-4">
                    <p class="font-size-sm text-muted">
                        Les champs marqués "<em class="field-required">*</em>" sont obligatoires !
                    </p>
                </div>
                <div class="col-lg-8">
                    <form action="{{ route('eleves.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-row">
                            <div class="col-5">
                                <label class="form-label" for="nom">Nom <em class="field-required">*</em></label>
                                <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}">
                                @error('nom')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-5">
                                <label class="form-label" for="prenom">Prénom <em class="field-required">*</em></label>
                                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom') }}">
                                @error('prenom')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-5">
                                <label class="form-label" for="telephone">Téléphone du Parent ou du Tuteur <em class="field-required">*</em></label>
                                <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ old('telephone') }}">
                                @error('telephone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-7">
                                <label class="form-label" for="email">E-mail du Parent ou du Tuteur</label>
                                <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="date_naissance">Date de naissance <em class="field-required">*</em></label>
                                <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}">
                                @error('date_naissance')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-6">
                                <label class="form-label" for="profil">Photo d'identité</label>
                                <input type="file" name="profil" id="profil" class="form-control" value="{{ old('profil') }}">
                                @error('profil')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-5">
                                <label class="form-label" for="niveaux">Niveau <em class="field-required">*</em></label>
                                <select id="niveaux" name="niveau" class="form-control select2-dropdown">
                                    @foreach($niveaux as $niveau)
                                        <option value="{{ $niveau->id }}">{{ $niveau->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-5">
                                <label class="form-label" for="classe">Classe <em class="field-required">*</em></label>
                                <select class="form-control select2-dropdown" id="classes" name="classe_id">
                                    @foreach($niveaux as $niveau)
                                        @foreach($niveau->classes as $classe)
                                            <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                                @error('classe_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 ml-auto">
                                <button type="submit" class="btn btn-dark">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#niveaux').change(function () {
            var niveauId = $(this).val();
            $.ajax({
                url: "/admin/classes-by-niveau/" + niveauId,
                type: "GET",
                success: function(data) {
                    $('#classes').empty();
                    console.log(data);
                    $.each(data, function (index, classe) {
                        $('#classes').append('<option value="' + classe.id + '">' + classe.libelle + '</option>');
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $('#classes').change(function () {
            var classeId = $(this).val();
            $.ajax({
                url: "/admin/niveau-by-classe/" + classeId,
                type: "GET",
                success: function(data) {
                    $('#niveaux > option').each(function () {
                        if ($(this).val() == data.id) {
                            $(this).attr('selected', 'selected');
                        }
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection
