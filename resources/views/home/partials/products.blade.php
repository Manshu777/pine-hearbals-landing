<!-- resources/views/products.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-12">Our Products</h2>
        
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-8" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Filters Form -->
        <form method="GET" action="{{ route('products') }}" class="bg-white p-6 rounded-xl shadow-lg mb-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Search products...">
                </div>
                
                <!-- Category Filter -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Price Range -->
                <div>
                    <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price</label>
                    <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" min="0" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Min Price">
                </div>
                <div>
                    <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price</label>
                    <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" min="0" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Max Price">
                </div>
            </div>
            
            <!-- Sort By -->
            <div class="mt-4">
                <label for="sort" class="block text-sm font-medium text-gray-700">Sort By</label>
                <select name="sort" id="sort" class="mt-1 block w-full md:w-1/4 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
                </select>
            </div>
            
            <div class="mt-6 flex justify-end">
                <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Apply Filters
                </button>
                <a href="{{ route('products') }}" class="ml-4 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Reset
                </a>
            </div>
        </form>
        
        <!-- Products Grid -->
        @if ($products->isEmpty())
            <p class="text-center text-gray-600">No products found matching your criteria.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                        @if ($product->image)
                            <img class="h-48 w-full object-cover" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        @else
                            <div class="h-48 w-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mb-2">{{ $product->category->name ?? 'Uncategorized' }}</p>
                            <p class="text-lg font-semibold text-green-600 mb-4">${{ number_format($product->price, 2) }}</p>
                            <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Stock: {{ $product->stock }}</span>
                                <a href="{{ route('product.show', $product->slug) }}" class="text-green-600 hover:text-green-500 font-medium">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
                {{ $products->appends(request()->query())->links('pagination::tailwind') }}
            </div>
        @endif
    </div>
</div>
@endsection