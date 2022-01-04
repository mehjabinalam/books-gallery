<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist as WishlistModel;

class Wishlist extends Component
{
    public $showText = false;
    public $status;
    public $message = '';
    public $bookId;

    public function render()
    {
        if ($this->showText){
            $this->message = $this->status ? 'Wishlisted' : 'Add to Wishlist';
        }
        return view('livewire.frontend.wishlist');
    }

    public function mount($bookId, $status)
    {
        $this->bookId = $bookId;
        $this->status = $status;
    }

    public function updateWishlist()
    {
        if (auth()->check()) {
            $wishlist = WishlistModel::where(['user_id' => auth()->id(), 'book_id' => $this->bookId])->first();
            if ($wishlist) {
                $this->status = false;
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"This book removed from your wishlist successfully."
                ]);
                $wishlist->delete();
            } else {
                $this->status = true;
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"This book added to your wishlist successfully."
                ]);
                WishlistModel::create(['user_id' => auth()->id(), 'book_id' => $this->bookId]);
            }
        } else {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Please login to add this book to your wishlist."
            ]);
        }
    }


}
