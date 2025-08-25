<style>
    .swiper-button-prev:after,
    .swiper-rtl .swiper-button-next:after {
        content: '' !important;
    }

    .swiper-button-next:after,
    .swiper-rtl .swiper-button-prev:after {
        content: '' !important;
    }

    .swiper-button-next svg,
    .swiper-button-prev svg {
        width: 24px !important;
        height: 24px !important;
    }

    .swiper-button-next,
    .swiper-button-prev {
        position: relative !important;
        margin-top: 32px;
    }

    .swiper-pagination-bullet {
        background: #4B46E5 !important;
        opacity: 0.5;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
    }
</style>

<section class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-14 text-center">
            <h4 class="text-xl text-gray-400 font-medium">Our Clients</h4>
        </div>
        <div class="swiper clientSwiper">
            <div class="swiper-wrapper">
                @forelse($clients as $client)
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}" class="h-9 object-contain">
                    </div>
                @empty
                    <p class="text-gray-500 text-center">No clients available.</p>
                @endforelse
            </div>
            <div class="swiper-pagination mt-4"></div>
            <div class="flex items-center justify-center gap-10 mt-8">
                <button class="swiper-button-prev group flex justify-center items-center border border-solid border-indigo-600 w-12 h-12 transition-all duration-500 rounded-lg hover:bg-indigo-600">
                    <svg class="h-6 w-6 text-indigo-600 group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.9999 12L4.99992 12M9.99992 6L4.70703 11.2929C4.3737 11.6262 4.20703 11.7929 4.20703 12C4.20703 12.2071 4.3737 12.3738 4.70703 12.7071L9.99992 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button class="swiper-button-next group flex justify-center items-center border border-solid border-indigo-600 w-12 h-12 transition-all duration-500 rounded-lg hover:bg-indigo-600">
                    <svg class="h-6 w-6 text-indigo-600 group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12L19 12M14 18L19.2929 12.7071C19.6262 12.3738 19.7929 12.2071 19.7929 12C19.7929 11.7929 19.6262 11.6262 19.2929 11.2929L14 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".clientSwiper", {
            slidesPerView: 3,
            spaceBetween: 28,
            centeredSlides: false,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 28,
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 32,
                },
            },
        });
    });
</script>