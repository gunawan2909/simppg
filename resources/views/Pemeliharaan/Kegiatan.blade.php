@extends('Layout')
@section('Dashboard')
    <h1 class="font-bold text-4xl text-center my-10">Data Kegiatan</h1>
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
                    <th>Nama Komponen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th></th>

                    <form action="" method="POST">
                        @csrf
                        <td>
                            <input name="name" type="text" placeholder="Nama Kegiatan"
                                class="input input-bordered w-full max-w-md" />
                        </td>

                        <td class=" flex justify-center items-center">


                            <button type="submit" class=" input btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6h-2Z" />
                                </svg></button>
                        </td>
                    </form>
                </tr>
                @foreach ($kegiatan as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class=" flex justify-center space-x-2">

                                <form action="{{ route('pemeliharaan.kegiatan.delete', ['id' => $item->id]) }}"
                                    method="post">
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
                @endforeach

            </tbody>
        </table>
        <div class=" text-xs flex w-full pl-3  pt-3 border-t ">
            <p>Halaman {{ $kegiatan->currentPage() }} Dari {{ $kegiatan->lastPage() }} </p>
            <div class="ml-auto flex text-lg font-bold">

                <a
                    @if ($kegiatan->previousPageUrl()) class="mr-10 " href="{{ $kegiatan->previousPageUrl() . '&pagination=' . $pagination }}"
                @else class="mr-10 text-slate-300" @endif>
                    < </a>

                        <a
                            @if ($kegiatan->nextPageUrl()) class="mr-10 " href="{{ $kegiatan->nextPageUrl() . '&pagination=' . $pagination }}" @else class="mr-10 text-slate-300" @endif>>
                        </a>
            </div>
        </div>
    </div>
@endsection
