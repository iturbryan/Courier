<?php
class Receiver extends CI_Model {
    // table name
    private $tbl_receivers= 'tbl_receivers';
 
    function __construct(){
      parent::__construct();
    }
    // get number of receivers in database
    function count_all(){
        return $this->db->count_all($this->tbl_receivers);
    }
    // get receivers with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_receivers);
    }
    // get receiver by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_receivers);
    }
    // add new receiver
    function save($receiver){
        $this->db->insert($this->tbl_receivers, $receiver);
        return $this->db->insert_id();
    }
    // update receiver by id
    function update($id, $receiver){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_receivers, $receiver);
    }
    // delete receiver by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_receivers);
    }
}
?>