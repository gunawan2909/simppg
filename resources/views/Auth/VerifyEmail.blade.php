@extends('App')
@section('content')
    <div class=" relative w-full items-center h-screen bg-neutral  ">
        <div
            class=" absolute bg-base-300 max-w-lg  w-full rounded-lg p-10 space-y-6 top-1/2 -translate-y-1/2  -translate-x-1/2 left-1/2 ">
            <form action="/email/verification-notification" method="POST"
                class=" flex flex-col items-center justify-center h-full w-full">
                @csrf
                <img class=" w-[240px]" src="{{ asset('img/Logo_pp.png') }}" alt="">
                <h1 class=" w-80 text-center my-6">Silahkan cek email anda Untuk verifikasi akun, periksa email. Ikuti
                    petunjuk
                    dalam
                    email untuk menyelesaikan proses verifikasi dan dapatkan akses layanan sepenuhnya. <span
                        class=" font-bold">
                        {{ Auth::user()->email }}</span>

                </h1>
                <button class=" w-60 mt-8 bg-primary text-white rounded-sm py-1" type="submit">Kirim Ulang</button>
            </form>

        </div>
    </div>
@endsection
