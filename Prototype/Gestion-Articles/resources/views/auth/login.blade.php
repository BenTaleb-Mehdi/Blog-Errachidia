@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-10 bg-gradient-to-br  ">

    <div class="w-full max-w-md bg-white backdrop-blur-xl border border-white/30 shadow-xl rounded-2xl p-8">
        
        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">
            {{ __('Login') }}
        </h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-1">
                    {{ __('Email Address') }}
                </label>
                <input id="email" type="email"
                    class="block w-full px-4 py-2 rounded-lg border @error('email') border-red-500 @else border-gray-300 @enderror
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/70 backdrop-blur-md"
                    name="email" value="{{ old('email') }}" required autofocus>

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-1">
                    {{ __('Password') }}
                </label>
                <input id="password" type="password"
                    class="block w-full px-4 py-2 rounded-lg border @error('password') border-red-500 @else border-gray-300 @enderror
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/70 backdrop-blur-md"
                    name="password" required>

                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" id="remember"
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="ml-2 text-gray-700">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <!-- Submit + Forgot Password -->
            <div class="flex flex-col gap-3 mt-6">
                <button type="submit"
                    class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-center text-blue-600 hover:text-blue-800 text-sm">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

        </form>
    </div>

</div>
@endsection
