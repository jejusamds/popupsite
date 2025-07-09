<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welfare_gallery extends CI_Controller {

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

    $this->load->model("welfare_gallery_model");
  }

  public function manage_index($type = '-', $value = '-', $offset = '0') {

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $this->load->library('pagination');
    $per_page          = PER_PAGE * 2;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    if (!empty ($_POST['checked'])) {
      $result = $this->welfare_gallery_model->delete_($_POST['checked']);
      if($result){
        $tpl_vars['REDIRECT_URL'] = base_url()."index.php/manager/welfare_gallery/index";
        $tpl_vars['ERROR_MESSAGE'] = '삭제되었습니다.';
        $this->parser->parse('errors/redirect', $tpl_vars);
      } else {
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '데이터베이스의 오류가 발생하였습니다.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }
    }

    $pagination_config['base_url'] = site_url('/manager/welfare_gallery/index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->welfare_gallery_model->paging($offset, $per_page, 'Y', '', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    //pagination config
    $pagination_config['total_rows']     = $numrows;
    $pagination_config['uri_segment']    = 6;
    $pagination_config['num_links']      = 5;
    $pagination_config['per_page']       = $per_page;
    $pagination_config['full_tag_open']  = '<div class="paging mt20"><div class="p_wrap">';
    $pagination_config['full_tag_close'] = '</div></div>';
    $this->pagination->initialize($pagination_config);

    if(empty($rows)){
      $tpl_vars['EMPTY'] = "<div style='width:100%; text-align:center;'>등록된 갤러리가 없습니다.</div>";
    } else {
      $tpl_vars['EMPTY'] = "";
      foreach($rows as $k => $v){
        $v['BASE_URL'] = base_url();
        $rows[$k] = $v;
      }
    }

    $tpl_vars['ROWS']         = $rows;
    $tpl_vars['SEARCH_VALUE'] = $value;
    $tpl_vars['PAGINATION']   = $this->pagination->create_links();
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'gbbs_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("welfare_gallery/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  public function manage_write($gbbs_id = ""){ 

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";
    $gbbs_type         = empty($_POST['gbbs_type'])    ? "" : $_POST['gbbs_type'];
    $title             = empty($_POST['title'])         ? "" : $_POST['title'];
    $contents          = empty($_POST['contents'])     ? "" : $_POST['contents'];
    $img_filename      = empty($_POST['img_filename']) ? "" : $_POST['img_filename'];

    $this->load->model('common_code_model');
    $code_data = $this->common_code_model->get_common_codes('*', 'LANG', 'KO', 'GAL_%');
    $category  = array();
    foreach($code_data as $k => $v){
      $category[$k]['CODE'] = $v['cc_code'];
      $category[$k]['NAME'] = $v['cc_name'];
    }

    if(!empty($_POST)){

      if(!empty($gbbs_id)){
        $rows = $this->welfare_gallery_model->get_gallery('row', '*', $gbbs_id);
        if(empty($rows)){
          $gbbs_id = "";
        }
      }

      if(empty($title)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "제목을 입력해주세요.";
      }

      if(empty($contents)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "메모를 입력해주세요.";
      }

      if(empty($tpl_vars['ERROR'])) {
        $result = $this->welfare_gallery_model->set_gallery($gbbs_id, $gbbs_type, $title, $contents, $img_filename, L_USR_ID);

        if($result){          

          copy(DATA_FILEPATH."/temp/".$img_filename, DATA_FILEPATH."/gallery/".$img_filename);
          unlink(DATA_FILEPATH."/temp/".$img_filename);

          $tpl_vars['REDIRECT_URL'] = base_url()."index.php/manager/welfare_gallery/index";
          if(empty($id))    $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
          else              $tpl_vars['ERROR_MESSAGE'] = "수정되었습니다.";
          $this->parser->parse('errors/redirect', $tpl_vars);
        } else {
          $tpl_vars['ERROR'] = "WA";
          $tpl_vars['ERROR_MESSAGE'] = "데이터베이스에서 오류가 발생하였습니다.";
        }
      }
    } else {
      if(!empty($gbbs_id)){
        $rows = $this->welfare_gallery_model->get_gallery('row', '*', $gbbs_id);
        $rows = array_change_key_case($rows, CASE_UPPER);

        if(!empty($rows)){
          $gbbs_type    = $rows['GBBS_TYPE'];
          $title        = $rows['GBBS_TITLE'];
          $contents     = $rows['GBBS_CONTENTS'];
          $img_filename = $rows['GBBS_IMG'];
        }
      }
    }

    $tpl_vars['CATEGORY']        = $category;
    $tpl_vars['GBBS_TYPE']       = $gbbs_type;
    $tpl_vars['GBBS_TITLE']      = $title;
    $tpl_vars['GBBS_CONTENTS']   = $contents;
    $tpl_vars['GBBS_IMG']        = $img_filename;
    $tpl_vars['GBBS_ID']         = $gbbs_id;

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("welfare_gallery/write", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);    
  }

  function manage_view($gbbs_id){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($gbbs_id)){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
    } else {
      $this->welfare_gallery_model->set_views($gbbs_id);
      $rows = $this->welfare_gallery_model->get_gallery('row', '*', $gbbs_id, 'gallery');
      $rows = array_change_key_case($rows, CASE_UPPER);
      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("welfare_gallery/view", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  function manage_request_delete(){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = "";
    $tpl_vars['ERROR_MESSAGE'] = "";

    if(empty($_POST['gbbs_id'])){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
      $tpl['CONTENTS'] = json_encode($tpl_vars, TRUE);
      $this->parser->parse('errors/empty', $tpl);
    } else {
      $result = $this->welfare_gallery_model->delete_gallery($_POST['gbbs_id']);
      if($result){
        $tpl_vars['ERROR'] = "OK";
        $tpl_vars['ERROR_MESSAGE'] = "삭제되었습니다";
        $tpl['CONTENTS'] = json_encode($tpl_vars, TRUE);
        $this->parser->parse('errors/empty', $tpl);
      } else {
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "데이터베이스의 오류가 발생하였습니다.";
        $tpl['CONTENTS'] = json_encode($tpl_vars, TRUE);
        $this->parser->parse('errors/empty', $tpl);
      }
    }
  }

}
