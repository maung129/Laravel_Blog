@props(['blog','categories'])

<x-admin-layout>
    <h1>Edit Your Blog</h1>
    <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group my-3">
          <label for="exampleFormControlInput1">Blog Title</label>
          <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
          @error('title')
          <p class="text-danger text-small">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-3">
            <label>Blog Slug</label>
            <input type="text" class="form-control" name="slug" value="{{$blog->slug }}">
            @error('slug')
            <p class="text-danger text-small">{{ $message }}</p>
            @enderror
        </div>
          <div class="form-group my-3">
            <label for="exampleFormControlInput1">Blog Intro</label>
            <input type="text" class="form-control" name="intro" value="{{ $blog->intro}}">
            @error('intro')
                <p class="text-danger text-small">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group my-3">
            <label for="exampleFormControlInput1">Blog Intro</label>
           <select class="form-select" name="category_id">
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
           </select>
            @error('category_id')
                <p class="text-danger text-small">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group my-3">
            <label for="exampleFormControlInput1">Blog Intro</label>
            <input type="file" class="form-control" name="photo" value="{{ $blog->photo }}">
            @error('photo')
                <p class="text-danger text-small">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group my-3">
            <label for="exampleFormControlInput1">Blog Body</label>
            <textarea id="editor" cols="30" rows="10" name="description">{!! $blog->description !!}</textarea>
            @error('description')
                <p class="text-danger text-small">{{ $message }}</p>
            @enderror
        </div>
          <div class="form-group my-3">
            <button class="btn btn-outline-dark">Update</button>
          </div>

      </form>
</x-admin-layout>
