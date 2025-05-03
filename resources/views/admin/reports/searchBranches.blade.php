
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
                <form class="form" action="{{ route('search-reports') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="reports">
                        <h1>Select Reports of Branches</h1>

                        @isset($branches)
                            <div class="form-group">
                                <label for="branch">Select Branch:</label>
                                <select id="branch" name="branch_id" class="form-control">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endisset

                        <div class="form-group">
                            <label for="period">Period (in days):</label>
                            <input type="number" id="period" name="period" class="form-control" placeholder="Enter period in days">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Select Order">
                        </div>
                    </div>
                </form>
            </div>

        </div>
@stop
