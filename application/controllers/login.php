<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	 
	 function __construct()
	 {
	 
	   parent::__construct();
	   
	   $this->load->model('User','',TRUE);
	  
	  $this->load->model('Destination','',TRUE);
	   
	 } 
	 
	private function get($key){
	
	  return $this->input->post($key);
	
	}
	
	private function show($view, $data){
	  
	  $this->load->view('partial/header');
	  
	  $this->load->view($view, $data);
	  
	  $this->load->view('partial/footer');
	  
	}
	public function index()
	{
	
		  
		if(!empty($this->input->post())){
		
		  if($this->authenticate()){
		  
		    redirect('/parcels', 'refresh');
		  
		  } else {
		  
		  $this->session->set_flashdata('error', 'Login failed. Invaild username or password');
		  
		    redirect('/login', 'refresh');
		  
		  }
		
		} else {
		  
		if(!empty($this->session->userdata('logged_in')))
		  
		  redirect('parcels', 'refresh');
		  
		  $this->show_login();
		
		}
		
	}
	
	private function show_login(){
	
		  $data['destinations'] = $this->Destination->get_list();
		  
		  $this->show('login', $data);
	
	}
	private function authenticate(){
	
	  $result = $this->User->login($this->get('username'), $this->get('password'), $this->get('destination'));

	  if($result)
	  {
	    $sess_array = array();
	    foreach($result as $row)
	    {
	      $sess_array = array(
		'id' => $row->id,
		'username' => $row->username,
		'destination_id' => $row->destination_id,
		'administrator' => $row->user_role_id == 1
	      );
	      $this->session->set_userdata('logged_in', $sess_array);
	    }
	    return true;
	  }
	  else
	  {
	  
	    return false;
	  }
	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */