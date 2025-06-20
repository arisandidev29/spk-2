<x-layout>
    <x-header />
    <x-sidebar />
    <div class="m-8 mx-auto w-[90%] max-w-7xl">

        <h1 class="text-secondary my-6 block text-xl  md:text-3xl lg:text-5xl"># Admin Dashboard</h1>
        <hr />

        {{-- stat --}}
        <x-admin-stat :totalUser="$totalUser" :totalKriteria="$totalKriteria" :totalAlternative="$totalAlternative" />

        <div class="flex flex-col gap-4 md:flex-row  justify-center">
            <x-user-registration-chart :userRegisration="$userRegisration"/>
            <x-promram-studi-chart :data="$dataAlternative"  />
        </div>
    </div>

    {{-- chart js --}}
    @once
        @push('script')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endpush
    @endonce
</x-layout>
