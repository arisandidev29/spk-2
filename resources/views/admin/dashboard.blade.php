<x-layout>
    <x-header />
    <x-sidebar />
    <div class="m-8 mx-auto max-w-7xl">

        <h1 class="text-secondary my-6 block text-5xl"># Admin Dashboard</h1>
        <hr />

        {{-- stat --}}
        <x-admin-stat />

        <div class="flex justify-center">
            <x-user-registration-chart />
            <x-promram-studi-chart />
        </div>
    </div>

    {{-- chart js --}}
    @once
        @push('script')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endpush
    @endonce
</x-layout>
