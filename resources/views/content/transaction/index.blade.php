@extends('/layout/master')
@section('content')
    <div class="container-fluid">

        <x-add_button>{{ route('transactions.add') }}</x-add_button>

        <div class="card shadow-sm">

            <x-card_header>Transaction</x-card_header>

            <div class="card-body">

                <div class="table-responsive ">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Outlet</th>
                                <th scope="col">Member</th>
                                <th scope="col">package</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>1</th>
                                <td>parto</td>
                                <td>rrrrr</td>
                                <th>1</th>
                                <td>parto</td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
