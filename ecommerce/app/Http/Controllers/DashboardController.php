<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Produk;
use App\Models\Testimoni;
use App\Models\KategoriTokoh;

class DashboardController extends Controller
{
    public function dashboard() {
        $products = Produk::paginate(8);
        return view('dashboard', ['products' => $products]);
    }

    public function productDetail($id){
        $product = Produk::where('id', $id)->first();
        $testimonis = Testimoni::where('produk_id', $id)->paginate(5);
        $kategoriTokoh = KategoriTokoh::all();
        return view('product-detail', ['product' => $product, 'testimonis' => $testimonis, 'kategoriTokoh' => $kategoriTokoh]);
    }

    public function storeTestimoni(Request $request) {
        $validated = $request->validate([
            'nama_tokoh' => 'required',
            'rating' => 'required',
            'komentar' => 'required',
        ]);
        
        $ratingCount = Testimoni::where('produk_id', $request->produk_id)->count();

        $now = Carbon::now()->format('Y-m-d');
        $validated['tanggal'] = $now;
        $validated['produk_id'] = $request->produk_id;
        $validated['kategori_tokoh_id'] = $request->kategori_tokoh_id;
        
        try {
            Testimoni::create($validated);
            Produk::where('id', $request->produk_id)->update([
                'rating' => $ratingCount + 1
            ]);
            return back()->with('success', 'Testimoni berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
