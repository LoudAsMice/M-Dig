

<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Surat Online</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Surat Online</a>
                                </li>
                                <li class="breadcrumb-item active">Table Surat Online
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <?php 
                    if ($login[0]['level'] == "Masyarakat") {
                     ?>
                    <a data-target="#modaltambah" data-toggle="modal" class="MainNavText btn btn-info float-md-right" id="MainNavHelp" href="#modaltambah"><i class="la la-plus"></i> Tambah Baru</a>
                <?php } ?>
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
                                        <h4 class="card-title">Table Surat Online</h4>
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
                                                $jenissurat = $dsurat['category'];
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
                                                          <li><a class="dropdown-item modalview" data-suratid="<?= $data['id'] ?>" data-jenissurat="<?= $jenissurat; ?>" data-pesan="<?= $data['pesan'] ?>" data-target="#modalview" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#modalview">Lihat</a></li>
                                                          <?php if ($data['status'] == "Request") { ?>
                                                          <li><a class="dropdown-item modaledit" data-suratid="<?= $data['id'] ?>" data-pesan="<?= $data['pesan'] ?>" data-target="#modaledit" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#modaledit">Edit</a></li>
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
                                        <?php echo $login[0]['nama'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>








<?php 
    if (isset($_POST['proses'])) {
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

 <?php 

 if (isset($_POST['tambah'])) {
    $surat = $_POST['surat'];
    $pesan = $_POST['pesan'];

        $insert = insert("INSERT INTO `request_surat`(`id`, `request_user`, `surat`, `pesan`, `status`) VALUES ('','$id','$surat','$pesan','Request')");

        if (mysqli_affected_rows($koneksi) == "1") {
            ?>
            <script type="text/javascript">
                window.location.href = "?page=surat"
            </script>
            <?php
        }
 }
  ?>


    <?php 
    if (isset($_POST['edit'])) {
        $pid = $_POST['id'];
        $surat = $_POST['surat'];
        $pesan = $_POST['pesan'];

        $update = update("UPDATE `request_surat` SET `surat`='$surat',`pesan`='$pesan' WHERE `id`='$pid'");
    
        if (mysqli_affected_rows($koneksi)) {
            ?>
            <script type="text/javascript">
                window.location.href = "?page=surat";
            </script>
            <?php
        }
    }
     ?>