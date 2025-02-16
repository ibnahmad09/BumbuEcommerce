@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar Profil -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto mb-4 relative">
                        <img src="{{ asset('images/default-avatar.png') }}" alt="User Avatar"
                             class="w-full h-full rounded-full object-cover border-4 border-green-100">
                        <button class="absolute bottom-0 right-0 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Form Edit Profil -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Profil</h2>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-500 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('name') border-red-500 @enderror">
                            @error('name')
                                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-500 mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('email') border-red-500 @enderror">
                            @error('email')
                                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-500 mb-2">Nomor Telepon</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-500 mb-2">Alamat</label>
                            <textarea name="address" id="address" rows="3"
                                      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600 @error('address') border-red-500 @enderror">{{ old('address', auth()->user()->address) }}</textarea>
                            @error('address')
                                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
