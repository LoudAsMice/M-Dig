

<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Produk Desa</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Produk Desa</a>
                                </li>
                                <li class="breadcrumb-item active">Table Produk Desa
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <?php 
                    if ($login[0]['level'] == "Masyarakat") {
                     
                     ?>
                     <script type="text/javascript">
                         window.location.href = index.php
                     </script>
                     <?php
                    }
                     ?>
                    <a data-target="#modaltambah" data-toggle="modal" class="MainNavText btn btn-info float-md-right" id="MainNavHelp" href="#modaltambah" data-focus="false"><i class="la la-plus"></i> Tambah Baru</a>
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
                                        <h4 class="card-title">Table Produk Desa</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" width="100%" id="table">
                                            <thead> 
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Product</th>
                                                    <th>Deskripsi Produk</th>
                                                    <th>Whatsapp</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $sql = query("SELECT * FROM `product` ORDER BY id DESC");
                                            $i = 1;
                                            foreach ($sql as $data){
                                            ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['subject'] ?></td>
                                                <td><?= $data['isi'] ?></td>
                                                <td><?= $data['whatsapp'] ?></td>
                                                <td><?= rupiah($data['harga']) ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                          <li>
                                                            <a class="dropdown-item" target="_blank" href="https://google.com/?page=view-post&id=<?= base64_encode($data['id']) ?>">Hapus</a>
                                                          </li>
                                                          <li>
                                                            <a class="dropdown-item modaledit" data-post="<?= $data['id'] ?>" data-judul="<?= $data['subject'] ?>" data-isi='<?= $data['body']; ?>' data-tanggal="<?= $data['date_created']; ?>" data-target="#modaledit" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#modaledit">Edit Post</a>
                                                          </li>
                                                          <li>
                                                              <a class="dropdown-item" onclick="archiveFunction(event)" href="?page=blog-post&action=delete&id=<?= base64_encode($data['id']); ?>">Hapus</a>
                                                          </li>
                                                        </ul>
                                                    </div>
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






