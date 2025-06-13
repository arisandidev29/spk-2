@props(["data"])
<div class="w-full flex-1">
    <canvas id="Programstudichart"></canvas>
</div>

@push("script-bottom")
    <script>
        const ctx2 = document.querySelector('#Programstudichart');

        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Sistem Iformasi', 'Manajemen Informatika', 'Komputerisasi Akuntansi'],
                datasets: [
                    {
                        label: 'My First Dataset',
                        data:  {{json_encode($data)}},
                        backgroundColor: [
                            '#009739',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                        ],
                        hoverOffset: 4,
                    },
                ],
            },
        });
    </script>
@endpush
