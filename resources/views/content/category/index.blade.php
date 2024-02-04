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
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>

                    </tbody>
                    </table>

                </x-card_table>

            </div>
        </div>
    </div>

    </div>
@endsection
