@extends('App')
@section('content')
    <div class=" relative w-full items-center h-screen bg-neutral  ">
        <div
            class=" absolute bg-base-300 max-w-lg  w-full rounded-lg p-10 space-y-6 top-1/2 -translate-y-1/2  -translate-x-1/2 left-1/2 ">
            <form action="{{ route('password.request') }}" method="POST"
                class=" flex flex-col items-center justify-center h-full w-full">
                @csrf
                <img class=" w-[240px]" src="{{ asset('img/registrasi.png') }}" alt="">
                <h1 class=" w-80 text-center my-6">Silahkan masukan Email yang anda daftarkan
                </h1>
                <input name="email" type="email" class=" input w-full">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                @if (Session::has('status'))
                    <p class=" text-md text-green-400">
                        {{ Session::get('status') }}
                    </p>
                @endif
                <button class="btn btn-accent mt-6" type="submit">Kirim Link Ke Email</button>
            </form>

        </div>
    </div>
    <div
        class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        <!-- Brand -->
        <a href="../index.html"
            class="inline-block mb-6 text-3xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
            <img src="{{ asset('/img/Logo.png') }}" alt="">
        </a>

    </div>
@endsection
