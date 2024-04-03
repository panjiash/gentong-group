@extends("layout")

@section("container")
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/register">
                        @csrf
                        <h2 class="mb-3 text-center">Register</h2>
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Name
                            </label>
                            <input type="text" id="name" class="form-control" value="{{ @old('name') }}" name="name" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label @error('email') text-danger @enderror">
                                Email
                            </label>
                            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required>
                            @error("email")
                            <small class="text-danger text-sm-left">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input type="password" id="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <div class="mb-3">
                            <a href="/login">Login</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection