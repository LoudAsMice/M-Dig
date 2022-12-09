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
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="form-group">
                <label for="category" class="form-label">Category:</label>
                <select name="category" id="category" class="form-control">
                  <option value="1">Ketua</option>
                  <option value="2">Wakil Ketua</option>
                  <option value="3">Staff</option>
                </select>
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
        $name = $_POST['nama'];
        $category = $_POST['category'];
        $pid = $_POST['id'];
        
        $update = update("UPDATE `staff_img` SET `name_img` = '$name', `category_img` = '$category' WHERE `staff_img`.`id` = $pid;");
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
                  window.location.href = "?page=staff-image";
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
                  window.location.href = "?page=staff-image";
            });
        </script>
            <?php
        }
    }
 ?>