@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">نمایش خیر</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">نمایش خیر</li>
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
                    <div class="text-left  d-inline" style="float: left">
                        <button type="button" class="btn btn-sm btn-danger trashbtn" data-id="{{$user->id}}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            نام :
                            {{$user->name}}
                        </div>
                        <div class="col-md-4">
                                کد ملی :
                            {{$user->person_id}}
                        </div>
                        <div class="col-md-4">
                            تلفن :
                            {{$user->mobile}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            آدرس :
                            {{$user->address}}
                        </div>
                        <div class="col-md-6">
                           نوع همکاری :
                            {{$user->cooperation_type}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        توضیحات خیر :
                        {{$user->description}}
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            مبلغ اهدایی این خیر :
                            {{number_format(\App\Models\Receipt::where([['donator_id',$user->id],['status','!=',-1]])->sum('amount'))}}
                        </div>
                        <div class="col-md-6">
                            تعداد دفعات  کمک غیر نقدی :
                            {{\App\Models\Donations::where([['donator_id',$user->id],['status','!=',-1]])->count()}}
                        </div>
                    </div>
                    <hr>
                    {{-- TODO donates--}}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    <script src="{{asset('plugin/sweetalert.js')}}"></script>
    <script>
        $(document).on('click', '.trashbtn', function (e) {
            let _token = $('div[name="destroy"]').attr('content');
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: 'آیا  اطمینان دارید ؟',
                text: "آیا از حذف این رکورد اطمینان دارید ؟ این دیتا قابل بازیابی نخواهد بود !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "خیر منصرف شدم!",
                confirmButtonText: 'بله !'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{route(' donate.delete')}}",
                        data: {id: id, _token: _token},
                        success: function (data) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'حذف رکورد از دیتابیس با موفقیت انجام شد !',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function () {
                                window.location.reload();
                            }, 1800);

                        }
                    });
                }
            })
            // function() {
            //
            // });
        });
    </script>
@endsection
