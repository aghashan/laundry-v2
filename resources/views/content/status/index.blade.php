@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">
        <div>

            <x-add_button>{{ route('statuses.add') }}</x-add_button>

            <div class="card shadow-sm">

                <x-card_header>List Statuses</x-card_header>

                <x-card_table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($statuses as $key => $status)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $status->name }}</td>
                                <td>$320,800</td>
                            </tr>
                        @endforeach

                    </tbody>

                </x-card_table>

            </div>
        </div>
    </div>

    </div>
@endsection
