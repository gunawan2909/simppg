@extends('App')
@section('content')
    <div class=" grid w-full h-screen justify-center items-center gap-0 bg-neutral">
        <div class=" bg-base-300 lg:w-[850px] h-fit rounded-lg p-10 space-y-6  ">
            <form class=" grid grid-cols-1 lg:grid-cols-2 w-full space-y-6" method="post" enctype="multipart/form-data">
                <img id="ImgPreview" class="w-60 lg:row-span-5 max-h-80  my-auto mx-auto border border-black"
                    src="{{ asset('/img/no-image.jpg') }}">
                @csrf
                <div class=" space-y-1">
                    <input name="name" type="text" placeholder="Nama" class="input input-bordered w-full " />
                    @error('name')
                        <p class=" text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" space-y-1">
                    <input name="email" type="email" placeholder="Email" class="input input-bordered w-full " />
                    @error('email')
                        <p class=" text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" space-y-1">
                    <input name="password" type="password" placeholder="Password" class="input input-bordered w-full " />
                    @error('password')
                        <p class=" text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <input name="password_confirmation" type="password" placeholder="Konrimasi Password"
                    class="input input-bordered w-full " />
                <div class=" space-y-1">
                    <input onchange="previewImage()" type="file" name="image" id="img" placeholder="Foto"
                        class="file-input file-input-bordered w-full " />
                    @error('image')
                        <p class=" text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success lg:col-span-2">Buat Akun</button>
            </form>
            <p class=" text-center   ">
                Sudah memiliki akun<a href="{{ route('login') }}" class=" text-info hover:font-bold">
                    Login</a>
            </p>
        </div>
    </div>
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
