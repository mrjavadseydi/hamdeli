@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">لیست فعالیت </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">لیست فعالیت</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection
@section('content')
    <style>
        #table-data2_filter {
            float: left;
            padding: 10px;
        }
    </style>
    <div class="col-12">
        <!-- jQuery Knob -->
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-filter"></i>
                    فیلتر
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: none;">
                <form method="get">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>عنوان فعالیت:</label>
                                <input type="text" class="form-control" placeholder="عنوان فعالیت " name="title">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>کاربر:</label>
                                <input type="text" class="form-control" placeholder="کاربر" name="userinfo">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>طبقه مادر :</label>
                                <select class="form-control" name="main">
                                    <option value="-1">
                                        انتخاب کنید
                                    </option>
                                    @foreach($maincategory as $d)
                                        <option value="{{$d->id}}">
                                            {{$d->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>طبقه :</label>
                                <select class="form-control" name="category">
                                    <option value="-1">
                                        انتخاب کنید
                                    </option>
                                    @foreach($category as $d)
                                        <option value="{{$d->id}}">
                                            {{$d->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>زیر طبقه :</label>
                                <select class="form-control" name="subcategory">
                                    <option value="-1">
                                        انتخاب کنید
                                    </option>
                                    @foreach($subcategory as $d)
                                        <option value="{{$d->id}}">
                                            {{$d->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>وضعیت :</label>
                                <select class="form-control" name="status">
                                    <option value="-1">
                                        انتخاب کنید
                                    </option>
                                    <option value="0">
                                        در انتظار بررسی
                                    </option>
                                    <option value="1">
                                        تایید شده
                                    </option>
                                    <option value="2">
                                        رد شده
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-success" value="فیلتر کن">
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <button id="copy" class="btn btn-outline-primary " onclick="s1()">
                            <i class="fa fa-copy"></i>
                            کپی محتوا
                        </button>
                        <button id="ExportReporttoExcel" class="btn btn-outline-success " onclick="s2()">
                            <i class="fa fa-file-excel-o"></i>
                            دریافت خروجی اکسل
                        </button>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">لیست فعالیت
                        @if(request()->has('user'))
                            کاربر
                            {{\App\User::whereId(request('user'))->first()->name}}
                        @endif
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="table-responsive">
                <table class="table table-striped" id="table-data2">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>عنوان فعالیت</th>
                        {!! request()->has('user') ?'':"<th>کاربر</th>" !!}

                        <th>تاریخ فعالیت</th>
                        <th>طبقه مادر</th>
                        <th>زیر طبقه</th>
                        <th>وضعیت</th>
                        <th>امتیاز دریافتی</th>
                        <th style="width: 40px">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($action as $l =>$val)
                        <tr>
                            <td>{{$l+1}}.</td>
                            <td>{{$val->title}}</td>
                            @if(!request()->has('user'))
                                <td>
                                    {{$val->User()->first()->name}}
                                </td>
                            @endif
                            <td>
                                {{$val->date}}
                            </td>
                            <td>
                                {{$val->MainCategory()->first()->name}}
                            </td>
                            <td>
                                {{$val->SubCategory()->first()->name}}
                            </td>
                            <td>
                                @if($val->status==0)
                                    <span class="badge bg-danger">نیاز به بررسی</span>
                                @elseif($val->status==1)
                                    <span class="badge badge-success">تایید شده</span>
                                @elseif($val->status==2)
                                    <span class="badge badge-danger">رد شده</span>
                                @endif
                            </td>
                            <td>{{$val->status==1 ? $val->points : 0}}</td>
                            <td>
                                <a href="{{route('ActionPanel.edit',$val->id)}}"
                                   style="color: orange;text-decoration: none">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="trashbtn" data-id="{{$val->id}}" style="color: red;text-decoration: none">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('plugin/datatables.js')}}"></script>
    <script>
        $(document).ready(function () {
            var table = $("#table-data2").DataTable({
                "bLengthChange": false,
                'searching': false,
                "pageLength": 10,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Persian.json"
                }, buttons: [
                    {
                        extend: 'excel', extend: 'copy',
                    }
                ]
            });
            $("#ExportReporttoExcel").on("click", function () {
                table.button('.buttons-excel').trigger();
            });
            $("#copy").on("click", function () {
                table.button('.buttons-copy').trigger();
            });
        });

    </script>
    <script src="{{asset('plugin/sweetalert.js')}}"></script>
    <script>
        function s1() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'با موفقیت کپی شد!',
                showConfirmButton: false,
                timer: 1500
            })
        }

        function s2() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'خروجی با موفقیت گرفته شد!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
    <script src="{{asset('plugin/sweetalert.js')}}"></script>
    <script>
        $(document).on('click', '.trashbtn', function (e) {
            let _token = $('div[name="destroy"]').attr('content');
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: 'آیا  اطمینان دارید ؟',
                text: "آیا از حذف این رکورد اطمینان دارید ؟ این دیتا قابل بازیابی نخواهد بود !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "خیر منصرف شدم!",
                confirmButtonText: 'بله !'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('act.del')}}",
                        data: {id: id, _token: _token},
                        success: function (data) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'حذف رکورد از دیتابیس با موفقیت انجام شد !',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function () {
                                window.location.reload();
                            }, 1800);

                        }
                    });
                }
            })
            // function() {
            //
            // });
        });
    </script>
@endsection
