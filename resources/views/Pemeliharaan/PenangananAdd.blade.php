@extends('Layout')
@section('Dashboard')
    <h1 class=" text-4xl text-center font-bold ">Form Pengajuan Penanganan</h1>
    <form class=" grid grid-cols-1 lg:grid-cols-2 gap-2 mt-10 px-10 mb-10" action="" method="post"
        enctype="multipart/form-data">
        @csrf
        <img id="ImgPreview" class="w-60 lg:row-span-5 max-h-80  my-auto mx-auto border border-black"
            src="{{ asset('/img/no-image.jpg') }}">

        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Komponen ME</span>
            </label>
            <select name="komponen_id" class="select select-bordered w-full">
                <option value="">Pilih Salah Satu</option>
                @foreach ($komponen as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}-{{ $item->lokasi }}</option>
                @endforeach
            </select>
            @error('komponen_id')
                <p class=" text-xs text-error">{{ $message }}</p>
            @enderror


        </div>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Keterangan</span>
            </label>
            <textarea name="keterangan" class="textarea textarea-bordered"></textarea>
        </div>
        @if (Auth::user()->jabatan == 'Admin')
            <div class="form-control w-full ">
                <label class="label">
                    <span class="label-text">Teknisi</span>
                </label>
                <select name="teknisi" class="select select-bordered w-full">
                    <option value="">Pilih Salah Satu</option>
                    @foreach ($teknisi as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Kegiatan</span>
            </label>
            <select name="kegiatan_id" class="select select-bordered w-full">
                <option value="">Pilih Salah Satu</option>
                @foreach ($kegiatan as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('kegiatan_id')
                <p class=" text-xs text-error">{{ $message }}</p>
            @enderror

        </div>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Unggah Bukti Foto</span>
            </label>
            <input onchange="previewImage()" type="file" name="image" id="img" placeholder="Foto"
                class="file-input file-input-bordered w-full " />
            @error('image')
                <p class=" text-xs text-error">{{ $message }}</p>
            @enderror

        </div>

        <input type="hidden" name="id" value="{{ $pemeliharaan->id }}">
        <button type="submit" class="btn w-full btn-lg bg-success lg:col-span-2 mt-4  ">Ajukan </button>

    </form>
    <form method="post" action="{{ route('pemeliharaan.penanganan.langsung.delete', ['id' => $pemeliharaan->id]) }}"
        class="grid grid-cols-1 lg:grid-cols-2 gap-2 mt-10 px-10 mb-10">
        @csrf
        <button class="btn w-full btn-lg bg-info col-span-2">Kembali</button>
    </form>


@endsection
<script>
    function previewImage() {
        const img = document.querySelector('#img');
        const imgPrivew = document.querySelector('#ImgPreview');


        const oFReader = new FileReader();
        oFReader.readAsDataURL(img.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPrivew.src = oFREvent.target.result;
        }

    }
</script>
