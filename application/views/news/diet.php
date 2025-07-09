  <!-- 위치 -->
  <section class="sub_sitemap" id="sub_sitemap">
    <div class="container">
      <div class="row mt-2 mt-lg-5">
        <div class="col-12">
         <img src="{BASE_URL}img/sub_sitemap_home.png"> &nbsp > &nbsp 
         <a href="#">병원소식</a> &nbsp > &nbsp  
         영양식단
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
          <p class="sub_title_big mb-lg-2 mb-1 mt-3">영양식단</p>
          <p class="sub_title_small ">신선하고 안전한 제철 영양식단</p>
        </div>
      </div>
    </div>
  </section>
  <!-- //타이틀 -->

  <!-- 서브 탑 이미지 -->
  <section id="sub05_03topimg" class="mt-lg-3 mt-2">
    <div class="container">
      <h4 class="col-6 ml-lg-5 sub05_topimg_text text-center shaow wow animated fadeInDown" data-wow-duration="0.2s">
        “ 모든 치료의 기본은<br><span>안전하고 바른 먹거리</span>라는<br>믿음을 지켜갑니다 "
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

  
  <!-- 면회안내 -->
  <section id="sub05" class="sub05 mt-lg-5 mt-4">
    <div class="container">
      <div class="content mt-5" data-content="content-2">
        <div class="board_type1_wrap">
          <table class="board_list_type1">        
            <thead>
              <tr>            
                <th class="active_num">번호</th>
                <th>&nbsp;&nbsp;제목</th>
                <th class="active_type">작성자</th>
                <th class="active_date">날짜</th>
              </tr>
            </thead>
            <tbody>
              {ROWS}
              <tr>
                <td class="active_num text-blue ">{ROWNUM}</td>
                <td class="left text-over">
                  <a href="{BASE_URL}index.php/news/diet_detail/{ID}">
                    {TITLE} {IS_NEW}
                  </a>
                </td>
                <td class="active_write">{USR_NAME}</td>
                <td class="active_date text-lblue weight300">{DATE}</td>
              </tr>
              {/ROWS}
              {EMPTY}
            </tbody>
          </table>
        </div>
      </div>

      <div class="row mt-5 justify-content-center">
        <div class="col-11 p-0 col-lg-8 text-center">
            {PAGINATION}
        </div>
      </div>

      <div class="row mt-5 pt-3 pb-3 border justify-content-center bg-light mb-5 text-center">
          <div>
            <select name="search_type" id="search_type" class="select_borad">
              <option value="diet_title"> 제목 </option>
            </select>
            <input type="text" name="search_value" id="search_value" class="search_borad">
            <button class="btn_search">검색</button>
          </div>
      </div>
    </div>
  </section>
  <!-- //면회안내 -->


<script src="{BASE_URL}js/jquery.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    $("#search_type").val(["{SEARCH_TYPE}"]);
    $("#search_value").val(decodeURI("{SEARCH_VALUE}"));

    $(".btn_search").click(function(){
      var url = "{BASE_URL}index.php/news/diet/"+$("#search_type").val()+"/"+$("#search_value").val();
      location.href = url;
    });
  });
</script>
