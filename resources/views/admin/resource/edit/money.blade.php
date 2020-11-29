@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش دارایی</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">ویرایش دارایی</li>
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
                    <h3 class="card-title">ویرایش دارایی نقدی
                    </h3>

                </div>
                <div class="card-body">
                    <form action="{{route('resource.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="type" value="money">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chilename" class="col-form-label text-right">مبلغ (ریال) :</label>
                                    <input type="number" required class="form-control" id="chilename"
                                           name="amount">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-2">
                                    <label for="exampleFormControlSelect1" class=" text-right">خیر :</label>
                                    <select class="form-control text-left" id="exampleFormControlSelect1" name="donator"
                                            style="direction: ltr">
                                        @foreach(\App\Models\Donator::all() as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="track" class="col-form-label text-right">کد رهگیری :</label>
                                    <input type="text" required class="form-control" id="track"
                                           name="tracking">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group w-100">
                                <label for="status" class="col-form-label text-right">توضیحات :</label>
                                <textarea class="form-control w-100" id="status" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-header -->
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->
    </div>
@endsection


