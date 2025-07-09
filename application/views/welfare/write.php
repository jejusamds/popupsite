        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>사회복지프로그램 관리</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>사회복지프로그램 등록 <small> 사이트에 보여줄 사회복지프로그램을 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form action="{CURRENT_URL}" method="post" class="form-horizontal form-label-left" novalidate>
                      <input type="hidden" name="bbs_id" value="bbs_id" />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="wel_title" name="wel_title" 
                                   class="form-control col-md-12 col-xs-12" 
                                   placeholder="제목" 
                                   required="required" value="{WEL_TITLE}"/>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>월요일</b></div>
                          <br />
                          <textarea id="contents" name="wel_mon"
                                   rows="5" cols="5"
                                   class="col-md-12 col-xs-12"
                                   placeholder="내용"
                                   required="required">{WEL_MON}</textarea>

                        </div>
                      </div>
                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>화요일</b></div>
                          <textarea id="contents" name="wel_tue"
                                   rows="5" cols="5"
                                   class="col-md-12 col-xs-12"
                                   placeholder="내용"
                                   required="required">{WEL_TUE}</textarea>
                        </div>
                      </div>

                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>수요일</b></div>
                          <textarea id="contents" name="wel_wed"
                                   rows="5" cols="5"
                                   class="col-md-12 col-xs-12"
                                   placeholder="내용"
                                   required="required">{WEL_WED}</textarea>

                        </div>
                      </div>


                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>목요일</b></div>
                          <textarea id="contents" name="wel_thu"
                                   rows="5" cols="5"
                                   class="col-md-12 col-xs-12"
                                   placeholder="내용"
                                   required="required">{WEL_THU}</textarea>

                        </div>
                      </div>


                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>금요일</b></div>
                          <textarea id="contents" name="wel_fri"
                                   rows="5" cols="5"
                                   class="col-md-12 col-xs-12"
                                   placeholder="내용"
                                   required="required">{WEL_FRI}</textarea>
                        </div>
                      </div>
                    </form>
                    <div class="ln_solid"></div>

                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-5">
                        <button id="cancel" class="btn btn-secondary">
                          <i class="fa fa-close"></i> 취소</button>
                        <button id="save" class="btn btn-primary">
                          <i class="fa fa-save"></i> 등록</button>
                      </div>
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

        $("#cancel").click(function(){
          location.replace("{BASE_URL}index.php/manager/welfare/index");
        });

        $("#save").click(function(){

          var submit = true;

          $('form').submit();
          return false;

        });
      });

      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });
    </script>
    <!-- /validator -->
