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

        $telepon = new Telepon;
        $telepon->pengguna_id = $pengguna->id;
        $telepon->nomortelepon = $request->nomortelepon;
        $telepon->save();

		// $nomortelepon = telepon::create([
		// 'pengguna_id'      => $pengguna->id,
		// 'nomortelepon'   => $request->nomortelepon
		// ]);
		
        //redirect to index
        return redirect()->route('pengguna.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
	
	public function edit(pengguna $pengguna)
    {
        
        return view('pengguna.edit', compact('pengguna'));
    }
    public function update(Request $request, pengguna $pengguna)
    {
            // dd($request->all());
        //validate form
             $this->validate($request, [
            'nama'          => 'required|min:1',
            'nomortelepon'  => 'required|min:2',
                
        ]);
             //update post without image
             $pengguna->update([
            'nama'     => $request->nama,
           
        ]);
        // relasi dari tabel telepon ke tabel pengguna
        
        $telepon = telepon::where('pengguna_id', $pengguna->id)->update([
            'nomortelepon'   => $request->nomortelepon
        ]);
        //redirect to index
        return redirect()->route('pengguna.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

        public function show(pengguna $pengguna)
        {
           
            return view('pengguna.edit', compact('pengguna'));
        
        
        //redirect to index
         return redirect()->route('pengguna.pengguna')->with(['success' => 'Data Berhasil Diubah!']);
        }
    
    public function destroy(pengguna $pengguna)
    {
        //   dd($pengguna);
        
        //delete post
        $pengguna->delete();

        //redirect to index
        return redirect()->route('pengguna.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}