<?php
Class Easy {

	 
	private function get($key){
	
	  return $this->input->post($key);
	
	}
	
	private function show($view, $data){
	  
	  $this->load->view('partial/header');
	  
	  $this->load->view($view, $data);
	  
	  $this->load->view('partial/footer');
	  
	}
}
?>