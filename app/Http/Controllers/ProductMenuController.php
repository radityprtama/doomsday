<?php

namespace App\Http\Controllers;

use App\Models\ProductMenu;
use Illuminate\Http\Request;

class ProductMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil semua data produk menu dari database
        $produkmenu = ProductMenu::all();
        return view('produkmenu', compact('produkmenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampilkan form untuk menambahkan produk menu baru
        return view('produkmenu_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar_menu' => 'image|mimes:png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('gambar_menu')) {
            $image = $request->file('gambar_menu');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('menu-images', $imageName, 'public');
            $data['gambar_menu'] = 'menu-images/' . $imageName;
        }

        // menyimpan data produk menu ke database
        ProductMenu::create($data);


        // redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('produkmenu.index')
                        ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductMenu $productMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductMenu $produkmenu)
    {
        // menampilkan form edit dengan data produk menu yang dipilih
        return view('produk_edit', compact('produkmenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductMenu $produkmenu)
    {

        // validasi input dengan aturan yang sama seperti pada store
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // mengambil semua data input
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('gambar_menu')) {
            $image = $request->file('gambar_menu');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('menu-images', $imageName, 'public');
            $data['gambar_menu'] = 'menu-images/' . $imageName;
        }

        // memperbarui data produk menu di database
        $produkmenu->update($data);

        // redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('produkmenu.index')
                        ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductMenu $produkmenu)
    {
        // menghapus data produk menu dari database
        $produkmenu->delete();

        // redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('produkmenu.index')
                        ->with('success', 'Produk berhasil dihapus.');
    }
}
