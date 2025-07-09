        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>패스워드 변경</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <form action="{CURRENT_URL}" method="post" class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">기존 패스워드</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="password" id="passwd" name="passwd"
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="기존 패스워드를 입력하세요."
                                   required="required" value=""/>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">새로운 패스워드</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="password" id="new_passwd" name="new_passwd"
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="새로운 패스워드를 입력하세요."
                                   required="required" value=""/>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">패스워드 확인</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="password" id="confirm_passwd" name="confirm_passwd"
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="새로운 패스워드를 다시 한번 입력하세요."
                                   required="required" value=""/>
                        </div>
                      </div>

                    </form>

                    <div class="ln_solid"></div>

                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-5">
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
          location.replace("{BASE_URL}index.php/manager/main/index");
        });

        $("#save").click(function(){

          var submit = true;

          var passwd         = $("#passwd").val();
          var new_passwd     = $("#new_passwd").val();
          var confirm_passwd = $("#confirm_passwd").val();

          if(passwd == ''){
            alert("기존 패스워드를 입력하세요.");
            return ;
          }

          if(new_passwd == ''){
            alert("새로운 패스워드를 입력하세요.");
            return ;
          }

          if(confirm_passwd == ''){
            alert("새로운 패스워드 확인을 입력하세요.");
            return ;
          }

          if(new_passwd != confirm_passwd){
            alert("새로운 패스워드가 일치하지 않습니다. 다시 확인하세요.");
            return ;
          }

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
