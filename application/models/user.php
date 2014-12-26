<?php
class User extends CI_Model {
    // table name
    private $tbl_users= 'tbl_users';
 
    function __construct(){
      parent::__construct();
    }
    // get number of users in database
    function count_all(){
        return $this->db->count_all($this->tbl_users);
    }
    // get users with paging
    function get_list(){
        $this->db->order_by('id','asc');
        return $this->db->get($this->tbl_users);
    }
    // get user by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_users);
    }
    // add new user
    function save($user){
        $this->db->insert($this->tbl_users, $user);
        return $this->db->insert_id();
    }
    // update user by id
    function update($id, $user){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_users, $user);
    }
    // delete user by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_users);
    }
    //
    function users_password($id, $password){
	$this->db->where(array('id' => $id, 'password' => $password));
	$this->db->get($this->tbl_users)->num_rows() > 0;
    }
    function login($username, $password, $destination_id)
    {
      $this -> db -> select('*');
      $this -> db -> from($this->tbl_users);
      $this -> db -> where('username', $username);
      $this -> db -> where('password', md5($password));
      $this -> db -> where('destination_id', $destination_id);
      $this -> db -> limit(1);

      $query = $this -> db -> get();

      if($query -> num_rows() == 1)
      {
	return $query->result();
      }
      else
      {
	return false;
      }
    }
}
?>