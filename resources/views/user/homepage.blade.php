<x-layout>
    <x-header />

    <div class="m-8 flex h-[80vh] flex-col items-center justify-center gap-4">
        @if ($alreadyChosen)
            <img
                src="/asset/happy.svg"
                alt="happy"
                class="my-4 w-[50%] lg:w-auto"
            />
            <h1 class=" text-center text-base md:text-lg lg:text-3xl">
                yay kamu sudah memilih pilihan, rekomendasi untuk kamu dapat
                dilihat dibawah
            </h1>
            <a href="{{ route("user.result") }}" class="my-2">
                <button class="btn bg-primary rounded-2xl text-white">
                    Lihat rekomendasi
                </button>
            </a>
        @else
            <h1 class="text-center text-3xl md:text-4xl lg:text-7xl">
                Hallo,
                <span class="text-secondary">{{ auth()->user()->name }}</span>
            </h1>
            <h3 class="text-center leading-10 lg:leading-12 text-md lg:text-3xl">
                Belum ada rekomendasi Promgram studi untuk kamu, kamu dapat
                mengklik tombol di bawah untuk mulai ya
            </h3>

            <a href="{{ route("question") }}">
                <button
                    class="btn bg-primary mx-auto mt-7 max-w-max rounded-xl border-none px-8 py-4 md:px-10 md:py-8 text-lg lg:text-2xl text-white"
                >
                    Dapatkan Rekomendasi
                </button>
            </a>
        @endif
    </div>
</x-layout>
