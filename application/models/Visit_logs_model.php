<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* Setting Model
*/
class Visit_logs_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  public function set_visit_logs($sess_id, $agent, $ip, $os, $referrer){

    if(empty($sess_id)){
      return false;
    }

    $this->db->where('vst_sess_id', $sess_id);
    $this->db->like("created", date("Y-m-d"), "after");
    $numrows = $this->db->count_all_results('geumsa_visit_logs');

    if($numrows > 0){
      $this->db->where('vst_sess_id', $sess_id);
      $this->db->set('vst_count', 'vst_count+1', FALSE);
      return $this->db->update('geumsa_visit_logs');
    } else {
      $this->db->set('vst_sess_id', $sess_id);
      $this->db->set('vst_agent', $agent);
      $this->db->set('vst_ip', $ip);
      $this->db->set('vst_os', $os);
      $this->db->set('vst_referrer', $referrer);
      $this->db->set('vst_count', '1');
      return $this->db->insert('geumsa_visit_logs');
    }
  }

  function get_visit_count($type = 'day'){

    switch($type){
      case 'hour' :
        $type_num = '13';
        break;
      case 'day' :
        $type_num = '10';
        break;
      case 'month' :
        $type_num = '7';
        break;
    }

    if($type == 'all'){
      return $this->db->count_all_results("geumsa_visit_logs");
    } else if($type == 'day_count'){
      $this->db->like('created', date("Y-m-d"), "after");
      return $this->db->count_all_results("geumsa_visit_logs");
    } else if($type == 'month_count'){
      $this->db->like('created', date("Y-m"), "after");
      return $this->db->count_all_results("geumsa_visit_logs");
    } else {
      $sql = "SELECT
            LEFT(created, ".$type_num.") DATE,
            COUNT(vst_count)  VISIT_COUNT
          FROM geumsa_visit_logs ";
      if($type == 'hour'){
        $sql .= " WHERE created LIKE '".date("Y-m-d")."%'";
      }
      $sql .= "    GROUP BY LEFT(created, ".$type_num.")";
    }

    $query = $this->db->query($sql);
    $rows  = $query->result_array();
    return $rows;
  }

  function get_agent_count($numrows = 0){

    $sql = "SELECT 
              AGENT,
              VISIT_COUNT,
              IF(PERCENT is NULL, '0', PERCENT) PERCENT
            FROM (
              SELECT 
                AGENT,
                VISIT_COUNT,
                ROUND(((VISIT_COUNT/".$numrows.")*100)) PERCENT
              FROM (
                SELECT 
                  vst_agent         AGENT, 
                  COUNT(*)          VISIT_COUNT
                FROM geumsa_visit_logs
                GROUP BY vst_agent 
              ) ROWS
            ) ROWS ORDER BY VISIT_COUNT DESC LIMIT 5";

    $query = $this->db->query($sql);
    $rows  = $query->result_array();
    return $rows;
  } 

  function get_ip_count($numrows = 0) {

    $sql = "SELECT 
              IP,
              VISIT_COUNT,
              IF(PERCENT is NULL, '0', PERCENT) PERCENT
            FROM (
              SELECT 
                IP,
                VISIT_COUNT,
                ROUND(((VISIT_COUNT/".$numrows.")*100)) PERCENT
              FROM (
                SELECT
                  vst_ip         IP,
                  COUNT(*)          VISIT_COUNT
                FROM geumsa_visit_logs
                GROUP BY vst_ip
              ) ROWS
            ) ROWS ORDER BY VISIT_COUNT DESC LIMIT 5";

    $query = $this->db->query($sql);
    $rows  = $query->result_array();
    return $rows;
  } 

  function get_os_count($numrows = 0) {

    $sql = "SELECT 
              OS,
              VISIT_COUNT,
              IF(PERCENT is NULL, '0%', PERCENT) PERCENT
            FROM (
              SELECT 
                OS,
                VISIT_COUNT,
                ROUND(((VISIT_COUNT/".$numrows.")*100)) PERCENT
              FROM (
                SELECT
                  vst_os            OS,
                  COUNT(*)          VISIT_COUNT
                FROM geumsa_visit_logs
                GROUP BY vst_os
              ) ROWS
            ) ROWS ORDER BY VISIT_COUNT DESC LIMIT 5";

    $query = $this->db->query($sql);
    $rows  = $query->result_array();
    return $rows;
  } 

  function get_referrer_count($numrows = 0) {

    $sql = "SELECT 
              IF(REFERRER is NULL OR REFERRER = '', '직접 접속', REFERRER) REFERRER,
              VISIT_COUNT,
              IF(PERCENT is NULL, '0', PERCENT) PERCENT
            FROM (
              SELECT 
                REFERRER,
                VISIT_COUNT,
                ROUND(((VISIT_COUNT/".$numrows.")*100)) PERCENT
              FROM (
                SELECT
                  vst_referrer      REFERRER,
                  COUNT(*)          VISIT_COUNT
                FROM geumsa_visit_logs
                GROUP BY vst_referrer
              ) ROWS
            ) ROWS ORDER BY VISIT_COUNT DESC LIMIT 5";

    $query = $this->db->query($sql);
    $rows  = $query->result_array();
    return $rows;
  } 
}
