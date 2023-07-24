@extends('Layout')
@section('Dashboard')
    @if (session('status'))
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>
                {{ session('status') }}
            </span>
        </div>
    @elseif (session('error'))
        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>
                {{ session('error') }}

            </span>
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class=" grid grid-cols-1 md:grid-cols-2 place-items-center">
            <h1 class=" md:col-span-2 text-lg font-bold ">Setting Profile</h1>
            <img class=" row-span-3  rounded-lg border-4 border-white w-60 md:w-40 h-[300px] lg:w-60"
                src="{{ $user->image ? asset('storage/' . $user->image) : asset('/img/no-image.jpg') }} " id="ImgPreview"
                alt="Foto ">
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Nama</span>
                </label>
                <input type="text" value="{{ $user->name }}" disabled placeholder="Type here"
                    class="input input-bordered w-full max-w-xs" />
            </div>

            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Jabatan</span>
                </label>
                <input type="text" value="{{ $user->jabatan }}" disabled placeholder="Type here"
                    class="input input-bordered w-full max-w-xs" />
            </div>

            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Foto Profile</span>
                </label>
                <input type="file" class="file-input w-full max-w-xs" id="img" name="image"
                    onchange="previewImage()" />
                @error('image')
                    <span class=" text-xs text-error">{{ $message }}</span>
                @enderror
            </div>


        </div>

        <div class=" grid grid-cols-1 gap-2 mt-3">
            <button type="submit" class="btn btn-success ">Simpan</button>
        </div>

    </form>

    <form action="{{ route('user.password.change') }}" method="post" class=" mb-10">
        @csrf
        <h1 class=" md:col-span-2 text-lg font-bold text-center mt-10">Chage Password</h1>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Password Lama</span>
            </label>
            <input type="password" name="old_password" placeholder="Type here" class="input input-bordered w-full " />
            @error('old_password')
                <span class=" text-xs text-error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Password Baru</span>
            </label>
            <input type="password" name="new_password" placeholder="Type here" class="input input-bordered w-full " />
            @error('new_password')
                <span class=" text-xs text-error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control w-full ">
            <label class="label">
                <span class="label-text">Konfirmasi Password</span>
            </label>
            <input type="password" name="new_password_confirmation" placeholder="Type here"
                class="input input-bordered w-full " />
            @error('new_password_confirmation')
                <span class=" text-xs text-error">{{ $message }}</span>
            @enderror
        </div>



        <div class=" grid grid-cols-1 gap-2 mt-3">
            <button type="submit" class="btn btn-success ">Ubah</button>
        </div>
    </form>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

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
