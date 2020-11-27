@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">نیازمندان</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">نیازمندان</li>
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
                    <h3 class="card-title">لیست نیازمندان
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="table-responsive p-1 " style="overflow: hidden">
                    <table class="table table-striped" id="table-data2">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>نام سرپرست</th>
                            <th>تعداداعضا</th>
                            <th>دفعات دریافت</th>
                            <th>شماره تماس</th>
                            <th>کد ملی</th>
                            <th>تبعه</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($needy as $l =>$val)
                            <tr>
                                <td>{{$l+1}}.</td>
                                <td>{{$val->name}}</td>
                                <td>
                                    {{\App\Models\ChildNeedy::whereNeedieId($val->id)->count()}}
                                </td>
                                <td>
                                    {{\App\Models\SendNeedy::whereNeedieId($val->id)->count()}}
                                </td>
                                <td>
                                    {{$val->mobile}}
                                </td>
                                <td>
                                    {{$val->person_id}}
                                </td>
                                <td>
                                    @if ($val->is_iranian)
                                        <span class="badge badge-info">
                                            خیر
                                        </span>
                                    @else
                                        <span class="badge badge-primary">
                                            بله
                                        </span>
                                    @endif
                                </td>
                                <td>

                                    <a class="btn btn-sm btn-primary" href="{{route('needy.show',$val->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="{{route('needy.edit',$val->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger trashbtn" data-id="{{$val->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="tfhide" style="border-top:1px dashed black ">
                        <tr>
                            <th></th>
                            <th class="filter">
                                <input id="title" class="form-control" type="text" placeholder="نام و نام خانوادگی">
                            </th>
                            <th class="">
                            </th>
                            <th class="filter">
                            </th>
                            <th class="filter">
                                <input id="status" class="form-control" type="text" placeholder="تلفن همراه">
                            </th>
                            <th class="filter">
                                <input id="status" class="form-control" type="text" placeholder="کد ملی">
                            </th>
                            <th class="filter">
                                <input id="status" class="form-control" type="text" placeholder="وضعیت">
                            </th>
                            <th class="">
                            </th>
                        </tr>
                        </tfoot>
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
            $('.tfhide').hide();

            var table = $("#table-data2").DataTable({

                initComplete: function () {
                    // Apply the search
                    this.api().columns().every(function () {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                        $('select', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                },
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                }]
                ,
                fixedHeader: true,
                language: {
                    "info": " _START_ تا _END_ از _TOTAL_ ",
                    paginate: {
                        next: 'بعدی', // or '→'
                        previous: 'قبلی' // or '←'
                    },
                    "sEmptyTable": "هیچ داده ای در جدول وجود ندارد",
                    "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                    "sInfoEmpty": "نمایش 0 تا 0 از 0 رکورد",
                    "sInfoFiltered": "(فیلتر شده از _MAX_ رکورد)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "نمایش _MENU_ رکورد",
                    "sLoadingRecords": "در حال بارگزاری...",
                    "sProcessing": "در حال پردازش...",
                    "sSearch": "جستجو:",
                    "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
                    "oPaginate": {
                        "sFirst": "ابتدا",
                        "sLast": "انتها",
                        "sNext": "بعدی",
                        "sPrevious": "قبلی"
                    }, "oExport": {
                        "sPrint": "ابتدا",
                    },
                    "oAria": {
                        "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                        "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        text: '<span> کپی کردن</span>',
                    }, {
                        text: '<span> فیلتر </span>',
                        action: function () {
                            $('.tfhide').toggle(500);
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<span> خروجی excel</span>',
                        title: 'لیست نیازمندان'
                    },
                    {
                        extend: 'print',
                        text: '<span> چاپ</span>',
                        title: 'لیست نیازمندان',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl')
                                .prepend(
                                    '<img src="{{ asset('/images/logo.png') }}" style="position:absolute; top:0; right:0;left: 0;margin: 0 auto;display: block;opacity: .05" />'
                                );

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

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
                        url: "{{route('needy.delete')}}",
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
