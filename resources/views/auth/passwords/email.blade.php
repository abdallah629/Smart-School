@extends('layouts.login_master')

@section('content')
<div class="page-content login-cover">

    <div class="content-wrapper">
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Formulaire de récupération de mot de passe -->
            <form class="login-form" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="card mb-0">
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                        <div class="text-center mb-3">
                            <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">{{ __('ui.password_recovery_title') }}</h5>
                            <span class="d-block text-muted">{{ __('ui.password_recovery_subtitle') }}</span>
                        </div>

                        <div class="form-group">
                            <input name="email" required type="email" class="form-control" value="{{ old('email') }}" placeholder="{{ __('ui.email_placeholder') }}">
                        </div>

                        <button type="submit" class="btn bg-blue btn-block">
                            <i class="icon-spinner11 mr-2"></i> {{ __('ui.reset_password_button') }}
                        </button>
                    </div>
                </div>
            </form>
            <!-- /formulaire de récupération de mot de passe -->

        </div>
    </div>
</div>
@endsection