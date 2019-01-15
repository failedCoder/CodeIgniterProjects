
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
				<?php echo form_open( base_url("/orders"), $orderFormAttributes ); ?>

			      <div class="form-group">

			        <?php echo form_label('Ime naloga'); ?>

			        <?php echo form_input($nameInputAttributes); ?>

			      </div>

			      <div class="form-group">

			        <?php echo form_label('Opis naloga'); ?>

			        <?php echo form_textarea($descriptionInputAttributes); ?>

			      </div>

			      <div class="form-group">

			        <?php echo form_label('Pocetak naloga'); ?>
 	
			        <input type="datetime-local" name="start_date" step="1" 
			        value="<?php echo $this->session->flashdata('start_date') ? set_value('start_date', strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->session->flashdata('start_date')))) : '' ?>">

			      </div>

			      <div class="form-group">

			        <?php echo form_label('Kraj naloga'); ?>

			        <input type="datetime-local" name="end_date" step="1" 
			        value="<?php echo $this->session->flashdata('end_date') ? set_value('start_date', strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->session->flashdata('end_date')))) : '' ?>">

			      </div>

			      <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <label class="input-group-text" for="typeSelect">Tip naloga</label>
					  </div>
					  <select class="custom-select" id="typeSelect" name="order_type" required>
					    <option value="1">Primarni</option>
					    <option value="2">Sekundarni</option>
					    <option value="3">Tercijarni</option>
					  </select>
				  </div>

			      <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<?php echo form_submit($submitAttributes); ?>
				  </div>

			    <?php form_close(); ?>
			</div>
			
		</div>
	</div>
</div>