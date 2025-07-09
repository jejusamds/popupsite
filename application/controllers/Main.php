<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Main
* @functions  redirect
* @functions  index
*/
class Main extends CI_Controller {

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

    $this->load->model('popup_model');
  }

  /*
  * MAIN
  *
  * author/date  kwchoi/20150601
  */
  public function index() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $this->load->model('board_model');
    $this->load->model('gallery_model');
    $this->load->model('diet_model');

    $tpl_vars['NOTICE_ROWS'] = array();
    $tpl_vars['DIET_ROWS'] = array();
    $tpl_vars['GALLERY_ROWS']  = array();

    $tpl_vars['NOTICE_ROWS']  = $this->board_model->recent_notice();
    $tpl_vars['DIET_ROWS']    = $this->diet_model->recent_diet();
    $tpl_vars['GALLERY_ROWS'] = $this->gallery_model->recent_gallery();

    foreach($tpl_vars['NOTICE_ROWS'] as $k => $v){
      $v['BASE_URL'] = base_url();
      $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
      $tpl_vars['NOTICE_ROWS'][$k] = $v;
    }
    foreach($tpl_vars['DIET_ROWS'] as $k => $v){
      $v['BASE_URL'] = base_url();
      $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
      $tpl_vars['DIET_ROWS'][$k] = $v;
    }
    foreach($tpl_vars['GALLERY_ROWS'] as $k => $v){
      $v['BASE_URL'] = base_url();
      $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
      $tpl_vars['GALLERY_ROWS'][$k] = $v;
    }

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("main/index", $tpl_vars);
  }
  
  function manage_index() {

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = "";
    $this->load->model('visit_logs_model');

    $tpl_vars['VISIT_COUNT']            = $this->visit_logs_model->get_visit_count('all');
    $tpl_vars['VISIT_COUNT_DAY']        = $this->visit_logs_model->get_visit_count('day_count');
    $tpl_vars['VISIT_COUNT_MONTH']      = $this->visit_logs_model->get_visit_count('month_count');

    $tpl_vars['HOUR_ROWS']          = $this->visit_logs_model->get_visit_count('hour');
    $tpl_vars['DAY_ROWS']           = $this->visit_logs_model->get_visit_count('day');
    $tpl_vars['MONTH_ROWS']         = $this->visit_logs_model->get_visit_count('month');

    foreach($tpl_vars['HOUR_ROWS'] as $k => $v){
      $hour_rows[] = $v['VISIT_COUNT'];
      $v['NUM'] = $k;
      $v['DATE'] = $v['DATE']."시";
      $tpl_vars['HOUR_ROWS'][$k] = $v;
    }
    $tpl_vars['HOUR_DATA'] = implode(", ", $hour_rows);

    foreach($tpl_vars['DAY_ROWS'] as $k => $v){
      $day_rows[] = $v['VISIT_COUNT'];
      $v['NUM'] = $k;
      $tpl_vars['DAY_ROWS'][$k] = $v;
    }
    $tpl_vars['DAY_DATA'] = implode(", ", $day_rows);

    foreach($tpl_vars['MONTH_ROWS'] as $k => $v){
      $month_rows[] = $v['VISIT_COUNT'];
      $v['NUM'] = $k;
      $tpl_vars['MONTH_ROWS'][$k] = $v;
    }
    $tpl_vars['MONTH_DATA'] = implode(", ", $month_rows);

    $tpl_vars['AGENT_ROWS']    = $this->visit_logs_model->get_agent_count($tpl_vars['VISIT_COUNT']);
    $tpl_vars['IP_ROWS']       = $this->visit_logs_model->get_ip_count($tpl_vars['VISIT_COUNT']);
    $tpl_vars['OS_ROWS']       = $this->visit_logs_model->get_os_count($tpl_vars['VISIT_COUNT']);
    $tpl_vars['REFERRER_ROWS'] = $this->visit_logs_model->get_referrer_count($tpl_vars['VISIT_COUNT']);

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("main/manage_index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

}
