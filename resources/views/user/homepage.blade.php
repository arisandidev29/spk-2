<x-layout>
    <x-header />

    <div class="m-8 flex h-[80vh] flex-col items-center justify-center gap-4">
        @if($alreadyChosen)

        <img src="/asset/happy.svg" alt="happy" class="my-4">
        <h1 class="text-3xl ">yay kamu sudah memilih pilihan, rekomendasi untuk kamu dapat dilihat dibawah  </h1>
        <a href="{{route('user.result')}}" class="my-2">
            <button class="btn bg-primary text-white rounded-2xl">Liaht rekomendasi</button>

        </a>


        @else
        <h1 class="text-center text-7xl">
            Hallo,
            <span class="text-secondary">{{auth()->user()->name}}</span>
        </h1>
        <h3 class="text-center text-3xl leading-12">
            Belum ada rekomendasi Promgram studi untuk kamu, kamu dapat mengklik
            tombol di bawah untuk mulai ya
        </h3>

        <a href="{{route('question')}}">

            <button
            class="btn bg-primary mx-auto mt-7 max-w-max rounded-xl border-none px-10 py-8 text-2xl text-white"
            >
            Dapatkan Rekomendasi
        </button>
    </a>
        @endif
    </div>
</x-layout>
