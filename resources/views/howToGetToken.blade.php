<x-layout>
    <x-header />
    <div class="mx-auto max-w-xl p-8">
        <h2 class="text-primary text-center text-2xl font-bold">
            Bagaimana Cara mendapatkan Token ?
        </h2>
        <a href="{{route('login')}}">
            <button class="btn bg-primary my-2 rounded-lg text-white">
                Homepage
            </button>
        </a>
        <img src="/asset/notes.svg" alt="image" class="mx-auto my-8 w-[70%]" />

        <p class="text-justify leading-8">
            Token merupakan rangkaian kode acak yang digunakan untu keperluan
            authetikasi di dalam aplikasi hal ini bertujuan untuk security dari
            aplikasi, token dapat di gunakan untuk registrasi dan untuk
            melakukan reset passworrd
        </p>

        <h4 class="text-primary my-4 text-xl">Cara Dapat Token ?</h4>

        <p>
            Untuk mendapatkan token kamu harus datang dan meminta langsung
            kepada petugas atau depat menghubugi admin di bawah
        </p>

        <a
            href=""
            class="bg-primary mx-auto my-5 flex w-max items-center gap-2 rounded-full text-white"
        >
            <img src="/asset/wa.png" alt="wa icon" class="w-14" />
            <p class="block pr-4">Contact Us</p>
        </a>
    </div>
</x-layout>
