<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diet_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  public function recent_diet(){
    $sql = "SELECT
              diet_id    ID,
              diet_title TITLE,
              IF(DATE_ADD(created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW
            FROM geumsa_diet
            WHERE is_delete = 'N'
            ORDER BY diet_id DESC LIMIT 4
           ";

    $query = $this->db->query($sql);
    $data = $query->result_array();
    $query->free_result();
    return $data;
  }

  public function get_diet($row_type = 'row', $select = '*', $diet_id = '') {

    $sql = "SELECT B.*, U.usr_name FROM geumsa_diet B
            LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
            WHERE 1 ";

    if(!empty($diet_id)){
      $sql .= " AND B.diet_id = ".$this->db->escape($diet_id);
    }

    $sql .= " ORDER BY B.diet_id DESC ";

    $query = $this->db->query($sql);
    if($row_type == 'row'){
      $data = $query->row_array();
    } else {
      $data = $query->result_array();
    }

    $query->free_result();
    return $data;
  }

  function set_diet($diet_id = '', $diet_title = '', $diet_mon_1 = '', $diet_mon_2 = '', $diet_mon_3 = '',
                      $diet_tue_1 = '', $diet_tue_2 = '', $diet_tue_3 = '',
                      $diet_wed_1 = '', $diet_wed_2 = '', $diet_wed_3 = '',
                      $diet_thu_1 = '', $diet_thu_2 = '', $diet_thu_3 = '',
                      $diet_fri_1 = '', $diet_fri_2 = '', $diet_fri_3 = '',
                      $diet_sat_1 = '', $diet_sat_2 = '', $diet_sat_3 = '',
                      $diet_sun_1 = '', $diet_sun_2 = '', $diet_sun_3 = '', $diet_origin = '', $usr_id = '') {

      $this->db->set('diet_title', $diet_title);
      $this->db->set('diet_mon_1', $diet_mon_1);
      $this->db->set('diet_mon_2', $diet_mon_2);
      $this->db->set('diet_mon_3', $diet_mon_3);
      $this->db->set('diet_tue_1', $diet_tue_1);
      $this->db->set('diet_tue_2', $diet_tue_2);
      $this->db->set('diet_tue_3', $diet_tue_3);
      $this->db->set('diet_wed_1', $diet_wed_1);
      $this->db->set('diet_wed_2', $diet_wed_2);
      $this->db->set('diet_wed_3', $diet_wed_3);
      $this->db->set('diet_thu_1', $diet_thu_1);
      $this->db->set('diet_thu_2', $diet_thu_2);
      $this->db->set('diet_thu_3', $diet_thu_3);
      $this->db->set('diet_fri_1', $diet_fri_1);
      $this->db->set('diet_fri_2', $diet_fri_2);
      $this->db->set('diet_fri_3', $diet_fri_3);
      $this->db->set('diet_sat_1', $diet_sat_1);
      $this->db->set('diet_sat_2', $diet_sat_2);
      $this->db->set('diet_sat_3', $diet_sat_3);
      $this->db->set('diet_sun_1', $diet_sun_1);
      $this->db->set('diet_sun_2', $diet_sun_2);
      $this->db->set('diet_sun_3', $diet_sun_3);
      $this->db->set('usr_id', $usr_id);
      $this->db->set('diet_origin', $diet_origin);

    if(empty($diet_id)){
      return $this->db->insert('geumsa_diet');
    } else {
      $this->db->where('diet_id', $diet_id);
      $this->db->set('updated', 'NOW()', FALSE);
      return $this->db->update('geumsa_diet');
    }
  }

  public function get_count($type = '', $value = ''){

    $numrows = 0;
    $this->db->where("is_delete", "N");

    if($type != '' && $value != ''){
      $this->db->like($type, $value);
    }

    return $this->db->count_all_results("geumsa_diet");
  }

  function delete_diet($id = array()){
    if(is_array($id)){
      $this->db->where_in("diet_id", $id);
    } else {
      $this->db->where("diet_id", $id);
    }
    $this->db->set("is_delete", "Y");
    return $this->db->update("geumsa_diet");
  }

  public function paging($offset = 0, $per_page, $is_admin = 'Y', $type = '', $value = ''){

    $numrows = 0;
    $rows = array();
    $numrows = $this->get_count($type, $value);

    $this->db->query("SET @RNUM:=($numrows-$offset)+1");
    $sql = "SELECT @RNUM:=@RNUM-1 AS ROWNUM, ROWS.*  FROM (
              SELECT
                B.diet_id               ID,
                B.diet_title            TITLE,
                B.diet_mon_1            MON_1,
                B.diet_mon_2            MON_2,
                B.diet_mon_3            MON_3,
                B.diet_tue_1            TUE_1,
                B.diet_tue_2            TUE_2,
                B.diet_tue_3            TUE_3,
                B.diet_wed_1            WED_1,
                B.diet_wed_2            WED_2,
                B.diet_wed_3            WED_3,
                B.diet_thu_1            THU_1,
                B.diet_thu_2            THU_2,
                B.diet_thu_3            THU_3,
                B.diet_fri_1            FRI_1,
                B.diet_fri_2            FRI_2,
                B.diet_fri_3            FRI_3,
                B.diet_sat_1            SAT_1,
                B.diet_sat_2            SAT_2,
                B.diet_sat_3            SAT_3,
                B.diet_sun_1            SUN_1,
                B.diet_sun_2            SUN_2,
                B.diet_sun_3            SUN_3,
                B.usr_id                USR_ID,
                U.usr_name              USR_NAME,
                B.diet_views             VIEWS,
                IF(DATE_ADD(B.created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW,
                DATE_FORMAT(B.created, '%y-%m-%d')        DATE,
                B.created               DATETIME
              FROM geumsa_diet B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N'  ";

    if($is_admin != 'Y'){
    }

    if($type != '' && $value != ''){
      $sql .= " AND B.$type LIKE '%".$this->db->escape_like_str((String) $value)."%' ";
    }

    $sql .= " ORDER BY B.diet_id DESC
              LIMIT $per_page OFFSET $offset ) ROWS ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return array(
      'numrows' => $numrows,
      'rows' => $rows
    );
  }

  function set_views($diet_id){
    $this->db->where('diet_id', $diet_id);
    $this->db->set('diet_views', 'diet_views + 1', FALSE);
    return $this->db->update('geumsa_diet');
  }


  function detail($diet_id = ''){

    $sql   = "SELECT  
                B.diet_id               ID,
                B.diet_title            DIET_TITLE,
                B.diet_mon_1            MON1,
                B.diet_mon_2            MON2,
                B.diet_mon_3            MON3,
                B.diet_tue_1            TUE1,
                B.diet_tue_2            TUE2,
                B.diet_tue_3            TUE3,
                B.diet_wed_1            WED1,
                B.diet_wed_2            WED2,
                B.diet_wed_3            WED3,
                B.diet_thu_1            THU1,
                B.diet_thu_2            THU2,
                B.diet_thu_3            THU3,
                B.diet_fri_1            FRI1,
                B.diet_fri_2            FRI2,
                B.diet_fri_3            FRI3,
                B.diet_sat_1            SAT1,
                B.diet_sat_2            SAT2,
                B.diet_sat_3            SAT3,
                B.diet_sun_1            SUN1,
                B.diet_sun_2            SUN2,
                B.diet_sun_3            SUN3,
                B.diet_origin           ORIGIN,
                B.usr_id                USR_ID,
                U.usr_name              USR_NAME,
                B.diet_views             VIEWS,
                IF(DATE_ADD(B.created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW,
                DATE_FORMAT(B.created, '%m')        DATE_MONTH,
                DATE_FORMAT(B.created, '%y-%m-%d')        DATE,
                B.created               DATETIME
              FROM geumsa_diet B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N'
              AND   B.diet_id = ?
              LIMIT 1 ";

    $query = $this->db->query($sql, array($diet_id));
    $rows  = $query->row_array();
    $query->free_result();

     $sql = "SELECT  
                B.diet_id            NEXT_ID,
                B.diet_title         NEXT_TITLE,
                U.usr_name          NEXT_USR_NAME
              FROM geumsa_diet B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N' 
              AND   B.diet_id > ?
              ORDER BY B.diet_id ASC
              LIMIT 1 ";

    $query = $this->db->query($sql, array($diet_id));
    $_rows = array();
    $_rows  = $query->row_array();
    if(!empty($rows) && !empty($_rows)){
      $rows = array_merge($rows, $_rows);
    }
    $query->free_result();

     $sql = "SELECT   
                B.diet_id            PREV_ID,
                B.diet_title         PREV_TITLE,
                U.usr_name          PREV_USR_NAME
              FROM geumsa_diet B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N' 
              AND   B.diet_id < ?
              ORDER BY B.diet_id DESC
              LIMIT 1 ";

    $query = $this->db->query($sql, array($diet_id));
    $_rows = array();
    $_rows  = $query->row_array();
    if(!empty($rows) && !empty($_rows)){
      $rows = array_merge($rows, $_rows);
    }
    $query->free_result();

    return $rows;
  }
}
