
<div class="modal fade bd-example-modal-lg" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Detail</label>
                            <textarea type="text" name="detail" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Lokasi</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Waktu</label>
                            <input type="datetime-local" class="form-control" id="cal1" name="waktu" required>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add">Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>
 <?php 

 if (isset($_POST['add'])) {
    $title = $_POST['judul'];
    $detail = $_POST['detail'];
    $location = $_POST['location'];
    $time = $_POST['waktu'];

    $insert = insert("INSERT INTO `agenda` (`id`, `title`, `detail`, `location`, `time`) VALUES (NULL, '$title', '$detail', '$location', '$time');");

    if (mysqli_affected_rows($koneksi) == "1") {
        ?>
    <script type="text/javascript">
        swal({
            title: "Sukses!",
            text: "Mengalihkan dalam 2 Detik.",
            type: "success",
            timer: 2000,
            showConfirmButton: false
        }, function(){
                window.location.href = "?page=agenda";
        });
    </script>
        <?php
    }else{
        ?>
    <script type="text/javascript">
        swal({
            title: "Error!",
            text: "Mengalihkan dalam 2 Detik.",
            type: "error",
            timer: 2000,
            showConfirmButton: false
        }, function(){
                window.location.href = "?page=agenda";
        });
    </script>
        <?php
    }
 }
  ?>

<script type="text/javascript">
    window.addEventListener('load', () => {
      var now = new Date();
      now.setMinutes(now.getMinutes() - now.getTimezoneOffset());

      /* remove second/millisecond if needed - credit ref. https://stackoverflow.com/questions/24468518/html5-input-datetime-local-default-value-of-today-and-current-time#comment112871765_60884408 */
      now.setMilliseconds(null)
      now.setSeconds(null)

      document.getElementById('cal1').value = now.toISOString().slice(0, -1);
    });
    </script>