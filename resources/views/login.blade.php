@extends("layout")

@section("container")
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/login" onsubmit="return disableButton()">
                        @csrf
                        <h2 class="mb-3 text-center">Login</h2>
                        @if(session('error')==="Wrong email or password")
                        <div class="mb-3 d-block text-center text-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="email" class="form-label {{ session('error')==='Wrong email or password' ? 'text-danger':'' }}">
                                Email
                            </label>
                            <input type="email" id="email" class="form-control {{ session('error')==='Wrong email or password' ? 'is-invalid':'' }}" name="email" value="{{ old('email') }}" autofocus required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label {{ session('error')==='Wrong email or password' ? 'text-danger':'' }}">
                                Password
                            </label>
                            <input type="password" id="password" class="form-control {{ session('error')==='Wrong email or password' ? 'is-invalid':'' }}" name="password" required>

                        </div>
                        <div class="mb-3 d-grid">
                            <button type="submit" id="loginButton" class="btn btn-primary">Login</button>
                        </div>
                        <!-- <div class="mb-3 row">
                            <div class="col-lg-6">
                                <a href="/register">Register</a>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function disableButton() {
        document.getElementById('loginButton').disabled = true;
        return true; // Allow form submission
    }
</script>
@endsection