<!-- Modal -->
<div class="modal fade" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="orderModalCenterTitle">Kreirajte novi nalog</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open( base_url() . 'projects' ); ?>

			      <div class="form-group">

			        <?php echo form_label('Ime projekta'); ?>

			        <?php echo form_input($nameInputAttributes); ?>

			      </div>

			      <div class="form-group">

			        <?php echo form_label('Opis projekta'); ?>

			        <?php echo form_textarea($descriptionInputAttributes); ?>

			      </div>

			      <div class="form-group">

			        <?php echo form_label('Pocetak projekta'); ?>

			        <input type="datetime-local" name="start_date" step="1" 
			        value="<?php echo $this->session->flashdata('start_date') ? set_value('start_date', strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->session->flashdata('start_date')))) : '' ?>">

			      </div>

			      <div class="form-group">

			        <?php echo form_label('Kraj projekta'); ?>

			        <input type="datetime-local" name="end_date" step="1" 
			        value="<?php echo $this->session->flashdata('end_date') ? set_value('start_date', strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->session->flashdata('end_date')))) : '' ?>">

			      </div>

			      

			    <?php form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<?php echo form_submit($submitAttributes); ?>
			</div>
		</div>
	</div>
</div>