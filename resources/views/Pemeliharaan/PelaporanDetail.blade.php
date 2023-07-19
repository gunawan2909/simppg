@extends('Layout')
@section('Dashboard')
    <h1 class=" text-4xl text-center font-bold ">Laporan Pengajuan Komplain</h1>
    <a href="{{ route('pemeliharaan.pelaporan.print',['id'=>$pemeliharaan->id]) }}" class=" btn btn-success ">Unduh Laporan<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15">
            <path fill="currentColor"
                d="M2.5 6.5V6H2v.5h.5Zm4 0V6H6v.5h.5Zm0 4H6v.5h.5v-.5Zm7-7h.5v-.207l-.146-.147l-.354.354Zm-3-3l.354-.354L10.707 0H10.5v.5ZM2.5 7h1V6h-1v1Zm.5 4V8.5H2V11h1Zm0-2.5v-2H2v2h1Zm.5-.5h-1v1h1V8Zm.5-.5a.5.5 0 0 1-.5.5v1A1.5 1.5 0 0 0 5 7.5H4ZM3.5 7a.5.5 0 0 1 .5.5h1A1.5 1.5 0 0 0 3.5 6v1ZM6 6.5v4h1v-4H6Zm.5 4.5h1v-1h-1v1ZM9 9.5v-2H8v2h1ZM7.5 6h-1v1h1V6ZM9 7.5A1.5 1.5 0 0 0 7.5 6v1a.5.5 0 0 1 .5.5h1ZM7.5 11A1.5 1.5 0 0 0 9 9.5H8a.5.5 0 0 1-.5.5v1ZM10 6v5h1V6h-1Zm.5 1H13V6h-2.5v1Zm0 2H12V8h-1.5v1ZM2 5V1.5H1V5h1Zm11-1.5V5h1V3.5h-1ZM2.5 1h8V0h-8v1Zm7.646-.146l3 3l.708-.708l-3-3l-.708.708ZM2 1.5a.5.5 0 0 1 .5-.5V0A1.5 1.5 0 0 0 1 1.5h1ZM1 12v1.5h1V12H1Zm1.5 3h10v-1h-10v1ZM14 13.5V12h-1v1.5h1ZM12.5 15a1.5 1.5 0 0 0 1.5-1.5h-1a.5.5 0 0 1-.5.5v1ZM1 13.5A1.5 1.5 0 0 0 2.5 15v-1a.5.5 0 0 1-.5-.5H1Z" />
        </svg></a>
    <div class=" grid grid-cols-1 lg:grid-cols-2 gap-2 mt-10 px-10 mb-10">
        <img id="ImgPreview" class="w-60 lg:row-span-4 max-h-80  my-auto mx-auto border border-black"
            src="{{ $pemeliharaan->komplain->image ? asset('storage/' . $pemeliharaan->komplain->image) : asset('/img/no-image.jpg') }}">

        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Komponen ME</span>
            </label>
            <input value="{{ $pemeliharaan->komplain->komponen->name }}" name="komponen_id" disabled
                class="input input-bordered w-full">

        </div>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Keterangan</span>
            </label>
            <textarea disabled name="keterangan" class="textarea textarea-bordered">{{ $pemeliharaan->komplain->keterangan }}</textarea>
        </div>


        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Teknisi Yang ditugaskan</span>
            </label>
            <input value="{{ $pemeliharaan->user->name }}" name="komponen_id" disabled class="input input-bordered w-full">

        </div>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Kegiatan</span>
            </label>
            <input value="{{ $pemeliharaan->kegiatan->name }}" name="komponen_id" disabled
                class="input input-bordered w-full">

        </div>
        <div class="overflow-x-auto my-10 lg:col-span-2">
            <h1 class=" text-center font-semibold text-3xl">Daftar Alat dan Bahan</h1>
            <table class="table ">
                <!-- head -->
                <thead>
                    <tr class=" text-lg text-center">
                        <th></th>
                        <th>Nama Alat/Bahan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    <!-- row 1 -->
                    @foreach ($pemeliharaan->listkebutuhan as $item)
                        <tr class=" text-center">
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                {{ $item->kebutuhan->name }}
                            </td>
                            <td>
                                {{ $item->jumlah }}
                            </td>
                            <td>
                                Rp.{{ number_format($item->kebutuhan->harga ?? 0) }}
                            </td>
                            <td>
                                Rp.{{ number_format($item->kebutuhan->harga * $item->jumlah) }}
                                @php
                                    $total += $item->kebutuhan->harga * $item->jumlah;
                                @endphp
                            </td>

                        </tr>
                    @endforeach

                </tbody>
                <tfoot class=" text-lg font-bold text-center">
                    <tr>
                        <td colspan="4">Jumlah</td>
                        <td>Rp.{{ number_format($total) }}</td>
                    </tr>
                </tfoot>

            </table>

        </div>
        <a href="{{ route('pemeliharaan.pelaporan.index') }}" class="btn w-full btn-lg bg-info lg:col-span-2 ">Kembali
        </a>


    </div>
@endsection
