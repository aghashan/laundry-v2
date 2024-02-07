@extends('/layout/master')
@section('content')
    <div class="container-fluid py-3">
        <div>

            <x-add_button>{{ route('categories.add') }}</x-add_button>

            <div class="card shadow-sm">

                <x-card_header>List Categories</x-card_header>

                <x-card_table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <x-edit_button>{{ route('categories.edit', $category->id) }}</x-edit_button>
                                    <x-delete_button>{{ route('categories.destroy', $category->id) }}</x-delete_button>
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
