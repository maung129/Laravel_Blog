<x-layout>
    <x-slot name="title">Admin</x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-4 my-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/admin">Dashboard</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/blogs/create">Create Blog</a>
                    </li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>
            </div>
            <div class="col-md-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
