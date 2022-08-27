@extends('layouts.app')
@section('title', __('lang.unit'))

@section('content')
<div class="container-fluid">

    <div class="col-md-12  no-print">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                @can('product_module.unit.create_and_edit')
                <a style="color: white" data-href="{{action('UnitController@create')}}"
                    data-container=".view_modal" class="btn btn-modal btn-info"><i class="dripicons-plus"></i>
                    @lang('lang.add_unit')</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="store_table" class="table dataTable">
                        <thead>
                            <tr>
                                <th>@lang('lang.name')</th>
                                @if(session('system_mode') != 'garments')
                                    <th>@lang('lang.base_unit')</th>
                                    <th>@lang('lang.times_of')</th>
                                @endif
                                <th class="notexport">@lang('lang.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($units as $unit)
                            <tr>
                                <td>{{$unit->name}}</td>
                                @if(session('system_mode') != 'garments')
                                    <td>{{$unit->base_unit != null  ? $unit->base_unit->name : null }}</td>
                                    <td>{{$unit->base_unit_multiplier}}</td>
                                @endif
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
                                            @can('product_module.unit.create_and_edit')
                                            <li>

                                                <a data-href="{{action('UnitController@edit', $unit->id)}}"
                                                    data-container=".view_modal" class="btn btn-modal"><i
                                                        class="dripicons-document-edit"></i> @lang('lang.edit')</a>
                                            </li>
                                            <li class="divider"></li>
                                            @endcan
                                            @can('product_module.unit.delete')
                                            <li>
                                                <a data-href="{{action('UnitController@destroy', $unit->id)}}"
                                                    data-check_password="{{action('UserController@checkPassword', Auth::user()->id)}}"
                                                    class="btn text-red delete_item"><i class="fa fa-trash"></i>
                                                    @lang('lang.delete')</a>
                                            </li>
                                            @endcan
                                        </ul>
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
</div>
@endsection

@section('javascript')

@endsection
