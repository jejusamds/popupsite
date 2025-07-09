<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* User Model
* @functions  get_unpaid
* @functions  set_unpaid
* @functions  paging
*/
class Unpaid_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  public function get_unpaid($row_type = 'row', $select = '*', $unp_id = '', $unp_type = '') {

    $sql = "SELECT B.*, U.usr_name FROM geumsa_unpaid B
            LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
            WHERE 1 ";

    if(!empty($unp_id)){
      $sql .= " AND B.unp_id = ".$this->db->escape($unp_id);
    }

    if(!empty($unp_type)){
      $sql .= " AND B.unp_type = ".$this->db->escape($unp_type);
    }

    $sql .= " ORDER BY B.unp_id DESC ";

    $query = $this->db->query($sql);
    if($row_type == 'row'){
      $data = $query->row_array();
    } else {
      $data = $query->result_array();
    }

    $query->free_result();
    return $data;
  }

  function set_unpaid($unp_id = '', $unp_type = '', $unp_category, $unp_category_detail, 
                      $unp_unit, $unp_price, $unp_memo, $usr_id) {

      $this->db->set('unp_category', $unp_category);
      $this->db->set('unp_category_detail', $unp_category_detail);
      $this->db->set('unp_unit', $unp_unit);
      $this->db->set('unp_price', $unp_price);
      $this->db->set('unp_memo', $unp_memo);
      $this->db->set('usr_id', $usr_id);

    if(empty($unp_id)){
      $this->db->set('unp_type', $unp_type);
      return $this->db->insert('geumsa_unpaid');
    } else {
      $this->db->where('unp_id', $unp_id);
      $this->db->where('unp_type', $unp_type);
      $this->db->set('updated', 'NOW()', FALSE);
      return $this->db->update('geumsa_unpaid');
    }
  }

  public function get_count($type = '', $value = ''){

    $numrows = 0;
    $this->db->where("is_delete", "N");

    if($type != '' && $value != ''){
      $this->db->like($type, $value);
    }

    return $this->db->count_all_results("geumsa_unpaid");
  }

  function delete_unpaid($id = array()){
    if(is_array($id)){
      $this->db->where_in("unp_id", $id);
    } else {
      $this->db->where("unp_id", $id);
    }
    $this->db->set("is_delete", "Y");
    return $this->db->update("geumsa_unpaid");
  }

  public function paging($offset = 0, $per_page, $is_admin = 'Y', $type = '', $value = ''){

    $numrows = 0;
    $rows = array();
    $numrows = $this->get_count($type, $value);

    $this->db->query("SET @RNUM:=($numrows-$offset)+1");
    $sql = "SELECT @RNUM:=@RNUM-1 AS ROWNUM, ROWS.*  FROM (
              SELECT
                B.unp_id                ID,
                B.unp_type              TYPE,
                B.unp_category          CATEGORY,
                B.unp_category_detail   CATEGORY_DETAIL,
                B.unp_unit              UNIT,
                B.unp_price             PRICE,
                B.unp_memo              MEMO,
                B.usr_id                USR_ID,
                U.usr_name              USR_NAME,
                B.created               DATE
              FROM geumsa_unpaid B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N'  ";

    if($type != '' && $value != ''){
      $sql .= " AND B.$type = ".$this->db->escape((String) $value);
    }

    $sql .= " ORDER BY B.unp_id DESC
              LIMIT $per_page OFFSET $offset ) ROWS ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return array(
      'numrows' => $numrows,
      'rows' => $rows
    );
  }

  function set_views($unp_id){
    $this->db->where('unp_id', $unp_id);
    $this->db->set('unp_views', 'unp_views + 1', FALSE);
    return $this->db->update('geumsa_unpaid');
  }

  function detail($type = ''){

    $sql = "SELECT
                unp_id                UNP_ID,
                unp_type              TYPE,
                unp_category          CATEGORY,
                unp_category_detail   CATEGORY_DETAIL,
                unp_unit              UNIT,
                unp_price             PRICE,
                unp_memo              MEMO
              FROM geumsa_unpaid
              WHERE is_delete = 'N'
           ";

    if(!empty($type)){
      $sql .= "AND unp_type = ".$this->db->escape((String) $type);
    }

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return $rows;
  }
}
