@extends('layouts.master') 
@section('page_title', __('ui.manage_payments'))
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title font-weight-bold">{{ __('ui.manage_payment_records_for') }} {{ $sr->user->name }} </h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-uc" class="nav-link active" data-toggle="tab">{{ __('ui.incomplete_payments') }}</a></li>
            <li class="nav-item"><a href="#all-cl" class="nav-link" data-toggle="tab">{{ __('ui.completed_payments') }}</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-uc">
                <table class="table datatable-button-html5-columns table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('ui.title') }}</th>
                            <th>{{ __('ui.pay_ref') }}</th>
                            <th>{{ __('ui.amount') }}</th>
                            <th>{{ __('ui.paid') }}</th>
                            <th>{{ __('ui.balance') }}</th>
                            <th>{{ __('ui.pay_now') }}</th>
                            <th>{{ __('ui.receipt_no') }}</th>
                            <th>{{ __('ui.year') }}</th>
                            <th>{{ __('ui.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($uncleared as $uc)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $uc->payment->title }}</td>
                            <td>{{ $uc->payment->ref_no }}</td>
                            <td class="font-weight-bold" id="amt-{{ Qs::hash($uc->id) }}" data-amount="{{ $uc->payment->amount }}">{{ $uc->payment->amount }}</td>
                            <td id="amt_paid-{{ Qs::hash($uc->id) }}" data-amount="{{ $uc->amt_paid ?: 0 }}" class="text-blue font-weight-bold">{{ $uc->amt_paid ?: '0.00' }}</td>
                            <td id="bal-{{ Qs::hash($uc->id) }}" class="text-danger font-weight-bold">{{ $uc->balance ?: $uc->payment->amount }}</td>
                            <td>
                                <form id="{{ Qs::hash($uc->id) }}" method="post" class="ajax-pay" action="{{ route('payments.pay_now', Qs::hash($uc->id)) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input min="1" max="{{ $uc->balance ?: $uc->payment->amount }}" id="val-{{ Qs::hash($uc->id) }}" class="form-control" required placeholder="{{ __('ui.pay_now') }}" title="{{ __('ui.pay_now') }}" name="amt_paid" type="number">
                                        </div>
                                        <div class="col-md-5">
                                            <button data-text="{{ __('ui.pay') }}" class="btn btn-danger" type="submit">{{ __('ui.pay') }} <i class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>{{ $uc->ref_no }}</td>
                            <td>{{ $uc->year }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a id="{{ Qs::hash($uc->id) }}" onclick="confirmReset(this.id)" href="#" class="dropdown-item"><i class="icon-reset"></i> {{ __('ui.reset_payment') }}</a>
                                            <form method="post" id="item-reset-{{ Qs::hash($uc->id) }}" action="{{ route('payments.reset_record', Qs::hash($uc->id)) }}" class="hidden">@csrf @method('delete')</form>
                                            <a target="_blank" href="{{ route('payments.receipts', Qs::hash($uc->id)) }}" class="dropdown-item"><i class="icon-printer"></i> {{ __('ui.print_receipt') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="all-cl">
                <table class="table datatable-button-html5-columns table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('ui.title') }}</th>
                            <th>{{ __('ui.pay_ref') }}</th>
                            <th>{{ __('ui.amount') }}</th>
                            <th>{{ __('ui.receipt_no') }}</th>
                            <th>{{ __('ui.year') }}</th>
                            <th>{{ __('ui.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cleared as $cl)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cl->payment->title }}</td>
                            <td>{{ $cl->payment->ref_no }}</td>
                            <td class="font-weight-bold">{{ $cl->payment->amount }}</td>
                            <td>{{ $cl->ref_no }}</td>
                            <td>{{ $cl->year }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a id="{{ Qs::hash($cl->id) }}" onclick="confirmReset(this.id)" href="#" class="dropdown-item"><i class="icon-reset"></i> {{ __('ui.reset_payment') }}</a>
                                            <form method="post" id="item-reset-{{ Qs::hash($cl->id) }}" action="{{ route('payments.reset_record', Qs::hash($cl->id)) }}" class="hidden">@csrf @method('delete')</form>
                                            <a target="_blank" href="{{ route('payments.receipts', Qs::hash($cl->id)) }}" class="dropdown-item"><i class="icon-printer"></i> {{ __('ui.print_receipt') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection