@extends('/layout/master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">

            <x-card_header>Transaction</x-card_header>

            <div class="card-body">

                @include('/content/transaction/table')
            </div>
        </div>
    </div>
@endsection
