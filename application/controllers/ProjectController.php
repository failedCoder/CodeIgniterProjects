<?php

class ProjectController extends CI_Controller
{
	
	public function __construct () 
	{

		parent::__construct();

		$this->load->model('Project');

		$this->load->helper('url');

	}

	public function index () 
	{

		$this->load->helper('form');
		$this->load->library('session');

		$data['deleteFormAttributes'] = [
			'id' => 'deleteProjectForm'
		];

		$data['projects'] = $this->Project->getAll();

		$this->load->view('layouts/partials/header');
		$this->load->view('index', $data);
		$this->load->view('layouts/partials/footer');
	
	}

	public function show ( $id ) 
	{
		$this->load->helper('form');
		$this->load->library('session');

		$data['orderFormAttributes'] = [

			'id' => 'orderForm'

		];

		$data['nameInputAttributes'] = [

	        'name' => 'orderName',
	        'placeholder' => 'Unesite ime naloga',
	        'class' => 'form-control',

      	];

      $data['descriptionInputAttributes'] = [

        'name' => 'orderDescription',
        'placeholder' => 'Unesite opis naloga',
        'class' => 'form-control',
        //'value' => set_value( 'description', $this->session->userdata( 'description' ) )

      ];

      $data['submitAttributes'] = [

        'name' => 'submit',
        'value' => 'Stvori nalog',
        'class' => 'btn btn-primary',
        'id' => 'orderBtn'
      ];

		$data['project'] = $this->Project->get( $id );

		$this->load->view('layouts/partials/header');
		$this->load->view('showProject', $data);
		$this->load->view('layouts/partials/create-order-modal', $data);
		$this->load->view('layouts/partials/footer');
	
	}

	public function create () 
	{

	  $this->load->helper('form');
	  $this->load->library('session');		


	  $data['nameInputAttributes'] = [

        'name' => 'name',
        'placeholder' => 'Unesite ime projekta',
        'class' => 'form-control',
        // 'value' => isset($this->input->post('name')) ? $this->input->post('name') : ''

      	];

      $data['descriptionInputAttributes'] = [

        'name' => 'description',
        'placeholder' => 'Unesite opis projekta',
        'class' => 'form-control',
        'value' => set_value( 'description', $this->session->userdata( 'description' ) )

      ];

      $data['submitAttributes'] = [

        'name' => 'submit',
        'value' => 'Stvori projekt',
        'class' => 'btn btn-primary'

      ];
		
		$this->load->helper('form');
		$this->load->library('session');
		
		// $this->load->view('layouts/partials/header');
		// $this->load->view('create', $data);
		// $this->load->view('layouts/partials/footer');

		$this->my_form_validation($data);
	
	}
	private function my_form_validation($data) {

		// $this->load->helper('form');
		$this->load->library('form_validation');
		// $this->load->library('session');
		$inputProjectName = $this->input->post('name');

		$this->form_validation->set_rules( 'name', 'Ime projekta', 'required|is_unique[projects.name]', array('is_unique' => "Naziv: $inputProjectName je zauzet!") );
		$this->form_validation->set_rules( 'description', 'Opis projekta', 'required' );
		$this->form_validation->set_rules( 'start_date', 'Početni datum', 'required' );
		$this->form_validation->set_rules( 'end_date', 'Kraj projekta', 'required' );

		
		// $this->form_validation->set_message('is_unique', "Naziv: $inputProjectName je zauzet!");

		if($this->form_validation->run() == TRUE) 
		{

			$this->Project->create();

			// $this->session->set_flashdata( 'success', 'Uspješno ste kreirali zadatak!' );

			// redirect( base_url() );
			

		} else {

			//  $this->session->set_flashdata(
			// 	'errors', validation_errors(
			// 		'<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">', 
			// 			'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  //   					<span aria-hidden="true">&times;</span>
	  // 					</button>
  	// 				</div>' 
			// ));

			// $this->session->set_flashdata([

			// 	'name' => $this->input->post('name'),
			// 	'description' => $this->input->post('description'),
			// 	'start_date' => $this->input->post('start_date'),
			// 	'end_date' => $this->input->post('end_date'),

			// ]); 

			$data['form_data'] = $this->input->post();
			$this->load->view( 'layouts/partials/header' );
			$this->load->view( 'create', $data );
			$this->load->view( 'layouts/partials/footer' ); 
		
			// redirect( $_SERVER['HTTP_REFERER'] );

		}
	}
	public function store () 
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules( 'name', 'Ime projekta', 'required|is_unique[projects.name]' );
		$this->form_validation->set_rules( 'description', 'Opis projekta', 'required' );
		$this->form_validation->set_rules( 'start_date', 'Početni datum', 'required' );
		$this->form_validation->set_rules( 'end_date', 'Kraj projekta', 'required' );

