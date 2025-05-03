{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
{{--    <div class="app-content content">--}}
{{--        <div class="content-wrapper">--}}
{{--            <div class="content-header row">--}}
{{--                <div class="content-header-left col-md-6 col-12 mb-2">--}}
{{--                    <h3 class="content-header-title"> الاقسام الرئيسية </h3>--}}
{{--                    <div class="row breadcrumbs-top">--}}
{{--                        <div class="breadcrumb-wrapper col-12">--}}
{{--                            <ol class="breadcrumb">--}}
{{--                                <li class="breadcrumb-item"><a href="">الرئيسية</a>--}}
{{--                                </li>--}}
{{--                                <li class="breadcrumb-item active"> الاقسام الرئيسية--}}
{{--                                </li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="content-body">--}}
{{--                <!-- DOM - jQuery events table -->--}}
{{--                <section id="dom">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h4 class="card-title">جميع الاقسام الرئيسية </h4>--}}
{{--                                    <a class="heading-elements-toggle"><i--}}
{{--                                            class="la la-ellipsis-v font-medium-3"></i></a>--}}
{{--                                    <div class="heading-elements">--}}
{{--                                        <ul class="list-inline mb-0">--}}
{{--                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
{{--                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
{{--                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
{{--                                            <li><a data-action="close"><i class="ft-x"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @include('admin.includes.alerts.success')--}}
{{--                                @include('admin.includes.alerts.errors')--}}

{{--                                <div class="card-content collapse show">--}}
{{--                                    <div class="card-body card-dashboard">--}}
{{--                                        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>--}}
{{--                                        <div>--}}
{{--                                            <h1>{{$chart1->options['chart_title']}}</h1>--}}
{{--                                            {!! $chart1->renderHtml() !!}--}}
{{--                                        </div>--}}

{{--                                        {!! $chart1->renderChartJsLibrary() !!}--}}
{{--                                        {!! $chart1->renderJs() !!}--}}


{{--                                    </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </section>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@stop--}}

{{--@section('script')--}}
{{--    <script>--}}
{{--        const myChart = new Chart("myChart", {--}}
{{--            type: "bar",--}}
{{--            data: {},--}}
{{--            options: {}--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}





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
    const productNames = @json($productNames);
    const productQuantities = @json($productQuantities);

    const ctx = document.getElementById('topSellingChart').getContext('2d');
    const topSellingChart = new Chart(ctx, {
        type: 'bar', // Use 'bar', 'pie', or any other chart type you prefer
        data: {
            labels: productNames, // Product names as x-axis labels
            datasets: [{
                label: 'Total Quantity Sold',
                data: productQuantities, // Quantity sold as data points
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
                        text: 'Quantity Sold'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Products'
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
                    text: 'Top Selling Products in the Last Year'
                }
            }
        }
    });
</script>
</body>
</html>












