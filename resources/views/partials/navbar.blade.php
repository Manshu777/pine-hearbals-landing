<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2">
                <svg class="h-8 w-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="text-2xl font-bold text-green-700">EcoShop</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="/about" class="text-gray-700 hover:text-green-600 transition font-medium">About</a>
                <div class="relative group">
                    <button class="flex items-center text-gray-700 hover:text-green-600 transition font-medium">
                        Products
                        <svg class="ml-1 h-5 w-5 group-hover:rotate-180 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-md mt-2 w-48">
                        @foreach ($categories as $category)
                            <a href="/products/{{ $category->id }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="/service" class="text-gray-700 hover:text-green-600 transition font-medium">Service</a>
                <a href="/contact" class="text-gray-700 hover:text-green-600 transition font-medium">Contact</a>
                <a href="/blog" class="text-gray-700 hover:text-green-600 transition font-medium">Blog</a>
            </div>

            <!-- Right Side -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="/login" class="px-4 py-2 text-green-600 border border-green-600 rounded-full hover:bg-green-600 hover:text-white transition">Login</a>
                <a href="/cart" class="relative">
                    <svg class="h-6 w-6 text-green-600 hover:text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8H19M7 13l-1.6-8H3" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-green-600 text-white text-xs rounded-full px-1">2</span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-green-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/about" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-green-600">About</a>
            @foreach ($categories as $category)
                <a href="/products/{{ $category->id }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-green-600">{{ $category->name }}</a>
            @endforeach
            <a href="/service" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-green-600">Service</a>
            <a href="/contact" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-green-600">Contact</a>
            <a href="/blog" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-green-50 hover:text-green-600">Blog</a>
        </div>
    </div>
</nav>