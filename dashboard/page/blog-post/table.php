<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Postingan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Postingan</a>
                                </li>
                                <li class="breadcrumb-item active">Table Postingan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">

                    <a href="?page=surat&action=add" class="btn btn-info float-md-right"><i class="la la-plus"></i> Tambah Baru</a>
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
                                        <h4 class="card-title">Table Postingan</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" width="100%" id="table">
                                            <thead> 
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Jenis Surat</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            if ($login[0]['level'] == "Masyarakat") {
                                                $sql = query("SELECT request_surat.id,request_surat.request_user, request_surat.surat, request_surat.pesan, request_surat.status, user_detail.userid, user_detail.nik, user_detail.email, user_detail.nama FROM `request_surat` INNER JOIN user_detail ON user_detail.userid=request_surat.request_user WHERE user_detail.userid = '".$_SESSION['id']."'");
                                            }else{
                                                $sql = query("SELECT request_surat.id,request_surat.request_user, request_surat.surat, request_surat.pesan, request_surat.status, user_detail.userid, user_detail.nik, user_detail.email, user_detail.nama FROM `request_surat` INNER JOIN user_detail ON user_detail.userid=request_surat.request_user ORDER BY status DESC");
                                            }
                                            $i = 1;
                                            foreach ($sql as $data){
                                            ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['nik'] ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['email'] ?></td>
                                                <td><?php 
                                                $ssurat = $koneksi->query("SELECT * FROM `catesurat` WHERE id='".$data['surat']."'");
                                                $dsurat = $ssurat->fetch_assoc();
                                                echo $dsurat['category'];
                                                 ?></td>
                                                <td>
                                                    <?php
                                                    if ($data['status'] == "Request") {
                                                        echo 'Baru diajukan';
                                                    }elseif ($data['status'] == "Rejected") {
                                                        echo "Ditolak";
                                                    }elseif ($data['status'] == "Process") {
                                                        echo "Sedang dibuat";
                                                    }elseif ($data['status'] == "Sudah diambil") {
                                                        echo "Sudah diambil";
                                                    }else{
                                                        echo "Siap diambil";
                                                    }
                                                    ?>
                                                        
                                                </td>

                                                <td>
                                                    <?php
                                                    if ($login[0]['level'] == "Masyarakat") {
                                                        ?>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                          <li><a href="?page=surat&action=view&id=<?= base64_encode($data['id']); ?>" class="dropdown-item">Lihat</a></li>
                                                          <?php if ($data['status'] == "Request") { ?>
                                                          <li><a href="?page=surat&action=edit&id=<?= base64_encode($data['id']); ?>" class="dropdown-item <?php if ($data['status'] != 'Request') { echo 'disabled'; } ?>">Edit</a></li>
                                                          <li><a href="?page=surat&action=delete&id=<?= base64_encode($data['id']); ?>" class="dropdown-item <?php if ($data['status'] != 'Request') { echo 'disabled'; } ?>">Hapus</a></li>
                                                      <?php } ?>
                                                        </ul>
                                                    </div>
                                                        <a href="?page=surat&action=update&id=<?= $data['id'] ?>" class="btn btn"></a>
                                                        <?php
                                                    }elseif ($login[0]['level'] == "Admin") {
                                                        ?>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="?page=surat&action=view&id=<?= base64_encode($data['id']); ?>" class="dropdown-item">Lihat</a></li>
                                                            <?php if ($data['status'] != 'Sudah diambil'|| $data['status'] != 'Rejected') {
                                                              ?>
                                                          <li><a class="dropdown-item modalaksi" data-surat="<?= $data['id'] ?>" data-target="#modalaksi" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#modalaksi">Proses</a></li>
                                                      <?php } ?>
                                                        </ul>
                                                    </div>
                                                        <a href="?page=surat&action=update&id=<?= $data['id'] ?>" class="btn btn"></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php $i++; } ?>
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
<div class="modal fade" id="modalaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proses Permintaan Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
                <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="recipient-name" class="form-label">Aksi:</label>
                <select class="custom-select" name="aksi">
                    <option value="proses">Proses Surat</option>
                    <option value="reject">Tolak Permintaan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-label">Pesan:</label>
                <textarea class="form-control" id="message-text" name="pesan"></textarea>
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
        $aksi = $_POST['aksi'];
        $pesan = $_POST['pesan'];
        $pid = $_POST['id'];
        if ($aksi == 'reject') {
            $update = update("UPDATE `request_surat` SET `pesan`='".$select[0]['pesan'].", Pesan ditolak: $pesan', `status`='Rejected' WHERE id='$pid'");
        }else{
            $select = query("SELECT * FROM `request_surat` WHERE id='$pid'");
            if ($select[0]['status'] == "Request") {
                $update = update("UPDATE `request_surat` SET `pesan`='".$select[0]['pesan'].", Pesan diproses: $pesan', `status`='Process' WHERE id='$pid'");
            }elseif ($select[0]['status'] == "Process") {
                $update = update("UPDATE `request_surat` SET `pesan`='".$select[0]['pesan'].", Pesan siap diambil: $pesan', `status`='Ready to Pickup' WHERE id='$pid'");
            }elseif ($select[0]['status'] == "Ready to Pickup") {
                $update = update("UPDATE `request_surat` SET `pesan`='".$select[0]['pesan'].", Pesan setelah diambil: $pesan', `status`='Sudah diambil' WHERE id='$pid'");
            }
        }

        if (mysqli_affected_rows($koneksi) > 0) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Proses Aksi Sukses!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script type="text/javascript">
                window.location.href = "?page=surat";
            </script>
            <?php
        }
    }
 ?>