<?php
class Pricelist extends CI_Model {
    // table name
    private $tbl_pricelists= 'tbl_pricelists';
 
    function __construct(){
      parent::__construct();
    }
    // get number of pricelists in database
    function count_all(){
        return $this->db->count_all($this->tbl_pricelists);
    }
    // get pricelists with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_pricelists);
    }
    // get pricelist by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_pricelists);
    }
    // add new pricelist
    function save($pricelist){
        $this->db->insert($this->tbl_pricelists, $pricelist);
        return $this->db->insert_id();
    }
    // update pricelist by id
    function update($id, $pricelist){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_pricelists, $pricelist);
    }
    // delete pricelist by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_pricelists);
    }
}
?>