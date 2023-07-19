@extends('App')
@section('content')
    @include('Navbar.Navbar')
    <div class="px-2 left-0 md:ml-60">
        @yield('Dashboard')
    </div>
@endsection
