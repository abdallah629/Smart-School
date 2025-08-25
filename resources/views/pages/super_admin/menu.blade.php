{{--Manage Settings--}}
<li class="nav-item">
    <a href="{{ route('settings') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['settings',]) ? 'active' : '' }}">
        <i class="icon-gear"></i> <span>{{ __('ui.settings') }}</span>
    </a>
</li>

{{--Pins--}}
<li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['pins.create', 'pins.index']) ? 'nav-item-expanded nav-item-open' : '' }}">
    <a href="#" class="nav-link"><i class="icon-lock2"></i> <span>{{ __('ui.pins') }}</span></a>

    <ul class="nav nav-group-sub" data-submenu-title="{{ __('ui.manage_pins') }}">
        {{--Generate Pins--}}
        <li class="nav-item">
            <a href="{{ route('pins.create') }}"
               class="nav-link {{ (Route::is('pins.create')) ? 'active' : '' }}">{{ __('ui.generate_pins') }}</a>
        </li>

        {{--Valid/Invalid Pins--}}
        <li class="nav-item">
            <a href="{{ route('pins.index') }}"
               class="nav-link {{ (Route::is('pins.index')) ? 'active' : '' }}">{{ __('ui.view_pins') }}</a>
        </li>
    </ul>
</li>