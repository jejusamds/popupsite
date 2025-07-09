<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unpaid extends CI_Controller {

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

    $this->load->model("unpaid_model");
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
      $result = $this->unpaid_model->delete_unpaid($_POST['checked']);
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

    $pagination_config['base_url'] = site_url('manager/unpaid/index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->unpaid_model->paging($offset, $per_page, 'Y', $type, $value);
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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'unp_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("unpaid/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  public function manage_write($unp_id = ""){ 

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $unp_type               = empty($_POST['unp_type'])            ? "" : $_POST['unp_type'];
    $unp_category           = empty($_POST['unp_category'])        ? "" : $_POST['unp_category'];
    $unp_category_detail    = empty($_POST['unp_category_detail']) ? "" : $_POST['unp_category_detail'];
    $unp_unit               = empty($_POST['unp_unit'])            ? "" : $_POST['unp_unit'];
    $unp_price              = empty($_POST['unp_price'])           ? "" : $_POST['unp_price'];
    $unp_memo               = empty($_POST['unp_memo'])            ? "" : $_POST['unp_memo'];

    $tpl_vars['UNP_ID']              = '';
    $tpl_vars['UNP_TYPE']            = '';
    $tpl_vars['UNP_CATEGORY']        = '';
    $tpl_vars['UNP_CATEGORY_DETAIL'] = '';
    $tpl_vars['UNP_UNIT']            = '';
    $tpl_vars['UNP_PRICE']           = '';
    $tpl_vars['UNP_MEMO']            = '';

    if(!empty($_POST)){

      if(empty($unp_type)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "대분류를 선택하세요.";
      }

      if(empty($unp_category)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "기본 항목을 입력해주세요.";
      }

      if(empty($tpl_vars['ERROR'])) {
        $result = $this->unpaid_model->set_unpaid($unp_id, $unp_type, $unp_category, $unp_category_detail, $unp_unit, $unp_price, $unp_memo,  L_USR_ID);
        if($result){
          $tpl_vars['REDIRECT_URL'] = base_url()."index.php/manager/unpaid/index";
          $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
          $this->parser->parse('errors/redirect', $tpl_vars);
        } else {
          $tpl_vars['ERROR'] = "WA";
          $tpl_vars['ERROR_MESSAGE'] = "데이터베이스에서 오류가 발생하였습니다.";
        }
      }
    } else {
      if(!empty($unp_id)){
        $rows = $this->unpaid_model->get_unpaid('row', '*', $unp_id);
        $rows = array_change_key_case($rows, CASE_UPPER);
        $tpl_vars = array_merge($tpl_vars, $rows);
      }
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("unpaid/write", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);    
  }

  function manage_view($unp_id){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($unp_id)){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
    } else {
      $rows = $this->unpaid_model->get_unpaid('row', '*', $unp_id);
      $rows = array_change_key_case($rows, CASE_UPPER);
      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("unpaid/view", $tpl_vars);
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

    if(empty($_POST['unp_id'])){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
      $this->parser->parse('errors/alert', $tpl_vars);
    } else {
      $result = $this->unpaid_model->delete_unpaid($_POST['unp_id']);
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
      $result = $this->unpaid_model->delete_unpaid($_POST['checked']);
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

    $pagination_config['base_url'] = site_url('unpaid/request_index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->unpaid_model->paging($offset, $per_page, 'Y', 'unpaid', $type, $value);
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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'unp_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("unpaid/request_index", $tpl_vars);
  }

  function request_view($unp_id = ""){

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($unp_id)){
      $tpl_vars['BBS_TITLE'] = "";
      $tpl_vars['BBS_CONTENTS'] = "";
    } else {
      $this->unpaid_model->set_views($unp_id);
      $rows = $this->unpaid_model->get_unpaid('row', '*', $unp_id);

      if(empty($rows)){
        $tpl_vars['BBS_TITLE'] = "";
        $tpl_vars['BBS_CONTENTS'] = "";
      }

      $rows = array_change_key_case($rows, CASE_UPPER);
      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("unpaid/request_view", $tpl_vars);
  }

}
