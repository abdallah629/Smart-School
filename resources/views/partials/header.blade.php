<div id="page-header" class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-plus-circle2 mr-2"></i> <span class="font-weight-semibold">@yield('page_title')</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
   {{--         <a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>--}}
                <a href="{{ Qs::userIsSuperAdmin() ? route('settings') : '' }}" class="btn btn-link btn-float text-default"><i class="icon-arrow-down7 text-primary"></i> <span class="font-weight-semibold">Current Session: {{ Qs::getSetting('current_session') }}</span></a>
            
                {{-- Sélecteur de langue --}}
        
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
                {{-- Fin definition de langue --}}
            </div>
        </div>
    </div>

    {{--Breadcrumbs--}}
    {{--<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="form_select2.html" class="breadcrumb-item">Forms</a>
                <span class="breadcrumb-item active">Select2 selects</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>

                <div class="breadcrumb-elements-item dropdown p-0">
                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear mr-2"></i>
                        Settings
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                        <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
</div>
