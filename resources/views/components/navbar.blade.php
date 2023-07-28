<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
       @can('admin')
       <a href="/admin" class="nav-link text-light">Dashboard</a>
       @endcan
        <a href="/" class="nav-link text-light">Home</a>
        <a href="/#blogs" class="nav-link text-light">Blogs</a>
        <a href="/#subscribe" class="nav-link text-light">Subscribe</a>
        @auth
        <button class="nav-link btn btn-link text-light">
            <img src="{{ auth()->user()->avatar }}" style="border-radius:50%;width:35px;height:35px" alt="">
        </button>
        <form action="/logout" method="POST">
            @csrf
        <button type="submit" class="nav-link btn btn-link text-light">Logout</button></form>
        @else
        <a href="/register" class="nav-link text-light">Register</a>
        <a href="/login" class="nav-link text-light">Login</a>
        @endauth
      </div>
    </div>
  </nav>
