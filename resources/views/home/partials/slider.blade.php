
@php
    $slides = App\Models\Slide::all();
@endphp

<div class="relative w-full mx-auto overflow-hidden">
    <!-- Slider container -->
    <div id="slider" class="flex transition-transform duration-500 ease-in-out">
        @foreach ($slides as $index => $slide)
            <div class="w-full flex-shrink-0 relative">
                <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->alt }}" class="w-full h-84 sm:h-80 md:h-[550px] object-cover">
                <div class="absolute bottom-4 left-0 right-0 text-center text-white text-lg font-semibold">
                    {{ $slide->caption }}
                </div>
            </div>
        @endforeach
    </div>
    <!-- Navigation Arrows -->
    <button id="prev-slide" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>
    <button id="next-slide" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
    <!-- Dots Navigation -->
    <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
        @foreach ($slides as $index => $slide)
            <button class="slide-dot w-3 h-3 rounded-full {{ $index === 0 ? 'bg-green-600' : 'bg-green-200' }} hover:bg-green-500 focus:outline-none" data-index="{{ $index }}"></button>
        @endforeach
    </div>
</div>

@section('scripts')
    <script>
        const slider = document.getElementById('slider');
        const prevSlide = document.getElementById('prev-slide');
        const nextSlide = document.getElementById('next-slide');
        const dots = document.querySelectorAll('.slide-dot');
        let currentIndex = 0;

        function updateSlider() {
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;
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

        // Auto-slide (optional)
        setInterval(() => {
            currentIndex = (currentIndex < {{ $slides->count() - 1 }}) ? currentIndex + 1 : 0;
            updateSlider();
        }, 5000);
    </script>
@endsection