@extends('admin.master.master')
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
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">نیازمندان </span>
                    <span class="info-box-number">
                        {{\App\Models\Needy::count()}}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa fa-envelope-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">تعداد کل اعضای نیازمند</span>
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
        <div class="col-md-3 col-sm-6 col-12">
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
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fa fa-star-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">موجودی</span>
                    <span class="info-box-number">
                        {{number_format(\App\Models\Receipt::where('status',1)->sum('amount'))}} ریال
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
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
                    @can('executer')
                    @foreach(\App\Models\Plan::where('status',1)->get() as $g)
                        <div class="alert alert-info" role="alert">
                            <p>
                                مجری محترم برنامه ای با عنوان
                            {{$g->title}}
                             ایجاد و نیازمند بررسی توسط شماست .
                             لطفا روی
                                <a href="{{route('ExePlan.show',$g->id)}}">
                                    این لینک
                                </a>

                             کلیک کنید
                            </p>
                        </div>
                    @endforeach
                    @endcan
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
