@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">مشاهده برنامه </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('adminPanel') }}">خانه</a></li>
                <li class="breadcrumb-item active">مشاهده برنامه </li>
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
                    <h3 class="card-title">مشاهده برنامه
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>عنوان برنامه :</h6>
                            <p>
                                {{ $plan->title }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>اهداف برنامه :</h6>
                            <p>
                                {{ $plan->description }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <h6>
                        وضعیت:
                    </h6>
                    @if ($plan->status == 1)
                        <span class="badge badge-info">
                            ارجاع به مجری
                        </span>
                    @elseif($plan->status==2)
                        <span class="badge badge-primary">
                            ارجاع به شما
                        </span>
                    @else
                        <span class="badge badge-success">
                            پایان یافته
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">ارسال مستندات
                </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST"  enctype="multipart/form-data" action="{{route('userplan.upload')}}">
                <div class="custom-file">
                    <input type="file" name="files[]" multiple class="custom-file-input" accept="image/*" d="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                @csrf
                <input type="hidden" value="{{$group->id}}" name="id">
                  <div class="col-3 p-2">
                      <input type="submit" class="btn btn-success" value="ثبت">
                  </div>
                </form>
            </div>
        </div>
    </div>
    @if (count($file)>0)
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">مستندات
                </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">فایل</th>
                        <th scope="col">حذف</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($file as $i => $fi)

                        @endforeach
                      <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>
                            <a href="{{asset('/').$fi->file}}">
                            <span class="badge badge-info">
                                برای مشاهده کلیک کنید
                            </span>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" href="{{route('userplan.deleteFile',$fi->id)}}">
                                حذف
                            </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
    @endif

    <!-- /.col -->
    </div>
@endsection
@section('script')

    <script src="{{ asset('AdminAsset/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',
                width: 'resolve'
            });
            $('.js-example-basic-multiple').select2();
        });

    </script>
    <script src="{{ asset('AdminAsset/dist/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('AdminAsset/dist/js/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.normal-example').persianDatepicker({
                format: 'YYYY/MM/DD',
            });

        });

    </script>
@endsection
