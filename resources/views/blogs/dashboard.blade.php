<x-admin-layout>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Blog Title</th>
            <th scope="col">Blog Intro</th>
            <th scope="col">Blog Publish Date</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($blogs as $blog)
          <tr>
            <th scope="row">{{$blog->id}}</th>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->intro }}</td>
            <td>{{ $blog->created_at->format('D-M-Y') }}</td>
            <td>
                <form action="/admin/blogs/{{ $blog->id }}/edit" >
                    @csrf
                    <button type="submit" class="btn btn-secondary">Edit</button>
                </form>
            </td>
            <td>
                <form action="/admin/blogs/{{ $blog->id }}/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</x-admin-layout>
