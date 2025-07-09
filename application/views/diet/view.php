
        <!--ge content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{DIET_TITLE}</h3>
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

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>아침</th>
                          <th>점심</th>
                          <th>저녁</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">월요일</th>
                          <td>{DIET_MON_1}</td>
                          <td>{DIET_MON_2}</td>
                          <td>{DIET_MON_3}</td>
                        </tr>
                        <tr>
                          <th scope="row">화요일</th>
                          <td>{DIET_TUE_1}</td>
                          <td>{DIET_TUE_2}</td>
                          <td>{DIET_TUE_3}</td>
                        </tr>
                        <tr>
                          <th scope="row">수요일</th>
                          <td>{DIET_WED_1}</td>
                          <td>{DIET_WED_2}</td>
                          <td>{DIET_WED_3}</td>
                        </tr>
                        <tr>
                          <th scope="row">목요일</th>
                          <td>{DIET_THU_1}</td>
                          <td>{DIET_THU_2}</td>
                          <td>{DIET_THU_3}</td>
                        </tr>
                        <tr>
                          <th scope="row">금요일</th>
                          <td>{DIET_FRI_1}</td>
                          <td>{DIET_FRI_2}</td>
                          <td>{DIET_FRI_3}</td>
                        </tr>
                        <tr>
                          <th scope="row">토요일</th>
                          <td>{DIET_SAT_1}</td>
                          <td>{DIET_SAT_2}</td>
                          <td>{DIET_SAT_3}</td>
                        </tr>
                        <tr>
                          <th scope="row">일요일</th>
                          <td>{DIET_SUN_1}</td>
                          <td>{DIET_SUN_2}</td>
                          <td>{DIET_SUN_3}</td>
                        </tr>
                        <tr>
                          <th scope="row">원산지</th>
                          <td colspan="3">{DIET_ORIGIN}</td>
                        </tr>
                      </tbody>
                    </table>

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
            var diet_id = "{DIET_ID}";

            $("#list").click(function(){
              location.replace("{BASE_URL}index.php/manager/diet/index");
            });

            $(".modify").click(function(e){
              e.stopPropagation();
              location.href = "{BASE_URL}index.php/manager/diet/write/"+diet_id;
            });

            $(".delete").click(function(e){
              e.stopPropagation();
              $res = confirm("정말 삭제하시겠습니까?");
              if($res){
                var url = "{BASE_URL}index.php/manager/diet/request_delete";
                var post = {'diet_id' : diet_id};
                $.post(url, post, function(res){
                  alert(res.ERROR_MESSAGE);
                  if(res.ERROR == 'OK'){
                    location.replace("{BASE_URL}index.php/manager/diet/index");
                  }
                }, "json");
              }
            });

          });
        </script>
