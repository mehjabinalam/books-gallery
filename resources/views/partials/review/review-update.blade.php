<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Review Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('review.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="book" value="{{ $review->book_id }}">
                    <textarea class="form-control rounded-0 p-4"
                              rows="7"
                              name="review"
                              id="descriptionTextarea"
                              placeholder="What did you like or dislike?"
                              required data-msg="Please enter your message."
                              data-error-class="u-has-error"
                              data-success-class="u-has-success">{{ $review->review }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
