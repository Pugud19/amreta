<?php

namespace App\Http\Controllers;

use App\Models\Internet;
use Illuminate\Http\Request;

class InternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Tampil data from database internet
        $internet = Internet::latest()->paginate(5);

        return view('admin.internet.index', compact('internet'))
        ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tambah input ke form
        return view('admin.internet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // Proses input data gedung with foto
           $request->validate([
            'kode' => 'required|unique:gedung,kode|max:6',
            'nama' => 'required|max:225',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function show(Internet $internet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function edit(Internet $internet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internet $internet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internet $internet)
    {
        //
    }
}
