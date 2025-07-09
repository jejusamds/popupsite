  <!-- 위치 -->
  <section class="sub_sitemap" id="sub_sitemap">
    <div class="container">
      <div class="row mt-2 mt-lg-5">
        <div class="col-12">
         <img src="{BASE_URL}img/sub_sitemap_home.png"> &nbsp > &nbsp 
         <a href="#">병원소식</a> &nbsp > &nbsp  
         사회복지프로그램 갤러리
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
          <p class="sub_title_big mb-lg-2 mb-1 mt-3">사회복지프로그램 갤러리</p>
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

  <script>
  $(function(){
    $(window).resize(function(){
      var browser_size = window.outerWidth;
      if (browser_size <= 760) {
        var width = browser_size/100*90;
        $(".board_list_type1 tbody tr td:nth-child(3)").css("width", width).css("text-overflow","ellipsis").css("overflow","hidden").css("white-space","nowrap");
      }  
    }).resize();
  });  
  </script>


  <!-- 게시판 상세페이지 -->
  <section class="sub01_allery">
    <div class="container">

      <div class="row mb-5">
        <!-- START ROW -->
        {ROWS}
        <div class="col-12 col-md-4 mt-5 iso-call">
          <a href="{BASE_URL}index.php/request/image_view/{IMG_PATH}/gallery"
             data-lightbox="preview-images"
             data-title="{TITLE}" data-alt="{CONTENTS}">
            <div class="image-wrapper">
              <img class="card-img-top" style="background:url('{BASE_URL}index.php/request/image_view/{IMG_PATH}/gallery') 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img_h312.png" alt="{TITLE}">
              <div class="image-overlay">
                <p>
                  상 세 보 기
                </p>
              </div><!--.image-overlay-->
            </div><!--.image-wrapper-->
          </a>
          <div class="gallery-sesc">
            <p>
              {TITLE}
            </p>
          </div><!--.gallery-desc-->
        </div>
        {/ROWS}

      <!-- ROW END -->
      </div>

      <div class="row mt-5 justify-content-center">
        {PAGINATION}
      </div>

      <div class="row mt-5 border justify-content-center bg-light mb-5 text-center">
          <div>
            <select id="search_type" name="search_type" class="select_borad">
              <option value="gbbs_title"> 제목 </option>
              <option value="gbbs_contents"> 내용 </option>
            </select>
            <input id="search_value" name="search_value" type="text" class="search_borad">
            <button class="btn_search">검색</button>
          </div>
      </div>
    </div>
  </section>
  <!-- //면회안내 -->


<script src="{BASE_URL}js/jquery.min.js" type="text/javascript"></script>
<script src="{BASE_URL}js/lightbox-plus-jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#search_type").val(["{SEARCH_TYPE}"]);
    $("#search_value").val(decodeURI("{SEARCH_VALUE}"));

    $(".btn_search").click(function(){
      var url = "{BASE_URL}index.php/news/welfare_gallery/"+$("#search_type").val()+"/"+$("#search_value").val();
      location.href = url;
    });
  });
</script>

