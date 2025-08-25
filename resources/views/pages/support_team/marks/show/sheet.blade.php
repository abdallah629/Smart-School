<table class="table table-bordered table-responsive text-center"> 
    <thead>
    <tr>
        <th rowspan="2">{{ __('ui.sn') }}</th>
        <th rowspan="2">{{ __('ui.subjects') }}</th>
        <th rowspan="2">{{ __('ui.ca1') }}<br>(20)</th>
        <th rowspan="2">{{ __('ui.ca2') }}<br>(20)</th>
        <th rowspan="2">{{ __('ui.exams') }}<br>(60)</th>
        <th rowspan="2">{{ __('ui.total') }}<br>(100)</th>

        {{--Grade, Subject Position & Remarks--}}
        <th rowspan="2">{{ __('ui.grade') }}</th>
        <th rowspan="2">{{ __('ui.subject_position') }}</th>
        <th rowspan="2">{{ __('ui.remarks') }}</th>
    </tr>
    </thead>

    <tbody>
    @foreach($subjects as $sub)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sub->name }}</td>
            @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                <td>{{ ($mk->t1) ?: '-' }}</td>
                <td>{{ ($mk->t2) ?: '-' }}</td>
                <td>{{ ($mk->exm) ?: '-' }}</td>
                <td>
                    @if($ex->term === 1) {{ ($mk->tex1) }}
                    @elseif ($ex->term === 2) {{ ($mk->tex2) }}
                    @elseif ($ex->term === 3) {{ ($mk->tex3) }}
                    @else {{ '-' }}
                    @endif
                </td>

                <td>{{ ($mk->grade) ? $mk->grade->name : '-' }}</td>
                <td>{!! ($mk->grade) ? Mk::getSuffix($mk->sub_pos) : '-' !!}</td>
                <td>{{ ($mk->grade) ? $mk->grade->remark : '-' }}</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="4"><strong>{{ __('ui.total_scores_obtained') }}: </strong> {{ $exr->total }}</td>
        <td colspan="3"><strong>{{ __('ui.final_average') }}: </strong> {{ $exr->ave }}</td>
        <td colspan="2"><strong>{{ __('ui.class_average') }}: </strong> {{ $exr->class_ave }}</td>
    </tr>
    </tbody>
</table>