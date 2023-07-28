{{-- <x-layout>


    @foreach ($blogs as $blog)
    <h2>
        <a href="/blog/{{ $blog->slug }}" class="{{ $loop->even ? 'even' : '' }}">{{ $blog->title }}</a>
    </h2>
    <p>{{ $blog->description }}</p>

    <a href="/users/{{ $blog->user->id }}/blogs">user - {{ $blog->user->name }}</a>
    <hr>
@endforeach


</x-layout> --}}
@props(['blogs','categories'])
<x-layout>
    <x-slot name="title">Home</x-slot>
    <!-- hero section -->
    <x-heroSection/>
    <!-- blogs section -->
    <x-blogs-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory ?? null" />
    <!-- subscribe new blogs -->
   <x-subscribe/>

</x-layout>
