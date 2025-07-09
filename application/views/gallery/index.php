        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>병원갤러리 관리</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>갤러리 목록 <small> 사이트에서 보여질 이미지들을 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      {ROWS}
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{BASE_URL}index.php/request/image_view/{IMG_PATH}/gallery" alt="{TITLE}" />
                            <div class="mask">
                              <input type="hidden" class="gbbs_id" value="{ID}" />
                              <p>{TYPE}</p>
                              <div class="tools tools-bottom">
                                <i class="fa fa-pencil modify"></i></a>
                                <i class="fa fa-times delete"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>{TITLE}</p>
                          </div>
                        </div>
                      </div>
                      {/ROWS}

                      <div class="col-md-12 col-sm-12 col-xs-12" style=text-align:center;">
                        {EMPTY}
                      </div>
                      <div style="margin-top:2em; margin-bottom:2em;" class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{BASE_URL}index.php/manager/gallery/write"><button style="float:right;" type="button" class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil"></i>
                          글쓰기
                        </button></a>
                      </div>
                      {PAGINATION}


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <script>

          $(document).ready(function(){

            $(".view").click(function(){
              var gbbs_id = $(this).find(".gbbs_id").val();
              location.href = "{BASE_URL}index.php/manager/gallery/view/"+gbbs_id;
            });

            $(".modify").click(function(e){
              e.stopPropagation();
              var gbbs_id = $(this).parent().parent().find(".gbbs_id").val();
              location.href = "{BASE_URL}index.php/manager/gallery/write/"+gbbs_id;
            });

            $(".delete").click(function(e){
              e.stopPropagation();
              $res = confirm("정말 삭제하시겠습니까?");
              if($res){
                var gbbs_id = $(this).parent().parent().find(".gbbs_id").val();
                var url = "{BASE_URL}index.php/manager/gallery/request_delete";
                var post = {'gbbs_id' : gbbs_id};
                $.post(url, post, function(res){
                  alert(res.ERROR_MESSAGE);
                  if(res.ERROR == 'OK'){
                    location.reload();
                  }
                }, "json");
              }
            });
          });

        </script>
