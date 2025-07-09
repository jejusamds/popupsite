<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* User Model
* @functions  get_board
* @functions  set_board
* @functions  paging
*/
class Board_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  public function recent_notice(){
    $sql = "SELECT
              bbs_id    ID,
              bbs_title TITLE,
              IF(DATE_ADD(created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW
            FROM geumsa_board
            WHERE is_delete = 'N'
            AND   bbs_type = 'notice'
            ORDER BY bbs_id DESC LIMIT 4
           ";

    $query = $this->db->query($sql);
    $data = $query->result_array();
    $query->free_result();
    return $data;
  }   


  /* 
  * GET BOARD DATA
  *
  * 게시글 ID에 대한 데이터를 가져온다.
  *
  * @params  string  row_type
  * @params  string  select
  * @params  string  bbs_id
  * @params  string  bbs_type
  * @return  array  data
  * author/date  kwchoi/20161130
  */
  public function get_board($row_type = 'row', $select = '*', $bbs_id = '', $bbs_type = '') {

    $sql = "SELECT B.*, U.usr_name FROM geumsa_board B
            LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
            WHERE 1 ";

    if(!empty($bbs_id)){
      $sql .= " AND B.bbs_id = ".$this->db->escape($bbs_id);
    }

    if(!empty($bbs_type)){
      $sql .= " AND B.bbs_type = ".$this->db->escape($bbs_type);
    }

    $sql .= " ORDER BY B.bbs_id DESC";

    $query = $this->db->query($sql);
    if($row_type == 'row'){
      $data = $query->row_array();
    } else {
      $data = $query->result_array();
    }

    $query->free_result();
    return $data;
  }

  function set_board($bbs_id = '', $bbs_type = 'notice', $bbs_title, $bbs_contents, $usr_id, $notice_flag = '') {

    $this->db->set('bbs_title', $bbs_title);
    $this->db->set('bbs_contents', $bbs_contents);
    $this->db->set('usr_id', $usr_id);
    $this->db->set('bbs_notice_flag', $notice_flag);

    if(empty($bbs_id)){
      $this->db->set('bbs_id', $bbs_id);
      $this->db->set('bbs_type', $bbs_type);
      return $this->db->insert('geumsa_board');
    } else {
      $this->db->where('bbs_id', $bbs_id);
      $this->db->where('bbs_type', $bbs_type);
      $this->db->set('updated', 'NOW()', FALSE);
      return $this->db->update('geumsa_board');
    }
  }

  public function get_count($bbs_type, $type, $value){

    $numrows = 0;
    $this->db->where("is_delete", "N");

    if(!empty($bbs_type)){
      $this->db->where('bbs_type', $bbs_type);
    }

    if($type != '' && $value != ''){
      $this->db->like($type, $value);
    }

    return $this->db->count_all_results("geumsa_board");
  }

  function delete_board($id = array()){
    if(is_array($id)){
      $this->db->where_in("bbs_id", $id);
    } else {
      $this->db->where("bbs_id", $id);
    }
    $this->db->set("is_delete", "Y");
    return $this->db->update("geumsa_board");
  }

  public function paging($offset = 0, $per_page, $is_admin = 'Y', $bbs_type, $type, $value){

    $numrows = 0;
    $rows = array();
    $numrows = $this->get_count($bbs_type, $type, $value);

    $this->db->query("SET @RNUM:=($numrows-$offset)+1");
    $sql = "SELECT @RNUM:=@RNUM-1 AS ROWNUM, ROWS.*  FROM (
              SELECT
                B.bbs_id          ID,
                B.bbs_notice_flag NOTICE_FLAG,
                B.bbs_title       TITLE,
                B.bbs_contents    CONTENTS,
                B.usr_id          USR_ID,
                U.usr_name        USR_NAME,
                B.is_view         IS_VIEW,
                B.bbs_views       VIEWS,
                IF(DATE_ADD(B.created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW,
                DATE_FORMAT(B.created, '%y-%m-%d')        DATE,
                B.created        DATETIME
              FROM geumsa_board B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N'  ";

    if($is_admin != 'Y'){
    }

    if($bbs_type != ''){
      $sql .= " AND B.bbs_type = ".$this->db->escape((String) $bbs_type);
    }

    if($type != '' && $value != ''){
      $sql .= " AND B.$type LIKE '%".$this->db->escape_like_str((String) $value)."%'";
    }

    $sql .= " ORDER BY B.bbs_notice_flag DESC, B.bbs_id DESC
              LIMIT $per_page OFFSET $offset ) ROWS ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return array(
      'numrows' => $numrows,
      'rows' => $rows
    );
  }

  function set_views($bbs_id){
    $this->db->where('bbs_id', $bbs_id);
    $this->db->set('bbs_views', 'bbs_views + 1', FALSE);
    return $this->db->update('geumsa_board');
  }

  function detail($bbs_type, $bbs_id = ''){

    $sql   = "SELECT  
                B.bbs_id            ID,
                B.bbs_title         BBS_TITLE,
                B.bbs_contents      BBS_CONTENTS,
                U.usr_name          USR_NAME,
                B.bbs_views         VIEWS,
                IF(DATE_ADD(B.created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW,
                DATE_FORMAT(B.created, '%y-%m-%d')        DATE,
                B.created           DATETIME
              FROM geumsa_board B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N'
              AND   B.bbs_id = ?
              AND   B.bbs_type = ?
              LIMIT 1 ";

    $query = $this->db->query($sql, array($bbs_id, $bbs_type));
    $rows  = $query->row_array();
    $query->free_result();

     $sql = "SELECT  
                B.bbs_id            NEXT_ID,
                B.bbs_title         NEXT_TITLE,
                U.usr_name          NEXT_USR_NAME
              FROM geumsa_board B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N' 
              AND   B.bbs_id > ?
              AND   B.bbs_type = ?
              ORDER BY B.bbs_id ASC
              LIMIT 1 ";

    $query = $this->db->query($sql, array($bbs_id, $bbs_type));
    $_rows = array();
    $_rows  = $query->row_array();
    if(!empty($rows) && !empty($_rows)){
      $rows = array_merge($rows, $_rows);
    }
    $query->free_result();

     $sql = "SELECT   
                B.bbs_id            PREV_ID,
                B.bbs_title         PREV_TITLE,
                U.usr_name          PREV_USR_NAME
              FROM geumsa_board B
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = B.usr_id
              WHERE B.is_delete = 'N' 
              AND   B.bbs_id < ?
              AND   B.bbs_type = ?
              ORDER BY B.bbs_id DESC
              LIMIT 1 ";

    $query = $this->db->query($sql, array($bbs_id, $bbs_type));
    $_rows = array();
    $_rows  = $query->row_array();
    if(!empty($rows) && !empty($_rows)){
      $rows = array_merge($rows, $_rows);
    }
    $query->free_result();

    return $rows;
  }
}
