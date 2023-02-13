@props(['title' => 'Detail', 'body' => null])

<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mmodal-detail" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                {{ $body }}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function getDataDetail(pUrl, pSuccess) {
        $(document).on('click', '[data-target="#modal-detail"]', function() {
            const data_detail = JSON.parse($(this).attr('data-detail'));
            $.ajax({
                method: "get",
                url: pUrl,
                data: data_detail,
                success: pSuccess,
                error: function(result, textStatus, jqXHR) {
                    if (typeof result.responseJSON !== 'undefined' && typeof result.responseJSON.status !== 'undefined') {
                        swalAlert('error', result.responseJSON.msg);
                    } else {
                        swalAlert('error', 'Error!');
                    }
                }
            });
        });
    }
</script>
@if (!$body)
<script>
    $('#modal-detail').on('show.bs.modal', function() {
        $('#modal-detail .modal-body').html(`
            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        `);
    });
</script>
@endif
@endpush