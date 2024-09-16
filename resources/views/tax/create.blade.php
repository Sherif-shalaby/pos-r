<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('TaxController@store'), 'method' => 'post', 'id' => $quick_add ?
        'quick_add_tax_form' : 'tax_add_form']) !!}


        <x-modal-header>
            <h4 class="modal-title">@lang('lang.add_tax')</h4>
        </x-modal-header>

        <div class="modal-body row @if (app()->isLocale('ar')) flex-row-reverse @else flex-row @endif">
            <div class="form-group col-md-6 px-5">
                <div class="d-flex @if (app()->isLocale('ar')) flex-row-reverse @else flex-row @endif">
                    {!! Form::label('name', __('lang.name') , [
                    'class' => app()->isLocale('ar') ? 'mb-1 label-ar' : 'mb-1 label-en'
                    ]) !!}
                    <span class="text-danger">*</span>
                </div>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('lang.name'), 'required'])
                !!}
            </div>
            <input type="hidden" name="quick_add" value="{{ $quick_add }}">
            <input type="hidden" name="type" value="{{ $type }}">
            <div class="form-group col-md-6 px-5">
                <div class="d-flex @if (app()->isLocale('ar')) flex-row-reverse @else flex-row @endif">
                    {!! Form::label('rate', __('lang.rate_percentage') ) !!}
                    <span class="text-danger">*</span>
                </div>
                {!! Form::text('rate', null, ['class' => 'form-control', 'placeholder' => __('lang.rate'), 'required'])
                !!}
            </div>
            @if ($type == 'general_tax')
            <div class="form-group col-md-6 px-5">
                <div class="d-flex @if (app()->isLocale('ar')) flex-row-reverse @else flex-row @endif">
                    {!! Form::label('tax_method', __('lang.tax_method') ) !!}
                    <span class="text-danger">*</span>
                </div>
                {!! Form::select('tax_method', ['inclusive' => __('lang.inclusive'), 'exclusive' =>
                __('lang.exclusive')], false, ['class' => 'selectpicker form-control', 'data-live-search' => 'true',
                'placeholder' => __('lang.please_select')]) !!}
            </div>
            <div class="form-group col-md-6 px-5">
                <div class="d-flex @if (app()->isLocale('ar')) flex-row-reverse @else flex-row @endif">
                    {!! Form::label('store_ids', __('lang.stores') ) !!}
                    <i class="dripicons-question" data-toggle="tooltip" title="@lang('lang.tax_status_info')"></i>
                </div>
                {!! Form::select('store_ids[]', $stores, [], ['class' => 'selectpicker form-control',
                'data-live-search'
                => 'true', 'data-actions-box' => 'true', 'multiple']) !!}
            </div>
            <div class="col-md-3 px-5">
                <div class="i-checks toggle-pill-color">
                    <input id="status" name="status" type="checkbox" checked value="1" class="form-control-custom">
                    <label for="status">

                    </label>
                    <span>
                        <strong>
                            @lang('lang.active')
                        </strong>
                    </span>
                </div>
            </div>
            @endif
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary col-6">@lang('lang.save')</button>
            <button type="button" class="btn btn-default col-6" data-dismiss="modal">@lang('lang.close')</button>
        </div>

        {!! Form::close() !!}

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script>
    $('.selectpicker').selectpicker('refresh');
</script>
