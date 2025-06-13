<x-layout>
    <x-header />


    <div class="w-[90%] h-screen m-4 mx-auto max-w-5xl">
        <p
            class="rounded-xl bg-green-800 p-4 text-center text-sm md:text-base font-semibold text-gray-300"
        >
            Kamu dapat dapat mengisi Nilai dari setiap keriteria di bawah,
            setiap kriteria terdapat nilai untuk masing-masing program studi,
            isi sesuai preferensi kamu agar mendapatkan program studi yang
            sesuai
        </p>


        <hr class="my-4 text-slate-400" />



        @if($errors->any()) 
            <div role="alert" class="alert alert-error my-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Pastikan mengisi semua input dengan benar dan gunakan angka</span>
            </div>

            @endif
        {{-- question --}}

        <div class="flex flex-col gap-8">
            <form action="{{route('question.create')}}" method="post" class="flex flex-col gap-4">
                @csrf
                {{-- <input type="text" placeholder="tes" name="c1[a][t]"> --}}
                @foreach ($kriterias as $index => $kriteria)
                <x-question_kriteria  :kriteria="$kriteria" :alternatives="$alternatives"  />
                @endforeach

                <button class="btn bg-yellow-500 text-black my-4">Kirim</button>
            </form>
        </div>
    </div>
</x-layout>
