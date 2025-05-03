 <!DOCTYPE html>
<html>
<head>
    <title>Top Selling Products</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="width: 75%; margin: auto;">
    <canvas id="topSellingChart"></canvas>
</div>

<script>
    // Retrieve data passed from the controller
    const branchNames = @json($branchNames);
    const prices = @json($prices);

    const ctx = document.getElementById('topSellingChart').getContext('2d');
    const topSellingChart = new Chart(ctx, {
        type: 'bar', // Use 'bar', 'pie', or any other chart type you prefer
        data: {
            labels: branchNames, // Product names as x-axis labels
            datasets: [{
                label: 'Total Quantity Sold',
                data: prices, // Quantity sold as data points
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'price '
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'branches'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Top Selling branches in the Last Year'
                }
            }
        }
    });
</script>
</body>
</html>












