@extends('App')
@section('content')
    <div class=" relative w-full items-center h-screen bg-neutral  ">
        <div
            class=" absolute bg-base-300 max-w-lg  w-full rounded-lg p-10 space-y-6 top-1/2 -translate-y-1/2  -translate-x-1/2 left-1/2 ">
            <form class=" flex flex-col w-full space-y-6" method="post">
                @csrf
                <div class=" space-y-1">
                    <input name="email" type="text" placeholder="Example@example.com"
                        class="input input-bordered w-full " />
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
                @error('auth')
                    <p class=" text-xs text-error">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-success">Masuk</button>
            </form>
            <p class=" text-center">
                Apakah belum memiliki akun? <a href="{{ route('registrasi') }}" class=" text-info hover:font-bold">
                    Registrasi</a>
            </p>
        </div>
    </div>
@endsection
