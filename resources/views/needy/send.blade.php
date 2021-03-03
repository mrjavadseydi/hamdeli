@extends('needy.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">برنامه</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('npanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">برنامه</li>
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
                        <h3 class="card-title d-inline">برنامه
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>عنوان برنامه :</h6>
                                <p>
                                    {{ $plan->title }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>اهداف برنامه :</h6>
                                <p>
                                    {{ $plan->description }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title d-inline">فرم درخواست
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('need',$plan->id)}}" method="Post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                            <label>
                                عنوان درخواست
                            </label>
                            <input type="text" name="title" required class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <label>
                                توضیحات درخواست
                            </label>
                            <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-success" value="ثبت">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- /.col -->
    </div>
@endsection
@section('script')

@endsection
