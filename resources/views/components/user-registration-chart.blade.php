@props(['userRegisration'])
<div class="w-full">
    <h1 class="p-4 text-lg lg:text-2xl text-primary">User Registration 2025</h1>
    <canvas id="UserRegistrationChart"></canvas>
</div>

@push('script-bottom')
   <script>
  const ctx = document.getElementById('UserRegistrationChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['januari','febuary','maret', 'april','mei','april', 'juni', 'juli','agustus','september','oktober','november','desember'],
      datasets: [{
        label: 'User Registration 2025',
        data: {{json_encode($userRegisration)}},
        borderWidth: 1,
        backgroundColor : "#009739",
        borderColor: '#009739',
        color : '#009739'
      }]
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