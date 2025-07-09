<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends CI_Controller {

  function  __construct() {
    parent::__construct();

    ini_set("max_execution_time", 90000000);
    set_time_limit(0);
    date_default_timezone_set('Asia/Seoul');

    header("Content-Type: text/html; charset=UTF-8");
    header('P3P: CP="CAO PSA OUR"');
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');

    $this->load->model("popup_model");
  }

  public function manage_index($offset = 0) {

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
      $result = $this->popup_model->delete_popup($_POST['checked']);
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

    $data    = $this->popup_model->paging($offset, $per_page, 'Y', '', '', '');
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    $pagination_config['base_url']     = site_url('manager/popup/index');
    $pagination_config['total_rows']   = $numrows;
    $pagination_config['uri_segment']  = 4;
    $pagination_config['num_links']    = 5;
    $pagination_config['per_page']     = $per_page;
    $pagination_config['full_tag_open']  = '<div class="paging mt20"><div class="p_wrap">';
    $pagination_config['full_tag_close'] = '</div></div>';
    $this->pagination->initialize($pagination_config);

    if(empty($rows)){
      $tpl_vars['EMPTY'] = "<tr><td colspan='9' style='text-align:center;'>등록된 글이 없습니다.</td></tr>";
    } else {
      $tpl_vars['EMPTY'] = "";
    }

    $tpl_vars['ROWS']         = $rows;
    $tpl_vars['PAGINATION']   = $this->pagination->create_links();
    $tpl_vars['CURRENT_URL']  = current_url();

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("popup/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  public function manage_write($pop_id = ""){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $pop_type      = empty($_POST['pop_type'])     ? '' : $_POST['pop_type'];
    $pop_title     = empty($_POST['pop_title'])    ? '' : $_POST['pop_title'];
    $pop_contents  = empty($_POST['pop_contents']) ? '' : $_POST['pop_contents'];
    $pop_img       = empty($_POST['pop_img'])      ? '' : $_POST['pop_img'];
    $pop_start     = empty($_POST['pop_start'])    ? '' : $_POST['pop_start'];
    $pop_end       = empty($_POST['pop_end'])      ? '' : $_POST['pop_end'];
    $is_view       = empty($_POST['is_view'])      ? 'N' : $_POST['is_view'];
    $pop_order     = empty($_POST['pop_order'])    ? 0 : intval($_POST['pop_order']);
    if($pop_order == 0){
      $pop_order = $this->popup_model->get_max_order() + 1;
    }

    $tpl_vars['POP_ID']       = '';
    $tpl_vars['POP_TYPE']     = 'pop';
    $tpl_vars['POP_TITLE']    = '';
    $tpl_vars['POP_CONTENTS'] = '';
    $tpl_vars['POP_START']    = '';
    $tpl_vars['POP_END']      = '';
    $tpl_vars['IS_VIEW']      = 'N';
    $tpl_vars['POP_ORDER']    = 0;
    $tpl_vars['POP_IMG']      = '';

    if(!empty($_POST)){

      if(empty($pop_title)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "타이틀을 입력하세요.";
      }

      if(empty($tpl_vars['ERROR'])) {
        $result = $this->popup_model->set_popup(
          $pop_id, $pop_type, $pop_title, $pop_contents,
          $pop_img, '0', '0', $pop_start, $pop_end, $pop_order, $is_view, L_USR_ID
        );
        if($result){
          if(!empty($pop_img)){
            @copy(DATA_FILEPATH."/temp/".$pop_img, DATA_FILEPATH."/popup/".$pop_img);
            @unlink(DATA_FILEPATH."/temp/".$pop_img);
          }
          $tpl_vars['REDIRECT_URL'] = base_url()."index.php/manager/popup/index";
          $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
          $this->parser->parse('errors/redirect', $tpl_vars);
        } else {
          $tpl_vars['ERROR'] = "WA";
          $tpl_vars['ERROR_MESSAGE'] = "데이터베이스에서 오류가 발생하였습니다.";
        }
      }
    } else {
      if(!empty($pop_id)){
        $rows = $this->popup_model->get_popup('row', '*', $pop_id, '', 'Y');
        $rows = array_change_key_case($rows, CASE_UPPER);
        $tpl_vars = array_merge($tpl_vars, $rows);
      }
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("popup/write", $tpl_vars);
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

    if(empty($_POST['pop_id'])){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
      $this->parser->parse('errors/alert', $tpl_vars);
    } else {
      $result = $this->popup_model->delete_popup($_POST['pop_id']);
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

  public function manage_order(){
    if(!defined("L_USR_ID") || L_USR_ID != 'admin') {
      exit;
    }
    $pop_id = $_POST['pop_id'];
    $pop_order = $_POST['pop_order'];
    $this->popup_model->update_order($pop_id, $pop_order);
    echo json_encode(array('ERROR'=>'OK'));
  }
}

