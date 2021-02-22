@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">مشاهده برنامه </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{ route('adminPanel') }}">خانه</a></li>
                <li class="breadcrumb-item active">مشاهده برنامه </li>
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
                    <h3 class="card-title">مشاهده برنامه
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>عنوان برنامه :</h6>
                            <p>
                                {{ $plan->first()->title }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>اهداف برنامه :</h6>
                            <p>
                                {{ $plan->first()->description }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>خیرین :</h6>
                            <ul>
                                @foreach (\App\Models\DonatorPlan::wherePlanId($plan->first()->id)->get() as $donators)
                                    <li>
                                        {{ \App\Models\Donator::whereId($donators->donator_id)->first()->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>نیازمندان :</h6>
                            <ul>
                                @foreach (\App\Models\NeederPlan::wherePlanId($plan->first()->id)->get() as $ne)
                                    <li>
                                        {{ \App\Models\Donator::whereId($ne->needie_id)->first()->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <h6>
                        وضعیت:
                    </h6>
                    @if ($plan->first()->status == 1)
                        <span class="badge badge-info">
                            ارجاع به مجری
                        </span>
                    @elseif($plan->first()->status==2)
                        <span class="badge badge-primary">
                            ارجاع به اعضا
                        </span>
                    @else
                        <span class="badge badge-success">
                            پایان یافته
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">گروه بندی
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>نیازمندان :</h6>
                            <form action="{{ route('ExePlan.store') }}" method="POST">
                                <input type="hidden" name="id" value="{{ $plan->first()->id }}">
                                @csrf
                                @foreach ($needy as $need)

                                    <div class="form-check">
                                        <input class="form-check-input" name="needy[]" type="checkbox"
                                            value="{{ \App\Models\Needy::whereId($need->needie_id)->first()->id }}"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ \App\Models\Needy::whereId($need->needie_id)->first()->name . ' -- ' . \App\Models\Needy::whereId($need->needie_id)->first()->address }}
                                        </label>
                                    </div>

                                @endforeach

                                <hr>
                                اعضا
                                @foreach ($user as $us)
                                    @if ($us->users()->first())
                                        <div class="form-check">
                                            <input class="form-check-input" name="user[]" type="checkbox"
                                                value="{{ $us->users()->first()->id }}" id="flexCheckDefault1">
                                            <label class="form-check-label" for="flexCheckDefault1">
                                                {{ $us->users()->first()->name }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach

                                <hr>
                                <input type="submit" class="btn btn-success" value="ثبت">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">گروه ها
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($group as $i => $g)
                                <h5>گروه شماره {{ $i + 1 }}</h5>
                                <h6>نیازمندان این گروه</h6>
                                @foreach (\App\Models\NeedyGroup::where('group_id', $g->id)->get() as $need)
                                    {{ \App\Models\Needy::whereId($need->needie_id)->first()->name . ' -- ' . \App\Models\Needy::whereId($need->needie_id)->first()->address }}
                                @endforeach
                                <hr>
                                <h6>اعضای این گروه</h6>
                                @foreach (\App\Models\UserGroup::where('group_id', $g->id)->get() as $us)
                                    {{ \App\Models\User::whereId($us->user_id)->first()->name }}
                                @endforeach
                                <hr>
                            @endforeach
                        </div>
                    </div>

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
