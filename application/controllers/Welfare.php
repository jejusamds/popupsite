<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welfare extends CI_Controller {

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

    $this->load->model("welfare_model");
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
      $result = $this->welfare_model->delete_welfare($_POST['checked']);
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

    $pagination_config['base_url'] = site_url('manager/welfare/index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->welfare_model->paging($offset, $per_page, 'Y', $type, $value);
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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'welfare_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("welfare/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  public function manage_write($wel_id = ""){ 

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $tpl_vars['WEL_ID']       = '';
    $tpl_vars['WEL_TITLE']    = '';
    $tpl_vars['WEL_MON']    = '';
    $tpl_vars['WEL_TUE']    = '';
    $tpl_vars['WEL_WED']    = '';
    $tpl_vars['WEL_THU']    = '';
    $tpl_vars['WEL_FRI']    = '';
    $tpl_vars['WEL_SAT']    = '';
    $tpl_vars['WEL_SUN']    = '';

    $wel_title         = empty($_POST['wel_title'])    ? "" : $_POST['wel_title'];
    $wel_mon           = empty($_POST['wel_mon'])    ? "" : $_POST['wel_mon'];
    $wel_tue           = empty($_POST['wel_tue'])    ? "" : $_POST['wel_tue'];
    $wel_wed           = empty($_POST['wel_wed'])    ? "" : $_POST['wel_wed'];
    $wel_thu           = empty($_POST['wel_thu'])    ? "" : $_POST['wel_thu'];
    $wel_fri           = empty($_POST['wel_fri'])    ? "" : $_POST['wel_fri'];
    $wel_sat           = empty($_POST['wel_sat'])    ? "" : $_POST['wel_sat'];
    $wel_sun           = empty($_POST['wel_sun'])    ? "" : $_POST['wel_sun'];

    if(!empty($_POST)){
      if(empty($tpl_vars['ERROR'])) {
        $result = $this->welfare_model->set_welfare($wel_id, $wel_title, $wel_mon, $wel_tue,
                                                    $wel_wed, $wel_thu, $wel_fri, $wel_sat, $wel_sun, L_USR_ID);

        if($result){
          $tpl_vars['REDIRECT_URL'] = base_url()."index.php/manager/welfare/index";
          $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
          $this->parser->parse('errors/redirect', $tpl_vars);
        } else {
          $tpl_vars['ERROR'] = "WA";
          $tpl_vars['ERROR_MESSAGE'] = "데이터베이스에서 오류가 발생하였습니다.";
        }
      }
    } else {
      if(!empty($wel_id)){
        $diet_id = urldecode($wel_id);
        $rows = $this->welfare_model->get_welfare('row', '*', $wel_id);
        $rows = array_change_key_case($rows, CASE_UPPER);
        $tpl_vars = array_merge($tpl_vars, $rows);
      }
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("welfare/write", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);    
  }

  function manage_view($wel_id){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($wel_id)){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
    } else {
      $this->welfare_model->set_views($wel_id);
      $rows = $this->welfare_model->get_welfare('row', '*', $wel_id);
      $rows = array_change_key_case($rows, CASE_UPPER);
      $rows['WEL_MON'] = nl2br($rows['WEL_MON']);
      $rows['WEL_TUE'] = nl2br($rows['WEL_TUE']);
      $rows['WEL_WED'] = nl2br($rows['WEL_WED']);
      $rows['WEL_THU'] = nl2br($rows['WEL_THU']);
      $rows['WEL_FRI'] = nl2br($rows['WEL_FRI']);
      $rows['WEL_SAT'] = nl2br($rows['WEL_SAT']);
      $rows['WEL_SUN'] = nl2br($rows['WEL_SUN']);

      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("welfare/view", $tpl_vars);
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

    if(empty($_POST['wel_id'])){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
      $this->parser->parse('errors/alert', $tpl_vars);
    } else {
      $result = $this->welfare_model->delete_welfare($_POST['wel_id']);
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
      $result = $this->welfare_model->delete_welfare($_POST['checked']);
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

    $pagination_config['base_url'] = site_url('welfare/request_index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->welfare_model->paging($offset, $per_page, 'Y', $type, $value);
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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'welfare_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("welfare/request_index", $tpl_vars);
  }

}
