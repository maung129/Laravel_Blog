@props(['blog']);


<form action="/blogs/{{ $blog->slug }}/comments" method="POST">
    <textarea name="body" required class="form-control border border-0" placeholder="comment what you think..." ></textarea>
   <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-outline-primary">Comment</button>
   </div>
</form>
