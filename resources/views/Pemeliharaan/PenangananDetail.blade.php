@extends('Layout')
@section('Dashboard')
    <h1 class=" text-4xl text-center font-bold ">Form Pengajuan Komplain</h1>
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
                <span class="label-text">Komponen ME</span>
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


        @if ($pemeliharaan->komplain->status == 'Dikerjakan')
            <div class="overflow-x-auto my-10 lg:col-span-2">
                <h1 class=" text-center font-semibold text-3xl">Daftar Alat dan Bahan</h1>
                <table class="table ">
                    <!-- head -->
                    <thead>
                        <tr class=" text-lg text-center">
                            <th></th>
                            <th>Nama Alat/Bahan</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr>
                            <th></th>

                            <form action="{{ route('pemeliharaan.penanganan.tool.add', ['id' => $pemeliharaan->id]) }}"
                                method="POST">
                                @csrf
                                <td>
                                    <select name="kebutuhan_id" type="text" placeholder="Nama Komponen"
                                        class="select select-bordered w-full max-w-md">
                                        <option value="">Pilih Salah Satu</option>
                                        @foreach ($kebutuhan as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} - [{{ $item->jenis }}]
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input name="jumlah" value="1" type="number"
                                        class="input input-bordered w-full max-w-md" />
                                </td>
                                <td class=" flex justify-center items-center">
                                    <button {{ $pemeliharaan->komplain->status == 'Selesai' ? 'disabled' : '' }}
                                        type="submit" class=" input btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6h-2Z" />
                                        </svg></button>
                                </td>
                            </form>
                        </tr>
                        @foreach ($pemeliharaan->listkebutuhan as $item)
                            <tr class=" text-center">
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    {{ $item->kebutuhan->name }}
                                </td>
                                <td>
                                    {{ $item->jumlah }}
                                </td>
                                <td class=" flex justify-center items-center">
                                    <form action="{{ route('pemeliharaan.penanganan.delete.tool', ['id' => $item->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button {{ $pemeliharaan->komplain->status == 'Selesai' ? 'disabled' : '' }}
                                            type="submit" class=" input btn-error"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 16 16">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M5.75 3V1.5h4.5V3h-4.5Zm-1.5 0V1a1 1 0 0 1 1-1h5.5a1 1 0 0 1 1 1v2h2.5a.75.75 0 0 1 0 1.5h-.365l-.743 9.653A2 2 0 0 1 11.148 16H4.852a2 2 0 0 1-1.994-1.847L2.115 4.5H1.75a.75.75 0 0 1 0-1.5h2.5Zm-.63 1.5h8.76l-.734 9.538a.5.5 0 0 1-.498.462H4.852a.5.5 0 0 1-.498-.462L3.62 4.5Z"
                                                    clip-rule="evenodd" />
                                            </svg></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        @endif
        @if ($pemeliharaan->komplain->status == 'Selesai')
            <div class="overflow-x-auto my-10 lg:col-span-2">
                <h1 class=" text-center font-semibold text-3xl">Daftar Alat dan Bahan</h1>
                <table class="table ">
                    <!-- head -->
                    <thead>
                        <tr class=" text-lg text-center">
                            <th></th>
                            <th>Nama Alat/Bahan</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <td class=" flex justify-center items-center">
                                    <form action="{{ route('pemeliharaan.penanganan.delete.tool', ['id' => $item->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button {{ $pemeliharaan->komplain->status == 'Selesai' ? 'disabled' : '' }}
                                            type="submit" class=" input btn-error"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 16 16">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M5.75 3V1.5h4.5V3h-4.5Zm-1.5 0V1a1 1 0 0 1 1-1h5.5a1 1 0 0 1 1 1v2h2.5a.75.75 0 0 1 0 1.5h-.365l-.743 9.653A2 2 0 0 1 11.148 16H4.852a2 2 0 0 1-1.994-1.847L2.115 4.5H1.75a.75.75 0 0 1 0-1.5h2.5Zm-.63 1.5h8.76l-.734 9.538a.5.5 0 0 1-.498.462H4.852a.5.5 0 0 1-.498-.462L3.62 4.5Z"
                                                    clip-rule="evenodd" />
                                            </svg></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        @endif
        <a href="{{ route('pemeliharaan.penanganan.index') }}"
            class="btn w-full btn-lg bg-info {{ $pemeliharaan->komplain->status == 'Selesai' ? 'lg:col-span-2' : '' }}  ">Kembali
        </a>

        <form action="" method="POST"
            class="{{ $pemeliharaan->komplain->status == 'Ditugaskan' ? 'hidden' : '' }}{{ $pemeliharaan->komplain->status == 'Selesai' ? 'hidden' : '' }}">
            @csrf

            <button type="submit" class="btn w-full btn-lg bg-success  ">Selesai </button>
        </form>
        <form action="{{ route('pemeliharaan.penanganan.dikerjakan', ['id' => $pemeliharaan->id]) }}" method="POST"
            class="{{ $pemeliharaan->komplain->status == 'Dikerjakan' ? 'hidden' : '' }}{{ $pemeliharaan->komplain->status == 'Selesai' ? 'hidden' : '' }}">
            @csrf
            <button type="submit" class="btn w-full btn-lg bg-success  ">Lakukan Perbaikan </button>
        </form>

    </div>
@endsection
