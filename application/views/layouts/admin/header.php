<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> 금사요양병원 관리자페이지 </title>

<!-- Bootstrap -->
<link href="{BASE_URL}vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="{BASE_URL}vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="{BASE_URL}vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{BASE_URL}vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="{BASE_URL}vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- iCheck -->
<link href="{BASE_URL}vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="{BASE_URL}vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
<!-- Select2 -->
<link href="{BASE_URL}vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="{BASE_URL}vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<link href="{BASE_URL}vendors/starrr/dist/starrr.css" rel="stylesheet">
<!-- Dropzone.js -->
<link href="{BASE_URL}vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{BASE_URL}css/admin.css" rel="stylesheet">

<!-- jQuery -->
<script src="{BASE_URL}vendors/jquery/dist/jquery.min.js"></script>

<!-- Dropzone.js -->
<script src="{BASE_URL}vendors/dropzone/dist/min/dropzone.min.js"></script>

</head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{BASE_URL}index.php/manager/main/index" class="site_title"><i class="fa fa-home"></i><b>금사요양병원</b>관리자</a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{BASE_URL}index.php/manager/setting/index"><b><i class="fa fa-cog"></i> 기본관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/notice/index"><b><i class="fa fa-edit"></i> 공지사항관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/media_report/index"><b><i class="fa fa-edit"></i> 언론보도관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/welfare/index"><b><i class="fa fa-desktop"></i> 사회복지프로그램관리 </b></a>
                  </li>
                 <li><a href="{BASE_URL}index.php/manager/welfare_gallery/index"><b><i class="fa fa-sitemap"></i> 사회복지프로그램 갤러리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/diet/index"><b><i class="fa fa-coffee"></i> 식단관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/unpaid/index"><b><i class="fa fa-sitemap"></i> 비급여수가관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/gallery/index"><b><i class="fa fa-sitemap"></i> 병원갤러리관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/medical_staff/index"><b><i class="fa fa-stethoscope"></i> 의료진관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/funeral/index"><b><i class="fa fa-won"></i>장례식장 금액 관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/funeral_gallery/index"><b><i class="fa fa-won"></i>장례식장 이미지 관리 </b></a>
                  </li>
                  <li><a href="{BASE_URL}index.php/manager/popup/index"><b><i class="fa fa-edit"></i> 팝업관리 </b></a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right" style="margin-right:10px;">
                <li role="presentation" class="dropdown">
                  <a href="{BASE_URL}index.php/manager/user/logout">
                    <i class="fa fa-sign-out"></i>
                  </a>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="{BASE_URL}index.php/manager/user/change_passwd">
                    <i class="fa fa-key"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
