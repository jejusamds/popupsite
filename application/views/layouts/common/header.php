<!doctype html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="ko">
<head>
  <meta charset="utf-8" />
  <meta name="build" content="events"/>

  <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="robots" content="index,follow">
  <meta http-equiv="cache-control" content="max-age=300" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no" />
  <meta http-equiv="Access-Control-Allow-Origin" content="#">
  <meta name="apple-mobile-web-app-title" content="{COMPANY_NAME_EN}" />

  <meta name="description" content="{COMPANY_NAME}"/>
  <meta name="keywords" content="">
  <meta name="Author" content="">

  <meta property="og:title" content="{TITLE}">
  <meta property="og:url" content="{BASE_URL}">
  <meta property="og:image" content="{BASE_URL}/img/kakao-img.jpg">
  <meta property="og:description" content="{COMPANY_NAME}"/>

  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="">
  <meta name="twitter:url" content="{BASE_URL}">
  <meta name="twitter:image" content="{BASE_URL}/img/kakao-img.jpg">
  <meta name="twitter:description" content="{COMPANY_NAME}"/>

  <title>{TITLE}</title>

  <!-- KAEN's CSS -->
  <link rel="stylesheet" type="text/css" href="{BASE_URL}css/kaen.css"/>

  <!-- RAN's CSS -->
  <link rel="stylesheet" type="text/css" href="{BASE_URL}css/busanhospital.css"/>

  <link rel="stylesheet" href="{BASE_URL}css/lightbox.css">

  <!--flex slider css-->
  <link href="{BASE_URL}css/flexslider.css" rel="stylesheet">


  <link rel="stylesheet" href="{BASE_URL}css/bootstrap.min.css">

  <!-- icons css-->
  <link href="{BASE_URL}css/font-awesome.min.css" rel="stylesheet">

  <!--animated css-->
  <link href="{BASE_URL}css/animate.css" rel="stylesheet">

  <!--owl carousel css-->
  <link href="{BASE_URL}css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
  <link href="{BASE_URL}css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
    
  <link href="{BASE_URL}css/swiper.min.css" rel="stylesheet" type="text/css" media="screen">

  <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="{BASE_URL}js/html5shiv.js"></script>
    <script src="{BASE_URL}js/respond.min.js"></script>
  <![endif]-->

  <style>

    /* swiper */
    .mini-banner .swiper-slide {
        background: #f1f1f1;
        color:#000;
    }
    .mini-banner .swiper-scrollbar-drag {
      background: #00adff;
      box-shadow: 0px 0px 0px #000;
    }

    .dropdown-menu a:focus {
      color:#FFF !important;
    }

    .dropdown-menu a:hover {
      font-weight: bold !important;
    }

    .dropdown:hover > .dropdown-menu {
      display: block;
    }

    .dropdown-toggle::after {
      display:none;
    }

    .dropdown-menu a {
      width:100%;
      min-width:250px;
      height:50px;
      padding: 10px 20px;
      color: #bbb;
      font-weight: 400;
      font-size: 12px;
      border-bottom: 1px dotted #CCC;
      text-transform: capitalize;
    }

    @media (max-width: 767px) {

      .dropdown-toggle {
        height:50px;
      }

      .nav-first {
        margin-top:15px;
      }
    }

    @media (min-width: 767px) {

      .dropdown-toggle {
        min-width:130px;
      }

      .dropdown > .dropdown-toggle:active {
        pointer-events: none;
      }
    }

  </style>


</head>
<body data-spy="scroll" data-target="#navigation" data-offset="80"> 
 
  <!-- 파란띠 -->
  <section class="blueline_pop" id="blueline_pop">
    <div class="container">
     <div class="row justify-content-center">
        <div class="col-12 text-center text-white pt-3 pb-1 wow animated fadeInDown" data-wow-duration="0.3s">
          <h3>환자, 가족 모두가 편안하고 행복한 요양 &nbsp;<img src="{BASE_URL}/img/pop_img.png" alt="부산금사요양병원" /></h3>
        </div>
      </div>
    </div>
  </section>
  <!-- //파란띠 -->

  <!-- 나오게 해줬으니 CSS 맞춰라~~ ㅋㅋ -->
  <nav id="navbar" class="navbar navbar-expand-md bg-light navbar-light pt-3 pb-4">
    <div class="container">
    <a class="navbar-brand" href="{BASE_URL}">
      <img src="{BASE_URL}/img/logo.png" alt="부산금사요양병원" />
    </a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link nav-first dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><b>병원소개</b></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{BASE_URL}index.php/introduce/index">인사말</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/introduce/vision">미션과 비전</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/introduce/history">현황 및 연혁</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/introduce/organization">병원조직도</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/introduce/preview">병원둘러보기</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/introduce/supporters">협력병원 및 기관</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><b>이용안내</b></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{BASE_URL}index.php/howtouse/map">오시는길</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/howtouse/floor_info">층별안내</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/howtouse/meet_info">면회안내</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/howtouse/certificate">증명서 발급</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/howtouse/unpaid">비급여수가안내</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/howtouse/funeral">장례식장</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><b>진료안내</b></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{BASE_URL}index.php/information/departments">진료과</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/information/medical_staff">의료진</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/information/outpatient_time">외래진료시간</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/information/hospitalization">입퇴원절차</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/information/patient_right">환자 권리와 의무</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><b>전문센터</b></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{BASE_URL}index.php/professional/artificialkidney">인공신장실</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/professional/physiotherapy">물리치료실</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/professional/radiation">방사선실</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><b>병원소식</b></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{BASE_URL}index.php/news/notice">공지사항</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/news/index">언론보도</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/news/diet">영양식단</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/news/welfare">사회복지프로그램</a>
            <a class="dropdown-item" href="{BASE_URL}index.php/news/welfare_gallery">사회복지프로그램 갤러리</a>
          </div>
        </li>
      </ul>    
    </div>
  </nav>
  <!-- //메뉴 -->
