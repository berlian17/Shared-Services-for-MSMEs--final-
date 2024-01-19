@extends('Finance_Apps.layouts.app')

@section('title')
    Manajemen Keuangan
@endsection

@section('content-finance')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cash Flow</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" id="financeForm" action="{{ route('finance.addCashFlow') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 col-12">
                            <label for="inputMonth">Bulan</label>
                            <select class="form-control" id="month" name="month" required>
                                <option value="">Pilih Bulan</option>
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
                        <div class="form-group col-md-6 col-12">
                            <label for="inputCashCI">Cash In</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control rupiah" name="cashCI" id="inputCashCI" value="{{ old('cashCI') }}" min="0" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-1 mt-2">
                        Submit
                    </button>
                </form>
            </div>
        </div>

        <!-- Cash Flow Preview -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="form mt-4" id="form">
                    <div class="form-row">
                        <div class="form-group col-12 col-md-3">
                            <label for="">Tahun</label>
                            <select class="form-control" id="inputYear" required>
                                <option value="">Pilih Tahun</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="col-12 col-md-2 mt-3">
                            <button type="submit" class="btn btn-primary btn-user btn-block mt-3">
                                Tampilkan Laporan
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive mt-5">
                    <div id="cash-flow-report"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
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
            $('#month').on('change', (event) => {
                // Get data preview
                $.ajax({
                    type: "GET",
                    url: "/finance/cash-flow/get-cash-flow/" + event.target.value,
                    success: function(res) {
                        if (res.status && res.data.ci) {
                            var action = "{{ route('finance.updateCashFlow') }}?ciID=" + res.data.ci.id;
                            $('#financeForm').attr('action', action);
                            $('#inputCashCI').val(res.data.ci.cash);
                        } else if (!res.status || res.data.ci === null) {
                            $('#financeForm').attr('action', "{{ route('finance.addCashFlow') }}");
                            $('#inputCashCI').val('');
                        }
                    }
                });
            });

            // Format rupiah
            $('.rupiah').on('input', function() {
                var formattedValue = inputFormatRupiah($(this).val());
                $(this).val(formattedValue);
            });

            // Create cash flow report
            $('#form').on('submit', function(e) {
                e.preventDefault();
                var yearInput = $('#inputYear').val();
                
                $.ajax({
                    type: "POST",
                    url: "/finance/cash-flow/report",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "year": yearInput,
                    },
                    success: function(data) {
                        $('#cash-flow-report').html(data);
                    }
                });
            });
        });
    </script>
@endpush