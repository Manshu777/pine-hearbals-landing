<?php

// app/Http/Controllers/ProductController.php (updated)

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $categories = ProductCategory::all();

            $query = Product::with('category');

            // Search
            if ($search = $request->search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            }

            // Category Filter
            if ($categorySlug = $request->category) {
                $category = ProductCategory::where('slug', $categorySlug)->first();
                if ($category) {
                    $query->where('category_id', $category->id);
                } else {
                    // Handle invalid category
                    return redirect()->route('products')->withErrors(['category' => 'Invalid category selected.']);
                }
            }

            // Price Range
            $validator = Validator::make($request->all(), [
                'min_price' => 'nullable|numeric|min:0',
                'max_price' => 'nullable|numeric|min:0|gte:min_price',
            ]);

            if ($validator->fails()) {
                return redirect()->route('products')->withErrors($validator)->withInput();
            }

            if ($minPrice = $request->min_price) {
                $query->where('price', '>=', $minPrice);
            }
            if ($maxPrice = $request->max_price) {
                $query->where('price', '<=', $maxPrice);
            }

            // Sort
            $sort = $request->sort ?? 'name_asc';
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    // Handle invalid sort
                    return redirect()->route('products')->withErrors(['sort' => 'Invalid sort option.']);
            }

            $products = $query->paginate(12); // Paginate for performance

            return view('products', compact('products', 'categories'));
        } catch (\Exception $e) {
            // Log the error or handle it
            \Log::error('Product index error: ' . $e->getMessage());
            return redirect()->route('products')->withErrors(['general' => 'An unexpected error occurred. Please try again later.']);
        }
    }

    public function show($slug)
    {
        try {
            $product = Product::where('slug', $slug)->with('category')->firstOrFail();
            return view('product_show', compact('product'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Product not found.');
        } catch (\Exception $e) {
            \Log::error('Product show error: ' . $e->getMessage());
            return redirect()->route('products')->withErrors(['general' => 'An unexpected error occurred.']);
        }
    }
}