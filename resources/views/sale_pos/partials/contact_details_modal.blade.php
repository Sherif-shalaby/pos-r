<!-- customer_details modal -->
<div id="contact_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog" style="max-width: 95%;">
        <div class="modal-content">
            <x-modal-header>

                <h5 class="modal-title">{{ __('lang.customer_details') }}</h5>

            </x-modal-header>

            <div class="modal-body">
                <div class="row @if (app()->isLocale('ar')) flex-row-reverse @else flex-row @endif">

                    <div class="col-md-4">
                        <b>@lang('lang.name'):</b> <span class="customer_name_span"></span>
                    </div>

                    <div class="col-md-4">
                        <b>@lang('lang.mobile'):</b> <span class="customer_mobile_span"></span>
                    </div>
                    <div class="col-md-4">
                        <b>@lang('lang.due_sale_list'):</b> <span class="customer_due_span"></span>
                    </div>
                    <div class="col-md-4">
                        <b>@lang('lang.points'):</b> <span class="customer_points_span"></span>
                        <input type="hidden" name="customer_points" class="customer_points" value="0">
                    </div>
                    <div class="col-md-4">
                        <b>@lang('lang.points_value'):</b> <span class="customer_points_value_span"></span>
                        <input type="hidden" name="customer_points_value" id="customer_points_value"
                            class="customer_points_value" value="0">
                    </div>

                    <div class="col-md-4">
                        <b>@lang('lang.total_redeemable_value'):</b> <span
                            class="customer_total_redeemable_span"></span>
                        <input type="hidden" name="customer_total_redeemable" id="customer_total_redeemable"
                            class="customer_total_redeemable" value="0">
                        <input type="hidden" name="rp_redeemed" id="rp_redeemed" class="rp_redeemed" value="0">
                        <input type="hidden" name="rp_redeemed_value" id="rp_redeemed_value" class="rp_redeemed_value"
                            value="0">
                    </div>


                    <input type="hidden" name="is_redeem_points" id="is_redeem_points" value="0">
                </div>




                <div class="row">
                    <div class="col-md-4">
                        <label for="customer_address">@lang('lang.address')</label>
                        {!! Form::textarea('customer_address', null, ['class' => 'form-control', 'rows' => 3, 'id'
                        => 'customer_address']) !!}
                    </div>
                    <div class="col-md-8 d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary redeem_btn" id="redeem_btn" disabled>{{
                            __('lang.redeem') }}</button>
                        <button type="button" class="btn btn-primary"
                            id="update_customer_address">@lang('lang.update_address')</button>

                        <button type="button" data-href="" class="btn btn-primary btn-modal text-white"
                            data-container=".view_modal"
                            id="pay_customer_due_btn">@lang('lang.pay_customer_due')</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h4>@lang('lang.sales')</h4>

                        <div class="table-responsive" style="max-height: 90vh;">
                            <table id="customer_sales_table" class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('lang.date_and_time')</th>
                                        <th>@lang('lang.invoice_no')</th>
                                        <th class="sum">@lang('lang.value')</th>
                                        <th>@lang('lang.status')</th>
                                        <th>@lang('lang.delivery_man')</th>
                                        <th>@lang('lang.cashier')</th>
                                        <th>@lang('lang.canceled_by')</th>
                                        <th class="notexport">@lang('lang.action')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <th style="text-align: right"> @lang('lang.total')</th>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default col-12 " data-dismiss="modal">{{ __('lang.close')
                    }}</button>
            </div>
        </div>
    </div>
</div>