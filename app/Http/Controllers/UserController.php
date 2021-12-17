<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all();
        return view('manajemen-user.manajemen-user', [
            'datas'=> $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajemen-user.tambah-manajemen-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->all();
        User::create([
            'nama'=> $data['nama'],
            'email'=> $data['email'],
            'password'=>bcrypt($data['password']),
            'nip_nis'=>$data['nip_nis'],
            'role'=>$data['role']
        ]);
        return redirect('manajemen-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('manajemen-user.edit-manajemen-user',
        compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request ->all();
        $user = User::find($id);
        $user->update([
            'nama'=> $data['nama'],
            'email'=> $data['email'],
            'password'=>bcrypt($data['password']),
            'nip_nis'=>$data['nip_nis'],
            'role'=>$data['role']
        ]);
        if($user['password'] !== null) {
            $user->update(['password' => bcrypt($data['password'])]);
        }
        return redirect('manajemen-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('manajemen-user');
    }
}
