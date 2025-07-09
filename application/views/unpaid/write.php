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
                    <h2>비급여수가 등록 <small> 사이트에 보여줄 비급여수가를 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form action="{CURRENT_URL}" method="post" class="form-horizontal form-label-left" novalidate>
                      <input type="hidden" name="unp_id" value="{UNP_ID}" />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                          <label for="unp_type">구분</label>
                          <select id="unp_type" name="unp_type" class="form-control" required>
                            <option value="상급병실치료차액">상급병실치료차액</option>
                            <option value="약제및 치료재료">약제및 치료재료</option>
                            <option value="제증명 수수료">제증명 수수료</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="unp_category">항목 기본</label>
                          <input type="text" id="unp_category" name="unp_category" 
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="항목 기본 명칭을 적으세요." 
                                   required="required" value="{UNP_CATEGORY}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="unp_category_detail">항목 세부</label>
                          <input type="text" id="unp_category_detail" name="unp_category_detail" 
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="항목 세부사항을 적으세요." 
                                   required="required" value="{UNP_CATEGORY_DETAIL}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="unp_unit">단위</label>
                          <input type="text" id="unp_unit" name="unp_unit" 
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="단위를 적으세요" 
                                   required="required" value="{UNP_UNIT}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="unp_price">가격</label>
                          <input type="text" id="unp_price" name="unp_price" 
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="금액을 적으세요" 
                                   required="required" value="{UNP_PRICE}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="unp_memo">비고</label>
                          <input type="text" id="unp_memo" name="unp_memo" 
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="비고" 
                                   required="required" value="{UNP_MEMO}"/>
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

        var unp_type = "{UNP_TYPE}";
        if(unp_type != ''){
          $("#unp_type").val([unp_type]);
        }

        $("#cancel").click(function(){
          location.replace("{BASE_URL}index.php/manager/unpaid/index");
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
