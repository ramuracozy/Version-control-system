<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Tambah Produk') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-slate-900 font-bold text-2xl mb-5">Tambah Produk Baru</h1>
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="oldImg" value="{{ $product->gambar }}">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="gambar" class="form-label text-sm">Gambar</label>
                    <input type="file" class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:cursor-pointer w-full file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100" id="gambar" name="gambar" />
                    @error('gambar')
                      <div class="text-red-500">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <label for="nama" class="form-label text-sm">Nama Produk</label>
                  <input type="text" class="form-control text-sm w-full rounded-md border-0 h-[45px] bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600 @error('nama') invalid:bg-red-500 @enderror" id="nama" name="nama" value="{{ $product->nama }}" required />
                  @error('nama')
                    <div class="text-red-500">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="jenis_produk_id" class="form-label text-sm">Jenis Produk</label>
                  <select name="jenis_produk_id" id="jenis_produk_id" class="form-control text-sm w-full rounded-md border-0 h-[45px] bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600">
                    @foreach ($jenisProduct as $jenis)
                      <option {{ ($product->jenisProduk->id === $jenis->id) ? 'selected' : '' }} value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="flex items-center w-full gap-2">
                  <div class="mb-3 w-full">
                    <label for="stok" class="form-label text-sm">Stok</label>
                    <input type="number" class="form-control text-sm w-full rounded-md border-0 h-[45px] bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600 @error('stok') invalid:bg-red-500 @enderror" id="stok" name="stok" value="{{ $product->stok }}" required />
                    @error('stok')
                      <div class="text-red-500">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3 w-full">
                    <label for="min_stok" class="form-label text-sm">Min Stok</label>
                    <input type="number" class="form-control text-sm w-full rounded-md border-0 h-[45px] bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600 @error('min_stok') invalid:bg-red-500 @enderror" id="min_stok" name="min_stok" value="{{ $product->min_stok }}" required />
                    @error('min_stok')
                      <div class="text-red-500">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="mb-3">
                  <label for="harga" class="form-label text-sm">Harga</label>
                  <input type="number" class="form-control text-sm w-full rounded-md border-0 h-[45px] bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600 @error('harga') invalid:bg-red-500 @enderror" id="harga" name="harga" value="{{ $product->harga }}" required />
                  @error('harga')
                    <div class="text-red-500">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label text-sm">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" cols="20" rows="10" class="form-control text-sm w-full rounded-md border-0 bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600 resize-none @error('deskripsi') invalid:bg-red-500 @enderror" required>{{ $product->deskripsi }}</textarea>
                  @error('deskripsi')
                    <div class="text-red-500">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white rounded-md p-2 transition-color duration-150">Simpan Perubahan</button>
              </form>
            </div>
          </div>
      </div>
  </div>
</x-app-layout>