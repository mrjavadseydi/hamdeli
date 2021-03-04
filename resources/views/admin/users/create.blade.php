@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ساخت عضو</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">ساخت عضو</li>
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
                    <h3 class="card-title">ساخت عضو
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('user.create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>نام</label>
                                <input type="text" name="name" required  class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>ایمیل</label>
                                <input type="email" name="email" required  class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>رمز عبور</label>
                                <input type="password" name="password"  class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>تکرار رمز عبور </label>
                                <input type="password" name="repassword"  class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    نوع کاربری
                                </label>
                                <select class="form-control" name="role">
                                    <option value="3">عضو</option>
                                    <option value="2">مجری</option>
                                </select>

                            </div>
                        </div>


                        <div class="col-3 p-2">
                            <input type="submit" class="btn btn-success" value="ثبت">

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->
    </div>
@endsection
@section('script')

@endsection
