@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-2xl border border-gray-200 p-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-4">
                {{ __('Reset Password') }}
            </h2>

            @if (session('status'))
                <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email Field --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Email Address') }}
                    </label>
                    <input id="email" type="email"
                           class="px-4 py-3 hs-input block w-full rounded-lg border border-gray-300 focus:border-blue-500
                           focus:ring-blue-500 @error('email') border-red-500 @enderror"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full py-2 mt-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700
                        transition-all hs-button">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
