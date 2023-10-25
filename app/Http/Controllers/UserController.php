<?php

 // Firdaus Akbar Amrullah 6706223004


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

use App\DataTables\UsersDataTable;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('user.daftarPengguna');
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function create()
    {
        return view("user.registrasi");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:1000'],
            'birthdate' => ['required', 'date'],
            'phoneNumber' => ['required', 'string', 'max:20'],
            'agama' => ['required', 'string', 'max:20'],
            'jenisKelamin' => ['required', 'numeric', 'in:0,1'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'phoneNumber' => $request->phoneNumber,
            'agama' => $request->agama,
            'jenisKelamin' => $request->jenisKelamin,
        ]);

        

        //Auth::login($user);

        return redirect()->route("user.daftarPengguna");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("user.infoPengguna", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users)
    {
        $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required',
            'birthdate' => 'required|date',
            'phoneNumber' => 'required',
            'agama' => 'required',
            'jenisKelamin' => 'required|in:0,1',
        ]);
        
        
        $affacted = DB::table('users')->where('id', $request->id)->update([
            'fullname' => $request->fullname, //Aman
            'password' => Hash::make($request->password),
            'address' => $request->address, 
            'phoneNumber' => $request->phoneNumber, 
        ]
        );
        // Redirect ke halaman yang sesuai, misalnya, halaman daftar koleksi
        return redirect()->route('user.daftarPengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
