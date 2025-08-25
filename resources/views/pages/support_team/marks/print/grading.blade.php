<div style="margin-bottom: 5px; text-align: center"> 
    <table border="0" cellpadding="5" cellspacing="5" style="text-align: center; margin: 0 auto;">
        <tr>
            <td><strong>{{ __('ui.key_to_grading') }}</strong></td>
            @if(Mk::getGradeList($class_type->id)->count())
                @foreach(Mk::getGradeList($class_type->id) as $gr)
                    <td><strong>{{ $gr->name }}</strong>
                        => {{ $gr->mark_from.' - '.$gr->mark_to }}
                    </td>
                @endforeach
            @endif
        </tr>
    </table>
</div>

<table style="width:100%; border-collapse:collapse; ">
    <tbody>
    <tr>
        <td><strong>{{ __('ui.number_of') }}</strong></td>
        <td><strong>{{ __('ui.distinctions') }}:</strong> {{ Mk::countDistinctions($marks) }}</td>
        <td><strong>{{ __('ui.credits') }}:</strong> {{ Mk::countCredits($marks) }}</td>
        <td><strong>{{ __('ui.passes') }}:</strong> {{ Mk::countPasses($marks) }}</td>
        <td><strong>{{ __('ui.failures') }}:</strong> {{ Mk::countFailures($marks) }}</td>
        <td><strong>{{ __('ui.subjects_offered') }}:</strong> {{ Mk::countSubjectsOffered($marks) }}</td>
    </tr>
    </tbody>
</table>