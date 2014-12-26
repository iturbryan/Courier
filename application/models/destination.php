<?php
class Destination extends CI_Model {
    // table name
    private $tbl_destinations= 'tbl_destinations';
 
    function __construct(){
      parent::__construct();
    }
    // get number of destinations in database
    function count_all(){
        return $this->db->count_all($this->tbl_destinations);
    }
    // get destinations with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_destinations);
    }
    // get destination by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_destinations);
    }
    // add new destination
    function save($destination){
        $this->db->insert($this->tbl_destinations, $destination);
        return $this->db->insert_id();
    }
    // update destination by id
    function update($id, $destination){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_destinations, $destination);
    }
    // delete destination by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_destinations);
    }
}
?>