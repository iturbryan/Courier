<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricelists extends CI_Controller {

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
	  
	  $this->load->model('Pricelist','',TRUE);
	  
	  $this->load->model('CargoType','',TRUE);
	  
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
	public function index()
	{
		$this->authenticate();
		  
		$data['parcel_types'] = $this->CargoType->get_list();
		
		$data['destinations'] = $this->Destination->get_list();
		
		$data['pricelists'] = $this->Pricelist->get_list();
				
		$this->show('pricelist_list', $data);
		
	}
	public function edit($id){
	
	    $this->authenticate();
	    
		 if(!empty($this->input->post())){
		 
		    $this->db->trans_start();
		    
		    $pricelist = array(
				  "parcel_type_id" => $this->get('parcel_type_id'),
				  "source_id" => $this->get('source_id'),
				  "destination_id" => $this->get('destination_id'),
				  "min_weight" => $this->get('min_weight'),
				  "amount" => $this->get('amount')
				  );
		   
		    $this->Pricelist->update($id, $pricelist);
		      
		      $this->db->trans_complete();
		      
		      $this->session->set_flashdata('success', 'Pricelist item successfully updated!');
		      
		      redirect('/pricelists/index');
		      
		 }
		    $data['parcel_types'] = $this->CargoType->get_list();
		    
		    $data['destinations'] = $this->Destination->get_list();
		  
		    $data['pricelist'] = $this->Pricelist->get_by_id($id)->result()[0];
		    
		    $data['id'] = $id;
		    
		    $this->show('pricelist_edit', $data);
		 
	
	}
	public function delete(){
	
		$this->authenticate();
	
	      if(!empty($this->input->post())) {
	      
		$this->Pricelist->delete($this->get('id'));
	      
		      $this->session->set_flashdata('success', 'Pricelist item successfully deleted!');
	      }
	    
	    redirect('/pricelists', 'refresh');
	  
	
	}
	public function create()
	{
		$this->authenticate();
		
		if(!empty($this->input->post())){
		  $this->db->trans_start();
		  $pricelist = array(
				  "parcel_type_id" => $this->get('parcel_type_id'),
				  "source_id" => $this->get('source_id'),
				  "destination_id" => $this->get('destination_id'),
				  "min_weight" => $this->get('min_weight'),
				  "amount" => $this->get('amount')
				  );
		  if($this->Pricelist->save($pricelist)){
		  
		    $this->db->trans_complete();
		    
		    $this->session->set_flashdata('success', 'Pricelist item successfully saved!');
		  
		    redirect('/pricelists/index', 'refresh');
		  
		  } else {
		  
		    $this->db->trans_rollback();
		    
		    $this->session->set_flashdata('error', 'Pricelist item could not be saved!');
		    
		    }
		
		} 
		  $data['parcel_types'] = $this->CargoType->get_list();
		  
		  $data['destinations'] = $this->Destination->get_list();
		  
		  $this->show('pricelist_add', $data);
		  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */