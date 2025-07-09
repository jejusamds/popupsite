        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>사회복지프로그램 갤러리 관리</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>갤러리 등록 <small> 사회복지프로그램에서 보여질 이미지들을 관리합니다.</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form id="form" action="{CURRENT_URL}" method="post" class="form-horizontal form-label-left" novalidate>
                      <input type="hidden" name="id" value="{GBBS_ID}" />
                      <input type="hidden" name="img_filename" value="{GBBS_IMG}" />

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="title" name="title" 
                                   class="form-control col-md-7 col-xs-12" 
                                   placeholder="제목을 입력하세요." 
                                   required="required" value="{GBBS_TITLE}"/>
                        </div>
                      </div>

                      <div class="item form-group">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="contents" name="contents"
                                   class="form-control col-md-7 col-xs-12"
                                   placeholder="이미지설명을 입력하세요."
                                   value="{GBBS_CONTENTS}"/>
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
                            <form action="{BASE_URL}index.php/request/image_upload" class="dropzone" drop-zone="" id="file-dropzone">
                              <div class="dz-message text-center alert alert-secondary">
                                <h2><strong>이미지를 이곳에 드롭다운 하시거나 여기를 클릭해 주세요.</strong></h2>
                                <p>첨부가능한 이미지는 jpg, jpeg, png입니다.</p>
                              </div>
                            </form>
                            <div style="display:none;" class="upload-progress text-center alert alert-info">
                              <h2><i class="fa fa-refresh fa-spin"></i><strong> 파일을 업로드중 입니다.</strong></h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="banner-preview" class="dropzone-previews hide"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center ">                                       
                      <div class="image-preview">
                        <img src="" id="preview-img">
                        <br />
                        <br />
                        <br />
                      </div>
                    </div>

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

        $("select[name='gbbs_type']").val(["{GBBS_TYPE}"]);

        $("#cancel").click(function(){
          location.replace("{BASE_URL}index.php/manager/welfare_gallery/index");
        });

        $("#save").click(function(){

          var submit = true;

          var title    = $("#title").val();
          var contents = $("#contents").val();

          if(title == ''){
            alert("제목을 입력하셔야 합니다.");
            return ;
          }

          $('#form').submit();
          return false;

        });
      });

      $('#file-dropzone').dropzone({ 
        url: "{BASE_URL}index.php/request/image_upload",
        maxFilesize: 300, 
        paramName: "image",
        maxThumbnailFilesize: 1,
        previewsContainer: ".dropzone-previews",
        init: function() {
          this.on('success', function(file, json) {        
            var res = JSON.parse(json);
            if(res.ERROR == 'OK'){
              $(".upload-progress").hide();
              $(".image-preview").show();

              var img_name = res.FILENAME;
              $("input[name='img_filename']").val(res.FILENAME);
              $("#preview-img").attr("src", "{BASE_URL}index.php/request/image_view/"+img_name+"/temp");
            } else {
              $("#file-dropzone").show();
              $(".upload-progress").hide();
              alert(res.ERROR_MESSAGE);
            }
          });
       
          this.on('addedfile', function(file) {
            $("#file-dropzone").hide();
            $(".upload-progress").show();
          });
       
          this.on('drop', function(file) {
            $("#file-dropzone").hide();
            $(".upload-progress").show();
          }); 
        }
      });

    </script>
    <!-- /validator -->
