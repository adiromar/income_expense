
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
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <!-- <div class="tile-body">Income/expense List</div> -->

            <div class="row mt-3">
              <div class="col-md-12 col-12">
                <a href="<?= base_url()?>calculations" class="btn btn-primary">Today</a>
                <a href="<?= base_url()?>calculations?filter=weekly" class="btn btn-primary">Last 7 Days</a>
                <!-- <a href="<?= base_url()?>calculations?filter=monthly" class="btn btn-success">Monthly</a> -->
                <!-- <a href="<?= base_url()?>calculations?filter=yearly" class="btn btn-info">Yearly</a> -->
              </div>

              <div class="col-md-12 col-12 pt-3"> 
                <div class="row">

                  <div class="col-md-3 col-12">
                    <label>Start Date<span>*</span></label>
                    <input type="text" name="date1" id="datepicker1" class="form-control" required>
                  </div>

                  <div class="col-md-3 col-12">
                    <label>End Date<span>*</span></label>
                    <input type="text" name="date2" id="datepicker2" class="form-control datepicker2" required>
                  </div>

                  <div class="col-md-3 col-12">
                   <br> 
                    <button class="btn btn-primary" id="filter">Filter</button>
                  </div>

                </div>
              </div>

              <div class="col-md-12 col-12 loading-img text-center" style="display: none;">
                <img src="<?= base_url()?>assets/facebook.gif" width="75" height="60">
              </div>


            <div class="col-md-12 response">
          <div class="tile">
            <h3 class="tile-title"><?= $title ?></h3>
            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Income</th>
                </tr>
              </thead>
              <tbody >
                <?php $k = 1;$sum_income = 0;
                if(isset($income) ):
                foreach ($income as $inc) { 
                  $sum_income += $inc->income;
                  ?>
                  
                
                <tr>
                  <td><?= $k ?></td>
                  <td><?= $inc->date ?></td>
                  <td><?= $inc->income ?></td>
                </tr>
                <?php $k++; } ?>
                <?php else: ?>
                  <tr><td>N0 Data Available</td></tr>
                <?php endif; ?>
                <tr>
                  <td>Total Income</td>
                  <td></td>
                  <td><b>RS. <?= $sum_income ?></b></td>
                </tr>

              </tbody>
            </table>

            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Expense</th>
                </tr>
              </thead>
              <tbody>
                <?php $k = 1;$sum_expenses = 0;
                if(isset($expenses) ):
                foreach ($expenses as $inc) { 
                  $sum_expenses += $inc->expenses;
                  ?>
                  
                
                <tr>
                  <td><?= $k ?></td>
                  <td><?= $inc->date ?></td>
                  <td><?= $inc->expenses ?></td>
                </tr>
                <?php $k++; } ?>
                <?php else: ?>
                  <tr><td>N0 Data Available</td></tr>
                <?php endif; ?>
                <tr>
                  <td>Total Expenses</td>
                  <td></td>
                  <td><b>RS. <?= $sum_expenses ?></b></td>
                </tr>

                <?php
                  $diff = 0;
                  $diff = ($sum_income - $sum_expenses);
                ?>
                <tr style="background: aliceblue;">
                  <td><b>Total Savings:</b></td>
                  <td></td>
                  <td><b>Rs.<?= $diff;?></b></td>
                </tr>

              </tbody>
            </table>


          </div>
        </div>

      
        </div>

          </div>
        </div>
      </div>
    </main>