<?php
class Outbox extends CI_Model {
    // table name
    private $tbl_outbox= 'tbl_outbox';
 
    function __construct(){
      parent::__construct();
    }
    // get number of outbox in database
    function count_all(){
        return $this->db->count_all($this->tbl_outbox);
    }
    // get outbox with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_outbox);
    }
    // get sender by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_outbox);
    }
    // add new sender
    function save($sender){
        $this->db->insert($this->tbl_outbox, $sender);
        return $this->db->insert_id();
    }
    // update sender by id
    function update($id, $sender){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_outbox, $sender);
    }
    // delete sender by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_outbox);
    }
}
?>