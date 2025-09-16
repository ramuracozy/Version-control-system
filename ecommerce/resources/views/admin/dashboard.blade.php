<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <h1 class="mb-5 font-bold text-3xl">Hello, {{ Auth::user()->name }}</h1>

          <div class="grid grid-cols-2 gap-4 mb-5">
            <div class="bg-white overflow-hidden flex items-start shadow-sm sm:rounded-lg p-6">
              <div class="icon bg-slate-100 w-16 h-full flex items-center justify-center rounded-md">
                <i class="fa-solid fa-box-open fa-lg"></i>
              </div>
              <div class="ml-4">
                <h1 class="text-slate-500 font-bold">Total Produk</h1>
                <h1 class="text-slate-900 font-bold text-4xl">{{ count($products) }}</h1>
              </div>
            </div>
            <div class="bg-white overflow-hidden flex items-start shadow-sm sm:rounded-lg p-6">
              <div class="icon bg-slate-100 w-16 h-full flex items-center justify-center rounded-md">
                <i class="fa-solid fa-star fa-lg"></i>
              </div>
              <div class="ml-4">
                <h1 class="text-slate-500 font-bold">Total Testimoni</h1>
                <h1 class="text-slate-900 font-bold text-4xl">{{ count($testimonis) }}</h1>
              </div>
            </div>
          </div>

          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <div class="flex items-center justify-between mb-5">
                <h1 class="text-slate-900 font-bold text-2xl">List Produk</h1>
                <a href="/admin/dashboard/add-product" class="text-sm p-2 bg-slate-900 rounded-sm hover:bg-slate-800 transition-colors duration-150 text-white">Tambah Produk</a>
              </div>
                <div class="overflow-x-auto">
                  <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                      <tr>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">No</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Gambar</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Nama Produk</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Jenis Produk</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Stok</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Harga</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Jumlah Rating</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Deskripsi</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Action</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                      @if (count($products) == 0)
                        <tr>
                          <td colspan="8">
                            <div class="p-2 whitespace-nowrap text-center">Tidak ada data</div>
                          </td>
                        </tr>
                      @else
                        @foreach ($products as $product)
                          <tr class="text-center">
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $loop->iteration }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <img src="{{ asset('storage/'.$product->gambar) }}" width="75" alt="product-image">
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $product->nama }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $product->jenisProduk->nama }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ number_format($product->stok) }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">Rp {{ number_format($product->harga) }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $product->rating }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap max-w-32">
                              <div class="text-left overflow-hidden overflow-ellipsis">{{ $product->deskripsi }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap max-w-32">
                              <div class="flex gap-2 items-center">
                                <a href="/admin/dashboard/edit-product/{{ $product->id }}" class="py-1 px-2 bg-slate-100 text-slate-500 hover:bg-slate-200 transition-color duration-150 rounded-sm">Edit</a>
                                /
                                <form action="/admin/dashboard/delete-product" method="post">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $product->id }}">
                                  <button type="submit" class="py-1 px-2 bg-red-100 text-red-500 hover:bg-red-200 transition-color duration-150 rounded-sm">Delete</button>
                                </form>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
              </div>
          </div>

          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
            <div class="p-6 text-gray-900">
              <div class="flex items-center justify-between mb-5">
                <h1 class="text-slate-900 font-bold text-2xl">List Testimoni</h1>
              </div>
                <div class="overflow-x-auto">
                  <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                      <tr>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">No</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Nama Tokoh</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Kategori</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Tanggal</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Rating</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                          <div class="text-left font-semibold">Komentar</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                      @if (count($testimonis) == 0)
                        <tr>
                          <td colspan="8">
                            <div class="p-2 whitespace-nowrap text-center">Tidak ada data</div>
                          </td>
                        </tr>
                      @else
                        @foreach ($testimonis as $testimoni)
                          <tr class="text-center">
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $loop->iteration }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $testimoni->nama_tokoh }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $testimoni->kategoriTokoh->nama }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $testimoni->tanggal }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                              <div class="text-left">{{ $testimoni->rating }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap max-w-32">
                              <div class="text-left overflow-hidden overflow-ellipsis">{{ $testimoni->komentar }}</div>
                            </td>
                          </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                    {{ $testimonis->links() }}
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>