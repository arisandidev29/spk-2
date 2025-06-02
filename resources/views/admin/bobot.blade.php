<x-admin-layout>
    <h1 class="text-primary my-4 text-4xl"># Bobot</h1>
    <hr class="text-primary" />

    <div class="my-8 overflow-x-auto rounded-2xl shadow-2xl">
        {{-- alert --}}

        {{-- alert --}}

        @if (session()->has("success"))
            <x-alert.success message="{{session()->get('success')}}" />
        @endif

        {{-- modal buat bobot --}}

        <x-modal.main
            title="Buat Bobot"
            triggerText="Buat Bobot"
            id="my_modal_bobot"
            opencondition="{{ $errors->any() ? 'open' : '' }}"
        >
            <form
                action="{{ route("admin.bobot.create") }}"
                method="post"
                class="flex flex-col gap-4 font-bold"
            >
                @csrf
                <input
                    type="text"
                    placeholder="Nilai"
                    name="nilai"
                    value="{{ old("nilai") }}"
                    class="input w-full"
                />

                @error("nilai")
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <input
                    type="text"
                    placeholder="Keterangan"
                    name="keterangan"
                    value="{{ old("keterangan") }}"
                    class="input w-full"
                />
                @error("keterangan")
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <button class="btn btn-primary">Buat</button>
            </form>
        </x-modal.main>

        @php
            // dump($errors->edit->all() ?? "");
            // dump(session()->all() ?? "");
        @endphp

        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bobots as $index => $bobot)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $bobot->nilai }}</td>
                        <td>{{ $bobot->keterangan }}</td>
                        <th>
                            <div class="flex">
                                {{-- edit --}}

                                <x-modal.main
                                    id="modalEdit_{{$bobot->id}}"
                                    title="Edit Bobot {{$bobot->keterangan}}"
                                    triggerText="Edit"
                                    class-trigger="bg-yellow-500"
                                    opencondition="{{session('bobot_id') == $bobot->id && $errors->edit->any() ? 'open' : ''}}"
                                >
                                    <form
                                        action="{{ route("admin.bobot.edit") }}"
                                        method="post"
                                        class="flex flex-col gap-4 font-bold"
                                    >
                                        @csrf
                                        @method("put")
                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $bobot->id }}"
                                        />
                                        <input
                                            type="text"
                                            placeholder="Nilai"
                                            name="nilai"
                                            value="{{ old("nilai", $bobot->nilai) }}"
                                            class="input w-full"
                                        />

                                        @error("nilai", "edit")
                                            <p class="text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <input
                                            type="text"
                                            placeholder="Keterangan"
                                            name="keterangan"
                                            value="{{ old("keterangan", $bobot->keterangan) }}"
                                            class="input w-full"
                                        />
                                        @error("keterangan", "edit")
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
                                    id="modaldelete_{{ $bobot->id }}"
                                    title="Delete Bobot {{ $bobot->keterangan}}"
                                    triggerText="Delete"
                                    class-trigger="bg-red-500"
                                    class-title="text-red-500 text-center"
                                >
                                    <form
                                        action="{{ route("admin.bobot.delete") }}"
                                        method="post"
                                        class="flex justify-center gap-4"
                                    >
                                        @csrf
                                        @method("delete")
                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $bobot->id }}"
                                        />
                                        <button
                                            x-data
                                            @click.prevent="modaldelete_{{ $bobot->id }}.close()"
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
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
