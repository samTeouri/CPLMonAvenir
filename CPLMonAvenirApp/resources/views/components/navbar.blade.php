<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout"
                data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Toggle Mini Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout"
                data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Toggle Mini Sidebar -->


        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">

            <div>
                <select class="form-control" id="change-year">
                    @foreach ($anneesScolaires as $anneeScolaire)
                        <option value="{{ $anneeScolaire->id }}"@if ($anneeScolaire->courant === true) selected @endif>
                            {{ $anneeScolaire->annee }}</option>
                    @endforeach
                </select>
            </div>



            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual d-flex align-items-center"
                    id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="{{ asset('/assets/media/avatars/avatar10.jpg') }}"
                        alt="Header Avatar" style="width: 21px;">
                    <span class="d-none d-sm-inline-block ml-2">{{ Auth::user()->username }}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-primary-dark rounded-top">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('/assets/media/avatars/avatar10.jpg') }}"
                            alt="">
                        <p class="mt-2 mb-0 text-white font-w500">{{ Auth::user()->username }}</p>
                        <p class="mb-0 text-white-50 font-size-sm">Directrice</p>
                    </div>
                    <div class="p-2">

                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="be_pages_generic_profile.html">
                            <span class="font-size-sm font-w500">Profile</span>
                            <span class="badge badge-pill badge-primary ml-2">1</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            <span class="font-size-sm font-w500">Settings</span>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="feather icon-power"></i> Déconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

            <!-- Notifications Dropdown -->
            {{-- <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="text-primary">•</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-2 bg-primary-dark text-center rounded-top">
                        <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                    </div>
                    <ul class="nav-items mb-0">
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-check-circle text-success"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">You have a new follower</div>
                                    <span class="font-w500 text-muted">15 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">1 new sale, keep it up</div>
                                    <span class="font-w500 text-muted">22 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-times-circle text-danger"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">Update failed, restart server</div>
                                    <span class="font-w500 text-muted">26 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">2 new sales, keep it up</div>
                                    <span class="font-w500 text-muted">33 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-user-plus text-success"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">You have a new subscriber</div>
                                    <span class="font-w500 text-muted">41 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-check-circle text-success"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">You have a new follower</div>
                                    <span class="font-w500 text-muted">42 min ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                            <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
                        </a>
                    </div>
                </div>
            </div> --}}
            <!-- END Notifications Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
