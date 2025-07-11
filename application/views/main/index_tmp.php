	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" language="javascript">
		$(function() {
			// 팝업 쿠키체크
			if( getCookie("close_event01")){
				$("#pop_event01").hide();
			}else{
				$("#pop_event01").show();
				
				// 팝업 이벤트 슬라이드
				pop_event_slide = new Swiper ('.pop_event_slide', {
					slidesPerView: 'auto',
					autoplay: {
						delay: 4000,
						disableOnInteraction: false,
					},
					speed: 1500,
					loop: true,
					observer: true,
					observeParents: true,
				});
			}
		});
		
		function setCookie( name, value, expiredays ){
			var todayDate = new Date();
			todayDate.setDate( todayDate.getDate() + expiredays );
			document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
		}
		
		function closeWin(idx){
			setCookie("close_"+idx,"close_"+idx,1);
			$("#pop_"+idx).hide();
		}
		
		function closeWinNo(idx){
			$("#pop_"+idx).hide();
		}
		
		function getCookie( cookieName ){
			var search = cookieName + "=";
			var cookie = document.cookie;
			
			if( cookie.length > 0 ){
				startIndex = cookie.indexOf( cookieName );
				if( startIndex != -1 ){
					startIndex += cookieName.length;
					endIndex = cookie.indexOf( ";", startIndex );
					if( endIndex == -1) endIndex = cookie.length;
					return unescape( cookie.substring( startIndex + 1, endIndex ) );
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
	</script>

	<style>
		/*팝업 이벤트*/
		.pop_event {width:500px; position:absolute; top:323px; left:100px; z-index:100; display:none;}
		.pop_event > .contents_con {}
		.pop_event > .contents_con > .slide_con {background-color:#FFF;}
		.pop_event > .contents_con > .slide_con .swiper-container {width:100%; margin:0 auto;}
		.pop_event > .contents_con > .slide_con .swiper-container .swiper-wrapper {}
		.pop_event > .contents_con > .slide_con .swiper-container .swiper-wrapper .swiper-slide {}
		.pop_event > .contents_con > .slide_con .swiper-container .swiper-wrapper .swiper-slide > a {display:block;}
		.pop_event > .contents_con > .slide_con .swiper-container .swiper-wrapper .swiper-slide > a img {width:100%; max-width:500px; height:auto;}
		.pop_event > .contents_con > .btn_con {}
		.pop_event > .contents_con > .btn_con > table {width:100%; margin:0 auto;}
		.pop_event > .contents_con > .btn_con > table > tbody > tr > td {}
		.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td01 {}
		.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td01 label {display:block; margin-bottom:0; cursor:pointer;}
		.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td01 label > input {display:none;}
		.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td01 label > span {display:block; background-color:#0284cf; text-align:center; font-size:16px; color:#ffffff; line-height:40px;}
		.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td02 {width:100px}
		.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td02 a {display:block; background-color:#000000; text-align:center; font-size:16px; color:#ffffff; line-height:40px;}
		.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td02 a:hover {text-decoration:none;}

		@media all and (max-width: 767px) {
			/*팝업 이벤트*/
			.pop_event {width:65.19vw; margin:0 auto; top:28.03vw; left:0; right:0;}
			.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td01 label > span {font-size:2.09vw; line-height:5.22vw;}
			.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td02 {width:13.04vw}
			.pop_event > .contents_con > .btn_con > table > tbody > tr > .close_td02 a {font-size:2.09vw; line-height:5.22vw;}
		}
	</style>
		
	 <div id="pop_event01" class="pop_event">
		<div class="contents_con">
			<div class="slide_con">
				<div class="swiper-container pop_event_slide">
					<div class="swiper-wrapper">
						<div class="swiper-slide pop_event_slide_div" data-swiper-autoplay="4000">
							<a href="javascript:void(0);">
								<img src="/web/img/test_img.png" />
							</a>
						</div>
						<div class="swiper-slide pop_event_slide_div" data-swiper-autoplay="4000">
							<a href="javascript:void(0);">
								<img src="/web/img/test_img.png" />
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="btn_con">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td align="left" class="close_td01">
							<label>
								<input type="checkbox" name="notice" onClick="closeWin('event01')" />
								<span>
									오늘 하루 동안 열지 않음
								</span>
							</label>
						</td>
						<td align="right" class="close_td02">
							<a href="javascript:closeWinNo('event01');">
								창닫기
							</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
  
  
  <!-- 메인슬라이드 (일감꺼 빼겨옴)-->
  <section style="position:relative;" id="home" class="section active" data-stellar-background-ratio="0.5">
    <div class="swiper-container main-banner">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div id="main-page-1">
            <div class="">
              <div class="main_text_01 ml-3 ml-lg-5 mt-lg-5">
                <span class="text-main-b mt-lg-5 text-center text-none">언제나 처음과 같은 마음으로</span><br>
                <span class="text-main-0d004c mt-lg-5 text-center text-none">진심을 담아 진료하겠습니다.</span>
                <!--<span class="text-main-b ml-lg-5 mt-lg-5">금정구 금사동 최대규모</span>-->
              </div>               
              <!--<img src="{BASE_URL}img/main-text-01.png" class="img-none" alt="보건복지부 인증의료기관!">-->
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div id="main-page-2">
           <div class="">
              <div class="main_text_01 ml-3 ml-lg-5 mt-lg-5 float-right text-right">
                <span class="text-main-brown mt-lg-5 text-center text-none">내 집처럼 편안하고</span><br>
                <span class="text-main-4a2100 mt-lg-5 text-center text-none">내 가족같이 따뜻함이 있는</span>
              </div>
            </div>
          </div>
        </div>
<!--        <div class="swiper-slide">
          <div id="main-page-3">
            <div class="">
              <div class="main_text_01 ml-3 ml-lg-5 mt-lg-5 float-right text-right">
                <span class="text-main-b4 mt-lg-5 text-center text-none">인공신장실</span><br>
                <span class="text-main-0d004c4 mt-lg-5 text-center text-none"><b>OPEN</b></span>
              </div>
            </div>
          </div>
        </div>
-->
      </div>
    </div>

    <div class="swiper-container mini-banner  img-border">
      <div class="swiper-button-prev swiper-button-white"></div>
      <div class="swiper-button-next swiper-button-white"></div>

      <div class="swiper-wrapper">
        <div class="swiper-slide">
              <img src="{BASE_URL}img/mini-01.jpg" class="img-fluid" alt="보건복지부 인증의료기관!">
        </div>
       <div class="swiper-slide">
                <img src="{BASE_URL}img/mini-02.jpg" class="img-fluid" alt="인공신장실 오픈">
          </div>

        </div>
      </div>
<!--      <div class="text-center swiper-pagination"></div>  -->
    </div>

  </section>
  <!-- 메인슬라이드-->

  <!-- 병원 장점 5가지 -->
  <section id="merit" class="mt-5 p-0">
    <div class="col">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-xl-2 text-center wow animated fadeInDown" data-wow1duration="0.1s">
              <div class="card mb-2">
                <img class="card-img-top" style="background:url({BASE_URL}img/merit_01.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img.png" alt="전문의 진료, 24시간 간호 전문 인력 상주">
              </div>
              <h5 class="mt-2 mt-lg-3">전문의 진료, 24시간 간호 전문 인력 상주</h5>
              <p class="mt-2 mt-lg-3 con">전문의가 환자 개개인 상태에 따른 1:1맞춤 진료를 실시합니다. 숙련된 간호 전문 인력이 24시간 교대로 돌보며 응급상황과 돌발상황을 대비합니다.</p>
            </div>
            <div class="col-12 col-sm-6 col-xl-2 text-center wow animated fadeInDown" data-wow-duration="0.1s">
              <div class="card mb-2">
                <img class="card-img-top" style="background:url({BASE_URL}img/merit_02.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img.png" alt="전문의 진료, 24시간 간호 전문 인력 상주">
              </div>
              <h5 class="mt-2 mt-lg-3">양한방 협진 프로그램</h5>
              <p class="mt-2 mt-lg-3 con">침, 뜸, 부항과 같은 한의학적 시술뿐만 아니라 양한방 협진을 통해 서 양의학과 접목하여 치료효과를 높이고 있습니다.</p>
            </div>
            <div class="col-12 col-sm-6 col-xl-2 text-center wow animated fadeInDown" data-wow-duration="0.1s">
              <div class="card mb-2">
                <img class="card-img-top" style="background:url({BASE_URL}img/merit_03.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img.png" alt="전문의 진료, 24시간 간호 전문 인력 상주">
              </div>
              <h5 class="mt-2 mt-lg-3">집중치료실 운영</h5>
              <p class="mt-2 mt-lg-3 con">중증환자의 전문적인 치료와 간호가 가능합니다.</p>
            </div>
            <div class="col-12 col-sm-6 col-xl-2 text-center wow animated fadeInDown" data-wow-duration="0.1s">
              <div class="card mb-2">
                <img class="card-img-top" style="background:url({BASE_URL}img/merit_04.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img.png" alt="전문의 진료, 24시간 간호 전문 인력 상주">
              </div>
              <h5 class="mt-2 mt-lg-3">물리치료실 운영</h5>
              <p class="mt-2 mt-lg-3 con">전문 물리치료사가 상주하여 환자 개개인에 맞춘 1:1 물리치료를 실시합니다</p>
            </div>
            <div class="col-12 col-sm-6 col-xl-2 text-center wow animated fadeInDown" data-wow-duration="0.1s">
              <div class="card mb-2">
                <img class="card-img-top" style="background:url({BASE_URL}img/merit_05.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img.png" alt="전문의 진료, 24시간 간호 전문 인력 상주">
              </div>
              <h5 class="mt-2 mt-lg-3">VIP입원실</h5>
              <p class="mt-2 mt-lg-3 con">보다 독립적이고 안락한 병실 생활을 원하는 환자분들을 위해 1인실 2개실, 2인실 3개실, 총 5개실의 VIP입원실이 별도로 마련되어 있습니다. </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //병원 장점 4가지 -->


  <!-- 인공신장실 -->
  <a href="{BASE_URL}index.php/professional/artificialkidney" style="text-decoration:none;">
  <section id="kidney" class="mt-4">

    <div class="wow animated bounceIn" data-wow-delay="0.2s">
      <img src="{BASE_URL}img/text_kidney.png" class="img-fluid ml-lg-5" alt="투석과 요양을 한곳에서 인공신장실 open!">
    </div>

  </section>
    </a>
  <!-- //인공신장실 -->

  <!-- 전화번호 -->
  <section id="callnum" class="p-3 mt-5">
    <a href="tel:{COMPANY_TEL2_NUM}" style="text-decoration:none;">
    <div class="col-12 text-center p-0 wow animated fadeInRight" data-wow-delay=".1s">
      <img src="{BASE_URL}img/callnum_call.png"><span class="call text-white ml-lg-3 align-middle">대표전화</span><span class="call_num ml-3 align-middle">{COMPANY_TEL1_NUM}</span>
    </div>
    </a>
  </section>
  <!-- //전화번호 -->

  <!-- 공지사항, 영양식단 -->
  <section id="notice">
    <div class="container">
     <div class="row justify-content-center">
      <div class="col-12 col-lg-6 pl-2 pl-lg-0 mt-5">
        <h3>공지사항<a href="{BASE_URL}index.php/news/notice"><img class="ml-2 align-middle img-more" src="{BASE_URL}img/more.png"></a></h3>
        {NOTICE_ROWS}
          <h6 class="mt-lg-3 text-truncate"><a href="{BASE_URL}index.php/news/notice_detail/{ID}">· {TITLE}</a></h6>
          <hr>
        {/NOTICE_ROWS}
      </div>
      <div class="col-12 col-lg-6 pl-2 pl-lg-0 mt-5">
        <h3>영양식단<a href="{BASE_URL}index.php/news/diet"><img class="ml-2 align-middle img-more" src="{BASE_URL}img/more.png"></a></h3>
        {DIET_ROWS}
          <h6 class="mt-lg-3 text-truncate"><a href="{BASE_URL}index.php/news/diet_detail/{ID}">· {TITLE}</a></h6>
          <hr>
        {/DIET_ROWS}
      </div>
    </div>
  </section>
  <!-- //공지사항, 영양식단 -->

  <!-- 언론보등 
  <section id="info" class="mt-5">
    <div class="container">
     <div class="row">
      <div class="col-12 col-lg-6">
        <div class="row text-center">
          <a href="{BASE_URL}index.php/news/index">
          <div id="news" class="col-6 bg_mint text-white wow animated fadeInDown" data-wow-delay=".1s">
            <img class="p-3 mt-3 mb-2" src="{BASE_URL}img/info_media.png"><br>
            <span class="text-title30 b-b">언론보도</span>
            <div class="row justify-content-md-center">
              
            </div>
          </div>
          </a>
          <a href="{BASE_URL}index.php/news/welfare">
          <div id="welfare" class="col-6 bg_lightblue text-white wow animated fadeInUp" data-wow-delay=".1s">
            <img class="p-3 mt-3 mb-2" src="{BASE_URL}img/info_welfare.png"><br>
            <span class="text-title30 b-b">사회복지프로그램</span>
            <div class="row justify-content-md-center">
              
            </div>
          </div>
          </a>
          <div id="navigation" class="col-12 bg_sky text-white p-0 wow animated fadeInLeft" data-wow-delay=".1s">
            <div class="row">
              <a href="{BASE_URL}index.php/howtouse/map">
              <div class="col-6 col-lg-12">
                <span class="text-title30 b-b" style="position:relative; top:20px;">찾아오시는 길</span>              
                <h4 class="mt-5">부산광역시 금정구 반송로 470 (금사역 2번 출구)</h4>
                <h4 class=""><b>{COMPANY_TEL1_NUM}</b></h4>
              </div>
              <div class="col-6 col-lg-12 map">
                <!--<img src="{BASE_URL}img/sub02-01map_02.jpg" class="col-12 img-fluid p-0">-->
       <!-- <img class="col-12" style="background:url({BASE_URL}img/sub02-01map_02.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/map-dummy.png" alt="{COMPANY_NAME} 지도">
        
              </div>
              </a>
            </div>
          </div>
        </div>        
      </div>
      <div class="col-12 col-lg-6 pb-1">
        <div class="row text-center">
          <div class="col-6 col-lg-12 bg_navy text-white">
            <img class="p-1 p-lg-4 mt-5 mt-lg-4 wow animated fadeInDown" data-wow-delay="0.1s" src="{BASE_URL}img/info_time.png"><br>
            <span class="text-title40 mb-1 b-b wow animated fadeInDown" data-wow-delay="0.1s">진료시간 안내</span>
            <p class="text-call mt-1 mt-lg-3 wow animated fadeInDown" data-wow-delay="0.1s">오전 9:00 ~ 오후 5:00</p>
            <p class="text-title30 mt-3 mt-lg-4 pb-3 wow animated fadeInDown" data-wow-delay="0.1s">*토,일 및 공휴일 휴진*</p>
          </div>
          <div id="funeral" class="col-6 col-lg-12 bg_deepgray text-white">
            <div class="row">
              <div class="col-12 col-lg-2 mt-4 mt-lg-0">
                <img class="p-1 wow animated fadeInUp" data-wow-delay=".1s" src="{BASE_URL}img/info_funeral.png"> <br class="pc-mo">
              </div>
              <div class="col-12 col-lg-10 mt-3 mt-lg-5">
                <span class="text-title40 b-b wow animated fadeInUp" data-wow-delay=".1s">장례식장문의 <br></span>
                <p class="text-title50 mt-5 mt-lg-0 wow animated fadeInUp" data-wow-delay=".1s">{COMPANY_TEL4_NUM}</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //언론보등 -->
  
  <!-- 새로운 언론보도 등 -->
  <section class="mt-5 ">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 p-0 cube1">
          <a href="{BASE_URL}index.php/news/index" style="text-decoration:none;">
            <div class="col-12 bg-ece8e9 p-3 text-center">
              <span class="text-title30 b-b-b">언론보도</span>
            </div>
            <div class="col-12 p-0">
              <img class="card-img-top" style="background:url({BASE_URL}img/bodo-img.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img1.png" alt="언론보도">
            </div>
          </a>
        </div>
        <div class="col-12 col-lg-6 p-0 text-white cube2">
          <a href="{BASE_URL}index.php/news/welfare" style="text-decoration:none;">
            <div class="col-12 bg-0186c7 p-3 text-center">
              <span class="text-title30 b-b">사회복지프로그램</span>
            </div>
            <div class="col-12 p-0">
              <img class="card-img-top" style="background:url({BASE_URL}img/ji-img.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/dummy_img1.png" alt="언론보도">
            </div>
          </a>
        </div>
        <div class="col-12 col-lg-6 p-0 bg-0186c7 timeinfo">
          <div class="col-12 pt-3 pl-4 pr-4 pb-3 text-center">
            <div class="row justify-content-center">
              <div class="col-12 p-2 p-lg-3 border">
                <a href="{BASE_URL}index.php/information/outpatient_time" style="text-decoration:none;">
                  <div class="mt-4 mb-1 mb-lg-5">
                    <span class="text-title30 b-b text-white weight300">진료시간안내</span>
                    <p class="text-call mt-3 mt-lg-5 mp-3">오전 9:00 ~ 오후 5:00</p>
                    <p class="text-title20 text-white weight350 mt-4">*토,일 및 공휴일 휴진*<br>병동은 24시간 진료,간호(당직의 근무)</p>
                  </div>
                </a>
              </div>
            </div>
          </div>          
        </div>
        <div class="col-12 col-lg-6 p-0 bg-ece8e9 timeinfo1">
          <div class="col-12 pt-3 pl-4 pr-4 pb-0 text-center">
            <div class="row justify-content-center">
              <div class="col-12 pt-3 pb-0 pl-0 pr-0 mapinfo cube1">
                <a href="{BASE_URL}index.php/howtouse/map" style="text-decoration:none;">
                  <div class="mt-0 p-0">
                    <span class="text-title30 weight300 b-b-b">찾아오시는 길</span>
                    <p class="text-title20 mt-2">부산광역시 금정구 반송로 470 (금사역 2번 출구)<br>051-521-7581~3</p>
                    <img class="col-12 p-0 m-border" style="background:url({BASE_URL}img/sub02-01map_02.jpg) 50% 50%; background-size:cover;" src="{BASE_URL}img/map-dummy.png" alt="{COMPANY_NAME} 지도">
                  </div>
                </a>
              </div>
            </div>
          </div>          
        </div>
      </div>
    </div>    
  </section>

  <!-- 갤러리 -->
  <section id="gallery" class="mt-5" >
    <div class="container">
      <div class="row">
        <div class="col-12 pl-1 pl-lg-0" >
          <h3>갤러리</h3>
        </div>
       </div>

       <div class="mt-3 flexslider carousel">
         <ul class="slides">
           {GALLERY_ROWS}
           <li>
             <a href="{BASE_URL}index.php/introduce/preview">
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
  <!-- //갤러리 -->

  <!-- 협력외 -->
  <section id="with" class="bg-light pt-4 pb-4" >
    <div class="container">
      <div class="row text-center">
        <div class="col-12 col-lg-6 mt-3 mt-lg-5 ">
          <span class="text-333">부산금사요양병원</span> <span class="text-00adff">협력병원</span>
          <div class="row">
            <div class="col-6 mt-2 mt-lg-4  wow animated fadeInDown" data-wow-delay=".1s">
            <a href="https://www.pnuh.or.kr" target="_blank">
              <img class="col-12 p-0" src="{BASE_URL}img/with_busan.jpg">
            </a>
            </div>
            <div class="col-6 mt-2 mt-lg-4  wow animated fadeInDown" data-wow-delay=".1s">
            <a href="https://www.damc.or.kr" target="_blank">
              <img class="col-12 p-0" src="{BASE_URL}img/with_donga.jpg">
            </a>
            </div>
            <div class="col-6 mt-2 mt-lg-4  wow animated fadeInDown" data-wow-delay=".1s">
            <a href="http://www.ddh.co.kr/" target="_blank">
              <img class="col-12 p-0" src="{BASE_URL}img/with_dd.jpg">
            </a>
            </div>
            <div class="col-6 mt-2 mt-lg-4 wow animated fadeInDown" data-wow-delay=".1s">
            <a href="http://www.paik.ac.kr/busan" target="_blank">
              <img class="col-12 p-0" src="{BASE_URL}img/with_in.jpg">
            </a>
            </div>
          </div>
        </div>
        <!-- 엠블런스
        <div class="col-12 col-lg-6 mt-3 mt-lg-5 ">
          <span class="text-333">부산금사요양병원</span> <span class="text-00adff">엠블런스</span>
          <div class="col-12 mt-2 mt-lg-4 wow animated bounceIn" data-wow-delay=".1s">
            <img style="background:url({BASE_URL}img/ambulance.png) 60% 60%; background-size:cover; height:261px; width:100%;" src="{BASE_URL}img/dummy_img.png" alt="{COMPANY_NAME} 엠블런스">
          </div>
        </div>-->
        <div class="col-12 col-lg-6 mt-3 mt-lg-5 ">
          <span class="text-333">금사 장례식장</span> 
          <a href="tel:{COMPANY_TEL4_NUM}"><span class="text-00adff">{COMPANY_TEL4_NUM}</span></a>
            <a href="{BASE_URL}index.php/howtouse/funeral" style="text-decoration:none;">
              <div class="col-12 mt-2 mt-lg-4 wow animated bounceIn" data-wow-delay=".1s">
                <img style="background:url({BASE_URL}img/funeralhall.png) 60% 60%; background-size:cover; height:261px; width:100%;" src="{BASE_URL}img/dummy_img.png" alt="{COMPANY_NAME} 엠블런스">
              </div>
            </a>
            </div>
      </div>
    </div>
  </section>
  <!-- //협력외 -->

  <!-- 푸터 -->
  <section id="footer" class="p-3">
    <div class="container" >
     <div class="row text-white">
      <p class="pt-1 pt-lg-3">상호: {COMPANY_NAME} ㅣ 주소: {COMPANY_ADDRESS} ㅣ 대표: {OWNER} ㅣ 사업자등록번호: {REGIST_NUM} TEL: <a href="tel:{COMPANY_TEL2_NUM}" style="color:#fff;">{COMPANY_TEL1_NUM}</a>   FAX: {COMPANY_FAX_NUM} ㅣ 관리책임자: {TITLE}</p>
      <p class="mt-1">© Copyright 2018, {COMPANY_NAME_EN} All Rights Reserved.</p>

    </div>
  </section>
  <!-- //푸터 -->

  <!--script files-->
  <script src="{BASE_URL}js/jquery.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery-migrate.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.easing.1.3.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/bootstrap.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.sticky.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.stellar.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/owl.carousel.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.isotope.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.imagesloaded.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.counterup.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/jquery.countdown.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/contact_me.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/swiper.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/wow.min.js" type="text/javascript"></script>
  <script src="{BASE_URL}js/kaen.js" type="text/javascript"></script>

  <script>

      $("#welfare").click(function(){
        location.href = "{BASE_URL}index.php/news/welfare";
      });

      $("#news").click(function(){
        location.href = "{BASE_URL}index.php/news/index";
      });

      $("#navigation").click(function(){
        location.href = "{BASE_URL}index.php/howtouse/map";
      });

      $("#funeral").click(function(){
        location.href = "{BASE_URL}index.php/howtouse/funeral";
      });

      /* SWIPER
      -------------------------------------------------------------*/
      var swiper1 = new Swiper('.mini-banner', {
        initialSlide: 0,
        spaceBetween: 0,
        slidesPerView: 1,
        centeredSlides: true,
        slideToClickedSlide: true,
        autoplay: {
          delay: 3000,
        },
        loop: true,
        scrollbar: {
          el: '.swiper-scrollbar',
        },
        keyboard: {
          enabled: true,
        },
        pagination: {
          el: '.swiper-pagination',
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });

      var swiper2 = new Swiper('.main-banner', {
        loop : true, 
        effect: 'fade',
        autoplay: {
          delay: 5000,
        },
        pagination : {
          el : '.swiper-pagination',
        },
      });

      /* FUNCTIONS
      -------------------------------------------------------------*/
      function popup(url, width, height, pop_left, pop_top){
        var options = "toolbar=0,directories=0,status=no,menubar=0,scrollbars=no,resizable=no,width="+width+",height="+height+",resizable=no, mebar=no,left="+pop_left+",top="+pop_top;
        return window.open(url,'_blank', options);
      }

  </script>

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
          maxItems: 4
        });
      });

  </script>
  </body>
</html>

</html>
