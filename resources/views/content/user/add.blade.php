@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">

        <div class="card shadow-sm">

            <x-card_header>Add User</x-card_header>

            <div class="card-body">

                <form action="">

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="" id="name">
                    </div>

                    <x-right_position>
                        <button class="btn btn-primary font-weight-bold">
                            Submit
                        </button>
                    </x-right_position>

                </form>

            </div>

        </div>
    </div>
@endsection
