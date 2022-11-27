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
                                        <h4 class="card-title">Table Surat Online</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table" width="100%" id="table">
                                            <thead> 
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Jenis Surat</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
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
                                                <td><?= $data['surat'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($data['status'] == "Request") {
                                                        echo 'Baru diajukan';
                                                    }elseif ($data['status'] == "Process") {
                                                        echo "Sedang dibuat";
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
                                                          <li><a href="?page=surat&action=view&id=<?= base64_encode($data['id']); ?>" class="dropdown-item">View</a></li>
                                                          <li><a href="?page=surat&action=edit&id=<?= base64_encode($data['id']); ?>" class="dropdown-item <?php if ($data['status'] != 'Request') { echo 'disabled'; } ?>">Edit</a></li>
                                                          <li><a href="?page=surat&action=delete&id=<?= base64_encode($data['id']); ?>" class="dropdown-item <?php if ($data['status'] != 'Request') { echo 'disabled'; } ?>">Delete</a></li>
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
