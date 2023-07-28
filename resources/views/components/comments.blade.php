@props(['comments','blog'])

{{-- @if ( $comments->count() ) --}}
<section class="container">
    <div class="col-md-8 mx-auto">
        <h5 class="my-3 text-secondary"> Comments {{ $comments->count() }} </h5>

       @auth
       <form action="/blogs/{{$blog->slug}}/comments" method="POST">
        @csrf
            <textarea name="body" class="form-control" cols="20" rows="10"></textarea>
            <button class="btn btn-primary my-3" type="submit">Add Comment</button>
       </form>
       @endauth
        @foreach ($c = $blog->comments()->paginate(4) as $comment)
            <x-single_comment :comment="$comment"/>
        @endforeach
        {{ $c->links() }}
    </div>
</section>
{{-- @endif --}}

