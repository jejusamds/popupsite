  <!-- 위치 -->
  <section class="sub_sitemap" id="sub_sitemap">
    <div class="container">
      <div class="row mt-2 mt-lg-5">
        <div class="col-12">
         <img src="{BASE_URL}img/sub_sitemap_home.png"> &nbsp > &nbsp 
         <a href="#">이용안내</a> &nbsp > &nbsp  
         오시는 길
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
          <p class="sub_title_big mb-lg-2 mb-1 mt-3">오시는 길</p>
          <p class="sub_title_small ">부산 금정구 반송로 470</p>
        </div>
      </div>
    </div>
  </section>
  <!-- //타이틀 -->

  <!-- 서브 탑 이미지 -->
  <section id="sub02_topimg" class="mt-lg-3 mt-2">
    <div class="container">
      <h2 class="sub_topimg_text">
        “ 전화주시면<span> 친절하게 안내</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;해드리겠습니다. "
      </h2>
    </div>
  </section>
  <!-- //서브 탑 이미지 -->


  <!-- 지도보기 탭 만들어야 되는데 ㅠㅠㅠㅠ부트스트랩에서 제공하는 탭 모하겠어여ㅠㅠㅠㅠㅠㅠㅠㅠ... 힝 -->
  <section id="sub02_01" class="sub02_01 mt-lg-5 mt-4 mb-5">
    <div class="container">
      <ul class="nav nav-pills mb-3 bg-light" id="pills-tab" role="tablist">
        <li class="nav-item col-6 p-0">
          <a class="nav-link active p-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><h3 class="mt-2 ml-3">지도보기</h3></a>
        </li>
        <li class="nav-item col-6 p-0">
          <a class="nav-link p-2" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><h3 class="mt-2 ml-3">약도보기</h3></a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div id="map-canvas" class="border" style="height:243px;"></div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">        
          <img src="{BASE_URL}img/sub02-01map_02.jpg" class="img-fluid">
        </div>
      </div>
      <div class="row p-0">
        <div class="col-12 ">
          <h5 class="col-12 p-2 p-lg-5 bg-map">· 신주소: <span class="mapfont">부산 금정구 반송로 470    /</span>   구주소: <span class="mapfont">부산 금정구 금사동 118-5 </span><br>· 대표번호: <span class="callfont">051-521-7581~3</span></h5>
        </div>
      </div>
      <div class="row mt-5 img-center">
        <div class="col-12 col-lg-2">
          <img src="{BASE_URL}img/sub02-01subway.png">
        </div>
        <div class="col-12 mt-2 col-sm-10 mt-lg-4">
          <h4 class="mt-2">지하철 4호선 금사역 2번 출구</h4>
          <h5 class="map-text mt-2">지하철 4호선 금사역 2번 출구로 나오시면 좌측으로 병원이 보입니다.</h5>
        </div>
      </div>
      <div class="row mt-5 img-center">
        <div class="col-12 col-lg-2">
          <img src="{BASE_URL}img/sub02-01bus.png">
        </div>
        <div class="col-12 mt-2 col-lg-10 mt-lg-4">
          <h4 class="mt-2"><span class="bus-line-1">189번</span>, <span class="bus-line-1">129-1번</span>, <span class="bus-line-1">183번</span>, <span class="bus-line-2">1010번</span></h4>
          <h5 class="map-text mt-lg-2">금사역 정류장에서 하차하시면 도보로 2분거리에 병원이 위치하고 있습니다.</h5>
        </div>
      </div>
      <div class="row mt-5 img-center">
        <div class="col-12 col-lg-2">
          <img src="{BASE_URL}img/sub02-01townbus.png">
        </div>
        <div class="col-12 mt-2 col-lg-10 mt-lg-4">
          <h4 class="mt-2"><span class="bus-line-3">금정구 6번</span>, <span class="bus-line-3">금정구 6-1번</span></h4>
          <h5 class="map-text mt-lg-2">금사역 정류장에서 하차하시면 도보로 2분거리에 병원이 위치하고 있습니다.</h5>
        </div>
      </div>
      <div class="row mt-5 img-center">
        <div class="col-12 col-lg-2">
          <img src="{BASE_URL}img/sub02-01car.png">
        </div>
        <div class="col-12 mt-2 col-lg-10 mt-lg-4">
          <h4 class="mt-2">네비게이션 이용시</h4>
          <h5 class="map-text mt-lg-2">‘부산시 금정구 반송로 470’, 또는 ‘금사역 2번 출구’로 검색하시면 됩니다.</h5>
        </div>
      </div>
    </div>
  </section>
  <!-- //지도보기 -->

  <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=9ca1a58a84ff8b12180de946e4880b0d"></script>

  <script>

      /* MAPS
      --------------------------------------------------------------*/
      var lat  = 35.2155472;;
      var lng  = 129.11531390000005;
      var container = document.getElementById('map-canvas');
      var options = {
          center: new daum.maps.LatLng(lat, lng),
          level: 3
      };

      var map = new daum.maps.Map(container, options);
      var markerPosition  = new daum.maps.LatLng(lat, lng);

      var marker = new daum.maps.Marker({
        position: markerPosition
      });

      marker.setMap(map);
  </script>
