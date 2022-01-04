<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $number_of_users = User::count();
        $number_of_books = Book::count();
        $number_of_categories = Category::count();
        $number_of_reviews = Review::count();
        return view('home', compact('number_of_users', 'number_of_books', 'number_of_categories', 'number_of_reviews'));
    }
}
