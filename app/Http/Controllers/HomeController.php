<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $popularBooks = Book::authUserWishlists()->activeBooks()->whereHas('reviews')->withCount(['reviews as reviews_count' => function ($q) {
            $q->select(DB::raw('count(book_id)'));
        }])->orderByDesc('reviews_count')->paginate(10);
        $books = Book::authUserWishlists()->activeBooks()->orderBy('created_at', 'desc')->paginate(24);
        return view('welcome', compact('books', 'popularBooks'));
    }

    public function bookList(Request $request)
    {
        $books = Book::authUserWishlists()->activeBooks();

        if ($request->search) {
            $books = $books->where('name','LIKE','%'.$request->search.'%');
        } else if ($request->category) {
            $books = $books->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $books = $books->orderBy('name')->paginate(24)->appends($request->all());
        return view('frontend.books.book-list', compact('books'));
    }

    public function bookDetails($slug)
    {
        $book = Book::activeBooks()->with(['reviews' => function ($q) {
            $q->orderBy('created_at');
        }, 'reviews.reviewedBy'])->where('slug', $slug)->firstOrFail();
        return view('frontend.books.book-details', compact('book'));
    }
}
