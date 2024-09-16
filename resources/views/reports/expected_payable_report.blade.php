@extends('layouts.app')
@section('title', __('lang.expected_payable_report'))

@section('content')
<section class="forms py-2">

    <div class="container-fluid px-2">
        <div class="col-md-12 px-0 no-print">

            <x-page-title>
                <h4 class="print-title">@lang('lang.expected_payable_report')</h4>
            </x-page-title>



            <x-collapse collapse-id="Filter" button-class="d-flex btn-secondary" group-class="mb-1" body-class="py-1">

                <x-slot name="button">
                    {{-- @lang('lang.filter') --}}
                    <div style="width: 20px">
                        <img class="w-100" src="{{ asset('front/white-filter.png') }}" alt="">
                    </div>
                </x-slot>
                <div class="col-md-12">
                    <form action="">
                        <div class="row @if (app()->isLocale('ar')) flex-row-reverse @else flex-row @endif">
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('start_date', __('lang.start_date'), ['class' =>
                                    app()->isLocale('ar') ? 'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::text('start_date', request()->start_date, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('start_time', __('lang.start_time'), ['class' =>
                                    app()->isLocale('ar') ? 'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::text('start_time', request()->start_time, ['class' => 'form-control
                                    time_picker sale_filter']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('end_date', __('lang.end_date'), ['class' => app()->isLocale('ar') ?
                                    'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::text('end_date', request()->end_date, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('end_time', __('lang.end_time'), ['class' => app()->isLocale('ar') ?
                                    'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::text('end_time', request()->end_time, ['class' => 'form-control
                                    time_picker
                                    sale_filter']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('supplier_id', __('lang.supplier'), ['class' =>
                                    app()->isLocale('ar') ? 'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::select('supplier_id', $suppliers, request()->supplier_id, ['class'
                                    =>
                                    'form-control', 'placeholder' => __('lang.all'),'data-live-search'=>"true"]) !!}
                                </div>
                            </div>
                            @if(session('user.is_superadmin'))
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('store_id', __('lang.store'), ['class' => app()->isLocale('ar') ?
                                    'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::select('store_id', $stores, request()->store_id, ['class' =>
                                    'form-control', 'placeholder' => __('lang.all'),'data-live-search'=>"true"]) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('pos_id', __('lang.pos'), ['class' => app()->isLocale('ar') ? 'mb-1
                                    label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::select('pos_id', $store_pos, request()->pos_id, ['class' =>
                                    'form-control', 'placeholder' => __('lang.all'),'data-live-search'=>"true"]) !!}
                                </div>
                            </div>
                            @endif
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('product_id', __('lang.product'), ['class' => app()->isLocale('ar')
                                    ? 'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::select('product_id', $products, request()->product_id, ['class' =>
                                    'form-control', 'placeholder' => __('lang.all'),'data-live-search'=>"true"]) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('employee_id', __('lang.employee'), ['class' =>
                                    app()->isLocale('ar') ? 'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::select('employee_id', $employees, request()->employee_id, ['class' =>
                                    'form-control', 'placeholder' => __('lang.all'),'data-live-search'=>"true"]) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label
                                        class=" @if (app()->isLocale('ar')) mb-1 label-ar @else mb-1 label-en @endif">@lang('lang.wages_type')</label>
                                    {!! Form::select('payment_type', $wages_payment_types, null, ['class' =>
                                    'form-control', 'placeholder'
                                    => __('lang.all')]) !!}
                                </div>
                            </div>

                            <div class="col-md-2 d-flex justify-content-center align-items-end mb-11px">
                                <button type="submit" class="btn btn-primary w-100">@lang('lang.filter')</button>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center align-items-end mb-11px">
                                <a href="{{action('ReportController@getExpectedPayableReport')}}"
                                    class="btn btn-danger w-100">@lang('lang.clear_filter')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </x-collapse>

            <div
                class="top-controls py-1 d-flex justify-content-center justify-content-lg-start align-items-center flex-wrap">

            </div>
            <div class="card mt-1 mb-0">
                <div class="card-body py-2 px-4">
                    <div class="table-responsive">
                        <table class="table dataTable">
                            <thead>
                                <tr>
                                    <th>@lang('lang.date_and_time')</th>
                                    <th>@lang('lang.name_of_expense')</th>
                                    <th>@lang('lang.expense_type')</th>
                                    <th>@lang('lang.beneficiary')</th>
                                    <th>@lang('lang.store')</th>
                                    <th class="sum">@lang('lang.amount')</th>
                                    <th>@lang('lang.due_date')</th>
                                    <th class="notexport">@lang('lang.action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($add_stocks as $add_stock)
                                <tr>
                                    <td> {{@format_datetime($add_stock->created_at)}}</td>
                                    <td> @lang('lang.supplier_invoice')</td>
                                    <td></td>
                                    <td>
                                        {{$add_stock->supplier->name}}
                                    </td>
                                    <td>{{$add_stock->store->name ?? ''}}</td>
                                    <td>
                                        {{@num_format($add_stock->final_total)}}
                                    </td>
                                    <td>@if(!empty($sale->due_date)){{@format_date($sale->due_date)}}@endif</td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">@lang('lang.action')
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default"
                                                user="menu">
                                                @can('add_stock.add_stock.view')
                                                <li>
                                                    <a href="{{action('AddStockController@show', $add_stock->id)}}"
                                                        class=""><i class="fa fa-eye btn"></i>
                                                        @lang('lang.view')</a>
                                                </li>
                                                <li class="divider"></li>
                                                @endcan
                                                @can('add_stock.add_stock.delete')
                                                <li>
                                                    <a data-href="{{action('AddStockController@destroy', $add_stock->id)}}"
                                                        data-check_password="{{action('UserController@checkPassword', Auth::user()->id)}}"
                                                        class="btn text-red delete_item"><i class="dripicons-trash"></i>
                                                        @lang('lang.delete')</a>
                                                </li>
                                                @endcan
                                                @can('add_stock.pay.create_and_edit')
                                                @if($add_stock->payment_status != 'paid')
                                                <li>
                                                    <a data-href="{{action('TransactionPaymentController@addPayment', ['id' => $add_stock->id])}}"
                                                        data-container=".view_modal" class="btn btn-modal"><i
                                                            class="fa fa-money"></i>
                                                        @lang('lang.pay')</a>
                                                </li>
                                                @endif
                                                @endcan
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach

                                @foreach ($expenses as $expense)
                                <tr>
                                    <td> {{@format_datetime($expense->created_at)}}</td>
                                    <td> @lang('lang.expense')</td>
                                    <td>@if(!empty($expense->expense_category)){{$expense->expense_category->name}}@endif
                                    </td>
                                    <td>
                                        @if(!empty($expense->expense_beneficiary)){{$expense->expense_beneficiary->name}}@endif
                                    </td>
                                    <td> @if(!empty($expense->store)){{$expense->store->name}}@endif</td>
                                    <td>
                                        {{@num_format($expense->final_total)}}
                                    </td>
                                    <td>@if(!empty($sale->due_date)){{@format_date($sale->due_date)}}@endif</td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">@lang('lang.action')
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default"
                                                user="menu">

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach ($wages as $wage)
                                <tr>
                                    <td> {{@format_datetime($wage->created_at)}}</td>
                                    <td> @lang('lang.expense')</td>
                                    <td>{{$wages_payment_types[$wage->payment_type]}}</td>
                                    <td>
                                        @if(!empty($wage->employee)){{$wage->employee->employee_name}}@endif
                                    </td>
                                    <td> @if(!empty($wage->store)){{$wage->store->name}}@endif</td>
                                    <td>
                                        {{@num_format($wage->net_amount)}}
                                    </td>
                                    <td>@if(!empty($sale->due_date)){{@format_date($sale->due_date)}}@endif</td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">@lang('lang.action')
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default"
                                                user="menu">
                                                <li>
                                                    <a href="{{action('WagesAndCompensationController@changeStatusToPaid', $wage->id)}}"
                                                        class="btn">@lang('lang.paid')</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="text-align: right">@lang('lang.total')</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div
                class="bottom-controls mt-1 p-1 d-flex justify-content-center justify-content-lg-start align-items-center flex-wrap">
                <!-- Pagination and other controls can go here -->
            </div>
        </div>
    </div>
</section>
@endsection @section('javascript') @endsection
