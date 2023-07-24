@extends('App')
@section('content')
    <div class=" relative w-full items-center h-screen bg-neutral  ">
        <div
            class=" absolute bg-base-300 max-w-lg  w-full rounded-lg p-10 space-y-6 top-1/2 -translate-y-1/2  -translate-x-1/2 left-1/2 ">
            <p class="text-lg font-bold text-center  dark:text-gray-400">
                Masukan password baru
            </p>

            <form action="{{ route('password.reset', ['token' => $token]) }}" method="post" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <input
                    class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                    type="hidden" name="email" value="{{ request()->email }}" />
                <input
                    class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                    type="password" name="password" placeholder="Password" />
                <input
                    class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                    type="password" name="password_confirmation" placeholder="Confirm Password" />
                <div class="flex w-full items-center justify-center">

                    @error('password')
                        <span class="  text-[10px]  text-red-500">{{ $message }}</span>
                    @enderror
                    @error('token')
                        <span class=" text-[10px] text-center  text-red-500">{{ $message }}</span>
                    @enderror
                    @error('email')
                        <span class=" text-[10px] text-center  text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                        Reset password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
