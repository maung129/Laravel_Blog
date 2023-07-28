@props(['blog','randomBlogs'])

<x-layout>
    <x-slot name="title">Blog Details</x-slot>
    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto text-center">
          <img
            src="{{ asset('storage/'.$blog->photo) }}"
            class="card-img-top"
            alt="..." style="max-width:500px;max-height:500px"
          />
          <h3 class="my-3">{{ $blog->title }}</h3>
          @auth
          <form action="/blogs/{{ $blog->slug }}/subscription" method="POST">
            @csrf
            @if ($blog->isSubscribed())
            <button class="btn btn-outline-danger mb-3" type="submit">Unsubscribe</button>
            @else
            <button class="btn btn-outline-dark mb-3" type="submit">Subscribe</button>
            @endif
          </form>

          @endauth

          <div>
            <div>
                Author - <a href="/?author={{$blog->author->username}}{{ request('search')? '&search='.request('search') : '' }}{{ request('category')? '&category='.request('category') : '' }}">
                    {{ $blog->author->name }}</a>
            </div>
            <div class="badge bg-primary "> <a href="/?category={{$blog->category->slug}}"><span
                class="badge bg-primary">{{$blog->category->name}}</span></a>

          </div>
          <div class="text-secondary">{{ $blog->created_at->diffForHumans() }}</div>
          <p class="lh-md">
            {!! $blog->description !!}
          </p>
        </div>
        <x-comments :blog="$blog" :comments="$blog->comments" />
      </div>
    </div>

    <!-- subscribe new blogs -->
    <x-subscribe/>
    <x-blogs_you_may_like :blog="$blog" :randomBlogs="$randomBlogs" />


</x-layout>


