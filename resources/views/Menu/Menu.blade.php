<ul class="menu bg-sky-900 h-screen w-56">

    <li class=" font-semibold text-white text-xl  {{ Auth::user()->jabatan == 'Admin' ? '' : 'hidden' }}">
        <details {{ $panel == 'aset' ? 'open' : '' }}>
            <summary> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048">
                    <path fill="currentColor"
                        d="M1792 1280h256v768H1024v-768h256v-256h512v256zm-384-128v128h256v-128h-256zm512 768v-256h-128v128h-128v-128h-256v128h-128v-128h-128v256h768zm0-384v-128h-768v128h768zm-768-512v128H896v256H640v-128h128v-128H512v256H0V640h128V128h1536v768h-128V256H256v384h256v384h640zm-768 256V768H128v512h256z" />
                </svg>Aset</summary>
            <ul>

                <li><a href="{{ route('aset.komponen.index') }}">Komponen ME</a></li>
                <li><a href="{{ route('aset.alat.index') }}">Alat</a></li>
                <li><a href="{{ route('aset.bahan.index') }}">Bahan</a></li>

            </ul>
        </details>
    </li>
    <li class=" font-semibold text-white text-xl {{ Auth::user()->jabatan == 'Admin' ? '' : 'hidden' }}">
        <details {{ $panel == 'user' ? 'open' : '' }}>
            <summary>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048">
                    <path fill="currentColor"
                        d="M2048 1792h-227q48 53 73 118t26 138h-128q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100h-128q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100H512q0-52 14-102t39-93t63-80t83-61q-34-35-52-81t-19-95q0-69 34-127t94-93v-292q0-30 13-57t38-45q-55-73-135-113t-172-41q-80 0-149 30t-122 82t-83 123t-30 149H0q0-73 20-141t57-129t91-108t118-81q-75-54-116-135t-42-174q0-79 30-149t82-122t122-83T512 0q79 0 149 30t122 82t83 123t30 149q0 93-41 174T738 694q68 34 123 85t94 117h357q31 0 54-9t43-24t41-31t46-31t58-23t78-10h288q27 0 50 10t40 27t28 41t10 50v896zM512 640q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20zm384 1024q27 0 50-10t40-27t28-41t10-50q0-27-10-50t-27-40t-41-28t-50-10q-27 0-50 10t-40 27t-28 41t-10 50q0 27 10 50t27 40t41 28t50 10zm640 0q27 0 50-10t40-27t28-41t10-50q0-27-10-50t-27-40t-41-28t-50-10q-27 0-50 10t-40 27t-28 41t-10 50q0 27 10 50t27 40t41 28t50 10zm384-512h-288q-45 0-78-9t-58-24t-45-31t-41-31t-44-23t-54-10H896v256q53 0 99 20t82 55t55 81t20 100q0 49-18 95t-53 81q83 46 135 124q52-78 135-124q-34-35-52-81t-19-95q0-53 20-99t55-82t81-55t100-20q53 0 99 20t82 55t55 81t20 100q0 34-9 66t-27 62h164v-512zm0-256h-288q-23 0-41 5t-34 13t-31 20t-32 26q16 14 31 25t32 20t34 14t41 5h288V896z" />
                </svg>
                User
            </summary>
            <ul>

                <li><a href="{{ route('user.role.index') }}">Role</a></li>

            </ul>
        </details>
    </li>
    <li class=" font-semibold text-white text-xl">
        <details {{ $panel == 'pemeliharaan' ? 'open' : '' }}>
            <summary>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                    <path fill="currentColor"
                        d="m8.914 24.5l4.257-4.257l-1.414-1.414L7.5 23.086l-.793-.793a1 1 0 0 0-1.414 0l-4 4a1 1 0 0 0 0 1.414l3 3a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414ZM5 28.586L3.414 27L6 24.414L7.586 26Z" />
                    <path fill="currentColor"
                        d="M24 30a6.007 6.007 0 0 1-6-6a5.84 5.84 0 0 1 .21-1.547L9.548 13.79A5.848 5.848 0 0 1 8 14a5.976 5.976 0 0 1-5.577-8.184l.558-1.421l3.312 3.312a1.023 1.023 0 0 0 1.413 0a.999.999 0 0 0 0-1.414L4.395 2.979l1.423-.557A5.977 5.977 0 0 1 14 8a5.84 5.84 0 0 1-.21 1.547l8.663 8.663A5.855 5.855 0 0 1 24 18a5.976 5.976 0 0 1 5.577 8.184l-.557 1.421l-3.313-3.312a1.023 1.023 0 0 0-1.413 0a.999.999 0 0 0-.001 1.414l3.313 3.313l-1.422.558A5.96 5.96 0 0 1 24 30ZM10.062 11.476l10.461 10.461l-.239.61a3.975 3.975 0 0 0 3.466 5.445l-.871-.87a3 3 0 0 1 0-4.243a3.072 3.072 0 0 1 4.243 0l.87.871a3.976 3.976 0 0 0-5.446-3.466l-.609.239l-10.46-10.46l.24-.61A3.975 3.975 0 0 0 8.25 4.008l.87.87a3 3 0 0 1 0 4.243a3.072 3.072 0 0 1-4.243 0l-.87-.871a3.975 3.975 0 0 0 5.445 3.466Z" />
                    <path fill="currentColor"
                        d="M29.123 2.85a3.072 3.072 0 0 0-4.243 0l-7.48 7.48l1.414 1.414l7.48-7.48a1.024 1.024 0 0 1 1.414 0a1.002 1.002 0 0 1 0 1.414l-7.48 7.48l1.414 1.415l7.48-7.48a3.003 3.003 0 0 0 0-4.243Z" />
                </svg>
                Pemeliharaan
            </summary>
            <ul>

                <li><a class="{{ Auth::user()->jabatan == 'Admin' ? '' : 'hidden' }}"
                        href="{{ route('pemeliharaan.kegiatan.index') }}">Kegeiatan</a></li>
                <li><a href="{{ route('pemeliharaan.komplain.index') }}">Komplain</a></li>
                <li><a {{ Auth::user()->jabatan == 'Karyawan'  ? 'hidden' : '' }}
                        href="{{ route('pemeliharaan.penanganan.index') }}">Penanganan</a></li>
                <li><a class=" {{ Auth::user()->jabatan == 'Karyawan' ? 'hidden' : '' }}"
                        href="{{ route('pemeliharaan.pelaporan.index') }}">Pelaporan</a></li>

            </ul>
        </details>
    </li>


    <div class=" md:hidden">
        @include('Avatar.Avatar')

    </div>



</ul>
