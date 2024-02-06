@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">
        <div>

            <x-add_button>{{ route('members.add') }}</x-add_button>

            <div class="card shadow-sm">

                <x-card_header>List Members</x-card_header>

                <x-card_table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Alamat</th>
                            <th>No_tlp</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($members as $key => $member)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->alamat }}</td>
                                <td>{{ $member->no_tlp }}</td>
                                <td>
                                    <x-edit_button>kasihrouteedit</x-edit_button>
                                    <x-delete_button>{{ route('members.destroy', $member->id) }}</x-delete_button>
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
