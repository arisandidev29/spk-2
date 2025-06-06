<x-layout>
    <x-header />
    <div class="m-8 flex max-w-6xl mx-auto min-h-[80vh] flex-col items-center justify-center gap-4">
       <a href="{{route('user.homepage')}}" class="self-start">
        <button class="btn bg-primary text-white rounded-xl ">Homepage</button>
        </a> 
        
        <img src="/asset/data-report.svg" alt="img" class="w-96">
        <h1 class="text-2xl my-3"> Hasil Rekomendasi untuk kamu yaitu :  <span class="bg-primary text-white rounded-lg p-2 font-bold">{{$hasil->first()->alternative->name}} </span> </h1>
        

        <form action="{{route('user.result.delete')}}" method="post">
            @csrf
            @method('delete')
            <button class="btn bg-primary text-white self-left rounded-md">Pilih Ulang</button>
        </form>
        <small>Kurang puas kamu dapat pilih ulang !</small>

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


    </div>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush


    @push('script-bottom')
        <script>
            const statistic_chart = document.querySelector('#statistic-chart');
            console.log(statistic_chart)
            new Chart(statistic_chart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($alternative) !!},
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
</x-layout>
