<li class="nav-item">
    <a href="{{ route('marks.year_select', Qs::hash(Auth::user()->id)) }}" 
       class="nav-link {{ in_array(Route::currentRouteName(), ['marks.show', 'marks.year_selector', 'pins.enter']) ? 'active' : '' }}">
        <i class="fas icon-book"></i>
        @if(!request()->is('sidebar-collapsed')) 
            <span>{{ __('ui.marksheets') }}</span>
        @endif
    </a>
</li>