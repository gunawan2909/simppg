@extends('Layout')
@section('Dashboard')
    <div class=" grid w-full items-center h-screen ">
        <div class="w-full grid space-y-6">
            <p class=" text-center text-4xl font-bold ">
                Silahkan Menghubungi Admin Untuk mendapat Confirmasi Akun Anda
            </p>
            <a class="btn-neutral py-2 px-10 input w-fit self-center mx-auto" href="{{ route('dashboard') }}">Lanjut Ke
                Dashboard</a>
        </div>
    </div>
@endsection
