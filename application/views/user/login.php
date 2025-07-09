
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> 금사요양병원 관리자페이지 </title>

    <!-- Bootstrap -->
    <link href="{BASE_URL}css/bootstrap.3.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{BASE_URL}css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{BASE_URL}css/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{BASE_URL}css/admin_custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1><img style="margin-top:50px;" src="{BASE_URL}img/admin_logo.png"/></h1>
              <div style="margin-top:50px;" class="mid_center">
                <form action="{CURRENT_URL}" method="post">
                  <div class="form-group">
                    <div class="input-group col-md-12 col-sm-12 col-xs-12">
                      <input style="border-radius:.5em;" type="text" name="usr_id" class="form-control" placeholder="아이디를 입력하세요">
                    </div>
                    <div class="input-group col-md-12 col-sm-12 col-xs-12">                      
                      <input style="border-radius:.5em;" type="password" name="usr_passwd" class="form-control" placeholder="패스워드를 입력하세요">
                    </div>

                    <input style="border-radius:.5em;"  class="btn btn-primary btn-lg col-sm-12 col-md-12 col-xs-12" type="submit" value="Login" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{BASE_URL}js/jquery.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="{BASE_URL}js/bootstrap.3.min.js"></script>
    <!-- FastClick -->
    <script src="{BASE_URL}js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{BASE_URL}js/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{BASE_URL}js/admin_custom.min.js"></script>
    <script>
      $(document).ready(function(){
        $("input[name='usr_id']").focus();
      });
    </script>
  </body>
</html>
