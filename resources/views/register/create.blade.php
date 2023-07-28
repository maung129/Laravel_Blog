<x-layout>
    <x-slot name="title">Register</x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h2 class="text-primary text-center my-2">Register Form</h2>
                <div class="card p-4 my-3 shadow">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">

                          </div>
                          @error('name')
                          <p class="text-danger text-small">{{ $message }}</p>
                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="username" aria-describedby="emailHelp">

                          </div>
                          @error('username')
                          <p class="text-danger text-small">{{ $message }}</p>
                          @enderror
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1"   name="email" aria-describedby="emailHelp">

                        </div>
                        @error('email')
                          <p class="text-danger text-small">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control"
                          name="password" id="exampleInputPassword1">
                        </div>
                        @error('password')
                          <p class="text-danger text-small">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
