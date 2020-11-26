@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش  طبقات</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">ویرایش طبقات</li>
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
                        <i class="fa fa-edit"></i>
                        ویرایش طبقات
                    </h3>
                </div>

                <div class="card-body pad table-responsive">
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

                    @if($type==1)
                            <div class="main-category">
                                <h4 class="text-center">ویرایش طبقه مادر</h4>
                                <form action="{{route('category.update',$data->id)}}" method="post">
                                    @method('put')
                                    <input type="hidden" name="type" value="main">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="نام طبقه">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="ثبت" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                    @elseif($type==2)


                            <div class="category">
                                <h4 class="text-center">ویرایش طبقه</h4>

                                <form action="{{route('category.update',$data->id)}}" method="post">
                                    @method('put')
                                    <input type="hidden" name="type" value="category">

                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="category1">
                                                نام طبقه
                                            </label>
                                            <input value="{{$data->name}}" type="text" name="name" id="category1" class="form-control" required
                                                   placeholder="نام طبقه">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="main1">
                                                طبقه مادر
                                            </label>
                                            <select class="form-control" id="main1" name="main">
                                                @foreach($main as $m)
                                                    <option {{$m->id==$data->main_categories_id ? "selected":''}} value="{{$m->id}}">{{$m->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="ثبت" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        @elseif($type==3)
                            <div class="subcategory">
                                <h4 class="text-center">ویرایش زیر طبقه</h4>

                                <form action="{{route('category.update',$data->id)}}" method="post">
                                    @method('put')
                                    <input type="hidden" name="type" value="sub">

                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="category1">
                                                نام زیر طبقه
                                            </label>
                                            <input value="{{$data->name}}" type="text" name="name" id="category1" class="form-control" required
                                                   placeholder="نام طبقه">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="main3">
                                                طبقه
                                            </label>

                                            <select class="form-control" id="main3" name="category">
                                                @foreach($category as $val)
                                                    <option {{$val->id==$data->categories_id ? "selected":''}} value="{{$val->id}}">{{$val->name}}</option>
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
                                                <input value="{{$data->min_point}}" type="number" name="min" id="category1" class="form-control" required
                                                       placeholder="   حداقل امتیاز">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="category1">
                                                    حداکثر امتیاز
                                                </label>
                                                <input value="{{$data->max_point}}" type="number" name="max" id="category1" class="form-control" required
                                                       placeholder=" حداکثر امتیاز">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="ثبت" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        @endif

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
