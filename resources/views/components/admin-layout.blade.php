<x-layout>
    <x-header />
    <x-sidebar />
    <div class="m-8 mx-auto max-w-7xl">

        {{$slot}}
    </div>

    {{-- chart js --}}
    @once
        @push('script')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="//unpkg.com/alpinejs" defer></script>
        @endpush
    @endonce
</x-layout>
