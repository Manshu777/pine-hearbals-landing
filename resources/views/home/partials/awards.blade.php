<!-- resources/views/awards.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-12">Our Awards</h2>
        @if ($awards->isEmpty())
            <p class="text-center text-gray-600">No awards found at the moment.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($awards as $award)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                        @if ($award->image)
                            <img class="h-48 w-full object-cover" src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->name }}">
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $award->name }}</h3>
                            <p class="text-sm text-gray-500 mb-4">Year: {{ $award->year }}</p>
                            <p class="text-gray-600">{{ $award->description ?? 'No description available.' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection