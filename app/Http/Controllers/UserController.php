<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view ('dashboard.employee.index', [
    //         'title' => 'Dashboard | Add Empolyees',
    //         'divisions' => Division::all(),
    //         'users' => User::all()
    //     ]);
    // }

    public function index()
{
    $users = User::where('id', '!=', auth()->user()->id)->with('division')->get(); // Mengecualikan pengguna yang sedang login
    return view('dashboard.employee.index', compact('users'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.employee.create', [
            'title' => 'Dashboard | Add Empolyees',
            'divisions' => Division::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = [
            'name' => $request->name,
            'divisions_id' => $request->divisions_id,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        $validatedData['password'] = bcrypt($request->input('password'));
        // dd($validatedData);

        User::insert($validatedData);

        return redirect('/dashboard/employee')->with('success', 'Users have been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view ('dashboard.employee.show', [
            'title' => 'Dashboard | Add Empolyees',
            'divisions' => Division::all(),
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view ('dashboard.employee.edit', [
            'title' => 'Dashboard | Edit Empolyees',
            'divisions' => Division::all(),
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'divisions_id' => 'required',
            'address' => 'required',
            'phonenumber' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'nullable',
        ];

        $validatedData = $request->validate($rules);

        if (is_null($validatedData['password']) || $validatedData['password'] === '') {
            $validatedData['password'] = $user->password;
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/employee')->with('success', 'User data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/employee')->with('success', 'User has been deleted!');
    }
}
