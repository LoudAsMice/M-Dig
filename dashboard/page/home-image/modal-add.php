
<div class="modal fade bd-example-modal-lg" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Home Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Detail</label>
                            <input type="text" name="detail" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" accept="image/*" name="image" class="form-control">
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
    $name = $_POST['name'];
    $detail = $_POST['detail'];

    if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){
        $imagename = $_FILES["image"]["name"];
        $tmpname = $_FILES['image']['tmp_name'];
        $new = "img" . uniqid() . $imagename;

        move_uploaded_file($tmpname, '../assets/img/home/' . $new);
        $insert = insert("INSERT INTO `home_img` (`id`, `name`, `detail`, `img`) VALUES (NULL, '$name', '$detail', '$new');");
    } else {
        $insert = insert("INSERT INTO `home_img` (`id`, `name`, `detail`) VALUES (NULL, '$name', '$detail');");
    }
    
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
