@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">مشاهده کاربر</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item"><a href="{{route('User.index')}}">کاربران</a></li>
                <li class="breadcrumb-item active">مشاهده کاربر</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-user"></i>
                        مشاهده کاربر
                    </h3>
                </div>

                <div class="card-body pad table-responsive">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <span>
                                نام و نام خانوادگی:
                            </span>
                            <strong>
                                {{$user->name}}
                            </strong>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <span>
                                شماره دانشجویی:
                            </span>
                            <strong>
                                {{$user->meta()->first()->student_number}}
                            </strong>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <span>
                                کد ملی:
                            </span>
                            <strong>
                                {{$user->meta()->first()->national_number}}
                            </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <span>
                                نام و نام خانوادگی (لاتین):
                            </span>
                            <strong>
                                {{$user->meta()->first()->name_en}}
                            </strong>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <span>
                                مقطع:
                            </span>
                            <strong>
                                {{$user->meta()->first()->class}}

                            </strong>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <span>
                                رشته:
                            </span>
                            <strong>
                                {{$user->meta()->first()->field_study}}
                            </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <span>
                                تلفن همراه :
                            </span>
                            <strong>
                                {{$user->meta()->first()->mobile}}
                            </strong>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <span>
                                ایمیل:
                            </span>
                            <strong>
                                {{$user->email}}
                            </strong>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <span>
                                تاریخ تولد:
                            </span>
                            <strong>
                                {{$user->meta()->first()->birthday}}

                            </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <span>
                                تعداد فعالیت های ثبت شده :
                            </span>
                            <strong>
                                {{$user->Action()->count()}}
                            </strong>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <span>
                                تعداد فعالیت های تایید شده :
                            </span>
                            <strong>
                                {{$user->Action()->where('status',1)->count()}}
                            </strong>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <span>
                                امتیاز دریافت شده :
                            </span>
                            <strong>
                                {{$user->Action()->where('status',1)->sum('points')}}
                            </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <a href="" class="btn btn-primary">
                                ورود در قالب این کاربر
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <a href="{{route('User.edit',$user->id)}}" class="btn btn-warning">
                                ویرایش اطلاعات کاربر
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <a href="{{route('ActionPanel.index')}}?user={{$user->id}}" class="btn btn-success">
                                نمایش فعالیت های این کاربر
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
