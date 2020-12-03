@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">تنظیمات سایت</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">تنظیمات سایت</li>
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
                    <h3 class="card-title">تنظیمات سایت
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('option.update',1)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group w-100">
                            <label for="recipient-name" class="col-form-label text-right">عنوان سایت :</label>
                            <input type="text" class="form-control w-100" id="recipient-name" name="title"
                                   value="{{getOption('title')}}" required>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">عنوان ایکون اول :</label>
                                <input type="text" required class="form-control " value="{{getOption('title1')}}"
                                       name="title1">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">عنوان ایکون دوم :</label>
                                <input type="text" required class="form-control " value="{{getOption('title2')}}"
                                       name="title2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">عنوان ایکون سوم :</label>
                                <input type="text" required class="form-control " value="{{getOption('title3')}}"
                                       name="title3">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">توضیح ایکون اول :</label>
                                <input type="text" required class="form-control " value="{{getOption('des1')}}"
                                       name="des1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">توضیح ایکون دوم :</label>
                                <input type="text" required class="form-control " value="{{getOption('des2')}}"
                                       name="des2">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">توضیح ایکون سوم :</label>
                                <input type="text" required class="form-control " value="{{getOption('des3')}}"
                                       name="des3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">عنوان نحوه کار :</label>
                                <input type="text" required class="form-control " value="{{getOption('work1')}}"
                                       name="work1">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">توضیح نحوه کار :</label>
                                <input type="text" required class="form-control " value="{{getOption('work2')}}"
                                       name="work2">
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <label for="recipient-name" class="col-form-label text-right">اعلان پین شده (شماره حساب یا موارددیگر) :</label>
                            <input type="text" class="form-control w-100" id="recipient-name" name="bank"
                                   value="{{getOption('bank')}}" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">نام مدیر سایت :</label>
                                <input type="text" required class="form-control " value="{{auth()->user()->name}}"
                                       name="nameAdmin">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label text-right">رمز عبور :</label>
                                <input type="text"  class="form-control "
                                       name="password">
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <label for="status" class="col-form-label text-right">توضیحات زیر عنوان سایت :</label>
                            <textarea class="form-control w-100" id="status" name="sitedes" required>{{getOption('sitedes')}}
                            </textarea>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success">
                                ذخیره
                            </button>
                        </div>
                        <br>

                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')

@endsection
