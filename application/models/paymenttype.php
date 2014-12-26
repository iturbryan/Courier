<?php
class PaymentType extends CI_Model {
    // table name
    private $tbl_payment_types= 'tbl_payment_types';
 
    function __construct(){
      parent::__construct();
    }
    // get number of payment_types in database
    function count_all(){
        return $this->db->count_all($this->tbl_payment_types);
    }
    // get payment_types with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_payment_types);
    }
    // get payment_type by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_payment_types);
    }
    // add new payment_type
    function save($payment_type){
        $this->db->insert($this->tbl_payment_types, $payment_type);
        return $this->db->insert_id();
    }
    // update payment_type by id
    function update($id, $payment_type){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_payment_types, $payment_type);
    }
    // delete payment_type by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_payment_types);
    }
}
?>