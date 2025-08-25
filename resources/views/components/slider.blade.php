@php
    $slides = App\Models\Slide::all();
@endphp

<div class="relative w-full max-h-[500px] gap-10 px-10 py-10 flex flex-col lg:flex-row"
     style="background-image: url('{{ asset('images/banner-12.png') }}'); background-size: cover; background-position: center;">

    <!-- Left (Slider) -->
    <div class="relative w-full lg:w-[80%] rounded-xl overflow-hidden">
        <div class="relative w-full h-full">
            <!-- Slider container -->
            <div id="slider" class="relative w-full h-full">
                @foreach ($slides as $index => $slide)
                    <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                         data-slide-index="{{ $index }}">
                        <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->alt }}"
                             class="w-full h-auto max-h-[500px] object-contain rounded-xl mx-auto">
                        <div class="absolute bottom-4 left-0 right-0 text-center text-white text-lg font-semibold bg-black/40 py-2 rounded-b-xl">
                            {{ $slide->caption }}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Arrows -->
            <button id="prev-slide"
                    class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="next-slide"
                    class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Dots -->
            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                @foreach ($slides as $index => $slide)
                    <button class="slide-dot w-3 h-3 rounded-full {{ $index === 0 ? 'bg-green-600' : 'bg-green-200' }} hover:bg-green-500 focus:outline-none"
                            data-index="{{ $index }}"></button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Right (Static Image, Hidden on Mobile) -->
    <div class="hidden lg:block relative w-[20%] rounded-xl overflow-hidden">
        <img src="{{ Storage::url($slides->first()->left_image ?? 'default-image.jpg') }}"
             alt="Static Right Image"
             class="w-full  h-[200px] object-contain rounded-xl mx-auto">
    </div>
</div>

@section('scripts')
    <script>
        const slider = document.getElementById('slider');
        const slides = slider.querySelectorAll('[data-slide-index]');
        const prevSlide = document.getElementById('prev-slide');
        const nextSlide = document.getElementById('next-slide');
        const dots = document.querySelectorAll('.slide-dot');
        let currentIndex = 0;

        function updateSlider() {
            slides.forEach((slide, index) => {
                slide.classList.toggle('opacity-100', index === currentIndex);
                slide.classList.toggle('opacity-0', index !== currentIndex);
            });
            dots.forEach((dot, index) => {
                dot.classList.toggle('bg-green-600', index === currentIndex);
                dot.classList.toggle('bg-green-200', index !== currentIndex);
            });
        }

        prevSlide.addEventListener('click', () => {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : {{ $slides->count() - 1 }};
            updateSlider();
        });

        nextSlide.addEventListener('click', () => {
            currentIndex = (currentIndex < {{ $slides->count() - 1 }}) ? currentIndex + 1 : 0;
            updateSlider();
        });

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                currentIndex = parseInt(dot.dataset.index);
                updateSlider();
            });
        });

        // Auto-slide with fade effect
        setInterval(() => {
            currentIndex = (currentIndex < {{ $slides->count() - 1 }}) ? currentIndex + 1 : 0;
            updateSlider();
        }, 5000);
    </script>
@endsection
