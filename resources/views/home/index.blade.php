@extends('../layout')

@section('container')

<div class="container">
    @if(auth()->user()->role === "admin")
    <div class="row mt-4">
        <div class="col-12 text-end">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="{{ route('home.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" placeholder="Full Name" required class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label @error('email') text-danger @enderror">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" required class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="********" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="" hidden selected disabled>- Choose -</option>
                                <option value="user">User</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="manager">Manager</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success mt-2" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger mt-2" role="alert">
        {{ session('error') }}
    </div>
    @endif

    @error('email')
    <div class="alert alert-danger mt-2" role="alert">
        {{ $message }}
    </div>
    @enderror
    @endif
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="content table-responsive">
                <table class="table table-sm table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Role</th>
                            @if(auth()->user()->role==="admin")
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->company }}</td>
                            <td>{{ $user->role }}</td>
                            @if(auth()->user()->role==="admin")
                            <td>
                                <form onsubmit="return confirm(`{{ $user->name }} will be deleted ?`);" action="{{ route('home.delete', $user->id) }}" method="POST">
                                    <a href="{{ route('home.edit', ['id'=>$user->id]) }}" class="btn btn-success btn-sm">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection