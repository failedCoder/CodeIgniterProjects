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

		$data['projects'] = $this->Project->getAll();

		$this->load->view('layouts/partials/header');
		$this->load->view('index', $data);
		$this->load->view('layouts/partials/footer');
	
	}

	public function show ( $id ) 
	{
		$this->load->helper('form');

		$data['project'] = $this->Project->get( $id );

		$this->load->view('layouts/partials/header');
		$this->load->view('showProject', $data);
		$this->load->view('layouts/partials/footer');
	
	}

	public function create () 
	{

	  $this->load->helper('form');			

	  $data['nameInputAttributes'] = [

        'name' => 'name',
        'placeholder' => 'Unesite ime projekta',
        'class' => 'form-control',
        'value' => set_value('name')

      	];

      $data['descriptionInputAttributes'] = [

        'name' => 'description',
        'placeholder' => 'Unesite opis projekta',
        'class' => 'form-control',
        'value' => set_value('description')

      ];

      $data['submitAttributes'] = [

        'name' => 'submit',
        'value' => 'Stvori projekt',
        'class' => 'btn btn-primary'

      ];
		
		$this->load->helper('form');
		$this->load->library('session');
		
		$this->load->view('layouts/partials/header');
		$this->load->view('create', $data);
		$this->load->view('layouts/partials/footer');
	
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

		if($this->form_validation->run() == TRUE) 
		{

			$this->Project->create();

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
		$this->load->view( 'create', $data );
		$this->load->view( 'layouts/partials/footer' );
	
	}

	public function edit ( $id ) 
	{
		
		$this->load->helper('form');
		$this->load->library('session');

		$data['project'] = $this->Project->get( $id );
	
		$this->load->view( 'layouts/partials/header' );
		$this->load->view( 'edit', $data );
		$this->load->view( 'layouts/partials/footer' );
	
	}

	public function update ( $id ) 
	{
		
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules( 'name', 'Ime projekta', 'required');
		$this->form_validation->set_rules( 'description', 'Opis projekta', 'required' );
		$this->form_validation->set_rules( 'start_date', 'Početni datum', 'required' );
		$this->form_validation->set_rules( 'end_date', 'Kraj projekta', 'required' );

		if($this->form_validation->run() == TRUE) 
		{

		$this->Project->edit( $id );

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

}