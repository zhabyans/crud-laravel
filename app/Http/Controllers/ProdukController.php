<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $a = Produk::latest()->paginate(5);

        return view('produk.index', compact('a'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('produk.creates');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required'
        ]);

        Produk::create($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Produk telah ditambahkan');
    }

    public function edit(Produk $project)
    {
        return view('produk.edit', compact('project'));
    }

    public function update(Request $request, Produk $project)
    {
        $request->validate([
            'nama_produk' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required'
        ]);
        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Produk telah diperbarui');
    }

    public function destroy(Produk $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Produk telah dihapus');
    }
}