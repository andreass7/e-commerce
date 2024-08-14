<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.produk.produk', compact('products'), [
            'title' => 'Produk-Admin',
        ]);
    }
    public function store(Request $request)
    {
        // Validasi form, termasuk file upload
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:aktif,tidak aktif',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        // Menyimpan data produk ke database
        Product::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.produk.produk')->with('success', 'Product created successfully.');
    }
    // Menampilkan form edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Menyimpan perubahan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:aktif,tidak aktif',
            'price' => 'required|numeric',
            'image' => 'nullable|string', // Periksa file jika diperlukan
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('admin.produk.produk')->with('success', 'Product updated successfully.');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['success' => true]);
    }
}
