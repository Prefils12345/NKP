<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="modern admin logo" src="{{asset('app-assets/images/logo/logo.png')}}">
                        <h3 class="brand-text">Modern</h3>
                    </a></li>
                <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#">Vous êtes connecté en tant que : {{Auth::user()->role->role}}</a></li>
                    
                    
                </ul>
                <ul class="nav navbar-nav float-right">
                    
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">
                    @auth
                        {{ Auth::user()->prenom}} {{Auth::user()->nom }}
                    @endauth    
                    </span><span class="avatar avatar-online"><img src="{{asset('app-assets/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Editer profil</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item logout" href="#"><i class="ft-power"></i> Déconnexion</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{route('dashboard.index')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="Templates">Users</span></a>
                <ul class="menu-content">
                    @can('role.index')
                    <li><a class="menu-item" href="#"><i></i><span data-i18n="Vertical">Rôles</span></a></li>
                    @endcan
                    @can('user.index')
                    <li><a class="menu-item" href="#"><i></i><span data-i18n="Vertical">Users</span></a></li>
                    @endcan
                </ul>
            </li>
                <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="Templates">Identifications</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{route('personne.index')}}"><i></i><span data-i18n="Vertical">Identification</span></a></li>
                    </ul>
                </li>
        </ul>
    </div>
</div>

<!-- END: Main Menu-->