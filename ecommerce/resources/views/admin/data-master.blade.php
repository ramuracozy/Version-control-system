<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Jenis Produk --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">
          <div class="p-6 text-gray-900">
            <div class="flex items-center justify-between mb-5">
              <h1 class="text-slate-900 font-bold text-2xl">List Jenis Produk</h1>
              <a href="/admin/data-master/add-jenis-product" class="text-sm p-2 bg-slate-900 rounded-sm hover:bg-slate-800 transition-colors duration-150 text-white">Tambah Data</a>
            </div>
              <div class="overflow-x-auto">
                <table class="table-auto w-full">
                  <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                      <th class="p-2 whitespace-nowrap">
                        <div class="text-left font-semibold">ID</div>
                      </th>
                      <th class="p-2 whitespace-nowrap">
                        <div class="text-left font-semibold">Nama Jenis Produk</div>
                      </th>
                      <th class="p-2 whitespace-nowrap">
                        <div class="text-left font-semibold">Action</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="text-sm divide-y divide-gray-100">
                    @if (count($jenisProduct) == 0)
                      <tr>
                        <td colspan="3">
                          <div class="p-2 whitespace-nowrap text-center">Tidak ada data</div>
                        </td>
                      </tr>
                    @else
                    @foreach ($jenisProduct as $prod)
                      <tr class="text-center">
                        <td class="p-2 whitespace-nowrap">
                          <div class="text-left">{{ $prod->id }}</div>
                        </td>
                        <td class="p-2 whitespace-nowrap">
                          <div class="text-left">{{ $prod->nama }}</div>
                        </td>
                        <td class="p-2 whitespace-nowrap max-w-32">
                          <div class="flex gap-2 items-center">
                            <a href="/admin/data-master/edit-jenis-product/{{ $prod->id }}" class="py-1 px-2 bg-slate-100 text-slate-500 hover:bg-slate-200 transition-color duration-150 rounded-sm">Edit</a>
                            /
                            <form action="/admin/data-master/delete-jenis-product" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{ $prod->id }}">
                              <button type="submit" class="py-1 px-2 bg-red-100 text-red-500 hover:bg-red-200 transition-color duration-150 rounded-sm">Delete</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                {{ $jenisProduct->links() }}
              </div>
            </div>
        </div>

        {{-- Kategori Tokoh --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <div class="flex items-center justify-between mb-5">
              <h1 class="text-slate-900 font-bold text-2xl">List Kategori Tokoh</h1>
              <a href="/admin/data-master/add-kategori-tokoh" class="text-sm p-2 bg-slate-900 rounded-sm hover:bg-slate-800 transition-colors duration-150 text-white">Tambah Data</a>
            </div>
              <div class="overflow-x-auto">
                <table class="table-auto w-full">
                  <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                      <th class="p-2 whitespace-nowrap">
                        <div class="text-left font-semibold">ID</div>
                      </th>
                      <th class="p-2 whitespace-nowrap">
                        <div class="text-left font-semibold">Nama Kategori Tokoh</div>
                      </th>
                      <th class="p-2 whitespace-nowrap">
                        <div class="text-left font-semibold">Action</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="text-sm divide-y divide-gray-100">
                    @if (count($kategoriTokoh) == 0)
                    <tr>
                      <td colspan="3">
                        <div class="p-2 whitespace-nowrap text-center">Tidak ada data</div>
                      </td>
                    </tr>
                    @else
                    @foreach ($kategoriTokoh as $tokoh)
                      <tr class="text-center">
                        <td class="p-2 whitespace-nowrap">
                          <div class="text-left">{{ $tokoh->id }}</div>
                        </td>
                        <td class="p-2 whitespace-nowrap">
                          <div class="text-left">{{ $tokoh->nama }}</div>
                        </td>
                        <td class="p-2 whitespace-nowrap max-w-32">
                          <div class="flex gap-2 items-center">
                            <a href="/admin/data-master/edit-kategori-tokoh/{{ $tokoh->id }}" class="py-1 px-2 bg-slate-100 text-slate-500 hover:bg-slate-200 transition-color duration-150 rounded-sm">Edit</a>
                            /
                            <form action="/admin/data-master/delete-kategori-tokoh" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{ $tokoh->id }}">
                              <button type="submit" class="py-1 px-2 bg-red-100 text-red-500 hover:bg-red-200 transition-color duration-150 rounded-sm">Delete</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                {{ $kategoriTokoh->links() }}
              </div>
            </div>
        </div>
      </div>
  </div>
</x-app-layout>