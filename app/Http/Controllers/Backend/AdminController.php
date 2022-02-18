<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.home', [
            'menu'      => 'manajemenData',
            'menuList'  => 'admin',
            'admins'    => Admin::with('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.create', [
            'menu'      => 'manajemenData',
            'menuList'  => 'admin',
            'roles'     => Role::whereNotIn('name', ['Tamu'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'  => 'required|unique:users',
            'email'     => 'required|unique:users|email',
            'password'  => 'required|confirmed',
            'fullName'  => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'avatar'    => 'required|mimes:jpg,png,bmp|file|max:2048'
        ]);

        $fileName = time().'.'.$request->avatar->extension();  
     
        $request->avatar->move(public_path('uploads'), $fileName);

        $user = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $user->admin()->create([
            'fullName'  => $request->fullName,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'avatar'    => $fileName
        ]);

        $user->assignRole($request->roles);

        return redirect('backend/admin')->with('success', 'Selamat! Data baru berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.admin.detail', [
            'menu'      => 'manajemenData',
            'menuList'  => 'admin',
            'admin'     => Admin::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
