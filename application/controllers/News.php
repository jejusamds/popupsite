<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* News
* @functions  redirect
* @functions  index
*/
class News extends CI_Controller {

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

  public function index($type = '-', $value = '-', $offset = '0') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $new_icon = "<img src='".base_url()."img/ic_new.png' class='ml-2' style='position:relative; top:-2px;'>";

    $this->load->model('board_model');
    $this->load->library('pagination');
    $per_page          = 10;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $pagination_config['base_url'] = site_url('news/notice/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';
    else                       $value = urldecode($value);

    $data    = $this->board_model->paging($offset, $per_page, 'N', 'media_report', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    foreach($rows as $k => $v){

      if($v['IS_NEW'] == 'Y'){
        $v['IS_NEW'] = $new_icon;
      } else {
        $v['IS_NEW'] = "";
      }

      if($v['NOTICE_FLAG'] == 'Y'){
        $v['IS_NOTICE'] = "class='bg-lighter'";
        $v['ROWNUM']    = "Notice";
      } else {
        $v['IS_NOTICE'] = "";
      }

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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'bbs_contents';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("news/index", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function detail($bbs_id = '') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $this->load->model('board_model');

    if(!empty($bbs_id)) {
      $rows = $this->board_model->detail('media_report', $bbs_id);
      if(empty($rows)){
        $tpl_vars['ERROR_MESSAGE'] = '잘못된 접근입니다.';
        $this->parser->parse('errors/goback', $tpl_vars);
      } else {
        if(!empty($rows['PREV_TITLE'])){
          $rows['PREV'] = '<div class="col-12 p-0">
                             <hr>
                           </div>
                           <div class="col-3 col-md-2 col-lg-1 mb-2">
                             <h6> ▲이전글</h6>
                           </div>
                           <div class="col-9 col-md-10 col-lg-11 mb-2">
                             <h6 class="mb-0">
                               <a href="'.base_url().'index.php/news/detail/'.$rows['PREV_ID'].'">
                                 '.$rows['PREV_TITLE'].'
                               </a>
                             </h6>
                           </div>
                          ';
        } else {
          $rows['PREV'] = "";
        }

        if(!empty($rows['NEXT_TITLE'])){
          $rows['NEXT'] = '<div class="col-12 p-0">
                             <hr>
                           </div>
                           <div class="col-3 col-md-2 col-lg-1 mb-2">
                             <h6> ▼다음글</h6>
                           </div>
                           <div class="col-9 col-md-10 col-lg-11 mb-2">
                             <h6 class="mb-0">
                               <a href="'.base_url().'index.php/news/detail/'.$rows['NEXT_ID'].'">
                                 '.$rows['NEXT_TITLE'].'
                               </a>
                             </h6>
                           </div>
                          ';
        } else {
          $rows['NEXT'] = '';
        }

        $tpl_vars = array_merge($rows, $tpl_vars);
      }
    } else {
      $tpl_vars['ERROR_MESSAGE'] = '잘못된 접근입니다.';
      $this->parser->parse('errors/goback', $tpl_vars);      
    }

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("news/detail", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function notice($type = '-', $value = '-', $offset = '0') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $new_icon = "<img src='".base_url()."img/ic_new.png' class='ml-2' style='position:relative; top:-2px;'>";

    $this->load->model('board_model');
    $this->load->library('pagination');
    $per_page          = 10;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $pagination_config['base_url'] = site_url('news/notice/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';
    else                       $value = urldecode($value);

    $data    = $this->board_model->paging($offset, $per_page, 'N', 'notice', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    foreach($rows as $k => $v){

      if($v['IS_NEW'] == 'Y'){
        $v['IS_NEW'] = $new_icon;
      } else {
        $v['IS_NEW'] = "";
      }

      if($v['NOTICE_FLAG'] == 'Y'){
        $v['IS_NOTICE'] = "class='bg-lighter'";
        $v['ROWNUM']    = "Notice";
      } else {
        $v['IS_NOTICE'] = "";
      }

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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'bbs_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("news/notice", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }


  public function notice_detail($bbs_id = '') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $this->load->model('board_model');

    if(!empty($bbs_id)) {
      $rows = $this->board_model->detail('notice', $bbs_id);
      if(empty($rows)){
        $tpl_vars['ERROR_MESSAGE'] = '잘못된 접근입니다.';
        $this->parser->parse('errors/goback', $tpl_vars);
      } else {
        if(!empty($rows['PREV_TITLE'])){
          $rows['PREV'] = '<div class="col-12 p-0">
                             <hr>
                           </div>
                           <div class="col-3 col-md-2 col-lg-1 mb-2">
                             <h6> ▲이전글</h6>
                           </div>
                           <div class="col-9 col-md-10 col-lg-11 mb-2">
                             <h6 class="mb-0">
                               <a href="'.base_url().'index.php/news/notice_detail/'.$rows['PREV_ID'].'">
                                 '.$rows['PREV_TITLE'].'
                               </a>
                             </h6>
                           </div>
                          ';
        } else {
          $rows['PREV'] = "";
        }

        if(!empty($rows['NEXT_TITLE'])){
          $rows['NEXT'] = '<div class="col-12 p-0">
                             <hr>
                           </div>
                           <div class="col-3 col-md-2 col-lg-1 mb-2">
                             <h6> ▼다음글</h6>
                           </div>
                           <div class="col-9 col-md-10 col-lg-11 mb-2">
                             <h6 class="mb-0">
                               <a href="'.base_url().'index.php/news/notice_detail/'.$rows['NEXT_ID'].'">
                                 '.$rows['NEXT_TITLE'].'
                               </a>
                             </h6>
                           </div>
                          ';
        } else {
          $rows['NEXT'] = '';
        }

        $tpl_vars = array_merge($rows, $tpl_vars);
      }
    } else {
      $tpl_vars['ERROR_MESSAGE'] = '잘못된 접근입니다.';
      $this->parser->parse('errors/goback', $tpl_vars);      
    }

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("news/notice_detail", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function diet($type = '-', $value = '-', $offset = '0') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $new_icon = "<img src='".base_url()."img/ic_new.png' class='ml-2' style='position:relative; top:-2px;'>";

    $this->load->model('diet_model');
    $this->load->library('pagination');
    $per_page          = 10;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $pagination_config['base_url'] = site_url('news/welfare/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';
    else                       $value = urldecode($value);

    $data    = $this->diet_model->paging($offset, $per_page, 'N', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    foreach($rows as $k => $v){

      if($v['IS_NEW'] == 'Y'){
        $v['IS_NEW'] = $new_icon;
      } else {
        $v['IS_NEW'] = "";
      }

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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'diet_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("news/diet", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function diet_detail($bbs_id = '') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $this->load->model('diet_model');

    if(!empty($bbs_id)) {
      $rows = $this->diet_model->detail($bbs_id);
      if(empty($rows)){
        $tpl_vars['ERROR_MESSAGE'] = '잘못된 접근입니다.';
        $this->parser->parse('errors/goback', $tpl_vars);
      } else {

        $rows['MON1'] = nl2br($rows['MON1']);
        $rows['TUE1'] = nl2br($rows['TUE1']);
        $rows['WED1'] = nl2br($rows['WED1']);
        $rows['THU1'] = nl2br($rows['THU1']);
        $rows['FRI1'] = nl2br($rows['FRI1']);
        $rows['SAT1'] = nl2br($rows['SAT1']);
        $rows['SUN1'] = nl2br($rows['SUN1']);
        $rows['MON2'] = nl2br($rows['MON2']);
        $rows['TUE2'] = nl2br($rows['TUE2']);
        $rows['WED2'] = nl2br($rows['WED2']);
        $rows['THU2'] = nl2br($rows['THU2']);
        $rows['FRI2'] = nl2br($rows['FRI2']);
        $rows['SAT2'] = nl2br($rows['SAT2']);
        $rows['SUN2'] = nl2br($rows['SUN2']);
        $rows['MON3'] = nl2br($rows['MON3']);
        $rows['TUE3'] = nl2br($rows['TUE3']);
        $rows['WED3'] = nl2br($rows['WED3']);
        $rows['THU3'] = nl2br($rows['THU3']);
        $rows['FRI3'] = nl2br($rows['FRI3']);
        $rows['SAT3'] = nl2br($rows['SAT3']);
        $rows['SUN3'] = nl2br($rows['SUN3']);

        if(!empty($rows['PREV_TITLE'])){
          $rows['PREV'] = '<div class="col-12 p-0">
                             <hr>
                           </div>
                           <div class="col-3 col-md-2 col-lg-1 mb-2">
                             <h6> ▲이전글</h6>
                           </div>
                           <div class="col-9 col-md-10 col-lg-11 mb-2">
                             <h6 class="mb-0">
                               <a href="'.base_url().'index.php/news/diet_detail/'.$rows['PREV_ID'].'">
                                 '.$rows['PREV_TITLE'].'
                               </a>
                             </h6>
                           </div>
                          ';
        } else {
          $rows['PREV'] = "";
        }

        if(!empty($rows['NEXT_TITLE'])){
          $rows['NEXT'] = '<div class="col-12 p-0">
                             <hr>
                           </div>
                           <div class="col-3 col-md-2 col-lg-1 mb-2">
                             <h6> ▼다음글</h6>
                           </div>
                           <div class="col-9 col-md-10 col-lg-11 mb-2">
                             <h6 class="mb-0">
                               <a href="'.base_url().'index.php/news/diet_detail/'.$rows['NEXT_ID'].'">
                                 '.$rows['NEXT_TITLE'].'
                               </a>
                             </h6>
                           </div>
                          ';
        } else {
          $rows['NEXT'] = '';
        }

        $tpl_vars = array_merge($rows, $tpl_vars);
      }
    } else {
      $tpl_vars['ERROR_MESSAGE'] = '잘못된 접근입니다.';
      $this->parser->parse('errors/goback', $tpl_vars);      
    }

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("news/diet_detail", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }


  public function welfare($type = '-', $value = '-', $offset = '0') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $new_icon = "<img src='".base_url()."img/ic_new.png' class='ml-2' style='position:relative; top:-2px;'>";

    $this->load->model('welfare_model');
    $this->load->library('pagination');
    $per_page          = 10;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $pagination_config['base_url'] = site_url('news/welfare/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';
    else                       $value = urldecode($value);

    $data    = $this->welfare_model->paging($offset, $per_page, 'N', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    foreach($rows as $k => $v){

      if($v['IS_NEW'] == 'Y'){
        $v['IS_NEW'] = $new_icon;
      } else {
        $v['IS_NEW'] = "";
      }

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
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'wel_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("news/welfare", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function welfare_detail($bbs_id = '') {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";
    $this->load->model('welfare_model');
    $this->load->model('welfare_gallery_model');

    $tpl_vars['GALLERY_ROWS'] = $this->welfare_gallery_model->recent_gallery();
    foreach($tpl_vars['GALLERY_ROWS'] as $k => $v){
      $v['BASE_URL'] = base_url();
      $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
      $tpl_vars['GALLERY_ROWS'][$k] = $v;
    }

    if(!empty($bbs_id)) {
      $rows = $this->welfare_model->detail($bbs_id);
      if(empty($rows)){
        $tpl_vars['ERROR_MESSAGE'] = '잘못된 접근입니다.';
        $this->parser->parse('errors/goback', $tpl_vars);
      } else {
        $rows['MON'] = nl2br($rows['MON']);
        $rows['TUE'] = nl2br($rows['TUE']);
        $rows['WED'] = nl2br($rows['WED']);
        $rows['THU'] = nl2br($rows['THU']);
        $rows['FRI'] = nl2br($rows['FRI']);
        $rows['SAT'] = nl2br($rows['SAT']);
        $rows['SUN'] = nl2br($rows['SUN']);

        if(!empty($rows['PREV_TITLE'])){
          $rows['PREV'] = '<div class="col-12 p-0">
                             <hr>
                           </div>
                           <div class="col-3 col-md-2 col-lg-1 mb-2">
                             <h6> ▲이전글</h6>
                           </div>
                           <div class="col-9 col-md-10 col-lg-11 mb-2">
                             <h6 class="mb-0">
                               <a href="'.base_url().'index.php/news/welfare_detail/'.$rows['PREV_ID'].'">
                                 '.$rows['PREV_TITLE'].'
                               </a>
                             </h6>
                           </div>
                          ';
        } else {
          $rows['PREV'] = "";
        }

        if(!empty($rows['NEXT_TITLE'])){
          $rows['NEXT'] = '<div class="col-12 p-0">
                             <hr>
                           </div>
                           <div class="col-3 col-md-2 col-lg-1 mb-2">
                             <h6> ▼다음글</h6>
                           </div>
                           <div class="col-9 col-md-10 col-lg-11 mb-2">
                             <h6 class="mb-0">
                               <a href="'.base_url().'index.php/news/welfare_detail/'.$rows['NEXT_ID'].'">
                                 '.$rows['NEXT_TITLE'].'
                               </a>
                             </h6>
                           </div>
                          ';
        } else {
          $rows['NEXT'] = '';
        }

        $tpl_vars = array_merge($rows, $tpl_vars);
      }
    } else {
      $tpl_vars['ERROR_MESSAGE'] = '잘못된 접근입니다.';
      $this->parser->parse('errors/goback', $tpl_vars);      
    }

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("news/welfare_detail", $tpl_vars);
  }


  public function welfare_gallery($type = '-', $value = '-', $offset = '0') {

    $this->load->model('welfare_gallery_model');
    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->load->library('pagination');
    $per_page          = 9;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $pagination_config['base_url'] = site_url('news/welfare_gallery/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';
    else                       $value = urldecode($value);

    $data    = $this->welfare_gallery_model->paging($offset, $per_page, 'Y', '', $type, $value);
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
    $this->parser->parse("news/welfare_gallery", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }


}
