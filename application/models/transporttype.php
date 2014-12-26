<?php
class TransportType extends CI_Model {
    // table name
    private $tbl_transport_types= 'tbl_transport_modes';
 
    function __construct(){
      parent::__construct();
    }
    // get number of transport_types in database
    function count_all(){
        return $this->db->count_all($this->tbl_transport_types);
    }
    // get transport_types with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_transport_types);
    }
    // get transport_type by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_transport_types);
    }
    // add new transport_type
    function save($transport_type){
        $this->db->insert($this->tbl_transport_types, $transport_type);
        return $this->db->insert_id();
    }
    // update transport_type by id
    function update($id, $transport_type){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_transport_types, $transport_type);
    }
    // delete transport_type by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_transport_types);
    }
}
?>