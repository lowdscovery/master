<div>
   <canvas id="myChart"> </canvas>                                         
 </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>value 1</th>
                <th>old 2</th>
                <th>difference 3</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->value }}</td>
                    <td>{{ $row->old_value }}</td>
                    <td>{{ $row->difference }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <canvas id="myChart"></canvas>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($data->pluck('value')),
                datasets: [{
                    label: 'Intensité',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    data: @json($data->pluck('old_value'))
                },
                {
                    label: 'Puissance',
                    backgroundColor: 'rgba(75, 12, 20, 0.2)',
                    borderColor: 'rgba(75, 12, 20, 1)',
                    data: @json($data->pluck('difference'))
                },
                 {
                    label: 'Debit',
                    backgroundColor: 'rgba(226, 7, 134, 0.2)',
                    borderColor: 'rgba(226, 7, 134, 1)',
                    data: @json($data->pluck('id'))
            }]
                
            },
            
            options: {}
        });
    });
</script>