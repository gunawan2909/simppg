@extends('Layout')
@section('Dashboard')
    <h1 class="font-bold text-4xl text-center my-10">Komplain</h1>
    <div class=" w-full flex">
        <a href="{{ route('pemeliharaan.komplain.add') }}"
            class=" text-xl text-ceter w-full bg-success input text-center font-bold items-center justify-center py-2">Ajukan
            Komplain </a>
    </div>
    <div class=" flex items-center w-full px-20 mt-10">
        <a href="?bulan={{ $bulan - 1 }}&tahun={{ $tahun }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <g transform="rotate(180 7.5 7.5)">
                    <path fill="currentColor"
                        d="M8.293 2.293a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1 0 1.414l-4.5 4.5a1 1 0 0 1-1.414-1.414L11 8.5H1.5a1 1 0 0 1 0-2H11L8.293 3.707a1 1 0 0 1 0-1.414Z" />
                </g>
            </svg>
        </a>
        <h1 class=" text-xl font-semibold mx-auto">
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
        </h1>

        <a href="?bulan={{ $bulan + 1 }}&tahun={{ $tahun }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <path fill="currentColor"
                    d="M8.293 2.293a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1 0 1.414l-4.5 4.5a1 1 0 0 1-1.414-1.414L11 8.5H1.5a1 1 0 0 1 0-2H11L8.293 3.707a1 1 0 0 1 0-1.414Z" />
            </svg>
        </a>
    </div>

    <div class=" flex w-full">
        <form action=""class="flex space-x-3">
            <input type="hidden" name="bulan" value="{{ $bulan }}">
            <input type="hidden" name="tahun" value="{{ $tahun }}">
            <div class=" form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Tampilkan data dalam</span>
                </label>
                <select class="select select-bordered" name="pagination">
                    <option value="50" {{ $pagination == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $pagination == 100 ? 'selected' : '' }}>100</option>
                    <option value="1000" {{ $pagination == 1000 ? 'selected' : '' }}>1000</option>
                </select>
            </div>
            <div class=" form-control w-full max-w-xs">

                <label class="label">
                    <span class="label-text">Tanggal</span>
                </label>
                <select name="day" class="select select-bordered w-40">
                    <option value="">Semua</option>
                    @php
                        for ($h = 1; $h < 32; $h++) {
                            echo '<option value="' . $h . '">' . $h . '</option>';
                        }
                    @endphp
                </select>
            </div>
            <button type="submit" class="input self-end btn-success py-1 px-3 rounded-md font-semibold ">Terapkan</button>
        </form>
        <form action="" method="get" class=" ml-auto mr-10 mt-auto">
            <input type="hidden" name="pagination" value="{{ $pagination }}">
            <input value="{{ $search }}" type="search" name="search" id="" class=" input input-bordered  "
                placeholder="Pencarian">
            <button type="submit"></button>
        </form>
    </div>
    <div class="overflow-x-auto mb-10">
        <table class="table ">
            <!-- head -->
            <thead>
                <tr class=" text-lg text-center">
                    <th></th>
                    <th>Tanggal Komplain</th>
                    <th>Nama Pelapor</th>
                    <th>Nama Komponene ME</th>
                    <th>Nama Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($komplain as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->komponen->name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <div class=" flex justify-center space-x-2">
                                <a href="{{ route('pemeliharaan.komplain.detail', ['id' => $item->id]) }}"
                                    class=" p-1 rounded-md h-[48px] w-[48px] grid content-center justify-center btn-info ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M0 4.13v1.428a.5.5 0 0 0 .725.446l.886-.446l.377-.19L2 5.362l1.404-.708l.07-.036l.662-.333l.603-.304a.5.5 0 0 0 0-.893l-.603-.305l-.662-.333l-.07-.036L2 1.706l-.012-.005l-.377-.19l-.886-.447A.5.5 0 0 0 0 1.51v2.62ZM7.25 2a.75.75 0 0 0 0 1.5h7a.25.25 0 0 1 .25.25v8.5a.25.25 0 0 1-.25.25h-9.5a.25.25 0 0 1-.25-.25V6.754a.75.75 0 0 0-1.5 0v5.496c0 .966.784 1.75 1.75 1.75h9.5A1.75 1.75 0 0 0 16 12.25v-8.5A1.75 1.75 0 0 0 14.25 2h-7Zm-.5 4a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5h-5.5ZM6 9.25a.75.75 0 0 1 .75-.75h3.5a.75.75 0 0 1 0 1.5h-3.5A.75.75 0 0 1 6 9.25Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class=" text-xs flex w-full pl-3  pt-3 border-t ">
            <p>Halaman {{ $komplain->currentPage() }} Dari {{ $komplain->lastPage() }} </p>
            <div class="ml-auto flex text-lg font-bold">

                <a
                    @if ($komplain->previousPageUrl()) class="mr-10 " href="{{ $komplain->previousPageUrl() . '&pagination=' . $pagination . '&bulan=' . $bulan . '&tahun=' . $tahun }}"
                @else class="mr-10 text-slate-300" @endif>
                    < </a>

                        <a
                            @if ($komplain->nextPageUrl()) class="mr-10 " href="{{ $komplain->nextPageUrl() . '&pagination=' . $pagination . '&bulan=' . $bulan . '&tahun=' . $tahun }}" @else class="mr-10 text-slate-300" @endif>>
                        </a>
            </div>
        </div>
    </div>
@endsection
