<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* User Model
* @functions  get_popup
* @functions  set_popup
* @functions  paging
*/
class Popup_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  /* 
  * GET POPUP DATA
  *
  * 게시글 ID에 대한 데이터를 가져온다.
  *
  * @params  string  row_type
  * @params  string  select
  * @params  string  pop_id
  * @params  string  pop_type
  * @return  array  data
  * author/date  kwchoi/20161130
  */
  public function get_popup($row_type = 'row', $select = '*', $pop_id = '', $pop_type = '', $is_admin = '') {

    $sql = "SELECT P.*, U.usr_name FROM geumsa_popup P
            LEFT OUTER JOIN geumsa_users U ON U.usr_id = P.usr_id
            WHERE 1";

    if($is_admin != 'Y'){
      $sql .= " AND P.is_view = 'Y' ";
    }

    if(!empty($pop_id)){
      $sql .= " AND P.pop_id = ".$this->db->escape($pop_id);
    }

    if(!empty($pop_type)){
      $sql .= " AND P.pop_type = ".$this->db->escape($pop_type);
    }

    $sql .= " ORDER BY P.pop_id DESC ";

    $query = $this->db->query($sql);
    if($row_type == 'row'){
      $data = $query->row_array();
    } else {
      $data = $query->result_array();
    }

    $query->free_result();
    return $data;
  }

  function set_popup($pop_id = '', $pop_type = 'pop', $pop_title = '', $pop_contents = '', 
                     $pop_img = '', $pop_left = '0', $pop_top = '0', $is_view = 'N', $usr_id) {

    if(empty($pop_id)){
      if(!empty($pop_type))        $this->db->set('pop_type', $pop_type);
      if(!empty($pop_title))       $this->db->set('pop_title', $pop_title);
      if(!empty($pop_contents))    $this->db->set('pop_contents', $pop_contents);
      if(!empty($pop_img))         $this->db->set('pop_img', $pop_img);
      if(!empty($pop_left))        $this->db->set('pop_left', $pop_left);
      if(!empty($pop_top))         $this->db->set('pop_top', $pop_top);
      if(!empty($is_view))         $this->db->set('is_view', $is_view);
      $this->db->set('usr_id', $usr_id);
      return $this->db->insert('geumsa_popup');
    } else {
      $this->db->where('pop_id', $pop_id);
      $this->db->set('updated', 'NOW()', FALSE);
      if(!empty($pop_type))        $this->db->set('pop_type', $pop_type);
      if(!empty($pop_title))       $this->db->set('pop_title', $pop_title);
      if(!empty($pop_contents))    $this->db->set('pop_contents', $pop_contents);
      if(!empty($pop_img))         $this->db->set('pop_img', $pop_img);
      if(!empty($pop_left))        $this->db->set('pop_left', $pop_left);
      if(!empty($pop_top))         $this->db->set('pop_top', $pop_top);
      if(!empty($is_view))         $this->db->set('is_view', $is_view);
      return $this->db->update('geumsa_popup');
    }
  }

  public function get_count($pop_type, $type, $value){

    $numrows = 0;
    $this->db->where("is_delete", "N");

    if(!empty($pop_type)){
      $this->db->where('pop_type', $pop_type);
    }

    if($type != '' && $value != ''){
      $this->db->like($type, $value);
    }

    return $this->db->count_all_results("geumsa_popup");
  }

  function delete_popup($id = array()){

    if(is_array($id)){
      $this->db->where_in("pop_id", $id);
    } else {
      $this->db->where("pop_id", $id);
    }
    $this->db->set("is_delete", "Y");
    return $this->db->update("geumsa_popup");
  }

  public function paging($offset = 0, $per_page, $is_admin = 'Y', $pop_type, $type, $value){

    $numrows = 0;
    $rows = array();
    $numrows = $this->get_count($pop_type, $type, $value);

    $this->db->query("SET @RNUM:=($numrows-$offset)+1");
    $sql = "SELECT @RNUM:=@RNUM-1 AS ROWNUM, ROWS.*  FROM (
              SELECT
                P.pop_id         ID,
                P.pop_type       TYPE,
                P.pop_title      TITLE,
                P.pop_contents   CONTENTS,
                P.usr_id         USR_ID,
                U.usr_name       USR_NAME,
                P.is_view        IS_VIEW,
                P.pop_left       POS_LEFT,
                P.pop_top        POS_TOP,
                P.pop_img        IMG,
                P.created        DATE
              FROM geumsa_popup P
              LEFT OUTER JOIN geumsa_users U ON U.usr_id = P.usr_id
              WHERE P.is_delete = 'N'  ";

    if($is_admin != 'Y'){
      $sql .= " AND P.is_view = 'Y' ";
    }

    if($pop_type != ''){
      $sql .= " AND P.pop_type = ".$this->db->escape((String) $pop_type);
    }

    if($type != '' && $value != ''){
      $sql .= " AND P.$type = ".$this->db->escape((String) $value);
    }

    $sql .= " ORDER BY P.pop_id DESC
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
