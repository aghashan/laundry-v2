@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Edit Package</x-card_header>

            <div class="card-body">

                <form action="{{ route('packages.update', $package->id) }}" method="POST" id="editAlert">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label font-weight-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $package->name) }}">
                    </div>

                    <div class="mb-4">
                        <label for="" class="form-label font-weight-bold">Category</label>
                        <select class=" form-control" aria-label="Default select example" name="category_id">
                            <option value="{{ old('category_id', $package->category_id) }}">
                                {{ old('category_id', $package->category->name) }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label font-weight-bold">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga"
                            value="{{ old('harga', $package->harga) }}">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label font-weight-bold">Durasi</label>
                        <input type="text" class="form-control" name="durasi" id="durasi"
                            value="{{ old('durasi', $package->durasi) }}">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label font-weight-bold">Minimal Order</label>
                        <input type="text" class="form-control" name="min_order" id="min_order"
                            value="{{ old('min_order', $package->min_order) }}">
                    </div>

                    <x-submit_edit_button>{{ route('packages.index') }}</x-submit_edit_button>

                </form>

            </div>

        </div>
    </div>
@endsection
