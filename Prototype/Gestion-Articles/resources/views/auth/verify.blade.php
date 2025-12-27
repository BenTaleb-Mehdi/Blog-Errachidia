@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-10 bg-gradient-to-br from-gray-100 to-gray-200">

    <div class="w-full max-w-md bg-white/40 backdrop-blur-xl border border-white/30 shadow-xl rounded-2xl p-8">

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">
            {{ __('Verify Your Email Address') }}
        </h2>

        <!-- Success Message -->
        @if (session('resent'))
            <div class="mb-4 p-3 text-green-800 bg-green-100 border border-green-300 rounded-lg text-sm">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <!-- Text -->
        <p class="text-gray-700 mb-3 leading-relaxed">
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>

        <p class="text-gray-700 mb-6">
            {{ __('If you did not receive the email') }},
        </p>

        <!-- Resend Form -->
        <form method="POST" action="{{ route('verification.resend') }}" class="text-center">
            @csrf
            <button type="submit"
                class="text-blue-600 hover:text-blue-800 font-semibold underline underline-offset-2 transition">
                {{ __('click here to request another') }}
            </button>
        </form>

    </div>

</div>
@endsection
