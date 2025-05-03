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

                                        <form class="form" action="{{route('store-order')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div id="form-wrapper">
                                                <div class="form-container">
                                                    <label for="options">Choose an option:</label>
                                                    @isset($data)
                                                        <select name="options[]" class="options">
                                                            @foreach($data as $order)
                                                                <option value="{{$order->prod_id}}">{{$order->prod_name}}</option>
                                                            @endforeach

                                                        </select>

                                                        <input type="number" class="item" id="quantity"
                                                               name="quantity[]" min="1" max="100">
                                                    @endisset
                                                </div>
                                            </div>
                                            <button type="button" onclick="addForm()">Add Another Form</button>

                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> done
                                            </button>
                                        </form>

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
        // jQuery to handle product selection and show data
        // $(document).ready(function() {
        //     $('.more').click(function (){
        //         $('.form_add').show()
        //     })
        // });

        function addForm() {
            // Get the form wrapper div
            const formWrapper = document.getElementById("form-wrapper");

            // Clone the first form container inside the form wrapper
            const originalForm = formWrapper.querySelector(".form-container");
            const newForm = originalForm.cloneNode(true);

            // Append the cloned form to the form wrapper
            formWrapper.appendChild(newForm);
        }

    </script>

@stop
