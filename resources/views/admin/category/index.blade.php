@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">لیست طبقات</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">لیست طبقات</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection
@section('content')
    <style>
        .dt-buttons{
            float: left;
            padding: 10px;
        }
        .dt-buttons button{
            margin: 3px;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">لیست طبقات مادر </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-striped" id="table-data">
                  <thead>
                  <tr>
                      <th style="width: 10px">#</th>
                      <th>نام طبقه</th>
                      <th style="width: 100px">عملیات</th>
                  </tr>
                  </thead>
                        <tbody>
                        @foreach($main_category as $i =>$val)
                        <tr>
                            <td>{{$i+1}}.</td>
                            <td> {{$val->name}}</td>
                            <td>
                                <a href="{{route('category.list')}}?id={{$val->id}}" style="color: #7330d2;text-decoration: none">
                                    <i class="fa fa-filter"></i>
                                </a>
                                <a href="{{route('category.edit',$val->id."&1")}}" style="color: orange;text-decoration: none">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" data-id="{{$val->id}}" class="trashbtn" style="color: red;text-decoration: none">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('plugin/datatables.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#table-data").DataTable({
                "ordering": false,
                "info":     false,
                "searching": false,
                "bLengthChange": false,

                "info": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Persian.json"
                },"language": {
                    "paginate": {
                        "next": ">>",
                        "previous": "<<"
                    }
                },
            });
            $("#table-data1").DataTable({
                "ordering": false,
                "info":     false,
                "searching": false,
                "info": false,
                "bLengthChange": false,

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Persian.json"
                },
                "language": {
                    "paginate": {
                        "next": ">>",
                        "previous": "<<"
                    }
                },
            });
            $("#table-data2").DataTable({
                "ordering": false,
                "info":     false,
                "searching": false,
                "info": false,
                "bLengthChange": false,

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Persian.json"
                },
                "language": {
                    "paginate": {
                        "next": ">>",
                        "previous": "<<"
                    }
                },
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
                        url: "{{route('category.del')}}",
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
