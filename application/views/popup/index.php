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
                        <h2>팝업 목록 <small>팝업을 관리합니다.</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div style="overflow:hidden;" class="table-responsive">
                            <form id="delete-form" action="{CURRENT_URL}" method="post">
                                <table class="table table-striped jambo_table bulk_action">
                                    <colgroup>
                                        <col width="5%" />
                                        <col width="20%" />
                                        <col width="20%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="15%" />
                                    </colgroup>
                                    <thead>
                                        <tr class="headings">
                                            <th style="text-align:center;">
                                                <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th style="text-align:center;" class="column-title">타이틀</th>
                                            <th style="text-align:center;" class="column-title">기간</th>
                                            <th style="text-align:center;" class="column-title">노출여부</th>
                                            <th style="text-align:center;" class="column-title">순서</th>
                                            <th style="text-align:center;" class="column-title">등록일</th>
                                            <th style="text-align:center;" class="column-title">수정</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {ROWS}
                                        <tr class="even pointer">
                                            <td style="text-align:center; vertical-align:middle;" class="a-center ">
                                                <input type="checkbox" class="flat bbs-id" name="checked[]"
                                                    value="{ID}">
                                            </td>
                                            <td style="cursor:pointer; vertical-align:middle;" class="bbs-title">
                                                {TITLE}
                                            </td>
                                            <td style="text-align:center; vertical-align:middle;">
                                                {START_DATE}~{END_DATE}</td>
                                            <td style="text-align:center; vertical-align:middle;">{IS_VIEW}</td>
                                            <td style="text-align:center; vertical-align:middle;">
                                                <button type="button" class="btn btn-default btn-xs order-up"
                                                    data-id="{ID}" data-order="{ORD}"><i
                                                        class="fa fa-arrow-up"></i></button>
                                                <button type="button" class="btn btn-default btn-xs order-down"
                                                    data-id="{ID}" data-order="{ORD}"><i
                                                        class="fa fa-arrow-down"></i></button>
                                            </td>
                                            <td style="text-align:center; vertical-align:middle;" class="a-center">
                                                {DATE}</td>
                                            <td style="text-align:center; vertical-align:middle;" class="last a-center">
                                                <button type="button" class="btn btn-primary btn-sm bbs-modify">
                                                    <i class="fa fa-pencil"></i>
                                                    수정
                                                </button>
                                            </td>
                                        </tr>
                                        {/ROWS}
                                        {EMPTY}
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button id="delete" style="float:left;" type="button" class="btn btn-danger btn-sm">
                                <i class="fa fa-close"></i>
                                삭제
                            </button>
                            <a href="{BASE_URL}index.php/manager/popup/write"><button style="float:right;" type="button"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                    글쓰기
                                </button></a>
                        </div>
                        {PAGINATION}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script>
    $(document).ready(function () {
        var checkAll = $("#check-all");
        var checkboxes = $("input[name='checked[]']");

        checkAll.on('ifUnchecked', function (event) {
            checkboxes.iCheck('uncheck');
        });

        checkAll.on('ifChecked', function (event) {
            checkboxes.iCheck('check');
        });

        $("#delete").click(function () {
            if ($("input[name='checked[]']:checked").length == 0) {
                alert("삭제할 대상을 선택해주세요");
            } else {
                if (confirm("정말 삭제하시겠습니까?")) {
                    $("#delete-form").submit();
                }
            }
        });

        $(".bbs-title").click(function () {
            var id = $(this).parent().find(".bbs-id").val();
            location.href = "{BASE_URL}index.php/manager/popup/write/" + id;
        });

        $(".bbs-modify").click(function () {
            var id = $(this).parent().parent().find(".bbs-id").val();
            location.href = "{BASE_URL}index.php/manager/popup/write/" + id;
        });

         $(".order-up").click(function () {
             var id = $(this).data('id');
             updateOrder(id, 'up');
         });

         $(".order-down").click(function () {
             var id = $(this).data('id');
             updateOrder(id, 'down');
         });

         function updateOrder(id, direction) {
             $.post('{BASE_URL}index.php/manager/popup/order', { pop_id: id, direction: direction }, function (res) {
                 location.reload();
             }, 'json');
         }
    });
</script>