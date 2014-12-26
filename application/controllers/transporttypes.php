<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransportTypes extends CI_Controller {

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
	  
	  $this->load->model('TransportType','',TRUE);
	
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
	public function index()
	{
		$this->authenticate();
		
		$data['transport_types'] = $this->TransportType->get_list();
				
		$this->show('transport_type_list', $data);
		
	}
	public function edit($id){
	
	    $this->authenticate();
	    
		 if(!empty($this->input->post())){
		 
		    $this->db->trans_start();
		    
		    $transport_type = array(
				  "name" => $this->get('name'),
				  "description" => $this->get('description')
				  );
		   
		    $this->TransportType->update($id, $transport_type);
		    
		      $this->db->trans_complete();
		      
		      $this->session->set_flashdata('success', 'Shipping mode successfullly updated!');
		    
		    redirect('/transporttypes/index');
		   
		 }
		    
		    $data['transport_type'] = $this->TransportType->get_by_id($id)->result()[0];
		    
		    $data['id'] = $id;
		    
		    $this->show('transport_type_edit', $data);
		
	
	}
	public function delete(){
	
	    $this->authenticate();
	
	  if(!empty($this->input->post())) {
	  
	    $this->TransportType->delete($this->get('id'));
	  
		      $this->session->set_flashdata('success', 'Transport type successfully deleted!');
	  }
	    
	    redirect('/transporttypes', 'refresh');
	  
	
	}
	public function create()
	{
		$this->authenticate();
		
		if(!empty($this->input->post())){
		
		  $this->db->trans_start();
		  
		  $transport_type = array(
				  "name" => $this->get('name'),
				  "description" => $this->get('description')
				  );
				  
		  if($this->TransportType->save($transport_type)){
		      
		      $this->db->trans_complete();
		      
		      $this->session->set_flashdata('success', 'Shipping mode successfullly saved!');
		    		    
		    redirect('/transporttypes/index', 'refresh');
		    
		  } else {		  
		
		    
		      $this->db->trans_rollback();
		      
		  $this->session->set_flashdata('error', 'Shipping mode could not be saved!');
		  
		  }
		
		}
		  
		  $this->show('transport_type_add', null);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */