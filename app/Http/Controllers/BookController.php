<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\CreateRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $books = Book::orderBy('name')->with('category:id,name', 'createdBy:id,name')
            ->when(!auth()->user()->is_admin, function($q) {
                $q->where('user_id', auth()->user()->id);
            })
            ->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->slug);
        $data['cover_image'] = fileUpload($request->cover_image, Book::COVER_IMAGE_PATH, $data['slug']);
        $data['pdf_file'] = fileUpload($request->book_pdf, Book::PDF_PATH, $data['slug']);
        $data['category_id'] = $request->category;
        auth()->user()->books()->create($data);
        session()->flash('success', 'Book created successfully');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Book $book)
    {
        $this->authorize('accessBook', $book);
        $categories = Category::select(['id', 'name'])->get();
        return view('books.edit', compact('categories', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Book $book
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(UpdateRequest $request, Book $book)
    {
        $this->authorize('accessBook', $book);
        $data = $request->validated();
        $data['slug'] = Str::slug($request->slug);
        $data['category_id'] = $request->category;
        if($request->has('cover_image')) $data['cover_image'] = fileUpload($request->cover_image, Book::COVER_IMAGE_PATH, $data['slug'], $book->cover_image);
        if($request->has('book_pdf')) $data['pdf_file'] = fileUpload($request->book_pdf, Book::PDF_PATH, $data['slug'], $book->pdf_file);
        $book->update($data);
        session()->flash('success', 'Book updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Book $book)
    {
        $this->authorize('accessBook', $book);
        unlinkFile($book->cover_image, Book::COVER_IMAGE_PATH);
        unlinkFile($book->pdf_file, Book::PDF_PATH);
        $book->delete();
        session()->flash('success', 'Book deleted successfully');
        return back();
    }
}
