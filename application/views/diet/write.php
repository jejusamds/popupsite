        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>영양식단 관리</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>영양식단 등록 <small> 사이트에 보여줄 영양식단을 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form action="{CURRENT_URL}" method="post" class="form-horizontal form-label-left" novalidate>
                      <input type="hidden" name="bbs_id" value="bbs_id" />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="diet_title" name="diet_title" 
                                   class="form-control col-md-12 col-xs-12" 
                                   placeholder="제목" 
                                   required="required" value="{DIET_TITLE}"/>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>월요일</b></div>
                          <br />
                          <textarea id="contents" name="diet_mon_1"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="아침"
                                   required="required">{DIET_MON_1}</textarea>

                          <textarea id="contents" name="diet_mon_2"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="점심"
                                   required="required">{DIET_MON_2}</textarea>

                          <textarea id="contents" name="diet_mon_3"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="저녁"
                                   required="required">{DIET_MON_3}</textarea>
                        </div>
                      </div>
                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>화요일</b></div>
                          <textarea id="contents" name="diet_tue_1"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="아침"
                                   required="required">{DIET_TUE_1}</textarea>
                          
                          <textarea id="contents" name="diet_tue_2"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="점심"
                                   required="required">{DIET_TUE_2}</textarea>

                          <textarea id="contents" name="diet_tue_3"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="저녁"
                                   required="required">{DIET_TUE_3}</textarea>
                        </div>
                      </div>

                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>수요일</b></div>
                          <textarea id="contents" name="diet_wed_1"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="아침"
                                   required="required">{DIET_WED_1}</textarea>

                          <textarea id="contents" name="diet_wed_2"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="점심"
                                   required="required">{DIET_WED_2}</textarea>

                          <textarea id="contents" name="diet_wed_3"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="저녁"
                                   required="required">{DIET_WED_3}</textarea>
                        </div>
                      </div>


                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>목요일</b></div>
                          <textarea id="contents" name="diet_thu_1"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="아침"
                                   required="required">{DIET_THU_1}</textarea>

                          <textarea id="contents" name="diet_thu_2"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="점심"
                                   required="required">{DIET_THU_2}</textarea>

                          <textarea id="contents" name="diet_thu_3"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="저녁"
                                   required="required">{DIET_THU_3}</textarea>
                        </div>
                      </div>


                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>금요일</b></div>
                          <textarea id="contents" name="diet_fri_1"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="아침"
                                   required="required">{DIET_FRI_1}</textarea>

                          <textarea id="contents" name="diet_fri_2"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="점심"
                                   required="required">{DIET_FRI_2}</textarea>

                          <textarea id="contents" name="diet_fri_3"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="저녁"
                                   required="required">{DIET_FRI_3}</textarea>
                        </div>
                      </div>


                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>토요일</b></div>
                          <textarea id="contents" name="diet_sat_1"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="아침"
                                   required="required">{DIET_SAT_1}</textarea>

                          <textarea id="contents" name="diet_sat_2"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="점심"
                                   required="required">{DIET_SAT_2}</textarea>

                          <textarea id="contents" name="diet_sat_3"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="저녁"
                                   required="required">{DIET_SAT_3}</textarea>
                        </div>
                      </div>


                      <br />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12 text-center"><b>일요일</b></div>
                          <textarea id="contents" name="diet_sun_1"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="아침"
                                   required="required">{DIET_SUN_1}</textarea>

                          <textarea id="contents" name="diet_sun_2"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="점심"
                                   required="required">{DIET_SUN_2}</textarea>

                          <textarea id="contents" name="diet_sun_3"
                                   rows="5" cols="5"
                                   class="col-md-4 col-xs-4"
                                   placeholder="저녁"
                                   required="required">{DIET_SUN_3}</textarea>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="diet_origin" name="diet_origin"
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="원산지"
                                   required="required" value="{DIET_ORIGIN}"/>
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
          location.replace("{BASE_URL}index.php/manager/diet/index");
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
