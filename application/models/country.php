<?php
class Country extends CI_Model {
    // table name
    private $tbl_countries= 'tbl_countries';
 
    function __construct(){
      parent::__construct();
    }
    // get number of countries in database
    function count_all(){
        return $this->db->count_all($this->tbl_countries);
    }
    // get countries with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_countries);
    }
    // get country by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_countries);
    }
    // add new country
    function save($country){
        $this->db->insert($this->tbl_countries, $country);
        return $this->db->insert_id();
    }
    // update country by id
    function update($id, $country){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_countries, $country);
    }
    // delete country by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_countries);
    }
}
?>