<?php
class Message extends CI_Model {
    // table name
    private $tbl_messages= 'tbl_messages';
 
    function __construct(){
      parent::__construct();
    }
    // get number of messages in database
    function count_all(){
        return $this->db->count_all($this->tbl_messages);
    }
    // get messages with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_messages);
    }
    // get message by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_messages);
    }
    // get message by status_id
    function get_by_status_id($id){
        $this->db->where('parcel_status_id', $id);
        return $this->db->get($this->tbl_messages);
    }
    // add new message
    function save($message){
        $this->db->insert($this->tbl_messages, $message);
        return $this->db->insert_id();
    }
    // update message by id
    function update($id, $message){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_messages, $message);
    }
    // delete message by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_messages);
    }
}
?>