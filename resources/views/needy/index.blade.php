@extends('needy.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">داشبورد</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('panel')}}">خانه</a></li>
                <li class="breadcrumb-item active">داشبورد</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection
@section('content')
    <style>
        .dt-buttons {
            float: left;
            padding: 10px;
        }

        .dt-buttons button {
            margin: 3px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">


                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title d-inline">داشبورد
                        </h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>

        </div>
    </div>
    <!-- /.col -->
    </div>
@endsection
@section('script')

@endsection
