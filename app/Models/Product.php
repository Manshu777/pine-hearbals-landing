<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'price',
        'stock',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }


     protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $baseSlug = Str::slug($product->name);
            $slug = $baseSlug;
            $count = 1;

            // Ensure slug is unique
            while (static::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = "$baseSlug-$count";
                $count++;
            }

            $product->slug = $slug;
        });
    }
}