<x-admin-layout>
    <div>
        <h1 class="text-primary text-4xl"># User hasil Spk</h1>
        <hr class="text-primary my-4" />

        <a href="{{route('userSpkExport')}}">
            <button class="btn bg-primary text-white rounded-xl my-4">Export</button>
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2  gap-4">
            @foreach ($userSpk as $user)
            <div>

                <table class="table-xs my-2 table shadow-lg">
                    <p>User : {{ $user->name }}</p>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Alternative</th>
                            <th>rangking</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->HasilRekomendasi->sortBy('rangking')->values() as $index => $hasil)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $hasil->alternative->name }}</td>
                            <td>{{ $hasil->rangking }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody></tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>
