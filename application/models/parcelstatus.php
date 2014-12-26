<?php
class ParcelStatus extends CI_Model {
    // table name
    private $tbl_parcel_statuses= 'tbl_parcel_statuses';
 
    function __construct(){
      parent::__construct();
    }
    // get number of parcel_statuses in database
    function count_all(){
        return $this->db->count_all($this->tbl_parcel_statuses);
    }
    // get parcel_statuses with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_parcel_statuses);
    }
    // get parcel_status by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_parcel_statuses);
    }
    // add new parcel_status
    function save($parcel_status){
        $this->db->insert($this->tbl_parcel_statuses, $parcel_status);
        return $this->db->insert_id();
    }
    // update parcel_status by id
    function update($id, $parcel_status){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_parcel_statuses, $parcel_status);
    }
    // delete parcel_status by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_parcel_statuses);
    }
}
?>