<x-admin-layout>
    <h1 class="text-primary my-4 text-4xl"># User</h1>
    <hr class="text-primary" />

    @if (session()->has("success"))
        <x-alert.success message="{{session()->get('success')}}" />
    @endif

    <h1 class="text-primary my-4 lg:my-8 font-bold text-xs md:text-base">
        User Registration Token :
        <span class="bg-primary rounded-lg p-1 text-white">{{ $token }}</span>
        <a href="{{ route("refresh.token") }}">
            <button class="btn btn-xs rounded-lg bg-amber-300 text-black">
                Refresh
            </button>
        </a>
    </h1>
    <div class="overflow-x-auto rounded-2xl p-4 shadow-2xl">
        <a href="{{route('userExport')}}" >
            <button class="btn bg-primary text-white rounded-xl">Export</button>
        </a>
        <a href="{{route('userSpk')}}" >
            <button class="btn bg-yellow-300 text-black rounded-xl">Tampilkan semua </button>
        </a>
        <table class="table-xs table my-2">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->hasilRekomendasi->isNotEmpty())
                                Sudah Memililh
                            @else
                                    Belum memilih
                            @endif
                        </td>
                        <td>
                            <a
                                href="{{ $user->HasilRekomendasi->isNotEmpty() ? route("users.detail", ["id" => $user->id]) : '' }} "
                                class="@if($user->hasilRekomendasi->isEmpty()) cursor-not-allowed @endif"
                            >
                                <button
                                    @if($user->hasilRekomendasi->isEmpty()) disabled @endif
                                    class="btn btn-sm bg-primary @if($user->hasilRekomendasi->isEmpty()) cursor-not-allowed @endif rounded-lg border-0 text-white"
                                >
                                    Detail
                                </button>
                            </a>
                            <form
                                action="{{ route("users.delete") }}"
                                method="post"
                                class="inline"
                            >
                                @csrf
                                @method("delete")
                                <input
                                    type="hidden"
                                    name="userId"
                                    value="{{ $user->id }}"
                                />
                                <button
                                    class="btn btn-sm rounded-lg bg-red-500 text-white"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
