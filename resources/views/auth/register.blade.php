@extends('layouts.app')

@section('content')
<div class="container flex justify-center">
    <div class="px-32 py-4 bg-gray-200 w-2/4">
                <div class="font-bold text-lg mb-4">{{ __('Register') }}</div>
                    <form  method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>

                                <input class="border border-gray-400 p-2 w-full" id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="text-red-500 text-xs mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>


                        <div class="mb-6">
                            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Name
                            </label>
                            <input class="border border-gray-400 p-2 w-full" id="name" type="text"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="border border-gray-400 p-2 w-full" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Password') }}</label>
                                <input id="password" type="password" class="border border-gray-400 p-2 w-full" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="text-red-500 text-xs mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password_confirmation" class="block mb-2 uppercase text-xs font-bold text-gray-700">{{ __('Confirm Password') }}</label>


                            <input id="password_confirmation" type="password" class="border border-gray-400 p-2 w-full" name="password_confirmation" required autocomplete="new-password">
                        </div>

                                <button type="submit" class="px-6 py-4 rounded text-sm uppercase bg-blue-600 text-white">
                                    Register
                                </button>
                    </form>
    </div>
</div>
@endsection
