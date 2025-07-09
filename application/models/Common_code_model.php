<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* Setting Model
*/
class Common_code_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  /* 
  * GET CODES
  *
  * 기본 코드 가져오기
  *
  * @params  string  select
  * @params  string  category
  * @params  string  category_sub
  * @params  string  code
  * @return  array   data
  * author/date  kwchoi/20161128
  */
  public function get_common_codes($select = '*', $category = '', $category_sub = '', $code = '') {

    $sql = "SELECT ".$select." FROM geumsa_common_codes 
            WHERE 1";

    if(!empty($category)){
      $sql .= " AND cc_category = ".$this->db->escape($category);
    }

    if(!empty($category_sub)){
      $sql .= " AND cc_category_sub = ".$this->db->escape($category_sub);
    }

    if(!empty($code)){
      $sql .= " AND cc_code like '$code' ";
    }

    $query = $this->db->query($sql);
    $data = $query->result_array();
    $query->free_result();

    return $data;
  }


  public function set_common_codes($category, $category_sub, $code, $name, $memo){
    $this->db->set('cc_category', $category);
    $this->db->set('cc_category_sub', $category_sub);
    $this->db->set('cc_code', $category);
    $this->db->set('cc_name', $category);
    $this->db->set('cc_comment', $category);

    return $this->db->insert('geumsa_common_codes');
  }
}
