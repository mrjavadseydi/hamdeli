@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">کاربران</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item ">گزارشات</li>
                <li class="breadcrumb-item active">کاربران</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
{{--filter--}}
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
                                    <label>نام و نام خانوادگی:</label>
                                    <input type="text" class="form-control" placeholder="نام و نام خانوادگی " name="name">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>شماره دانشجویی:</label>
                                    <input type="text" class="form-control" placeholder="شماره دانشجویی" name="stunumber">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>کد ملی:</label>
                                    <input type="text" class="form-control" placeholder="کدملی" name="natnumber">
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
{{--                        <div class="col-md-4">--}}
{{--                            <button id="copy" class="btn btn-outline-primary " onclick="s1()">--}}
{{--                                <i class="fa fa-copy"></i>--}}
{{--                                کپی محتوا--}}
{{--                            </button>--}}
{{--                            <button id="ExportReporttoExcel" class="btn btn-outline-success " onclick="s2()">--}}
{{--                                <i class="fa fa-file-excel-o"></i>--}}
{{--                                دریافت خروجی اکسل--}}
{{--                            </button>--}}
{{--                        </div>--}}
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
            {{--!filter--}}

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-user"></i>
                        کاربران
                    </h3>
                </div>

                <div class="card-body pad table-responsive">
                    <table class="table table-striped" id="table-data2">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره دانشجویی</th>
                            <th>تلفن تماس</th>
                            <th>همه امتیاز کسب شده</th>
                            <th>امتیاز کسب این دوره</th>
                            <th>فعالیت های ثبت شده</th>
                            <th>دسترسی</th>
                            <th style="width: 40px">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $l =>$val)
                            <tr>
                                <td>{{$l+1}}.</td>
                                <td>{{$val->name}}</td>
                                <td>
                                    {{$val->meta()->first()->student_number}}
                                </td>
                                <td>
                                    {{$val->meta()->first()->mobile}}
                                </td>
                                <td>
                                    {{$val->Action()->where('status',1)->sum('points')}}
                                </td>
                                <td>
                                    {{$val->Action()->where([['status',1],['plan_id',\Illuminate\Support\Facades\Cache::get('current')]])->sum('points')}}
                                </td>
                                <td>
                                    <span class="badge badge-success">{{$val->Action()->where('status',1)->count()}}</span>

                                </td>
                                <td>
                                    {{\App\permission::where('user_id',$val->id)->count()>0 ? 'مدیریت':'دانشجو'}}
                                </td>
                                <td>
                                    <a href="{{route('ActionPanel.index')}}?user={{$val->id}}"
                                       style="color:#7330d2 ;text-decoration: none">
                                        <i class="fa fa-filter"></i>
                                    </a>
                                    <a href="{{route('User.show',$val->id)}}"
                                       style="color:cornflowerblue;text-decoration: none">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('User.edit',$val->id)}}"
                                       style="color:orange;text-decoration: none">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card -->
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
                "pageLength": 10,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Persian.json"
                }
            });
        });

    </script>

@endsection
