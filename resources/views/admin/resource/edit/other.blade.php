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
                    <h3 class="card-title d-inline">ویرایش دارایی غیر نقدی
                    </h3>
                    <span style="float: left">
                    خیر :
                                        <a href="{{route('donate.show',$data->donator_id)}}">
                                        {{\App\Models\Donator::whereId($data->donator_id)->first()->name}}
                                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <form action="{{route('resource.update',$data->id)}}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="type" value="other">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chilename" class="col-form-label text-right">عنوان :</label>
                                    <input type="text" required class="form-control" id="chilename"
                                          value="{{$data->title}}" name="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-2">
                                    <label for="exampleFormControlSelect1" class=" text-right">وضعیت :</label>
                                    <select class="form-control text-left" id="exampleFormControlSelect1" name="status"
                                            style="direction: ltr">
                                        <option value="0" {{$data->status == 0 ?"selected":''}}>نیاز به پیگیری</option>
                                        <option value="1" {{$data->status == 1 ?"selected":''}}>دریافت شده</option>
                                        <option value="-1" {{$data->status == -1 ?"selected":''}}>دریافت نشده</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group w-100">
                                <label for="status" class="col-form-label text-right">توضیحات :</label>
                                <textarea class="form-control w-100"  id="status" name="description" required>{{$data->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
