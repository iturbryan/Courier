<?php
class Setting extends CI_Model {
    // table name
    private $tbl_settings= 'tbl_settings';
 
    function __construct(){
      parent::__construct();
    }
    // get number of settings in database
    function count_all(){
        return $this->db->count_all($this->tbl_settings);
    }
    // get settings with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_settings);
    }
    // get setting by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_settings);
    }
    // add new setting
    function save($setting){
        $this->db->insert($this->tbl_settings, $setting);
        return $this->db->insert_id();
    }
    // update setting by key
    function update($key, $setting){
        $this->db->where('key', $key);
        $this->db->update($this->tbl_settings, $setting);
    }
    // delete setting by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_settings);
    }
}
?>