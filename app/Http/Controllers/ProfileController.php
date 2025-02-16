<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    // Menampilkan halaman profil
    public function index()
    {
        $user = auth()->user();
        $totalOrders = $user->orders()->count();
        $completedOrders = $user->orders()->where('status', 'completed')->count();
        $processingOrders = $user->orders()->where('status', 'processing')->count();
        $totalSpent = $user->orders()->where('status', 'completed')->sum('total_price');

        return view('user.profile.index', compact(
            'user',
            'totalOrders',
            'completedOrders',
            'processingOrders',
            'totalSpent'
        ));
    }

    // Menampilkan form edit profil
    public function edit()
    {
        return view('user.profile.edit', ['user' => auth()->user()]);
    }

    // Update data profil
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['name', 'email', 'phone', 'address']));

        return redirect()->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui');
    }

    // Menampilkan halaman keamanan akun
    public function security()
    {
        return view('user.profile.security');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        auth()->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui');
    }
}
