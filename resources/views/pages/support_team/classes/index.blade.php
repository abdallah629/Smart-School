@extends('layouts.master') 
@section('page_title', __('ui.manage_classes'))

@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">{{ __('ui.manage_classes') }}</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">{{ __('ui.manage_classes') }}</a></li>
            <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> {{ __('ui.create_new_class') }}</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-classes">
                <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>{{ __('ui.name') }}</th>
                        <th>{{ __('ui.class_type') }}</th>
                        <th>{{ __('ui.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($my_classes as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->class_type->name }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            @if(Qs::userIsTeamSA())
                                            <a href="{{ route('classes.edit', $c->id) }}" class="dropdown-item"><i class="icon-pencil"></i> {{ __('ui.edit') }}</a>
                                            @endif
                                            @if(Qs::userIsSuperAdmin())
                                            <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> {{ __('ui.delete') }}</a>
                                            <form method="post" id="item-delete-{{ $c->id }}" action="{{ route('classes.destroy', $c->id) }}" class="hidden">@csrf @method('delete')</form>
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

            <div class="tab-pane fade" id="new-class">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info border-0 alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                            <span>{{ __('ui.class_creation_note') }} <a target="_blank" href="{{ route('sections.index') }}">{{ __('ui.manage_sections') }}</a></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <form class="ajax-store" method="post" action="{{ route('classes.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">{{ __('ui.name') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="{{ __('ui.name_of_class') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">{{ __('ui.class_type') }}</label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="{{ __('ui.select_class_type') }}" class="form-control select" name="class_type_id" id="class_type_id">
                                        @foreach($class_types as $ct)
                                            <option {{ old('class_type_id') == $ct->id ? 'selected' : '' }} value="{{ $ct->id }}">{{ $ct->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="text-right">
                                <button id="ajax-btn" type="submit" class="btn btn-primary">{{ __('ui.submit_form') }} <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Class List Ends--}}

@endsection