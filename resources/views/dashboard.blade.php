@extends('layouts.template')
@section('judul', 'Dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Dashboard</h4>
    </div>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection

@section('grafik')
    <script type="text/javascript">
        // globals Chart:false, feather:false
        var total = <?php echo json_encode($total); ?>;
        // var bulan = <?php echo json_encode($bulan); ?>;
        // Graphs
        var ctx = document.getElementById('myChart')
        // eslint-disable-next-line no-unused-vars
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'january',
                    'february',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'July',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember',
                ],
                datasets: [{
                    data: total,
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false
                }
            }
        });
    </script>
@endsection
