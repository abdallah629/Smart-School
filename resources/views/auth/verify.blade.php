@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ui.verify_email_title') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('ui.verify_email_resent') }}
                        </div>
                    @endif

                    {{ __('ui.verify_email_before') }}
                    {{ __('ui.verify_email_not_received') }}, 
                    <a href="{{ route('verification.resend') }}">{{ __('ui.verify_email_request_new') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection