<!DOCTYPE html>
<html lang='fa'>
<head>
    <meta class="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{getOption('title')}}</title>
    <!-- Don't forget to add your metadata here -->
    <link rel='stylesheet' href='{{asset('css/app.css')}}'/>
    <link rel='stylesheet' href='{{asset('css/style.css')}}'/>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.0.0/dist/font-face.css" rel="stylesheet"
          type="text/css"/>
    <style>
        * {
            font-family: Vazir;
        }

        .hero {
            position: relative;
            width: 100%;
            background-image: url({{asset('images/evie_default_bg.jpeg')}});
            -webkit-box-shadow: 0 4px 11px rgba(124, 146, 169, .5);
            box-shadow: 0 4px 11px rgba(124, 146, 169, .5);
            background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat;
            color: #fff
        }

    </style>
</head>
<body dir="rtl">
<!-- Hero(extended) navbar -->
<!---->
<div class="navbar navbar--extended">
    <nav class="nav__mobile"></nav>
    <div class="container">
        <div class="navbar__inner text-left">
            <a href="{{route('ٔNeedLogin')}}"  class="btn btn-sm button hero__button" >پنل نیازمندان</a>
            <a href="{{route('CustomLogin')}}"  class="btn btn-sm button button__accent" >پنل  خیرین</a>
            <a href="{{route('login')}}"  class="btn btn-sm button hero__button" >پنل مدیریت </a>
        </div>
    </div>
</div>
<!-- Hero unit -->
<div class="hero">
    <div class="hero__overlay hero__overlay--gradient"></div>
    <div class="hero__mask"></div>
    <div class="hero__inner">
        <div class="container">
            <div class="hero__content">
                <div class="hero__content__inner" id='navConverter'>
                    <h1 class="hero__title" style="text-align: center">{{getOption('title')}} </h1>
                    <p class="hero__text" style="text-align: right">{{getOption('sitedes')}}</p>
                    <button type="button" class="button button__accent" data-toggle="modal" data-target="#exampleModal"
                    >ثبت نام نیازمندان
                    </button>
                    <button type="button" class="button hero__button" data-toggle="modal" data-target="#exampleModal1">
                        ثبت نام خیرین
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Steps -->
<div class="steps landing__section">
    <div class="container">
        <h2>{{getOption('work1')}}</h2>
        <p>{{getOption('work2')}}</p>
    </div>
    <div class="container">
        <div class="steps__inner text-center">
            <div class="step">
                <div class="step__media ">
                    <img src="{{asset(\App\Models\Option::whereOption('icon1')->first()->description)}}" class="step__image m-auto  ">
                </div>
                <h4 class=" text-center">{{getOption('title1')}}</h4>
                <p class="step__text  text-center">{{getOption('des1')}}</p>
            </div>
            <div class="step text-cente">
                <div class="step__media">
                    <img src="{{asset(\App\Models\Option::whereOption('icon2')->first()->description)}}" class="step__image m-auto">
                </div>
                <h4>{{getOption('title2')}}</h4>
                <p class="step__text  text-cente">{{getOption('des2')}}</p>
            </div>
            <div class="step text-cente">
                <div class="step__media ">
                    <img src="{{asset(\App\Models\Option::whereOption('icon3')->first()->description)}}" class="step__image m-auto">
                </div>
                <h4>{{getOption('title3')}}</h4>
                <p class="step__text  text-cente">{{getOption('des3')}}</p>
            </div>
        </div>
    </div>
</div>
<!-- Expanded sections -->
<!-- Call To Action -->


<!---modal--->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('createPoor')}}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label text-right">نام و نام خانوادگی :</label>
                        <input type="text" class="form-control" id="recipient-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-form-label text-right">تلفن همراه :</label>
                        <input type="number" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <div class="form-check text-center pb-2">
                        <input type="checkbox" class="form-check-input" name="is_iranian" onchange="f1()"
                               id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">اتباع هستم</label>
                    </div>
                    <div class="form-group">
                        <label for="personid" id="lablenat" class="col-form-label text-right">کد ملی :</label>
                        <input type="number" class="form-control" id="personid" name="person_id" required>
                    </div>
                    <div class="form-group">
                        <label for="bank" class="col-form-label text-right">شماره حساب / شماره کارت بانکی
                            سرپرست خانوار:</label>
                        <input type="text" class="form-control" id="bank" name="bank_info" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label text-right">آدرس:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-outline-primary text-center" type="button" onclick="f2()">افزودن فرد تحت
                            تکلف
                        </button>
                    </div>
                    <span class="next"></span>
                    <div class="form-group">
                        <label for="status" class="col-form-label text-right">شرایط زندگی :</label>
                        <textarea class="form-control" id="status" name="status" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="leader" class="col-form-label text-right">وضعیت شغلی سرپرست خانواده (به صوت
                            کلی و در شرایط کرونا) :</label>
                        <textarea class="form-control" id="leader" name="leader_status" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="introduc" class="col-form-label text-right">اطلاعات معرف :</label>
                        <textarea class="form-control" id="introduc" name="introduc" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="submit" class="btn btn-primary">ثبت نام</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!---- end modal ---->
