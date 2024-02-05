@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">
        <div>

            <x-add_button>{{ route('users.add') }}</x-add_button>

            <div class="card shadow-sm">

                <x-card_header>List Users</x-card_header>

                <x-card_table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Outlet</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->outlet_id }}</td>
                                <td>belum ada role broo</td>
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
