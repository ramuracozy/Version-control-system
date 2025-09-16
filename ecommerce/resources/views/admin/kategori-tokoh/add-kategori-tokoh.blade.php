<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Tambah Kategori Tokoh') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-slate-900 font-bold text-2xl mb-5">Tambah Kategori Tokoh</h1>
              <form action="" method="post">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label text-sm">Nama Kategori Tokoh</label>
                  <input type="text" class="form-control text-sm w-full rounded-md border-0 h-[45px] bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600 @error('nama') invalid:bg-red-500 @enderror" id="nama" name="nama" value="{{ old('nama') }}" required />
                  @error('nama')
                    <div class="text-red-500">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white rounded-md p-2 transition-color duration-150">Tambah Data</button>
              </form>
            </div>
          </div>
      </div>
  </div>
</x-app-layout>