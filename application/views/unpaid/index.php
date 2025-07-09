        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>비급여수가 관리</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>비급여수가 목록 <small> 사이트에 보여줄 비급여수가를 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div style="overflow:hidden;" class="table-responsive">
                      <form id="delete-form" action="{CURRENT_URL}" method="post">
                      <table class="table table-striped jambo_table bulk_action">
                      <colgroup>
                          <col width="10%" />
                          <col width="30%" />
                          <col width="30%" />
                          <col width="15%" />
                          <col width="15%" />
                        </colgroup>
                        <thead>
                          <tr class="headings">
                            <th style="text-align:center;">
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th style="text-align:center;" class="column-title">구분</th>
                            <th style="text-align:center;" class="column-title">항목</th>
                            <th style="text-align:center;" class="column-title">등록일</th>
                            <th style="text-align:center;" class="column-title">수정</th>
                          </tr>
                        </thead>

                        <tbody>
                          {ROWS}
                          <tr class="even pointer">
                            <td  style="text-align:center; vertical-align:middle;" class="a-center ">
                              <input type="checkbox" class="flat bbs-id" name="checked[]" value="{ID}">
                            </td>
                            <td style="cursor:pointer; color:#999; font-weight:bolder; vertical-align:middle;" class="bbs-title">
                              &nbsp;{TYPE}
                            </td>
<td style="cursor:pointer; color:#999; font-weight:bolder; vertical-align:middle;" class="bbs-title">
                              &nbsp;{CATEGORY}
                            </td>
                            <td style="text-align:center; vertical-align:middle;" class="a-center">{DATE}</td>
                            <td style="text-align:center; vertical-align:middle;" class="last a-center">
                              <button type="button" class="btn btn-primary btn-sm bbs-modify">
                                <i class="fa fa-pencil"></i>
                                수정
                              </button>
                            </td>
                          </tr>
                          {/ROWS}
                          {EMPTY}
                        </tbody>
                      </table>
                      </form>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <button id="delete" style="float:left;" type="button" class="btn btn-danger btn-sm">
                        <i class="fa fa-close"></i>
                        삭제
                      </button>
                      <a href="{BASE_URL}index.php/manager/unpaid/write"><button style="float:right;" type="button" class="btn btn-primary btn-sm">
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
        <!-- /page content -->

        <script>

          $(document).ready(function(){

            var checkAll = $("#check-all");
            var checkboxes = $("input[name='checked[]']");

            checkAll.on('ifUnchecked', function (event) {
              checkboxes.iCheck('uncheck');
            });

            checkAll.on('ifChecked', function (event) {
              checkboxes.iCheck('check');
            });

            $("#delete").click(function(){
              var data = new Array();

              if( $("input[name='checked[]']:checked").length==0 ){
                alert("삭제할 대상을 선택해주세요");
              } else {
                $res = confirm("정말 삭제하시겠습니까?");
                if($res){
                  $("#delete-form").submit();
                }
              }
            });

            $(".bbs-title").click(function(){
              var bbs_id = $(this).parent().find(".bbs-id").val();
              location.href = "{BASE_URL}index.php/manager/unpaid/view/"+bbs_id;
            });


            $(".bbs-modify").click(function(){
              var bbs_id = $(this).parent().parent().find(".bbs-id").val();
              location.href = "{BASE_URL}index.php/manager/unpaid/write/"+bbs_id;
            });

          });
        </script>
