<div class="container">
	<div class="row">
		<div class="col-6 offset-3"> 
			<div class="card mt-5 text-center">
			  <div class="card-header">
			  	<div class="row">
				    <h5 class="mx-auto"><?php echo $project->name ?></h5>
				    <a href="/" class="float-right">
	        			<i class="fas fa-times"></i>
	      			</a>
      			</div>
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">Opis projekta:</h5>
			    <p class="card-text"><?php echo $project->description ?></p>
			    <h6 class="card-title">Početak projekta:</h6>
			    <p class="card-text"><?php echo $project->start_date ?></p>
			    <h6 class="card-title">Kraj projekta:</h6>
			    <p class="card-text"><?php echo $project->end_date ?></p>
			    <div class="btn-group" role="group" aria-label="Basic example">
				  <a class="btn btn-outline-warning mr-2" href='<?php echo base_url("/projects/$project->id/edit") ?>' role="button"> 
			    	<i class="fas fa-edit"></i>
			   	  </a>
			   	<?php echo form_open( base_url( "/projects/$project->id" ) ) ?>  
			   		
			      	<button type="submit" class="btn btn-outline-danger ml-2"> <i class="fas fa-trash-alt"></i> </button>

			    <?php echo form_close(); ?>
				</div>
				<h5 class="card-title my-3">Nalozi:</h5>

				<!-- Modal button -->
			    <button type="button" class="btn btn-outline-primary" data-toggle="modal" id="orderModalBtn" data-target="#createOrderModal" data-project-id="<?php echo $project->id ?>">
				  Novi nalog
				</button>
			    
			  </div>
			  <div class="card-footer text-muted">
			    Projekt stvoren: <?php echo $project->created_at ?>
			  </div>
			</div>
		</div>
	</div>
</div>