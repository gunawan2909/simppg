@extends('Layout')
@section('Dashboard')
    <h1 class=" text-4xl text-center font-bold ">Form Pengajuan Komplain</h1>
    <form action="" method="post" class=" grid grid-cols-1 lg:grid-cols-2 gap-2 mt-10 px-10"
        enctype="multipart/form-data">
        @csrf
        <img id="ImgPreview" class="w-60 lg:row-span-4 max-h-80  my-auto mx-auto border border-black"
            src="{{ $komplain->image ? asset('storage/' . $komplain->image) : asset('/img/no-image.jpg') }}">
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Komponen ME</span>
            </label>
            <input value="{{ $komplain->komponen->name }}" name="komponen_id" disabled class="input input-bordered w-full">

        </div>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Komponen ME</span>
            </label>
            <textarea disabled name="keterangan" class="textarea textarea-bordered">{{ $komplain->keterangan }}</textarea>
        </div>

        @if (Auth::user()->jabatan == 'Admin')
            {{-- Admin --}}
            @if ($komplain->status == 'Pengajuan')
                <div class="form-control w-full ">
                    <label class="label">
                        <span class="label-text">Teknisi Yang ditugaskan</span>
                    </label>
                    <select name="teknisi_id" class="select select-bordered w-full ">
                        <option disabled selected>Pilih salah satu</option>
                        @foreach ($teknisi as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control w-full ">
                    <label class="label">
                        <span class="label-text">Kegiatan</span>
                    </label>
                    <select name="kegiatan_id" class="select select-bordered w-full ">
                        <option disabled selected>Pilih salah satu</option>
                        @foreach ($kegiatan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <div class="form-control w-full ">
                    <label class="label">
                        <span class="label-text">Teknisi Yang ditugaskan</span>
                    </label>
                    <select name="teknisi_id" class="select select-bordered w-full ">
                        <option disabled selected>Pilih salah satu</option>
                        @foreach ($teknisi as $item)
                            <option value="{{ $item->id }}"
                                {{ $komplain->pemeliharaan->teknisi_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control w-full ">
                    <label class="label">
                        <span class="label-text">Kegiatan</span>
                    </label>
                    <select name="kegiatan_id" class="select select-bordered w-full ">
                        <option disabled selected>Pilih salah satu</option>
                        @foreach ($kegiatan as $item)
                            <option value="{{ $item->id }}"
                                {{ $komplain->pemeliharaan->kegiatan_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        @else
            @if ($komplain->status == 'Pengajuan')
                <div class="form-control w-full ">
                    <label class="label">
                        <span class="label-text">Teknisi Yang ditugaskan</span>
                    </label>
                    <input value="Masih Dalam Pengajuan" name="komponen_id" disabled class="input input-bordered w-full">

                </div>
                <div class="form-control w-full ">
                    <label class="label">
                        <span class="label-text">Kegiatan</span>
                    </label>
                    <input value="Masih Dalam Pengajuan" name="komponen_id" disabled class="input input-bordered w-full">

                </div>
            @else
                <div class="form-control w-full ">
                    <label class="label">
                        <span class="label-text">Teknisi Yang ditugaskan</span>
                    </label>
                    <input value="{{ $komplain->pemeliharaan->user->name }}" name="komponen_id" disabled
                        class="input input-bordered w-full">

                </div>
                <div class="form-control w-full ">
                    <label class="label">
                        <span class="label-text">Kegiatan</span>
                    </label>
                    <input value="{{ $komplain->pemeliharaan->kegiatan->name }}" name="komponen_id" disabled
                        class="input input-bordered w-full">

                </div>
            @endif
        @endif



        <A href="{{ route('pemeliharaan.komplain.index') }}"
            class="btn w-full btn-lg {{ Auth::user()->jabatan != 'Admin' ? 'col-span-2' : '' }}  bg-info">Kembali </A>
        <button type="submit"
            class="btn w-full btn-lg {{ Auth::user()->jabatan != 'Admin' ? 'hidden' : '' }} bg-success">Ajukan </button>

    </form>
@endsection
