<x-admin-master>

    @section('content')

        @if(auth()->user()->userHasRole('Admin'))

            <h1 class="h3 mb-4 text-gray-800">Dashboard for: {{auth()->user()->name}}</h1>

        @endif

        <canvas id="myChart"></canvas>


    @endsection

    @section('scripts')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>

        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Posts', 'Comments', 'Replies', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: 'CMS activity',
                        data: [{{$postCount}}, {{$commentCount}}, {{$replyCount}}, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
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

    @endsection

</x-admin-master>