    <section id="footer" class="padding-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 copyright">
                    <span>Copyright&copy; {COMPANY_NAME_EN} Corp. All right reserved</span>
                </div>
                <div class="col-md-6 col-sm-6 footer-nav">
                    <ul class="list-inline">
                        <li><a href="#home">Top</a></li>
                    </ul>
                </div>
            </div>
        </div>
      </section><!--footer end-->

      <!--back to top-->
      <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
      <!--back to top end-->

      {LAYER_ROWS}
      <div class="pop-layer" style="display:none; width:{POP_WIDTH}; height:auto;top:{POP_TOP}; left:{POP_LEFT};">
        <div class="pop-container">
          <div class="pop-conts" style="{PADDING}">
            <!--content //-->
            <p class="ctxt" style="width:{POP_WIDTH}; height:{POP_HEIGHT};">
              {POP_CONTENTS}
            </p>

            <div class="btn-r">
              <a href="#" class="btn btn-secondary btn-sm btn-close">닫기</a>
            </div>
            <!--// content-->
          </div>
        </div>
      </div>
      {/LAYER_ROWS}

        <!--script files-->
        <script src="{BASE_URL}js/jquery.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/moderniz.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/jquery-migrate.min.js" type="text/javascript"></script> 
        <script src="{BASE_URL}js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/jquery.flexslider-min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/wow.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/jquery.sticky.js" type="text/javascript"></script>        
        <script src="{BASE_URL}js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/jquery.stellar.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/owl.carousel.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/waypoints.min.js"></script>
        <script src="{BASE_URL}js/easypiechart.js"></script>
        <script src="{BASE_URL}js/jquery.isotope.min.js" type="text/javascript"></script>
        <!--image loads plugin -->
        <script src="{BASE_URL}js/jquery.imagesloaded.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/jquery.countdown.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/contact_me.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/jqBootstrapValidation.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/custom.js" type="text/javascript"></script>

        <!--revolution slider plugins-->
        <script src="{BASE_URL}rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/revolution-custom.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/pace.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=b04379f058fd3bbd1b04e89d5a3ce79c"></script>

        <script>

            /* POPUP
            -------------------------------------------------------------*/
            {POPUP_ROWS}
              popup("/popup/popup/{POP_ID}", "{POP_WIDTH}", "{POP_HEIGHT}", "{POP_LEFT}", "{POP_TOP}");
            {/POPUP_ROWS}

            /* LAYER POPUP
            --------------------------------------------------------------*/
            $(".btn-close").click(function(){
              $(this).parent().parent().parent().parent().fadeOut();
            });

            $(".pop-layer").fadeIn();

            /* MAPS
            --------------------------------------------------------------*/
            var lat  = 35.8593814;
            var lng  = 128.5900330;
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

            function popup(url, width, height, pop_left, pop_top){

              var options = "toolbar=0,directories=0,status=no,menubar=0,scrollbars=no,resizable=no,width="+width+",height="+height+",resizable=no, mebar=no,left="+pop_left+",top="+pop_top;

              return window.open(url,'_blank', options);
            }



          $(document).ready(function() {
          // executes when HTML-Document is loaded and DOM is ready

            // breakpoint and up
            $(window).resize(function(){
              if ($(window).width() >= 980){

                // when you hover a toggle show its dropdown menu
                $(".navbar .dropdown-toggle").hover(function () {
                  $(this).parent().toggleClass("show");
                  $(this).parent().find(".dropdown-menu").toggleClass("show");
                });

                // hide the menu when the mouse leaves the dropdown
                $( ".navbar .dropdown-menu" ).mouseleave(function() {
                  $(this).removeClass("show");
                });
      
                // do something here
              }
            });
      
          // document ready
          });

        </script>
    </body>
</html>

