<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    const COVER_IMAGE_PATH = 'books/cover_image';
    const PDF_PATH = 'books/pdf';
    const STATUS = ['Unpublished', 'Published'];

    protected $fillable = ['user_id', 'category_id', 'name', 'slug', 'description', 'cover_image', 'pdf_file', 'status'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPdfUrlAttribute()
    {
        return asset('uploads/' . self::PDF_PATH . '/' . $this->pdf_file);
    }

    public function getCoverImageUrlAttribute()
    {
        return asset('uploads/' . self::COVER_IMAGE_PATH . '/' . $this->cover_image);
    }

    public function getBookStatusAttribute()
    {
        return self::STATUS[$this->status];
    }

    public function getShortNameAttribute()
    {
        return Str::limit($this->name, 30, '...');
    }

    public function scopeActiveBooks($query)
    {
        $query->where('status', 1);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAuthUserReviewAttribute()
    {
        if (auth()->check()) {
            return $this->reviews->where('user_id', auth()->id())->first();
        }

        return null;
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function scopeAuthUserWishlists($query)
    {
        return $this->withCount(['wishlists as wishlisted' => function ($q) {
            $q->where('user_id', auth()->id());
        }]);
    }
}
