
        <!--ge content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{BBS_TITLE}</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{USR_NAME}</h2>
                    <div style="float:right;">작성일 : {CREATED} &nbsp;&nbsp;&nbsp; 조회수 : {BBS_VIEWS}</div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-12 col-sm-12">
                      <div id="bbs-contents">
                        {BBS_CONTENTS}
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <button id="list" style="float:left;" type="button" class="btn btn-primary btn-sm">
            <i class="fa fa-list"></i>
              목록
          </button>
            <button style="float:right;" type="button" class="btn btn-danger btn-sm delete">
              <i class="fa fa-close"></i>
              삭제
            </button>
            <button style="float:right;" type="button" class="btn btn-primary btn-sm modify">
              <i class="fa fa-pencil"></i>
              수정
            </button>
        </div>
        <br /><br />
        <!-- /page content -->

        <script>
          $(document).ready(function(){

            var bbs_id = "{BBS_ID}";

            $("#list").click(function(){
              location.replace("{BASE_URL}index.php/manager/media_report/index");
            });

            $(".modify").click(function(e){
              e.stopPropagation();
              location.href = "{BASE_URL}index.php/manager/media_report/write/"+bbs_id;
            });

            $(".delete").click(function(e){
              e.stopPropagation();
              $res = confirm("정말 삭제하시겠습니까?");
              if($res){
                var url = "{BASE_URL}index.php/manager/media_report/request_delete";
                var post = {'bbs_id' : bbs_id};
                $.post(url, post, function(res){
                  alert(res.ERROR_MESSAGE);
                  if(res.ERROR == 'OK'){
                    location.replace("{BASE_URL}index.php/manager/media_report/index");
                  }
                }, "json");
              }
            });


          });
        </script>
