<div> 
    <table class="td-left" style="border-collapse:collapse;">
        <tbody>
        <tr>
            <td><strong>{{ __('ui.class_teacher_comment') }}</strong></td>
            <td>  {{ $exr->t_comment ?: str_repeat('__', 40) }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('ui.principal_comment') }}</strong></td>
            <td>  {{ $exr->p_comment ?: str_repeat('__', 40) }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('ui.next_term_begins') }}</strong></td>
            <td>{{ date('l\, jS F\, Y', strtotime($s['term_begins'])) }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('ui.next_term_fees') }}</strong></td>
            <td><del style="text-decoration-style: double">N</del>{{ $s['next_term_fees_'.strtolower($ct)] }}</td>
        </tr>
        </tbody>
    </table>
</div>