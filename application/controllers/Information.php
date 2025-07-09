<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Information
* @functions  redirect
* @functions  index
*/
class Information extends CI_Controller {

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
  }

  public function departments() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("information/departments", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function medical_staff() {

    $this->load->model('medical_staff_model');

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $rows    = $this->medical_staff_model->get_medical_staff('rows');

    foreach($rows as $k => $v) {

      $v    = array_change_key_case($v, CASE_UPPER);
      $v['MS_HISTORY'] = nl2br($v['MS_HISTORY']);
      $v['BASE_URL'] = base_url();
      $rows[$k] = $v;
    }

    $tpl_vars['ROWS'] = $rows;
    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("information/medical_staff", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function outpatient_time() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("information/outpatient_time", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }


  public function hospitalization() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("information/hospitalization", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function patient_right() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("information/patient_right", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

}
