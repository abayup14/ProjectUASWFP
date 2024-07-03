<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function listMember() {
        $member = User::select(DB::raw("*"))
            ->where("role", "=", "Pelanggan")
            ->get();

        return view("member.listmember", compact("member"));
    }

    public function changeMember($id, $new_member) {
        $edit_member = User::find($id);
        $edit_member->member = $new_member;
        $edit_member->save();

        return redirect()->back()->with("status", "Berhasil Ubah Tipe Member");
    }
}
