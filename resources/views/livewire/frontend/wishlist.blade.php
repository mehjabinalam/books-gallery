<span wire:click="updateWishlist()" class="h-primary cursor-pointer p-2" xmlns:wire="http://www.w3.org/1999/xhtml">
    <i class="fas fa-heart @if($status) text-primary @endif @if($message != '') mr-2 @endif"></i> {{ $message }}
</span>
