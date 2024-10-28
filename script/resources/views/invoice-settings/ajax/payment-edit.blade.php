<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('modules.invoices.paymentDetails')</h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <x-form id="editPaymentDetails">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="title" :fieldLabel="__('modules.invoices.title')"
                    fieldName="title" fieldRequired="true" :fieldPlaceholder="__('placeholders.invoices.title')"
                    fieldValue="{{ $payment->title }}">
                </x-forms.text>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <x-forms.label fieldId="payment_details" class="text-capitalize" :fieldLabel="__('modules.invoices.paymentDetails')">
                </x-forms.label>
                <textarea class="form-control" name="payment_details" id="payment_details" rows="4"
                    placeholder="@lang('placeholders.invoices.BankDetails')">{{ $payment->payment_details }}</textarea>
            </div>
        </div>
    </x-form>
</div>
<div class="modal-footer">
    <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.close')</x-forms.button-cancel>
    <x-forms.button-primary id="save-payment" icon="check">@lang('app.save')</x-forms.button-primary>
</div>

<script>
    $('#save-payment').click(function() {
        var url = "{{ route('invoices-payment-details.update', $payment->id) }}";
        $.easyAjax({
            url: url,
            container: '#editPaymentDetails',
            type: "PUT",
            data: $('#editPaymentDetails').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

</script>
