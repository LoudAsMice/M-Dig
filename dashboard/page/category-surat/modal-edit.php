<div class="modal fade" id="modalcategoryedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
                <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="status" class="form-label">Status:</label>
                <select class="custom-select" name="status" id="status">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-label">Nama Category:</label>
                <input type="text" class="form-control" id="nama" name="nama">
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
        $status = $_POST['status'];
        $nama = $_POST['nama'];
        $pid = $_POST['id'];
        
        $update = update("UPDATE `catesurat` SET `category` = '$nama', `status` = '$status' WHERE `catesurat`.`id` = $pid;");
        
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
                  window.location.href = "?page=category-surat";
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
                  window.location.href = "?page=category-surat";
            });
        </script>
            <?php
        }
    }
 ?>