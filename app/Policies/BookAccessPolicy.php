<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookAccessPolicy
{
    use HandlesAuthorization;

    public function accessBook(User $user, Book $book)
    {
        return $user->is_admin || $user->id === $book->user_id;
    }
}
