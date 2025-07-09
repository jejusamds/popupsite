<DOCTYPE html>
<html lang="en">
  <head>

    <title>{TITLE}</title>

  <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta property="og:type" content="website">
	<meta property="og:url" content="http://www.geumsa.com/">
	<meta property="og:title" content="부산금사요양병원">
	<meta property="og:description" content="보건복지부 인증의료기관 부산금사요양병원">
	<meta property="og:image" content="{BASE_URL}img/kakao_img.jpg">

  <!--bootstrap css-->
    <link href="{BASE_URL}css/bootstrap.min.css" rel="stylesheet">
  <!--custom css-->
    <link href="{BASE_URL}css/style.css" rel="stylesheet" type="text/css">
    <!--flex slider css-->
    <link href="{BASE_URL}css/flexslider.css" rel="stylesheet">
    <!--google web fonts css-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,800' rel='stylesheet' type='text/css'>


    <!-- Custom kwchoi -->
    <link href="{BASE_URL}css/kwchoi.css" rel="stylesheet">
    
    <!-- icons css-->
    <link href="{BASE_URL}css/font-awesome.min.css" rel="stylesheet">
    <!--animated css-->
    <link href="{BASE_URL}css/animate.css" rel="stylesheet">
    <!--owl carousel css-->
    <link href="{BASE_URL}css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
    <link href="{BASE_URL}css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
    <!--Revolution slider css-->
    <link href="{BASE_URL}rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="screen">

    <link href="{BASE_URL}css/lightbox.css" rel="stylesheet">

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="{BASE_URL}js/html5shiv.js"></script>
    <script src="{BASE_URL}js/respond.min.js"></script>
    <![endif]-->

    <style>

        /* LAYER POPUP
        ------------------------------------------------------*/

        .pop-layer p.ctxt {
          line-height: 25px;
        }

        .pop-layer .btn-r {
          width: 100%;
          padding-right: 10px;
          padding-bottom: 10px;
          border-top: 1px solid #DDD;
          text-align: right;
        }

        .pop-layer {
          position: absolute;
          width: 410px;
          height: auto;
          background-color: #fff;
          border: 2px solid indigo;
          z-index: 999999999;
        }

        /* TABLE
        ----------------------------------------*/
        table {border-collapse:collapse; border-spacing:0;}
        .table {width:100%; margin-bottom:0; text-align:center; background:#fff;}
        .table.type1 {border-top:#0871d0 solid 4px; word-break:keep-all;}
        .table.type1 th {color:#000; padding:15px 5px; border-bottom:#999999 solid 1px; background:#f9f9f6; font-family:NanumGothicBold; font-weight:normal; text-align:center;}
        .table.type1 td {color:#999; padding:12px 5px; border-bottom:#e5e5e5 solid 1px; text-align:center; line-height:inherit;}
        .table.type1 td.subject {background:#f9f9f6;}
        .table.type1 td.bgc {background:#fafafa;}
        .table.type1 td.left {padding-left:12px;}
        .table.type1 td input {display:inline-block; vertical-align:middle;}
        .table.hover tr:hover {background-color:#f2f2f3;}
        .table.none {border:none;}
        .table .w5 {width:5%;}
        .table .w10 {width:10%;}
        .table .w15 {width:15%;}
        .table .w20 {width:20%;}
        .table .w25 {width:25%;}
        .table .w30 {width:30%;}
        .table .w35 {width:35%;}
        .table .w40 {width:40%;}
        .table .w45 {width:45%;}
        .table .w50 {width:50%;}
        .table .w55 {width:55%;}
        .table .w60 {width:60%;}





/* adds some margin below the link sets  */
.navbar .dropdown-menu div[class*="col"] {
   margin-bottom:1rem;
}

.navbar .dropdown-menu {
  border:none;
  background-color:#0060c8 !important;
}

/* breakpoint and up - mega dropdown styles */
@media screen and (min-width: 992px) {
  
  /* remove the padding from the navbar so the dropdown hover state is not broken */
.navbar {
  padding-top:0px;
  padding-bottom:0px;
}

/* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
.navbar .nav-item {
  padding:.5rem .5rem;
  margin:0 .25rem;
}

/* makes the dropdown full width  */
.navbar .dropdown {position:static;}

.navbar .dropdown-menu {
  width:100%;
  left:0;
  right:0;
/*  height of nav-item  */
  top:45px;
  
  display:block;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.3s linear;
  
}
  
 

  
  /* shows the dropdown menu on hover */
.navbar .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
  display:block;
  visibility: visible;
  opacity: 1;
  transition: visibility 0s, opacity 0.3s linear;
}
  
  .navbar .dropdown-menu {
    border: 1px solid rgba(0,0,0,.15);
    background-color: #fff;
  }

}



    </style>
  </head>

  <body onload="initialize()" data-spy="scroll" data-target="#navigation" data-offset="80">
    <section id="navigation" class="fixed-navigation">
      <div class="navbar navbar-default navbar-static-top navbar-transparent" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#home">
              <img src="{BASE_URL}request/image_view/{LOGO_IMG}/logo" width="120"/>
            </a>
          </div>

          <div class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right scrollto">
              <!--li><a href="#home">Home</a></li-->
              <li><a href="#about">About</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#company">Company</a></li>
              <li><a href="#partner">Partner</a></li>
              <li><a href="#recruit">Recruit</a></li>
              <li><a href="#notice">Notice</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <span data-toggle="dropdown" class="dropdown-toggle js-activated">Langueage<b class="caret"></b></span>
                <ul class="dropdown-menu">
                  <li id="lang-ko"><a href="{BASE_URL}main/change_langs/ko">KOREAN</a></li>
                  <li id="lang-en"><a href="{BASE_URL}main/change_langs/en">ENGLISH</a></li>
                  <li id="lang-cn"><a href="{BASE_URL}main/change_langs/cn">CHINESE</a></li>
                  <li id="lang-jp"><a href="{BASE_URL}main/change_langs/jp">JAPANESE</a></li>
                </ul>                 
              </li>

            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container -->
      </div>
    </section><!--navigation section end here-->



    <div class="tp-banner-container" id="home">
      <div class="tp-banner-video">
        <ul>
          <!-- SLIDE  --> 
          <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="{BASE_URL}img/star-cover.jpg"  data-saveperformance="off"  data-title="Quick Results">
            <!-- MAIN IMAGE -->
            <img src="{BASE_URL}img/star-cover.jpg"  alt="video_typing_cover"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
            <!-- LAYERS -->

            <!-- LAYER NR. 1 -->
            <div class="tp-caption tp-fade fadeout fullscreenvideo"
               data-x="0"
               data-y="0"
               data-speed="1000"
               data-start="1100"
               data-easing="Power4.easeOut"
               data-elementdelay="0.01"
               data-endelementdelay="0.1"
               data-endspeed="1500"
               data-endeasing="Power4.easeIn"
               data-autoplay="true"
               data-autoplayonlyfirsttime="false"
               data-nextslideatend="true"
               data-volume="mute" 
               data-forceCover="1" 
               data-aspectratio="16:9" 
               data-forcerewind="on" 
               style="z-index: 2;">
              <video class="img-responsive" preload="none" 
                   poster='{BASE_URL}img/star-cover.jpg'> 
                <source src='{BASE_URL}videos/among_the_stars.mp4' type='video/mp4' />
                <source src='{BASE_URL}videos/among_the_stars.webm' type='video/webm' />
              </video>
            </div>

            <!-- Home Heading -->
            <div class="tp-caption sft Ken-burns-heading"
               data-x="center"  
               data-y="260"
               data-speed="1200"
               data-start="1100"
               data-easing="Power3.easeInOut"
               data-splitin="none"
               data-splitout="none"
               data-elementdelay="0.1"
               data-endelementdelay="0.1"
               data-endspeed="300"
               style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
               {COMPANY_NAME_EN}
            </div>
            <!-- Home Subheading -->
            <div class="tp-caption ken-burns-cap sft fadeout"
               data-x="center" 
               data-y="390" 
               data-speed="1200"
               data-start="1350"
               data-easing="Power3.easeInOut"
               data-splitin="none"
               data-splitout="none"
               data-elementdelay="0.1"
               data-endelementdelay="0.1"
               data-endspeed="300"
               style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
              Good job & Good partner
            </div>
            <!-- Home Button -->
            <div class="tp-caption home-button sft fadeout"
               data-x="center" 
               data-y="450" 
               data-speed="1200"
               data-start="1550"
               data-easing="Power3.easeInOut"
               data-splitin="none"
               data-splitout="none"
               data-elementdelay="0.1"
               data-endelementdelay="0.1"
               data-endspeed="300"
               style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                <div class="rev-buttons scrollto">

                <a href="#home" class="btn btn-theme-color btn-lg">
                  About Us
                </a>                

              </div>
            </div>
          </li>

          <!-- SLIDE  --> 
          <li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="1000" data-thumb="{BASE_URL}img/typing-cover.jpg"  data-saveperformance="off"  data-title="Quick Results">
            <!-- MAIN IMAGE -->
            <img src="{BASE_URL}img/typing-cover.jpg"  alt="video_typing_cover"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
            <!-- LAYERS -->

            <!-- LAYER NR. 1 -->
            <div class="tp-caption tp-fade fadeout fullscreenvideo"
               data-x="0"
               data-y="0"
               data-speed="1000"
               data-start="1100"
               data-easing="Power4.easeOut"
               data-elementdelay="0.01"
               data-endelementdelay="0.1"
               data-endspeed="1500"
               data-endeasing="Power4.easeIn"
               data-autoplay="true"
               data-autoplayonlyfirsttime="false"
               data-nextslideatend="true"
               data-volume="mute" 
               data-forceCover="1" 
               data-aspectratio="16:9" 
               data-forcerewind="on" 
               style="z-index: 2;">
              <video class="img-responsive" preload="none" 
                   poster='{BASE_URL}img/typing-cover.jpg'> 
                <source src='{BASE_URL}videos/computer_typing.mp4' type='video/mp4' />
                <source src='{BASE_URL}videos/computer_typing.webm' type='video/webm' />
              </video> 
            </div>

            <!-- Home Heading -->
            <div class="tp-caption sft Ken-burns-heading"
               data-x="center"  
               data-y="260"
               data-speed="1200"
               data-start="1100"
               data-easing="Power3.easeInOut"
               data-splitin="none"
               data-splitout="none"
               data-elementdelay="0.1"
               data-endelementdelay="0.1"
               data-endspeed="300"
               style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
              SI/IT Outsourcing
            </div>
            <!-- Home Subheading -->
            <div class="tp-caption ken-burns-cap sft fadeout"
               data-x="center" 
               data-y="390" 
               data-speed="1200"
               data-start="1350"
               data-easing="Power3.easeInOut"
               data-splitin="none"
               data-splitout="none"
               data-elementdelay="0.1"
               data-endelementdelay="0.1"
               data-endspeed="300"
               style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
              IT 전문인력을 양성하여 경영 효율 극대화를 지원합니다.
            </div>
            <!-- Home Button -->
            <div class="tp-caption rev-buttons sft fadeout"
               data-x="center" 
               data-y="450" 
               data-speed="1200"
               data-start="1550"
               data-easing="Power3.easeInOut"
               data-splitin="none"
               data-splitout="none"
               data-elementdelay="0.1"
               data-endelementdelay="0.1"
               data-endspeed="300"
               style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
              <div class="rev-buttons scrollto">
                <a href="#about" class="btn btn-theme-color btn-lg">
                  About us
                </a>                
              </div>
            </div>
          </li>


          <!-- SLIDE  -->
          <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="{BASE_URL}img/dark-bg-4.jpg" data-delay="10000"  data-saveperformance="off" data-title="slider 1">
            <!-- MAIN IMAGE -->
            <img src="{BASE_URL}img/dark-bg-4.jpg"  alt="kenburns1"  data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
            <!-- LAYERS -->


            <div class="caption customin customout tp-resizeme ken-burns-cap  font-alt" 
               data-x="center" 
               data-hoffset="0" 
               data-y="center" 
               data-voffset="-100" 
               data-customin="x:-50;y:-300;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;" 
               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 

               data-speed="800" 
               data-start="800" 
               data-startslide="1" 

               data-easing="Power4.easeOut" 
               data-endspeed="500" 
               data-endeasing="Power4.easeIn">

              Development WEB/APP

            </div>
            <div class="caption customin customout tp-resizeme Ken-burns-heading font-alt" 
               data-x="center" 
               data-hoffset="0" 
               data-y="center" 
               data-voffset="0" 
               data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" 
               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
               data-speed="800" 
               data-start="1300" 
               data-startslide="1" 

               data-easing="Power4.easeOut" 
               data-endspeed="500" 
               data-endeasing="Power4.easeIn">
               Special Creative

            </div>
          </li>

          <!-- SLIDE  -->
          <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-thumb="{BASE_URL}img/dark-bg-3.jpg" data-delay="10000"  data-saveperformance="off"  data-title="slider 2">
            <!-- MAIN IMAGE -->
            <img src="{BASE_URL}img/dark-bg-3.jpg"  alt="kenburns6"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="120" data-bgpositionend="center top">

            <!-- LAYERS -->
            <div class="caption customin customout tp-resizeme ken-burns-cap  font-alt" 
               data-x="center" 
               data-hoffset="0" 
               data-y="center" 
               data-voffset="-100" 
               data-customin="x:-50;y:-300;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;" 
               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 

               data-speed="800" 
               data-start="800" 
               data-startslide="1" 

               data-easing="Power4.easeOut" 
               data-endspeed="500" 
               data-endeasing="Power4.easeIn">

              Good Job & Good Partner

            </div>

            <div class="caption customin customout tp-resizeme Ken-burns-heading font-alt" 
               data-x="center" 
               data-hoffset="0" 
               data-y="center" 
               data-voffset="-14" 
               data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" 
               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
               data-speed="800" 
               data-start="1200" 
               data-startslide="1" 

               data-easing="Power4.easeOut" 
               data-endspeed="500" 
               data-endeasing="Power4.easeIn">

              {COMPANY_NAME_EN}

            </div>


            <div class="caption customin customout tp-resizeme" 
               data-x="center" 
               data-hoffset="0" 
               data-y="center" 
               data-voffset="83" 
               data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;" 
               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
               data-speed="800" 
               data-start="1500" 
               data-startslide="1" 

               data-easing="Power4.easeOut" 
               data-endspeed="500" 
               data-endeasing="Power4.easeIn">

              <div class="rev-buttons scrollto">

                <a href="#about" class="btn btn-theme-color btn-lg">
                  About us
                </a>                

              </div>

            </div>
          </li>
          <li class="dark" data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="{BASE_URL}img/dark-bg-1.jpg" data-delay="10000"  data-saveperformance="off" data-title="slider 1">
            <!-- MAIN IMAGE -->
            <img src="{BASE_URL}img/dark-bg-1.jpg"  alt="kenburns1"  data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
            <!-- LAYERS -->
            <div class="caption customin customout tp-resizeme ken-burns-cap   font-alt" 
               data-x="center" 
               data-hoffset="0" 
               data-y="center" 
               data-voffset="-100" 
               data-customin="x:-50;y:-300;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;" 
               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 

               data-speed="800" 
               data-start="1000" 
               data-startslide="1" 

               data-easing="Power4.easeOut" 
               data-endspeed="500" 
               data-endeasing="Power4.easeIn">

              we love what we do

            </div>

            <div class="caption customin customout tp-resizeme Ken-burns-heading dark-text font-alt" 
               data-x="center" 
               data-hoffset="0" 
               data-y="center" 
               data-voffset="0" 
               data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" 
               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
               data-speed="800" 
               data-start="1300" 
               data-startslide="1" 

               data-easing="Power4.easeOut" 
               data-endspeed="500" 
               data-endeasing="Power4.easeIn">

              Special Developer

            </div>


            <div class="caption customin customout tp-resizeme" 
               data-x="center" 
               data-hoffset="0" 
               data-y="center" 
               data-voffset="120" 
               data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;" 
               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
               data-speed="800" 
               data-start="1500" 
               data-startslide="1" 

               data-easing="Power4.easeOut" 
               data-endspeed="500" 
               data-endeasing="Power4.easeIn">
              <div class="rev-buttons scrollto">

                <a href="#company" class="btn btn-theme-color btn-lg">
                  in Company
                </a>                
              </div>
            </div>
          </li>
        </ul>
      </div>

    </div>  <!--video slider-->

