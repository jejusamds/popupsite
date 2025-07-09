        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>팝업 관리</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>팝업 등록 <small>팝업을 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form action="{CURRENT_URL}" method="post" class="form-horizontal form-label-left" novalidate>
                      <input type="hidden" name="pop_id" value="{POP_ID}" />
                      <input type="hidden" name="pop_img" value="{POP_IMG}" />
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="pop_title">타이틀</label>
                          <input type="text" id="pop_title" name="pop_title"
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="타이틀"
                                   required="required" value="{POP_TITLE}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="pop_contents">내용</label>
                          <textarea id="pop_contents" name="pop_contents"
                                   class="form-control col-md-12 col-xs-12 ckeditor"
                                   style="height:10em;"
                                  required="required">{POP_CONTENTS}</textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="pop_link">링크</label>
                          <input type="text" id="pop_link" name="pop_link"
                                   class="form-control col-md-12 col-xs-12"
                                   placeholder="http://" value="{POP_LINK}" />
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="pop_start">시작일</label>
                          <input type="text" id="pop_start" name="pop_start" class="form-control datepicker" value="{POP_START}" />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="pop_end">종료일</label>
                          <input type="text" id="pop_end" name="pop_end" class="form-control datepicker" value="{POP_END}" />
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="is_view">노출여부</label>
                          <select id="is_view" name="is_view" class="form-control">
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="pop_order">순서</label>
                          <input type="number" id="pop_order" name="pop_order" class="form-control" value="{POP_ORDER}" />
                        </div>
                      </div>
                    </form>

                    <div class="clearfix"></div>

                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>이미지 첨부하기</h2>
                          </div>
                          <div class="x_content">
                            <form action="{BASE_URL}index.php/request/image_upload" class="dropzone" drop-zone="" id="pop-file-dropzone">
                              <div class="dz-message text-center alert alert-secondary">
                                <h2><strong>이미지를 이곳에 드롭다운 하시거나 여기를 클릭해 주세요.</strong></h2>
                                <p>첨부가능한 이미지는 jpg, jpeg, png입니다.</p>
                              </div>
                            </form>
                            <div style="display:none;" class="pop-upload-progress text-center alert alert-info">
                              <h2><i class="fa fa-refresh fa-spin"></i><strong> 파일을 업로드중 입니다.</strong></h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="pop-banner-preview" class="dropzone-previews hide"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center ">
                      <div class="pop-image-preview">
                        <img src="" id="pop-preview-img">
                        <br />
                        <br />
                        <br />
                      </div>
                    </div>

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

        $("#is_view").val("{IS_VIEW}");

        $("#cancel").click(function(){
          location.replace("{BASE_URL}index.php/manager/popup/index");
        });

        $('#pop_start').daterangepicker({
          singleDatePicker: true,
          timePicker: true,
          timePicker24Hour: true,
          locale: { format: 'YYYY-MM-DD HH:mm:ss' }
        });

        $('#pop_end').daterangepicker({
          singleDatePicker: true,
          timePicker: true,
          timePicker24Hour: true,
          locale: { format: 'YYYY-MM-DD HH:mm:ss' }
        });

        $("#save").click(function(){
          var contents = CKEDITOR.instances.pop_contents.getData();
          $('#pop_contents').val(contents);
          $('form').submit();
          return false;
        });
      });

      validator.message.date = 'not a real date';
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('#pop-file-dropzone').dropzone({
        url: "{BASE_URL}index.php/request/image_upload",
        maxFilesize: 300,
        paramName: "image",
        maxThumbnailFilesize: 1,
        previewsContainer: ".dropzone-previews",
        init: function() {
          this.on('success', function(file, json) {
            var res = JSON.parse(json);
            if(res.ERROR == 'OK'){
              $(".pop-upload-progress").hide();
              $(".pop-image-preview").show();

              var img_name = res.FILENAME;
              $("input[name='pop_img']").val(res.FILENAME);
              $("#pop-preview-img").attr("src", "{BASE_URL}index.php/request/image_view/"+img_name+"/temp");
            } else {
              $("#pop-file-dropzone").show();
              $(".pop-upload-progress").hide();
              alert(res.ERROR_MESSAGE);
            }
          });

          this.on('addedfile', function(file) {
            $("#pop-file-dropzone").hide();
            $(".pop-upload-progress").show();
          });

          this.on('drop', function(file) {
            $("#pop-file-dropzone").hide();
            $(".pop-upload-progress").show();
          });
        }
      });
    </script>
    <!-- /validator -->
