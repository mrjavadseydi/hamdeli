@extends('donator.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">لیست اخرین کمک رسانی ها</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('panel')}}">خانه</a></li>
                <li class="breadcrumb-item active">لیست اخرین کمک رسانی ها</li>
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
                    <h3 class="card-title">کمک رسانی ها
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="table-responsive p-1 " style="overflow: hidden">
                    <table class="table table-striped" id="table-data2">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>عنوان</th>
                            <th>تعداد دریافت کنندگان</th>
                            <th>مبلغ مصرف شده</th>
                            <th>تعداد منابع غیرنقدی</th>
                            <th>تاریخ</th>
                            <th>تعداد پیوست</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($send as $l =>$val)
                            <tr>
                                <td>{{$l+1}}.</td>
                                <td>{{mb_substr($val->title,0,15,'UTF-8')."..."}}</td>
                                <td>
                                    {{\App\Models\SendNeedy::whereSendId($val->id)->count()}}
                                </td>
                                <td>
                                    {{number_format(\App\Models\Receipt::whereIn('id',\App\Models\SendDetails::where([['send_id',$val->id],['Source_type',1]])->get('Source_id'))->sum('amount')+$val->extera_money)}} ریال

                                </td>
                                <td>
                                    {{\App\Models\SendDetails::where([['source_type',2],['send_id',$val->id]])->count()}}
                                </td>
                                <td>
                                    {{$val->date}}
                                </td>
                                <td>
                                    {{\App\Models\SendFile::whereSendId($val->id)->count()}}
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{route('sn.show',$val->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="tfhide" style="border-top:1px dashed black ">
                        <tr>
                            <th></th>
                            <th class="filter">
                                <input id="title" class="form-control" type="text" placeholder="عنوان">
                            </th>
                            <th class="">
                                <input id="status" class="form-control" type="text" placeholder="تعداد دریافت کنندگان">
                            </th>
                            <th class="filter">
                                <input id="status" class="form-control" type="text" placeholder="منابع نقدی">
                            </th>
                            <th class="filter">
                                <input id="status" class="form-control" type="text" placeholder="منابع غیر نقدی">
                            </th>
                            <th class="filter">
                                <input id="status" class="form-control" type="text" placeholder="تاریخ">
                            </th>
                            <th class="filter">
                                <input id="status" class="form-control" type="text" placeholder="تعداد پیوست">
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

            });

        });

    </script>

@endsection
