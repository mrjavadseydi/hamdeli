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
                    <form action="{{route('option.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pt-2">
                                    <label for="exampleFormControlSelect1" class=" text-right">رنگ اطلاع
                                        رسانی:</label>
                                    <select class="form-control text-left" id="exampleFormControlSelect1"
                                            name="type"
                                            style="direction: ltr">
                                        <option value="alert-primary">آبی</option>
                                        <option value="alert-secondary">خاکستری</option>
                                        <option value="alert-success">سبز</option>
                                        <option value="alert-danger">قرمز</option>
                                        <option value="alert-warning">زرد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chilename" class="col-form-label text-right">تاریخ :</label>
                                    <input type="text" required class="form-control normal-example" value=""
                                           id="chilename"
                                           name="date">
                                </div>
                            </div>
                        </div>

                        <div class="form-group w-100">
                            <label for="status" class="col-form-label text-right">اعلان :</label>
                            <textarea class="form-control w-100" id="status" name="description" required></textarea>
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
    <script src="{{asset('Adminasset/dist/js/persian-date.min.js')}}"></script>
    <script src="{{asset('Adminasset/dist/js/persian-datepicker.min.js')}}"></script>
    <script src="{{asset('Adminasset/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.normal-example').persianDatepicker({
                format: 'YYYY/MM/DD',
            });

            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',
                width: 'resolve'
            });
            $('.js-example-basic-multiple').select2();

        });
    </script>
@endsection
