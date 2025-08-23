<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Product Website - Explore our products, achievements, and more">
    <title>{{ config('app.name', 'Product Website') }} - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="font-sans antialiased bg-gray-100">
    <!-- Navbar -->
    <header class="bg-gray-800 text-white shadow-md">
        <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
            <!-- Logo -->
           
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden focus:outline-none" id="menu-toggle" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            

            <!-- Mobile Menu -->
            
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6 min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-bold mb-2">About Us</h3>
                    <p class="text-sm">We are a leading provider of innovative products, committed to quality and customer satisfaction.</p>
                </div>
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-2">Quick Links</h3>
         
                </div>
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-2">Contact Info</h3>
                    <p class="text-sm">Email: info@productwebsite.com</p>
                    <p class="text-sm">Phone: (123) 456-7890</p>
                    <p class="text-sm">Address: 123 Product Lane, City, Country</p>
                </div>
            </div>
            <div class="mt-4 text-center text-sm">
                <p>&copy; {{ date('Y') }} Product Website. All rights reserved.</p>
            </div>
        </div>
    </footer>

   
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
        });
    </script>
</body>
</html>