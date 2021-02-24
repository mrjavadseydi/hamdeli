@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش خیر</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">ویرایش خیر</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title d-inline">نمایش خیر
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('donate.update',$user->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="alert alert-danger" role="alert" id="passwordlen">
                        <span>
                            رمز عبور باید حداقل 6 رقم باشد!
                        </span>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-right">نام و نام خانوادگی (اصلی یا
                                مستعار) :</label>
                            <input type="text" class="form-control" id="recipient-name" name="name"
                                   value="{{$user->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="personid" class="col-form-label text-right">کد ملی (اختیاری) :</label>
                            <input type="number" class="form-control" id="personid" name="person_id"
                                   value="{{$user->person_id}}">
                        </div>
                        <div class="form-group">
                            <label for="address1" class="col-form-label text-right">آدرس (اختیاری) :</label>
                            <input type="text" class="form-control" id="address1" name="address"
                                   value="{{$user->address}}">
                        </div>
                        <div class="form-group">
                            <label for="mobile1" class="col-form-label text-right">تلفن:</label>
                            <input type="text" class="form-control" id="mobile1" name="mobile" required
                                   value="{{$user->mobile}}">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label text-right">رمز عبور :</label>
                            <input type="password" class="form-control" id="password" name="password" onkeyup="f4()">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlSelect1" class=" text-right">نوع همکاری :</label>
                            <select class="form-control text-left" id="exampleFormControlSelect1" name="type"
                                    style="direction: ltr">
                                <option {{$user->cooperation_type == "نقدی" ? "selected": ''}}>نقدی</option>
                                <option {{$user->cooperation_type == "غیر نقدی" ? "selected": ''}}>غیر نقدی</option>
                                <option {{$user->cooperation_type == "پک مواد غذایی" ? "selected": ''}}>پک مواد غذایی
                                </option>
                                <option {{$user->cooperation_type == "جهیزیه" ? "selected": ''}}>جهیزیه</option>
                                <option {{$user->cooperation_type == "کمک های درمانی" ? "selected": ''}}>کمک های
                                    درمانی
                                </option>
                                <option {{$user->cooperation_type == "دیگر" ? "selected": ''}}>دیگر</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-form-label text-right">توضیحات همکاری :</label>
                            <textarea class="form-control" id="status" name="description"
                                      required>{{$user->description}}</textarea>
                        </div>
                        <div class="col-2">

                            <button type="submit" id="signup" class="btn btn-success">ویرایش</button>
                        </div>

                    </form>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    <script>
        $('#passwordlen').hide();

        function f4() {
            if ($('#password').val().length < 6) {
                $('#passwordlen').show();
                $('#signup').addClass('disabled');
                $('#signup').disabled();
            } else {
                $('#passwordlen').hide();
                $('#signup').removeClass('disabled');
                $('#signup').enable();
            }
        }
    </script>
@endsection
