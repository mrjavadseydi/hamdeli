@extends('donator.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">داشبورد</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">داشبورد</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-12 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">تعداد خانواده های نیازمند  </span>
                    <span class="info-box-number">
                        {{\App\Models\Needy::count()}}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa fa-envelope-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">تعداد کل نیازمندان</span>
                    <span class="info-box-number">
                       {{\App\Models\Needy::count()+\App\Models\ChildNeedy::count()}}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-4 col-sm-12 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fa fa-warning"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">خیرین</span>
                    <span class="info-box-number">
                        {{\App\Models\Donator::count()}}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-dashboard"></i>
                        داشبورد
                    </h3>
                </div>

                <div class="card-body pad table-responsive">
                    <h4>اطلاع رسانی</h4>
                    @foreach(\App\Models\Info::orderby('date','desc')->get() as $i=> $l)
                        <div class="alert {{$l->type}}" role="alert">
                            {{$l->description}}
                        </div>
                    @endforeach
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
