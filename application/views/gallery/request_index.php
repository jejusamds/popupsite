        <div class="container">
          <ul class="filter list-inline">
            <li><a class="active" href="#" data-filter="*">전체</a></li>          
            {CATEGORY}
            <li><a href="#" data-filter=".{CODE}">{NAME}</a></li>          
            {/CATEGORY}
          </ul>
          <div class="row">
            <div class="portfolio-box iso-call work-col-4">
              {ROWS}
                <div class="project-post {TYPE}">
                  <a href="{BASE_URL}request/image_view/{IMG_NAME}/gallery" 
                     data-lightbox="company-images"
                     data-title="{TITLE}">
                    <div class="image-wrapper">
                      <img src="{BASE_URL}request/image_view/{IMG_NAME}/gallery" class="img-responsive" alt="team img">
                      <div class="image-overlay">
                        <p>
                          View Detail
                        </p>
                      </div><!--.image-overlay-->
                    </div><!--.image-wrapper-->                                      
                  </a>
                  <div class="work-sesc">
                    <p>
                      {TITLE}
                    </p>
                  </div><!--.work-desc-->
                </div><!--project post-->
              {/ROWS}
            </div>
          </div>
        </div>

        <!--revolution slider plugins-->
        <script src="{BASE_URL}js/isotope-custom.js" type="text/javascript"></script>
        <script src="{BASE_URL}js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
