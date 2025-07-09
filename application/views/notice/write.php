        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>공지사항 관리</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>공지사항 등록 <small> 사이트에 보여줄 공지사항을 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form action="{CURRENT_URL}" method="post" class="form-horizontal form-label-left" novalidate>
                      <input type="hidden" name="bbs_id" value="bbs_id" />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="title" name="title" 
                                   class="form-control col-md-12 col-xs-12" 
                                   placeholder="제목" 
                                   required="required" value="{BBS_TITLE}"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="checkbox" class="flat" name="notice_flag" id="notice_flag" value="Y" />
                        <label for="notice_flag">공지사항내 탑공지로 등록하기 * </label>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea id="contents" name="contents"
                                   cols="80" rows="30" 
                                   class="form-control col-md-12 col-xs-12 ckeditor"
                                   placeholder="내용"
                                   required="required">{BBS_CONTENTS}</textarea>
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

        if("{BBS_NOTICE_FLAG}" == "Y"){
          $("#notice_flag").prop("checked", "checked");
        }

        $("#cancel").click(function(){
          location.replace("{BASE_URL}index.php/manager/notice/index");
        });

        $("#save").click(function(){

          var submit = true;

          var title    = $("#title").val();
          var contents = CKEDITOR.instances.contents.getData();

          if(title == ''){
            alert("제목을 입력하셔야 합니다.");
            return ;
          }

          if(contents == ''){
            alert("내용을 입력하셔야 합니다.");
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
