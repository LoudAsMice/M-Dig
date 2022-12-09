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
                  <option value="Agama">Agama</option>
                  <option value="Umur">Umur</option>
                  <option value="Perkawinan">Perkawinan</option>
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
              $no = 1;
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
                }elseif ($_GET['chart'] == "Umur") {
                  $charts = query("SELECT SUM(CASE WHEN DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),user_detail.tanggal_lahir)), '%Y') < 18 THEN 1 ELSE 0 END) AS '18', SUM(CASE WHEN DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),user_detail.tanggal_lahir)), '%Y') BETWEEN 18 AND 25 THEN 1 ELSE 0 END) AS '25', SUM(CASE WHEN DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),user_detail.tanggal_lahir)), '%Y') BETWEEN 26 AND 35 THEN 1 ELSE 0 END) AS '35', SUM(CASE WHEN DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),user_detail.tanggal_lahir)), '%Y') BETWEEN 36 AND 45 THEN 1 ELSE 0 END) AS '45', SUM(CASE WHEN DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),user_detail.tanggal_lahir)), '%Y') BETWEEN 46 AND 55 THEN 1 ELSE 0 END) AS '55', SUM(CASE WHEN DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),user_detail.tanggal_lahir)), '%Y') BETWEEN 56 AND 65 THEN 1 ELSE 0 END) AS '65', SUM(CASE WHEN DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),user_detail.tanggal_lahir)), '%Y') BETWEEN 66 AND 200 THEN 1 ELSE 0 END) AS '66' FROM user_detail");
                  $countcharts = query("SELECT Count(*) as total FROM `user_detail`");
                }elseif ($_GET['chart'] == "Perkawinan") {
                  $charts = query("SELECT Count(perkawinan) as total, perkawinan as data FROM `user_detail` GROUP by perkawinan");
                  $countcharts = query("SELECT Count(*) as total FROM `user_detail`");
                }
                elseif($_GET['chart'] == ""){
                  ?>
                    <script>
                      window.location.href = "?page=chart";
                    </script>
                  <?php
                }
                if ($_GET['chart'] == "Umur") {
                  ?>
                    <tr>
                      <td>1</td>
                      <td>< 18 Tahun</td>
                      <td><?= $charts[0]['18']?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>18 - 25 Tahun</td>
                      <td><?= $charts[0]['25']?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>26 - 35 Tahun</td>
                      <td><?= $charts[0]['35']?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>36 - 45 Tahun</td>
                      <td><?= $charts[0]['45']?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>46 - 55 Tahun</td>
                      <td><?= $charts[0]['55']?></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>56 - 65 Tahun</td>
                      <td><?= $charts[0]['65']?></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>> 65 Tahun</td>
                      <td><?= $charts[0]['66']?></td>
                    </tr>
                  <?php
                }else{
                foreach ($charts as $chart) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $chart['data'] ?></td>
                  <td><?= $chart['total'] ?></td>
                </tr>
              <?php 
              $no++;}
            } ?>
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
        if ($_GET['chart'] == "Umur") {
          echo "'< 18 Tahun	', '18 - 25 Tahun', '26 - 35 Tahun', '36 - 45 Tahun', '46 - 55 Tahun', '56 - 65 Tahun', '> 66 Tahun',";
        }else{
        foreach ($charts as $chart) {
          echo "'".$chart['data']."',";
        }}
        ?>
      ],
      datasets: [{
        label: 'Total',
        data: [
          <?php 
        if ($_GET['chart'] == "Umur") {
          echo "'".$charts[0][18]."','".$charts[0][25]."','".$charts[0][35]."','".$charts[0][45]."','".$charts[0][55]."','".$charts[0][65]."','".$charts[0][66]."',";

        }else{
        foreach ($charts as $chart) {
          echo "'".$chart['total']."',";
        }}
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