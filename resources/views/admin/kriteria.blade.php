<x-admin-layout>
    <h1 class="text-primary my-4 text-4xl"># Kriteria</h1>
    <hr class="text-primary" />

    <div class="overflow-x-auto">
        {{-- alert --}}

        @if (session()->has("success"))
            <x-alert.success message="{{session()->get('success')}}" />
        @endif

        {{-- modal buat kriteria --}}

        @php
            // dump($errors->all() ?? '') ;
        @endphp

        <x-modal.main
            title="Buat Kriteria"
            triggerText="Buat Kriteria"
            id="buatKriteria"
            opencondition="{{ $errors->any() ? 'open' : '' }}"
        >
            <form
                action="{{ route("admin.kriteria.create") }}"
                method="post"
                class="flex flex-col gap-4 font-bold"
            >
                @csrf
                <input
                    type="text"
                    placeholder="kode kriteria"
                    name="kd_kriteria"
                    value="{{ old("kd_kriteria") }}"
                    class="input w-full"
                />

                @error("kd_kriteria")
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <input
                    type="text"
                    placeholder="Nama"
                    name="nama"
                    value="{{ old("nama") }}"
                    class="input w-full"
                />
                @error("nama")
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <select class="select w-full" name="bobot_id">
                    <option disabled selected>Pilih Bobot</option>
                    @foreach ($bobots as $bobot)
                        <option value="{{ old("bobot", $bobot->id) }}">
                            {{ "$bobot->nilai : $bobot->keterangan" }}
                        </option>
                    @endforeach
                </select>

                @error("bobot_id")
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <select class="select w-full" name="kategori">
                    <option disabled selected>Pilih Kategori</option>
                    <option value="banefit">benefit</option>
                    <option value="cost">cost</option>
                </select>

                @error("kategori")
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <textarea
                    class="textarea w-full"
                    placeholder="Desc"
                    name="desc"
                ></textarea>
                @error("desc")
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <button class="btn btn-primary">Buat</button>
            </form>
        </x-modal.main>

        <table class="table-zebra table table-sm ">
            <thead>
                <tr>
                    <th></th>
                    <td>Kode kriteria</td>
                    <th>Nama</th>
                    <th>Bobot</th>
                    <th>Normalisasi Bobot</th>
                    <th>Kategori</th>
                    <td>desc</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $index => $kriteria)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $kriteria->kd_kriteria }}</td>
                        <td>{{ $kriteria->nama }}</td>
                        <td>{{ $kriteria->bobot->nilai }}</td>
                        <td>{{ $kriteria->normalisasi }}</td>
                        <td>{{ $kriteria->kategori }}</td>
                        <td>{{ $kriteria->desc }}</td>
                        <td>
                            {{-- edit --}}

                            <div class="flex">
                                {{-- edit --}}

                                <x-modal.main
                                    id="modalEdit_{{$kriteria->kd_kriteria}}"
                                    title="Edit Bobot {{$kriteria->kd_kriteria}}"
                                    triggerText="Edit"
                                    class-trigger="bg-yellow-500"
                                    opencondition="{{session('kriteria_id') == $kriteria->kd_kriteria && $errors->edit->any() ? 'open' : ''}}"
                                >
                                    <form
                                        action="{{ route("admin.kriteria.edit") }}"
                                        method="post"
                                        class="flex flex-col gap-4 font-bold"
                                    >
                                        @csrf
                                        @method("put")

                                        <input
                                            type="hidden"
                                            name="old_kd_kriteria"
                                            value="{{ $kriteria->kd_kriteria }}"
                                        />
                                        <input
                                            type="text"
                                            placeholder="kode kriteria"
                                            name="kd_kriteria"
                                            value="{{ old("kd_kriteria", $kriteria->kd_kriteria) }}"
                                            class="input w-full"
                                        />

                                        @error("kd_kriteria", "edit")
                                            <p class="text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <input
                                            type="text"
                                            placeholder="Nama"
                                            name="nama"
                                            value="{{ old("nama", $kriteria->nama) }}"
                                            class="input w-full"
                                        />
                                        @error("nama", "edit")
                                            <p class="text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <select
                                            class="select w-full"
                                            name="bobot_id"
                                        >
                                            <option disabled selected>
                                                Pilih Bobot
                                            </option>
                                            @foreach ($bobots as $bobot)
                                                <option
                                                    value="{{ old("bobot", $bobot->id) }}"
                                                    @selected($bobot->id == $kriteria->bobot_id)
                                                >
                                                    {{ "$bobot->nilai : $bobot->keterangan" }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error("bobot_id", "edit")
                                            <p class="text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <select
                                            class="select w-full"
                                            name="kategori"
                                        >
                                            <option @selected($kriteria->kategori == 'banefit') value="banefit">
                                                benefit
                                            </option>
                                            <option @selected($kriteria->kategori == 'cost') value="cost">cost</option>
                                        </select>

                                        @error("kategori",'edit')
                                            <p class="text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <textarea
                                            class="textarea w-full"
                                            placeholder="Desc"
                                            name="desc"
                                        >
{{ old("desc", $kriteria->desc) }}</textarea
                                        >
                                        @error("desc", "edit")
                                            <p class="text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <button class="btn btn-primary">
                                            Edit
                                        </button>
                                    </form>
                                </x-modal.main>

                                {{-- delete --}}
                                <x-modal.main
                                    class="inline"
                                    id="modaldelete_{{ $kriteria->kd_kriteria }}"
                                    title="Delete Kriteria {{ $kriteria->kd_kriteria}}"
                                    triggerText="Delete"
                                    class-trigger="bg-red-500"
                                    class-title="text-red-500 text-center"
                                >
                                    <form
                                        action="{{ route("admin.kriteria.delete") }}"
                                        method="post"
                                        class="flex justify-center gap-4"
                                    >
                                        @csrf
                                        @method("delete")
                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $kriteria->kd_kriteria }}"
                                        />
                                        <button
                                            x-data
                                            @click.prevent="modaldelete_{{ $kriteria->kd_kriteria }}.close()"
                                            class="btn btn-primary"
                                        >
                                            Tidak
                                        </button>
                                        <button
                                            class="btn bg-red-500 text-white"
                                        >
                                            Ya
                                        </button>
                                    </form>
                                </x-modal.main>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
