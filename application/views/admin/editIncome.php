<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $title ?></h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>
<!-- breadcrumb -->
      <div class="">
        

<?php if($this->session->flashdata('success')): ?>
<div class="bs-component">
  <div class="alert alert-dismissible alert-success">
    <button class="close" type="button" data-dismiss="alert">×</button><strong><?= $this->session->flashdata('success') ?></strong> 
  </div>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
<div class="bs-component">
  <div class="alert alert-dismissible alert-danger">
    <button class="close" type="button" data-dismiss="alert">×</button><strong><?= $this->session->flashdata('error') ?></strong> 
  </div>
</div>
<?php endif; ?>

      </div>

<?php
// print_r($income);
if($income){
  $date = $income[0]->date;
  $income = $income[0]->income;
}

?>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <!-- <div class="tile-body">Add Income</div> -->

            <div class="row">
              <div class="col-md-12 col-12">
          <div class="">
            <h3 class="tile-title">Update Income Form</h3>
            <div class="tile-body">

              <?php echo validation_errors(); ?>

              <?php if($income): ?>
              <?php $attributes = array('class' => 'login-form', 'id' => 'myform');
              echo form_open('admin/update_income', $attributes); ?>

              <div class="form-group">
                  <label class="control-label">Date</label>
                  <input type="date" name="date" value="<?= $date ?>" class="form-control">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Income</label>
                  <input type="number" name="income" step="0.10" value="<?= $income ?>" class="form-control" required>
                </div>
              
              <div class="tile-footer">
                <input type="hidden" name="id" value="<?= $tid ?>">

              <button type="submit" name="btnsubmit" value="go" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Income</button>
            </div>
              <?php echo form_close(); ?>
              <?php else: ?>
                <p>Not available for this date or User Not Authorized.</p>
              <?php endif; ?>
            </div>
            
          </div>
        </div>
            </div>
          </div>
        </div>
      </div>
    </main>