<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Product Website - Explore our products, achievements, and more">
    <title>{{ config('app.name', 'Product Website') }} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    @include('partials.navbar')
    <main class="min-h-screen">
        @yield('content')
    </main>
    @include('partials.footer')

    <script>
        // Carousel functionality
        const carousel = document.getElementById('carousel');
        const slides = carousel?.children || [];
        const dots = document.querySelectorAll('.slide-dot');
        let currentIndex = 0;
        let autoSlideInterval;

        function updateSlide(index) {
            if (slides.length === 0) return;
            carousel.style.transform = `translateX(-${index * 100}%)`;
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-green-600', i === index);
                dot.classList.toggle('bg-green-200', i !== index);
            });
            currentIndex = index;
        }

        document.getElementById('next-slide')?.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlide(currentIndex);
            resetAutoSlide();
        });

        document.getElementById('prev-slide')?.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlide(currentIndex);
            resetAutoSlide();
        });

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.dataset.index);
                updateSlide(index);
                resetAutoSlide();
            });
        });

        function startAutoSlide() {
            if (slides.length === 0) return;
            autoSlideInterval = setInterval(() => {
                currentIndex = (currentIndex + 1) % slides.length;
                updateSlide(currentIndex);
            }, 5000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        startAutoSlide();

        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (event) => {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });


document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('carousel');
    const prevSlide = document.getElementById('prev-slide');
    const nextSlide = document.getElementById('next-slide');
    const slides = carousel ? carousel.children : [];
    let currentIndex = 0;
    const totalSlides = slides.length;

    function showSlide(index) {
        if (index >= totalSlides) currentIndex = 0;
        else if (index < 0) currentIndex = totalSlides - 1;
        else currentIndex = index;
        carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    if (nextSlide) nextSlide.addEventListener('click', () => showSlide(currentIndex + 1));
    if (prevSlide) prevSlide.addEventListener('click', () => showSlide(currentIndex - 1));

    // Auto-slide
    let autoSlide = setInterval(() => showSlide(currentIndex + 1), 5000);
    carousel.addEventListener('mouseenter', () => clearInterval(autoSlide));
    carousel.addEventListener('mouseleave', () => autoSlide = setInterval(() => showSlide(currentIndex + 1), 5000));

    // ✅ Filter Logic
    const buttons = document.querySelectorAll('.category-filter');
    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            const catId = btn.dataset.categoryId;
            document.querySelectorAll('#carousel .grid > div').forEach(productCard => {
                const productCat = productCard.dataset.categoryId;
                if (catId === "all" || productCat === catId) {
                    productCard.style.display = "block";
                } else {
                    productCard.style.display = "none";
                }
            });
        });
    });
});



    </script>
</body>
</html>