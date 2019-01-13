<div class="container">

	<h1 class="text-center my-5">Projekti</h1>

	<a href="<?php base_url() ?>projects/create" class="btn btn-success my-1">Dodaj novi projekt</a>

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible text-center">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <?php echo $this->session->flashdata('success') ?>
		</div>
	<?php endif; ?>	

	<?php if( $projects ): ?>

	<table class="table table-striped table-hover">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Name</th>
	      <th scope="col">Description</th>
	      <th scope="col">Start date</th>
	      <th scope="col">End date</th>
	      <th></th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>

		  	<?php foreach($projects as $project): ?>

			    <tr>
			      <th scope="row"> <?= $project->id ?> </th>
			      <td>
			      	<a href="<?php base_url() ?> projects/<?php echo $project->id ?>/show" class="font-weight-bold">
			      		<?php echo $project->name ?>
			      	</a>
			      </td>
			      <td> <?= $project->description ?> </td>
			      <td> <?= $project->start_date ?> </td>
			      <td> <?= $project->end_date ?> </td>
			      <td> 
			      	<a class="btn btn-outline-warning" href="<?php base_url() ?> projects/<?=$project->id?>/edit" role="button"> <i class="fas fa-edit"></i> </a> 
			      </td>
			      <td>

			      	<?php 

			      	echo form_open( site_url( "projects/$project->id")) ?>

			      		<button type="submit" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </button>

			      	<?php echo form_close(); ?>

			      </td>
			    </tr>

			<?php endforeach ?>

		
	    
	  </tbody>
	</table>

	<?php else: ?>

		<p>Nema projekata!</p>

	<?php endif; ?>


</div>
		

