@extends('layouts.login_master')

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title font-weight-bold text-center">{{ __('ui.terms_of_use') }}</h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-md-1" style="font-size:16px;">
                            <p>{{ __('ui.last_modified') }}: {{ $last_modified ?? 'August 18, 2025' }}</p>

                            @php
                                $sections = [
                                    ['title' => __('ui.introduction'), 'content' => __('ui.terms_intro', ['app_name' => $app_name])],
                                    ['title' => __('ui.user_obligations'), 'content' => __('ui.user_obligations_text')],
                                    ['title' => __('ui.intellectual_property'), 'content' => __('ui.intellectual_property_text')],
                                    ['title' => __('ui.limitations'), 'content' => __('ui.limitations_text')],
                                    ['title' => __('ui.termination'), 'content' => __('ui.termination_text')],
                                    ['title' => __('ui.disclaimer'), 'content' => __('ui.disclaimer_text')],
                                    ['title' => __('ui.governing_law'), 'content' => __('ui.governing_law_text')],
                                    ['title' => __('ui.contact'), 'content' => __('ui.contact_text', ['contact_phone' => $contact_phone])],
                                ];
                            @endphp

                            @foreach($sections as $section)
                                <h4 class="font-weight-semibold">{{ $section['title'] }}</h4>
                                <p>{!! $section['content'] !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection