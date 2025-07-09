<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diet extends CI_Controller {

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

    $this->load->model("diet_model");
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
      $result = $this->diet_model->delete_diet($_POST['checked']);
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

    $pagination_config['base_url'] = site_url('manager/diet/index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->diet_model->paging($offset, $per_page, 'Y', $type, $value);
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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'diet_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("diet/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  public function manage_write($diet_id = ""){ 

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $tpl_vars['DIET_ID']       = '';
    $tpl_vars['DIET_TITLE']    = '';
    $tpl_vars['DIET_MON_1']    = '';
    $tpl_vars['DIET_MON_2']    = '';
    $tpl_vars['DIET_MON_3']    = '';
    $tpl_vars['DIET_TUE_1']    = '';
    $tpl_vars['DIET_TUE_2']    = '';
    $tpl_vars['DIET_TUE_3']    = '';
    $tpl_vars['DIET_WED_1']    = '';
    $tpl_vars['DIET_WED_2']    = '';
    $tpl_vars['DIET_WED_3']    = '';
    $tpl_vars['DIET_THU_1']    = '';
    $tpl_vars['DIET_THU_2']    = '';
    $tpl_vars['DIET_THU_3']    = '';
    $tpl_vars['DIET_FRI_1']    = '';
    $tpl_vars['DIET_FRI_2']    = '';
    $tpl_vars['DIET_FRI_3']    = '';
    $tpl_vars['DIET_SAT_1']    = '';
    $tpl_vars['DIET_SAT_2']    = '';
    $tpl_vars['DIET_SAT_3']    = '';
    $tpl_vars['DIET_SUN_1']    = '';
    $tpl_vars['DIET_SUN_2']    = '';
    $tpl_vars['DIET_SUN_3']    = '';
    $tpl_vars['DIET_ORIGIN']   = '';

    $diet_title             = empty($_POST['diet_title'])    ? "" : $_POST['diet_title'];
    $diet_mon_1             = empty($_POST['diet_mon_1'])    ? "" : $_POST['diet_mon_1'];
    $diet_mon_2             = empty($_POST['diet_mon_2'])    ? "" : $_POST['diet_mon_2'];
    $diet_mon_3             = empty($_POST['diet_mon_3'])    ? "" : $_POST['diet_mon_3'];
    $diet_tue_1             = empty($_POST['diet_tue_1'])    ? "" : $_POST['diet_tue_1'];
    $diet_tue_2             = empty($_POST['diet_tue_2'])    ? "" : $_POST['diet_tue_2'];
    $diet_tue_3             = empty($_POST['diet_tue_3'])    ? "" : $_POST['diet_tue_3'];
    $diet_wed_1             = empty($_POST['diet_wed_1'])    ? "" : $_POST['diet_wed_1'];
    $diet_wed_2             = empty($_POST['diet_wed_2'])    ? "" : $_POST['diet_wed_2'];
    $diet_wed_3             = empty($_POST['diet_wed_3'])    ? "" : $_POST['diet_wed_3'];
    $diet_thu_1             = empty($_POST['diet_thu_1'])    ? "" : $_POST['diet_thu_1'];
    $diet_thu_2             = empty($_POST['diet_thu_2'])    ? "" : $_POST['diet_thu_2'];
    $diet_thu_3             = empty($_POST['diet_thu_3'])    ? "" : $_POST['diet_thu_3'];
    $diet_fri_1             = empty($_POST['diet_fri_1'])    ? "" : $_POST['diet_fri_1'];
    $diet_fri_2             = empty($_POST['diet_fri_2'])    ? "" : $_POST['diet_fri_2'];
    $diet_fri_3             = empty($_POST['diet_fri_3'])    ? "" : $_POST['diet_fri_3'];
    $diet_sat_1             = empty($_POST['diet_sat_1'])    ? "" : $_POST['diet_sat_1'];
    $diet_sat_2             = empty($_POST['diet_sat_2'])    ? "" : $_POST['diet_sat_2'];
    $diet_sat_3             = empty($_POST['diet_sat_3'])    ? "" : $_POST['diet_sat_3'];
    $diet_sun_1             = empty($_POST['diet_sun_1'])    ? "" : $_POST['diet_sun_1'];
    $diet_sun_2             = empty($_POST['diet_sun_2'])    ? "" : $_POST['diet_sun_2'];
    $diet_sun_3             = empty($_POST['diet_sun_3'])    ? "" : $_POST['diet_sun_3'];
    $diet_origin            = empty($_POST['diet_origin'])   ? "" : $_POST['diet_origin'];

    if(!empty($_POST)){
      if(empty($tpl_vars['ERROR'])) {
        $result = $this->diet_model->set_diet($diet_id, $diet_title, $diet_mon_1, $diet_mon_2, $diet_mon_3,
                      $diet_tue_1, $diet_tue_2, $diet_tue_3, $diet_wed_1, $diet_wed_2, $diet_wed_3,
                      $diet_thu_1, $diet_thu_2, $diet_thu_3, $diet_fri_1, $diet_fri_2, $diet_fri_3,
                      $diet_sat_1, $diet_sat_2, $diet_sat_3, $diet_sun_1, $diet_sun_2, $diet_sun_3, $diet_origin, L_USR_ID);

        if($result){
          $tpl_vars['REDIRECT_URL'] = base_url()."index.php/manager/diet/index";
          $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
          $this->parser->parse('errors/redirect', $tpl_vars);
        } else {
          $tpl_vars['ERROR'] = "WA";
          $tpl_vars['ERROR_MESSAGE'] = "데이터베이스에서 오류가 발생하였습니다.";
        }
      }
    } else {
      if(!empty($diet_id)){
        $diet_id = urldecode($diet_id);
        $rows = $this->diet_model->get_diet('row', '*', $diet_id);
        $rows = array_change_key_case($rows, CASE_UPPER);
        $tpl_vars = array_merge($tpl_vars, $rows);
      }
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("diet/write", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);    
  }

  function manage_view($diet_id){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($diet_id)){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
    } else {
      $this->diet_model->set_views($diet_id);
      $rows = $this->diet_model->get_diet('row', '*', $diet_id);
      $rows = array_change_key_case($rows, CASE_UPPER);
      $rows['DIET_MON_1'] = nl2br($rows['DIET_MON_1']);
      $rows['DIET_MON_2'] = nl2br($rows['DIET_MON_2']);
      $rows['DIET_MON_3'] = nl2br($rows['DIET_MON_3']);
      $rows['DIET_TUE_1'] = nl2br($rows['DIET_TUE_1']);
      $rows['DIET_TUE_2'] = nl2br($rows['DIET_TUE_2']);
      $rows['DIET_TUE_3'] = nl2br($rows['DIET_TUE_3']);
      $rows['DIET_WED_1'] = nl2br($rows['DIET_WED_1']);
      $rows['DIET_WED_2'] = nl2br($rows['DIET_WED_2']);
      $rows['DIET_WED_3'] = nl2br($rows['DIET_WED_3']);
      $rows['DIET_THU_1'] = nl2br($rows['DIET_THU_1']);
      $rows['DIET_THU_2'] = nl2br($rows['DIET_THU_2']);
      $rows['DIET_THU_3'] = nl2br($rows['DIET_THU_3']);
      $rows['DIET_FRI_1'] = nl2br($rows['DIET_FRI_1']);
      $rows['DIET_FRI_2'] = nl2br($rows['DIET_FRI_2']);
      $rows['DIET_FRI_3'] = nl2br($rows['DIET_FRI_3']);
      $rows['DIET_SAT_1'] = nl2br($rows['DIET_SAT_1']);
      $rows['DIET_SAT_2'] = nl2br($rows['DIET_SAT_2']);
      $rows['DIET_SAT_3'] = nl2br($rows['DIET_SAT_3']);
      $rows['DIET_SUN_1'] = nl2br($rows['DIET_SUN_1']);
      $rows['DIET_SUN_2'] = nl2br($rows['DIET_SUN_2']);
      $rows['DIET_SUN_3'] = nl2br($rows['DIET_SUN_3']);

      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("diet/view", $tpl_vars);
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

    if(empty($_POST['diet_id'])){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
      $this->parser->parse('errors/alert', $tpl_vars);
    } else {
      $result = $this->diet_model->delete_diet($_POST['diet_id']);
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
      $result = $this->diet_model->delete_diet($_POST['checked']);
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

    $pagination_config['base_url'] = site_url('diet/request_index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->diet_model->paging($offset, $per_page, 'Y', $type, $value);
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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'diet_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("diet/request_index", $tpl_vars);
  }

  function request_view($diet_id = ""){

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($diet_id)){
      $tpl_vars['BBS_TITLE'] = "";
      $tpl_vars['BBS_CONTENTS'] = "";
    } else {
      $this->diet_model->set_views($diet_id);
      $rows = $this->diet_model->get_diet('row', '*', $diet_id);

      if(empty($rows)){
        $tpl_vars['BBS_TITLE'] = "";
        $tpl_vars['BBS_CONTENTS'] = "";
      }

      $rows = array_change_key_case($rows, CASE_UPPER);
      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("diet/request_view", $tpl_vars);
  }

}
