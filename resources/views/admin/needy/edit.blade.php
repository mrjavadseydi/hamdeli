@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش نیازمند</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active"> ویرایش نیازمند</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">ویرایش نیازمند
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('needy.update',$user->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-right">نام و نام خانوادگی :</label>
                            <input type="text" class="form-control" id="recipient-name" name="name"
                                   value="{{$user->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-form-label text-right">تلفن همراه :</label>
                            <input type="number" class="form-control" id="mobile" name="mobile"
                                  value="{{$user->mobile}}" required>
                        </div>
                        <div class="form-check text-center pb-2">
                            <input type="checkbox" class="form-check-input"
                                   {{$user->is_iranian ?'':"checked"}} name="is_iranian" onchange="f1()"
                                   id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">اتباع </label>
                        </div>
                        <div class="form-group">
                            <label for="personid" id="lablenat" class="col-form-label text-right">{{$user->is_iranian ?'کد ملی':"کد اتباع"}} :</label>
                            <input type="number" class="form-control" value="{{$user->person_id}}" id="personid"
                                   name="person_id" required>
                        </div>
                        <div class="form-group">
                            <label for="bank" class="col-form-label text-right">شماره حساب / شماره کارت بانکی
                                سرپرست خانوار:</label>
                            <input type="text" class="form-control" id="bank" name="bank_info"
                                   value="{{$user->bank_info}}" required>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-form-label text-right">آدرس:</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   value="{{$user->address}}" required>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-outline-primary text-center" type="button" onclick="f2()">افزودن فرد
                                تحت
                                تکلف
                            </button>
                        </div>
                        <span class="next"></span>
                        @foreach(\App\Models\ChildNeedy::whereNeedieId($user->id)->get() as $child)
                            <div style="border: 1px solid rgba(179,168,168,0.82); border-radius: 5px;padding: 3px">
                                <div class="p-1">
                                    <div class="form-group">
                                        <label for="chilename" class="col-form-label text-right">نام و نام خانوادگی عضو
                                            تحت
                                            تکفل
                                            :</label>
                                        <input type="text" class="form-control" id="chilename" value="{{$child->name}}"
                                               required name="chilename[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="childeid" id="lablenat1" class="col-form-label text-right">کد ملی
                                            عضو
                                            تحت تکفل :</label>
                                        <input type="number" class="form-control" id="childeid" required
                                               value="{{$child->person_id}}" name="chileid[]">
                                    </div>
                                    <div class="text-center">
                                        <button class="delete-btn btn btn-sm btn-danger" type="button"
                                                onclick="f3(this)">
                                            حذف این مورد
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="status" class="col-form-label text-right">شرایط زندگی :</label>
                            <textarea class="form-control" id="status" name="status"
                                      required>{{$user->status}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="leader" class="col-form-label text-right">وضعیت شغلی سرپرست خانواده (به صوت
                                کلی و در شرایط کرونا) :</label>
                            <textarea class="form-control" id="leader" name="leader_status"
                                      required>{{$user->leader_status}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="introduc" class="col-form-label text-right">اطلاعات معرف :</label>
                            <textarea class="form-control" id="introduc" name="introduc"
                                      required>{{$user->introduc}}</textarea>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success">ویرایش</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>


    <!---family des--->
    <div class="hide" style="display: none">
        <div class="family ">
            <div style="border: 1px solid rgba(179,168,168,0.82); border-radius: 5px;padding: 3px">
                <div class="p-1">
                    <div class="form-group">
                        <label for="chilename" class="col-form-label text-right">نام و نام خانوادگی عضو تحت تکفل
                            :</label>
                        <input type="text" class="form-control" id="chilename" required name="chilename[]">
                    </div>
                    <div class="form-group">
                        <label for="childeid" id="lablenat1" class="col-form-label text-right">{{$user->is_iranian ?'کد ملی ':"کد اتباع "}}عضو تحت تکفل
                            :</label>
                        <input type="number" class="form-control" id="childeid" required name="chileid[]">
                    </div>
                    <div class="text-center">
                        <button class="delete-btn btn btn-sm btn-danger" type="button" onclick="f3(this)">حذف این مورد
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!---end family-->
@endsection
@section('script')
    <script>
        $('#passwordlen').hide();

        function f1() {
            if ($('#exampleCheck1').prop("checked") == true) {
                $('#lablenat').text("کد اتباع :");
                $('#lablenat1').text("کد اتباع عضو تحت تکفل :");
            } else {
                $('#lablenat').text("کد ملی :");
                $('#lablenat1').text("کد ملی  عضو تحت تکفل:");
            }
        }

        function f2() {
            var lsthmtl = $(".family").html();
            $(".next").after(lsthmtl);
        }

        function f3(t) {
            t.parentElement.parentElement.parentElement.remove();
        }
    </script>

@endsection
