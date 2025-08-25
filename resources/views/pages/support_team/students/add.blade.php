@extends('layouts.master') 
@section('page_title', __('ui.admit_student'))
@section('content')
<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title">{{ __('ui.fill_form_to_admit') }}</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <form id="ajax-reg" method="post" enctype="multipart/form-data" class="wizard-form steps-validation" action="{{ route('students.store') }}" data-fouc>
       @csrf
        <h6>{{ __('ui.personal_data') }}</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ __('ui.full_name') }}: <span class="text-danger">*</span></label>
                        <input value="{{ old('name') }}" required type="text" name="name" placeholder="{{ __('ui.full_name') }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ __('ui.address') }}: <span class="text-danger">*</span></label>
                        <input value="{{ old('address') }}" class="form-control" placeholder="{{ __('ui.address') }}" name="address" type="text" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ __('ui.email_address') }}: </label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="{{ __('ui.email_address') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gender">{{ __('ui.gender') }}: <span class="text-danger">*</span></label>
                        <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="{{ __('ui.choose') }}">
                            <option value=""></option>
                            <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">{{ __('ui.male') }}</option>
                            <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">{{ __('ui.female') }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ __('ui.phone') }}:</label>
                        <input value="{{ old('phone') }}" type="text" name="phone" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ __('ui.telephone') }}:</label>
                        <input value="{{ old('phone2') }}" type="text" name="phone2" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ __('ui.date_of_birth') }}:</label>
                        <input name="dob" value="{{ old('dob') }}" type="text" class="form-control date-pick" placeholder="{{ __('ui.select_date') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nal_id">{{ __('ui.nationality') }}: <span class="text-danger">*</span></label>
                        <select data-placeholder="{{ __('ui.choose') }}" required name="nal_id" id="nal_id" class="select-search form-control">
                            <option value=""></option>
                            @foreach($nationals as $nal)
                                <option {{ (old('nal_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="state_id">{{ __('ui.state') }}: <span class="text-danger">*</span></label>
                    <select onchange="getLGA(this.value)" required data-placeholder="{{ __('ui.choose') }}" class="select-search form-control" name="state_id" id="state_id">
                        <option value=""></option>
                        @foreach($states as $st)
                            <option {{ (old('state_id') == $st->id ? 'selected' : '') }} value="{{ $st->id }}">{{ $st->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="lga_id">{{ __('ui.lga') }}: <span class="text-danger">*</span></label>
                    <select required data-placeholder="{{ __('ui.select_state_first') }}" class="select-search form-control" name="lga_id" id="lga_id">
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bg_id">{{ __('ui.blood_group') }}: </label>
                        <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="{{ __('ui.choose') }}">
                            <option value=""></option>
                            @foreach(App\Models\BloodGroup::all() as $bg)
                                <option {{ (old('bg_id') == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">{{ __('ui.upload_passport_photo') }}:</label>
                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                        <span class="form-text text-muted">{{ __('ui.accepted_images') }}</span>
                    </div>
                </div>
            </div>
        </fieldset>

        <h6>{{ __('ui.student_data') }}</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="my_class_id">{{ __('ui.class') }}: <span class="text-danger">*</span></label>
                        <select onchange="getClassSections(this.value)" data-placeholder="{{ __('ui.choose') }}" required name="my_class_id" id="my_class_id" class="select-search form-control">
                            <option value=""></option>
                            @foreach($my_classes as $c)
                                <option {{ (old('my_class_id') == $c->id ? 'selected' : '') }} value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="section_id">{{ __('ui.section') }}: <span class="text-danger">*</span></label>
                        <select data-placeholder="{{ __('ui.select_class_first') }}" required name="section_id" id="section_id" class="select-search form-control">
                            <option {{ (old('section_id')) ? 'selected' : '' }} value="{{ old('section_id') }}">{{ (old('section_id')) ? __('ui.selected') : '' }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="my_parent_id">{{ __('ui.parent') }}: </label>
                        <select data-placeholder="{{ __('ui.choose') }}" name="my_parent_id" id="my_parent_id" class="select-search form-control">
                            <option value=""></option>
                            @foreach($parents as $p)
                                <option {{ (old('my_parent_id') == Qs::hash($p->id)) ? 'selected' : '' }} value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="year_admitted">{{ __('ui.year_admitted') }}: <span class="text-danger">*</span></label>
                        <select data-placeholder="{{ __('ui.choose') }}" required name="year_admitted" id="year_admitted" class="select-search form-control">
                            <option value=""></option>
                            @for($y=date('Y', strtotime('- 10 years')); $y<=date('Y'); $y++)
                                <option {{ (old('year_admitted') == $y) ? 'selected' : '' }} value="{{ $y }}">{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <!-- Dormitory and other fields can be similarly translated -->
        </fieldset>
    </form>
</div>
@endsection