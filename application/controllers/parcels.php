<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parcels extends CI_Controller {

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
	 
	// num of records per page
    private $limit = 15;
	function __construct(){
	
	  parent::__construct();
	  
	  
	  $this->load->model('CargoType','',TRUE);
	  
	  $this->load->model('PaymentType','',TRUE);
	  
	  $this->load->model('TransportType','',TRUE);
	  
	  $this->load->model('Destination','',TRUE);
	  
	  $this->load->model('Country','',TRUE);
	  
	  $this->load->model('Parcel','',TRUE);
	  
	  $this->load->model('Address','',TRUE);
	  
	  $this->load->model('Sender','',TRUE);
	  
	  $this->load->model('Receiver','',TRUE);
	  
	  $this->load->model('ParcelStatus','',TRUE);
	  
	  $this->load->model('ParcelLog','',TRUE);
	  
	  $this->load->model('Setting','',TRUE);
	  
	  $this->load->model('Outbox','',TRUE);
	  
	  $this->load->model('Message','',TRUE);
	
	}
	
	private function authenticate(){
	  
	  if(empty($this->session->userdata('logged_in')))
	    redirect('/login', 'refresh');
	  
	}
	private function get($key){
	
	  return strtoupper($this->input->post($key));
	
	}
	
	private function show($view, $data, $pass = false){
	  if($pass)
	  
	    $this->load->view('partial/header', $data);
	  
	  else
	    
	    $this->load->view('partial/header');
	  
	  $this->load->view($view, $data);
	  
	  $this->load->view('partial/footer');
	  
	}
	public function index()
	{
		$this->authenticate();
		
		$data['cargo_types'] = $this->CargoType->get_list();
		
		$data['payment_types'] = $this->PaymentType->get_list();
		
		$data['shipping_modes'] = $this->TransportType->get_list();
		
		$data['destinations'] = $this->Destination->get_list();
		
		$data['countries'] = $this->Country->get_list();
		
		$data['parcel_types'] = $this->CargoType->get_list();
		
		$data['parcel_statuses'] = $this->ParcelStatus->get_list();
		
		
		$page = $this->uri->segment(3);
		
		
		if(empty($this->input->post()))
		
		  $data['parcels'] = $this->Parcel->get_list($this->limit, $page);
		  
		else
		  {
		  
		    $data['parcels'] = $this->Parcel->get_list_by_search($this->get('value'));
		  
		  }
				
    
		/* Load the 'pagination' library */
		$this->load->library('pagination');
		
		/* Set the config parameters */
		$config['total_rows'] = $this->Parcel->count_all();
		
		$config['base_url'] = base_url() . 'parcels/index';
		
		$config['per_page'] = $this->limit; 
		$config['first_link'] = "&lt;&lt; First";
		$config['last_link'] = "Last &gt;&gt;";
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		/* Initialize the pagination library with the config array */
		$this->pagination->initialize($config);
		
		$data['pages'] = $this->pagination->create_links();
		
		$this->show('parcel_list', $data);
		
	}
	
	public function document($id){
	
	      $this->authenticate();
	      
	      $data['configs'] = $this->Setting->get_list();
		 
	      $data['parcel_types'] = $this->CargoType->get_list();
	    
	      $data['payment_types'] = $this->PaymentType->get_list();
	      
	      $data['shipping_modes'] = $this->TransportType->get_list();
	      
	      $data['destinations'] = $this->Destination->get_list();
	      
	      $data['countries'] = $this->Country->get_list();
	      
	      $data['parcel_statuses'] = $this->ParcelStatus->get_list();
	      
	      $data['parcel'] = $this->Parcel->get_by_id($id);
	      
	      $data['logs'] = $this->ParcelLog->get_list_by_parcel_id($id);
	      
	      $data['sender'] = $this->Sender->get_by_id($data['parcel']->result()[0]->sender_id)->result()[0];
	      
	      $data['sender_address'] = $this->Address->get_by_id($data['sender']->address_id)->result()[0];
	      
	      $data['receiver'] = $this->Receiver->get_by_id($data['parcel']->result()[0]->receiver_id)->result()[0];
	      
	      $data['receiver_address'] = $this->Address->get_by_id($data['receiver']->address_id)->result()[0];
	      
	      $data['print'] = $id;
	      
	      $this->show('parcel_print', $data, true);
  
	}
	public function barcode($id)
	{
	    $this->load->library('zend');
	    $this->zend->load('Zend/Barcode');
    
	    Zend_Barcode::render('code128', 'image', array('text' => $id, 'barHeight' => 100), array());    
	}
	private function updateConsignment($parcel_id = null)
	{
		    if($parcel_id == null)
		    
		      $parcel_id = $this->get('parcel_id');
	
		    $this->db->trans_start();
		    
		    $log = array(
				  "parcel_id" => $parcel_id,
				  "status_id" => $this->get('parcel_status_id'),
				  "datetime" => date("Y-m-d H:i:s"),
				  "description" => $this->get("description"),
				  "destination_id" => $this->get("destination"),
				  "user_id" => $this->session->userdata('logged_in')['id']
				  );
		    $log_id = $this->ParcelLog->save($log);
		    
		    if(!$log_id){
		    
		      $this->db->trans_rollback();
		      
		      $this->session->set_flashdata('error', 'Parcel status could not be updated!');
		    
		    } else {
		    
			$data = array(
				    "parcel_status_id" => $this->get('parcel_status_id'),
				    "destination_id" => $this->get("destination")
				    );
				    
			$this->Parcel->update($parcel_id, $data);
			  
			  $this->db->trans_complete();
			  
			  $this->sendable($this->get('parcel_status_id'), $parcel_id);
			  
			  $this->session->set_flashdata('success', 'Parcel status successfully saved!');
			  
		    
		    }
	
	}
	public function edit($id){
	
	    $this->authenticate();
	    
		 if(!empty($this->input->post())){
		 
		 
		    if($this->get('previous_status_id') != $this->get('parcel_status_id')){
		    
			    $this->updateConsignment();
			      
			      redirect('/parcels/index');
		    
		    } else {
		    
			      
			      $this->session->set_flashdata('success', 'The consignment status was not changed');
			      
			    redirect('/parcels/index', 'refresh');
		    }
		    
		 }
		 
		    $data['parcel_types'] = $this->CargoType->get_list();
		  
		    $data['payment_types'] = $this->PaymentType->get_list();
		    
		    $data['shipping_modes'] = $this->TransportType->get_list();
		    
		    $data['destinations'] = $this->Destination->get_list();
		    
		    $data['countries'] = $this->Country->get_list();
		    
		    $data['parcel_statuses'] = $this->ParcelStatus->get_list();
		    
		    $data['parcel'] = $this->Parcel->get_by_id($id);
		    
		    $data['logs'] = $this->ParcelLog->get_list_by_parcel_id($id);
		    
		    $data['sender'] = $this->Sender->get_by_id($data['parcel']->result()[0]->sender_id)->result()[0];
		    
		    $data['sender_address'] = $this->Address->get_by_id($data['sender']->address_id)->result()[0];
		    
		    $data['receiver'] = $this->Receiver->get_by_id($data['parcel']->result()[0]->receiver_id)->result()[0];
		    
		    $data['receiver_address'] = $this->Address->get_by_id($data['receiver']->address_id)->result()[0];
		    
		    $data['id'] = $id;
		    
		    $this->show('parcel_edit', $data);
	
	}
	
	private function message($message, $fields){
	
		  foreach($fields as $field => $value)
		      
			$message = str_replace('<%='. strtoupper($field) .'=%>', $value, $message); 
			
			return $message;
	
	}
	
	private function sendable($id, $parcel_id){
	
		$status = $this->ParcelStatus->get_by_id($id)->result()[0];
		
		if($status->sender == 1){
		
		  $parcel = $this->Parcel->get_by_id($parcel_id)->result()[0];
		  
		  $sender_id = $parcel->sender_id;
		  
		  $sender = $this->Sender->get_by_id($sender_id)->result()[0];
		  
		  $data = array('consignment_no' => $parcel->consignment_no, 'name' => $sender->name, 'reference_no' => $sender->reference_no);
		  
		  $destinations = $this->Destination->get_list();
		  
		  foreach($destinations->result() as $destination)
		  
		    if($destination->id == $parcel->origin_id){
		    
		      $data['source'] = $destination->name;
		      
		      break;
		      
		    }
		    
		   foreach($destinations->result() as $destination)
		  
		    if($destination->id == $parcel->destinations_id){
		    
		      $data['destination'] = $destination->name;
		      
		      break;
		      
		    }
		    
		  $address = $this->Address->get_by_id($sender->address_id)->result()[0];
		  
		  $this->send_sms($address->telephone, $this->message($this->getMessage('to_sender', $this->get('parcel_status_id')), $data));
		    
		
		} 
		if($status->receiver == 1){
		
		  $parcel = $this->Parcel->get_by_id($parcel_id)->result()[0];
		  
		  $receiver_id = $parcel->receiver_id;
		  
		  $receiver = $this->Receiver->get_by_id($receiver_id)->result()[0];
		  
		  $data = array('consignment_no' => $parcel->consignment_no, 'name' => $receiver->name, 'reference_no' => $receiver->reference_no);
		  
		    
		  $destinations = $this->Destination->get_list();
		  
		  foreach($destinations->result() as $destination)
		  
		    if($destination->id == $parcel->origin_id){
		    
		      $data['source'] = $destination->name;
		      
		      break;
		      
		    }
		    
		   foreach($destinations->result() as $destination)
		  
		    if($destination->id == $parcel->destinations_id){
		    
		      $data['destination'] = $destination->name;
		      
		      break;
		      
		    }
		    
		  $address = $this->Address->get_by_id($receiver->address_id)->result()[0];
		  
		  $this->send_sms($address->telephone, $this->message($this->getMessage('to_receiver', $this->get('parcel_status_id')), $data));
		    
		
		}
		return null;
	
	}
	
	private function getMessage($field, $status){
	
		$message = $this->Message->get_by_status_id($status)->result()[0];
		
		return $message->$field;
	
	}
	private function send_sms($phone, $message){
	
	    require_once('Gateway.php');
	    
	    $username    = "bryanitur";
	    
	    /*$apiKey = "8ad24c5ad1e03125110a8310bb6c1977ab33d3c72fd6dd7c064335f7fa064456";*/
	    $apiKey      = "508c63f78ed69654e83d756c9f19a944ee96c4d0f35bc272e74576f54994daba";
	    
	    $recipients = $this->cleanPhone($phone);
	    
	    
	    $gateway  = new AfricaStalkingGateway($username, $apiKey);
	    
	    try 
		{ 
		  // Thats it, hit send and we'll take care of the rest. 
		  $results = $gateway->sendMessage($recipients, $message);
		  
		  $data = array(
				'to' => $recipients,
				'message' => $message,
				'datetime' => date('Y-m-d H:i:s')
				);
		  
		  $this->Outbox->save($data);
		}
		catch ( AfricasTalkingGatewayException $e )
		{
		  return false;
		}
	}
	
	private function cleanPhone($phone){
	
		$return = "";
		
		if(strlen($phone) == 13 && substr($phone, 0, 3) == "+25")
		
		$return .= $phone;
		
		else if(strlen($phone) == 10 && substr($phone, 0, 2) == "07")
		
		$return .= "+254" . substr($phone, 1);
		
		else if(strlen($phone) == 9 && substr($phone, 0, 1) == "7")
		
		$return .= "+254" . $phone;
		
		return $return;
	}
	public function batch_edit(){
	
	  if(!empty($this->input->post())){
	  
	    $parcels = $this->Parcel->get_by_batch_no($this->get('batch_no'));
	  
	    foreach($parcels->result() as $parcel){
	    
	      $this->updateConsignment($parcel->id);
	      
	      }
	      
	      $this->session->set_flashdata('success', 'Parcel batch processing was successful!');
			    
			    redirect('/parcels/index');
	  }
	 
	  $data['destinations'] = $this->Destination->get_list();
	  
	  $data['parcel_statuses'] = $this->ParcelStatus->get_list();
	  
	  $data['parcels'] = $this->Parcel->get_batches();
	
	  $this->show('batch_edit', $data);
	
	}
	public function create()
	{
		$this->authenticate();
		
		if(!empty($this->input->post())){
		
		$this->db->trans_start();
		
		  $address = array(
				  "address" => $this->get('sender_address'),
				  'telephone' => $this->get('sender_telephone'),
				  'country_id' => $this->get('sender_country'),
				  'town' => $this->get('sender_town')				  
				    );
				    
		  $address_id = $this->Address->save($address);
		  
		  if(!$address_id){
		    
		    $this->db->trans_rollback();
		    
		    $this->session->set_flashdata('error', 'Consignment could not be saved!');
		    
		  } else {
		  
		  $sender = array(
				  "name" => $this->get('sender_name'),
				  "reference" => $this->get('sender_reference'),
				  'account_no' => $this->get('account_no'),
				  'address_id' => $address_id
				  );
				  
		  $sender_id = $this->Sender->save($sender);
		  
		  if(!$sender_id){
		    
		    $this->db->trans_rollback();
		    
		    $this->session->set_flashdata('error', 'Consignment could not be saved!');
		  
		  } else {
		  
		     $address = array(
				  "address" => $this->get('receiver_address'),
				  'telephone' => $this->get('receiver_telephone'),
				  'country_id' => $this->get('receiver_country'),
				  'town' => $this->get('receiver_town')				  
				    );
				    
		     $address_id = $this->Address->save($address);
		      
		      if(!$address_id){
		      
		    
			$this->db->trans_rollback();
			
			$this->session->set_flashdata('error', 'Consignment could not be saved!');
			
		      
		      } else {
		  
			$receiver= array(
					"name" => $this->get('receiver_name'),
					"reference" => $this->get('receiver_reference'),
					'address_id' => $address_id
					);
					
			$receiver_id = $this->Receiver->save($receiver);
			
			if(!$receiver_id){
		    
			  $this->db->trans_rollback();
			  
			  $this->session->set_flashdata('error', 'Consignment could not be saved!');
			
			} else {
			
			  
			      $datetime = date("Y-m-d H:i:s");
			      $parcel = array(
					      "consignment_no" => $this->get('consignment_no'),
					      "create_date" => $datetime,
					      "sender_id" => $sender_id,
					      "receiver_id" => $receiver_id,
					      "parcel_type_id" => $this->get('parcel_type'),
					      "quantity" => $this->get('quantity'),
					      "weight" => $this->get('weight'),
					      "amount" => $this->get('amount'),
					      "payment_type_id" => $this->get('payment_type'),
					      "description" => $this->get('description'),
					      "origin_id" => $this->session->userdata('logged_in')['destination_id'],
					      "destination_id" => $this->get('destination'),
					      "transport_mode_id" => $this->get('transport_mode'),
					      "invoice_no" => $this->get('invoice_no'),
					      "departure_date" => $this->get('departure_date'),
					      "parcel_status_id" => 1,
					      "batch_no" => $this->get('batch_no')
					      );
					      
			      $parcel_id = $this->Parcel->save($parcel);
			      
			      if(!$parcel_id){
				
				$this->db->trans_rollback();
				
				$this->session->set_flashdata('error', 'Consignment could not be saved!');
			      
			      } else {
			      
				 $log = array(
					      "parcel_id" => $parcel_id,
					      "status_id" => 1,
					      "datetime" => $datetime,
					      "description" => 'RECEIVED AND READY FOR TRANSIT',
					      "destination_id" => $this->session->userdata('logged_in')['destination_id'],
					      "user_id" => $this->session->userdata('logged_in')['id']
					      );
				
				if($this->ParcelLog->save($log)){
				
				  $this->db->trans_complete();
				  
				  
				  $this->sendable(1, $parcel_id);
				  
				  $this->session->set_flashdata('success', 'Consignment was successfully saved!');
				  
				  redirect('parcels/index', 'refresh');
				  
				} else {
				  
				  $this->db->trans_rollback();
				  
				  $this->session->set_flashdata('error', 'Consignment could not be saved!');
				
				}
			      
			      }
			
			}
		  }
		  }
		  
		  }
		  
		 
		 
		
		} else {
		  
		  $data['cargo_types'] = $this->CargoType->get_list();
		  
		  $data['payment_types'] = $this->PaymentType->get_list();
		  
		  $data['shipping_modes'] = $this->TransportType->get_list();
		  
		  $data['destinations'] = $this->Destination->get_list();
		  
		  $data['countries'] = $this->Country->get_list();
		  
		  $data['rand'] = strtoupper($this->get_rand_id(10));
		  
		  $this->show('parcel_add', $data);
		  
	      }
	}
	function pdf($id)
	{
	    $this->load->helper(array('dompdf', 'file'));
	    
	    
	    $data['parcel_types'] = $this->CargoType->get_list();
	  
	    $data['payment_types'] = $this->PaymentType->get_list();
	    
	    $data['shipping_modes'] = $this->TransportType->get_list();
	    
	    $data['destinations'] = $this->Destination->get_list();
	    
	    $data['countries'] = $this->Country->get_list();
	    
	    $data['parcel_statuses'] = $this->ParcelStatus->get_list();
	    
	    $data['parcel'] = $this->Parcel->get_by_id($id);
	    
	    $data['logs'] = $this->ParcelLog->get_list_by_parcel_id($id);
	    
	    $data['sender'] = $this->Sender->get_by_id($data['parcel']->result()[0]->sender_id)->result()[0];
	    
	    $data['sender_address'] = $this->Address->get_by_id($data['sender']->address_id)->result()[0];
	    
	    $data['receiver'] = $this->Receiver->get_by_id($data['parcel']->result()[0]->receiver_id)->result()[0];
	    
	    $data['receiver_address'] = $this->Address->get_by_id($data['receiver']->address_id)->result()[0];
	    
	    $data['configs'] = $this->Setting->get_list();
	    
	    $data['id'] = $id;
	    $this->load->view('parcel_print', $data, true);

	    $html = $this->load->view('parcel_print', $data, true);
	    pdf_create($html, 'document');/*
	    or
	    $data = pdf_create($html, '', false);
	    write_file('name', $data);*/
	    //if you want to write it to disk and/or send it as an attachment    
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
