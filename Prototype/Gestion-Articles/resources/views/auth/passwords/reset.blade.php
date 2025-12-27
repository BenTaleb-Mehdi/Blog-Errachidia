@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-10 bg-gradient-to-br from-gray-100 to-gray-200">

    <div class="w-full max-w-md bg-white/40 backdrop-blur-xl border border-white/30 shadow-xl rounded-2xl p-8">

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">
            {{ __('Reset Password') }}
        </h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-1">
                    {{ __('Email Address') }}
                </label>

                <input id="email" type="email"
                    class="block w-full px-4 py-2 rounded-lg border
                    @error('email') border-red-500 @else border-gray-300 @enderror
                    bg-white/70 backdrop-blur-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                    class="block w-full px-4 py-2 rounded-lg border
                    @error('password') border-red-500 @else border-gray-300 @enderror
                    bg-white/70 backdrop-blur-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password-confirm" class="block text-gray-700 font-medium mb-1">
                    {{ __('Confirm Password') }}
                </label>

                <input id="password-confirm" type="password"
                    class="block w-full px-4 py-2 rounded-lg border border-gray-300
                    bg-white/70 backdrop-blur-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    name="password_confirmation" required autocomplete="new-password">
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                {{ __('Reset Password') }}
            </button>

        </form>

    </div>

</div>
@endsection
