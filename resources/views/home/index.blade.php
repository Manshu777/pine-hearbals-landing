@extends('layouts.app')
@section('title', 'Home')

@section('content')
    {{-- Slider --}}
    @include('home.partials.slider')

    {{-- About --}}
    @include('home.partials.about')

    {{-- Products --}}
    @include('home.partials.products')

    {{-- Awards --}}
    @include('home.partials.awards')
@endsection
