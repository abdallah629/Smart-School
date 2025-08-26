{{-- My Children --}}
<li class="nav-item">
    <a href="{{ route('my_children') }}" 
       class="nav-link {{ in_array(Route::currentRouteName(), ['my_children']) ? 'active' : '' }}">
        <i class="fas icon-users"></i>
        @if(!request()->is('sidebar-collapsed'))
            <span>{{ __('ui.my_children') }}</span>
        @endif
    </a>
</li>