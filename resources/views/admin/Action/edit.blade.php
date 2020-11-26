@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">بررسی فعالیت</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">بررسی فعالیت</li>
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
                        <i class="fa fa-check"></i>
                        بررسی فعالیت
                    </h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger p-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <br>
                    <div class="alert alert-success alert-block p-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @elseif($message = Session::get('danger'))
                    <br>
                    <div class="alert alert-danger alert-block p-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body pad table-responsive">
                    <div class="p-2 m-2">
                        <div class="row p-1">
                            <div class="col-md-6">
                                <span>
                                    عنوان فعالیت:
                                </span>
                                <strong>
                                    {{$action['title']}}
                                </strong>
                            </div>
                            <div class="col-md-6">
                                <span>
                                    طبقه مادر:
                                </span>
                                <strong>
                                    {{$action->MainCategory()->first()->name}}
                                </strong>
                            </div>

                        </div>
                        <div class="row p-1">
                            <div class="col-md-6">
                                <span>
                                    طبقه :
                                </span>
                                <strong>
                                    {{$action->Category()->first()->name}}

                                </strong>
                            </div>
                            <div class="col-md-6">
                                <span>
                                     زیر طبقه :
                                </span>
                                <strong>
                                    {{$action->SubCategory()->first()->name}}
                                </strong>
                            </div>

                        </div>
                        <div class="row p-1">
                            <p class="col-md-6">
                                <span>
                                    دوره  :
                                </span>
                                <strong>
                                    {{\App\Plan::where('id',$action['plan_id'])->first()->name}}
                                </strong>
                            </p>
                            <p class="col-md-6">
                                <span>
                                    کاربر  :
                                </span>
                                <strong>
                                    {{$action->user()->first()->name}}
                                </strong>
                            </p>
                        </div>
                        <div class="p-2">
                            <span>
                                توضیحات:
                            </span>
                            <p>
                                {{$action->description}}
                            </p>
                        </div>

                        @if($action->document()->count()>0)
                            <hr>
                            <h3 class="text-center">مستندات</h3>
                            <div class="table-responsive p-2 col-6">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>ردیف</td>
                                        <td>مشاهده مستند</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($action->document()->get() as $r => $m)
                                        <tr>
                                            <td>{{$r+1}}</td>
                                            <td>
                                                <a href="{{asset('UserDocument')."/$m->file"}}">
                                                  <span class="badge badge-info">
                                                جهت مشاهده کلیک کنید
                                                  </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <hr>
                        <h3 class="text-center">وضعیت فعالیت</h3>

                        <form action="{{route('ActionPanel.update',$action->id)}}" method="post">
                            @method('put')
                            @csrf
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="pt-2">
                                            <p>وضعیت فعالیت :
                                                @if($action->status==0)
                                                    <span class="badge badge-danger">
                                    نیاز به بررسی
                                            </span>
                                                @elseif($action->status==1)
                                                    <span class="badge badge-success">
                                تایید شد!
                                         </span>
                                                @else
                                                    <span class="badge badge-warning">
                                رد شده
                                        </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">

                                        @if($action->status==1)
                                            <div class="d-flex">
                                                <span class="pt-2">
                                            امتیاز دریافتی :
                                                    </span>
                                                <input type="number" class="form-control col-8 d-inline" name="point"
                                                       value="{{$action->points}}">
                                            </div>
                                        @elseif($action->status==2)
                                            <div class="pt-1">
                                            امتیاز دریافتی :
                                            <span class="badge badge-danger">
                                                0
                                                </span>
                                            </div>
                                        @else

                                            <div class="d-flex">
                                                <div class="col-4 pt-2">
                                                    <span class="">تغییر وضعیت :</span>
                                                </div>
                                                <div class="col-8">

                                                    <SELECT class="form-control" name="status" id="select-status">
                                                        <option value="1">تایید</option>
                                                        <option value="2">رد
                                                        </option>
                                                    </SELECT>
                                                </div>

                                            </div>

                                        @endif

                                    </div>

                                    <div id="reason" class="w-100">
                                        <div class=" col-12">
                                            <label for="exampleFormControlTextarea1">علت رد:</label>
                                            <textarea dir="rtl" class="form-control" name="reason"
                                                      rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                @if($action->status==2)
                                    <div class="d-flex">
                                        <div class="col-md-8">
                                            <div class="p-2">

                                                علت رد :
                                                <strong>
                                                    {{$action->Status()->first()->description}}
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-2">

                                                رد شده توسط :
                                                <strong>
                                                        <span class="badge badge-info">
                                                            {{$action->Status()->first()->User()->first()->name}}
                                                        </span>
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if($action->status==0)
                                <div id="pp">
                                    <div class="d-flex">
                                        <div class="col-md-6 pt-1">
                                            <div class="pt-2">
                                                حداکثر امتیاز برای این فعالیت
                                                <span
                                                    class="badge badge-warning">{{$action->SubCategory()->first()->max_point}}</span>
                                                و حداقل امتیاز
                                                <span
                                                    class="badge badge-warning">{{$action->SubCategory()->first()->min_point}}</span>
                                                میباشد!
                                            </div>
                                        </div>
                                        <div class="d-flex w-100">
                                                <span class="col-4 pt-2">
                                            امتیاز دریافتی :
                                                    </span>
                                            <input type="number" class="form-control pr-1 col-8 d-inline" style="float: right" name="point"
                                                    name="point" placeholder="امتیاز دریافتی " type="number"
                                                   max="{{$action->SubCategory()->first()->max_point}}"
                                                   min="{{$action->SubCategory()->first()->min_point}}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($action->status==0||$action->status==1)
                                <input type="hidden" value="{{$action->status}}" name="st">
                                <input type="submit" class="btn btn-success" value="ثبت!">
                            @endif
                        </form>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    <script>
        $('#reason').hide();

        $('#select-status').change(function () {
            var v = $('#select-status').val();
            if (v == '2') {
                $('#reason').show();
                $('#pp').hide();
            } else {
                $('#reason').hide();
                $('#pp').show();
            }
        })
    </script>

@endsection
