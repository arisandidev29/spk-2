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

        {{-- question --}}

        <div class="flex flex-col gap-8">
            <form action="{{route('question.create')}}" method="post" class="flex flex-col gap-4">
                @csrf
                @foreach ($kriterias as $index => $kriteria)
                <x-question_kriteria  :kriteria="$kriteria" :alternatives="$alternatives"  />
                @endforeach

                <button class="btn bg-yellow-500 text-black my-4">Kirim</button>
            </form>
        </div>
    </div>
</x-layout>
