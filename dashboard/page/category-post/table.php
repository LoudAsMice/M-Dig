<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Category Post</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Category Post</a>
                                </li>
                                <li class="breadcrumb-item active">Table Category Post
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">

                    <a href="?page=category-post&action=add" class="btn btn-info float-md-right"><i class="la la-plus"></i> Tambah Baru</a>
                </div> 
            </div>
            <div class="content-body">
                <!-- Add Doctors Form Wizard -->

                <section id="add-doctors">
                    <div class="icon-tabs">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Table Category Post</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" width="100%" id="table">
                                            <thead> 
                                                <tr>
                                                    <th>No</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $sql = query("SELECT * FROM post_category");
                                            $dta = "";
                                            $i = 1;
                                            foreach ($sql as $data){
                                            ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['category_name'] ?></td>
                                                <td><?= $data['status'] ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item modalcategoryedit" data-category="<?= $data['id'];?>" data-status="<?= $data['status'];?>" data-nama="<?= $data['category_name'];?>" data-target="#modalcategoryedit" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#modalaksi" onclick="">Edit</a></li>
                                                            <li><a href="?page=category-post&action=delete&id=<?= base64_encode($data['id']); ?>" class="dropdown-item">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                        <a href="?page=surat&action=update&id=<?= $data['id'] ?>" class="btn btn"></a>
                                                        <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
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
                    <option value="Tidak">Tidak Aktif</option>
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
        
        $update = update("UPDATE `post_category` SET `category_name` = '$nama', `status` = '$status' WHERE `post_category`.`id` = $pid;");
        if (mysqli_affected_rows($koneksi) > 0) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Edit Category Sukses!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script type="text/javascript">
                window.location.href = "?page=category-post";
            </script>
            <?php
        }
    }
 ?>