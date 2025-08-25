{{--<!--NAME , CLASS AND OTHER INFO -->--}}
<table style="width:100%; border-collapse:collapse; ">
    <tbody>
    <tr>
        <td><strong>{{ __('ui.name') }}:</strong> {{ strtoupper($sr->user->name) }}</td>
        <td><strong>{{ __('ui.adm_no') }}:</strong> {{ $sr->adm_no }}</td>
        <td><strong>{{ __('ui.house') }}:</strong> {{ strtoupper($sr->house) }}</td>
        <td><strong>{{ __('ui.class') }}:</strong> {{ strtoupper($my_class->name) }}</td>
    </tr>
    <tr>
        <td><strong>{{ __('ui.report_sheet_for') }}</strong> {!! strtoupper(Mk::getSuffix($ex->term)) !!} {{ __('ui.term') }}</td>
        <td><strong>{{ __('ui.academic_year') }}:</strong> {{ $ex->year }}</td>
        <td><strong>{{ __('ui.age') }}:</strong> {{ $sr->age ?: ($sr->user->dob ? date_diff(date_create($sr->user->dob), date_create('now'))->y : '-') }}</td>
    </tr>
    </tbody>
</table>

{{--Exam Table--}}
<table style="width:100%; border-collapse:collapse; border: 1px solid #000; margin: 10px auto;" border="1">
    <thead>
    <tr>
        <th rowspan="2">{{ __('ui.subjects') }}</th>
        <th colspan="3">{{ __('ui.continuous_assessment') }}</th>
        <th rowspan="2">{{ __('ui.exam') }}<br>(60)</th>
        <th rowspan="2">{{ __('ui.final_marks') }} <br> (100%)</th>
        <th rowspan="2">{{ __('ui.grade') }}</th>
        <th rowspan="2">{{ __('ui.subject_position') }}</th>
        <th rowspan="2">{{ __('ui.remarks') }}</th>
    </tr>
    <tr>
        <th>{{ __('ui.ca1') }}(20)</th>
        <th>{{ __('ui.ca2') }}(20)</th>
        <th>{{ __('ui.total') }}(40)</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $sub)
        <tr>
            <td style="font-weight: bold">{{ $sub->name }}</td>
            @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                <td>{{ $mk->t1 ?: '-' }}</td>
                <td>{{ $mk->t2 ?: '-' }}</td>
                <td>{{ $mk->tca ?: '-' }}</td>
                <td>{{ $mk->exm ?: '-' }}</td>
                <td>{{ $mk->$tex ?: '-'}}</td>
                <td>{{ $mk->grade ? $mk->grade->name : '-' }}</td>
                <td>{!! ($mk->grade) ? Mk::getSuffix($mk->sub_pos) : '-' !!}</td>
                <td>{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="3"><strong>{{ __('ui.total_scores_obtained') }}: </strong> {{ $exr->total }}</td>
        <td colspan="3"><strong>{{ __('ui.final_average') }}: </strong> {{ $exr->ave }}</td>
        <td colspan="3"><strong>{{ __('ui.class_average') }}: </strong> {{ $exr->class_ave }}</td>
    </tr>
    </tbody>
</table>