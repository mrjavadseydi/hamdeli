@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">دوره ها</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item ">گزارشات</li>
                <li class="breadcrumb-item active">دوره ها</li>
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
                        <i class="fa fa-cog"></i>
                        دوره ها
                    </h3>
                </div>

                <div class="card-body pad table-responsive">
                    <div class="row p-2 ">
                        <div class="col-md-2">افزودن دوره جدید:</div>
                        <input type="text" class="form-control col-md-3" id="inputname" placeholder="نام دوره جدید">
                        <button class="btn btn-success col-md-1" id="newplan">افزودن دوره</button>
                    </div>
                    <div class="p-2 m-2 text-center">
                        <h2>
                            دوره فعال :
                            {{\App\Plan::whereId(\Illuminate\Support\Facades\Cache::get('current'))->first()->name}}
                        </h2>
                    </div>
                    <table class="table table-striped" id="table-data2">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>نام دوره</th>
                            <th></th>
                            <th style="width: 40px">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plan as $l =>$val)
                            <tr>
                                <td>{{$l+1}}.</td>
                                <td>{{$val->name}}</td>
                                <td>
                                    @if($val['id']==\Illuminate\Support\Facades\Cache::get('current'))
                                        دوره فعال
                                        @endif
                                </td>
                                <td>

                                    @if($val['id']!=\Illuminate\Support\Facades\Cache::get('current'))
                                        <a href="#" data-id="{{$val->id}}" class="currnt"
                                           style="color: #0055f4;text-decoration: none">
                                            <i class="fa fa-check-circle"></i></a
                                        <a href="#" data-id="{{$val->id}}" class="trashbtn"
                                           style="color: red;text-decoration: none">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endif

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
                        url: "{{route('plan.del')}}",
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
        });
        $(document).on('click', '.currnt', function (e) {
            let _token = $('div[name="destroy"]').attr('content');
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: 'تنظیم به عنوان دوره پیش فرض؟',
                text: "تمامی فعالیت های ثبت شده بعد از این تغییر برای همین دوره خواهند بود",
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
                        url: "{{route('plan.Current')}}",
                        data: {id: id, _token: _token},
                        success: function (data) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'به عنوان دوره پیشفرض انتخاب شد ! ',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function () {
                            }, 1800);

                        }
                    });
                }
            })
        });
        $(document).on('click', '#newplan', function (e) {
            let _token = $('div[name="destroy"]').attr('content');
            e.preventDefault();
            var text = $('#inputname').val();
            if (text.length < 5) {
                Swal.fire({
                    title: 'نام دوره کوتاه است ',
                    icon: 'error',
                })
            } else {
                Swal.fire({
                    title: 'افزودن دوره ؟',
                    text: text + 'به عنوان یک دوره جدید اضافه خواهد شد !',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "خیر!",
                    confirmButtonText: 'بله !'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "{{route('plan.add')}}",
                            data: {text: text, _token: _token},
                            success: function (data) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'دوره جدید اضافه شد !',
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
            }
        });
    </script>

@endsection
