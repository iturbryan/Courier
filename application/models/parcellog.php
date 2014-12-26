<?php
class ParcelLog extends CI_Model {
    // table name
    private $tbl_parcel_logs= 'tbl_parcel_logs';
 
    function __construct(){
      parent::__construct();
    }
    // get number of parcel_logs in database
    function count_all(){
        return $this->db->count_all($this->tbl_parcel_logs);
    }
    // get parcel_logs with paging
    function get_list_by_parcel_id($id){
        $this->db->where('parcel_id', $id);
        return $this->db->get($this->tbl_parcel_logs);
    }
    // get parcel_log by id
    function get_by_id($id){
        return $this->db->get($this->tbl_parcel_logs);
    }
    // add new parcel_log
    function save($parcel_log){
        $this->db->insert($this->tbl_parcel_logs, $parcel_log);
        return $this->db->insert_id();
    }
    // update parcel_log by id
    function update($id, $parcel_log){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_parcel_logs, $parcel_log);
    }
    // delete parcel_log by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_parcel_logs);
    }
}
?>