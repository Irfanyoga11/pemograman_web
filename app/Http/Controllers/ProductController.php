<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();  // Ambil semua produk
        return view('products.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan produk baru ke dalam database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
