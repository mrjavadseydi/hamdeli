<!DOCTYPE html>
<html lang='fa'>
<head>
    <meta class="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>همدلی</title>
    <!-- Don't forget to add your metadata here -->
    <link rel='stylesheet' href='{{asset('css/style.css')}}'/>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.0.0/dist/font-face.css" rel="stylesheet"
          type="text/css"/>
    <style>
        * {
            font-family: Vazir;
            direction: rtl;
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
<body>
<!-- Hero(extended) navbar -->
<!---->
<!-- Hero unit -->
<div class="hero">
    <div class="hero__overlay hero__overlay--gradient"></div>
    <div class="hero__mask"></div>
    <div class="hero__inner">
        <div class="container">
            <div class="hero__content">
                <div class="hero__content__inner" id='navConverter'>
                    <h1 class="hero__title" style="text-align: center">آغاز یک همدلی </h1>
                    <p class="hero__text" style="text-align: right">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                        صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و
                        سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود
                        ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و
                        متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
                        خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری
                        موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای
                        اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                    <a href="#" class="button button__accent">ثبت نام نیازمندان</a>
                    <a href="#" class="button hero__button">ثبت نام خیرین</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Steps -->
<div class="steps landing__section">
    <div class="container">
        <h2>نحوه کار ما به چه صورت است؟</h2>
        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
    </div>
    <div class="container">
        <div class="steps__inner">
            <div class="step">
                <div class="step__media">
                    <img src="{{asset('images/5893.png')}}" class="step__image">
                </div>
                <h4>لورم ایپسوم</h4>
                <p class="step__text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                    گرافیک است</p>
            </div>
            <div class="step">
                <div class="step__media">
                    <img src="{{asset('images/6144.png')}}" class="step__image">
                </div>
                <h4>لورم ایپسوم</h4>
                <p class="step__text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                    گرافیک است</p>
            </div>
            <div class="step">
                <div class="step__media">
                    <img src="{{asset('images/6154.png')}}" class="step__image">
                </div>
                <h4>لورم ایپسوم</h4>
                <p class="step__text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                    گرافیک است</p>
            </div>
        </div>
    </div>
</div>
<!-- Expanded sections -->
<!-- Call To Action -->

<!-- Footer -->
<div class="footer footer--dark" style="padding: 10px">
    <div class="container">
        <div class="footer__inner" style="text-align: center">
            <a href="http://javad-online.ir" target="_blank">طراحی و توسعه توسط محمدجواد صیدی </a>
        </div>
    </div>
    <script src='{{asset('js/script.min.js')}}'></script>
</div>
</body>
</html>
