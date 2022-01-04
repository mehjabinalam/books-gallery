<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $wishlists = Wishlist::with('book')->where('user_id', auth()->id())->get();
        return view('wishlists.index', compact('wishlists'));
    }

    public function destroy($book_id)
    {
        $wishlist = Wishlist::where(['user_id' => auth()->id(), 'book_id' => $book_id])->first();
        if ($wishlist) {
            $wishlist->delete();
        }
        session()->flash('success', 'This book removed from your wishlist successfully.');
        return back();
    }
}
