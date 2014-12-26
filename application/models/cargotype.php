<?php
class CargoType extends CI_Model {
    // table name
    private $tbl_cargo_types= 'tbl_parcel_types';
 
    function __construct(){
      parent::__construct();
    }
    // get number of cargo_types in database
    function count_all(){
        return $this->db->count_all($this->tbl_cargo_types);
    }
    // get cargo_types with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_cargo_types);
    }
    // get cargo_type by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_cargo_types);
    }
    // add new cargo_type
    function save($cargo_type){
        $this->db->insert($this->tbl_cargo_types, $cargo_type);
        return $this->db->insert_id();
    }
    // update cargo_type by id
    function update($id, $cargo_type){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_cargo_types, $cargo_type);
    }
    // delete cargo_type by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_cargo_types);
    }
}
?>