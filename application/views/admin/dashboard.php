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
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Income/expense List</div>

            <div class="row mt-3">
            <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Incomes</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Income</th>
                </tr>
              </thead>
              <tbody>
                <?php $k = 1;
                foreach ($income as $inc) { ?>
                  
                
                <tr>
                  <td><?= $k ?></td>
                  <td><?= $inc->date ?></td>
                  <td><?= $inc->income ?></td>
                </tr>
                <?php $k++; } ?>

              </tbody>
            </table>
          </div>
        </div>


        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Expenses</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Expense</th>
                </tr>
              </thead>
              <tbody>
                <?php $l = 1;
                foreach ($expenses as $inc) { ?>
                  
                
                <tr>
                  <td><?= $l ?></td>
                  <td><?= $inc->date ?></td>
                  <td><?= $inc->expenses ?></td>
                </tr>
                <?php $l++; } ?>

              </tbody>
            </table>
          </div>
        </div>
        </div>

          </div>
        </div>
      </div>
    </main>