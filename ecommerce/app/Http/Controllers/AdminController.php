<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Testimoni;
use App\Models\JenisProduk;
use App\Models\KategoriTokoh;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard() {
        $products = Produk::paginate(5);
        $testimonis = Testimoni::paginate(5);

        return view('admin.dashboard', [
            'products' => $products,
            'testimonis' => $testimonis
        ]);
    }

    public function addProduct() {
        $jenisProduct = JenisProduk::all();
        return view('admin.produk.add-product', ['jenisProduct' => $jenisProduct]);
    }

    public function editProduct($id) {
        $product = Produk::where('id', $id)->first();
        $jenisProduct = JenisProduk::all();
        return view('admin.produk.edit-product', ['jenisProduct' => $jenisProduct, 'product' => $product]);
    }

    public function storeProduct(Request $request) {
        $validated = $request->validate([
            'gambar' => 'required|image',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'min_stok' => 'required',
            'jenis_produk_id' => 'required',
            'deskripsi' => 'required'
        ]);

        $image = $request->file('gambar');
        $path = $image->store('images', 'public');
        $validated['kode'] = 'P-'.Str::upper(Str::random(8));
        $validated['gambar'] = $path;


        try {
            Produk::create($validated);
            return redirect('/admin/dashboard')->with('success', 'Berhasil menambah produk');
        } catch (\Exception $e) {
            return redirect('/admin/dashboard')->with('error', $e->getMessage());
        }
    }

    public function updateProduct(Request $request, $id, Produk $produk) {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'min_stok' => 'required',
            'jenis_produk_id' => 'required',
            'deskripsi' => 'required'
        ]);
        if ($request->hasFile('gambar')) {
            if($request->oldImg){
                Storage::disk('public')->delete($request->oldImg);
            }
            $image = $request->file('gambar');
            $path = $image->store('images', 'public');
            $validated['gambar'] = $path;
        }

        try {
            Produk::where('id', $id)->update($validated);
            return redirect('/admin/dashboard')->with('success', 'Produk berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/dashboard')->with('error', $e->getMessage());
        }
    }

    public function deleteProduct(Request $request) {
        try {
            Produk::where('id', $request->id)->delete();
            return redirect('/admin/dashboard')->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/admin/dashboard')->with('error', $e->getMessage());
        }
    }

    public function dataMaster() {
        $jenisProduct = JenisProduk::paginate(5);
        $kategoriTokoh = KategoriTokoh::paginate(5);

        return view('admin.data-master', [
            'jenisProduct' => $jenisProduct,
            'kategoriTokoh' => $kategoriTokoh
        ]);
    }

    public function addJenisProduct(){
        return view('admin.jenis-product.add-jenis-product');
    }

    public function editJenisProduct($id){
        $jenisProduct = JenisProduk::where('id', $id)->first();

        return view('admin.jenis-product.edit-jenis-product', ['jenisProduct' => $jenisProduct]);
    }

    public function storeJenisProduct(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        try {
            JenisProduk::create($validated);
            return redirect('/admin/data-master')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('/admin/data-master')->with('error', $e->getMessage());
        }
    }

    public function updateJenisProduct(Request $request, $id) {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        try {
            JenisProduk::where('id', $id)->update($validated);
            return redirect('/admin/data-master')->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/data-master')->with('error', $e->getMessage());
        }
    }

    public function deleteJenisProduct(Request $request) {
        try {
            JenisProduk::where('id', $request->id)->delete();
            return redirect('/admin/data-master')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/admin/data-master')->with('error', $e->getMessage());
        }
    }

    public function addKategoriTokoh(){
        return view('admin.kategori-tokoh.add-kategori-tokoh');
    }

    public function editKategoriTokoh($id){
        $kategoriTokoh = KategoriTokoh::where('id', $id)->first();

        return view('admin.kategori-tokoh.edit-kategori-tokoh', ['kategoriTokoh' => $kategoriTokoh]);
    }

    public function storeKategoriTokoh(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        try {
            KategoriTokoh::create($validated);
            return redirect('/admin/data-master')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('/admin/data-master')->with('error', $e->getMessage());
        }
    }

    public function updateKategoriTokoh(Request $request, $id) {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        try {
            KategoriTokoh::where('id', $id)->update($validated);
            return redirect('/admin/data-master')->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/data-master')->with('error', $e->getMessage());
        }
    }

    public function deleteKategoriTokoh(Request $request) {
        try {
            KategoriTokoh::where('id', $request->id)->delete();
            return redirect('/admin/data-master')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/admin/data-master')->with('error', $e->getMessage());
        }
    }
}
