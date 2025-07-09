  <!-- 위치 -->
  <section class="sub_sitemap" id="sub_sitemap">
    <div class="container">
      <div class="row mt-2 mt-lg-5">
        <div class="col-12">
         <img src="{BASE_URL}img/sub_sitemap_home.png"> &nbsp > &nbsp 
         <a href="#">진료안내</a> &nbsp > &nbsp  
         비급여수가안내
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
          <p class="sub_title_big mb-lg-2 mb-1 mt-3">비급여수가안내</p>
        </div>
      </div>
    </div>
  </section>
  <!-- //타이틀 -->

  <!-- 서브 탑 이미지 -->
  <section id="sub02_topimg" class="mt-2 mt-lg-0">
    <div class="container">
      <p class="sub_topimg_text ml-5 mt-m mt-xl-2 mt-lg-0">
        “ <span>의료법에 의거</span>하여<br>비급여수가를 아래와 같이<br>공지합니다. "
      </p>
    </div>
  </section>
  <!-- //서브 탑 이미지 -->



  <section class="sub02_05 mt-lg-5 mt-4 mb-5">
    <div class="container">
      <!-- 상급병실치료차액-->
      <div class="row">
        <p class="col-12 sub01_01con_title"><img src="{BASE_URL}img/ic_square.png" class="mr-2">상급병실치료차액</p>
      </div>
      <table border="0" cellspacing="0" class="bordertop table col-12 text-center b-l b-r b-b p-0">
        <colgroup>
          <col width="25%" />
          <col width="32.5%" />
          <col width="32.5%" />
          <col width="10%" />
        </colgroup>
        <tr class="bg-light text-lightblue">
          <th rowspan="2" class="p-1 p-lg-2">분류</th>
          <th colspan="2" class="b-l b-r p-1 p-lg-2">항목</th>
          <th rowspan="2" class="p-0 p-lg-2">비고</th>
        </tr>
        <tr class="bg-light text-lightblue">
          <th class="b-l p-1 p-lg-2">항목</th>
          <th class="b-l b-r p-1 p-lg-2">진료비용</th>                  
        </tr>
        {ROOM_ROWS}
        <tr>
          <td>{TYPE}</td>
          <td class="b-l">{CATEGORY}</td>
          <td class="b-l b-r">{PRICE}</td>
          <td></td>
        </tr>
        {/ROOM_ROWS}
      </table>
      <!-- //상급병실치료차액-->

      <!-- 약제 및 치료재료-->
      <div class="row mt-5">
        <p class="col-12 sub01_01con_title"><img src="{BASE_URL}img/ic_square.png" class="mr-2">약제 및 치료재료</p>
      </div>
      <table border="0" cellspacing="0" class="bordertop table col-12 text-center b-l b-r b-b">
        <colgroup>
          <col width="20%" />
          <col width="25%" />
          <col width="10%" />
          <col width="10%" />
          <col width="20%" />
          <col width="10%" />
        </colgroup>
        <tr class="bg-light text-lightblue">
          <th rowspan="2" class="p-1 p-lg-2">분류</th>
          <th colspan="4" class="b-l b-r p-1 p-lg-2">항목</th>
          <th rowspan="2" class="p-0 p-lg-2">비고</th>
        </tr>
        <tr class="bg-light text-lightblue">
          <th class="b-l p-1 p-lg-2">기본</th>
          <th class="b-l b-r p-1 p-lg-2">세부</th>
          <th class="b-l p-1 p-lg-2">단위</th>
          <th class="b-l b-r p-1 p-lg-2">가격</th>   
        </tr>
        {PHAR_ROWS}
        <tr>
          <td>{TYPE}</td>
          <td class="b-l p-1">{CATEGORY}</td>
          <td class="b-l p-1">{CATEGORY_DETAIL}</td>
          <td class="b-l p-1">{UNIT}</td>
          <td class="b-l b-r p-1">{PRICE}</td>
          <td>{MEMO}</td>
        </tr>
        {/PHAR_ROWS}
      </table>
      <!-- //약제 및 치료재료-->

      <!-- 제증명 수수료-->
      <div class="row mt-5">
        <p class="col-12 sub01_01con_title"><img src="{BASE_URL}img/ic_square.png" class="mr-2">제증명 수수료</p>
      </div>
      <table border="0" cellspacing="0" class="bordertop table col-12 text-center b-l b-r b-b">
        <colgroup>
          <col width="20%" />
          <col width="25%" />
          <col width="10%" />
          <col width="10%" />
          <col width="20%" />
          <col width="10%" />
        </colgroup>
        <tr class="bg-light text-lightblue">
          <th rowspan="2" class="p-1 p-lg-2">분류</th>
          <th colspan="4" class="b-l b-r p-1 p-lg-2">항목</th>
          <th rowspan="2" class="p-0 p-lg-2">비고</th>
        </tr>
        <tr class="bg-light text-lightblue">
          <th class="b-l p-1 p-lg-2">기본</th>
          <th class="b-l b-r p-1 p-lg-2">세부</th>
          <th class="b-l p-1 p-lg-2">단위</th>
          <th class="b-l b-r p-1 p-lg-2">가격</th>   
        </tr>
        {CERT_ROWS}
        <tr>
          <td>{TYPE}</td>
          <td class="b-l p-1 p-lg-2">{CATEGORY}</td>
          <td class="b-l p-1 p-lg-2">{CATEGORY_DETAIL}</td>
          <td class="b-l p-1 p-lg-2">{UNIT}</td>
          <td class="b-l b-r p-1 p-lg-2">{PRICE}</td>
          <td>{MEMO}</td>
        </tr>
        {/CERT_ROWS}
      </table>
      <!-- //제증명 수수료-->
    </div>
  </section>
