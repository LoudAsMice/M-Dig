<div class="modal fade" id="modalcategoryedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="form-group">
                <label for="detail" class="form-label">Detail:</label>
                <input type="text" class="form-control" id="detail" name="detail">
              </div>
              <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" accept="image/*" name="image" id="image" class="form-control">
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
    $detail = $_POST['detail'];
    $pid = $_POST['id'];
    
    if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){
      $old = query("SELECT * FROM home_img WHERE id = $pid");
      $imagename = $_FILES["image"]["name"];
      $tmpname = $_FILES['image']['tmp_name'];
      $new = "img" . uniqid() . $imagename;

      move_uploaded_file($tmpname, '../assets/img/home/' . $new);

      if($old['link'] != 'default-home.jpg'){ // future delete picture
      }

      $update = update("UPDATE `home_img` SET `name` = '$name', `detail` = '$detail', img = '$new' WHERE `home_img`.`id` = $pid;");
    } else {
      $update = update("UPDATE `home_img` SET `name` = '$name', `detail` = '$detail' WHERE `home_img`.`id` = $pid;");
    }

      
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
                window.location.href = "?page=home-image";
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
                window.location.href = "?page=home-image";
          });
      </script>
          <?php
      }
  }
 ?>