@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">نمایش نیازمند</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active"> نمایش نیازمند</li>
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
                    <h3 class="card-title">نمایش نیازمند
                    </h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            نام :
                            {{$user->name}}
                        </div>
                        <div class="col-md-4">
                            @if ($user->is_iranian)
                                کد اتباع :
                            @else
                                کد ملی :
                            @endif
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
                            اطلاعات بانکی :
                            {{$user->bank_info}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        وضعیت :
                        {{$user->status}}
                    </div>
                    <hr>
                    <div class="row">
                        وضعیت سرپرست خانوار :
                        {{$user->leader_status}}
                    </div>
                    <hr>
                    <div class="row">
                        معرف :
                        {{$user->introduc}}
                    </div>
                    @foreach(\App\Models\ChildNeedy::whereNeedieId($user->id)->get() as $l => $item)
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                نام فرد تحت تکلف شماره {{$l+1}}:
                                {{$item->name}}
                            </div>
                            <div class="col-md-6">
                                @if ($user->is_iranian)
                                    کد اتباع  تحت تکلف شماره {{$l+1}}:
                                @else
                                    کد ملی  تحت تکلف شماره {{$l+1}}:
                                @endif
                                {{$item->person_id}}
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            تعداد دفعات دریافت  :
                            {{\App\Models\SendNeedy::whereNeedieId($user->id)->count()}}
                        </div>
                    </div>
                    <hr>
{{-- TODO add sends link--}}
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
                        url: "{{route('needy.delete')}}",
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
