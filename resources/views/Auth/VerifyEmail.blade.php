@extends('Layout')
@section('Dashboard')
    <form action="/email/verification-notification" method="POST"
        class=" flex flex-col items-center justify-center h-screen  space-y-6  w-full ">
        @csrf
        <h1 class=" w-80 text-center my-6">Silahkan cek email anda Untuk verifikasi akun, periksa email. Ikuti
            petunjuk
            dalam
            email untuk menyelesaikan proses verifikasi dan dapatkan akses layanan sepenuhnya. <span class=" font-bold">
                {{ Auth::user()->email }}</span>

        </h1>
        <button class="btn btn-success rounded-sm py-1" type="submit">Kirim Ulang</button>
    </form>
@endsection
