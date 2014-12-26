<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

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
	   
	   $this->load->model('Setting','',TRUE);
	   
	   $this->load->model('ParcelStatus','',TRUE);
	   
	 } 
	 
	private function authenticate(){
	  
	  if(empty($this->session->userdata('logged_in')))
	    redirect('/login', 'refresh');
	  
	}
	private function get($key){
	
	  return strtoupper($this->input->post($key));
	
	}
	
	private function show($view, $data){
	  
	  $this->load->view('partial/header');
	  
	  $this->load->view($view, $data);
	  
	  $this->load->view('partial/footer');
	  
	}
	
	private function get_receiver_option($id){
	
	  return $this->get('receiver_'. $id);
	
	}
	
	private function get_sender_option($id){
	
	  return $this->get('sender_'. $id);
	
	}
	
	public function index()
	{
	
	    $this->authenticate();
	
		if(!empty($this->input->post())){
		  
		    $settings = $this->Setting->get_list();
		    
		   $this->db->trans_start();
		    
		    foreach($settings->result() as $config){
		    
			$setting = array(
					'value' => $this->get($config->key)
					);
		    
			$this->Setting->update($config->key, $setting);			
		    
		    }
		    
		    $parcel_statuses  = $this->ParcelStatus->get_list();
		    
		    foreach($parcel_statuses->result() as $status){
		    
		      $data   = array(
					'sender'  => $this->get_sender_option($status->id) == 'ON',
					'receiver'  => $this->get_receiver_option($status->id) == 'ON',
					);
					
		      $this->ParcelStatus->update($status->id, $data);
		    
		    }
		    
		    $this->session->set_flashdata('success', 'Settings successfully saved!');
		    
		    $this->db->trans_complete();
		    
		    redirect('/settings', 'refresh');
		} 
		
		$data['parcel_statuses'] = $this->ParcelStatus->get_list();
		
		$data['configs'] = $this->Setting->get_list();
		
		$this->show('settings', $data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */