<script>
var type = false,
message;
@if (count($errors->all()) > 0)
<div class="alert alert-error alert-block">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<h4>Error</h4>
Please check the form below for errors
</div>
@endif
@if ($message = Session::get('success'))
type = "success";
message = "{{ $message }}";
@endif
@if ($message = Session::get('error'))
type = "error";
message = "{{ $message }}";
@endif
@if ($message = Session::get('warning'))
type = "warning";
message = "{{ $message }}";
@endif
@if ($message = Session::get('info'))
type = "info";
message = "{{ $message }}";
@endif
if (type) {
    $.bootstrapGrowl(message, {
        ele: 'body', // which element to append to
        type: type,
        offset: {from: 'top', amount: 50}, // 'top', or 'bottom'
        align: 'center', // ('left', 'right', or 'center')
        width: 'auto', // (integer, or 'auto')
        delay: 5000,
        allow_dismiss: true,
        stackup_spacing: 10 // spacing between consecutively stacked growls.
    });
}
</script>
