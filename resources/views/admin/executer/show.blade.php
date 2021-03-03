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
                    <h3 class="card-title d-inline">مشاهده برنامه
                    </h3>
                    @if ($plan->status == 1)
                        <a href="{{ route('exeplan.user', $plan->id) }}" class="btn btn-sm btn-info d-inlie"
                            style="float: left">
                            اتمام گروه بندی و ارجاع به اعضا
                        </a>
                    @endif
                </div>
                <!-- /.card-header -->
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
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>خیرین :</h6>
                            <ul>
                                @foreach (\App\Models\DonatorPlan::wherePlanId($plan->id)->get() as $donators)
                                    <li>
                                        {{ \App\Models\Donator::whereId($donators->donator_id)->first()->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>نیازمندان :</h6>
                            <ul>
                                @foreach (\App\Models\NeederPlan::wherePlanId($plan->id)->get() as $ne)
                                    <li>
                                        {{ \App\Models\Needy::whereId($ne->needie_id)->first()->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>کمک های غیر نقدی :</h6>
                            <ul>
                                @foreach (\App\Models\DonatorPlanHelp::where([['plan_id', $plan->id], ['money', false]])->get() as $dn)
                                    @if (\App\Models\Donations::whereId($dn->donations_id)->first()->status == 2)
                                        <li>

                                            {{ \App\Models\Donations::whereId($dn->donations_id)->first()->title }}


                                        </li>

                                    @endif


                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>مجموع کمک های نقدی :</h6>
                            @php($money = 0)
                                @foreach (\App\Models\DonatorPlanHelp::where([['plan_id', $plan->id], ['money', true]])->get() as $dn)
                                    @if (\App\Models\Receipt::whereId($dn->donations_id)->first()->status == 2)

                                        @php($money += \App\Models\Receipt::whereId($dn->donations_id)->first()->amount)
                                        @endif


                                    @endforeach
                                    <br>
                                    <h6>
                                        {{ number_format($money) }}
                                        ریال
                                    </h6>
                                </div>

                            </div>


                    <hr>
                    <h6>
                        وضعیت:
                    </h6>
                    @if ($plan->status == 0)
                        <span class="badge badge-warning">
                            درحال اماده سازی
                        </span>
                    @elseif ($plan->status == 1)
                        <span class="badge badge-info">
                            ارجاع به مجری
                        </span>
                    @elseif($plan->status==2)
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
                        <h3 class="card-title">درخواست نیازمندان
                        </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نیازمند</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">توضیحات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\App\Models\NeederPlanHelp::where('plan_id',$plan->id)->get() as $b => $fi)
                                <tr>
                                    <th scope="row">{{ $b + 1 }}</th>
                                    <td>
                                        <a href="{{ route('needy.show',$fi->needie_id)}}">
                                           {{\App\Models\Needy::whereId($fi->needie_id)->first()->name}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$fi->title}}
                                    </td>

                                    <td>
                                        {{$fi->description}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            @if ($plan->status == 1)
                <div class="col-md-6">
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
                                        <input type="hidden" name="id" value="{{ $plan->id }}">
                                        @csrf
                                        @foreach ($needy as $need)

                                            <div class="form-check">
                                                <input class="form-check-input" name="needy[]" type="checkbox"
                                                    value="{{ \App\Models\Needy::whereId($need->needie_id)->first()->id }}"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ \App\Models\Needy::whereId($need->needie_id)->first()->name . ' -- ' . \App\Models\Needy::whereId($need->needie_id)->first()->address }}
                                                    @if ($pro = \App\Models\Priority::where([['needie_id', $need->needie_id], ['plan_id', $plan->id]])->first())
                                                        -- اولویت شماره{{ $pro->priority }}
                                                    @endif
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
                                        <label>
                                            توضیحات مربوط  به اعضا
                                        </label>
                                        <textarea require name="title" class="form-control"></textarea>

                                        <input type="submit" class="btn btn-success" value="ثبت">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
            @foreach ($group as $i => $g)
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title d-inline">
                                گروه شماره {{ $i + 1 }}
                            </h3>
                            @if ($plan->status == 1)
                                <a href="{{ route('exeplan.delete', $g->id) }}" class="btn btn-sm btn-danger d-inlie"
                                    style="float: left">
                                    حذف گروه
                                </a>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>نیازمندان این گروه</h6>
                                    @foreach (\App\Models\NeedyGroup::where('group_id', $g->id)->get() as $need)
                                        {{ \App\Models\Needy::whereId($need->needie_id)->first()->name . ' -- ' . \App\Models\Needy::whereId($need->needie_id)->first()->address }}
                                        @if ($pro = \App\Models\Priority::where([['needie_id', $need->needie_id], ['plan_id', $plan->id]])->first())
                                            -- اولویت شماره{{ $pro->priority }}
                                        @endif
                                    @endforeach
                                    <hr>
                                    <h6>اعضای این گروه</h6>
                                    @foreach (\App\Models\UserGroup::where('group_id', $g->id)->get() as $us)
                                        {{ \App\Models\User::whereId($us->user_id)->first()->name }}
                                    @endforeach
                                    <hr>
                                    <h6>توضیحات گروه</h6>
                                    <p>
                                        {{$g->title}}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
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
