<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Introduce
* @functions  redirect
* @functions  index
*/
class Introduce extends CI_Controller {

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

  /*
  * Introduce
  * author/date  kwchoi
  */
  public function index() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("introduce/index", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function vision() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("introduce/vision", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function history() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("introduce/history", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }


  public function preview($type = '-', $value = '-', $offset = '0') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->load->model('gallery_model');
    $this->load->library('pagination');
    $per_page          = 9;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $pagination_config['base_url'] = site_url('introduce/preview/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';
    else                       $value = urldecode($value);

    $data    = $this->gallery_model->paging($offset, $per_page, 'Y', '', $type, $value);
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

    $tpl_vars['ROWS']         = $rows;
    $tpl_vars['SEARCH_VALUE'] = $value;
    $tpl_vars['PAGINATION']   = $this->pagination->create_links();
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'gbbs_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;


    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("introduce/preview", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function organization() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("introduce/organization", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function supporters() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("introduce/supporters", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }


}
