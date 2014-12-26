<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Destinations extends CI_Controller {

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
	  
	  
	  $this->load->model('Country','',TRUE);
	  
	  $this->load->model('Destination','',TRUE);
	  
	
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
	public function delete(){
	
	  $this->authenticate();
		
	  if(!empty($this->input->post())) {
	  
	    $this->Destination->delete($this->get('id'));
	    
		      $this->session->set_flashdata('success', 'Office record successfully deleted!');
	  
	  }
	    
	    redirect('/destinations', 'refresh');
	  
	
	}
	public function index()
	{
		$this->authenticate();
		
		$data['countries'] = $this->Country->get_list();
		
		$data['destinations'] = $this->Destination->get_list();
				
		$this->show('destination_list', $data);
		
	}
	public function edit($id){
	
	    $this->authenticate();
	    
		 if(!empty($this->input->post())){
		 
		    $this->db->trans_start();
		    
		    
		    $destination = array(
				  "name" => $this->get('name'),
				  "description" => $this->get('description'),
				  "country_id"  => $this->get('country')
				  );
		   
		    $this->Destination->update($id, $destination);
		    
		      $this->db->trans_complete();
		      
		      $this->session->set_flashdata('success', 'Office record successfully saved!');
		      
		      redirect('/destinations/index');
		
		}
		 
		    $data['destination'] = $this->Destination->get_by_id($id)->result()[0];
		    
		    $data['countries'] = $this->Country->get_list();
		  
		    $data['id'] = $id;
		    
		    $this->show('destination_edit', $data);
		 
	
	}
	public function create()
	{
		$this->authenticate();
		
		if(!empty($this->input->post())){
		
		  $this->db->trans_start();
		  
		  $destination = array(
				  "name" => $this->get('name'),
				  "description" => $this->get('description'),
				  "country_id"  => $this->get('country')
				  );
				  
		  if($this->Destination->save($destination)){
		      
		      $this->db->trans_complete();
		      
		      $this->session->set_flashdata('success', 'Office record successfully saved!');
		      
		      redirect('/destinations/index', 'refresh');
		    
		    } else {
		    
		      $this->db->trans_rollback();
		      
		      $this->session->set_flashdata('error', 'Office record could not be saved!');
		    
		    }
		
		} 
		
		  $data['countries'] = $this->Country->get_list();
		  
		  $this->show('destination_add', $data);
		  
		  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */