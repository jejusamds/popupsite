        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>의료진 관리</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>의료진 등록 <small> 사이트에 보여줄 의료진 정보를 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form action="{CURRENT_URL}" method="post" class="form-horizontal form-label-left" novalidate>
                      <input type="hidden" name="ms_id" value="{MS_ID}" />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="ms_part">진료과목</label>
                          <input type="text" id="ms_part" name="ms_part" 
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="진료과목을 입력하세요." 
                                   required="required" value="{MS_PART}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="ms_name">성명</label>
                          <input type="text" id="ms_name" name="ms_name"     
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="성명을 입력하세요."
                                   required="required" value="{MS_NAME}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="ms_rank">직급</label>
                          <input type="text" id="ms_rank" name="ms_rank"     
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="직급을 입력하세요."
                                   required="required" value="{MS_RANK}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="ms_history">약력</label>
                          <textarea id="ms_history" name="ms_history"     
                                   class="form-control col-md-12 col-xs-12"
                                   style="height:10em;"
                                   required="required">{MS_HISTORY}</textarea>
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
          location.replace("{BASE_URL}index.php/manager/medical-staff/index");
        });

        $("#save").click(function(){

          var submit = true;

          $('form').submit();
          return false;

        });
      });

      // initialize the validator function
      validator.message.date = 'not a real date';

      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });
    </script>
    <!-- /validator -->
