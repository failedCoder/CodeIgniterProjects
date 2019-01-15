<?php 

class OrderController extends CI_Controller
{	

	public function __construct () 
	{
		
		parent::__construct();

		$this->load->model('Order');

		$this->load->helper('url');
	
	}
	
	public function store () 
	{

		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules( 'orderName', 'Naziv naloga', 'required|is_unique[orders.name]' );
		$this->form_validation->set_rules( 'orderDescription', 'Opis naloga', 'required' );
		$this->form_validation->set_rules( 'start_date', 'Početak naloga', 'required' );
		$this->form_validation->set_rules( 'end_date', 'Kraj naloga', 'required' );
		$this->form_validation->set_rules( 'order_type', 'Tip naloga', 'required' );

		$this->form_validation->set_message('is_unique', "Naziv naloga mora biti jedinstven!");

		$response = [];

		if( $this->form_validation->run() === TRUE )
		{

			$this->Order->create( $this->input->post( 'projectId' ) );

			$response['isCreated'] = true;

		} else {

			$response['isCreated'] = false;

			$response['errors'] = [

				'orderName' => form_error('orderName'),
				'orderDescription' => form_error('orderDescription'),
				'start_date' => form_error('start_date'),
				'end_date' => form_error('end_date'),
				'order_type' => form_error('order_type')

			];


		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));

	}

}