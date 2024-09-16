@extends('layouts.app')
@section('title', __('lang.supplier'))

@section('content')

<section class="forms py-2">
    <div class="container-fluid px-2">
        <div class="col-md-12 px-0 no-print">

            <x-page-title>
                <h4 class="print-title">@lang('lang.suppliers')</h4>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('supplier_category_id', __('lang.category') . '*',[
                                    'class' => app()->isLocale('ar') ? 'mb-1 label-ar' : 'mb-1 label-en'
                                    ]) !!}
                                    {!! Form::select('supplier_category_id', $supplier_categories,
                                    request()->supplier_category_id, ['class' => 'selectpicker form-control',
                                    'data-live-search' => 'true', 'style' => 'width: 80%', 'placeholder' =>
                                    __('lang.please_select'), 'required', 'id' => 'supplier_category_id']) !!}

                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center align-items-end mb-11px">
                                <button type="submit" class="btn btn-primary w-100">@lang('lang.filter')</button>
                            </div>

                            <div class="col-md-2 d-flex justify-content-center align-items-end mb-11px">
                                <a href="{{ action('SupplierController@index') }}"
                                    class="btn btn-danger w-100 clear_filter">@lang('lang.clear_filter')</a>
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
                        <table id="store_table" class="table dataTable">
                            <thead>
                                <tr>
                                    <th>@lang('lang.category')</th>
                                    <th>@lang('lang.name')</th>
                                    <th>@lang('lang.photo')</th>
                                    <th>@lang('lang.mobile_number')</th>
                                    <th>@lang('lang.address')</th>
                                    <th>@lang('lang.joining_date')</th>
                                    <th>@lang('lang.total_purchase')</th>
                                    <th>@lang('lang.pending_orders')</th>
                                    <th class="sum">@lang('lang.overdue_amount')</th>
                                    <th>@lang('lang.created_by')</th>
                                    <th class="notexport">@lang('lang.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total_due = 0;
                                @endphp
                                @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->supplier_category->name ?? '' }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td><img src="@if (!empty($supplier->getFirstMediaUrl('supplier_photo'))) {{ $supplier->getFirstMediaUrl('supplier_photo') }}@else{{ asset('/uploads/' . session('logo')) }} @endif"
                                            alt="photo" width="50" height="50">
                                    </td>
                                    <td>{{ $supplier->mobile_number }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>{{ @format_date($supplier->created_at) }}</td>
                                    <td><a href="{{ action('SupplierController@show', $supplier->id) }}?show=statement_of_account"
                                            class="btn">{{ @num_format($supplier->total_purchase +
                                            $supplier->total_supplier_service) }}</a>
                                    </td>
                                    <td>
                                        @if ($supplier->pending_orders > 0)
                                        <a href="{{ action('SupplierController@show', $supplier->id) }}?show=pending_orders"
                                            class=""> @lang('lang.yes') </a>
                                        @else
                                        @lang('lang.no')
                                        @endif
                                    </td>
                                    <td>{{ @num_format($supplier->total_invoice - $supplier->total_paid +
                                        $supplier->total_supplier_service - $supplier->total_supplier_service_paid) }}
                                    </td>
                                    <td>{{ $supplier->created_by_user->name ?? '' }}</td>
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
                                                @can('supplier_module.supplier.view')
                                                <li>

                                                    <a href="{{ action('SupplierController@show', $supplier->id) }}"
                                                        class="btn"><i class="fa fa-eye"></i>
                                                        @lang('lang.view')</a>
                                                </li>
                                                <li class="divider"></li>
                                                @endcan
                                                @can('supplier_module.supplier.view')
                                                <li>
                                                    <a href="{{ action('SupplierController@show', $supplier->id) }}?show=statement_of_account"
                                                        class="btn"><i class="dripicons-document"></i>
                                                        @lang('lang.statement_of_account')</a>
                                                </li>
                                                <li class="divider"></li>
                                                @endcan
                                                @can('supplier_module.supplier.view')
                                                <li>
                                                    <a href="{{ action('SupplierController@show', $supplier->id) }}?show=service_provided"
                                                        class="btn"><i class="fa fa-anchor"></i>
                                                        @lang('lang.supplier_services')</a>
                                                </li>
                                                <li class="divider"></li>
                                                @endcan
                                                @can('supplier_module.supplier.create_and_edit')
                                                <li>
                                                    <a href="{{ action('SupplierController@edit', $supplier->id) }}"><i
                                                            class="dripicons-document-edit btn"></i>@lang('lang.edit')</a>
                                                </li>
                                                <li class="divider"></li>
                                                @endcan
                                                @if ($supplier->total_invoice - $supplier->total_paid +
                                                $supplier->total_supplier_service -
                                                $supplier->total_supplier_service_paid > 0)
                                                @can('supplier_module.supplier.create_and_edit')
                                                <li>
                                                    <a data-href="{{ action('SupplierController@getPayContactDue', $supplier->id) }}"
                                                        data-container=".view_modal" class="btn-modal"><i
                                                            class="fa fa-money btn"></i>@lang('lang.pay')</a>
                                                </li>
                                                <li class="divider"></li>
                                                @endcan
                                                @endif
                                                @can('supplier_module.supplier.delete')
                                                <li>
                                                    <a data-href="{{ action('SupplierController@destroy', $supplier->id) }}"
                                                        data-check_password="{{ action('UserController@checkPassword', Auth::user()->id) }}"
                                                        class="btn text-red delete_item"><i class="fa fa-trash"></i>
                                                        @lang('lang.delete')</a>
                                                </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                $total_due += $supplier->total_invoice - $supplier->total_paid +
                                $supplier->total_supplier_service - $supplier->total_supplier_service_paid;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th style="text-align: right">@lang('lang.total')</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
@endsection

@section('javascript')
<script></script>
@endsection
