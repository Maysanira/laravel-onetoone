<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\telepon;
use Illuminate\Support\Facades\Storage;


class PenggunaController extends Controller
{
    public function index()
    {
    	// mengambil semua data pengguna
    	$pengguna = Pengguna::all();
	// dd($pengguna);
    	// return data ke view
		return view('pengguna.pengguna', compact('pengguna'));
    }

	public function create()
    {
        return view('pengguna.create');
    }
	
	public function store(Request $request)
    {
         //validate form
		 $this->validate($request, [
            'nama'     => 'required|min:1',
            'nomortelepon'   => 'required|min:1'
        ]);
		
		//create post
        $pengguna = pengguna::create([
            'nama'      => $request->nama,
            'nomortelepon'   => $request->nomortelepon
        ]);

		$nomortelepon = telepon::create([
		'pengguna_id'      => $pengguna->id,
		'nomortelepon'   => $request->nomortelepon
		]);
		
        //redirect to index
        return redirect()->route('pengguna.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
	
	public function edit(Post $post)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

}
