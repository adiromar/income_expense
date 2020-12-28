
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
        