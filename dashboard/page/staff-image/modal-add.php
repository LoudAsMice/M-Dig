
<div class="modal fade bd-example-modal-lg" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda</h5>
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
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="1">Ketua</option>
                                <option value="2">Wakil Ketua</option>
                                <option value="3">Staff</option>
                            </select>
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
    $category = $_POST['category'];
    $image = $_POST['image'];
    $time = $_POST['waktu'];

    $imagename = $_FILES["image"]["name"];
    $tmpname = $_FILES['image']['tmp_name'];
    $new = uniqid() . $imagename;

    move_uploaded_file($tmpname, '../assets/img/' . $new);
    $insert = insert("INSERT INTO `staff_img` (`id`, `name_img`, `category_img`, `link`) VALUES (NULL, '$name', '$category', '$new');");
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
