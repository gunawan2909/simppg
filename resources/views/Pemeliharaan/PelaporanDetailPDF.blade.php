<!DOCTYPE html>
<html>

<head>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <h5 class="text-center display-4 font-weight-bold mt-4">Laporan Pengajuan Komplain</h5>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="komponen">Komponen ME</label>
                    <p class="h5"> {{ $pemeliharaan->komplain->komponen->name }}</p>
                </div>
                <div class="form-group">
                    <label for="teknisi">Teknisi Yang ditugaskan</label>
                    <p class="h5"> {{ $pemeliharaan->user->name }}</p>
                </div>
                <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <p class="h5"> {{ $pemeliharaan->kegiatan->name }}</p>
                </div>

            </div>
            <div class="col">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea disabled name="keterangan" class="form-control">{{ $pemeliharaan->komplain->keterangan }}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <h1 class="text-center font-weight-bold h3">Daftar Alat dan Bahan</h1>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nama Alat/Bahan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($pemeliharaan->listkebutuhan as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kebutuhan->name }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>Rp.{{ number_format($item->kebutuhan->harga ?? 0) }}</td>
                                <td>Rp.{{ number_format($item->kebutuhan->harga * $item->jumlah) }}</td>
                                @php $total += $item->kebutuhan->harga * $item->jumlah; @endphp
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-center">
                        <tr>
                            <td colspan="4">Jumlah</td>
                            <td>Rp.{{ number_format($total) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
