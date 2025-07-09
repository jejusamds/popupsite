<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Howtouse
* @functions  redirect
* @functions  index
*/
class Howtouse extends CI_Controller {

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

  public function map() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("howtouse/map", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function floor_info() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("howtouse/floor_info", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function meet_info() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("howtouse/meet_info", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }


  public function certificate() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("howtouse/certificate", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function unpaid() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->load->model('unpaid_model');
    $room_rows = $this->unpaid_model->detail("상급병실치료차액");
    $phar_rows  = $this->unpaid_model->detail("약제및 치료재료");
    $cert_rows  = $this->unpaid_model->detail("제증명 수수료");

    $tpl_vars['ROOM_ROWS'] = $room_rows;
    $tpl_vars['PHAR_ROWS'] = $phar_rows;
    $tpl_vars['CERT_ROWS'] = $cert_rows;

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("howtouse/unpaid", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }
/*
  public function funeral() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->load->model('funeral_model');
    $data    = $this->funeral_model->get_funeral();
    $data    = array_change_key_case($data, CASE_UPPER);

    $tpl_vars     = array_merge($data, $tpl_vars);

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("howtouse/funeral", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }
*/

  public function funeral($type = '-', $value = '-', $offset = '0') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->load->model('funeral_gallery_model');
    $this->load->library('pagination');
    $per_page          = 6;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $pagination_config['base_url'] = site_url('howtouse/funeral/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';
    else                       $value = urldecode($value);

    $data    = $this->funeral_gallery_model->paging($offset, $per_page, 'Y', '', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    foreach($rows as $k => $v){

      $v['BASE_URL'] = base_url();
      $rows[$k] = $v;
    }

    //pagination config
    $pagination_config['total_rows']     = $numrows;
    $pagination_config['uri_segment']    = 5;
    $pagination_config['num_links']      = 5;
    $pagination_config['per_page']       = $per_page;
    $pagination_config['full_tag_open']  = '<div class="paging"><div class="p_wrap">';
    $pagination_config['full_tag_close'] = '</div></div>';
    $this->pagination->initialize($pagination_config);

    if(empty($rows)){
      $tpl_vars['EMPTY'] = "<tr class='bg-light'><td colspan='4' style='text-align:center;'>등록된 글이 없습니다.</td></tr>";
    } else {
      $tpl_vars['EMPTY'] = "";
    }

    $this->load->model('funeral_model');
    $data    = $this->funeral_model->get_funeral();
    $data    = array_change_key_case($data, CASE_UPPER);
    $tpl_vars     = array_merge($data, $tpl_vars);

    $tpl_vars['ROWS']         = $rows;
    $tpl_vars['SEARCH_VALUE'] = $value;
    $tpl_vars['PAGINATION']   = $this->pagination->create_links();
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'gbbs_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;


    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("howtouse/funeral", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }



}
