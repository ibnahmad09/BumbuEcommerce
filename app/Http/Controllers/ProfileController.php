<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\UserAddress;

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
        $addresses = $user->addresses; // Ambil data alamat pengguna

        return view('user.profile.index', compact('user', 'totalOrders', 'completedOrders', 'processingOrders', 'totalSpent', 'addresses'));
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
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['name', 'email', 'phone', 'address']));

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
    }

    public function address()
    {
        $addresses = auth()->user()->addresses;
        return view('user.profile.index', compact('addresses'));
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'full_address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        auth()->user()->addresses()->create($request->all());

        return redirect()->back()->with('success', 'Alamat berhasil ditambahkan');
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

        auth()
            ->user()
            ->update([
                'password' => Hash::make($request->password),
            ]);

        return back()->with('success', 'Password berhasil diperbarui');
    }

    public function editAddress(UserAddress $address)
    {
        // Pastikan alamat milik user yang sedang login
        if ($address->user_id !== auth()->id()) {
            abort(403);
        }

        return response()->json($address);
    }

    public function updateAddress(Request $request, UserAddress $address)
    {
        // Pastikan alamat milik user yang sedang login
        if ($address->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'label' => 'required|string|max:255',
            'full_address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $address->update($request->all());

        return response()->json(['success' => true]);
    }
}
