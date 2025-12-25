<!DOCTYPE html>
<html lang="en">

<head>

  <title>Course - @yield('title')</title>
  @include('front.includes.cssjs')
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('assets')}}/img/logo.png" alt=""> -->
        <h1 class="sitename">Mentor</h1>
      </a>

      @include('front.includes.navbar')

      

    </div>
  </header>

  <main class="main">

    @yield('sss')

  </main>

  @include('front.includes.footer')

  @include('front.includes.js')

  

</body>

</html>