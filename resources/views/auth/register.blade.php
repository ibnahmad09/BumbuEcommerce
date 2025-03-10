@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md mx-auto">
        <h2 class="text-3xl font-bold text-green-600 mb-6 text-center">Daftar ke BumbuMasak</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input id="name" type="text" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('name') border-red-500 @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                <input id="email" type="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('email') border-red-500 @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input id="password" type="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('password') border-red-500 @enderror"
                       name="password" required autocomplete="new-password">

                @error('password')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                <input id="password-confirm" type="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600"
                       name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="mb-6">
                <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">
                    Daftar
                </button>
            </div>

            <div class="mb-6">
                <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">
                    Daftar
                </button>
            </div>

            <div class="mb-6">
                <a href="{{ route('google.login') }}"
                   class="w-full flex items-center justify-center bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.24 10.285V14.4h6.806c-.275 1.767-2.056 5.16-6.806 5.16-4.095 0-7.439-3.393-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/>
                    </svg>
                    Daftar dengan Google
                </a>
            </div>

            <div class="mt-6 border-t border-gray-200 pt-6 text-center">
                <p class="text-sm text-gray-600">Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-green-600 hover:text-green-700 font-medium">
                        Masuk disini
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
