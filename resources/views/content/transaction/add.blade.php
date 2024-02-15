@extends('/layout/master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">

            <x-card_header>Transaction</x-card_header>

            <div class="card-body">

                <div class="row">

                    <div class="col">

                        <x-right_position>
                            <!-- Button to trigger modal -->
                            <button id="addPackageBtn" class="btn btn-success font-weight-bold" data-toggle="modal"
                                data-target="#packageModal"><i class="fa fa-plus"></i> Add Package</button>
                        </x-right_position>

                        <hr>

                        <div class="table-responsive">
                            <table id="packageTable" class="table table-borderless">
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
                                    <!-- Table rows will be dynamically added here -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td id="totalBayar">0</td>
                                        <td></td> <!-- This cell is left empty for consistency -->
                                    </tr>
                                    <tr>
                                        <th colspan="4">Diskon</th>
                                        <td id="diskon">0</td>
                                        <td></td> <!-- This cell is left empty for consistency -->
                                    </tr>
                                    <tr>
                                        <th colspan="4">Total Bayar</th>
                                        <td id="totalBayarAkhir">0</td>
                                        <td></td> <!-- This cell is left empty for consistency -->
                                    </tr>
                                </tfoot>
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
                            <select class="form-control" aria-label="Default select example" name="outlet_id">
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

    <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageModalLabel">Add Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="packageSelect" class="font-weight-bold">Select Package:</label>
                        <select class="form-control" id="packageSelect">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label font-weight-bold">Qty</label>
                        <input type="number" class="form-control" id="selectedQty">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="addSelectedPackageBtn" class="btn btn-primary">Add Package</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to assign PHP variable to JavaScript variable -->
    <script>
        const availablePackages = @json($availablePackages);
    </script>

    <!-- Script for handling package selection -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addPackageBtn = document.getElementById('addPackageBtn');
            const packageSelect = document.getElementById('packageSelect');
            const addSelectedPackageBtn = document.getElementById('addSelectedPackageBtn');
            const packageTableBody = document.querySelector('#packageTable tbody');
            const totalBayarElement = document.getElementById('totalBayar');
            const diskonElement = document.getElementById('diskon');
            const totalBayarAkhirElement = document.getElementById('totalBayarAkhir');
            let totalBayar = 0;
            let counter = 0; // Variable to track row number

            // Function to fetch available packages
            function fetchAvailablePackages() {
                // Clear existing options
                packageSelect.innerHTML = '';

                // Populate dropdown with available packages
                availablePackages.forEach(package => {
                    const option = document.createElement('option');
                    option.value = package.id;
                    option.textContent = `${package.name} - Rp.${package.harga}`;
                    packageSelect.appendChild(option);
                });
            }

            // Event listener for when Add Package button is clicked
            addPackageBtn.addEventListener('click', function() {
                fetchAvailablePackages();
            });

            // Event listener for when Add Selected Package button is clicked
            addSelectedPackageBtn.addEventListener('click', function() {
                // Get selected package details
                const selectedPackageId = packageSelect.value;
                const selectedPackage = availablePackages.find(package => package.id === parseInt(
                    selectedPackageId));
                const selectedQty = parseInt(document.getElementById('selectedQty').value);

                // Calculate subtotal
                const subtotal = selectedPackage.harga * selectedQty;

                // Increment counter for row number
                counter++;

                // Add selected package to table
                const newRow = `
                    <tr>
                        <td>${counter}</td> <!-- Use counter for row number -->
                        <td>${selectedPackage.name}</td>
                        <td>${selectedPackage.harga}</td>
                        <td>${selectedQty}</td>
                        <td>Rp.${subtotal}</td>
                        <td><button class="btn btn-danger btn-sm removeBtn">Remove</button></td>
                    </tr>
                `;

                packageTableBody.insertAdjacentHTML('beforeend', newRow);

                // Update total bayar
                totalBayar += subtotal;
                totalBayarElement.textContent = `Rp.${totalBayar}`;

                // Close the modal
                $('#packageModal').modal('hide');
            });

            // Function to remove a package row
            function removePackage() {
                const row = this.parentNode.parentNode;
                const subtotal = parseInt(row.querySelector('td:nth-child(5)').textContent.replace('Rp.', '')
                    .replace('.', '')); // Extract subtotal
                totalBayar -= subtotal; // Subtract subtotal from totalBayar
                totalBayarElement.textContent = `Rp.${totalBayar}`;
                row.remove();

                // Update row numbers after removal
                fillRowNumbers();
            }

            // Function to fill row numbers dynamically
            function fillRowNumbers() {
                const rows = packageTableBody.querySelectorAll('tr');
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').textContent = index + 1;
                });
            }

            // Event delegation to handle remove button clicks
            packageTableBody.addEventListener('click', function(event) {
                if (event.target.classList.contains('removeBtn')) {
                    removePackage.call(event.target);
                }
            });
        });
    </script>
@endsection
