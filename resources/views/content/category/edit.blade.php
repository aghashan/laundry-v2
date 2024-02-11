@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Edit Category</x-card_header>

            <div class="card-body">

                <form action=" {{ route('categories.update', $category->id) }}" method="POST" id="editAlert">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $category->name) }}">
                    </div>

                    <x-submit_edit_button>{{ route('categories.index') }}</x-submit_edit_button>

                </form>

            </div>

        </div>
    </div>
@endsection
