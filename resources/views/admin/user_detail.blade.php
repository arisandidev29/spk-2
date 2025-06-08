<x-admin-layout>
    <h1 class="text-primary my-4 text-4xl"># Detail User {{$user->name}}</h1>
    <hr class="text-primary" />

    <div class="flex  gap-8 w-full my-8 ">
            <div class="w-full">
                <canvas id="statistic-chart" class="w-full">/canvas>
            </div>


                <table class="table-xs table shadow-xl">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Alternative</th>
                        <th>Vektor S</th>
                        <th>Vektor V</th>
                        <th>Rangking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $index =>  $h )
                    
                    <tr>
                        <th>{{$index + 1}}</th>
                        <td>{{$h->alternative->name}}</td>
                        <td>{{$h->vektor_s}}</td>
                        <td>{{$h->vektor_v}}</td>
                        <td>{{$h->rangking}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
          <h3 class="text-primary text-xl text-left self-start"># Tabel Jawaban</h3>

        <table class="table-sm shadow-md table my-8">
            <thead>
                <tr>
                    <th></th>
                    <th>kode kriteria</th>
                    <th>Kriteria</th>
                    <th>Alternative</th>
                    <th>Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jawabans as $index =>  $jawaban )
                <tr>
                    <th>{{$index + 1}}</th>
                    <td>{{$jawaban->kd_kriteria}}</td>
                    <td>{{$jawaban->kriteria->nama}}</td>
                    <td>{{$jawaban->alternative->name}}</td>
                    <td>{{$jawaban->jawaban}}</td>
                    <td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    @push('script-bottom')
        <script>
            const statistic_chart = document.querySelector('#statistic-chart');
            console.log(statistic_chart)
            new Chart(statistic_chart, {
                type: 'bar',
                data: {
                    labels: {!! ($alternatives) !!},
                    datasets: [{
                        label: 'Statistik nilai',
                        data: {!! $hasil->pluck('vektor_v')->toJson() !!},
                        borderWidth: 1,
                        backgroundColor: [
                            "rgba(245, 237, 7,0.2)",
                            'rgba(22, 240, 25, 0.2)',
                            'rgba(22, 84, 240, 0.2)'],
                        borderColor:  [
                            "rbg(245, 237, 7)",
                            'rgb(22, 240, 25)',
                            'rgb(22,84 ,240)'],
                        color: '#009739'
                    }],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</x-admin-layout>