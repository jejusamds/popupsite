<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* User Model
* @functions  get_usr_info
* @functions  get_login_log
* @functions  set_login_log
*/
class User_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  /* 
  * GET USER INFO WHERE USER ID
  *
  * 특정 사용자 정보를 가져온다.
  *
  * @params  string  row_type
  * @params  string  select
  * @params  string  usr_id
  * @return  array  data
  * author/date  kwchoi/20150521
  */
  public function get_usr_info($row_type = 'row', $select = '*', $usr_id = '', $usr_name = '') {

    $sql = "SELECT ".$select." FROM geumsa_users U
            WHERE 1 ";

    if(!empty($usr_id)){
      $sql .= " AND U.usr_id = ".$this->db->escape($usr_id);
    }

    if(!empty($usr_name)){
      $sql .= " AND U.usr_name like '%".$usr_name."%' ";
    }

    $sql .= " ORDER BY U.usr_sort, U.usr_name, U.usr_id DESC ";

    $query = $this->db->query($sql);
    if($row_type == 'row'){
      $data = $query->row_array();
    } else {
      $data = $query->result_array();
    }

    $query->free_result();
    return $data;
  }

  public function set_passwd($passwd, $usr_id){

    if(empty($passwd)){
      return false;
    }

    $this->db->where('usr_id', $usr_id);
    $this->db->set('usr_passwd', $passwd);
    return $this->db->update('geumsa_users');
  }

  public function get_count($role_type, $use_type, $type, $value){

    $numrows = 0;

    if($type != '' && $value != ''){
      $this->db->like($type, $value);
    }

    if($role_type != ''){
      $this->db->where('usr_role_code', $use_type);
    }

    if($use_type != ''){
      $this->db->where('usr_use_flag', $use_type);
    }

    return $this->db->count_all_results("geumsa_users");
  }


  public function manage_paging($offset = 0, $per_page, $role_type, $use_type, $type, $value){

    $numrows = 0;
    $rows = array();
    $numrows = $this->get_count($role_type, $use_type, $type, $value);

    $this->db->query("SET @RNUM:=($numrows-$offset)+1");
    $sql = "SELECT @RNUM:=@RNUM-1 AS ROWNUM, ROWS.*  FROM (
              SELECT 
                U.usr_id ID,
                U.usr_name NAME,
                U.usr_role_code ROLE,
                U.usr_type_code TYPE,
                U.usr_tel_num TEL,
                U.usr_phone_num PHONE,
                U.usr_gender GENDER,
                U.usr_status STAT,
                U.usr_use_flag USE_FLAG,
                U.usr_sort SORT,
                U.usr_rank RANK,
                U.created CREATED,
                U.updated UPDATED
              FROM geumsa_users U 
              WHERE 1 ";

    if($role_type != ''){
      $sql .= " AND U.usr_role_code = ".$this->db->escape((String) $role_type);
    }

    if($use_type != ''){
      $sql .= " AND U.usr_use_flag = ".$this->db->escape((String) $use_type);
    }

    if($type != '' && $value != ''){
      $sql .= " AND U.$type = ".$this->db->escape((String) $value);
    }

    $sql .= " ORDER BY U.usr_sort, U.usr_name, U.usr_id DESC
              LIMIT $per_page OFFSET $offset ) ROWS ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return array(
      'numrows' => $numrows,
      'rows' => $rows
    );
  }
}
