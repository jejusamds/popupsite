        <!-- page content -->
        <div class="right_col" role="main">
          <div class="" style="margin-top:80px;">
            <div class="row top_tiles" style="margin: 10px 0;">
              <div class="col-md-4 col-sm-4 col-xs-12 tile">
                <span>금일 방문자수</span>
                <h2>{VISIT_COUNT_DAY}</h2>
                <span class="sparkline_hour" style="height: 60px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12 tile">
                <span>금월 방문자수</span>
                <h2>{VISIT_COUNT_MONTH}</h2>
                <span class="sparkline_day" style="height: 60px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12 tile">
                <span>전체 방문자수</span>
                <h2>{VISIT_COUNT}</h2>
                <span class="sparkline_month" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>
            </div>
            <br />

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                  <div class="x_title">
                    <h2>에이전트별 통계 <small>Browser</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {AGENT_ROWS}
                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>{AGENT}</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{PERCENT}" aria-valuemin="0" aria-valuemax="100" style="width: {PERCENT}%;">
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>{VISIT_COUNT}</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    {/AGENT_ROWS}
                  </div>
                </div>
              </div>


            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                  <div class="x_title">
                    <h2>OS별 통계 <small>Operation system</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {OS_ROWS}
                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>{OS}</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="{PERCENT}" aria-valuemin="0" aria-valuemax="100" style="width: {PERCENT}%;">
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>{VISIT_COUNT}</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    {/OS_ROWS}
                  </div>
                </div>
              </div>


            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                  <div class="x_title">
                    <h2>IP별 통계 <small>IP Address</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {IP_ROWS}
                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>{IP}</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="{PERCENT}" aria-valuemin="0" aria-valuemax="100" style="width: {PERCENT}%;">
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>{VISIT_COUNT}</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    {/IP_ROWS}
                  </div>
                </div>
              </div>


            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                  <div class="x_title">
                    <h2>접속경로별 통계 <small>Referer</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {REFERRER_ROWS}
                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>{REFERRER}</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-blue-sky" role="progressbar" aria-valuenow="{PERCENT}" aria-valuemin="0" aria-valuemax="100" style="width: {PERCENT}%;">
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>{VISIT_COUNT}</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    {/REFERRER_ROWS}
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- /page content -->


    <!-- jQuery -->
    <script src="{BASE_URL}vendors/jquery/dist/jquery.min.js"></script>

    <script>
      $(document).ready(function() {

        var data = [{HOUR_DATA}];
        $(".sparkline_hour").sparkline(data, {
          type: 'bar',
          height: '100',
          barWidth: 9,
          colorMap: {
            '7': '#a1a1a1'
          },
          barSpacing: 2,
          barColor: '#00ADFF',
          tooltipFormat: '{{offset:names}}',
          tooltipValueLookups: {
            names: {
                {HOUR_ROWS}
                {NUM} : '{DATE} : {VISIT_COUNT}',
                {/HOUR_ROWS}
            }
          }
        });


        data = [{DAY_DATA}];
        $(".sparkline_day").sparkline(data, {
          type: 'bar',
          height: '100',
          barWidth: 9,
          colorMap: {
            '7': '#a1a1a1'
          },
          barSpacing: 2,
          barColor: '#00ADFF',
          tooltipFormat: '{{offset:names}}',
          tooltipValueLookups: {
            names: {
                {DAY_ROWS}
                {NUM} : '{DATE} : {VISIT_COUNT}',
                {/DAY_ROWS}
            }
          }
        });


        data = [{MONTH_DATA}];
        $(".sparkline_month").sparkline(data, {
          type: 'bar',
          height: '100',
          barWidth: 9,
          colorMap: {
            '7': '#a1a1a1'
          },
          barSpacing: 2,
          barColor: '#00ADFF',
          tooltipFormat: '{{offset:names}}',
          tooltipValueLookups: {
            names: {
                {MONTH_ROWS}
                {NUM} : '{DATE} : {VISIT_COUNT}',
                {/MONTH_ROWS}
            }
          }
        });

      });
    </script>
    <!-- /jQuery Sparklines -->

