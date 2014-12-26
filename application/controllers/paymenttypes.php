<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentTypes extends CI_Controller {

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
	  
	  $this->load->model('PaymentType','',TRUE);
	
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
		
		$data['payment_types'] = $this->PaymentType->get_list();
				
		$this->show('payment_type_list', $data);
		
	}
	public function edit($id){
	
	    $this->authenticate();
	    
		 if(!empty($this->input->post())){
		 
		    $this->db->trans_start();
		    
		    $payment_type = array(
				  "name" => $this->get('name'),
				  "description" => $this->get('description')
				  );
		   
		    $this->PaymentType->update($id, $payment_type);
		    
		      $this->db->trans_complete();
		      
		      $this->session->set_flashdata('success', 'Payment type successfully updated');
		      
		      redirect('/paymenttypes/index');
		      
		 }
		 
		    $data['payment_type'] = $this->PaymentType->get_by_id($id)->result()[0];
		    
		    $data['id'] = $id;
		    
		    $this->show('payment_type_edit', $data);
		 
		 
	
	}
	public function delete(){
	
		$this->authenticate();
		
	  if(!empty($this->input->post())) {
	  
	    $this->PaymentType->delete($this->get('id'));
	  
		      $this->session->set_flashdata('success', 'Payment type successfully deleted!');
	  }
	    
	    redirect('/paymenttypes', 'refresh');
	  
	
	}
	public function create()
	{
		$this->authenticate();
		
		if(!empty($this->input->post())){
		
		  $this->db->trans_start();
		  
		  $payment_type = array(
				  "name" => $this->get('name'),
				  "description" => $this->get('description')
				  );
				  
		  if($this->PaymentType->save($payment_type)){
		  
		      $this->db->trans_complete();
		      
		      $this->session->set_flashdata('success', 'Payment type successfully saved!');
		  
		      redirect('/paymenttypes/index', 'refresh');
		    
		   } else {
		   
		      $this->db->trans_rollback();
		      
		      $this->session->set_flashdata('error', 'Payment type could not be saved');
		   
		  
		      redirect('/paymenttypes/create', 'refresh');
		   }
		
		}
		  
		  $this->show('payment_type_add', null);
		  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */