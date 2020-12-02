@extends('donator.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">لیست کمک های من</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('panel')}}">خانه</a></li>
                <li class="breadcrumb-item active">لیست کمک های من</li>
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
            @if (isset($money))

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title d-inline">لیست کمک های من
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="table-responsive p-1 " style="overflow: hidden">
                        <table class="table table-striped" id="table-data2">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>مبلغ</th>
                                <th>کد رهگیری</th>
                                <th>توضیحات</th>
                                <th>وضعیت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($money as $l =>$val)
                                <tr>
                                    <td>{{$l+1}}.</td>
                                    <td>
                                        {{number_format($val->amount)}}
                                    </td>
                                    <td>
                                        {{$val->tracking}}
                                    </td>
                                    <td>
                                        {{mb_substr($val->description,0,25,'UTF-8')}}...

                                    </td>
                                    <td>
                                        @if ($val->status == 1)
                                            <span class="badge badge-success">
                                           دریافت شده
                                        </span>
                                        @elseif ($val->status == 0 )

                                            <span class="badge badge-warning">
                                         در حال پیگیری
                                        </span>
                                        @elseif ($val->status == 2 )
                                            <a href="{{route('sn.show',\App\Models\SendDetails::where([['Source_id',$val->id],['source_type',1]])->first()->send_id)}}">

                                            <span class="badge badge-primary">
                                          استفاده شده
                                        </span>
                                            </a>
                                        @else
                                            <span class="badge badge-danger">
                                          عدم دریافت
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="tfhide" style="border-top:1px dashed black ">
                            <tr>
                                <th></th>
                                <th class="">
                                    <input class="form-control" type="text" placeholder="مبلغ ">
                                </th>
                                <th class="filter">
                                    <input class="form-control" type="text" placeholder="کد رهگیری ">
                                </th>
                                <th class="filter">
                                    <input class="form-control" type="text" placeholder="توضیحات">
                                </th>
                                <th class="filter">
                                    <input class="form-control" type="text" placeholder="وضعیت">
                                </th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @else

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title d-inline">لیست کمک های من
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="table-responsive p-1 " style="overflow: hidden">
                        <table class="table table-striped" id="table-data1">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>عنوان</th>
                                <th>توضیحات</th>
                                <th>وضعیت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($donation as $l =>$val)
                                <tr>
                                    <td>{{$l+1}}.</td>
                                    <td>
                                        {{$val->title}}
                                    </td>
                                    <td>
                                        {{mb_substr($val->description,0,25,'UTF-8')}}...

                                    </td>
                                    <td>
                                        @if ($val->status == 1)
                                            <span class="badge badge-success">
                                           دریافت شده
                                        </span>
                                        @elseif ($val->status == 0 )

                                            <span class="badge badge-warning">
                                                                                   در حال پیگیری

                                        </span>
                                        @elseif ($val->status == 2 )
                                            <a href="{{route('sn.show',\App\Models\SendDetails::where([['Source_id',$val->id],['source_type',2]])->first()->send_id)}}">
                                            <span class="badge badge-primary">
                                          استفاده شده
                                        </span>
                                            </a>
                                        @else
                                            <span class="badge badge-danger">
                                          عدم دریافت
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="tfhide" style="border-top:1px dashed black ">
                            <tr>
                                <th></th>
                                <th class="">
                                    <input class="form-control" type="text" placeholder="عنوان ">
                                </th>
                                <th class="filter">
                                    <input class="form-control" type="text" placeholder="توضیحات">
                                </th>
                                <th class="filter">
                                    <input class="form-control" type="text" placeholder="وضعیت">
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endif
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

            });

        });
        $(document).ready(function () {
            $('.tfhide').hide();

            var table = $("#table-data1").DataTable({

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

            });

        });
    </script>

@endsection
