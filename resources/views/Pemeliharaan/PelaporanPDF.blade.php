<!DOCTYPE html>
<html>

<head>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <p class="text-center display-5 mt-4">Laporan Pengajuan komplain
        @switch($bulan)
            @case(1)
                Januari
            @break

            @case(2)
                Februari
            @break

            @case(3)
                Maret
            @break

            @case(4)
                April
            @break

            @case(5)
                Mei
            @break

            @case(6)
                Juni
            @break

            @case(7)
                Juli
            @break

            @case(8)
                Agustus
            @break

            @case(9)
                September
            @break

            @case(10)
                Oktober
            @break

            @case(11)
                November
            @break

            @case(12)
                Desamber
            @break

            @default
        @endswitch
        {{ $tahun }}
    </p>

    <div class="mt-5">
        <table class="table ">
            <!-- head -->
            <thead>
                <tr class=" text-lg text-center display-6">
                    <th></th>
                    <th>Tanggal Komplain</th>
                    <th>Nama Pelapor</th>
                    <th>Nama Komponen ME</th>
                    <th>Tanggal Pelaksaan</th>
                    <th>Nama Teknisi</th>
                    <th>Alat</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($komplain as $item)
                    @php
                        $date = $item->pemeliharaan->listkebutuhan[0]->created_at ?? $item->created_at;
                        if ($day != '00') {
                            if (substr($date, 8, 2) != $day) {
                                continue;
                            }
                        }
                    @endphp
                    <tr class=" text-center">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->komponen->name . '-' . $item->komponen->lokasi }}</td>
                        <td>{{ $item->pemeliharaan->listkebutuhan[0]->created_at ?? $item->created_at }}</td>
                        <td>{{ $item->pemeliharaan->user->name }}</td>
                        <td>
                            @foreach ($item->pemeliharaan->listkebutuhan as $k)
                                <p>{{ $k->kebutuhan->name }}</p>
                            @endforeach
                        </td>
                        @php
                            $total = 0;
                            foreach ($item->pemeliharaan->listkebutuhan as $a) {
                                $total += $a->jumlah * $a->kebutuhan->harga;
                            }
                            
                        @endphp
                        <td>Rp.{{ number_format($total) }}</td>

                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    <!-- Add Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
