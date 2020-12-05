@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ثبت اهدا</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">ثبت اهدا</li>
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
                    <h3 class="card-title">ثبت اهدا
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('send.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-100">
                            <label for="recipient-name" class="col-form-label text-right">عنوان :</label>
                            <input type="text" class="form-control w-100" id="recipient-name" name="title"
                                   value="" required>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <span style="">نیازمندان:</span>
                                <select class="js-example-basic-multiple form-control" required name="needy[]"
                                        multiple="multiple">
                                    @foreach(\App\Models\Needy::all() as $g)
                                        <option value="{{$g['id']}}">{{$g['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <span style=""> منابع:</span>
                                <select class="js-example-basic-multiple form-control" required name="resource[]"
                                        multiple="multiple">
                                    @foreach(\App\Models\Donations::where('status',1)->get() as $g)
                                        <option value="{{'d-'.$g['id']}}">
                                            ({{$g['title']}})
                                            خیر
                                            {{\App\Models\Donator::whereId($g['donator_id'])->first()->name}}
                                        </option>
                                    @endforeach
                                    @foreach(\App\Models\Receipt::where('status',1)->get() as $g)
                                        <option value="{{'m-'.$g['id']}}">
                                            {{number_format($g['amount'])}}
                                            ریال
                                            خیر
                                            {{\App\Models\Donator::whereId($g['donator_id'])->first()->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chilename" class="col-form-label text-right">تاریخ :</label>
                                    <input type="text" required class="form-control normal-example" value=""
                                           id="chilename"
                                           name="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label>تصاویر و فایل های اهدا :</label>

                                    <input type="file" name="file[]" class="custom-file-input"
                                           onchange="document.getElementById('lablefile').innerHTML ='فایل انتخاب شد !'"
                                           id="exampleInputFile"
                                           multiple>
                                    <label class="custom-file-label" id="lablefile" for="exampleInputFile"
                                           style="top: 37px;">انتخاب
                                        فایل</label>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name1" class="col-form-label text-right">مبلغ مازاد استفاده شده
                                    :</label>
                                <input type="number" class="form-control " id="recipient-name1" name="extera_money"
                                       value="0" required>
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <label for="status" class="col-form-label text-right">توضیحات کامل :</label>
                            <textarea class="form-control w-100" id="status" name="description" required></textarea>
                        </div>
                        <div class="form-group w-100">
                            <label for="status" class="col-form-label text-right">توضیحات مبلغ مازاد :</label>
                            <textarea class="form-control w-100" id="status" name="extera_description"
                                      required></textarea>
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

    <script src="{{asset('AdminAsset/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',
                width: 'resolve'
            });
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script src="{{asset('AdminAsset/dist/js/persian-date.min.js')}}"></script>
    <script src="{{asset('AdminAsset/dist/js/persian-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.normal-example').persianDatepicker({
                format: 'YYYY/MM/DD',
            });

        });
    </script>
@endsection
