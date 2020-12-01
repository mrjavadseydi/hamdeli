@extends('donator.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ثبت کمک</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('panel')}}">خانه</a></li>
                <li class="breadcrumb-item active">ثبت کمک</li>
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
                    <h3 class="card-title">ثبت کمک
                    </h3>

                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        {{\App\Models\Option::whereOption('bank')->first()->description}}
                    </div>
                    <form action="{{route('dn.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="type" value="money">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chilename" class="col-form-label text-right">مبلغ (ریال) :</label>
                                    <input type="number" required class="form-control" placeholder="10000000" id="chilename"
                                           name="amount">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="track" class="col-form-label text-right">کد رهگیری :</label>
                                    <input type="text" placeholder="123456789023" required class="form-control" id="track"
                                           name="tracking">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group w-100">
                                <label for="status" class="col-form-label text-right">توضیحات :</label>
                                <textarea class="form-control w-100" id="status" name="description" placeholder="واریز شده در تاریخ ... در شعب بانک ..." required></textarea>
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


