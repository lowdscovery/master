 <h1>Salut bro</h1>
 <div>
   <canvas id="myChart"> </canvas>                                             
 </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('livewire:load' , () => {
    const ctx = document.getElementById('myChart').getContext('2d');
    const chartData = @json($chartData);

    const data = {
        labels: chartData.map(item => item.label),
        datasets: [
            {
                label: 'Value 1',
                data: chartData.map(item => item.value),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
             {
                label: 'Value 2',
                data: chartData.map(item => item.old_value),
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            },
            {
                label: 'Value 3',
                data: chartData.map(item => item.difference),
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }
        ]
    };
    new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            scales:{
                y: {
                    beginAtZero:true
                }
            }
        }
    });
  });
</script>