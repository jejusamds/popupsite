<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>기본관리</h3>
      </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>사이트설정 <small> 사이트 기본정보를 설정합니다.</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form method="post" action="{CURRENT_URL}" id="setting_form" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">사이트 제목(한글)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="title_ko" name="title_ko" required="required" value="{SET_TITLE_KO}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_en">사이트 제목(영문)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="title_en" name="title_en" required="required" value="{SET_TITLE_EN}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">사이트 설명 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="description" name="description" value="{SET_DESCRIPTION}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyword">사이트 키워드
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="keyword" name="keyword" value="{SET_KEYWORD}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_ko">업체명(한글)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="name_ko" name="name_ko" value="{SET_NAME_KO}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_en">업체명(영문)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="name_en" name="name_en" value="{SET_NAME_EN}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address_ko">주소(한글)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="address_ko" name="address_ko" value="{SET_ADDRESS_KO}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address_en">주소 (영문)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="address_en" name="address_en" value="{SET_ADDRESS_EN}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel1_num">전화번호1
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="tel1_num" name="tel1_num" value="{SET_TEL1_NUM}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel2_num">전화번호2
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="tel2_num" name="tel2_num" value="{SET_TEL2_NUM}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel3_num">전화번호3
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="tel3_num" name="tel3_num" value="{SET_TEL3_NUM}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel4_num">전화번호4
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="tel4_num" name="tel4_num" value="{SET_TEL4_NUM}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel5_num">전화번호5
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="tel5_num" name="tel5_num" value="{SET_TEL5_NUM}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fax_num">팩스번호
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="fax_num" name="fax_num" value="{SET_FAX_NUM}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="owner">담당자
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="owner" name="owner" value="{SET_OWNER}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">이메일
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="email" name="email" value="{SET_EMAIL}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="regist_num">사업자번호
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="regist_num" name="regist_num" value="{SET_REGIST_NUM}" required="required" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="ln_solid"></div>

              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;저장하기</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
