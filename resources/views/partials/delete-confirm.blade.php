<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="deleteForm" method="post">
                @csrf @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="deleteMessage">Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-info close-btn" data-dismiss="modal">
                        <i class="fa fa-times"></i> No
                    </button>
                    <button type="submit" class="btn btn-sm btn-outline-danger close-modal">
                        <i class="fa fa-check"></i> Yes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('script')
    <script>
        const deleteConfirm = $('.delete-confirm');
        const confirmModal = $('#confirmModal');
        const deleteForm = $('#deleteForm');
        const deleteMessage = $('#deleteMessage');

        deleteConfirm.on('click', function() {
            const $this = $(this);
            const action = $this.data('action');
            const message = $this.data('message');

            if(action) {
                deleteForm.attr('action', action);
                if(message) deleteMessage.text(message);
            } else {
                alert('Please set data action.');
                return;
            }
            confirmModal.modal('show');
        })
    </script>
@endpush