		$inputProjectName = $this->input->post('name');
		$this->form_validation->set_message('is_unique', "Naziv: $inputProjectName je zauzet!");

		if($this->form_validation->run() == TRUE) 
		{

			$this->Project->create();

			$this->session->set_flashdata( 'success', 'Uspješno ste kreirali zadatak!' );

			 redirect( base_url() );
			

		} else {

			 $this->session->set_flashdata(
				'errors', validation_errors(
					'<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">', 
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    					<span aria-hidden="true">&times;</span>
	  					</button>
  					</div>' 
			));

			$this->session->set_flashdata([

				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),

			]);

			//$data['form_data'] = $this->input->post();
			//$this->load->view( 'layouts/partials/header' );
			//$this->load->view( 'create', $data );
			//$this->load->view( 'layouts/partials/footer' ); 
		
			// redirect( $_SERVER['HTTP_REFERER'] );
			header("Location: " . $_SERVER['HTTP_REFERER']);

		}
	
	}

	public function edit ( $id ) 
	{

	  $project = $this->Project->get( $id );
	  
	  $data['project'] = $project;		

	  $data['nameInputAttributes'] = [

        'name' => 'name',
        'class' => 'form-control',
        'value' => $project->name

      ];

      $data['descriptionInputAttributes'] = [

        'name' => 'description',
        'value' => $project->description,
        'class' => 'form-control'

      ];

      $data['submitAttributes'] = [

        'name' => 'submit',
        'value' => 'Uredi projekt',
        'class' => 'btn btn-primary'

      ];
		
		$this->load->helper('form');
		$this->load->library('session');
	
		$this->load->view( 'layouts/partials/header' );
		$this->load->view( 'edit', $data );
		$this->load->view( 'layouts/partials/footer' );
	
	}

	public function update ( $id ) 
	{
		
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules( 'name', 'Ime projekta', "required|callback_uniqueName[$id]");
		$this->form_validation->set_rules( 'description', 'Opis projekta', 'required' );
		$this->form_validation->set_rules( 'start_date', 'Početni datum', 'required' );
		$this->form_validation->set_rules( 'end_date', 'Kraj projekta', 'required' );

		$inputProjectName = $this->input->post('name');
		$this->form_validation->set_message('uniqueName', "Naziv: $inputProjectName je zauzet!");

		if($this->form_validation->run() == TRUE) 
		{

			$this->Project->edit( $id );

			$this->session->set_flashdata( 'success', 'Uspješno ste uredili zadatak!' );

			redirect( base_url() );
			

		} else {

			$this->session->set_flashdata(
				'errors', validation_errors(
					'<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">', 
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    					<span aria-hidden="true">&times;</span>
	  					</button>
  					</div>' 
			));
			
			redirect( $_SERVER['HTTP_REFERER'] );

		}

		$data['form_data'] = $this->input->post();
		$this->load->view( 'layouts/partials/header' );
		$this->load->view( 'edit', $data );
		$this->load->view( 'layouts/partials/footer' );
	
	}

	public function destroy ( $id ) 
	{
		
		$this->db->where( 'id', $id );

		$this->db->delete( 'projects' );

		redirect(base_url());
	
	}

	public function uniqueName ( $val, $id ) 
	
	{
		
		if ( $this->Project->unique( 'name', $val, $id ) )
		{

			return true;

		}

		return false;
	
	}
	

}