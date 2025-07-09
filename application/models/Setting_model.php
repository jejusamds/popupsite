<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* Setting Model
*/
class Setting_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  /* 
  * GET SETTING
  *
  * 기본 설정을 가져온다.
  *
  * @params  string  select
  * @return  array  data
  * author/date  kwchoi/20150527
  */
  public function get_settings($select = '*') {

    $sql = "SELECT ".$select." FROM geumsa_settings";
    $query = $this->db->query($sql);
    $data = $query->row_array();
    $query->free_result();

    return $data;
  }


  public function set_settings($title_ko = '', $name_ko = '', $address_ko = '', 
                                 $title_en = '', $name_en = '', $address_en = '',
                                 $email = '', $owner = '', $regist_num = '', 
                                 $tel1_num = '', $tel2_num = '', $tel3_num = '',
                                 $tel4_num = '', $tel5_num = '', $fax_num = '',
                                 $email = '', $keyword = '', $description = ''
                               ) {

    if(!empty($tel1_num))      $this->db->set('set_tel1_num', $tel1_num);
    if(!empty($tel2_num))      $this->db->set('set_tel2_num', $tel2_num);
    if(!empty($tel3_num))      $this->db->set('set_tel3_num', $tel3_num);
    if(!empty($tel4_num))      $this->db->set('set_tel4_num', $tel4_num);
    if(!empty($tel5_num))      $this->db->set('set_tel5_num', $tel5_num);
    if(!empty($fax_num))       $this->db->set('set_fax_num',  $fax_num);

    if(!empty($email))         $this->db->set('set_email', $email);
    if(!empty($owner))         $this->db->set('set_owner', $owner);
    if(!empty($regist_num))    $this->db->set('set_regist_num', $regist_num);

    if(!empty($title_ko))      $this->db->set('set_title_ko', $title_ko);
    if(!empty($name_ko))       $this->db->set('set_name_ko', $name_ko);
    if(!empty($address_ko))    $this->db->set('set_address_ko', $address_ko);

    if(!empty($title_en))      $this->db->set('set_title_en', $title_en);
    if(!empty($name_en))       $this->db->set('set_name_en', $name_en);
    if(!empty($address_en))    $this->db->set('set_address_en', $address_en);

    if(!empty($description))   $this->db->set('set_description', $description);
    if(!empty($keyword))       $this->db->set('set_keyword', $keyword);

    return $this->db->update('geumsa_settings');
  }
}
