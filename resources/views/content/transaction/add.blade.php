<div class="container-fluid">
    <div class="card shadow-sm">

        <x-card_header>Transaction</x-card_header>

        <div class="card-body">

            <div class="row">

                <div class="col-md-8 col-12">

                    @include('/content/transaction/table')

                </div>

                <div class="col-md-4 col-12">

                    <div class="mb-4">
                        <label for="" class="form-label fw-bold">Member</label>
                        <input class="form-control" type="text"id="text">
                    </div>

                    <div class="mb-4">
                        <label for="" class="form-label fw-bold">Package</label>
                        <input class="form-control" type="text"id="text">
                    </div>

                    {{-- <div class="mb-4">
                        <label for="" class="form-label fw-bold">Harga</label>
                        <input class="form-control" type="text"id="text">
                    </div>
    
                    <div class="mb-4">
                        <label for="" class="form-label fw-bold">Qty</label>
                        <input class="form-control" type="text"id="text">
                    </div>
    
                    <div class="mb-4">
                        <label for="" class="form-label fw-bold">Diskon</label>
                        <input class="form-control" type="text"id="text">
                    </div>
    
                    <div class="mb-4">
                        <label for="" class="form-label fw-bold">total_harga</label>
                        <input class="form-control" type="text"id="text">
                    </div>
    
                    <div class="mb-4">
                        <label for="" class="form-label fw-bold">bayar</label>
                        <input class="form-control" type="text"id="text">
                    </div>
    
                    <div class="mb-4">
                        <label for="" class="form-label fw-bold">kembalian</label>
                        <input class="form-control" type="text"id="text">
                    </div> --}}

                    <x-right_position><button class="btn btn-primary fw-bold">Submit</button></x-right_position>

                </div>

            </div>

        </div>

    </div>

</div>
