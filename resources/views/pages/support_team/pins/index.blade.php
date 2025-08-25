@extends('layouts.master') 
@section('page_title', __('ui.exam_pins'))
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">{{ __('ui.exam_pins') }}</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#valid-pins" class="nav-link active" data-toggle="tab">{{ __('ui.valid_pins') }}</a></li>
                <li class="nav-item"><a href="#used-pins" class="nav-link" data-toggle="tab">{{ __('ui.used_pins') }}</a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane fade show active" id="valid-pins">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center alert alert-info border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span>{{ __('ui.valid_pins_count', ['count' => $pin_count]) }}</span>
                            </div>
                        </div>
                    </div>

                    @foreach($valid_pins->chunk(4) as $chunk)
                        <div class="row">
                            @foreach($chunk as $vp)
                                <div class="col-md-3">{{ $vp->code }}</div>
                            @endforeach
                        </div>
                    @endforeach

                </div>

                {{--Used Pins--}}
                <div class="tab-pane fade" id="used-pins">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                                <div class="text-center">
                                    <span>{{ __('ui.used_pins_count', ['count' => $used_pins->count()]) }}</span>

                                    <a id="used-pins" onclick="confirmDelete(this.id)" href="#" class="btn btn-danger btn-sm ml-2"><i class="icon-trash mr-1"></i> {{ __('ui.delete_all_used_pins') }}</a>
                                    <form method="post" id="item-delete-used-pins" action="{{ route('pins.destroy', 'used-pins') }}" class="hidden">@csrf @method('delete')</form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table datatable-button-html5-columns">
                                <thead>
                                <tr>
                                    <th>{{ __('ui.sn') }}</th>
                                    <th>{{ __('ui.pin') }}</th>
                                    <th>{{ __('ui.used_by') }}</th>
                                    <th>{{ __('ui.user_type') }}</th>
                                    <th>{{ __('ui.used_for_student') }}</th>
                                    <th>{{ __('ui.date_used') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($used_pins as $up)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $up->code }}</td>
                                        <td><a href="{{ $up->user->user_type == 'student' ? route('students.show', Qs::hash(Qs::getSRByUserID($up->user->id)->id)) : route('users.show', Qs::hash($up->user->id)) }}">{{ $up->user->name }}</a></td>
                                        <td>{{ $up->user->user_type }}</td>
                                        <td><a href="{{ route('students.show', Qs::hash(Qs::getSRByUserID($up->student->id)->id))  }}">{{ $up->student->name }}</a></td>
                                        <td>{{ $up->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection