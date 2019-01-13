<div class="row">
  
  <div class="col-6 offset-3">
    
    <div class="row ">
      <h2 class="my-3 mx-auto">Uredite projekt</h2>
      <a href="/" class="my-auto">
        <i class="fas fa-times"></i>
      </a>
    </div>

    <?php if ( $this->session->flashdata('errors') ): ?>

      <?php echo $this->session->flashdata('errors') ?>

    <?php endif; ?>

    <?php echo form_open( base_url() . "projects/update/$project->id" ); ?>

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

        <input type="datetime-local" name="start_date" step="1" value="<?= strftime('%Y-%m-%dT%H:%M:%S', strtotime($project->start_date)) ?>">

      </div>

      <div class="form-group">

        <?php echo form_label('Kraj projekta'); ?>

        <input type="datetime-local" name="end_date" step="1" value="<?= strftime('%Y-%m-%dT%H:%M:%S', strtotime($project->end_date)) ?>">

      </div>

      <?php echo form_submit($submitAttributes); ?>

    <?php form_close(); ?>

  </div>

</div>