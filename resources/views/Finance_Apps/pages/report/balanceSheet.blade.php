@extends('Finance_Apps.layouts.app')

@section('title')
    Manajemen Keuangan
@endsection

{{-- @push('addon-style')
    <!-- Custom styles for this page -->
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush --}}

@section('content-finance')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Balance Sheet</h1>
        </div>

        <!-- CA & NCA -->
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card shadow mb-4">
                    <div class="card-body mt-2 mb-2">
                        <form method="POST" id="financeForm" action="{{ route('finance.addCAandNCA') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="inputMonth">Bulan</label>
                                    <select class="form-control" id="monthCA" name="month">
                                        <option value="0">Pilih Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>

                            <h6 class="mb-3 mt-4 text-gray-800"><b>Aset Lancar</b></h6>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="inputCashCA">Kas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control rupiah" name="cashCA" id="inputCashCA" value="{{ old('cashCA') }}" min="0" required>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="inputAccountsReceivableCA">Piutang usaha</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control rupiah" name="accountsReceivableCA" id="inputAccountsReceivableCA" value="{{ old('accountsReceivableCA') }}" min="0" required>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="inputSuppliesCA">Persediaan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control rupiah" name="suppliesCA" id="inputSuppliesCA" value="{{ old('suppliesCA') }}" min="0" required>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="inputOtherCA">Aset lancar lainnya</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control rupiah" name="otherCA" id="inputOtherCA" value="{{ old('otherCA') }}" min="0" required>
                                    </div>
                                </div>
                            </div>

                            <h6 class="mb-3 mt-4 text-gray-800"><b>Aset Tidak Lancar</b></h6>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="inputFixedAssetsNCA">Asset tetap</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control rupiah" name="fixedAssetsNCA" id="inputFixedAssetsNCA" value="{{ old('fixedAssetsNCA') }}" min="0" required>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="inputDepreciationNCA">Akumulasi penyusutan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control rupiah" name="depreciationNCA" id="inputDepreciationNCA" value="{{ old('depreciationNCA') }}" min="0" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block mt-3 mb-2">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h6 class="mb-3 text-gray-800"><b>Aset Bulan <span class="prevMonthCA"></span> <span id="year"></span></b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <th><b>Aset Lancar</b></th>
                                    <th><b><span class="prevMonthCA"></b></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-indent: 40px;">Kas dan setara kas</td>
                                        <td id="cashCA">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td style="text-indent: 40px;">Piutang usaha</td>
                                        <td id="accountsReceivableCA">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td style="text-indent: 40px;">Persediaan</td>
                                        <td id="suppliesCA">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td style="text-indent: 40px;">Aset lancar lainnya</td>
                                        <td id="otherCA">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah aset lancar</b></td>
                                        <td id="totalCA"><b>Rp 0</b></td>
                                    </tr>
                                </tbody>
                                <thead class="table-primary">
                                    <th><b>Aset Tidak Lancar</b></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-indent: 40px;">Aset tetap</td>
                                        <td id="fixedAssetsNCA">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td style="text-indent: 40px;">Akumulasi penyusutan</td>
                                        <td id="depreciationNCA">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah aset tidak lancar</b></td>
                                        <td id="totalNCA"><b>Rp 0</b></td>
                                    </tr>
                                </tbody>
                                <thead class="table-primary">
                                    <th><b>Jumlah aset</b></th>
                                    <th id="totalAsset"><b>Rp 0</b></th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Balance Sheet Preview -->
        <div class="card shadow mb-4">
            <div class="card-body">
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script> --}}
    <script>
        function inputFormatRupiah(num) {
            var number_string = num.replace(/[^,\d]/g, '').toString(),
                split         = number_string.split(','),
                sisa          = split[0].length % 3,
                rupiah        = split[0].substr(0, sisa),
                ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }

        function formatRupiah(angka) {
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });

            return formatter.format(angka);
        }

        $(document).ready(function() {
            var date = new Date();
            var year = date.getFullYear();

            // Get CA & NCA
            $('#monthCA').on('change', (event) => {
                $('#year').text(year);
                if (event.target.value == 1) {
                    $('.prevMonthCA').text('Januari');
                } else if (event.target.value == 2) {
                    $('.prevMonthCA').text('Februari');
                } else if (event.target.value == 3) {
                    $('.prevMonthCA').text('Maret');
                } else if (event.target.value == 4) {
                    $('.prevMonthCA').text('April');
                } else if (event.target.value == 5) {
                    $('.prevMonthCA').text('Mei');
                } else if (event.target.value == 6) {
                    $('.prevMonthCA').text('Juni');
                } else if (event.target.value == 7) {
                    $('.prevMonthCA').text('Juli');
                } else if (event.target.value == 8) {
                    $('.prevMonthCA').text('Agustus');
                } else if (event.target.value == 9) {
                    $('.prevMonthCA').text('September');
                } else if (event.target.value == 10) {
                    $('.prevMonthCA').text('Oktober');
                } else if (event.target.value == 11) {
                    $('.prevMonthCA').text('November');
                } else if (event.target.value == 12) {
                    $('.prevMonthCA').text('Desember');
                } else {
                    $('.prevMonthCA').text('');
                    $('#year').text('');
                }

                $.ajax({
                    type: "GET",
                    url: "/finance/balance-sheet/get-CA-NCA/" + event.target.value,
                    success: function(res) {
                        if (res.status && (res.data.ca && res.data.nca)) {
                            var action = "{{ route('finance.updateCAandNCA') }}?caID=" + res.data.ca.id + "&ncaID=" + res.data.nca.id;
                            $('#financeForm').attr('action', action);

                            // Card left
                            $('#inputCashCA').val((res.data.ca.cash).toString());
                            $('#inputAccountsReceivableCA').val(res.data.ca.accounts_receivable);
                            $('#inputSuppliesCA').val(res.data.ca.supplies);
                            $('#inputOtherCA').val(res.data.ca.other_current_assets);
                            $('#inputFixedAssetsNCA').val(res.data.nca.fixed_assets);
                            $('#inputDepreciationNCA').val(res.data.nca.depreciation);

                            // Card right
                            $('#cashCA').html(formatRupiah(res.data.ca.cash));
                            $('#accountsReceivableCA').html(formatRupiah(res.data.ca.accounts_receivable));
                            $('#suppliesCA').html(formatRupiah(res.data.ca.supplies));
                            $('#otherCA').html(formatRupiah(res.data.ca.other_current_assets));
                            var total_ca = (res.data.ca.cash + res.data.ca.accounts_receivable + res.data.ca.supplies + res.data.ca.other_current_assets);
                            $('#totalCA').html(formatRupiah(total_ca));
                            $('#fixedAssetsNCA').html(formatRupiah(res.data.nca.fixed_assets));
                            $('#depreciationNCA').html(formatRupiah(res.data.nca.depreciation));
                            var total_nca = (res.data.nca.fixed_assets + res.data.nca.depreciation);
                            $('#totalNCA').html(formatRupiah(total_nca));
                            var total_asset = (total_ca + total_nca);
                            $('#totalAsset').html(formatRupiah(total_asset));
                        } else if (!res.status || (res.data.ca === null && res.data.nca === null)) {
                            $('#financeForm').attr('action', "{{ route('finance.addCAandNCA') }}");
                            
                            // Card left
                            $('#inputCashCA').val('');
                            $('#inputAccountsReceivableCA').val('');
                            $('#inputSuppliesCA').val('');
                            $('#inputOtherCA').val('');
                            $('#inputFixedAssetsNCA').val('');
                            $('#inputDepreciationNCA').val('');

                            // Card right
                            $('#cashCA').html("Rp 0");
                            $('#accountsReceivableCA').html("Rp 0");
                            $('#suppliesCA').html("Rp 0");
                            $('#otherCA').html("Rp 0");
                            $('#totalCA').html("Rp 0");
                            $('#fixedAssetsNCA').html("Rp 0");
                            $('#depreciationNCA').html("Rp 0");
                            $('#totalNCA').html("Rp 0");
                            $('#totalAsset').html("Rp 0");
                        }
                    }
                });
            });

            // Format rupiah
            $('.rupiah').on('input', function() {
                var formattedValue = inputFormatRupiah($(this).val());
                $(this).val(formattedValue);
            });
        });
    </script>
@endpush