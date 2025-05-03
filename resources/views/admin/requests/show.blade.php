@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الاقسام الرئيسية </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الاقسام الرئيسية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">جميع الاقسام الرئيسية </h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                                class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>Name product</th>
                                                <th>Name branch</th>
                                                <th>you need</th>
                                                <th>accepted</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($dataOfRequest)
                                                @foreach($dataOfRequest as $request)
                                                    <tr>
                                                        <td style="color: #0A72E8 ; font-size: 18px">{{$request -> prod_name}}</td>
                                                        <td style="color: #0A72E8 ; font-size: 18px">{{$request -> branch_name}}</td>
                                                        <td style="color: #0A72E8 ; font-size: 18px">{{$request -> quantity_of_prod}}</td>
                                                        <td style="color: #0A72E8 ; font-size: 18px">
                                                            <button
                                                                    class="accept"
                                                                    id_request="{{$request -> id}}"
                                                                    prod_id="{{$request -> prod_id}}"
                                                                    branch_id="{{$request -> branch_id}}"
                                                                    quantity_of_prod="{{$request -> quantity_of_prod}}">
                                                                accept
                                                            </button>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop


@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.accept').click(function () {
                var id_request = $(this).attr('id_request')
                var prod_id = $(this).attr('prod_id')
                var branch_id = $(this).attr('branch_id')
                var quantity_of_prod = $(this).attr('quantity_of_prod')

                $.ajax({
                    url: "{{route('accept-request')}}",
                    type: 'POST',
                    data: {
                        id_request: id_request,
                        prod_id: prod_id,
                        branch_id: branch_id,
                        quantity_of_prod: quantity_of_prod,
                    },
                    success: function () {
                        alert('done');
                    },
                    error: function (xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>
@stop
