@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Add Outlet</x-card_header>

            <div class="card-body">

                <form action="{{ route('outlets.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">No Telepon</label>
                        <input type="number" class="form-control" name="no_tlp" id="no_tlp">
                    </div>

                    <x-submit_button></x-submit_button>

                </form>

            </div>

        </div>
    </div>
@endsection
