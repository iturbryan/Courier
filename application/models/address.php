<?php
class Address extends CI_Model {
    // table name
    private $tbl_addresses= 'tbl_addresses';
 
    function __construct(){
      parent::__construct();
    }
    // get number of addresses in database
    function count_all(){
        return $this->db->count_all($this->tbl_addresses);
    }
    // get addresses with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_addresses);
    }
    // get address by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_addresses);
    }
    // add new address
    function save($address){
        $this->db->insert($this->tbl_addresses, $address);
        return $this->db->insert_id();
    }
    // update address by id
    function update($id, $address){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_addresses, $address);
    }
    // delete address by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_addresses);
    }
}
?>