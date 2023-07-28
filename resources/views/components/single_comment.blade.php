@props(['comment']);


<div class="card p-4 shadow">
  <div class="d-flex">
    <div>
        <img src="{{ $comment->author->avatar }}" width="50" height="50" class="rounded-circle" alt="{{ $comment->author->name }}">
       </div>
       <div>
        <h6>{{  $comment->author->name  }}</h6>
        <p class="text-muted ms-3">{{ $comment->created_at->diffForHumans() }}</p>
       </div>
  </div>
   <div class="d-flex justify-content-start">
    <p class="ms-4">
        {{ $comment->body }}
       </p>
   </div>
</div>
