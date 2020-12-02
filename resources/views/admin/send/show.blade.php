@extends('admin.master.master')
@section('position')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">نمایش اهدا</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('adminPanel')}}">خانه</a></li>
                <li class="breadcrumb-item active">نمایش اهدا</li>
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
                    <h3 class="card-title d-inline">{{$data->title}}
                    </h3>
                    <div class="text-left  d-inline" style="float: left">
                        <span>{{$data->date}}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            لیست نیازمندان :
                            <ul>
                                @foreach(\App\Models\SendNeedy::whereSendId($data->id)->get() as $l)
                                    <li class="pr-2">
                                        {{\App\Models\Needy::whereId($l->needie_id)->first()->name}}
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                        <div class="col-4">
                            لیست منابع غیر نقدی
                            <ul>
                                @foreach (\App\Models\SendDetails::where([['send_id',$data->id],['Source_type',2]])->get() as $item)
                                    <li class="pr-2">
                                        {{\App\Models\Donations::whereId($item->Source_id)->first()->title}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-4">
                            منابع نقدی استفاده شده :
                            {{number_format(\App\Models\Receipt::whereIn('id',\App\Models\SendDetails::where([['send_id',$data->id],['Source_type',1]])->get('Source_id'))->sum('amount'))}}
                            ریال
                        </div>

                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            لیست مستندات :
                            <ul>
                                @foreach(\App\Models\SendFile::whereSendId($data->id)->get() as $i=> $l)
                                    <li class="pr-2">
                                        <a href="{{url($l->file)}}" target="_blank">
                                            فایل شماره {{$i+1}}
                                        </a>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                        <div class="col-6">
                            لیست خیرین :
                            <ul>
                                @foreach (\App\Models\SendDetails::where([['send_id',$data->id],['Source_type',2]])->get() as $item)
                                    <li class="pr-2">
                                        {{\App\Models\Donator::whereId( \App\Models\Donations::whereId($item->Source_id)->first()->donator_id)->first()->name}}
                                        -
                                        کمک غیر نفدی
                                    </li>
                                @endforeach
                                @foreach (\App\Models\SendDetails::where([['send_id',$data->id],['Source_type',1]])->get() as $item)
                                    <li class="pr-2">
                                        {{\App\Models\Donator::whereId(\App\Models\Receipt::whereId($item->Source_id)->first()->donator_id)->first()->name}}
                                        -
                                        کمک نقدی
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <h6>
                            توضیحات
                        </h6>
                        <div class="p-2">
                        {!! $data->description !!}
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <h6>
                            مبلغ
                            {{number_format($data->extera_money)}} ریال  بصورت مازاد استفاده شد
                        </h6>
                        <div class="p-2">
                            {!! $data->extera_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
