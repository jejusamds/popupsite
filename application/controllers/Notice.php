<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {

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

  public function manage_index($type = '-', $value = '-', $offset = '0') {

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $this->load->library('pagination');
    $per_page          = 20;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    if (!empty ($_POST['checked'])) {
      $result = $this->board_model->delete_board($_POST['checked']);
      if($result){
        $tpl_vars['REDIRECT_URL'] = current_url();
        $tpl_vars['ERROR_MESSAGE'] = '삭제되었습니다.';
        $this->parser->parse('errors/redirect', $tpl_vars);
      } else {
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '데이터베이스의 오류가 발생하였습니다.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }
    }

    $pagination_config['base_url'] = site_url('manager/notice/index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->board_model->paging($offset, $per_page, 'Y', 'notice', $type, $value);
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
      $tpl_vars['EMPTY'] = "<tr><td colspan='6' style='text-align:center;'>등록된 글이 없습니다.</td></tr>";
    } else {
      $tpl_vars['EMPTY'] = "";
    }

    $tpl_vars['ROWS']         = $rows;
    $tpl_vars['SEARCH_VALUE'] = $value;
    $tpl_vars['PAGINATION']   = $this->pagination->create_links();
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'bbs_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("notice/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  public function manage_write($bbs_id = ""){ 

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";
    $title             = empty($_POST['title'])       ? ""  : $_POST['title'];
    $contents          = empty($_POST['contents'])    ? ""  : $_POST['contents'];
    $notice_flag       = empty($_POST['notice_flag']) ? "N" : $_POST['notice_flag'];

    $tpl_vars['BBS_ID']       = "";
    $tpl_vars['BBS_TITLE']    = "";
    $tpl_vars['BBS_CONTENTS'] = "";
    $tpl_vars['BBS_NOTICE_FLAG'] = "";

    if(!empty($_POST)){

      if(empty($title)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "제목을 입력해주세요.";
      }

      if(empty($contents)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "내용을 입력해주세요.";
      }

      if(empty($tpl_vars['ERROR'])) {
        $result = $this->board_model->set_board($bbs_id, "notice", $title, $contents, L_USR_ID, $notice_flag);
        if($result){
          $tpl_vars['REDIRECT_URL'] = base_url()."index.php/manager/notice/index";
          $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
          $this->parser->parse('errors/redirect', $tpl_vars);
        } else {
          $tpl_vars['ERROR'] = "WA";
          $tpl_vars['ERROR_MESSAGE'] = "데이터베이스에서 오류가 발생하였습니다.";
        }
      }
    } else {
      if(!empty($bbs_id)){
        $rows = $this->board_model->get_board('row', '*', $bbs_id, 'notice');
        $rows = array_change_key_case($rows, CASE_UPPER);
        $tpl_vars = array_merge($tpl_vars, $rows);
      }
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("notice/write", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);    
  }

  function manage_view($bbs_id){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($bbs_id)){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
    } else {
      $this->board_model->set_views($bbs_id);
      $rows = $this->board_model->get_board('row', '*', $bbs_id, 'notice');
      $rows = array_change_key_case($rows, CASE_UPPER);
      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("notice/view", $tpl_vars);
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

    if(empty($_POST['bbs_id'])){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
      $this->parser->parse('errors/alert', $tpl_vars);
    } else {
      $result = $this->board_model->delete_board($$_POST['bbs_id']);
      if($result){
        $tpl_vars['ERROR'] = "OK";
        $tpl_vars['ERROR_MESSAGE'] = "삭제되었습니다.";
        $this->parser->parse('errors/empty', array('CONTENTS' => json_encode($tpl_vars)));
      } else {
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "데이터베이스의 오류가 발생하였습니다.";
        $this->parser->parse('errors/empty', array('CONTENTS' => json_encode($tpl_vars)));
      }
    }
  }

  public function request_index($type = '-', $value = '-', $offset = '0') {

    $this->load->library('pagination');

    $per_page          = PER_PAGE;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    if (!empty ($_POST['checked'])) {
      $result = $this->board_model->delete_board($_POST['checked']);
      if($result){
        $tpl_vars['REDIRECT_URL'] = current_url();
        $tpl_vars['ERROR_MESSAGE'] = '삭제되었습니다.';
        $this->parser->parse('errors/redirect', $tpl_vars);
      } else {
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '데이터베이스의 오류가 발생하였습니다.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }
    }

    $pagination_config['base_url'] = site_url('notice/request_index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->board_model->paging($offset, $per_page, 'Y', 'notice', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    //pagination config
    $pagination_config['total_rows']     = $numrows;
    $pagination_config['uri_segment']    = 5;
    $pagination_config['num_links']      = 5;
    $pagination_config['per_page']       = $per_page;
    $pagination_config['full_tag_open']  = '<div class="paging mt20"><div class="p_wrap">';
    $pagination_config['full_tag_close'] = '</div></div>';
    $this->pagination->initialize($pagination_config);

    if(empty($rows)){
      $tpl_vars['EMPTY'] = "<tr><td colspan='6' style='text-align:center;'>".EMPTY_DATA."</td></tr>";
    } else {
      $tpl_vars['EMPTY'] = "";
    }

    $tpl_vars['ROWS']         = $rows;
    $tpl_vars['SEARCH_VALUE'] = $value;
    $tpl_vars['PAGINATION']   = $this->pagination->create_links();
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'bbs_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("notice/request_index", $tpl_vars);
  }

  function request_view($bbs_id = ""){

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($bbs_id)){
      $tpl_vars['BBS_TITLE'] = "";
      $tpl_vars['BBS_CONTENTS'] = "";
    } else {
      $this->board_model->set_views($bbs_id);
      $rows = $this->board_model->get_board('row', '*', $bbs_id, 'notice');

      if(empty($rows)){
        $tpl_vars['BBS_TITLE'] = "";
        $tpl_vars['BBS_CONTENTS'] = "";
      }

      $rows = array_change_key_case($rows, CASE_UPPER);
      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("notice/request_view", $tpl_vars);
  }

}
