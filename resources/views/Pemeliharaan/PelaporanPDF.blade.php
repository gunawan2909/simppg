<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /* styles.css */
        /* ... Kode CSS lainnya ... */
        .header-container {
            text-align: center;
            margin: 0 auto;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .header-table td {
            padding: 10px;
            text-align: center;
            border: none;
            /* Remove borders from table cells */
        }

        .pp {
            width: auto;
            /* Set a fixed width for the images */
            height: 100px;
            /* Set a fixed height for the images */
        }

        .bumn {
            width: 100%;
            /* Set a fixed width for the images */
            height: 100px;
            object-fit: cover;
            /* Set a fixed height for the images */
        }

        .report-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .w-full {
            width: 100%;
        }

        .month-year {
            font-size: 20px;
            font-weight: bold;
        }

        /* Main Content Table */
        .table-container {
            margin-top: 20px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
            /* Added margin auto to center the table */
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <table class="header-table">
            <tr>
                <td>
                    <img class="pp" src="https://upload.wikimedia.org/wikipedia/id/c/cc/PT_PP_logo.svg" alt="">
                </td>
                <td>
                    <div class="w-full">
                        <p class="report-title">LAPORAN PEMELIHARAAN KOMPONEN MEKANIKAL GEDUNG PALZA PP</p>
                        <p class="month-year">
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
                                    Unknown Month
                            @endswitch
                            {{ $tahun }}
                        </p>
                    </div>
                </td>

                <td>
                    <div class="imagebumn">
                        <img class="bumn"
                            src="https://upload.wikimedia.org/wikipedia/commons/1/11/Logo_BUMN_Untuk_Indonesia_2020.svg"
                            alt="">
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="table-container">
        <table>
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal Komplain</th>
                    <th>Nama Pelapor</th>
                    <th>Nama Komponen ME</th>
                    <th>Tanggal Pelaksanaan</th>
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
                    <tr>
                        <td>{{ $loop->iteration }}</td>
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
</body>

</html>
