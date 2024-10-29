<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Division; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $divisions = Division::all(); // Ambil semua divisi
        return view('pages.register', [
            "title" => "Register",
            "divisions" => $divisions // Kirim divisi ke tampilan
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data form
        $request->validate([
            'name' => 'required|string|max:255',
            'divisions_id' => 'required|integer|exists:divisions,divisions_id',
            'address' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        User::create([
            'name' => $request->name,
            'divisions_id' => $request->divisions_id,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login atau halaman lain
        return redirect('/users')->with('success', 'Registration successful!');
    }
}
