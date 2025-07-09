  <!-- 위치 -->
  <section class="sub_sitemap" id="sub_sitemap">
    <div class="container">
      <div class="row mt-2 mt-lg-5">
        <div class="col-12">
         <img src="{BASE_URL}img/sub_sitemap_home.png"> &nbsp > &nbsp 
         <a href="#">진료안내</a> &nbsp > &nbsp  
         의료진
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
          <p class="sub_title_big mb-lg-2 mb-1 mt-3">의료진</p>
        </div>
      </div>
    </div>
  </section>
  <!-- //타이틀 -->

  <!-- 서브 탑 이미지 -->
  <section id="sub03_topimg" class="mt-2">
    <div class="container">
      <p class="sub_topimg_text">
        " <span>우수한 의료진</span>들이<br>함께합니다. "
      </p>
    </div>
  </section>
  <!-- //서브 탑 이미지 -->

  <!-- 의료진 -->
  <section id="sub03_con" class="mt-lg-3 mt-2">
    <div class="container">
      <div class="row">
        <p class="col-12 sub01_01con_title mt-3"><img src="{BASE_URL}img/ic_square.png" class="mr-2">의료진 소개</p>
        <h6 class="pl-3 pr-3" style="line-height:1.5">부산금사요양병원은 경험 많은 의료진과 친절한 간병사가 24시간 모시는 곳입니다. 중풍, 치매, 노인성 질환, 퇴행성 질환의 통증관리, 말기 암 등 재활 및 장기요양이 필요한 환자들을 전문적으로 치료하여 인간의 존엄성 회복 및 삶의 질 향상을 도와드리고자 노력합니다.</h6>

        {ROWS}
        <!-- items -->
        <div class="col-12 col-sm-12 col-md-6 mt-2">
          <div class="row p-2">
            <div class="col-12">
              <div class="row border-blue p-lg-2" style="border-radius:10px;">
                <div class="col-12 mt-4 mb-4 sub03_int">
                    <h2 class="text-left weight300">
                      <span class="text-25 weight500">
                        <i class="fa fa-stethoscope"></i>&nbsp;{MS_PART}
                      </span>
                    </h2>
                  <div class="sub03_name float-right">
                    <h2 class="text-right weight300"><span class="text-25">{MS_RANK}</span><span class="text-blue weight700 mr-2">&nbsp;&nbsp;{MS_NAME}</span></h6>
                  </div>
                </div>
                <div class="col-12 mt-3 b-r pl-3 mb-3">
                  <h6><img src="{BASE_URL}img/sub03_s.png" class="pr-2">약력</h6>
                  <h6 style="line-height:1.8; font-size:.9rem;">{MS_HISTORY}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- items -->
        {/ROWS}

      </div>
    </div>
  </section>
