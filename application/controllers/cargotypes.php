<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CargoTypes extends CI_Controller {

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
	  
	  $this->load->model('CargoType','',TRUE);
	
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
		
		$data['cargo_types'] = $this->CargoType->get_list();
				
		$this->show('cargo_type_list', $data);
		
	}
	
	public function delete(){
	
		$this->authenticate();
		
	      if(!empty($this->input->post())) {
	      
		$this->CargoType->delete($this->get('id'));
	      
		      $this->session->set_flashdata('success', 'Parcel type successfully deleted!');
	      }
	    
	    redirect('/cargotypes', 'refresh');
	  
	
	}
	public function edit($id){
	
	    $this->authenticate();
	    
		 if(!empty($this->input->post())){
		 
		    $this->db->trans_start();
		    
		    
		    $cargo_type = array(
				  "name" => $this->get('name'),
				  "description" => $this->get('description')
				  );
		   
		      $this->CargoType->update($id, $cargo_type);
		    
		      $this->db->trans_complete();
		      
		      $this->session->set_flashdata('success', 'Parcel type successfully updated!');
		      
		      redirect('/cargotypes/index');
		 }
		    
		    $data['parcel_type'] = $this->CargoType->get_by_id($id)->result()[0];
		    
		    $data['id'] = $id;
		    
		    $this->show('cargo_type_edit', $data);
		 
	
	}
	public function create()
	{
		$this->authenticate();
		
		if(!empty($this->input->post())){
		
		  $this->db->trans_start();
		  
		  $cargo_type = array(
				  "name" => $this->get('name'),
				  "description" => $this->get('description')
				  );
				  
		  if($this->CargoType->save($cargo_type)){
		  
		    $this->db->trans_complete();
		    
		    $this->session->set_flashdata('success', 'Parcel type successfully saved!');
		    
		    redirect('/cargotypes/index', 'refresh');
		    
		  } else {
		  
		    $this->db->trans_rollback();
		    
		    $this->session->set_flashdata('error', 'Parcel type could not be saved!');
		  
		  
		      redirect('/cargotypes/create', 'refresh');
		  }
		  
		}
		  
		  $this->show('cargo_type_add', null);
		  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */