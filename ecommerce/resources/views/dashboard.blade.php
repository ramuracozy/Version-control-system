<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-md">
              <div class="mx-auto max-w-2xl px-4 py-5 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Products</h2>
                
                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                  @foreach ($products as $product)
                    <div class="group relative">
                      <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="{{ asset('storage/'.$product->gambar) }}" alt="product-image" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                      </div>
                      <div class="mt-4 flex justify-between">
                        <div>
                          <h3 class="text-sm text-gray-700">
                            <a href="/dashboard/product-detail/{{ $product->id }}">
                              <span aria-hidden="true" class="absolute inset-0"></span>
                              {{ $product->nama }}
                            </a>
                          </h3>
                          <p class="mt-1 text-sm text-gray-500">Stok : {{ number_format($product->stok) }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">Rp {{ number_format($product->harga) }}</p>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
