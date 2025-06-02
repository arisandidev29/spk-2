<x-admin-layout>
    <h1 class="text-primary my-4 text-4xl"># Alternative</h1>
    <hr class="text-primary" />

    <div class="my-8 overflow-x-auto rounded-2xl p-4 shadow-2xl">
        {{-- alert --}}

        @if (session()->has("success"))
            <x-alert.success message="{{session()->get('success')}}" />
        @endif

        <!-- Open the modal using ID.showModal() method -->
        <button
            class="btn btn-primary rounded-lg border-0 text-white"
            onclick="my_modal_1.showModal()"
        >
            Buat Alternative
        </button>
        <dialog
            id="my_modal_1"
            class="modal"
            {{-- {{ $errors->any() ? "open" : "" }} --}}
        >
            <div class="modal-box">
                <form method="dialog">
                    <button
                        class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2"
                    >
                        ✕
                    </button>
                </form>
                <h3 class="text-primary py-4 text-lg font-bold">
                    Buat Alternative
                </h3>
                <form
                    method="post"
                    action="{{ route("admin.alternative.create") }}"
                    class="flex w-full flex-col gap-4"
                >
                    @csrf
                    <input
                        type="text"
                        placeholder="kode alternative"
                        name="kode_alternative"
                        value="{{ old("kode_alternative") }}"
                        class="input w-full"
                    />
                    @error("kode_alternative")
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror

                    <input
                        type="text"
                        placeholder="nama"
                        name="name"
                        value="{{ old("name") }}"
                        class="input w-full"
                    />
                    @error("name")
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror

                    <button class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </dialog>

        <table class="my-4 table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Kode Alternative</th>
                    <th>Nama</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatives as $index => $alternative)
                    <tr x-data>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $alternative->kode_alternative }}</td>
                        <td>{{ $alternative->name }}</td>
                        <th>
                            <button
                                class="btn rounded-lg border-0 bg-amber-200 text-black"
                                onclick="modalEdit{{ $alternative->id }}.showModal()"
                            >
                                Edit
                            </button>

                            <button
                                class="btn rounded-lg border-0 bg-red-500 text-white"
                                @click="$dispatch('showmodaldelete',{id : '{{ $alternative->id }}'})"
                            >
                                Delete
                            </button>

                            {{-- edit dialog --}}
                            <dialog
                                id="modalEdit{{ $alternative->id }}"
                                class="modal"
                                {{ session("edit_id") == $alternative->id && $errors->edit->any() ? "open" : "" }}
                            >
                                <div class="modal-box">
                                    <h2 class="text-primary my-2">
                                        Edit Alternative
                                        {{ $alternative->kode_alternative }}
                                    </h2>

                                    <hr class="my-2 text-green-700" />
                                    <form
                                        action="{{ route("admin.alternaive.edit") }}"
                                        method="post"
                                        class="flex flex-col gap-4"
                                    >
                                        @csrf
                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $alternative->id }}"
                                        />
                                        <input
                                            type="text"
                                            placeholder="kode alternative"
                                            name="kode_alternative"
                                            value="{{ $alternative->kode_alternative }}"
                                            class="input w-full"
                                        />

                                        @error("kode_alternative", "edit")
                                            <p class="text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <input
                                            type="text"
                                            placeholder="Nama"
                                            name="name"
                                            value="{{ $alternative->name }}"
                                            class="input my-2 w-full"
                                        />

                                        @error("name", "edit")
                                            <p class="text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <div class="my-2">
                                            <button
                                                @click.prevent="modalEdit{{ $alternative->id }}.close()"
                                                class="btn btn-info"
                                            >
                                                Tidak
                                            </button>

                                            <button class="btn btn-primary">
                                                Edit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>
                        </th>
                    </tr>
                @endforeach
            </tbody>

            {{-- modal dialog --}}
            <dialog
                x-data="{ id: null }"
                @modalDele.window="alert('dump')"
                @showmodaldelete.window="
                id = $event.detail.id ;
                modalDelete.showModal();
            "
                id="modalDelete"
                class="modal"
            >
                <div class="modal-box">
                    <h3 class="text-lg font-bold">
                        Yakin Hapus Alternative ini ?
                    </h3>
                    <div class="modal-action">
                        <form
                            action="{{ route("admin.alternative.delete") }}"
                            method="post"
                        >
                            @csrf
                            <input
                                type="hidden"
                                name="alternative_id"
                                :value="id"
                            />
                            <button class="btn btn-error">Ya !!</button>
                        </form>
                        <form method="dialog">
                            <button class="btn btn-primary">Tidak</button>
                        </form>
                    </div>
                </div>
            </dialog>
        </table>
    </div>
</x-admin-layout>
