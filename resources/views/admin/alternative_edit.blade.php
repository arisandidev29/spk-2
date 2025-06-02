<x-admin-layout>
    <div class="max-w-xl shadow-2xl p-4 rounded-lg mx-auto">
        <h1 class="text-primary my-4 text-4xl"># Edit Alternative</h1>
        <hr class="text-primary" />

        <div class="my-6">
            <form action="" class="my-6 flex flex-col gap-4">
                @csrf
                <input
                    type="text"
                    placeholder="kode alternative"
                    name="kode_alternative"
                    value="{{ old("kode_alternative") }}"
                    class="input w-full"
                />

                <input
                    type="text"
                    placeholder="kode alternative"
                    name="kode_alternative"
                    value="{{ old("kode_alternative") }}"
                    class="input w-full"
                />

                <div>
                    <button class="btn btn-primary">Kembali</button>
                    <button class="btn btn-info">Edit</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
