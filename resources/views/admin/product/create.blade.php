@extends('layouts.admin')
@section('title','Add Branch')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> الاقسام الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة قسم رئيسي
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> Create Main Category </h4>
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
                                @isset($products)

                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <form class="form"
                                                  action="{{route('product.save.post' , $products == null ? $id = null  : $id = $products->id )}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم القسم -
                                                                </label>

                                                                <input type="text" id="name"
                                                                       name="prod_name"
                                                                       value="{{$products == null ? '' : $products->prod_name}}"
                                                                       class="form-control"
                                                                       placeholder=""
                                                                >
                                                                <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <label for="color">Choose a category:</label>
                                                <select name="cat_id">
                                                    @isset($categories)
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                                        @endforeach
                                                    @endisset

                                                </select>
                                                <div class="form-actions">

                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> حفظ
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@stop

