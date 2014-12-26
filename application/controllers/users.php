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
	  
	  $this->load->model('UserRole','',TRUE);
	  
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
		
		if(!empty($this->input->post())){
		
		  if($this->get('new_password') != $this->get('confirm_password')){
		    
		    $this->session->set_flashdata('error', 'Your new passwords do not match!');
		      
		      redirect('/users/change', 'refresh');
		  
		  } else {
		  
		    if($this->User->users_password($this->session->userdata('logged_in')['id'], md5($this->get('password')))){
		    
		      $data = array(
				    "password" => md5($this->get("new_password"))
				    );
		      $this->User->update($this->session->userdata('logged_in')['id'], $data);
		      
		      $this->session->set_flashdata('success', 'Your password was successfully changed');
		
		      redirect('/parcels', 'refresh');
		    
		    } else {
		    
		      $this->session->set_flashdata('error', 'Your entered a wrong password!');
		      
		      redirect('/users/change', 'refresh');
		    
		    }
		  
		  }
		
		}
		
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
				  'destination_id' => $this->get('destination'),
				  'user_role_id' => $this->get('user_role_id')
				  );
		   
		    $this->User->update($id, $user);
		    
		    $this->db->trans_complete();
		    
		    $this->session->set_flashdata('success', 'User details successfully updated!');
		    
		    redirect('/users/index');
		 }
		 
		  
		    $data['user_roles'] = $this->UserRole->get_list();
		  
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
		  
		  $data['user_roles'] = $this->UserRole->get_list();
		  
		  $data['destinations'] = $this->Destination->get_list();
		  
		  $this->show('user_add', $data);
		  
	      }
	}
	
	function assign_rand_value($num)
	{
	// accepts 1 - 36
	  switch($num)
	  {
	    case "1":
	    $rand_value = "a";
	    break;
	    case "2":
	    $rand_value = "b";
	    break;
	    case "3":
	    $rand_value = "c";
	    break;
	    case "4":
	    $rand_value = "d";
	    break;
	    case "5":
	    $rand_value = "e";
	    break;
	    case "6":
	    $rand_value = "f";
	    break;
	    case "7":
	    $rand_value = "g";
	    break;
	    case "8":
	    $rand_value = "h";
	    break;
	    case "9":
	    $rand_value = "i";
	    break;
	    case "10":
	    $rand_value = "j";
	    break;
	    case "11":
	    $rand_value = "k";
	    break;
	    case "12":
	    $rand_value = "l";
	    break;
	    case "13":
	    $rand_value = "m";
	    break;
	    case "14":
	    $rand_value = "n";
	    break;
	    case "15":
	    $rand_value = "o";
	    break;
	    case "16":
	    $rand_value = "p";
	    break;
	    case "17":
	    $rand_value = "q";
	    break;
	    case "18":
	    $rand_value = "r";
	    break;
	    case "19":
	    $rand_value = "s";
	    break;
	    case "20":
	    $rand_value = "t";
	    break;
	    case "21":
	    $rand_value = "u";
	    break;
	    case "22":
	    $rand_value = "v";
	    break;
	    case "23":
	    $rand_value = "w";
	    break;
	    case "24":
	    $rand_value = "x";
	    break;
	    case "25":
	    $rand_value = "y";
	    break;
	    case "26":
	    $rand_value = "z";
	    break;
	    case "27":
	    $rand_value = "0";
	    break;
	    case "28":
	    $rand_value = "1";
	    break;
	    case "29":
	    $rand_value = "2";
	    break;
	    case "30":
	    $rand_value = "3";
	    break;
	    case "31":
	    $rand_value = "4";
	    break;
	    case "32":
	    $rand_value = "5";
	    break;
	    case "33":
	    $rand_value = "6";
	    break;
	    case "34":
	    $rand_value = "7";
	    break;
	    case "35":
	    $rand_value = "8";
	    break;
	    case "36":
	    $rand_value = "9";
	    break;
	  }
	return $rand_value;
	}

	function get_rand_id($length)
	{
	  if($length>0) 
	  { 
	  $rand_id="";
	  for($i=1; $i<=$length; $i++)
	  {
	  mt_srand((double)microtime() * 1000000);
	  $num = mt_rand(1,36);
	  $rand_id .= $this->assign_rand_value($num);
	  }
	  }
	return $rand_id;
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */