<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Detail Produk') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white rounded-md">
            <div class="mx-auto max-w-2xl px-4 py-5 sm:px-6 lg:max-w-7xl lg:px-8">
              <div class="grid grid-cols-2 gap-5">
                <div class="img">
                  <a href="/dashboard" class="underline"> << Back</a>
                  <img src="{{ asset('storage/'.$product->gambar) }}" alt="product-img">
                </div>
                <div class="detail">
                  <div class="flex items-center justify-between">
                    <h2 class="text-4xl font-bold tracking-tight text-gray-900">{{ $product->nama }}</h2>
                    <h1 class="text-3xl font-bold text-slate-900">Rp {{ number_format($product->harga) }}</h1>
                  </div>
                  <p class="text-base font-regular tracking-tight text-slate-900">Stok : {{ $product->stok }}</p>
                  <div class="deskripsi mt-10">
                    <h2 class="font-bold text-slate-900 text-xl">Deskripsi</h2>
                    <p class="text-xl font-regular tracking-tight text-slate-400">{{ $product->deskripsi }}</p>
                  </div>
                </div>
                <div class="rating">
                  <h1 class="text-2xl font-bold tracking-tight text-gray-900">Testimoni</h1>
                  @if (count($testimonis) == 0)
                    <p class="p-2 text-center w-full">Belum ada testimoni</p>
                  @else
                    <div class="mt-5">
                      @foreach ($testimonis as $testimoni)
                        <div class="pb-3 border-b">
                          <div class="flex items-center justify-between">
                            <div>
                              <h1 class="text-slate-900 font-bold -mb-1">{{ $testimoni->nama_tokoh }}</h1>
                              <p class="text-slate-500 font-regular text-sm">{{ $testimoni->kategoriTokoh->nama }}</p>
                            </div>
                            <p class="text-slate-500 font-bold text-sm">{{ $testimoni->rating }}/5 <i class="fa-solid fa-star"></i></p>
                          </div>
                          <p class="text-slate-900 font-regular text-sm mt-4">
                            {{ $testimoni->komentar }}
                          </p>
                        </div>
                      @endforeach
                      {{ $testimonis->links() }}
                    </div>
                  @endif
                </div>
                <div class="add-rating">
                  <h1 class="text-2xl font-bold tracking-tight text-gray-900">Buat Testimoni</h1>
                  <form action="{{ route('dashboard.add-testimoni') }}" method="post">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $product->id }}">
                    <div class="mb-3">
                      <label for="nama_tokoh" class="form-label text-sm">Nama</label>
                      <input type="text" class="form-control text-sm w-full rounded-md border-0 h-[45px] bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600 @error('nama_tokoh') invalid:bg-red-500 @enderror" id="nama_tokoh" name="nama_tokoh" value="{{ old('nama_tokoh') }}" required />
                      @error('nama_tokoh')
                        <div class="text-red-500">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="kategori_tokoh_id" class="form-label text-sm">Kategori</label>
                      <select name="kategori_tokoh_id" id="kategori_tokoh_id" class="form-control text-sm w-full rounded-md border-0 h-[45px] bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600">
                        @foreach ($kategoriTokoh as $kategori)
                          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="rating" class="form-label text-sm">Rating</label>
                      <input type="hidden" name="rating" id="rating">
                      <div
                      id="ratingApp"
                      class="flex flex-col gap-4 w-full justify-center mx-auto">
                      <!-- Display Stars -->
                      <div
                        id="starsContainer"
                        class="flex gap-2">
                        <svg
                          class="w-6 h-6 cursor-pointer text-gray-400"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                          ></path>
                        </svg>
                        <svg
                          class="w-6 h-6 cursor-pointer text-gray-400"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                          ></path>
                        </svg>
                        <svg
                          class="w-6 h-6 cursor-pointer text-gray-400"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                          ></path>
                        </svg>
                        <svg
                          class="w-6 h-6 cursor-pointer text-gray-400"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                          ></path>
                        </svg>
                        <svg
                          class="w-6 h-6 cursor-pointer text-gray-400"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                          ></path>
                        </svg>
                      </div>
              
                      <!-- Display Current Rating -->
                      <div>
                        <span
                          id="currentRating"
                          class="text-gray-500"
                          >0 stars</span
                        >
                      </div>
                    </div>
                    </div>
                    <div class="mb-3">
                      <label for="komentar" class="form-label text-sm">Komentar</label>
                      <textarea name="komentar" id="komentar" cols="20" rows="5" class="form-control text-sm w-full rounded-md border-0 bg-slate-100 outline-none ring-0 focus:ring-1 focus:ring-slate-600 resize-none @error('komentar') invalid:bg-red-500 @enderror" required>{{ old('komentar') }}</textarea>
                      @error('komentar')
                        <div class="text-red-500">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white rounded-md p-2 transition-color duration-150">Posting</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  @push('scripts')
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll("#starsContainer svg");
        const ratingInput = document.querySelector('#rating');
        const currentRating = document.getElementById("currentRating");

        let rating = -1;

        const updateRatingDisplay = () => {
          currentRating.textContent =
            rating === -1 ? "0 stars" : rating + 1 + " stars";
          stars.forEach((star, index) => {
            star.classList.toggle("text-orange-500", index <= rating);
            star.classList.toggle("text-gray-400", index > rating);
          });
        };

        stars.forEach((star, index) => {
          star.addEventListener("click", () => {
            rating = rating === index ? -1 : index;
            ratingInput.value = rating + 1
            updateRatingDisplay();
          });
        });

        updateRatingDisplay();
      });
    </script>
  @endpush
</x-app-layout>
