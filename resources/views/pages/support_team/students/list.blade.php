@extends('layouts.master') 
@section('page_title', __('ui.student_information') . ' - ' . $my_class->name)
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">{{ __('ui.students_list') }}</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item">
                <a href="#all-students" class="nav-link active" data-toggle="tab">{{ __('ui.all_class_students', ['class' => $my_class->name]) }}</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('ui.sections') }}</a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach($sections as $s)
                        <a href="#s{{ $s->id }}" class="dropdown-item" data-toggle="tab">{{ $my_class->name.' '.$s->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-students">
                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>{{ __('ui.sn') }}</th>
                            <th>{{ __('ui.photo') }}</th>
                            <th>{{ __('ui.name') }}</th>
                            <th>{{ __('ui.adm_no') }}</th>
                            <th>{{ __('ui.section') }}</th>
                            <th>{{ __('ui.email') }}</th>
                            <th>{{ __('ui.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $s->user->photo }}" alt="{{ __('ui.photo') }}"></td>
                            <td>{{ $s->user->name }}</td>
                            <td>{{ $s->adm_no }}</td>
                            <td>{{ $my_class->name.' '.$s->section->name }}</td>
                            <td>{{ $s->user->email }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a href="{{ route('students.show', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-eye"></i> {{ __('ui.view_profile') }}</a>
                                            @if(Qs::userIsTeamSA())
                                                <a href="{{ route('students.edit', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> {{ __('ui.edit') }}</a>
                                                <a href="{{ route('st.reset_pass', Qs::hash($s->user->id)) }}" class="dropdown-item"><i class="icon-lock"></i> {{ __('ui.reset_password') }}</a>
                                            @endif
                                            <a target="_blank" href="{{ route('marks.year_selector', Qs::hash($s->user->id)) }}" class="dropdown-item"><i class="icon-check"></i> {{ __('ui.marksheet') }}</a>

                                            @if(Qs::userIsSuperAdmin())
                                                <a id="{{ Qs::hash($s->user->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> {{ __('ui.delete') }}</a>
                                                <form method="post" id="item-delete-{{ Qs::hash($s->user->id) }}" action="{{ route('students.destroy', Qs::hash($s->user->id)) }}" class="hidden">@csrf @method('delete')</form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @foreach($sections as $se)
                <div class="tab-pane fade" id="s{{$se->id}}">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>{{ __('ui.sn') }}</th>
                                <th>{{ __('ui.photo') }}</th>
                                <th>{{ __('ui.name') }}</th>
                                <th>{{ __('ui.adm_no') }}</th>
                                <th>{{ __('ui.email') }}</th>
                                <th>{{ __('ui.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students->where('section_id', $se->id) as $sr)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $sr->user->photo }}" alt="{{ __('ui.photo') }}"></td>
                                <td>{{ $sr->user->name }}</td>
                                <td>{{ $sr->adm_no }}</td>
                                <td>{{ $sr->user->email }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('students.show', Qs::hash($sr->id)) }}" class="dropdown-item"><i class="icon-eye"></i> {{ __('ui.view_info') }}</a>
                                                @if(Qs::userIsTeamSA())
                                                    <a href="{{ route('students.edit', Qs::hash($sr->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> {{ __('ui.edit') }}</a>
                                                    <a href="{{ route('st.reset_pass', Qs::hash($sr->user->id)) }}" class="dropdown-item"><i class="icon-lock"></i> {{ __('ui.reset_password') }}</a>
                                                @endif
                                                <a href="#" class="dropdown-item"><i class="icon-check"></i> {{ __('ui.marksheet') }}</a>

                                                @if(Qs::userIsSuperAdmin())
                                                    <a id="{{ Qs::hash($sr->user->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> {{ __('ui.delete') }}</a>
                                                    <form method="post" id="item-delete-{{ Qs::hash($sr->user->id) }}" action="{{ route('students.destroy', Qs::hash($sr->user->id)) }}" class="hidden">@csrf @method('delete')</form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
