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
	
	public function edit(pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }
    public function update(Request $request, pengguna $pengguna)
    {
            //validate form
             $this->validate($request, [
            'nama'          => 'required|min:1',
            'nomortelepon'  => 'required|min:2',
                
        ]);
             //update post without image
             $pengguna->update([
            'nama'     => $request->nama,
            'nomortelepon'   => $request->nomortelepon
        ]);
        $pengguna = new pengguna;
        $pengguna->nama = $pengguna->nama;
        $pengguna->nomortelepon = $request->nomortelepon;
        $pengguna->save();
    }

        public function show(pengguna $pengguna)
        {
           
            return view('pengguna.edit', compact('pengguna'));
        
        
        //redirect to index
         return redirect()->route('pengguna.penggguna')->with(['success' => 'Data Berhasil Diubah!']);
        }
    
    public function destroy(pengguna $pengguna)
    {
      
        Storage::delete('relasione/pengguna/');

        //delete post
        $pengguna->delete();

        //redirect to index
        return redirect()->route('pengguna.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}