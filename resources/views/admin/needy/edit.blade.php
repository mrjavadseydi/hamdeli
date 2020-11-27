@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش نیازمند</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active"> ویرایش نیازمند</li>
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
                    <h3 class="card-title">ویرایش نیازمند
                    </h3>

                </div>
                <div class="card-body">

                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label text-right">نام و نام خانوادگی :</label>
                        <input type="text" class="form-control" id="recipient-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-form-label text-right">تلفن همراه :</label>
                        <input type="number" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <div class="form-check text-center pb-2">
                        <input type="checkbox" class="form-check-input" name="is_iranian" onchange="f1()"
                               id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">اتباع هستم</label>
                    </div>
                    <div class="form-group">
                        <label for="personid" id="lablenat" class="col-form-label text-right">کد ملی :</label>
                        <input type="number" class="form-control" id="personid" name="person_id" required>
                    </div>
                    <div class="form-group">
                        <label for="bank" class="col-form-label text-right">شماره حساب / شماره کارت بانکی
                            سرپرست خانوار:</label>
                        <input type="text" class="form-control" id="bank" name="bank_info" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label text-right">آدرس:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-outline-primary text-center" type="button" onclick="f2()">افزودن فرد تحت
                            تکلف
                        </button>
                    </div>
                    <span class="next"></span>
                    <div class="form-group">
                        <label for="status" class="col-form-label text-right">شرایط زندگی :</label>
                        <textarea class="form-control" id="status" name="status" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="leader" class="col-form-label text-right">وضعیت شغلی سرپرست خانواده (به صوت
                            کلی و در شرایط کرونا) :</label>
                        <textarea class="form-control" id="leader" name="leader_status" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="introduc" class="col-form-label text-right">اطلاعات معرف :</label>
                        <textarea class="form-control" id="introduc" name="introduc" required></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">ویرایش</button>


                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
@endsection
