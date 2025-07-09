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
      <h4 class="col-lg-4 sub05_topimg_text shaow wow animated fadeInDown" data-wow-duration="0.2s">
        “ 모든 치료의 기본은<br><span>안전하고 바른 먹거리</span><br>라는 믿음을 지켜갑니다 "
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
          <h4 class="mb-0"> {DIET_TITLE}</h4>
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
      <div class="row p-2">
        <div class="col">
          <table border="0" cellspacing="0" class=" table col-12 text-center b-l b-r b-b p-0">
            <colgroup>
              <col width="17.5%" />
              <col width="27.5%" />
              <col width="27.5%" />
              <col width="27.5%" />
            </colgroup>
            <tr class="bg-light text-lightblue">
              <th class="p-1 p-lg-2"><b>요일</b></th>
              <th class="p-1 p-lg-2"><b>아침</b></th>
              <th class="p-1 p-lg-2"><b>점심</b></th>
              <th class="p-1 p-lg-2"><b>저녁</b></th>
            </tr>
            <tr>
              <td class="bg-light text-lightblue" style="vertical-align:middle;"><b>월요일</b></td>
              <td class="b-l">{MON1}</td>
              <td class="b-l b-r">{MON2}</td>
              <td class="b-r">{MON3}</td>
            </tr>
            <tr>
              <td class="bg-light text-lightblue" style="vertical-align:middle;"><b>화요일</b></td>
              <td class="b-l">{TUE1}</td>
              <td class="b-l b-r">{TUE2}</td>
              <td class="b-r">{TUE3}</td>
            </tr>
            <tr>
              <td class="bg-light text-lightblue" style="vertical-align:middle;"><b>수요일</b></td>
              <td class="b-l">{WED1}</td>
              <td class="b-l b-r">{WED2}</td>
              <td class="b-r">{WED3}</td>
            </tr>
            <tr>
              <td class="bg-light text-lightblue" style="vertical-align:middle;"><b>목요일</b></td>
              <td class="b-l">{THU1}</td>
              <td class="b-l b-r">{THU2}</td>
              <td class="b-r">{THU3}</td>
            </tr>
            <tr>
              <td class="bg-light text-lightblue" style="vertical-align:middle;"><b>금요일</b></td>
              <td class="b-l">{FRI1}</td>
              <td class="b-l b-r">{FRI2}</td>
              <td class="b-r">{FRI3}</td>
            </tr>
            <tr>
              <td class="bg-light text-lightblue" style="vertical-align:middle;"><b>토요일</b></td>
              <td class="b-l">{SAT1}</td>
              <td class="b-l b-r">{SAT2}</td>
              <td class="b-r">{SAT3}</td>
            </tr>
            <tr>
              <td class="bg-light text-lightblue" style="vertical-align:middle;"><b>일요일</b></td>
              <td class="b-l">{SUN1}</td>
              <td class="b-l b-r">{SUN2}</td>
              <td class="b-r">{SUN3}</td>
            </tr>
            <tr>
              <td class="bg-light text-lightblue" style="vertical-align:middle;"><b>원산지</b></td>
              <td colspan="3" class="b-l b-r">{ORIGIN}</td>
            </tr>
            <tr>
              <td colspan="4">* 식단표는 수급사정에 따라 변동될 수 있습니다.</td>
            </tr>
          </table>

        </div>
      </div>

      <div class="row board_detail_bottom mt-5 mb-3 text-left">
        {PREV}
        {NEXT} 
      </div>
      <a href="{BASE_URL}index.php/news/diet">
      <div class="row mb-5">
        <div class="col-12">
          <h6 class="btn board_btn_list">목록</h6>
        </div>
      </div>
	  </a>
    </div>
  </section>
  <!-- //면회안내 -->
