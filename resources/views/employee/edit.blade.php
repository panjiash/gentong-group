@extends('../layout')

@section('container')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @if($user->isNotEmpty())
                    <form action="{{ route('home.update', $user[0]->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user[0]->name }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user[0]->email }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="user" <?= $user[0]->role === "user" ? 'selected' : '' ?>>User</option>
                                <option value="supervisor" <?= $user[0]->role === "supervisor" ? 'selected' : '' ?>>Supervisor</option>
                                <option value="manager" <?= $user[0]->role === "manager" ? 'selected' : '' ?>>Manager</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <select name="company" id="company" class="form-select">
                                <option value="pt xyz" <?= $user[0]->company === "pt xyz" ? 'selected' : '' ?>>PT XYZ</option>
                                <option value="pt xyz 1" <?= $user[0]->company === "pt xyz 1" ? 'selected' : '' ?>>PT XYZ 1</option>
                                <option value="pt xyz 2" <?= $user[0]->company === "pt xyz 2" ? 'selected' : '' ?>>PT XYZ 2</option>
                            </select>
                        </div>

                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    @else
                    User not found
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection