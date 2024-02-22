@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Add User</x-card_header>

            <div class="card-body">

                <form action="{{ route('users.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                        <x-error_message field="name" />
                    </div>

                    <div class="mb-4">
                        <label for="" class="form-label font-weight-bold">Outlet</label>
                        <select class=" form-control" aria-label="Default select example" name="outlet_id">
                            <option></option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                        <x-error_message field="outled_id" />
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>

                    <x-submit_button></x-submit_button>

                </form>

            </div>

        </div>
    </div>
@endsection
