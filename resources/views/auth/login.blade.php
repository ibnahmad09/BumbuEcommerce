@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md mx-auto">
        <h2 class="text-3xl font-bold text-green-600 mb-6 text-center">Masuk ke BumbuMasak</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                <input id="email" type="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('email') border-red-500 @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input id="password" type="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('password') border-red-500 @enderror" 
                       name="password" required autocomplete="current-password">

                @error('password')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6 flex items-center">
                <input class="form-check-input h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded" 
                       type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="ml-2 block text-sm text-gray-900" for="remember">
                    Ingat Saya
                </label>
            </div>

            <div class="mb-6">
                <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">
                    Masuk
                </button>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center">
                    <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:text-green-700">
                        Lupa Password?
                    </a>
                </div>
            @endif

            <div class="mt-6 border-t border-gray-200 pt-6 text-center">
                <p class="text-sm text-gray-600">Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-green-600 hover:text-green-700 font-medium">
                        Daftar disini
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
