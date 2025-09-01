@extends('layouts.master') 
@section('page_title', __('ui.fix_mark_errors'))
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-wrench mr-2"></i> {{ __('ui.batch_fix') }}</h5>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">


            {{-- Formulaire de sélection (GET) --}}
            <form method="get" action="{{ route('marks.batch_fix') }}">
                <div class="row">
                    <div class="col-md-10">
                        <fieldset>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exam_id" class="col-form-label font-weight-bold">{{ __('ui.exam') }}:</label>
                                        <select required id="exam_id" name="exam_id" data-placeholder="{{ __('ui.select_exam') }}" class="form-control select">
                                            @foreach($exams as $ex)
                                                <option {{ $selected && isset($exam_id) && $exam_id == $ex->id ? 'selected' : '' }} value="{{ $ex->id }}">{{ $ex->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="my_class_id" class="col-form-label font-weight-bold">{{ __('ui.class') }}:</label>
                                        <select required onchange="getClassSections(this.value)" id="my_class_id" name="my_class_id" class="form-control select">
                                            <option value="">{{ __('ui.select_class') }}</option>
                                            @foreach($my_classes as $c)
                                                <option {{ ($selected && isset($my_class_id) && $my_class_id == $c->id) ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="section_id" class="col-form-label font-weight-bold">{{ __('ui.section') }}:</label>
                                        <select required id="section_id" name="section_id" data-placeholder="{{ __('ui.select_class_first') }}" class="form-control select">
                                            @if($selected && isset($my_class_id))
                                                @foreach($sections->where('my_class_id', $my_class_id) as $s)
                                                    <option {{ isset($section_id) && $section_id == $s->id ? 'selected' : '' }} value="{{ $s->id }}">{{ $s->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-2 mt-4">
                        <div class="text-right mt-1">
                            <button type="submit" class="btn btn-danger">{{ __('ui.fix_errors') }} <i class="icon-wrench2 ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Formulaire de correction des notes (POST) --}}
            @if($selected && isset($marks) && $marks->count() > 0)
                <form class="ajax-update" method="post" action="{{ route('marks.batch_update') }}">
                    @csrf @method('PUT')
                    <input type="hidden" name="exam_id" value="{{ $exam_id }}">
                    <input type="hidden" name="my_class_id" value="{{ $my_class_id }}">
                    <input type="hidden" name="section_id" value="{{ $section_id }}">
                    <table class="table table-striped mt-4">
                        <thead>
                        <tr>
                            <th>{{ __('ui.sn') }}</th>
                            <th>{{ __('ui.name') }}</th>
                            <th>{{ __('ui.adm_no') }}</th>
                            <th>{{ __('ui.first_ca') }}</th>
                            <th>{{ __('ui.second_ca') }}</th>
                            <th>{{ __('ui.exam') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($marks->sortBy('user.name') as $mk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mk->user->name }} </td>
                                <td>{{ $mk->user->student_record->adm_no }}</td>
                                <td><input title="{{ __('ui.first_ca') }}" min="1" max="20" class="text-center" name="t1_{{ $mk->id }}" value="{{ $mk->t1 }}" type="number"></td>
                                <td><input title="{{ __('ui.second_ca') }}" min="1" max="20" class="text-center" name="t2_{{ $mk->id }}" value="{{ $mk->t2 }}" type="number"></td>
                                <td><input title="{{ __('ui.exam') }}" min="1" max="20" class="text-center" name="exm_{{ $mk->id }}" value="{{ $mk->exm }}" type="number"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-primary">Enregistrer les corrections <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            @endif

        </div>
    </div>
@endsection