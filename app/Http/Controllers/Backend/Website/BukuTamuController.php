<?php 
namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{

    public function list()
    {
       $name = "buku Tamu";
        //Berita
        $bukutamu = BukuTamu::all();
        return view('backend.website.content.bukutamu.index', compact('name','bukutamu'));
    }
    // Display the form to create a new entry
    public function create()
    {
        return view('frontend.content.buku_tamu');
    }

    // Store the guest book entry
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'instansi' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'keperluan' => 'required|string',
        ]);

        BukuTamu::create($request->all());

        return redirect()->route('buku_tamu')->with('success', 'Data berhasil disimpan!');
    }

    // List all guest book entries
    public function index()
    {
        $bukuTamu = BukuTamu::all();
        return view('buku_tamu.index', compact('bukuTamu'));
    }
}
