<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function index()
    {
        // mendapatkan pengguna yang sedang login
        $user = auth()->user()->load('division'); // Menggunakan load untuk memuat relasi division

        return view('dashboard.profile.index', [
            "title" => "Dashboard | Profile",
            'active' => 'dashboard',
            'user' => $user, // Mengirim data pengguna ke view
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $divisions = Division::all(); // Ambil semua divisi

        return view('dashboard.profile.edit', [
            "title" => "Dashboard | Profile Edit",
            'user' => $user,
            'divisions' => $divisions, // Kirim data divisi ke view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'divisions_id' => 'required|integer|exists:divisions,divisions_id', // Validasi relasi divisi
            'address' => 'required|string|max:255',
            'phonenumber' => 'required|numeric',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id, // memastikan email unik untuk pengguna yang sama
        ];

        $validatedData = $request->validate($rules);

        // Set is_admin berdasarkan divisions_id
        $validatedData['is_admin'] = $validatedData['divisions_id'] == 3 ? 1 : 0;

        // Update data pengguna
        $user->update($validatedData);

        return redirect('/dashboard/profile')->with('success', 'User data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Logika untuk menghapus pengguna jika diperlukan
    }
}
