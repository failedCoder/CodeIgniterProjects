<?php

class Project extends CI_Model
{

	public function getAll () 
	{
		
		$query = $this->db->get( 'projects' );

		return $query->result();
	
	}

	public function get ( $id ) 
	{
		
		$this->db->where ( 'id', $id );

		$query = $this->db->get('projects');

		return $query->result()[0];
	
	}

	public function create () 
	{
		
		$data = [

				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),

			];

		$this->db->insert( 'projects', $data );
	
	}

	public function edit ($id) 
	{
		
		$data = [

				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),

			];

		$this->db->set( $data );

		$this->db->where( 'id', $id );

		$this->db->update( 'projects' );
	
	}

	public function unique ( $column, $value, $id ) 
	{
		
		$this->db->where( "id !=", $id );

		$this->db->where( $column, $value );

		$query = $this->db->get('projects');

		if ( $query->result() )
		{

			return false;

		}

		return true;
	
	}
	

}