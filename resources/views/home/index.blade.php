
@extends('layouts.app')
@section('title', 'Home')
@section('content')

 
<div class="relative w-full mx-auto overflow-hidden">
    <!-- Slider container -->
    <div id="slider" class="flex transition-transform duration-500 ease-in-out">
        @php
            $slides = [
                ['image' => 'https://plus.unsplash.com/premium_photo-1676496046182-356a6a0ed002?q=80&w=2076&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'alt' => 'Nature Landscape', 'caption' => 'Explore the Beauty of Nature'],
                ['image' => 'https://images.unsplash.com/photo-1434725039720-aaad6dd32dfe?q=80&w=2242&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'alt' => 'Technology Innovation', 'caption' => 'Innovate with Cutting-Edge Technology'],
                ['image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'alt' => 'Business Growth', 'caption' => 'Grow Your Business with Us'],
                ['image' => 'https://images.unsplash.com/photo-1433838552652-f9a46b332c40?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'alt' => 'Travel Adventure', 'caption' => 'Embark on New Adventures'],
            ];
        @endphp
        @foreach ($slides as $index => $slide)
            <div class="w-full flex-shrink-0 relative">
                <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] }}" class="w-full h-84 sm:h-80 md:h-[550px] object-cover">
                
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


@endsection