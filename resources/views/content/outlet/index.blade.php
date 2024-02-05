@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">
        <div>

            <x-add_button>{{ route('outlets.add') }}</x-add_button>

            <div class="card shadow-sm">

                <x-card_header>List Outlets</x-card_header>

                <x-card_table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($outlets as $key => $outlet)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $outlet->name }}</td>
                                <td>{{ $outlet->alamat }}</td>
                                <td>{{$outlet->no_tlp}}</td>
                                <td>61</td>
                            </tr>
                        @endforeach

                    </tbody>

                </x-card_table>

            </div>
        </div>
    </div>

    </div>
@endsection
