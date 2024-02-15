@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Edit Status</x-card_header>

            <div class="card-body">

                <form action="{{ route('statuses.update', $status->id) }}" method="POST" id="editAlert">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $status->name) }}">
                    </div>

                    <x-right_position>
                        <div class="row">
                            <x-cancel_button>{{ route('statuses.index') }}</x-cancel_button>
                            <x-submit_edit_button>{{ route('statuses.index') }}</x-submit_edit_button>
                        </div>
                    </x-right_position>

                </form>

            </div>

        </div>
    </div>
@endsection
