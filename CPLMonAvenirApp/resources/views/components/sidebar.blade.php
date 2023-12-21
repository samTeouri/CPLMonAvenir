<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="{{ route('dashboard') }}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">
                Soukouli
            </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('dashboard') }}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Tableau de bord</span>
                    </a>
                </li>

                <!----- Matières et Cours ------>

                <li class="nav-main-heading">Matières et Cours</li>

                <!---- Matières ---->

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-layers"></i>
                        <span class="nav-main-link-name">Matières</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('matiere.index') }}">
                                <i class="nav-main-link-icon fa fa-book"></i>
                                <span class="nav-main-link-name">Ajouter une matière</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!------ Cours ------>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-puzzle"></i>
                        <span class="nav-main-link-name">Cours</span>
                    </a>

                    <ul class="nav-main-submenu">


                        <!---- Classes de 6eme ---->

                        @foreach ($promotions as $promotion)
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">{{ $promotion->nom }}eme</span>
                                </a>
                                <ul class="nav-main-submenu">


                                    <!----- Gestion des groupes ------>

                                    @foreach ($promotion->classes as $classe)
                                        <!----- Groupe ---->
                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                                aria-haspopup="true" aria-expanded="false" href="#">
                                                <span class="nav-main-link-name">{{ $classe->nom }}</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link"
                                                        href="{{ route('cours.index', $classe->id) }}">
                                                        <span class="nav-main-link-name">Liste des cours</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach


                                </ul>
                            </li>
                        @endforeach

                    </ul>

                </li>



                <!----- Evaluations ------>


                <li class="nav-main-heading">Evaluations</li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-note"></i>
                        <span class="nav-main-link-name">Evaluations</span>
                    </a>
                    <ul class="nav-main-submenu">


                        <!---- Devoirs ---->

                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-pencil"></i>
                                <span class="nav-main-link-name">Nouveau devoir/composition</span>
                            </a>
                            <ul class="nav-main-submenu">
                                @foreach ($promotions as $promotion)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"
                                            href="{{ route('evaluation_matieres', $promotion->id) }}">
                                            <span class="nav-main-link-name">{{ $promotion->nom }}eme</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>



                        <!---- Interrogations ---->

                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-pencil"></i>
                                <span class="nav-main-link-name">Nouvelle interrogation</span>
                            </a>
                            <ul class="nav-main-submenu">


                                @foreach ($promotions as $promotion)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="false" href="#">
                                            <span class="nav-main-link-name">{{ $promotion->nom }}eme</span>
                                        </a>
                                        <ul class="nav-main-submenu">

                                            @foreach ($promotion->classes as $classe)
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link nav-main-link-submenu"
                                                        data-toggle="submenu" aria-haspopup="true"
                                                        aria-expanded="false" href="#">
                                                        <span
                                                            class="nav-main-link-name">{{ substr($classe->nom, 0, 6) }}</span>
                                                    </a>
                                                    <ul class="nav-main-submenu">
                                                        <li class="nav-main-item">
                                                            <a class="nav-main-link"
                                                                href="{{ route('interrogation.cours', $classe->id) }}">
                                                                <span class="nav-main-link-name">Ajouter
                                                                    interrogation</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </li>


                        <!---- Devoirs ---->

                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-eye"></i>
                                <span class="nav-main-link-name">Voir les devoirs/compostions</span>
                            </a>
                            <ul class="nav-main-submenu">
                                @foreach ($promotions as $promotion)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"
                                            href="{{ route('view_evaluation_matieres', $promotion->id) }}">
                                            <span class="nav-main-link-name">{{ $promotion->nom }}eme</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>





                        <!---- Interrogations ---->

                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-eye"></i>
                                <span class="nav-main-link-name">Voir les interrogations</span>
                            </a>
                            <ul class="nav-main-submenu">


                                @foreach ($promotions as $promotion)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="false" href="#">
                                            <span class="nav-main-link-name">{{ $promotion->nom }}eme</span>
                                        </a>
                                        <ul class="nav-main-submenu">

                                            @foreach ($promotion->classes as $classe)
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link nav-main-link-submenu"
                                                        data-toggle="submenu" aria-haspopup="true"
                                                        aria-expanded="false" href="#">
                                                        <span
                                                            class="nav-main-link-name">{{ substr($classe->nom, 0, 6) }}</span>
                                                    </a>
                                                    <ul class="nav-main-submenu">
                                                        <li class="nav-main-item">
                                                            <a class="nav-main-link"
                                                                href="{{ route('view_interrogation_cours', $classe->id) }}">
                                                                <span class="nav-main-link-name">Voir
                                                                    interrogations</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </li>


                    </ul>
                </li>





                <!----- Classes ------>

                <li class="nav-main-heading">Nos classes</li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-chalkboard-teacher"></i>
                        <span class="nav-main-link-name">Classes</span>
                    </a>

                    <ul class="nav-main-submenu">


                        <!---- Classes de 6eme ---->

                        @foreach ($promotions as $promotion)
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">{{ $promotion->nom }}eme</span>
                                </a>
                                <ul class="nav-main-submenu">

                                    <!---- Ajouter un groupe ---->

                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('classe.list', $promotion->id) }}">
                                            <span class="nav-main-link-name">Ajouter un groupe</span>
                                        </a>
                                    </li>

                                    <!----- Gestion des groupes ------>

                                    @foreach ($promotion->classes as $classe)
                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                                aria-haspopup="true" aria-expanded="false" href="#">
                                                <span class="nav-main-link-name">{{ $classe->nom }}</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link"
                                                        href="{{ route('classe.index', $classe->id) }}">
                                                        <span class="nav-main-link-name">Liste des élèves</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                        @endforeach

                    </ul>

                </li>

                <!----- Administration ------>

                <li class="nav-main-heading">Inscription</li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-plus"></i>
                        <span class="nav-main-link-name">Admission</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('eleve.create') }}">
                                <span class="nav-main-link-name">Inscrire un élève</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-main-heading">Administration</li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">Équipe enseignante</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('professeur.index') }}">
                                <span class="nav-main-link-name">Recruter un enseignant</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-main-heading">Develop</li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-puzzle"></i>
                        <span class="nav-main-link-name">Multi Level Menu</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                                <span class="nav-main-link-name">Link 1-1</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                                <span class="nav-main-link-name">Link 1-2</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <span class="nav-main-link-name">Sub Level 2</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="#">
                                        <span class="nav-main-link-name">Link 2-1</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="#">
                                        <span class="nav-main-link-name">Link 2-2</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                        aria-haspopup="true" aria-expanded="false" href="#">
                                        <span class="nav-main-link-name">Sub Level 3</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="#">
                                                <span class="nav-main-link-name">Link 3-1</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="#">
                                                <span class="nav-main-link-name">Link 3-2</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                                aria-haspopup="true" aria-expanded="false" href="#">
                                                <span class="nav-main-link-name">Sub Level 4</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="#">
                                                        <span class="nav-main-link-name">Link 4-1</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="#">
                                                        <span class="nav-main-link-name">Link 4-2</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link nav-main-link-submenu"
                                                        data-toggle="submenu" aria-haspopup="true"
                                                        aria-expanded="false" href="#">
                                                        <span class="nav-main-link-name">Sub Level 5</span>
                                                    </a>
                                                    <ul class="nav-main-submenu">
                                                        <li class="nav-main-item">
                                                            <a class="nav-main-link" href="#">
                                                                <span class="nav-main-link-name">Link 5-1</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-main-item">
                                                            <a class="nav-main-link" href="#">
                                                                <span class="nav-main-link-name">Link 5-2</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-main-item">
                                                            <a class="nav-main-link nav-main-link-submenu"
                                                                data-toggle="submenu" aria-haspopup="true"
                                                                aria-expanded="false" href="#">
                                                                <span class="nav-main-link-name">Sub Level 6</span>
                                                            </a>
                                                            <ul class="nav-main-submenu">
                                                                <li class="nav-main-item">
                                                                    <a class="nav-main-link" href="#">
                                                                        <span class="nav-main-link-name">Link
                                                                            6-1</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-main-item">
                                                                    <a class="nav-main-link" href="#">
                                                                        <span class="nav-main-link-name">Link
                                                                            6-2</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
