<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
	
	  parent::__construct();
	  
	  
	  $this->load->model('User','',TRUE);
	  
	  $this->load->model('Destination','',TRUE);
	  
	
	}
	
	private function authenticate(){
	  
	  if(empty($this->session->userdata('logged_in')))
	    redirect('/login', 'refresh');
	  
	}
	private function get($key){
	
	  return $this->input->post($key);
	
	}
	
	private function show($view, $data){
	  
	  $this->load->view('partial/header');
	  
	  $this->load->view($view, $data);
	  
	  $this->load->view('partial/footer');
	  
	}
	
	public function logout(){
	
		$this->authenticate();
		
	  $this->session->unset_userdata('logged_in');
	  
	  redirect('/login', 'refresh');
	  
	}
	public function change()
	{
		$this->authenticate();
		
		$data['destinations'] = $this->Destination->get_list();
				
		$this->show('user_change', $data);
		
	}
	
	public function index()
	{
		$this->authenticate();
		
		$data['destinations'] = $this->Destination->get_list();
		
		$data['users'] = $this->User->get_list();
				
		$this->show('user_list', $data);
		
	}
	public function edit($id){
	
	    $this->authenticate();
	    
		 if(!empty($this->input->post())){
		 
		    $this->db->trans_start();
		    
		    $user = array(
				  "name" => $this->get('name'),
				  'destination_id' => $this->get('destination')
				  );
		   
		    $this->User->update($id, $user);
		    
		    $this->db->trans_complete();
		    
		    $this->session->set_flashdata('success', 'User details successfully updated!');
		    
		    redirect('/users/index');
		 }
		 
		    $data['destinations'] = $this->Destination->get_list();
		    
		    $data['user'] = $this->User->get_by_id($id)->result()[0];
		    
		    $data['id'] = $id;
		    
		    $this->show('user_edit', $data);
		 
	
	}
	public function create()
	{
		$this->authenticate();
		
		if(!empty($this->input->post())){
		$this->db->trans_start();
		
		  $user = array(
				  "name" => $this->get('name'),
				  "username" => $this->get('username'),
				  'password' => md5($this->get('password')),
				  'destination_id' => $this->get('destination')			  
				    );
				    
		  if($this->User->save($user)){
		  
		      $this->db->trans_complete();
		    
		      $this->session->set_flashdata('success', 'User account successfully created!');
		      
		      redirect('users/index', 'refresh');
		   
		   } else {
		      
		      $this->db->trans_rollback();
		      
		      $this->session->set_flashdata('error', 'User account could not be created!');
		  
		      $data['destinations'] = $this->Destination->get_list();
		  
		      $this->show('user_add', $data);
		   }
		
		} else {
		  
		  $data['destinations'] = $this->Destination->get_list();
		  
		  $this->show('user_add', $data);
		  
	      }
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */