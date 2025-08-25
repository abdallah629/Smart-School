@extends('layouts.master')
@section('page_title', __('ui.my_dashboard'))

@section('content')
    <h2>{{ __('ui.welcome', ['name' => Auth::user()->name]) }} {{ Auth::user()->name }}. {{ __('ui.this_is_your_dashboard') }}</h2>
@endsection