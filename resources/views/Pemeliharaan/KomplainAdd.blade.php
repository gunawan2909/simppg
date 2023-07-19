@extends('Layout')
@section('Dashboard')
    <h1 class=" text-4xl text-center font-bold ">Form Pengajuan Komplain</h1>
    <form action="" method="post" class=" grid grid-cols-1 lg:grid-cols-2 gap-2 mt-10 px-10"
        enctype="multipart/form-data">
        @csrf
        <img id="ImgPreview" class="w-60 lg:row-span-3 max-h-80  my-auto mx-auto border border-black"
            src="{{ asset('/img/no-image.jpg') }}">
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Komponen ME</span>
            </label>
            <select name="komponen_id" class="select select-bordered w-full ">
                <option disabled selected>Pilih salah satu</option>
                @foreach ($komponen as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->lokasi }}</option>
                @endforeach
            </select>
            @error('komponen_id')
                <p class=" text-xs text-error">Anda Belum Memilih Komponen</p>
            @enderror
        </div>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Komponen ME</span>
            </label>
            <textarea name="keterangan" class="textarea textarea-bordered"></textarea>
            @error('keterangan')
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

        <a href="{{ route('pemeliharaan.komplain.index') }}" class="btn w-full btn-lg bg-info">Kembali </a>
        <button type="submit" class="btn w-full btn-lg bg-success">Ajukan </button>

    </form>
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
@endsection
