@extends('Layout')
@section('Dashboard')
    <h1 class=" text-4xl font-bold">Data User </h1>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($user as $item)
                    @if (Request::url() === route('user.role.edit', ['id' => $item->id]))
                        <tr class=" text-center">

                            <td>

                            </td>

                            <form class=" w-full grid" action="{{ route('user.role.edit', ['id' => $item->id]) }}"
                                method="POST">

                                @csrf
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <select name="jabatan" id="" class=" select select-bordered w-full">
                                        <option value="Null" {{ $item->jabatan == 'Null' ? 'selected' : '' }}>Pilih Salah
                                            Satu
                                        </option>
                                        <option value="Karyawan" {{ $item->jabatan == 'Karyawan' ? 'selected' : '' }}>
                                            Karyawan
                                        </option>
                                        <option value="Admin" {{ $item->jabatan == 'Admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                        <option value="Teknisi" {{ $item->jabatan == 'Teknisi' ? 'selected' : '' }}>
                                            Teknisi
                                        </option>
                                        <option value="Manajer" {{ $item->jabatan == 'Manajer' ? 'selected' : '' }}>
                                            Manajer
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
                        <tr class=" text-center">
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>
                                <div class=" flex justify-center space-x-2">
                                    <a href="{{ route('user.role.edit', ['id' => $item->id]) . '?page=' . request()->page . '&pagination=' . $pagination . '&search=' . $search }}"
                                        class=" p-1 rounded-md h-[48px] w-[48px] grid content-center justify-center btn-warning"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z" />
                                        </svg></a>
                                    <form action="{{ route('user.delete', ['id' => $item->id]) }}" method="post">
                                        <button type="submit" class=" btn btn-error "><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z" />
                                            </svg></button>
                                    </form>


                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>
        <div class=" text-xs flex w-full pl-3  pt-3 border-t ">
            <p>Halaman {{ $user->currentPage() }} Dari {{ $user->lastPage() }} </p>
            <div class="ml-auto flex text-lg font-bold">

                <a
                    @if ($user->previousPageUrl()) class="mr-10 " href="{{ $user->previousPageUrl() . '&pagination=' . $pagination }}"
            @else class="mr-10 text-slate-300" @endif>
                    < </a>

                        <a
                            @if ($user->nextPageUrl()) class="mr-10 " href="{{ $user->nextPageUrl() . '&pagination=' . $pagination }}" @else class="mr-10 text-slate-300" @endif>>
                        </a>
            </div>
        </div>
    </div>
@endsection
