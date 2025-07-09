<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* Medical staff Model
* @functions  get_medical_staff
* @functions  set_medical_staff
* @functions  paging
*/
class Medical_staff_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  public function get_medical_staff($row_type = 'row', $select = '*', $ms_id = '') {

    $sql = "SELECT B.*, U.usr_name FROM geumsa_medical_staff B
            LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
            WHERE B.is_delete = 'N' ";

    if(!empty($ms_id)){
      $sql .= " AND B.ms_id = ".$this->db->escape($ms_id);
    }

    $sql .= " ORDER BY B.ms_id ASC ";

    $query = $this->db->query($sql);
    if($row_type == 'row'){
      $data = $query->row_array();
    } else {
      $data = $query->result_array();
    }

    $query->free_result();
    return $data;
  }

  function set_medical_staff($ms_id = '', $ms_part, $ms_name, $ms_rank, $ms_history, $usr_id) {

      $this->db->set('ms_part', $ms_part);
      $this->db->set('ms_name', $ms_name);
      $this->db->set('ms_rank', $ms_rank);
      $this->db->set('ms_history', $ms_history);
      $this->db->set('usr_id', $usr_id);

    if(empty($ms_id)){
      return $this->db->insert('geumsa_medical_staff');
    } else {
      $this->db->where('ms_id', $ms_id);
      $this->db->set('updated', 'NOW()', FALSE);
      return $this->db->update('geumsa_medical_staff');
    }
  }

  public function get_count($type = '', $value = ''){

    $numrows = 0;
    $this->db->where("is_delete", "N");

    if($type != '' && $value != ''){
      $this->db->like($type, $value);
    }

    return $this->db->count_all_results("geumsa_medical_staff");
  }

  function delete_medical_staff($id = array()){

    if(is_array($id)){
      $this->db->where_in("ms_id", $id);
    } else {
      $this->db->where("ms_id", $id);
    }

    $this->db->set("is_delete", "Y");
    return $this->db->update("geumsa_medical_staff");
  }

  public function paging($offset = 0, $per_page, $is_admin = 'Y', $type = '', $value = ''){

    $numrows = 0;
    $rows = array();
    $numrows = $this->get_count($type, $value);

    $this->db->query("SET @RNUM:=($numrows-$offset)+1");
    $sql = "SELECT @RNUM:=@RNUM-1 AS ROWNUM, ROWS.*  FROM (
              SELECT
                B.ms_id                 ID,
                B.ms_part               PART,
                B.ms_name               NAME,
                B.ms_rank               RANK,
                B.ms_history            HISTORY,
                B.usr_id                USR_ID,
                U.usr_name              USR_NAME,
                B.created               DATE
              FROM geumsa_medical_staff B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N'  ";

    if($type != '' && $value != ''){
      $sql .= " AND B.$type = ".$this->db->escape((String) $value);
    }

    $sql .= " ORDER BY B.ms_id DESC
              LIMIT $per_page OFFSET $offset ) ROWS ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return array(
      'numrows' => $numrows,
      'rows' => $rows
    );
  }

  function set_views($ms_id){
    $this->db->where('ms_id', $ms_id);
    $this->db->set('ms_views', 'ms_views + 1', FALSE);
    return $this->db->update('geumsa_medical_staff');
  }

  function detail($type = ''){

    $sql = "SELECT
                ms_id                MS_ID,
                ms_part              PART,
                ms_name              NAME,
                ms_rank              RANK,
                ms_history           HISTORY
              FROM geumsa_medical_staff
              WHERE is_delete = 'N'
           ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return $rows;
  }
}
