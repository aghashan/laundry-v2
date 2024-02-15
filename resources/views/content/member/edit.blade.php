@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Edit Member</x-card_header>

            <div class="card-body">

                <form action="{{ route('members.update', $member->id) }}" method="POST" id="editAlert">

                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $member->name) }}">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat"
                            value="{{ old('alamat', $member->alamat) }}">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">No Telepon</label>
                        <input type="number" class="form-control" name="no_tlp" id="no_tlp"
                            value="{{ old('no_tlp', $member->no_tlp) }}">
                    </div>

                    <x-right_position>
                        <div class="row">
                            <x-cancel_button>{{ route('members.index') }}</x-cancel_button>
                            <x-submit_edit_button>{{ route('members.index') }}</x-submit_edit_button>
                        </div>
                    </x-right_position>

                </form>

            </div>

        </div>
    </div>
@endsection
