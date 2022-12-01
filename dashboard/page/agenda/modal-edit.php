<div class="modal fade" id="modalcategoryedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
                <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="title" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="form-group">
                <label for="detail" class="form-label">Detail:</label>
                <input type="text" class="form-control" id="detail" name="detail">
              </div>
              <div class="form-group">
                <label for="location" class="form-label">Lokasi:</label>
                <input type="text" class="form-control" id="location" name="location">
              </div>
              <div class="form-group">
                <label for="waktu" class="form-label">Waktu:</label>
                <input class="form-control" type="datetime-local" id="waktu" name="waktu">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>

<?php 
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $location = $_POST['location'];
        $time = $_POST['waktu'];
        $pid = $_POST['id'];
        
        $update = update("UPDATE `agenda` SET `title` = '$title', `detail` = '$detail', `location` = '$location', `time` = '$time' WHERE `agenda`.`id` = $pid;");
        if (mysqli_affected_rows($koneksi) > 0) {
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