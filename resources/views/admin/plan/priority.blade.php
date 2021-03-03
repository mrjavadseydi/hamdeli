@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">اولویت بندی </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('adminPanel') }}">خانه</a></li>
                <li class="breadcrumb-item active">اولویت بندی </li>
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
                    <h3 class="card-title">اولویت بندی
                    </h3>

                </div>
                <div class="col-md-12">
                    <h6>نیازمندان :</h6>
                    <form action="{{ route('plan.update', $plan->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="p-2">
                            @foreach (\App\Models\NeederPlan::wherePlanId($plan->id)->get() as $needy)
                                <div class="d-inline">
                                    {{ \App\Models\Needy::whereId($needy->needie_id)->first()->name }}
                                    <select name="priority[]">
                                        <option value="{{ $needy->needie_id }}&1">اولویت اول</option>
                                        <option value="{{ $needy->needie_id }}&2">اولویت دوم</option>
                                        <option value="{{ $needy->needie_id }}&3">اولویت سوم</option>
                                        <option value="{{ $needy->needie_id }}&4">اولویت چهارم</option>
                                        <option value="{{ $needy->needie_id }}&5">اولویت پنجم</option>
                                    </select>
                                </div>
                                <br>
                            @endforeach
                            <input type="submit" class="btn btn-success" value="ثبت!">
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.col -->
    </div>
@endsection
@section('script')

    <script src="{{ asset('AdminAsset/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',
                width: 'resolve'
            });
            $('.js-example-basic-multiple').select2();
        });

    </script>
    <script src="{{ asset('AdminAsset/dist/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('AdminAsset/dist/js/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.normal-example').persianDatepicker({
                format: 'YYYY/MM/DD',
            });

        });

    </script>
@endsection
