@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Add Package</x-card_header>

            <div class="card-body">

                <form action="{{ route('packages.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label font-weight-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                        <x-error_message field="name" />
                    </div>

                    <div class="mb-4">
                        <label for="" class="form-label font-weight-bold">Category</label>
                        <select class=" form-control" aria-label="Default select example" name="category_id">
                            <option></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-error_message field="category_id" />
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label font-weight-bold">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga">
                        <x-error_message field="name" />
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label font-weight-bold">Durasi</label>
                        <input type="text" class="form-control" name="durasi" id="durasi">
                        <x-error_message field="durasi" />
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label font-weight-bold">Minimal Order</label>
                        <input type="text" class="form-control" name="min_order" id="min_order">
                        <x-error_message field="min_order" />
                    </div>

                    <x-submit_button></x-submit_button>

                </form>

            </div>

        </div>
    </div>
@endsection