<!---modal--->
<div class="modal fade text-right" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('createDonators')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert" id="passwordlen">
                        <span>
                            رمز عبور باید حداقل 6 رقم باشد!
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label text-right">نام و نام خانوادگی (اصلی یا
                            مستعار) :</label>
                        <input type="text" class="form-control" id="recipient-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="personid" class="col-form-label text-right">کد ملی (اختیاری) :</label>
                        <input type="number" class="form-control" id="personid" name="person_id">
                    </div>
                    <div class="form-group">
                        <label for="address1" class="col-form-label text-right">آدرس (اختیاری) :</label>
                        <input type="text" class="form-control" id="address1" name="address">
                    </div>
                    <div class="form-group">
                        <label for="mobile1" class="col-form-label text-right">تلفن:</label>
                        <input type="text" class="form-control" id="mobile1" name="mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label text-right">رمز عبور :</label>
                        <input type="password" class="form-control" id="password" name="password" onkeyup="f4()"  required>
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlSelect1" class=" text-right">نوع همکاری :</label>
                        <select class="form-control text-left" id="exampleFormControlSelect1" name="type"
                                style="direction: ltr">
                            <option>نقدی</option>
                            <option>غیر نقدی</option>
                            <option>پک مواد غذایی</option>
                            <option>جهیزیه</option>
                            <option>کمک های درمانی</option>
                            <option>دیگر</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-form-label text-right">توضیحات همکاری :</label>
                        <textarea class="form-control" id="status" name="description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="submit" id="signup" class="btn btn-primary disabled">ثبت نام</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!---- end modal ---->

<!---family des--->
<div class="hide" style="display: none">
    <div class="family ">
        <div style="border: 1px solid rgba(179,168,168,0.82); border-radius: 5px;padding: 3px">
            <div class="p-1">
                <div class="form-group">
                    <label for="chilename" class="col-form-label text-right">نام و نام خانوادگی عضو تحت تکفل
                        :</label>
                    <input type="text" class="form-control" id="chilename" required name="chilename[]">
                </div>
                <div class="form-group">
                    <label for="childeid" id="lablenat1" class="col-form-label text-right">کد ملی عضو تحت تکفل :</label>
                    <input type="number" class="form-control" id="childeid" required name="chileid[]">
                </div>
                <div class="text-center">
                    <button class="delete-btn btn btn-sm btn-danger" type="button" onclick="f3(this)">حذف این مورد
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>
<!---end family-->

<!-- Footer -->
<div class="footer footer--dark" style="padding: 10px">
    <div class="container">
        <div class="footer__inner" style="text-align: center">
            <span>تمامی حقوق مادی و معنوی سایت محفوظ است</span>
        </div>
    </div>
</div>
<script src='{{asset('js/script.min.js')}}'></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
<script>
    $('#passwordlen').hide();
    function f1() {
        if ($('#exampleCheck1').prop("checked") == true) {
            $('#lablenat').text("کد اتباع :");
            $('#lablenat1').text("کد اتباع عضو تحت تکفل :");
        } else {
            $('#lablenat').text("کد ملی :");
            $('#lablenat1').text("کد ملی  عضو تحت تکفل:");
        }
    }

    function f2() {
        var lsthmtl = $(".family").html();
        $(".next").after(lsthmtl);
    }

    function f3(t) {
        t.parentElement.parentElement.parentElement.remove();
    }
    function f4() {
        if($('#password').val().length <6){
            $('#passwordlen').show();
            $('#signup').addClass('disabled');
            $('#signup').disabled();
        }else{
            $('#passwordlen').hide();
            $('#signup').removeClass('disabled');
            $('#signup').enable();
        }
    }
</script>

@if ($errors->any())
    @php(alert()->error('اعتبار سنجی شما اطلاعات ارسالی شما با خطا مواجه شد !','خطای اعتبار سنجی')->confirmButton('موجه شدم!') )
@endif
<script src="{{asset('js/app.js')}}"></script>
@include('sweet::alert')

</body>
</html>
