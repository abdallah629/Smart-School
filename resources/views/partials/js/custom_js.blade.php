<script>

    function getLGA(state_id){
        var url = '{{ route('get_lga', [':id']) }}';
        url = url.replace(':id', state_id);
        var lga = $('#lga_id');

        $.ajax({
            dataType: 'json',
            url: url,
            success: function (resp) {
                lga.empty();
                $.each(resp, function (i, data) {
                    lga.append($('<option>', { value: data.id, text: data.name }));
                });
            }
        })
    }

    function getClassSections(class_id, destination){
        var url = '{{ route('get_class_sections', [':id']) }}';
        url = url.replace(':id', class_id);
        var section = destination ? $(destination) : $('#section_id');

        $.ajax({
            dataType: 'json',
            url: url,
            success: function (resp) {
                section.empty();
                $.each(resp, function (i, data) {
                    section.append($('<option>', { value: data.id, text: data.name }));
                });
            }
        })
    }

    function getClassSubjects(class_id){
        var url = '{{ route('get_class_subjects', [':id']) }}';
        url = url.replace(':id', class_id);
        var section = $('#section_id');
        var subject = $('#subject_id');

        $.ajax({
            dataType: 'json',
            url: url,
            success: function (resp) {
                section.empty();
                subject.empty();
                $.each(resp.sections, function (i, data) {
                    section.append($('<option>', { value: data.id, text: data.name }));
                });
                $.each(resp.subjects, function (i, data) {
                    subject.append($('<option>', { value: data.id, text: data.name }));
                });
            }
        })
    }

    {{-- Notifications --}}
    @foreach (['pop_error'=>'error','pop_warning'=>'warning','pop_success'=>'success','flash_info'=>'info','flash_success'=>'success','flash_warning'=>'warning','flash_error'=>'danger','flash_danger'=>'danger'] as $key => $type)
        @if(session($key))
            @php
                $msg = session($key);
                $title = ($type=='success' && $key=='pop_success') ? __('ui.great') : '';
            @endphp
            @if(str_starts_with($key, 'pop_'))
                pop({ msg: '{{ $msg }}', type: '{{ $type }}', title: '{{ $title }}' });
            @else
                flash({ msg: '{{ $msg }}', type: '{{ $type }}' });
            @endif
        @endif
    @endforeach

    function pop(data){
        swal({
            title: data.title ? data.title : '{{ __('ui.oops') }}',
            text: data.msg,
            icon: data.type
        });
    }

    function flash(data){
        new PNotify({
            text: data.msg,
            type: data.type,
            hide : data.type !== "danger"
        });
    }

    function confirmDelete(id) {
        swal({
            title: "{{ __('ui.are_you_sure') }}",
            text: "{{ __('ui.delete_warning') }}",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then(function(willDelete){
            if (willDelete) $('form#item-delete-'+id).submit();
        });
    }

    function confirmReset(id) {
        swal({
            title: "{{ __('ui.are_you_sure') }}",
            text: "{{ __('ui.reset_warning') }}",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then(function(willDelete){
            if (willDelete) $('form#item-reset-'+id).submit();
        });
    }

    $('.download-receipt').on('click', function(ev){
        ev.preventDefault();
        $.get($(this).attr('href'));
        flash({ msg: '{{ __("ui.download_in_progress") }}', type: 'info' });
    });

    // Form submissions
    $('form#ajax-reg').on('submit', function(ev){
        ev.preventDefault();
        submitForm($(this), 'store');
        $('#ajax-reg-t-0').get(0).click();
    });

    $('form.ajax-pay').on('submit', function(ev){
        ev.preventDefault();
        submitForm($(this), 'store');

        var form_id = $(this).attr('id');
        var td_amt = $('td#amt-'+form_id);
        var td_amt_paid = $('td#amt_paid-'+form_id);
        var td_bal = $('td#bal-'+form_id);
        var input = $('#val-'+form_id);

        var amt = parseInt(td_amt.data('amount'));
        var amt_paid = parseInt(td_amt_paid.data('amount'));
        var amt_input = parseInt(input.val());

        amt_paid = amt_paid + amt_input;
        var bal = amt - amt_paid;

        td_bal.text(''+bal);
        td_amt_paid.text(''+amt_paid).data('amount', ''+amt_paid);
        input.attr('max', bal);
        bal < 1 ? $('#'+form_id).fadeOut('slow').remove() : '';
    });

    $('form.ajax-store, form.ajax-update').on('submit', function(ev){
        ev.preventDefault();
        var type = $(this).hasClass('ajax-store') ? 'store' : null;
        submitForm($(this), type);
        var div = $(this).data('reload');
        if(div) reloadDiv(div);
    });

    function reloadDiv(div){
        var url = window.location.href;
        url = url + ' '+ div;
        $(div).load( url );
    }

    function submitForm(form, formType){
        var btn = form.find('button[type=submit]');
        disableBtn(btn);

        var req = $.ajax({
            url: form.attr('action'),
            type: 'POST',
            cache: false,
            processData: false,
            dataType: 'json',
            contentType: false,
            data: new FormData(form[0])
        });

        req.done(function(resp){
            if(resp.ok && resp.msg){
                flash({ msg: resp.msg, type:'success' });
            } else {
                flash({ msg: resp.msg, type:'danger' });
            }
            hideAjaxAlert();
            enableBtn(btn);
            if(formType == 'store') clearForm(form);
            scrollTo('body');
        });

        req.fail(function(e){
            if(e.status == 422) displayAjaxErr(e.responseJSON.errors);
            if(e.status == 500) displayAjaxErr([e.status + ' ' + e.statusText + ' {{ __("ui.contact_admin") }}']);
            if(e.status == 404) displayAjaxErr([e.status + ' ' + e.statusText + ' - {{ __("ui.not_found") }}']);
            enableBtn(btn);
        });
    }

    function disableBtn(btn){
        var btnText = btn.data('text') ? btn.data('text') : '{{ __("ui.submitting") }}';
        btn.prop('disabled', true).html('<i class="icon-spinner mr-2 spinner"></i>' + btnText);
    }

    function enableBtn(btn){
        var btnText = btn.data('text') ? btn.data('text') : '{{ __("ui.submit_form") }}';
        btn.prop('disabled', false).html(btnText + '<i class="icon-paperplane ml-2"></i>');
    }

    function displayAjaxErr(errors){
        $('#ajax-alert').show().html('<div class="alert alert-danger border-0 alert-dismissible" id="ajax-msg"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>');
        $.each(errors, function(k, v){
            $('#ajax-msg').append('<span><i class="icon-arrow-right5"></i> '+ v +'</span><br/>');
        });
        scrollTo('body');
    }

    function scrollTo(el){
        $('html, body').animate({ scrollTop: $(el).offset().top }, 2000);
    }

    function hideAjaxAlert(){
        $('#ajax-alert').hide();
    }

    function clearForm(form){
        form.find('.select, .select-search').val([]).select2({ placeholder: '{{ __("ui.select") }}' });
        form[0].reset();
    }

</script>