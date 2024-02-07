@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">
        <div>

            <x-add_button>{{ route('packages.add') }}</x-add_button>

            <div class="card shadow-sm">

                <x-card_header>List Packages</x-card_header>

                <x-card_table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>Mininal Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($packages as $key => $package)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $package->name }} </td>
                                <td>{{ $package->category->name }}</td>
                                <td>{{ $package->harga }}</td>
                                <td>{{ $package->durasi }}</td>
                                <td>{{ $package->min_order }}</td>
                                <td>
                                    <x-edit_button>{{ route('packages.edit', $package->id) }}</x-edit_button>
                                    <x-delete_button>{{ route('packages.destroy', $package->id) }}</x-delete_button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </x-card_table>

            </div>
        </div>
    </div>

    </div>
@endsection
