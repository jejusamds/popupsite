  <!-- 위치 -->
  <section class="sub_sitemap" id="sub_sitemap">
    <div class="container">
      <div class="row mt-2 mt-lg-5">
        <div class="col-12">
         <img src="{BASE_URL}img/sub_sitemap_home.png"> &nbsp > &nbsp 
         <a href="#">병원소식</a> &nbsp > &nbsp  
         사회복지프로그램
        </div>
      </div>
    </div>
  </section>
  <!-- 위치 -->

  <!-- 타이틀 -->
  <section class="sub_title">
    <div class="container">
      <div class="row mt-2 mt-lg-5">
        <div class="col-12 justify-content-center text-center">
          <p class="sub_title_big mb-lg-2 mb-1 mt-3">사회복지프로그램</p>
        </div>
      </div>
    </div>
  </section>
  <!-- //타이틀 -->

  <!-- 서브 탑 이미지 -->
  <section id="sub05_04topimg" class="mt-lg-3 mt-2">
      <div class="container">
      <h4 class="sub_topimg_text wow animated fadeInDown" data-wow-duration="0.2s">
        “ 다양한 프로그램을 통해<br><span>환자들의 사회성과 존엄성을 유지</span><br>할 수 있도록 돕습니다."
      </h4>
      </div>

  </section>
  <!-- //서브 탑 이미지 -->

  
  <!-- 면회안내 -->
  <section id="sub05_carte" class="mt-lg-5 mt-4">
    <div class="container">
      <div class="row board_detail_top mt-5">
        <div class="col-2 col-lg-1 pr-0">
          <h6> 제목 </h6>
        </div>
        <div class="col-10 col-lg-11">
          <h4 class="mb-0">{WEL_TITLE}</h4>
        </div>
        <div class="col-12 p-0">
          <hr>
        </div>
        <div class="col-2 col-lg-1 pr-0">
          <h6> 작성 </h6>
        </div>
        <div class="col-7 col-sm-6 col-lg-7">
          <h6> {USR_NAME} </h6>
        </div>
        <div class="col-12 col-sm-4 text-right">
          <h6> 작성일 {DATE} </h6>
        </div>
      </div>
      <div class="row justify-content-center mt-5 ">
        <div class="col-12 col-sm-5 col-lg-2 border text-center bg-lightblue m-2 pt-3 pb-3 pl-1 pr-1">          
          <h5>월</h5>
          <hr>
          <h6 class="mt-2">{MON}</h6>            
        </div>
        <div class="col-12 col-sm-5 col-lg-2 border text-center  m-2 pt-3 pb-3 pl-1 pr-1">          
          <h5>화</h5>
          <hr>
          <h6 class="mt-2">{TUE}</h6>            
        </div>
        <div class="col-12 col-sm-5 col-lg-2 border text-center bg-lightblue m-2 pt-3 pb-3 pl-1 pr-1">          
          <h5>수</h5>
          <hr>
          <h6 class="mt-2">{WED}</h6>            
        </div>
        <div class="col-12 col-sm-5 col-lg-2 border text-center m-2 pt-3 pb-3 pl-1 pr-1">          
          <h5>목</h5>
          <hr>
          <h6 class="mt-2">{THU}</h6>            
        </div>
        <div class="col-12 col-sm-5 col-lg-2 border text-center bg-lightblue m-2 pt-3 pb-3 pl-1 pr-1">          
          <h5>금</h5>
          <hr>
          <h6 class="mt-2"">{FRI}</h6>            
        </div>
        <!--<div class="col-12 col-sm-5 col-lg-2 border text-center bg-lightblue m-2 pt-3 pb-3 pl-1 pr-1">          
          <h5>토</h5>
          <hr>
          <h6 class="mt-2"">{SAT}</h6>            
        </div>
        <div class="col-12 col-sm-5 col-lg-2 border text-center bg-lightblue m-2 pt-3 pb-3 pl-1 pr-1">          
          <h5>일</h5>
          <hr>
          <h6 class="mt-2">{SUN}</h6>            
        </div>-->
      </div>

      <div class="row board_detail_bottom mt-5 mb-3 text-left">
        {PREV}
        {NEXT}
      </div>
      <a href="{BASE_URL}index.php/news/welfare">
        <div class="row mb-5">
          <div class="col-12">
            <h6 class="btn board_btn_list">목록</h6>
          </div>
        </div>
      </a>
    </div>
  </section>

  <section id="gallery">
    <div class="container">

       <div class="mt-3 flexslider carousel">
         <ul class="slides">
           {GALLERY_ROWS}
           <li>
<!--             <a href="{BASE_URL}index.php/request/image_view/{IMG_PATH}/gallery"    -->
             <a href="{BASE_URL}index.php/news/welfare_gallery">
               <div class="image-wrapper">
                 <img style="background:url('{BASE_URL}index.php/request/image_view/{IMG_PATH}/gallery') 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img.png" class="rank_froimg" alt="{COMPANY_NAME} 갤러리">
                 <div class="image-overlay">
                   <p>
                     상 세 보 기
                   </p>
                 </div><!--.image-overlay-->
               </div><!--.image-wrapper-->
             </a>
           </li>
           {/GALLERY_ROWS}
        </ul>
      </div>
    </div>
  </section>
  <!-- //면회안내 -->


  <!-- 푸터 -->
  <section id="footer" class="mt-5 p-3">
    <div class="container" >
     <div class="row text-white">
      <p class="pt-1 pt-lg-3">상호: 의료법인해림의료재단 부산금사요양병원 ㅣ 주소: 부산광역시 금정구 반송로 470 ㅣ 대표: 주성호 ㅣ 사업자등록번호: 621-82-12497 TEL: {COMPANY_TEL_NUM}   FAX: 051-521-7584 ㅣ 관리책임자: 부산금사요양병원</p>
      <p class="mt-1">© Copyright 2018, GUEMSA CARE HOSPITAL IN BUSAN All Rights Reserved.</p>

    </div>
  </section>
  <!-- //푸터 -->

  <!--script files-->
  <script src="{BASE_URL}js/jquery.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery-migrate.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.easing.1.3.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/bootstrap.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.sticky.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.stellar.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/owl.carousel.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.isotope.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.imagesloaded.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.counterup.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.countdown.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/contact_me.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/swiper.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/lightbox-plus-jquery.min.js"></script>

  <!-- jquery1.x 사용 스크립트 -->
  <script src="{BASE_URL}js/jquery.1.11.1.min.js"></script>
  <script src="{BASE_URL}js/jquery.flexslider.min.js" type="text/javascript"></script>

  <script>
      $(window).load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          animationLoop: true,
          touch:true,
          itemWidth: 210,
          itemMargin: 5,
          minItems: 2,
          maxItems: 6
        });
      });

  </script>
  </body>
</html>

</html>

