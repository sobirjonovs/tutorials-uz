<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title ?></title>
  <meta property="og:title" content="<?= $title ?>" />
  <meta property="og:description" content="Bu yerda siz PHP, HTML, CSS, Js va ko'plab boshqa dasturlash tillarini o'zbek tilida bepul o'rganishingiz mumkin." />
  <!-- MDB icon -->
  <link rel="icon" href="/public/img/circle-t.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="/public/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="/public/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">  
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="stylesheet" href="/public/css/custom.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0a2a66">
  <a class="navbar-brand mr-auto mobile-show" href="/"><i class="fab fa-tumblr-square text-white" style="font-size: 25px"></i>&nbsp;<span style="font-weight: bold; font-size: 20px">utorials.</span><span style="background-color: white; border-radius: 60px; padding: 2px; color: #0a2a66; font-weight: 900">uz</span>
       </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-graduation-cap"></i> Barcha darslar
        </a>
        <div class="dropdown-menu dropdown-menu-left dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <div class="wrapping">
            <div class="menu">
              <p class="text-muted drop">Backend</p>
              <hr>
              <a class="dropdown-item" href="/tutorial/php">PHP</a>
              <a class="dropdown-item" href="/tutorial/cplusplus">C++</a>
              <a class="dropdown-item" href="/tutorial/csharp">C#</a>
              <a class="dropdown-item" href="/tutorial/python">Piton</a>
              <a class="dropdown-item" href="/tutorial/java">Java</a>
              <a class="dropdown-item" href="/tutorial/algoritm">Algoritm</a>
            </div>
            <div class="menu">
              <p class="text-muted drop">Frontend</p>
              <hr>
              <a class="dropdown-item" href="/tutorial/html">HTML</a>
              <a class="dropdown-item" href="/tutorial/css">CSS</a>
              <a class="dropdown-item" href="/tutorial/bootstrap">Bootstrap</a>
              <a class="dropdown-item" href="/tutorial/bootstrap">JavaScript</a>
            </div>
          </div>
          <div class="wrapping">
            <div class="menu">
              <p class="text-muted drop">Ma'lumotlar ombori</p>
              <hr>
              <a class="dropdown-item" href="/tutorial/mysql">MySQL</a>
            </div>
            <div class="menu">
              <p class="text-muted drop">O'yin dvijoklari</p>
              <hr>
              <a class="dropdown-item" href="/tutorial/unity">Unity</a>
            </div>
          </div>
        </div>
        </li>
      </ul>
       <a class="navbar-brand m-auto mobile-hide" href="/"><i class="fab fa-tumblr-square text-white" style="font-size: 28px"></i>&nbsp;<span style="font-weight: bold; font-size: 23px">utorials.</span><span style="background-color: white; border-radius: 60px; padding: 2px; color: #0a2a66; font-weight: 900">uz</span>
       </a>
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light"></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="fas fa-list"></i> Menyular</a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/contact">Bog'lanish</a>
          <a class="dropdown-item" href="/">Kutubxona</a>
          <a class="dropdown-item" href="/blog">Blog</a>
          <a class="dropdown-item" href="/about-us">Haqimizda</a>
          <a class="dropdown-item" href="/#faq">F.A.Q</a>
        </div>
      </li>
    </ul>
        </div>
      </nav>
    <main class="container p-3">
        <?= $content ?>
    </main>
    <!--Footer-->
  <footer class="page-footer text-center font-small" style="background-color: #172848">
      <div class="pt-4">
        <h5 class="text-white">Ijtimoiy tarmoqlarimiz:</h5>
        <a class="btn btn-outline-white"
          href="https://www.youtube.com/tutorialsuz" target="_blank" role="button">Youtube
          <i class="fab fa-youtube ml-2" style="color:red; font-size: 15px"></i>
        </a>
        <a class="btn btn-outline-white" href="https://t.me/tutorialsuz"
          target="_blank" role="button">Telegram
          <i class="fab fa-telegram ml-2" style="color: DodgerBlue; font-size: 15px"></i>
        </a>
      </div>
      <div class="my-3">
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=57656251&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/57656251/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(57656251, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/57656251" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
      </div>
      <div class="footer-copyright py-4">
        © 2019-<?php echo date('Y'); ?> Tutorials.uz Sweety Edition 2020 | Made by
        <a href="/" target="_blank"> Tutorials.uz team </a>
      </div>
  </footer>
  <!--Footer-->
  <!-- jQuery -->
  <script type="text/javascript" src="/public/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/public/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/public/js/mdb.min.js"></script>
</body>
</html>
