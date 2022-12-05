<section id="listproduct" class="posts">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 align-center">
        <div class="row justify-content-center">

          <form method="POST">
          <div class="row"> 
              <div class="col">              
                <label class="col-sm-3 col-form-label col-form-label-sm text-left justify-content-end"></label>
              </div>
              <div class="col">  
                <select class="form-select" name="search">
                  <option value="not" selected disabled>Pilih Kategori</option>
                  <option value="Jenis Kelamin">Jenis Kelamin</option>
                  <option value="Pendidikan">Pendidikan</option>
                  <option value="Agama">agama</option>
                  <option value="Pekerjaan">Pekerjaan</option>
                  <option value="Pendapatan">Pendapatan</option>
                </select>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-info text-white" name="chartsubmit">Submit</button>
              </div>
            </div>

            </form>
            <?php if (isset($_GET['chart'])) {
              ?>
          <div class="row">

            <div>
              <canvas id="myChart" style="width: 400px; height: 400px;"></canvas>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($_GET['chart'] == "Jenis Kelamin") {
                  $charts = query("SELECT Count(jkel) as total, jkel as data FROM `user_detail` GROUP by jkel");
                  $countcharts = query("SELECT Count(*) as total FROM `user_detail`");
                }elseif ($_GET['chart'] == "Pekerjaan") {
                  $charts = query("SELECT Count(pekerjaan) as total, pekerjaan as data FROM `user_detail` GROUP by pekerjaan");
                  $countcharts = query("SELECT Count(*) as total FROM `user_detail`");
                }elseif ($_GET['chart'] == "Pendidikan") {
                  $charts = query("SELECT Count(pendidikan) as total, pendidikan as data FROM `user_detail` GROUP by pendidikan");
                  $countcharts = query("SELECT Count(*) as total FROM `user_detail`");
                }elseif ($_GET['chart'] == "Pendapatan") {
                  $charts = query("SELECT Count(gaji) as total, gaji as data FROM `user_detail` GROUP by gaji");
                  $countcharts = query("SELECT Count(*) as total FROM `user_detail`");
                }elseif ($_GET['chart'] == "Agama") {
                  $charts = query("SELECT Count(agama) as total, agama as data FROM `user_detail` GROUP by agama");
                  $countcharts = query("SELECT Count(*) as total FROM `user_detail`");
                }elseif($_GET['chart'] == ""){
                  ?>
                    <script>
                      window.location.href = "?page=chart";
                    </script>
                  <?php
                }
                foreach ($charts as $chart) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $chart['data'] ?></td>
                  <td><?= $chart['total'] ?></td>
                </tr>
              <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2" align="center"><b>Total</b></td>
                  <td><?= $countcharts[0]['total'] ?></td>
                </tr>
              </tfoot>
            </table>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
if (isset($_POST['chartsubmit'])) {
  $chartdata = $_POST['search'];
  ?>
  <script type="text/javascript">
    window.location.href = "?page=chart&chart=<?= $chartdata; ?>"
  </script>
  <?php
}
?>
<script>

  const ctx = document.getElementById('myChart'); 
  
  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [
        <?php 
        foreach ($charts as $chart) {
          echo "'".$chart['data']."',";
        }
        ?>
      ],
      datasets: [{
        label: 'Total',
        data: [
          <?php 
        foreach ($charts as $chart) {
          echo $chart['total'].',';
        }
        ?>
          ],
        hoverOffset: 4
      }]
    },
    options: {
      responsive: true, 
      maintainAspectRatio: false,
      scales: {
        y: {
          display: false,
        }
      },plugins: {
            legend: {
                display: true,
                position: 'bottom'
            }
        },
        plugins: {
            title: {
                display: true,
                text: <?php echo "'Statistik ".$_GET['chart']."'"; ?>
            }
        }
    }
  });
</script>