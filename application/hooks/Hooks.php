<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* Hooks
*
* @functions  define_logined  (session/user data define)
*/
class Hooks {

  /*
  * define & set template user data / manage session
  *
  * author/date  kwchoi/20150528
  */
  function define_logined(){

    //CI의 인스턴스를 가져온다
    $CI =& get_instance();
    $tpl_vars = array();

    if($CI->session->userdata('logined_usr_id')) {

      $usr_id = $CI->session->userdata('logined_usr_id');
      $usr_rows = $CI->user_model->get_usr_info('row', '*', $usr_id);

      if(empty($usr_rows)){

        $CI->session->set_userdata(array('logined_usr_id', ''));
        $CI->session->sess_destroy();

        $tpl_vars['L_USR_ID'] = '';
        $tpl_vars['L_USR_NAME'] =  '';
      } else {
        $tpl_vars['L_USR_ID'] =  $usr_id;
        $tpl_vars['L_USR_NAME'] =  $usr_rows['usr_name'];
      }

      //지정한 문자열을 상수처리
      foreach($tpl_vars as $k => $v){
        @define($k, $v);
      }

      $CI->parser->set_vars($tpl_vars, "");    //template parse
    }
//      $CI->output->enable_profiler(TRUE);

  }

  function define_strings(){

    //CI의 인스턴스를 가져온다
    $CI =& get_instance();

    $tpl_vars = array();

    $CI->load->helper('cookie');
    $CI->load->model('visit_logs_model');
    $CI->load->model('common_code_model');
    $CI->load->library('user_agent');
    $referrer = "";

    $sess_id = get_cookie("geumsa_sessions", TRUE);

    //referrer
    if ($CI->agent->is_referral()) {
      $referrer = $CI->agent->referrer();
    }

    //get agent
    if ($CI->agent->is_browser()){
      $agent = $CI->agent->browser().' '.$CI->agent->version();
    } elseif ($CI->agent->is_robot()) {
      $agent = $CI->agent->robot();
    } elseif ($CI->agent->is_mobile()){
      $agent = $CI->agent->mobile();
    } else {
      $agent = 'Unidentified User Agent';
    }

    $ip = $CI->input->ip_address();
    $os = $CI->agent->platform();;

    // 홈페이지 방문시에만 INSERT/UPDATE
    if(!empty($CI->uri->rsegments[1]) && $CI->uri->rsegments[1] == 'main'){
      $CI->visit_logs_model->set_visit_logs($sess_id, $agent, $ip, $os, $referrer);
    }

    $setting_rows = $CI->setting_model->get_settings();
    if(!empty($setting_rows)){
      $tpl_vars['TITLE']             = $setting_rows['set_title_ko'];
      $tpl_vars['TITLE_EN']          = $setting_rows['set_title_en'];
      $tpl_vars['COMPANY_NAME']      = $setting_rows['set_name_ko'];
      $tpl_vars['COMPANY_NAME_EN']   = $setting_rows['set_name_en'];
      $tpl_vars['DATA_FILEPATH']     = $setting_rows['set_attach_location'];
      $tpl_vars['DATA_FILEPATH_CKEDITOR']     = $setting_rows['set_ckeditor_location'];

      $tpl_vars['COMPANY_TEL1_NUM']   = $setting_rows['set_tel1_num'];
      $tpl_vars['COMPANY_TEL2_NUM']   = $setting_rows['set_tel2_num'];
      $tpl_vars['COMPANY_TEL3_NUM']   = $setting_rows['set_tel3_num'];
      $tpl_vars['COMPANY_TEL4_NUM']   = $setting_rows['set_tel4_num'];
      $tpl_vars['COMPANY_TEL5_NUM']   = $setting_rows['set_tel5_num'];

      $tpl_vars['COMPANY_FAX_NUM']    = $setting_rows['set_fax_num'];
      $tpl_vars['COMPANY_ADDRESS']    = $setting_rows['set_address_ko'];
      $tpl_vars['COMPANY_ADDRESS_EN'] = $setting_rows['set_address_en'];

      $tpl_vars['EMAIL']             = $setting_rows['set_email'];
      $tpl_vars['OWNER']             = $setting_rows['set_owner'];
      $tpl_vars['REGIST_NUM']        = $setting_rows['set_regist_num'];

      $tpl_vars['LANG_KO']           = "N";
      $tpl_vars['LANG_EN']           = "N";
      $tpl_vars['LANG_CN']           = "N";
      $tpl_vars['LANG_JP']           = "N";
    }

    $tpl_vars['PER_PAGE'] = 10;
    foreach($tpl_vars as $k => $v){
      @define($k, $v);
    }

    $CI->parser->set_vars($tpl_vars, "");    //template parse
  }
}
