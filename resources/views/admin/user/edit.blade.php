@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش کاربر</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item"><a href="{{route('User.index')}}">کاربران</a></li>
                <li class="breadcrumb-item active">ویرایش کاربر</li>
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
                        <i class="fa fa-user"></i>
                        ویرایش کاربر
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
                    <form action="{{route('User.update',$user->id)}}" enctype="multipart/form-data" method="post"
                          class="text-right pt-3">
                        @method('put')
                        @csrf
                        <div class="d-md-flex m-0 pt-2">
                            <div class="col-md-6 col-sm-12">
                                <label for="name2" class="label d-inline">
                                    نام و نام خانوادگی
                                </label>
                                <br>
                                <input required type="text" placeholder="محمد علی پارسا " name="name"
                                       value="{{$user->name}}"

                                       id="name2"
                                       class="col-12 form-control input pt- ltr" style="direction: rtl">
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <label for="name2" class="label d-inline">
                                    شماره دانشجویی
                                </label>
                                <br>
                                <input required type="text" name="student_number" placeholder="98123250000" id="name2"
                                       value=" {{$user->meta()->first()->student_number}}"

                                       class="col-12 form-control input pt-2" style="direction: rtl">
                            </div>
                        </div>
                        <div class="d-md-flex m-0 pt-3">
                            <div class="col-md-6 col-sm-12">
                                <label for="name2" class="label d-inline">
                                    نام و نام خانوادگی (لاتین)
                                </label>
                                <br>
                                <input required type="text" name="name_en" placeholder="mohammad ali parsa" id="name2"
                                       value="{{$user->meta()->first()->name_en}}"
                                       class="col-12 form-control input pt-2" style="direction: rtl">
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <label for="name2" class="label d-inline">

                                    کد ملی
                                </label>
                                <br>
                                <input required type="text" name="national_number" placeholder="06501784500" id="name2"
                                       value="{{$user->meta()->first()->national_number}}"
                                       class="col-12 form-control input pt-2" style="direction: rtl">
                            </div>
                        </div>
                        <div class="d-md-flex m-0 pt-3">
                            <div class="col-md-6 col-sm-12 ">
                                <label for="maghta" class="label d-inline">
                                    مقطع
                                </label>
                                <br>
                                <select name="class" class="form-control form-control pt-2 mt-2" id="exampleFormControlSelect1"
                                        name="maghta">

                                    <option
                                        @if($user->meta()->first()->class=='کارشناسی')
                                        selected
                                        @endif
                                    >کارشناسی
                                    </option>
                                    <option
                                        @if($user->meta()->first()->class=='کارشناسی ارشد')
                                        selected
                                        @endif
                                    >کارشناسی ارشد
                                    </option>
                                    <option
                                        @if($user->meta()->first()->class=='دکتری')
                                        selected
                                        @endif
                                    >دکتری
                                    </option>

                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="name2" class="label d-inline">

                                    رشته
                                </label>
                                <br>
                                <input name="field_study" required type="text" placeholder="مهندسی کامپیوتر" id="name2"
                                       value="{{$user->meta()->first()->field_study}}"
                                       class="col-12 form-control input pt-2" style="direction: rtl">
                            </div>
                        </div>
                        <div class="d-md-flex m-0 pt-3">
                            <div class="col-md-6 col-sm-12">
                                <label for="name2" class="label d-inline">

                                    تلفن همراه
                                </label>
                                <br>
                                <input name="mobile" required type="text" placeholder="09354780000" id="name2"
                                       value="{{$user->meta()->first()->mobile}}"
                                       class="col-12 form-control input pt-2" style="direction: rtl">
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <label for="name2" class=" label d-inline">

                                    ایمیل
                                </label>
                                <br>
                                <input type="email" placeholder="example@example.com" id="name2" disabled
                                       value="{{$user->email}}"
                                       class="col-12 form-control input pt-2 ltr" style="direction: rtl">
                            </div>
                        </div>
                        <div class="d-md-flex m-0 pt-3">
                            <div class="col-md-6 col-sm-12">
                                <label for="" class="label d-inline">

                                    تاریخ تولد
                                </label>
                                <br>
                                <input name="birthday" required type="text" placeholder="09354780000" id="birth"
                                       value="{{$user->meta()->first()->birthday}}"
                                       class="col-12 form-control input pt-2"
                                       style="direction: rtl">
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <label for="name21" class="label d-inline">
                                    رمز عبور جدید
                                </label>
                                <br>
                                <input type="email" name="password" placeholder="********" id="name21"
                                       class="col-12 form-control input pt-2 ltr" style="direction: rtl">
                            </div>

                        </div>
                        <div class="d-md-flex m-0 pt-3">
                            <div class="col-12 mb-5">
                                <div class="text-left">
                                    <input type="submit" class="btn btn-success col-md-2 text-center"
                                           value="ذخیره تغییرات ">
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="{{route('admin')}}" method="post">
                        @csrf
                        @method('put')
                        <strong>
                            تغییر دسترسی کاربر
                        </strong>
                        <input type="hidden" name="user" value="{{$user->id}}">
                        <select class="form-control" name="admin">
                            <option value="0">کاربر</option>
                            <option value="1" {{\App\permission::where([['user_id',$user->id],['role','admin']])->count()>0 ? "selected":''}}>مدیر</option>
                        </select>
                        <input type="submit" value="ثبت" class="btn btn-success">
                    </form>


                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.col -->
    </div>
@endsection
