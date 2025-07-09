<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* User Model
* @functions  get_gallery
* @functions  set_gallery
* @functions  paging
*/
class Welfare_gallery_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  public function recent_gallery(){

    $sql = "SELECT
              gbbs_title TITLE,
              gbbs_img       IMG_PATH,
              IF(DATE_ADD(created, INTERVAL +1 DAY) > NOW(), 'Y', 'N') IS_NEW
            FROM geumsa_welfare_gallery
            WHERE is_delete = 'N'
            ORDER BY gbbs_id DESC LIMIT 10
           ";

    $query = $this->db->query($sql);
    $data = $query->result_array();
    $query->free_result();
    return $data;
  }   

  public function get_gallery($row_type = 'row', $select = '*', $gbbs_id = '', $gbbs_type = '') {

    if($select == '*'){
      $sql = "SELECT G.*, U.usr_name FROM geumsa_welfare_gallery G ";
    } else {
      $sql = "SELECT $select FROM geumsa_welfare_gallery G ";
    }
      $sql .= " LEFT OUTER JOIN geumsa_users U ON U.usr_id = G.usr_id
            WHERE 1 ";

    if(!empty($gbbs_id)){
      $sql .= " AND G.gbbs_id = ".$this->db->escape($gbbs_id);
    }

    if(!empty($usr_name)){
      $sql .= " AND G.gbbs_type = ".$this->db->escape($gbbs_type);
    }

    $sql .= " ORDER BY G.gbbs_id DESC ";

    $query = $this->db->query($sql);
    if($row_type == 'row'){
      $data = $query->row_array();
    } else {
      $data = $query->result_array();
    }

    $query->free_result();
    return $data;
  }

  function set_gallery($gbbs_id, $gbbs_type, $gbbs_title, $gbbs_contents, $gbbs_img, $usr_id) {

    if(empty($gbbs_id)){
      $this->db->set('gbbs_id', $gbbs_id);
      $this->db->set('gbbs_type', $gbbs_type);
      $this->db->set('gbbs_title', $gbbs_title);
      $this->db->set('gbbs_contents', $gbbs_contents);
      $this->db->set('gbbs_img', $gbbs_img);
      $this->db->set('usr_id', $usr_id);
      return $this->db->insert('geumsa_welfare_gallery');
    } else {
      $this->db->where('gbbs_id', $gbbs_id);
      $this->db->set('gbbs_type', $gbbs_type);
      $this->db->set('updated', 'NOW()', FALSE);
      $this->db->set('gbbs_title', $gbbs_title);
      $this->db->set('gbbs_contents', $gbbs_contents);
      $this->db->set('gbbs_img', $gbbs_img);
      $this->db->set('usr_id', $usr_id);
      return $this->db->update('geumsa_welfare_gallery');
    }
  }

  public function get_count($is_admin, $type, $value){

    $numrows = 0;
    $this->db->where("is_delete", "N");

    if(!empty($is_admin)){
      if($is_admin != 'Y'){
        $this->db->where('is_view', "Y");
      }
    }

    if($type != '' && $value != ''){
      $this->db->like($type, $value);
    }

    return $this->db->count_all_results("geumsa_welfare_gallery");
  }

  function delete_gallery($id = array()){
    if(is_array($id)){
      $this->db->where_in("gbbs_id", $id);
    } else {
      $this->db->where("gbbs_id", $id);
    }
    $this->db->set("is_delete", "Y");
    return $this->db->update("geumsa_welfare_gallery");
  }

  function get_category(){

    $sql = "SELECT 
              G.gbbs_type CODE,
              C.cc_name   NAME,
              COUNT(*)    NUMROW
            FROM geumsa_welfare_gallery G
              LEFT OUTER JOIN common_codes C ON C.cc_code = G.gbbs_type
            GROUP BY G.gbbs_type ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return $rows;
  }

  public function paging($offset = 0, $per_page, $is_admin = 'Y', $gbbs_type, $type, $value){

    $numrows = 0;
    $rows = array();
    $numrows = $this->get_count($gbbs_type, $type, $value);

    $this->db->query("SET @RNUM:=($numrows-$offset)+1");
    $sql = "SELECT @RNUM:=@RNUM-1 AS ROWNUM, ROWS.*  FROM (
              SELECT
                G.gbbs_id        ID,
                C.cc_name        TYPE,
                G.gbbs_title     TITLE,
                G.gbbs_contents  CONTENTS,
                G.usr_id         USR_ID,
                G.gbbs_img       IMG_PATH,
                U.usr_name       USR_NAME,
                G.is_view        IS_VIEW,
                G.gbbs_views     VIEWS,
                G.created        DATE
              FROM geumsa_welfare_gallery G
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = G.usr_id
              LEFT OUTER JOIN geumsa_common_codes C ON C.cc_code = G.gbbs_type
              WHERE G.is_delete = 'N'  ";

    if($is_admin != 'Y'){
      $sql .= " AND G.is_view = 'Y' ";
    }

    if($type != '' && $value != ''){
      $sql .= " AND G.$type LIKE '%".$this->db->escape_like_str((String) $value)."%' ";
    }

    $sql .= " ORDER BY G.gbbs_id DESC
              LIMIT $per_page OFFSET $offset ) ROWS ";

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return array(
      'numrows' => $numrows,
      'rows' => $rows
    );
  }

  function set_views($gbbs_id){
    $this->db->where('gbbs_id', $gbbs_id);
    $this->db->set('gbbs_views', 'gbbs_views + 1', FALSE);
    return $this->db->update('geumsa_welfare_gallery');
  }
}
