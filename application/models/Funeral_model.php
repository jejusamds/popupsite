<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* Funeral Model
*/
class Funeral_model extends CI_Model {

  function  __construct() {
    parent::__construct();
  }

  public function get_funeral($select = '*') {

    $sql = "SELECT ".$select." FROM geumsa_funeral";
    $query = $this->db->query($sql);
    $data = $query->row_array();
    $query->free_result();

    return $data;
  }

  public function set_funeral(
      $lease_vip_price, $lease_n01_price, $lease_n02_price,
      $env_vip_price, $env_price, $immigration, $enshrined,
      $lease_vip_price_per_hour, $lease_n01_price_per_hour, $lease_n02_price_per_hour
    ) {

      if(!empty($lease_vip_price))    $this->db->set('lease_vip_price', (String) $lease_vip_price);
      if(!empty($lease_n01_price))    $this->db->set('lease_n01_price', (String) $lease_n01_price);
      if(!empty($lease_n02_price))    $this->db->set('lease_n02_price', (String) $lease_n02_price);
      if(!empty($env_vip_price))      $this->db->set('env_vip_price', (String) $env_vip_price);
      if(!empty($env_price))          $this->db->set('env_price', (String) $env_price);
      if(!empty($immigration))        $this->db->set('immigration', (String) $immigration);
      if(!empty($enshrined))          $this->db->set('enshrined', (String) $enshrined);
      if(!empty($lease_vip_price_per_hour))    $this->db->set('lease_vip_price_per_hour', $lease_vip_price_per_hour);
      if(!empty($lease_n01_price_per_hour))    $this->db->set('lease_n01_price_per_hour', $lease_n01_price_per_hour);
      if(!empty($lease_n02_price_per_hour))    $this->db->set('lease_n02_price_per_hour', $lease_n02_price_per_hour);

      return $this->db->update('geumsa_funeral');
  }
}
