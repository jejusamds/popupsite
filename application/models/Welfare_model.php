<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welfare_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  public function get_welfare($row_type = 'row', $select = '*', $wel_id = '') {

    $sql = "SELECT B.*, U.usr_name FROM geumsa_welfare B
            LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
            WHERE 1 ";

    if(!empty($wel_id)){
      $sql .= " AND B.wel_id = ".$this->db->escape($wel_id);
    }

    $sql .= " ORDER BY B.wel_id DESC ";

    $query = $this->db->query($sql);
    if($row_type == 'row'){
      $data = $query->row_array();
    } else {
      $data = $query->result_array();
    }

    $query->free_result();
    return $data;
  }

  function set_welfare($wel_id = '', $wel_title = '', $wel_mon = '', $wel_tue = '', $wel_wed = '',
                       $wel_thu = '', $wel_fri = '', $wel_sat = '', $wel_sun = '', $usr_id = ''
                      ) {

      $this->db->set('wel_title', $wel_title);
      $this->db->set('wel_mon', $wel_mon);
      $this->db->set('wel_tue', $wel_tue);
      $this->db->set('wel_wed', $wel_wed);
      $this->db->set('wel_thu', $wel_thu);
      $this->db->set('wel_fri', $wel_fri);
      $this->db->set('wel_sat', $wel_sat);
      $this->db->set('wel_sun', $wel_sun);
      $this->db->set('usr_id', $usr_id);

    if(empty($wel_id)){
      return $this->db->insert('geumsa_welfare');
    } else {
      $this->db->where('wel_id', $wel_id);
      $this->db->set('updated', 'NOW()', FALSE);
      return $this->db->update('geumsa_welfare');
    }
  }

  public function get_count($type = '', $value = ''){

    $numrows = 0;
    $this->db->where("is_delete", "N");

    if($type != '' && $value != ''){
      $this->db->like($type, $value);
    }

    return $this->db->count_all_results("geumsa_welfare");
  }

  function delete_welfare($id = array()){
    if(is_array($id)){
      $this->db->where_in("wel_id", $id);
    } else {
      $this->db->where("wel_id", $id);
    }
    $this->db->set("is_delete", "Y");
    return $this->db->update("geumsa_welfare");
  }

  public function paging($offset = 0, $per_page, $is_admin = 'Y', $type = '', $value = ''){

    $numrows = 0;
    $rows = array();
    $numrows = $this->get_count($type, $value);

    $this->db->query("SET @RNUM:=($numrows-$offset)+1");
    $sql = "SELECT @RNUM:=@RNUM-1 AS ROWNUM, ROWS.*  FROM (
              SELECT
                B.wel_id               ID,
                B.wel_title            TITLE,
                B.wel_mon              MON,
                B.wel_tue              TUE,
                B.wel_wed              WED,
                B.wel_thu              THU,
                B.wel_fri              FRI,
                B.wel_sat              SAT,
                B.wel_sun              SUN,
                B.usr_id               USR_ID,
                U.usr_name             USR_NAME,
                B.wel_views            VIEWS,
                IF(DATE_ADD(B.created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW,
                DATE_FORMAT(B.created, '%y-%m-%d')        DATE,
                B.created              DATETIME
              FROM geumsa_welfare B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N'  ";

    if($is_admin != 'Y'){
    }

    if($type != '' && $value != ''){
      $sql .= " AND B.$type LIKE '%".$this->db->escape_like_str((String) $value)."%' ";
    }

    $sql .= " ORDER BY B.wel_id DESC
              LIMIT $per_page OFFSET $offset ) ROWS ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return array(
      'numrows' => $numrows,
      'rows' => $rows
    );
  }

  function set_views($wel_id){
    $this->db->where('wel_id', $wel_id);
    $this->db->set('wel_views', 'wel_views + 1', FALSE);
    return $this->db->update('geumsa_welfare');
  }


  function detail($wel_id = ''){

    $sql   = "SELECT  
                B.wel_id               ID,
                B.wel_title            WEL_TITLE,
                B.wel_mon              MON,
                B.wel_tue              TUE,
                B.wel_wed              WED,
                B.wel_thu              THU,
                B.wel_fri              FRI,
                B.wel_sat              SAT,
                B.wel_sun              SUN,
                B.usr_id               USR_ID,
                U.usr_name             USR_NAME,
                B.wel_views            VIEWS,
                IF(DATE_ADD(B.created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW,
                DATE_FORMAT(B.created, '%y-%m-%d')        DATE,
                B.created              DATETIME
              FROM geumsa_welfare B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N'
              AND   B.wel_id = ?
              LIMIT 1 ";

    $query = $this->db->query($sql, array($wel_id));
    $rows  = $query->row_array();
    $query->free_result();

     $sql = "SELECT  
                B.wel_id            NEXT_ID,
                B.wel_title         NEXT_TITLE,
                U.usr_name          NEXT_USR_NAME
              FROM geumsa_welfare B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N' 
              AND   B.wel_id > ?
              ORDER BY B.wel_id ASC
              LIMIT 1 ";

    $query = $this->db->query($sql, array($wel_id));
    $_rows = array();
    $_rows  = $query->row_array();
    if(!empty($rows) && !empty($_rows)){
      $rows = array_merge($rows, $_rows);
    }
    $query->free_result();

     $sql = "SELECT   
                B.wel_id            PREV_ID,
                B.wel_title         PREV_TITLE,
                U.usr_name          PREV_USR_NAME
              FROM geumsa_welfare B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N' 
              AND   B.wel_id < ?
              ORDER BY B.wel_id DESC
              LIMIT 1 ";

    $query = $this->db->query($sql, array($wel_id));
    $_rows = array();
    $_rows  = $query->row_array();
    if(!empty($rows) && !empty($_rows)){
      $rows = array_merge($rows, $_rows);
    }
    $query->free_result();

    return $rows;
  }
}
