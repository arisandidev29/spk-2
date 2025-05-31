<x-layout>
    <x-header />

    <div class="m-4 max-w-5xl   w-[90%]h-screen mx-auto">

        <p class="bg-green-800 p-4 rounded-xl text-gray-300 font-semibold text-center">
            Kamu dapat dapat mengisi Nilai dari setiap keriteria di bawah, setiap kriteria terdapat nilai untuk masing-masing program studi, isi sesuai preferensi kamu agar mendapatkan program studi yang sesuai
        </p >

        <hr class="my-4 text-slate-400">


        {{-- question --}}



        <div class="flex flex-col gap-8">
           <x-question_kriteria /> 
           <x-question_kriteria /> 
           <x-question_kriteria /> 
           <x-question_kriteria /> 
           <x-question_kriteria /> 
        </div>
    </div>
</x-layout>