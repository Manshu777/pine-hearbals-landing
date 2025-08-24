@extends('layouts.app')

@section('about')
<div class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden md:grid md:grid-cols-2 md:gap-4">
            @if ($about && $about->image)
                <div class="md:shrink-0">
                    <img class="h-48 w-full object-cover md:h-full md:w-full" src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}">
                </div>
            @endif
            <div class="p-8">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">{{ $about->title ?? 'About Pine Herbals' }}</h2>
                <p class="text-gray-600 leading-relaxed">{!! nl2br(e($about->content ?? 'Default content about Pine Herbals.')) !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection