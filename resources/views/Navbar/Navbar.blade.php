<div class="navbar bg-sky-900  w-full sticky top-0 z-30">
    <div class="dropdown dropdown-start md:hidden">
        <label tabindex="0" class="btn btn-ghost ">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <g id="feBar0" fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                    <g id="feBar1" fill="currentColor">
                        <path id="feBar2" d="M3 16h18v2H3v-2Zm0-5h18v2H3v-2Zm0-5h18v2H3V6Z" />
                    </g>
                </g>
            </svg>

        </label>
        <ul tabindex="0" class="mt-3 p-2 shadow menu menu-sm dropdown-content bg-blue-600 rounded-box w-fit">
            @include('Menu.Menu')

        </ul>
    </div>
    <div class="flex-1">

        <a href="{{ route('dashboard') }}" class="btn btn-ghost normal-case  text-sm lg:text-xl w-full h-fit">
            <img src="{{ asset('/img/Logo_pp.png') }}" alt="Logo SMA Negeri 1 Pabelan"
                class=" img-fluid h-10 md:h-16 rounded-xl ">
            <h1 class=" mx-auto text-xs md:text-4xl text-white font-bold ">SIMPPG ME Plaza</h1>
        </a>
    </div>
    <div class="flex-none gap-2 hidden md:inline ">

        <div class="dropdown dropdown-end ">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                        src="{{ Auth::user()->image != null ? asset('storage/' . Auth::user()->image) : asset('img/Admin.jpg') }}" />
                </div>
            </label>
            <ul tabindex="0" class="mt-3 p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                @include('Avatar.Avatar')
            </ul>
        </div>
    </div>
</div>
<div class=" hidden md:inline fixed z-10 ">
    @include('Menu.Menu')
</div>
