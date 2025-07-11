<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

  function  __construct() {
    parent::__construct();

    //PHP Setting
    ini_set("max_execution_time", 90000000);
    set_time_limit(0);
    date_default_timezone_set('Asia/Seoul');

    //cache
    header("Content-Type: text/html; charset=UTF-8");
    header('P3P: CP="CAO PSA OUR"');
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');

    $this->load->model("board_model");
  }

  function ckeditor_image_upload(){

    if(!empty($_FILES)){

      if (empty ($_FILES['upload']) && $_FILES['upload']['error'] !== UPLOAD_ERR_NO_FILE) {
      }

      if ($_FILES['upload']['error'] === UPLOAD_ERR_OK) {

        if(!empty($m[1]))    $file_type = $m[1];
        else                 $file_type = 'jpg';

        $image_mime     = strtoupper($_FILES['upload']['type']);
        $tmp_filename   = $_FILES['upload']['tmp_name'];
        $image_name     = 'img_'.random_string('alnum', 15).".".$file_type;
        $image_filepath = DATA_FILEPATH_CKEDITOR."/".date("Ymd")."/";
        @mkdir($image_filepath, 0755, true);
        $image_filename = $image_filepath.$image_name;

        $config['image_library']  = 'gd2';
        $config['source_image']   = $tmp_filename;
        $config['new_image']      = $image_filename;
        $config['create_thumb']   = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width']          = 176*5;
        $config['height']         = 144*5;
        $config['quality']        = '100%';
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        

        if($this->image_lib->resize()){

              $src = base_url()."file_attach/".date("Ymd")."/".$image_name;

              echo "
                    <script type='text/javascript'>
                      window.parent.CKEDITOR.tools.callFunction(".$_GET['CKEditorFuncNum'].", '$src', '');
                    </script>
                   ";

          } else {
            //Failed RESIZE
            $this->image_lib->clear();
            echo "Failed RESIZE";
            //echo $this->image_lib->display_errors();
          }
        } else {
          //missmatch MIME-TYPE
          echo "missmatch MIME";
        }
      } else {
        //Failed upload
        echo "UPLOAD FAILED";
      }
  }

  function image_upload(){

    if(!empty($_FILES)){

      if (empty ($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        return array("WA", " 업로드 실패 (005)");
      }

      if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
  
        $image_mime = strtoupper($_FILES['image']['type']);
        $image_filename = $_FILES['image']['tmp_name'];

        if(preg_match('/^IMAGE.+(JPEG|JPG|PNG)/', $image_mime, $m)) {

          if(!empty($m[1]))    $file_type = $m[1];
          else                 $file_type = 'jpg';

          $rand_name = 'img_'.date("YmdHis").random_string('alnum', 10);
          $new_image_filepath = "/tmp/".$rand_name.'.'.$file_type;
          $new_image_filename = $rand_name.'.'.$file_type;

          $config['image_library']  = 'gd2';
//          $config['image_library']  = 'ImageMagick';
//          $config['library_path']   = '/usr/local/bin';
          $config['source_image']   = $image_filename;
          $config['new_image']      = $new_image_filepath;
          $config['create_thumb']   = FALSE;
          $config['maintain_ratio'] = TRUE;
          $config['width']          = 176*5;
          $config['height']         = 144*5;
          $config['quality']        = '100%';
//          $this->load->library('image_lib', $config);
          $this->load->library('image_lib');
          $this->image_lib->initialize($config);

          if($this->image_lib->resize()){

            $temp_filepath = DATA_FILEPATH."/temp/".$new_image_filename;

            if (@copy($new_image_filepath, $temp_filepath)) {
              //tmp 폴더에 생성했던 이미지 제거
              @unlink($new_image_filepath);
              $tpl_vars['ERROR'] = "OK";
              $tpl_vars['ERROR_MESSAGE'] = "";
              $tpl_vars['FILENAME'] = $new_image_filename;
            } else {
              $tpl_vars['ERROR'] = "WA";
              $tpl_vars['ERROR_MESSAGE'] = '이미지 파일 이동에 실패하였습니다.';
              $tpl_vars['FILENAME'] = $new_image_filename;
            }

          } else {
            //Failed RESIZE
            $tpl_vars['ERROR'] = "WA";
            $tpl_vars['ERROR_MESSAGE'] = '이미지 리사이즈에 실패하였습니다.';
//            $tpl_vars['ERROR_MESSAGE'] = $this->image_lib->display_errors();
            $this->image_lib->clear();
          }
        } else {
          //missmatch MIME-TYPE
          $tpl_vars['ERROR'] = "WA";
          $tpl_vars['ERROR_MESSAGE'] = '지원되지 않는 확장자입니다.';
        }
      } else {
        //Failed upload
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = '업로드에 실패하였습니다.';
      }
    }

    $tpl['CONTENTS'] = json_encode($tpl_vars, TRUE);
    $this->parser->parse("errors/empty", $tpl);
  }

  function image_view($filename = "", $image_type = 'temp'){

    $tpl_varsa = array();
    $tpl_varsa['ERROR'] = "";

    if(empty($filename)){
      die();
    }

    $this->load->helper("file");

    if($image_type == 'temp'){
      $filepath = DATA_FILEPATH."/temp/".$filename;
    } else if($image_type == 'partner'){
      $filepath = DATA_FILEPATH."/partner/".$filename;
    } else if($image_type == 'gallery'){
      $filepath = DATA_FILEPATH."/gallery/".$filename;
    } else if($image_type == 'logo'){
      $filepath = DATA_FILEPATH."/logo/".$filename;
    } else if($image_type == 'popup'){
      $filepath = DATA_FILEPATH."/popup/".$filename;
    } else {
      $filepath = DATA_FILEPATH."/".$image_type."/".$filename;
    }

    if(preg_match("/(JPG|JPEG)/", $filename, $m)){
      $im = imagecreatefromjpeg($filepath);
      header('Content-Type: image/jpeg');
      imagejpeg($im);
    } else if(preg_match("/(PNG)/", $filename, $m)){
      $im = imagecreatefrompng($filepath);
      imagealphablending($im, false);
      imagesavealpha($im, true);
      imagepng($im);
    }
  }
}
