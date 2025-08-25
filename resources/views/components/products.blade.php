<div class="relative w-full py-10 px-4 sm:px-10 bg-gray-100">
    <!-- Category Filter -->
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Popular Products</h2>
        <div class="flex flex-wrap gap-2">
            <button class="category-filter px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
                    data-category-id="all">All</button>
            @foreach ($categories as $category)
                <button class="category-filter px-4 py-2 bg-green-200 text-gray-800 rounded-lg hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                        data-category-id="{{ $category->id }}">{{ $category->name }}</button>
            @endforeach
            @if ($categories->isEmpty())
                <p class="text-gray-600">No categories available.</p>
            @endif
        </div>
    </div>

    <!-- Product Carousel -->
    <div class="relative w-full max-w-7xl mx-auto overflow-hidden">
        <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
            @if ($products->isNotEmpty())
                @foreach ($products->chunk(4) as $chunk)
                    <div class="w-full flex-none grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach ($chunk as $product)

                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="overflow-hidden rounded-md">
                                    
                                    <img src="{{ Storage::url($product->image ?? 'default-image.jpg') }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-48 object-cover rounded-md transform transition-transform duration-300 hover:scale-110">
                                </div>
                                <h3 class="mt-2 text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                <p class="text-gray-600 text-center w-full">No products available.</p>
            @endif
        </div>

        <!-- Navigation Arrows -->
        @if ($products->isNotEmpty())
            <button id="prev-slide"
                    class="absolute top-1/2 left-2 sm:left-4 transform -translate-y-1/2 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="next-slide"
                    class="absolute top-1/2 right-2 sm:right-4 transform -translate-y-1/2 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        @endif
    </div>
</div>
