<div> 
    {{--KEYS TO RATING--}}
    <div style="float: left">
        <br>
        <strong style="text-decoration: underline;">{{ __('ui.key') }}</strong> <br>
        <span>5 - {{ __('ui.excellent') }}</span> <br>
        <span>4 - {{ __('ui.very_good') }}</span> <br>
        <span>3 - {{ __('ui.good') }}</span> <br>
        <span>2 - {{ __('ui.fair') }}</span> <br>
        <span>1 - {{ __('ui.poor') }}</span> <br>
    </div>

    <table align="left" style="width:40%; border-collapse:collapse; border: 1px solid #000; margin:10px 20px;" border="1">
        <thead>
        <tr>
            <td><strong>{{ __('ui.affective_traits') }}</strong></td>
            <td><strong>{{ __('ui.rating') }}</strong></td>
        </tr>
        </thead>
        <tbody>
        @foreach ($skills->where('skill_type', 'AF') as $af)
            <tr>
                <td>{{ $af->name }}</td>
                <td>{{ $exr->af ? explode(',', $exr->af)[$loop->index] : '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <table align="left" style="width:35%; border-collapse:collapse;border: 1px solid #000;  margin: 10px 20px;" border="1">
        <thead>
        <tr>
            <td><strong>{{ __('ui.psychomotor') }}</strong></td>
            <td><strong>{{ __('ui.rating') }}</strong></td>
        </tr>
        </thead>
        <tbody>
        @foreach ($skills->where('skill_type', 'PS') as $ps)
            <tr>
                <td>{{ $ps->name }}</td>
                <td>{{ $exr->ps ? explode(',', $exr->ps)[$loop->index] : '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>