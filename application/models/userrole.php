<?php
class UserRole extends CI_Model {
    // table name
    private $tbl_user_roles= 'tbl_user_roles';
 
    function __construct(){
      parent::__construct();
    }
    // get number of user_roles in database
    function count_all(){
        return $this->db->count_all($this->tbl_user_roles);
    }
    // get user_roles with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_user_roles);
    }
    // get user_role by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_user_roles);
    }
    // add new user_role
    function save($user_role){
        $this->db->insert($this->tbl_user_roles, $user_role);
        return $this->db->insert_id();
    }
    // update user_role by id
    function update($id, $user_role){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_user_roles, $user_role);
    }
    // delete user_role by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_user_roles);
    }
}
?>