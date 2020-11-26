@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ثبت طبقات</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">ثبت طبقات</li>
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
                        <i class="fa fa-pencil"></i>
                        ثبت طبقات
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

                <div class="card-body pad ">
                    <label for="chose">نوع طبقه</label>
                    <div class="form-group">
                        <select id="chose" class="form-control">
                            <option value="0">انتخاب کنید!</option>
                            <option value="1">طبقه مادر</option>
                            <option value="2">طبقه</option>
                            <option value="3">زیر طبقه</option>
                        </select>
                    </div>
                    <div class="main-category">
                        <h4 class="text-center">ساخت طبقه مادر</h4>
                        <form action="{{route('category.store')}}" method="post">
                            <input type="hidden" name="type" value="main">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="نام طبقه">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="ثبت" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                    <div class="category">
                        <h4 class="text-center">ساخت طبقه</h4>

                        <form action="{{route('category.store')}}" method="post">
                            <input type="hidden" name="type" value="category">

                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="category1">
                                        نام طبقه
                                    </label>
                                    <input type="text" name="name" id="category1" class="form-control" required
                                           placeholder="نام طبقه">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="main1">
                                        طبقه مادر
                                    </label>
                                    <select class="form-control" id="main1" name="main">
                                        @foreach($main_category as $m)
                                            <option value="{{$m->id}}">{{$m->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="ثبت" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                    <div class="subcategory">
                        <h4 class="text-center">ساخت زیر طبقه</h4>

                        <form action="{{route('category.store')}}" method="post">
                            <input type="hidden" name="type" value="sub">

                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="category1">
                                        نام زیر طبقه
                                    </label>
                                    <input type="text" name="name" id="category1" class="form-control" required
                                           placeholder="نام طبقه">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="main3">
                                        طبقه
                                    </label>
                                    <select class="form-control" id="main3" name="category">
                                        @foreach($category as $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6 col-sm-12 row">
                                    <div class="form-group col-6">
                                        <label for="category1">
                                            حداقل امتیاز
                                        </label>
                                        <input type="number" name="min" id="category1" class="form-control" required
                                               placeholder="   حداقل امتیاز">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="category1">
                                            حداکثر امتیاز
                                        </label>
                                        <input type="number" name="max" id="category1" class="form-control" required
                                               placeholder=" حداکثر امتیاز">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="ثبت" class="btn btn-success">
                            </div>
                        </form>
                    </div>

                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        @endsection
        @section('script')
            <script>
                $('.main-category').hide();
                $('.category').hide();
                $('.subcategory').hide();
                $('#valed').hide()
                $('#chose').change(function () {
                    var v = $('#chose').val();
                    if (v == '0') {
                        $('.main-category').hide();
                        $('.category').hide();
                        $('.subcategory').hide();
                    } else if (v == '1') {
                        $('.main-category').show();
                        $('.category').hide();
                        $('.subcategory').hide();
                    } else if (v == '2') {
                        $('.main-category').hide();
                        $('.category').show();
                        $('.subcategory').hide();
                    } else if (v == '3') {
                        $('.main-category').hide();
                        $('.category').hide();
                        $('.subcategory').show();
                    }
                })
                $('#main2').change(function () {
                    var v = $('#main2').val();
                    if (v == '-1') {
                        $('#valed').hide();
                    } else if (v == '0') {
                        $('#valed').show();
                    }
                })
            </script>
@endsection
