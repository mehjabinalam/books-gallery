<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = [
            'user_id' => auth()->id(),
            'book_id' => $request->book
        ];
        Review::updateOrCreate($data, $data +
            [
                'review' => $request->review
            ]
        );
        Session::flash('success', 'Review saved successfully');
        return back();
    }

    public function destroy(Review $review)
    {
        $review->delete();
        Session::flash('success', 'Review deleted successfully');
        return back();
    }
}
