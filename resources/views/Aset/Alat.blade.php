@extends('Layout')
@section('Dashboard')
    <h1 class="font-bold text-4xl text-center my-10">Data Alat</h1>
    <div class=" flex w-full">
        <form action=""class="flex space-x-3">
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
                    <th>Nama ALat</th>
                    <th>Kondisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr>
                    <th></th>

                    <form action="" method="POST">
                        @csrf
                        <td>
                            <input name="name" type="text" placeholder="Nama Alat"
                                class="input input-bordered w-full max-w-md" />
                        </td>
                        <td>
                            <select name="kondisi" id="" class=" select select-bordered w-full">
                                <option value="" selected>Pilih Salah Satu</option>
                                <option value="Rusak">Rusak</option>
                                <option value="Baik">Baik</option>
                            </select>
                        </td>
                        <td class=" flex justify-center items-center">


                            <button type="submit" class=" input btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6h-2Z" />
                                </svg></button>
                        </td>
                    </form>
                </tr>
                @foreach ($alat as $item)
                    @if (Request::url() === route('aset.alat.edit', ['id' => $item->id]))
                        <tr>

                            <td>

                            </td>

                            <form class=" w-full grid" action="{{ route('aset.alat.edit', ['id' => $item->id]) }}"
                                method="POST">

                                @csrf
                                <td>
                                    <input name="name" value="{{ $item->name }}" type="text" placeholder="Nama Alat"
                                        class="input input-bordered w-full max-w-md" />
                                </td>
                                <td>
                                    <select name="kondisi" id="" class=" select select-bordered w-full">
                                        <option value="Rusak" {{ $item->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak
                                        </option>
                                        <option value="Baik" {{ $item->kondisi == 'Baik' ? 'selected' : '' }}>Baik
                                        </option>
                                    </select>
                                </td>
                                <td class=" flex justify-center items-center">


                                    <button type="submit" class=" input btn-success"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 2048 2048">
                                            <path fill="currentColor"
                                                d="M640 1755L19 1133l90-90l531 530L1939 275l90 90L640 1755z" />
                                        </svg>
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @else
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->kondisi }}</td>
                            <td>
                                <div class=" flex justify-center space-x-2">
                                    <a href="{{ route('aset.alat.edit', ['id' => $item->id]) . '?page=' . request()->page . '&pagination=' . $pagination . '&search=' . $search }}"
                                        class=" p-1 rounded-md h-[48px] w-[48px] grid content-center justify-center btn-warning"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z" />
                                        </svg></a>
                                    <form action="{{ route('aset.alat.delete', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class=" p-1 rounded-md h-[48px] w-[48px] grid content-center justify-center btn-error ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>
        <div class=" text-xs flex w-full pl-3  pt-3 border-t ">
            <p>Halaman {{ $alat->currentPage() }} Dari {{ $alat->lastPage() }} </p>
            <div class="ml-auto flex text-lg font-bold">

                <a
                    @if ($alat->previousPageUrl()) class="mr-10 " href="{{ $alat->previousPageUrl() . '&pagination=' . $pagination }}"
                @else class="mr-10 text-slate-300" @endif>
                    < </a>

                        <a
                            @if ($alat->nextPageUrl()) class="mr-10 " href="{{ $alat->nextPageUrl() . '&pagination=' . $pagination }}" @else class="mr-10 text-slate-300" @endif>>
                        </a>
            </div>
        </div>
    </div>
@endsection
