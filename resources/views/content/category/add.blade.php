@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Add Category</x-card_header>

            <div class="card-body">

                <form action="{{ route('categories.store') }}" method="POST" id="addAlert">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <x-submit_button></x-submit_button>

                </form>

            </div>

        </div>
    </div>
@endsection
