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
                                            <tr class="tr">
                                                <th>product name</th>
                                                <th>max_quantity</th>
                                                <th>min_quantity</th>
                                                <th>quantity_item</th>
                                                <th>price</th>
                                                <th>price</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($productsDetails)
                                                @foreach($productsDetails as $productsDetail)
                                                    <tr class="table">
                                                        <input type="hidden" class="prod_id"
                                                               prod_id="{{$productsDetail -> prod_id}}"/>
                                                        <td class="product_name"
                                                            style="color: #0A72E8 ; font-size: 18px">{{$productsDetail -> prod_name}}</td>
                                                        <td style="color: #0A72E8 ; font-size: 18px">
                                                            <input name="max_quantity" class="max_quantity"
                                                                   id="max_quantity"
                                                                   value="{{$productsDetail -> max_quantity}}"
                                                                   style="width: 50px"/>
                                                        </td>
                                                        <td style="color: #0A72E8 ; font-size: 18px">
                                                            <input name="min_quantity" class="min_quantity"
                                                                   id="min_quantity"
                                                                   value="{{$productsDetail -> min_quantity}}"
                                                                   style="width: 50px"/>
                                                        </td>
                                                        <td style="color: #0A72E8 ; font-size: 18px"
                                                            class="quantity_item" id="quantity_item"
                                                            value="{{$productsDetail -> quantity_item}}">
                                                            {{$productsDetail -> quantity_item}}
                                                        </td>
                                                        <td style="color: #0A72E8 ; font-size: 18px">
                                                            <input name="price" class="price" id="price"
                                                                   value="{{$productsDetail -> price}}"
                                                                   style="width: 50px"/>
                                                        </td>
                                                        <td>
                                                            <div class="add_item" style="display: none">
                                                                <input type="number" class="item" id="quantity"
                                                                       name="quantity" min="1" max="100">
                                                                <button class="add" id="getValueButton">add item
                                                                </button>

                                                            </div>
                                                            <button class="edit" id="getValueButton">edit</button>
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
            $('.table').each(function () {
                var max_quantity = $(this).find('.max_quantity').val();
                var min_quantity = $(this).find('.min_quantity').val();
                var price = $(this).find('.price').val();
                var quantity_item = $(this).find('.quantity_item').text().trim();
                var prod_id = $(this).find('.prod_id').attr('prod_id')
                if (parseInt(min_quantity) >= parseInt(quantity_item)) {
                    $(this).find('.product_name').css({color: 'red'});
                    $(this).find('.add_item').show();
                    $(this).find('.add').click(function () {
                        $.ajax({
                            url: "{{ route('addRequest') }}",
                            type: 'POST',
                            data: {
                                branch_id: {{$productsDetail -> branch_id}},
                                prod_id: prod_id,
                                quantity_of_prod: $(this).siblings('.item').val(),
                            },
                            success: function () {
                                alert('done');
                            },
                            error: function (xhr, status, error) {
                                console.log('Error:', error);
                            }
                        });
                    });
                }
                $(this).find('.edit').click(function () {
                    var row = $(this).closest('tr')
                    var max_quantityUp = row.find('.max_quantity').val()
                    var min_quantityUp = row.find('.min_quantity').val()
                    var priceUp = row.find('.price').val()
                    var prod_idUp = row.find('.prod_id').attr('prod_id')
                    $.ajax({
                        url: "{{ route('update-store') }}",
                        type: 'POST',
                        data: {
                            max_quantity: max_quantityUp,
                            min_quantity: min_quantityUp,
                            price: priceUp,
                            prod_id: prod_idUp,
                        },
                    });
                })
            });
        });
    </script>

@stop
