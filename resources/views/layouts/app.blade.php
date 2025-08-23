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

    @include('partials.navbar')

    <!-- Main Content -->


    <main class='h-screen'>


        @yield('content')
</main>




    @include('partials.footer')
  <!-- JavaScript for dropdown and mobile menu toggle -->

 

<script>


    const slider = document.getElementById('slider');
    const slides = slider.children;
    const dots = document.querySelectorAll('.slide-dot');
    let currentIndex = 0;
    let autoSlideInterval;

    // Function to update slide
    function updateSlide(index) {
        slider.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-green-600', i === index);
            dot.classList.toggle('bg-green-200', i !== index);
        });
        currentIndex = index;
    }

    // Next slide
    document.getElementById('next-slide').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlide(currentIndex);
        resetAutoSlide();
    });

    // Previous slide
    document.getElementById('prev-slide').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateSlide(currentIndex);
        resetAutoSlide();
    });
  document.getElementById('mobile-menu-button').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
    // Dot navigation
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            const index = parseInt(dot.dataset.index);
            updateSlide(index);
            resetAutoSlide();
        });
    });

    // Auto-slide every 5 seconds
    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlide(currentIndex);
        }, 5000);
    }

    // Reset auto-slide timer
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Start auto-slide on load
    startAutoSlide();



     const sidebar = document.querySelector('aside');
    const toggleButton = document.getElementById('sidebar-toggle');
    const overlay = document.getElementById('sidebar-overlay');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('translate-x-0');
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
        overlay.classList.add('hidden');
    });
    // Desktop Products Dropdown
    document.getElementById('products-menu').addEventListener('click', function() {
        const dropdown = document.getElementById('products-dropdown');
        dropdown.classList.toggle('hidden');
    });

    // Mobile Menu Toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Mobile Products Dropdown
    document.getElementById('mobile-products-menu').addEventListener('click', function() {
        const mobileDropdown = document.getElementById('mobile-products-dropdown');
        mobileDropdown.classList.toggle('hidden');
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const productsMenu = document.getElementById('products-menu');
        const productsDropdown = document.getElementById('products-dropdown');
        const mobileProductsMenu = document.getElementById('mobile-products-menu');
        const mobileProductsDropdown = document.getElementById('mobile-products-dropdown');

        if (!productsMenu.contains(event.target) && !productsDropdown.contains(event.target)) {
            productsDropdown.classList.add('hidden');
        }
        if (!mobileProductsMenu.contains(event.target) && !mobileProductsDropdown.contains(event.target)) {
            mobileProductsDropdown.classList.add('hidden');
        }
    });
</script>
</body>
</html>