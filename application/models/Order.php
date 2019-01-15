<?php

class Order extends CI_Model
{

	public function create ( $projectId ) 
	{
		
		$data = [

			'name' => $this->input->post('orderName'),
			'description' => $this->input->post('orderDescription'),
			'project_id' => $projectId,
			'type_id' => $this->input->post('order_type'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date')

		];

		$this->db->insert( 'orders', $data );
	
	}

	public function validateOrderType ( $projectId, $typeId ) 
	{
		
		$this->db->where( 'project_id', $projectId );

		$this->db->where( 'type_id', $typeId );

		$resultCount = $this->db->count_all_results('projects');

		//$i = $this->db->count()
		//dodaj petlju
		switch ( $resultCount ) {
			case 1:
				# code...
				break;
			case 2:
				# code...
				break;
			case 3:
				# code...
				break;
			
			default:
				# code...
				break;
		}
	
	}

}