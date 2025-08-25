@extends('layouts.login_master')

@section('content')

<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title font-weight-bold text-center">{{ __('ui.privacy_policy') }}</h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div style="font-size: 16px;" class="col-md-10 offset-md-1">
                            <p>{{ __('ui.last_modified') }}: November 4, 2019</p>

                            <h4 class="font-weight-semibold">{{ __('ui.introduction') }}</h4>

                            <p>{{ $app_name }} ({{ __('ui.we') }}) {{ __('ui.respects_privacy') }}</p>

                            <p>{{ __('ui.policy_description', ['app_url' => $app_url]) }}</p>

                            <p>{{ __('ui.policy_applies') }}</p>

                            <ul>
                                <li>{{ __('ui.on_website') }}</li>
                                <li>{{ __('ui.in_email_text') }}</li>
                            </ul>

                            <p>{{ __('ui.read_policy_notice') }}</p>

                            <h4 class="font-weight-semibold">{{ __('ui.children_under_13') }}</h4>
                            <p>{{ __('ui.children_notice', ['contact_phone' => $contact_phone]) }}</p>

                            <h4 class="font-weight-semibold">{{ __('ui.info_we_collect_title') }}</h4>
                            <p>{{ __('ui.info_we_collect_intro') }}</p>

                            <ul>
                                <li>{{ __('ui.info_personal') }}</li>
                                <li>{{ __('ui.info_non_personal') }}</li>
                                <li>{{ __('ui.info_connection') }}</li>
                            </ul>

                            <p>{{ __('ui.info_collection_methods') }}</p>
                            <ul>
                                <li>{{ __('ui.directly_from_you') }}</li>
                                <li>{{ __('ui.automatically') }}</li>
                            </ul>

                            <h4 class="font-weight-semibold">{{ __('ui.info_you_provide_title') }}</h4>
                            <ul>
                                <li>{{ __('ui.info_forms') }}</li>
                                <li>{{ __('ui.info_records') }}</li>
                            </ul>

                            <h4 class="font-weight-semibold">{{ __('ui.info_auto_title') }}</h4>
                            <p>{{ __('ui.info_auto_intro') }}</p>
                            <ul>
                                <li>{{ __('ui.info_auto_visits') }}</li>
                                <li>{{ __('ui.info_auto_computer') }}</li>
                            </ul>

                            <p>{{ __('ui.info_auto_usage') }}</p>
                            <ul>
                                <li>{{ __('ui.info_auto_audience') }}</li>
                                <li>{{ __('ui.info_auto_speed') }}</li>
                                <li>{{ __('ui.info_auto_recognize') }}</li>
                            </ul>

                            <p>{{ __('ui.info_auto_tech_intro') }}</p>
                            <ul>
                                <li><strong>{{ __('ui.cookies') }}</strong> {{ __('ui.cookies_description') }}</li>
                                <li><strong>{{ __('ui.flash_cookies') }}</strong> {{ __('ui.flash_cookies_description') }}</li>
                                <li><strong>{{ __('ui.web_beacons') }}</strong> {{ __('ui.web_beacons_description') }}</li>
                            </ul>

                            <h4 class="font-weight-semibold">{{ __('ui.how_we_use') }}</h4>
                            <ul>
                                <li>{{ __('ui.use_present_website') }}</li>
                                <li>{{ __('ui.use_interactive_features') }}</li>
                                <li>{{ __('ui.use_other') }}</li>
                                <li>{{ __('ui.use_with_consent') }}</li>
                            </ul>

                            <h4 class="font-weight-semibold">{{ __('ui.disclosure_title') }}</h4>
                            <p>{{ __('ui.disclosure_aggregated') }}</p>
                            <p>{{ __('ui.disclosure_personal_intro') }}</p>
                            <ul>
                                <li>{{ __('ui.disclosure_purpose') }}</li>
                                <li>{{ __('ui.disclosure_other') }}</li>
                                <li>{{ __('ui.disclosure_consent') }}</li>
                            </ul>
                            <p>{{ __('ui.disclosure_additional_intro') }}</p>
                            <ul>
                                <li>{{ __('ui.disclosure_law') }}</li>
                                <li>{{ __('ui.disclosure_terms', ['url' => route('terms_of_use')]) }}</li>
                                <li>{{ __('ui.disclosure_protect') }}</li>
                            </ul>

                            <h4 class="font-weight-semibold">{{ __('ui.choices_title') }}</h4>
                            <p>{{ __('ui.choices_intro') }}</p>
                            <ul>
                                <li><strong>{{ __('ui.tracking_technologies') }}</strong> {{ __('ui.tracking_description') }}</li>
                            </ul>

                            <h4 class="font-weight-semibold">{{ __('ui.security_title') }}</h4>
                            <p>{{ __('ui.security_text') }}</p>

                            <h4 class="font-weight-semibold">{{ __('ui.changes_title') }}</h4>
                            <p>{{ __('ui.changes_text') }}</p>

                            <h4 class="font-weight-semibold">{{ __('ui.contact_title') }}</h4>
                            <p>{{ __('ui.contact_text', ['contact_phone' => $contact_phone]) }}</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
</div>
@endsection