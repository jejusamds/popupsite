<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>장례식장 가격 설정</h3>
      </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>장례식장 가격 설정<small> 장례식 관련 가격 설정</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form method="post" action="{CURRENT_URL}" id="funeral_form" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">VIP실 가격
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="lease_vip_price" name="lease_vip_price" value="{LEASE_VIP_PRICE}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">1호실 가격
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="lease_n01_price" name="lease_n01_price" value="{LEASE_N01_PRICE}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">2호실 가격
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="lease_n02_price" name="lease_n02_price" value="{LEASE_N02_PRICE}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">VIP실 가격 (시간)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="lease_vip_price_per_hour"  name="lease_vip_price_per_hour" value="{LEASE_VIP_PRICE_PER_HOUR}"  class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">1호실 가격 (시간)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="lease_n01_price_per_hour" name="lease_n01_price_per_hour" value="{LEASE_N01_PRICE_PER_HOUR}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">2호실 가격 (시간)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="lease_n02_price_per_hour" name="lease_n02_price_per_hour" value="{LEASE_N02_PRICE_PER_HOUR}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">환경부담금 (VIP)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="env_vip_price" name="env_vip_price" value="{ENV_VIP_PRICE}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">환경부담금 (일반실)
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="env_price" name="env_price" value="{ENV_PRICE}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">안치료
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="immigration" name="immigration" value="{IMMIGRATION}" class="form-control col-md-9 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_ko">입관료
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="enshrined" name="enshrined" value="{ENSHRINED}" class="form-control col-md-9 col-xs-12">
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
