<?php
class Parcel extends CI_Model {
    // table name
    private $tbl_parcels= 'tbl_parcels';
 
    function __construct(){
      parent::__construct();
    }
    // get number of parcels in database
    function count_all(){
        return $this->db->count_all($this->tbl_parcels);
    }
    // get parcels with paging
    function get_list($limit = 10, $offset = 0){
        $this->db->order_by('id','desc');
        return $this->db->get($this->tbl_parcels, $limit, $offset);
    }
    // get parcels with paging
    function get_list_by_search($value){
        $this->db->where('consignment_no', $value);
        return $this->db->get($this->tbl_parcels);
    }
    function get_batches(){
	$this->db->distinct();
	$this->db->select('batch_no');
	$this->db->where('parcel_status_id <', 6);
        return $this->db->get($this->tbl_parcels);
    }
    // get parcel by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_parcels);
    }
    // get parcels by batch_no
    function get_by_batch_no($batch_no){
        $this->db->where('batch_no', $batch_no);
        return $this->db->get($this->tbl_parcels);
    }
    // add new parcel
    function save($parcel){
        $this->db->insert($this->tbl_parcels, $parcel);
        return $this->db->insert_id();
    }
    // update parcel by id
    function update($id, $parcel){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_parcels, $parcel);
    }
    // delete parcel by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_parcels);
    }
}
?>