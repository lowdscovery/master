<div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date" wire:model="startDate" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="end-date">End Date:</label>
            <input type="date" id="end-date" wire:model="endDate" class="form-control">
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->column1 }}</td>
                    <td>{{ $row->column2 }}</td>
                    <td>{{ $row->column3 }}</td>
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
                labels: @json($data->pluck('column1')),
                datasets: [{
                    label: 'Dataset 1',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    data: @json($data->pluck('column2'))
                }]
            },
            options: {}
        });

        Livewire.on('dataUpdated', function (data) {
            chart.data.labels = data.labels;
            chart.data.datasets[0].data = data.dataset;
            chart.update();
        });
    });
</script>
