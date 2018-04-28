<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- Custom fonts for this template -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->

    <script src="{{ asset('js/app.js') }}"></script>
  </head>

  <body>
    <div class ="container">
    @include('inc.navbar')
         <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
        <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Tes Tes <svg-icon><src href="sprite.svg#si-glyph-adjustment-horizon" /></svg-icon></h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form>
              <div class="row">
                <div class="col">
                  <h1><a href="/donations/create" class="btn btn-lg btn-primary">Donasi Sekarang Yuk</a></h1>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>

    <br>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-gambar-1 showcase-img"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Fully Responsive Design</h2>
            <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-gambar-2 showcase-img"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Updated For Bootstrap 4</h2>
            <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-gambar-3 showcase-img"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Easy to Use &amp; Customize</h2>
            <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
          </div>
        </div>
      </div>
    </section>

    <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lorem</h5>
                        <p class="card-text text-sm-center text-md-left">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, delectus! Quod odit corporis reprehenderit voluptatem aperiam vel laudantium ullam ipsum ad atque. Similique distinctio soluta aliquam, magni expedita labore iste?
                        </p>
                        <a href="#" class="card-link">See more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lorem</h5>
                        <p class="card-text text-sm-center text-md-left">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, delectus! Quod odit corporis reprehenderit voluptatem aperiam vel laudantium ullam ipsum ad atque. Similique distinctio soluta aliquam, magni expedita labore iste?
                        </p>
                        <a href="#" class="card-link">See more</a>
                    </div>
                </div>
            </div>
        </div>

    <div class = "container">
        {!! $map['html'] !!};
    </div>

    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
      <div class="container">
        <h2 class="mb-5">Pendiri Panti Asuhan Yasibu</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="/storage/landingimage/testimonials-1.jpg" alt="">
              <h5>Margaret E.</h5>
              <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="/storage/landingimage/testimonials-2.jpg" alt="">
              <h5>Fred S.</h5>
              <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="/storage/landingimage/testimonials-3.jpg" alt="">
              <h5>Sarah	W.</h5>
              <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>

    {!! $map['js'] !!} 
  </body>

</html>