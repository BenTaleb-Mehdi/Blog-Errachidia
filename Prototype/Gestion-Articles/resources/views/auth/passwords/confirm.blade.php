@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-2xl border border-gray-200 p-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-3">
                {{ __('Confirm Password') }}
            </h2>

            <p class="text-gray-600 text-sm mb-5">
                {{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Password') }}
                    </label>

                    <input id="password" type="password"
                        class="hs-input block w-full rounded-lg border-gray-300 focus:border-blue-500
                        focus:ring-blue-500 @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700
                        transition-all hs-button">
                    {{ __('Confirm Password') }}
                </button>

                {{-- Forgot Password --}}
                @if (Route::has('password.request'))
                    <div class="mt-4 text-center">
                        <a href="{{ route('password.request') }}"
                           class="text-blue-600 hover:text-blue-700 text-sm">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </form>

        </div>
    </div>
</div>
@endsection
