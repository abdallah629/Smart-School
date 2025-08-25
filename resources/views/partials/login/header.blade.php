<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-dark shadow">
    <div class="mt-2 mr-5">
        <a href="{{ route('dashboard') }}" class="d-inline-block">
            <h4 class="text-bold text-white">{{ Qs::getSystemName() }}</h4>
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav ml-auto align-items-center">

            {{-- Lien tableau de bord --}}
            <li class="nav-item">
                <a href="{{ route('home') }}" class="navbar-nav-link">
                    <i class="icon-home"></i>
                    <span class="d-md-none ml-2">Home</span>
                </a>
            </li>

            {{-- Sélecteur de langue --}}
            <li class="nav-item dropdown ml-3">
                <a href="#" class="navbar-nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
                    @if(app()->getLocale() == 'fr')
                        <img src="https://flagcdn.com/w20/fr.png" class="mr-2" alt="Français">
                        <span>Français</span>
                    @else
                        <img src="https://flagcdn.com/w20/gb.png" class="mr-2" alt="English">
                        <span>English</span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow rounded">
                    <form action="{{ route('setLocale') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" name="locale" value="en"
                                class="dropdown-item d-flex align-items-center {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                            <img src="https://flagcdn.com/w20/gb.png" class="mr-2" alt="English"> English
                        </button>
                        <button type="submit" name="locale" value="fr"
                                class="dropdown-item d-flex align-items-center {{ app()->getLocale() == 'fr' ? 'active' : '' }}">
                            <img src="https://flagcdn.com/w20/fr.png" class="mr-2" alt="Français"> Français
                        </button>
                    </form>
                </div>
            </li>

            {{-- Exemple futur : compte utilisateur --}}
            {{-- 
            <li class="nav-item dropdown">
                <a href="{{ route('login') }}" class="navbar-nav-link">
                    <i class="icon-user-tie"></i>
                    <span class="d-md-none ml-2">My Account</span>
                </a>
            </li>
            --}}
        </ul>
    </div>
</div>
<!-- /main navbar -->