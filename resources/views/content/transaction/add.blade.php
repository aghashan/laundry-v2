@extends('/layout/master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">

            <x-card_header>Transaction</x-card_header>

            <div class="card-body">

                <div class="row">

                    <div class="col">

                        <x-right_position>
                            <button class="btn btn-success font-weight-bold"><i class="fa fa-plus"></i> Add Package</button>
                        </x-right_position>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Satuan</td>
                                        <td>10000</td>
                                        <td>2</td>
                                        <td>Rp.30000</td>
                                        <td><x-delete_button></x-delete_button></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td>total bayar</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Diskon</th>
                                        <td>total bayar</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Total Bayar</th>
                                        <td>total bayar</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label font-weight-bold">Code Transaction</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label font-weight-bold">Tanggal Transaction</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label font-weight-bold">Member</label>
                            <select class=" form-control" aria-label="Default select example" name="outlet_id">
                                <option></option>
                                <option value="1">parti</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label font-weight-bold">Uang Pembeli</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label font-weight-bold">Kembalian</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </div>

                <x-right_position>
                    <x-submit_button></x-submit_button>
                </x-right_position>

            </div>

        </div>

    </div>
@endsection
