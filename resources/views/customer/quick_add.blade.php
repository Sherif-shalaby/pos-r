<div class="modal-dialog" role="document" style="max-width: 90%">
    <div class="modal-content">

        {!! Form::open(['url' => action('CustomerController@store'), 'method' => 'post', 'id' => $quick_add ?
        'quick_add_customer_form' : 'customer_add_form', 'enctype' => 'multipart/form-data' ]) !!}

        <x-modal-header>

            <h4 class="modal-title">@lang( 'lang.add_customer' )</h4>

        </x-modal-header>


        <div class="modal-body">
            @include('customer.partial.create_customer_form')
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary col-6">@lang( 'lang.save' )</button>
            <button type="button" class="btn btn-default col-6" data-dismiss="modal">@lang( 'lang.close' )</button>
        </div>

        {!! Form::close() !!}

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script>
    $('.selectpicker').selectpicker('render');
</script>