@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Edit User</x-card_header>

            <div class="card-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="mb-4">
                        <label for="" class="form-label font-weight-bold">Outlet</label>
                        <select class=" form-control" aria-label="Default select example" name="outlet_id">
                            <option value="{{ old('outlet_id', $user->outlet_id) }}">
                                {{ old('outlet_id', $user->outlet->name) }}</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            value="{{ old('password', $user->password) }}">
                    </div>

                    <x-submit_button></x-submit_button>

                </form>

            </div>

        </div>
    </div>
@endsection
